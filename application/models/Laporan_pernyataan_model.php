<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pernyataan_model extends CI_Model
{
    public function get_data($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($data, $table)
    {
        $this->db->where('id_pernyataan', $data['id_pernyataan']);
        $this->db->update($table, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
