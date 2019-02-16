<?php
class Storage_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_items($user_id = false, $id = null)
    {
        if ($id !== null && $user_id !== false) {
            $query = $this->db->get_where('storage', array('id' => $id, 'user_id' => $user_id));
            return $query->row_array();
        } else if($user_id !== false) {
            $query = $this->db->get_where('storage', array('user_id' => $user_id));
            $clients = $query->result_array();
            return $clients;
        } else {
            return false;
        }
    }

    public function add_item($data)
    {
        $this->load->helper('url');

        return $this->db->insert('storage', $data);
    }

    public function update_item($item)
    {
        $this->db->update('storage', $item, array('id' => $item['id']));
    }

    public function delete_item($id)
    {
        $this->db->delete('storage', array('id' => $id));
    }

}
