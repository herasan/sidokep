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

    function getAllDataPegawai() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function getDataPegawai($id) {
        $this->db->where('id_user', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    function addDataPegawai($data) {
        return $this->db->insert('users', $data);
    }

    function updateDataPegawai($data, $id) {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
        
    }

    function deleteDataPegawai($id) {
        return $this->db->delete('users', array('id_user' => $id));
    }
}

/* End of file: Model_admin.php */
