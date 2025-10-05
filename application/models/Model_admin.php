<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getAllDataKegiatan()
    {
        $query = $this->db->get('tujuan_kegiatan');
        return $query->result_array();
    }

    function addDataKegiatan($data)
    {
        $this->db->insert('tujuan_kegiatan', $data);
    }

    function getAllDataLaporan()
    {
        $query = $this->db->get('dokumentasi_kegiatan');
        return $query->result_array();
    }

    function jumlahLaporanBulanLalu()
    {
        $bulan_lalu = date('m', strtotime('-1 month'));
        $tahun_ini = date('Y');

        $this->db->where('MONTH(tanggal_kegiatan)', $bulan_lalu);
        $this->db->where('YEAR(tanggal_kegiatan)', $tahun_ini);

        return $this->db->get('dokumentasi_kegiatan')->num_rows();
    }

    function jumlahLaporanBulan()
    {
        $bulan_ini = date('m');
        $tahun_ini = date('Y');

        $this->db->where('MONTH(tanggal_kegiatan)', $bulan_ini);
        $this->db->where('YEAR(tanggal_kegiatan)', $tahun_ini);

        return $this->db->get('dokumentasi_kegiatan')->num_rows();
    }

    function jumlahLaporanTahun()
    {
        $tahun_ini = date('Y');
        $this->db->where('YEAR(tanggal_kegiatan)', $tahun_ini);
        return $this->db->get('dokumentasi_kegiatan')->num_rows();
    }

    function jumlahTotalLaporan()
    {
        return $this->db->get('dokumentasi_kegiatan')->num_rows();
    }

    function laporanPerBulan()
    {
        // Ambil tahun yang ingin ditampilkan
        $tahun_ini = date('Y');

        // Ambil jumlah data per bulan dari database
        $this->db->select("MONTH(tanggal_kegiatan) AS bulan, COUNT(*) AS jumlah");
        $this->db->from('dokumentasi_kegiatan');
        $this->db->where('YEAR(tanggal_kegiatan)', $tahun_ini);
        $this->db->group_by('MONTH(tanggal_kegiatan)');
        $this->db->order_by('MONTH(tanggal_kegiatan)', 'ASC');

        $query = $this->db->get();
        $result = $query->result_array();

        // Siapkan daftar bulan 1–12
        $nama_bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Siapkan array hasil akhir
        $data_per_bulan = [];

        // Isi data per bulan, jika tidak ada maka isi 'kosong'
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($result as $row) {
                if ((int)$row['bulan'] === $i) {
                    $data_per_bulan[$nama_bulan[$i]] = (int)$row['jumlah'];
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $data_per_bulan[$nama_bulan[$i]] = 0;
            }
        }

        // $data_per_bulan siap dipakai
        return $data_per_bulan;
    }

    function getAllDataPegawai()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function getDataPegawai($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    function addDataPegawai($data)
    {
        return $this->db->insert('users', $data);
    }

    function updateDataPegawai($data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    function deleteDataPegawai($id)
    {
        return $this->db->delete('users', array('id_user' => $id));
    }
}

/* End of file: Model_admin.php */
