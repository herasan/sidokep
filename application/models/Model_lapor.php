<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_lapor extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getAllTujuanKegiatan()
    {
        $query = $this->db->get('jenis_kegiatan');
        return $query->result_array();
    }

    function addLaporan($data)
    {
        $this->db->insert('dokumentasi_kegiatan', $data);
    }

    public function get_by_user_filter($user_id, $start_date = null, $end_date = null, $jenis_kegiatan = null)
    {
        $this->db->where('id_pelapor', $user_id);

        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('tanggal_kegiatan >=', $start_date);
            $this->db->where('tanggal_kegiatan <=', $end_date);
        }

        if (!empty($jenis_kegiatan)) {
            $this->db->where('jenis_kegiatan', $jenis_kegiatan);
        }

        $this->db->order_by('tanggal_kegiatan', 'DESC');
        return $this->db->get('dokumentasi_kegiatan')->result_array();
    }

    public function get_jenis_list()
    {
        $this->db->distinct();
        $this->db->select('jenis_kegiatan');
        $this->db->from('jenis_kegiatan');
        $this->db->order_by('jenis_kegiatan', 'ASC');
        return $this->db->get()->result_array();
    }
}

/* End of file: Model_lapor.php */
