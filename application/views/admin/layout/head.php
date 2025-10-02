<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Jquery -->
     
    <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/') ?>sweetalert2.css">
    
    <script src="<?= base_url('assets/sweetalert/') ?>sweetalert2.min.js" aria-hidden="true"></script>

</head>
<div class="flashData" id="<?= $this->session->userdata('icon') ?>" data-message="<?= $this->session->flashdata('message'); ?>" data-tittle="<?= $this->session->flashdata('tittle'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>"></div>
<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">