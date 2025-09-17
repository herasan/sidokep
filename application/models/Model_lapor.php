<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_lapor extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getAllTujuanKegiatan() {
        $query = $this->db->get('tujuan_kegiatan');
        return $query->result_array();
    }

}

/* End of file: Model_lapor.php */
