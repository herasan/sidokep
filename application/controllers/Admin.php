<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['content'] = 'admin/dashboard';
        $this->load->view('admin/layout/wrapper', $data);
    }

    // PEGAWAI
    function pegawai($act = null, $id = null)
    {
        if ($act == "delete" && $id != null) {
            $this->load->model('Model_admin');
            $this->Model_admin->deleteDataPegawai($id);
            redirect('admin/pegawai', 'refresh');
        } elseif ($act == "edit" && $id != null) {
            $this->load->model('Model_admin');
            if ($this->input->post()) {
                $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
                $this->form_validation->set_rules('status', 'Status Pegawai', 'required');
                if ($this->input->post('status') == 'ASN') {
                    $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[users.nip]|numeric');
                } else {
                    $this->form_validation->set_rules('nip', 'NIP', 'is_unique[users.nip]|numeric');
                }
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
                $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
                $this->form_validation->set_rules('confirm_password', 'Ulangi Password', 'matches[password]');
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
                $this->form_validation->set_rules('role', 'Role', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    if ($this->form_validation->error_array()) {
                        flashData('Pegawai gagal diubah!', 'Edit Pegawai Gagal', 'error');
                    }
                    $data['content'] = 'admin/form_pegawai';
                    $this->load->view('admin/layout/wrapper', $data);
                } else {
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'status' => $this->input->post('status'),
                        'nip' => $this->input->post('nip'),
                        'username' => $this->input->post('username'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'jabatan' => $this->input->post('jabatan'),
                        'role' => $this->input->post('role')
                    );
                    $this->Model_admin->updateDataPegawai($data, $id);
                    flashData('Pegawai berhasil diubah!', 'Edit Pegawai Berhasil', 'success');
                    redirect('admin/pegawai', 'refresh');
                }
            }
            $data['pegawai'] = $this->Model_admin->getDataPegawai($id);
            $data['content'] = 'admin/form_pegawai_edit';
            $this->load->view('admin/layout/wrapper', $data);
            return;
        } elseif ($act == "add" && $id == null) {
            $this->load->model('Model_admin');
            if ($this->input->post()) {
                $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
                $this->form_validation->set_rules('status', 'Status Pegawai', 'required');
                if ($this->input->post('status') == 'ASN') {
                    $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[users.nip]|numeric');
                } else {
                    $this->form_validation->set_rules('nip', 'NIP', 'is_unique[users.nip]|numeric');
                }
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
                $this->form_validation->set_rules('password', 'Password', 'min_length[6]|required');
                $this->form_validation->set_rules('confirm_password', 'Ulangi Password', 'required|matches[password]');
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
                $this->form_validation->set_rules('role', 'Role', 'required');

                if ($this->form_validation->run() == FALSE) {
                    if ($this->form_validation->error_array()) {
                        flashData('Pegawai gagal ditambahkan!', 'Tambah Pegawai Gagal', 'error');
                    }
                    $data['content'] = 'admin/form_pegawai';
                    $this->load->view('admin/layout/wrapper', $data);
                } else {
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'status' => $this->input->post('status'),
                        'nip' => $this->input->post('nip'),
                        'username' => $this->input->post('username'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'jabatan' => $this->input->post('jabatan'),
                        'role' => $this->input->post('role')
                    );
                    $this->Model_admin->addDataPegawai($data);
                    flashData('Pegawai berhasil ditambahkan!', 'Tambah Pegawai Berhasil', 'success');
                    redirect('admin/pegawai', 'refresh');
                }
            }
            $data['content'] = 'admin/form_pegawai';
            $this->load->view('admin/layout/wrapper', $data);
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

    function kegiatan()
    {
        $data['content'] = 'admin/kegiatan';
        $this->load->model('Model_admin');
        $data['kegiatan'] = $this->Model_admin->getAllDataKegiatan();
        $this->load->view('admin/layout/wrapper', $data);
    }

    function laporan()
    {
        $data['content'] = 'admin/laporan';
        $this->load->model('Model_admin');
        $data['laporan'] = $this->Model_admin->getAllDataLaporan();
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file: Admin.php */
