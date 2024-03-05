<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_master_model extends CI_Model
{


    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function update_data($data, $table)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($table, $data);
    }
}
