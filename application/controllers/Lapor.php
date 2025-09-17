<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_lapor');
    }

    public function index()
    {
        $this->form_validation->set_rules('pelapor_kegiatan', 'Pelapor Kegiatan', 'required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tujuan_kegiatan', 'Tujuan Kegiatan', 'required');
        if ($this->input->post('tujuan_kegiatan') == 'Lainnya') {
            $this->form_validation->set_rules('lainnya_tujuan', 'Kegiatan Lainnya', 'required');
        }
        $this->form_validation->set_rules('tempat_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('hasil_kegiatan', 'Hasil Kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            if ($this->form_validation->error_array()) {
                flashData('Pelaporan gagal ditambahkan!', 'Tambah Pelaporan Gagal', 'error');
            }

            $data['content'] = 'home/lapor';
            $data['tujuan_kegiatan'] = $this->Model_lapor->getAllTujuanKegiatan();
            $this->load->view('layout/wrapper', $data);
        } else {
            $upload = [];
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
                        $config['file_name'] = $_FILES['fotos']['name'][$i];
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('foto')) {
                            $uploadData = $this->upload->data();
                            // create thumbnail
                            $configer['image_library'] = 'gd2';
                            $configer['source_image'] = $uploadData['full_path'];
                            $configer['new_image'] = './assets/img/foto_kegiatan/thumb/';
                            $configer['maintain_ratio'] = TRUE;
                            $configer['width']         = 600; //pixel
                            $configer['master_dim'] = 'width'; // This ensures the width is maintained, and height is auto
                            
                            // agar file yang diconvert tidak ada _thumbs dibelakangnya
                            $configer['thumb_marker'] = '';
                            
                            $this->load->library('image_lib', $configer);
                            $this->image_lib->initialize($configer);
                            $this->image_lib->resize();

                            $this->image_lib->clear();
                            
                            $filename = $uploadData['file_name'];
                            $upload['totalFiles'][] = $filename;
                        } else {
                            var_dump($this->upload->display_errors());
                            die;
                            flashData('File yang diupload ada yang belum sesuai!', 'Gagal Upload File', 'error');
                            redirect('lapor', 'refresh');
                        }
                    }
                }
            }


            $pelapor_kegiatan = $this->input->post('pelapor_kegiatan', true);
            $nama_kegiatan = $this->input->post('nama_kegiatan', true);
            $tujuan_kegiatan = $this->input->post('tujuan_kegiatan', true);
            if ($tujuan_kegiatan == 'Lainnya') {
                $tujuan_kegiatan = $this->input->post('lainnya_tujuan', true);
            }
            $tempat_kegiatan = $this->input->post('tempat_kegiatan', true);
            $tanggal_kegiatan = $this->input->post('tanggal_kegiatan', true);
            $hasil_kegiatan = $this->input->post('hasil_kegiatan', true);
            $data = [
                'pelapor_kegiatan' => $pelapor_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'tujuan_kegiatan' => $tujuan_kegiatan,
                'tempat_kegiatan' => $tempat_kegiatan,
                'tanggal_kegiatan' => $tanggal_kegiatan,
                'hasil_kegiatan' => $hasil_kegiatan,
            ];



            flashData('Berhasil menambahkan menu baru!', 'Add Menu', 'success');
            redirect('lapor', 'refresh');
        }
    }
}
/* End of file: Lapor.php */
