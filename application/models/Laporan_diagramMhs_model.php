<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_diagramMhs_model extends CI_Model
{
    public function chart_database()
    {
        return $this->db->get('percobaancharts')->result();
    }
}
