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
    function pegawai($act = null, $id = null) {
        if ($act == "delete" && $id != null) {
            $this->load->model('Model_admin');
            $this->Model_admin->deleteDataPegawai($id);
            redirect('admin/pegawai', 'refresh');
        } elseif ($act == "edit" && $id != null) {
            $this->load->model('Model_admin');
            if ($this->input->post('submit')) {
                $this->Model_admin->updateDataPegawai($id);
                redirect('admin/pegawai', 'refresh');
            }
            $data['pegawai'] = $this->Model_admin->getDataPegawai($id);
            $data['content'] = 'admin/pegawai_edit';
            $this->load->view('admin/layout/wrapper', $data);
            return;
        } elseif ($act == "add" && $id == null) {
            $this->load->model('Model_admin');
            if ($this->input->post('submit')) {
                $this->Model_admin->addDataPegawai();
                redirect('admin/form_pegawai', 'refresh');
            }
            $data['content'] = 'admin/form_pegawai';
            $this->load->view('admin/layout/wrapper', $data);
            return;
        } elseif ($act == null && $id == null) {
            $this->load->model('Model_admin');
            $data['pegawai'] = $this->Model_admin->getAllDataPegawai($id);
            $data['content'] = 'admin/pegawai';
            $this->load->view('admin/layout/wrapper', $data);
            return;
        } else {
            $this->load->view('404');
        }
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
