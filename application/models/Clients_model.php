<?php
class Clients_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_clients($user_id = false, $id = false)
    {
        if ($id !== false) {
            $query = $this->db->get_where('clients', array('id' => $id, 'user_id' => $user_id));
            return $query->row_array();
        } else if($user_id !== false) {
            $query = $this->db->get_where('clients', array('user_id' => $user_id));
            $clients = $query->result_array();
            return $clients;
        } else {
            return false;
        }
    }

    public function set_clients()
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('name'), 'dash', TRUE);

        $data = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'phone' => $this->input->post('phone'),
            'company' => $this->input->post('company'),
            'address' => $this->input->post('address'),
            'time' => $this->input->post('time'),
            'postcode' => $this->input->post('postcode'),
            'user_id' => $this->input->post('user_id'),
        );

        return $this->db->insert('clients', $data);
    }

    public function update_client($clent)
    {
        $this->db->update('clients', $clent, array('id' => $clent['id']));
    }

}
