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
        date_default_timezone_set('Asia/Jakarta');
        access(['Admin', 'Kepala']);
        $this->load->model('Model_admin');

        $data['laporan_bulan_lalu'] = $this->Model_admin->jumlahLaporanBulanLalu();
        $data['laporan_bulan'] = $this->Model_admin->jumlahLaporanBulan();
        $data['laporan_tahun'] = $this->Model_admin->jumlahLaporanTahun();
        $data['total_laporan'] = $this->Model_admin->jumlahTotalLaporan();
        $data['perbulan'] = $this->Model_admin->laporanPerBulan();
        $data['content'] = 'admin/dashboard';
        $this->load->view('admin/layout/wrapper', $data);
    }

    // PEGAWAI
    function pegawai($act = null, $id = null)
    {
        access(['Admin']);

        if ($act == "delete" && $id != null) {
            if ($this->db->get_where('users', ['id_user' => $id])->num_rows() < 1) {
                $this->load->view('404');
                return;
            }
            $this->load->model('Model_admin');
            $this->Model_admin->deleteDataPegawai($id);
            redirect('admin/pegawai', 'refresh');
        } elseif ($act == "edit" && $id != null) {
            if ($this->db->get_where('users', ['id_user' => $id])->num_rows() < 1) {
                $this->load->view('404');
                return;
            }
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
                    if ($this->input->post('status') == 'ASN') {
                        $data = array(
                            'nama' => $this->input->post('nama'),
                            'status' => $this->input->post('status'),
                            'nip' => $this->input->post('nip'),
                            'username' => $this->input->post('username'),
                            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                            'jabatan' => $this->input->post('jabatan'),
                            'role' => $this->input->post('role')
                        );
                    } else {
                        $data = array(
                            'nama' => $this->input->post('nama'),
                            'status' => $this->input->post('status'),
                            'nip' => '',
                            'username' => $this->input->post('username'),
                            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                            'jabatan' => $this->input->post('jabatan'),
                            'role' => $this->input->post('role')
                        );
                    }
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

    function kegiatan($act = null, $id = null)
    {
        access(['Admin']);

        if ($act == "add" && $id == null) {
            $this->load->model('Model_admin');
            if ($this->input->post()) {
                $this->form_validation->set_rules('klaster', 'Klaster Kegiatan', 'required');
                $this->form_validation->set_rules('jenis_kegiatan', 'Tujuan Kegiatan', 'required|is_unique[jenis_kegiatan.jenis_kegiatan]');
                if ($this->form_validation->run() == FALSE) {
                    if ($this->form_validation->error_array()) {
                        flashData('Tujuan Kegiatan gagal ditambahkan!', 'Tambah Tujuan Kegiatan Gagal', 'error');
                    }
                    $data['content'] = 'admin/form_kegiatan';
                    $this->load->view('admin/layout/wrapper', $data);
                } else {
                    $data = array(
                        'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
                        'klaster' => $this->input->post('klaster')
                    );
                    $this->Model_admin->addDataKegiatan($data);
                    flashData('Tujuan Kegiatan berhasil ditambahkan!', 'Tambah Tujuan Kegiatan Berhasil', 'success');
                    redirect('admin/kegiatan', 'refresh');
                }
            }
            $data['content'] = 'admin/form_kegiatan';
            $this->load->view('admin/layout/wrapper', $data);
        } elseif ($act == "hapus" && $id != null) {
            if ($this->db->get_where('jenis_kegiatan', ['id_kegiatan' => $id])->num_rows() < 1) {
                $this->load->view('404');
                return;
            }
            $this->load->model('Model_admin');
            $this->db->where('id_kegiatan', $id);
            $this->db->delete('jenis_kegiatan');
            flashData('Tujuan Kegiatan berhasil dihapus!', 'Hapus Tujuan Kegiatan Berhasil', 'success');
            redirect('admin/kegiatan', 'refresh');
        } elseif ($act == null && $id == null) {
            $data['content'] = 'admin/kegiatan';
            $this->load->model('Model_admin');
            $data['kegiatan'] = $this->Model_admin->getAllDataKegiatan();
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $this->load->view('404');
        }
    }

    function laporan($act = null, $id = null)
    {
        access(['Admin', 'Kepala']);

        if ($act == "detail" && $id != null) {
            if ($this->db->get_where('dokumentasi_kegiatan', ['id_dokumentasi' => $id])->num_rows() < 1) {
                $this->load->view('404');
                return;
            }
            $this->load->model('Model_admin');
            $data['laporan'] = $this->db->get_where('dokumentasi_kegiatan', ['id_dokumentasi' => $id])->row_array();
            $data['content'] = 'admin/detail_laporan';
            $data['kegiatan'] = $this->Model_admin->getAllDataKegiatan();
            $this->load->view('admin/layout/wrapper', $data);
        } elseif ($act == "hapus" && $id != null) {
            if ($this->db->get_where('dokumentasi_kegiatan', ['id_dokumentasi' => $id])->num_rows() < 1) {
                $this->load->view('404');
                return;
            }
            $this->load->model('Model_admin');
            $laporan = $this->db->get_where('dokumentasi_kegiatan', ['id_dokumentasi' => $id])->row_array();
            for ($i = 1; $i <= 4; $i++) {
                unlink(FCPATH . 'assets/img/foto_kegiatan/foto/' . $laporan['foto' . $i]);
            }
            $this->db->where('id_dokumentasi', $id);
            $this->db->delete('dokumentasi_kegiatan');
            flashData('Doku Kegiatan berhasil dihapus!', 'Hapus Dokumentasi Kegiatan Berhasil', 'success');
            redirect('admin/laporan', 'refresh');
        } elseif ($act == null && $id == null) {
            $this->load->model('Model_admin');
            // Ambil input dari GET (filter)
            $start_date = $this->input->get('start_date');
            $end_date   = $this->input->get('end_date');
            $jenis_kegiatan = $this->input->get('jenis_kegiatan');
            $pelapor    = $this->input->get('pelapor');

            // Data untuk dropdown pelapor
            $data['jenis_list']   = $this->Model_admin->get_jenis_list();
            $data['pelapor_list'] = $this->Model_admin->get_pelapor_list();

            // Ambil data kegiatan sesuai filter
            $data['laporan'] = $this->Model_admin->get_filtered_data($start_date, $end_date, $pelapor, $jenis_kegiatan);

            $data['content'] = 'admin/laporan';
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $this->load->view('404');
        }
    }
}

/* End of file: Admin.php */
