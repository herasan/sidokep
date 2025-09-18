<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data['content'] = 'admin/dashboard';
        $this->load->view('admin/layout/wrapper', $data);
    }

    // PEGAWAI
    function pegawai() {
        $data['content'] = 'admin/pegawai';
        $this->load->view('admin/layout/wrapper', $data);
    }

    function kegiatan() {
        $data['content'] = 'admin/kegiatan';
        $this->load->model('Model_admin');
        $data['kegiatan'] = $this->Model_admin->getAllDataKegiatan();
        $this->load->view('admin/layout/wrapper', $data);
    }

    function laporan() {
        $data['content'] = 'admin/laporan';
        $this->load->model('Model_admin');
        $data['laporan'] = $this->Model_admin->getAllDataLaporan();
        $this->load->view('admin/layout/wrapper', $data);
    }

}

/* End of file: Admin.php */
