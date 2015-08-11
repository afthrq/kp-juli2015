<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Ahmad Fathoriq Fauzi and Muhammad Ashari">
        <title>DB WAN</title>
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/metisMenu.min.css"') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
        <?php foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </head>
    <body class="admin-body">
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <img class="header-logo" src="<?php echo base_url('assets/img/header-pertamina.png') ?>" alt="">
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?php echo base_url(); ?>user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url() ?>admin" class="sidebar-active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>    
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Parameter Lokasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/jenis_lokasi">Jenis Lokasi</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/perusahaan">Perusahaan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/provinsi">Provinsi</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/region">Region</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Parameter Layanan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/provider">Provider</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/tipe_layanan">Tipe Layanan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/layanan">Layanan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/paket">Paket Layanan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/harga">Harga Layanan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/lastmile">Lastmile</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Parameter Lainnya<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/monitoring">Monitoring</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/tipe_permintaan">Tipe Permintaan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/proses">Proses Permintaan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>admin/tipe_dokumen">Tipe Dokumen</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>     
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12">
                        <?php echo $output; ?>
                      <!-- /.col-lg-12 -->
                    </div>
                    
                    
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/js/metisMenu.min.js')?>"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>
    </body>
</html>