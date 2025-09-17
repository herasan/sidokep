<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

/* End of file: Sistem_helper.php */
