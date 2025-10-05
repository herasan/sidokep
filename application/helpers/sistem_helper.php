<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Menyingkat flashdata sweetalert agar lebih mudah digunakan
function flashData($message, $tittle, $icon)
{
    $CI = &get_instance();

    $CI->session->set_flashdata(
        'message',
        $message
    );
    $CI->session->set_flashdata(
        'tittle',
        $tittle
    );
    $CI->session->set_flashdata(
        'icon',
        $icon
    );
}

// Proteksi ketika sudah melakukan login, maka tidak bisa akses halaman login
function hasbeenLoggedIn()
{
    $CI = &get_instance();
    if ($CI->session->userdata('role')) {
        if ($CI->session->userdata('role') == "Admin") {
            redirect(base_url('admin'), 'refresh');
        } elseif ($CI->session->userdata('role') == "Pimpinan") {
            redirect(base_url('admin'), 'refresh');
        } else {
            redirect(base_url('home'), 'refresh');
        }
    }
}

function access($allowed = [])
{
    $CI = &get_instance();
    if (!$CI->session->userdata('role')) {
        flashData('Silahkan login terlebih dahulu', 'Akses ditolak', 'warning');
        redirect('auth/login', 'refresh');
    } elseif (!in_array($CI->session->userdata('role'), $allowed)) {
        redirect('auth/error', 'refresh');
    }
}

/* End of file: Sistem_helper.php */
