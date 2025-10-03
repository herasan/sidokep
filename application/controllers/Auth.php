<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('auth/login', 'refresh');
    }

    public function login()
    {
        if ($this->input->post()) {
            // Validasinya success
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', array('username' => $username))->row_array();

            // Cek jika data user ada
            if ($user) {
                // Cek jika password benar
                if (password_verify($password, $user['password'])) {

                    // Kalau semua sudah dicek maka buat session
                    $data = [
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role'] == "Admin") {
                        redirect(base_url('admin'), 'refresh');
                    } elseif ($user['role'] == "Pimpinan") {
                        redirect(base_url('admin'), 'refresh');
                    } else {
                        redirect(base_url('home'), 'refresh');
                    }
                } else {
                    flashData('Password salah', 'Login Gagal', 'error');
                    redirect(base_url('auth/login'));
                }
            } else {
                flashData('Username tidak terdaftar', 'Login Gagal', 'error');
                redirect(base_url('auth/login'));
            }
        } else {
            $data['content'] = 'home/login';
            $this->load->view('layout/wrapper', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }
}

/* End of file: Login.php */
