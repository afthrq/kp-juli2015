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
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php print_r($this->session->userdata('user_name')) ?>">Welcome, <?php print_r($this->session->userdata('user_name')) ?>!</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="<?php echo base_url(); ?>user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_srv"><i class="fa fa-edit fa-fw"></i> Survey <span class="badge pull-right"><?php echo $count_srv?></span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_imp"><i class="fa fa-edit fa-fw"></i> Implementasi <span class="badge pull-right"><?php echo $count_imp?></span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_balo" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Berita Acara Laik Operasi <span class="badge pull-right"><?php echo $count_balo?></span></a>
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
                            <h1 class="page-header">Berita Acara yang perlu diisi</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Permintaan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Perusahaan</th>
                                                    <th>Jenis Lokasi</th>
                                                    <th>Lokasi</th>
                                                    <th>Layanan</th>
                                                    <th>Bandwidth</th>
                                                    <th>Tipe Permintaan</th>
                                                    <th>No. Permintaan</th>
                                                    <th>Tanggal Permintaan</th>
                                                    <th>Tgl. Akhir Pengerjaan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 0; foreach ($list_permintaan as $row) : $count++;?>
                                                    <form method="POST" action="<?php echo base_url('wananalyst/balo')?>">
                                                    <input type="hidden" name="order_id" value="<?php echo $row->site_name ?>">
                                                    <tr>
                                                      <td><?php echo $count?></td>
                                                      <td><input type="submit" value="<?php //echo $row->company_name?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->type_name?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->site_name ?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->service_name?> | <?php echo $row->package?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->bw ?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->name ?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->name ?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->no_form_permintaan ?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php echo $row->tgl_permintaan ?>" class="btn btn-default btn-table"></td>
                                                      <td><input type="submit" value="<?php //echo $row-> ?>" class="btn btn-default btn-table"></td>
                                                    </tr>
                                                    </form>
                                                <?php endforeach ?>
                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    <!-- /.row -->
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