<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url('assets/bootstrap/js/dist/') ?>color-modes.js"></script>
    <script src="<?= base_url('assets/bootstrap/dist/js/') ?>bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/dist/css/') ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/') ?>sweetalert2.css">
    <!-- Bootstrap JS -->

    <link rel="stylesheet" href="<?= base_url('assets/select2/dist/css/') ?>select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/select2/select2-bootstrap5/') ?>select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/select2/select2-bootstrap5/') ?>select2-bootstrap-5-theme.rtl.min.css">
    <script src="<?= base_url('assets/js/') ?>jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/select2/dist/js/') ?>select2.min.js"></script>
    <script src="<?= base_url('assets/select2/dist/js/') ?>select2.full.min.js"></script>
    <title>SIDOKEP</title>
</head>
<div class="flashData" id="<?= $this->session->userdata('icon') ?>" data-message="<?= $this->session->flashdata('message'); ?>" data-tittle="<?= $this->session->flashdata('tittle'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>"></div>