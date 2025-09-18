<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect('auth/login', 'refresh');
    }

    public function login()
    {
        $data['content'] = 'home/login';
        $this->load->view('layout/wrapper', $data);
    }

    function register()
    {
        $data['content'] = 'home/register';
        $this->load->view('layout/wrapper', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }

}

/* End of file: Login.php */
