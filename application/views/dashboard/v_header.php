<!DOCTYPE html>
<html>
<?php
$id = $this->session->userdata('admin_id');

$admin = $this->db->query("SELECT * FROM tb_admin where admin_id='$id' ");
foreach ($admin->result() as $a) {
    $foto =  $a->admin_foto;
    $nama = $a->admin_username;
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Produk Unggulan - CPI | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link href="<?php echo base_url(); ?>assets/DataTables/datatables.css" rel="stylesheet" />

    <script src="<?php echo base_url(); ?>assets/dist/js/Chart.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="<?php echo base_url('dashboard'); ?>" class="logo">
                <span class="logo-mini"><b>PU</b></span>
                <span class="logo-lg"><b>Produk</b>Unggulan</span>
            </a>

            <nav class="navbar navbar-static-top">

                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url() . '/gambar/profil_user/' . $foto; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs">HAK AKSES : <?php echo $this->session->userdata('username') ?> <br /><b></b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?php echo base_url() . '/gambar/profil_user/' . $foto; ?>" class="img-circle" alt="User Image">
                                    <p>
                                        username : <br>
                                        <i><u><?= $this->session->userdata('username') ?></u></i>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url() . 'dashboard/profil' ?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url() . 'dashboard/keluar' ?>" class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url() . '/gambar/profil_user/' . $foto; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <a href="<?= base_url('dashboard') ?>"><i class="fa fa-circle text-success"></i> <?= $nama ?> <i>(Online)</i></a>


                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard' ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/kriteria' ?>">
                            <i class="fa fa-th"></i>
                            <span>DATA KRITERIA</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/sub_kriteria' ?>">
                            <i class="fa fa-users"></i>
                            <span>SUB KRITERIA</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/jenis_produk' ?>">
                            <i class="fa fa-users"></i>
                            <span>JENIS PRODUK</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/product' ?>">
                            <i class="fa fa-users"></i>
                            <span>PRODUCT</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url() . 'dashboard/nilai' ?>">
                            <i class="fa fa-th"></i>
                            <span>NILAI MAHASISWA</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/nilai' ?>">
                            <i class="fa fa-pencil"></i>
                            <span>NILAI</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/perangkingan' ?>">
                            <i class="fa fa-pencil"></i>
                            <span>PERANGKINGAN</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'dashboard/ganti_password' ?>">
                            <i class="fa fa-lock"></i>
                            <span>GANTI PASSWORD</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url() . 'dashboard/keluar' ?>">
                            <i class="fa fa-share"></i>
                            <span>KELUAR</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>