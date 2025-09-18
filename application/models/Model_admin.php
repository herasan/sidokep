<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getAllDataKegiatan() {
        $query = $this->db->get('tujuan_kegiatan');
        return $query->result_array();
    }

    function getAllDataLaporan() {
        $query = $this->db->get('dokumentasi_kegiatan');
        return $query->result_array();
    }

}

/* End of file: Model_admin.php */
