<?php
class Export_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_exports($user_id = false, $id = null)
    {
        if ($id !== null && $user_id !== false) {
            $query = $this->db->get_where('export', array('id' => $id, 'user_id' => $user_id));
            return $query->row_array();
        } else if($user_id !== false) {
            $query = $this->db->get_where('export', array('user_id' => $user_id));
            $exports = $query->result_array();
            foreach($exports as &$export) {
                $query = $this->db->get_where('clients', array('id' => $export['client_id']));
                $export['client'] = $query->row_array();
                $query = $this->db->get_where('tanks', array('id' => $export['tank_id']));
                $export['tank'] = $query->row_array();
            }
            return $exports;
        } else {
            return false;
        }
    }

    public function export_beer($data)
    {
        $this->db->insert('export', $data['form']);

        $query = $this->db->get_where('tanks', array('id' => $data['form']['tank_id']));
        $tank = $query->row_array();
        $tank['status'] -= $data['form']['amount'];
        $this->db->update('tanks', $tank, array('id' => $data['form']['tank_id']));
    }

    public function update_item($item)
    {
        $this->db->update('export', $item, array('id' => $item['id']));
    }

    public function delete_item($id)
    {
        $this->db->delete('export', array('id' => $id));
    }

}
