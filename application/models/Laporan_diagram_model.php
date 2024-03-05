<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_diagram_model extends CI_Model
{
    public function chart_database()
    {
        return $this->db->get('percobaancharts')->result();
    }
    public function get_data($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }
    public function join_data($table, $where, $tabel2, $join)
    {
        $this->db->join($tabel2, $join, 'left');
        $this->db->where($where);
        return $this->db->get($table);
    }
}
