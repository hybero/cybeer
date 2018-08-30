<?php
class Tanks_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_tanks($user_id = false, $id = false)
    {
        if ($id !== false) {
            $query = $this->db->get_where('tanks', array('id' => $id, 'user_id' => $user_id));
            return $query->row_array();
        } else if($user_id !== false) {
            $query = $this->db->get_where('tanks', array('user_id' => $user_id));
            $tanks = $this->calculate_fillings($query->result_array());
            return $tanks;
        } else {
            return false;
        }
    }

    public function set_tanks()
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('name'), 'dash', TRUE);

        $data = array(
            'name' => $this->input->post('name'),
            'capacity' => $this->input->post('capacity')
        );

        return $this->db->insert('tanks', $data);
    }

    public function update_tank($tank)
    {
        $this->db->update('tanks', $tank, array('id' => $tank['id']));
    }

    private function calculate_fillings($tanks)
    {
        foreach($tanks as &$tank) {
            $tank['filling_amount_percent'] = $tank['status'] / $tank['capacity'] * 100;
        }
        return $tanks;
    }
}
