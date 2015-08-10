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
                    <img class="header-logo" src="<?php echo base_url('assets/img/header-pertamina.png') ?>" alt="">
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <span class="user-name"><?php echo $this->session->userdata('user_name') ?></span>
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
                                <a href="<?php echo base_url() ?>inputor" class="sidebar-active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>   
                            <li class="active">
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Permintaan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_br" class="sidebar-active">Permintaan Baru</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan">Upgrade WAN</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_rl">Relokasi WAN</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_dm">Dismantle WAN</a>
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
                            <h1 class="page-header">Permintaan yang sedang dilakukan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data WAN
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
                                                    <th>Keterangan</th>
                                                    <th>Tipe Permintaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 0; foreach ($list_permintaan as $row) : $count++;?>
                                                    <form method="POST" action="<?php echo base_url('inputor/permintaan_reject')?>">
                                                    <tr>
                                                        <?php if ($row->p_process_id == 1): ?>
                                                            <?php if ($row->ord_name == "Pasang Baru"): ?>
                                                                <input type="hidden" name="order_id" value="<?php echo $row->site_name ?>">  
                                                                <td><?php echo $count?></td>
                                                                <td><input type="submit" value="<?php echo $row->company_name?>" class="btn btn-default btn-table"></td>
                                                                <td><input type="submit" value="<?php echo $row->type_name?>" class="btn btn-default btn-table"></td>
                                                                <td><input type="submit" value="<?php echo $row->site_name ?>" class="btn btn-default btn-table"></td>
                                                                <td><input type="submit" value="<?php echo $row->service_name?> | <?php echo $row->package?>" class="btn btn-default btn-table"></td>
                                                                <td><input type="submit" value="<?php echo $row->bw ?>" class="btn btn-default btn-table"></td>
                                                                <td><input type="submit" value="<?php echo "Rejected ("; echo $row->ket_reject; echo")" ?>" class="btn btn-default btn-table"></td>
                                                                <td><input type="submit" value="<?php echo $row->ord_name ?>" class="btn btn-default btn-table"></td>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <td><?php echo $count?></td>
                                                            <td><?php echo $row->company_name?></td>
                                                            <td><?php echo $row->type_name?></td>
                                                            <td><?php echo $row->site_name ?></td>
                                                            <td><?php echo $row->service_name?> | <?php echo $row->package?></td>
                                                            <td><?php echo $row->bw ?></td>
                                                            <td><?php echo $row->name?></td>
                                                            <td><?php echo $row->ord_name?></td>
                                                        <?php endif ?>
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
                        <div class="col-lg-2">
                            <form>
                                <button class="btn btn-primary" formaction="<?php echo base_url('inputor/form_permintaan')?>"><i class="fa fa-plus"></i>  Permintaan Baru</button>
                            </form>
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