<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_semester_model extends CI_Model
{


    public function get_data($table, $where)
    {
        $this->db->where($where);

        return $this->db->get($table);
    }
}
