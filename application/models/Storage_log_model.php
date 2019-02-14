<?php
class Storage_log_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_by_user_id($user_id = false)
    {
        if ($user_id !== false) {
            $query = $this->db->get_where('storage_log', array('user_id' => $user_id));
            $storage_log = $query->result_array();
            foreach($storage_log as &$row) {
                $query = $this->db->get_where('storage', array('id' => $row['storage_id']));
                $row['storage_item'] = $query->row_array();
            }
            return $storage_log;
        } else {
            return false;
        }
    }

    public function add_log()
    {
        $this->load->helper('url');

        return $this->db->insert('storage_log', $data);
    }

    public function update_log($item)
    {
        $this->db->update('storage_log', $item, array('id' => $item['id']));
    }

    public function delete_log($id)
    {
        $this->db->delete('storage_log', array('id' => $id));
    }

}
