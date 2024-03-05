<?php
defined('BASEPATH') or exit('No direct script access allowed');

class isi_kuesioner_model extends CI_Model
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
    public function join_data($table, $where, $tabel2, $join)
    {
        $this->db->join($tabel2, $join, 'left');
        $this->db->where($where);
        return $this->db->get($table);
    }
}
