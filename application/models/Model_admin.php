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

    function addDataPegawai() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'jabatan' => $this->input->post('jabatan'),
        );
        return $this->db->insert('users', $data);
    }

    function updatePegawai() {
        $id = $this->uri->segment(4);
        $data = array(
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'jabatan' => $this->input->post('jabatan'),
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
        
    }

    function deletePegawai() {
        $id = $this->uri->segment(4);
        return $this->db->delete('users', array('id' => $id));
    }
}

/* End of file: Model_admin.php */
