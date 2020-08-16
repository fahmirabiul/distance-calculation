<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Distance Measurement</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/adlt/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adlt/dist/css/adminlte.min.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link">
                <span class="brand-text font-weight-light"><b>DISTANCE MEASUREMENT</b>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('home/daftarKaryawan'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar Karyawan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('home/waktu'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Berdasarkan Waktu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('home/npp'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Berdasarkan NPP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('tigametode/hasilmanual'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Perbandingan Akurasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('home/punctuality'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Waktu Pengiriman Data</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?= base_url('home/comparison'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Euclidean-Haversine</p>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="<?= base_url('assets/adlt'); ?>" target="_blank" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assets</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="p-3">