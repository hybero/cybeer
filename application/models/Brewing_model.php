<?php
class Brewing_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_brew_list($id = null)
    {
        if ($id !== null) {
            $query = $this->db->get_where('brewing_lists', array('id' => $id));
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function get_brew_log($brew_list_id = null)
    {
        if ($brew_list_id !== null) {
            $query = $this->db->get_where('brewing_log', array('brewing_list_id' => $brew_list_id));
            $brew_steps = $query->result_array();
            foreach($brew_steps as &$brew_step) {
                if(!empty($brew_step['storage_id'])) {
                    $query = $this->db->get_where('storage', array('id' => $brew_step['storage_id']));
                    $brew_step['storage_item'] = $query->row_array();
                } else {
                    $brew_step['storage_item'] = [
                        'id'        => '',
                        'user_id'   => '',
                        'name'      => '',
                        'amount'    => '',
                        'units'     => ''
                    ];
                }
            }
            return $brew_steps;
        } else {
            return false;
        }
    }

    public function start_brewing($data = array())
    {
        if(!empty($data)) {
            $data['tank']['status'] = $data['form']['status'];
            unset($data['tank']['filling_amount_percent']);
            $this->db->update('tanks', $data['tank'], array('id' => $data['tank']['id']));

            $brew_list = [
                'user_id' => $data['user']['id'],
                'tank_id' => $data['tank']['id']
            ];
            $this->db->insert('brewing_lists', $brew_list);
            $brew_list_id = $this->db->insert_id();

            $brew_log = [
                'brewing_list_id'   => $brew_list_id,
                'action'            => null,
                'storage_id'        => null,
                'amount'            => null,
                'description'       => 'Začatie varenia: naplnenie nádrže '.$data['form']['status'].' litrami vody | '.$data['form']['description']
            ];
            $this->db->insert('brewing_log', $brew_log);
        } else {
            return false;
        }
    }

    public function finish_brewing($data)
    {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `brew_list_id` FROM `brewing_lists` WHERE `tank_id` = '.$data['tank']['id'])->row();
        if ($row) {
            $maxid = $row->brew_list_id;
        }

        if($maxid === 0) {
            return ['error' => true, 'msg' => 'ID varného listu je 0'];
        }

        $query = $this->db->get_where('brewing_lists', array('id' => $data['tank']['id']));
        $brew_list = $query->row_array();
        $brew_list['date_end'] = date('Y-m-d H:i:s', time());

        $this->db->update('brewing_lists', $brew_list, array('id' => $brew_list['id']));

        $brew_log = [
            'brewing_list_id'   => $brew_list['id'],
            'action'            => null,
            'storage_id'        => null,
            'amount'            => null,
            'description'       => 'Ukončenie varenia'
        ];
        $this->db->insert('brewing_log', $brew_log);
    }

    public function add_step($data)
    {
        foreach($data['form'] as $key => &$value) {
            if(empty($value)) {
                $key = null;
            }
        }

        if(!empty($data['form']['storage_id'])) {
            $query = $this->db->get_where('storage', array('id' => $data['form']['storage_id']));
            $item = $query->row_array();
            $item['amount'] -= $data['form']['amount'];
            $this->db->update('storage', $item, array('id' => $item['id']));

            $storage_log = [
                'storage_id'    => $item['id'],
                'action'        => 'deduct',
                'amount'        => $data['form']['amount'],
                'source'        => 'Varenie',
                'source_type'   => 'brewing_list',
                'source_id'     =>  $data['brew_list']['id']
            ];
            $this->db->insert('storage_log', $storage_log);
        }

        $this->db->insert('brewing_log', $data['form']);
    }

    public function get_tank_by_brew_list($id)
    {
        if (!empty($id)) {
            $query = $this->db->get_where('brewing_lists', array('id' => $id));
            $brew_list = $query->row_array();

            $query = $this->db->get_where('tanks', array('id' => $brew_list['tank_id']));
            $tank = $query->row_array();

            return $tank;
        } else {
            return false;
        }
    }

    public function update_step($step)
    {
        $this->db->update('brewing_log', $step, array('id' => $step['id']));
    }

    public function delete_step($id)
    {
        $this->db->delete('brewing_log', array('id' => $id));
    }

}
