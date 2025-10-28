<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data['content'] = 'home/home';
        $this->load->view('layout/wrapper', $data);
    }

    function tutorial() {
        $data['content'] = 'home/tutorial';
        $this->load->view('layout/wrapper', $data);
    }

}

/* End of file: Home.php */
