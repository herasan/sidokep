<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_lapor');
        access(['Pegawai', 'Admin', 'Kepala']);
    }

    public function index()
    {
        $this->form_validation->set_rules('pelapor_kegiatan', 'Pelapor Kegiatan', 'required');
        $this->form_validation->set_rules('judul_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('jenis_kegiatan', 'Tujuan Kegiatan', 'required');
        if ($this->input->post('jenis_kegiatan') == 'Lainnya') {
            $this->form_validation->set_rules('lainnya_tujuan', 'Kegiatan Lainnya', 'required');
        }
        $this->form_validation->set_rules('tempat_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('hasil_kegiatan', 'Hasil Kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            if ($this->form_validation->error_array()) {
                flashData('Pelaporan gagal ditambahkan!', 'Tambah Pelaporan Gagal', 'error');
            }

            $data['login'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $data['content'] = 'home/lapor';
            $data['jenis_kegiatan'] = $this->Model_lapor->getAllTujuanKegiatan();
            $this->load->view('layout/wrapper', $data);
        } else {
            $upload = [];
            $raw = [];
            if (isset($_FILES['fotos'])) {
                $count = count($_FILES['fotos']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['fotos']['name'][$i])) {
                        $_FILES['foto']['name'] = $_FILES['fotos']['name'][$i];
                        $_FILES['foto']['type'] = $_FILES['fotos']['type'][$i];
                        $_FILES['foto']['tmp_name'] = $_FILES['fotos']['tmp_name'][$i];
                        $_FILES['foto']['error'] = $_FILES['fotos']['error'][$i];
                        $_FILES['foto']['size'] = $_FILES['fotos']['size'][$i];

                        $config['upload_path'] = './assets/img/foto_kegiatan/foto/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = 10000;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('foto')) {
                            $uploadData = $this->upload->data();
                            // create thumbnail
                            $configer['image_library'] = 'gd2';
                            $configer['source_image'] = $uploadData['full_path'];
                            $configer['new_image'] = './assets/img/foto_kegiatan/foto/';
                            $configer['create_thumb'] = TRUE;
                            $configer['maintain_ratio'] = TRUE;
                            $configer['width']         = 600; //pixel
                            $configer['master_dim'] = 'width'; // This ensures the width is maintained, and height is auto

                            // agar file yang diconvert tidak ada _thumbs dibelakangnya
                            $configer['thumb_marker'] = '_thumb';

                            $this->load->library('image_lib', $configer);
                            $this->image_lib->initialize($configer);
                            $this->image_lib->resize();

                            $this->image_lib->clear();

                            $filename = $uploadData['raw_name'] . '_thumb' . $uploadData['file_ext'];
                            $raw['raw'][] = $uploadData['file_name'];
                            $upload['totalFiles'][] = $filename;
                            // var_dump($raw['raw']);
                            // die;
                        } else {
                            // 🔥 HAPUS semua file yang sudah berhasil diupload sebelumnya
                            foreach ($upload['totalFiles'] as $file) {
                                if (file_exists('./assets/img/foto_kegiatan/foto/' . $file)) {
                                    unlink('./assets/img/foto_kegiatan/foto/' . $file);
                                }
                            }
                            foreach ($raw['raw'] as $raw) {
                                if (file_exists('./assets/img/foto_kegiatan/foto/' . $raw)) {
                                    unlink('./assets/img/foto_kegiatan/foto/' . $raw);
                                }
                            }
                            flashData('File yang diupload ada yang belum sesuai!', 'Gagal Upload File', 'error');
                            redirect('lapor', 'refresh');
                        }
                    } else {
                        // 🔥 HAPUS semua file yang sudah berhasil diupload sebelumnya
                        foreach ($upload['totalFiles'] as $file) {
                            if (file_exists('./assets/img/foto_kegiatan/foto/' . $file)) {
                                unlink('./assets/img/foto_kegiatan/foto/' . $file);
                            }
                        }
                        foreach ($raw['raw'] as $raw) {
                            if (file_exists('./assets/img/foto_kegiatan/foto/' . $raw)) {
                                unlink('./assets/img/foto_kegiatan/foto/' . $raw);
                            }
                        }
                        flashData('File yang diupload ada yang belum sesuai!', 'Gagal Upload File', 'error');
                        redirect('lapor', 'refresh');
                    }
                }
            }

            $pelapor_kegiatan = $this->input->post('pelapor_kegiatan', true);
            $judul_kegiatan = $this->input->post('judul_kegiatan', true);
            $jenis_kegiatan = $this->input->post('jenis_kegiatan', true);
            $tempat_kegiatan = $this->input->post('tempat_kegiatan', true);
            $tanggal_kegiatan = $this->input->post('tanggal_kegiatan', true);
            $hasil_kegiatan = $this->input->post('hasil_kegiatan', true);
            $data = [
                'id_pelapor' => $this->session->userdata('id_user'),
                'pelapor_kegiatan' => $pelapor_kegiatan,
                'judul_kegiatan' => $judul_kegiatan,
                'jenis_kegiatan' => $jenis_kegiatan,
                'tempat_kegiatan' => $tempat_kegiatan,
                'tanggal_kegiatan' => $tanggal_kegiatan,
                'hasil_kegiatan' => $hasil_kegiatan,
                'foto1' => $upload['totalFiles'][0],
                'foto2' => $upload['totalFiles'][1],
                'foto3' => $upload['totalFiles'][2],
                'foto4' => $upload['totalFiles'][3],
            ];

            $this->Model_lapor->addLaporan($data);
            foreach ($raw['raw'] as $raw) {
                if (file_exists('./assets/img/foto_kegiatan/foto/' . $raw)) {
                    unlink('./assets/img/foto_kegiatan/foto/' . $raw);
                }
            }

            flashData('Berhasil menambahkan laporan!', 'Tambah Laporan', 'success');
            redirect('lapor/laporan', 'refresh');
        }
    }

    function laporan()
    {
        $this->load->model('Model_lapor');
        $data['login'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['content'] = 'home/my_laporan';

        $start_date     = $this->input->get('start_date');
        $end_date       = $this->input->get('end_date');
        $jenis_kegiatan = $this->input->get('jenis_kegiatan');

        // Filter data sesuai input
        $data['laporan'] = $this->Model_lapor->get_by_user_filter($data['login']['id_user'], $start_date, $end_date, $jenis_kegiatan);
        $data['jenis_list'] = $this->Model_lapor->get_jenis_list();
        $this->load->view('layout/wrapper', $data);
    }

    function detail($id)
    {
        $data['login'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['content'] = 'home/detail_laporan';
        $data['laporan'] = $this->Model_lapor->getLaporanById($id);
        if (!$data['laporan']) {
            redirect('auth/error', 'refresh');
        }
        $this->load->view('layout/wrapper', $data);
    }

    function hapus($id)
    {
        if ($this->db->get_where('dokumentasi_kegiatan', ['id_dokumentasi' => $id])->num_rows() < 1) {
            return redirect('auth/error', 'refresh');
        }
        $laporan = $this->db->get_where('dokumentasi_kegiatan', ['id_dokumentasi' => $id])->row_array();
        for ($i = 1; $i <= 4; $i++) {
            unlink(FCPATH . 'assets/img/foto_kegiatan/foto/' . $laporan['foto' . $i]);
        }
        // die;

        $this->db->where('id_dokumentasi', $id);
        $this->db->delete('dokumentasi_kegiatan');
        flashData('Berhasil menghapus laporan!', 'Hapus Laporan', 'success');
        redirect('lapor/laporan', 'refresh');
    }
}
/* End of file: Lapor.php */
