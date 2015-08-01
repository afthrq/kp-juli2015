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
                                <a href="<?php echo base_url() ?>wanperformance"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wanperformance/menu_list_permintaan" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Monitoring <span class="badge pull-right"><?php echo $count_mon?></span></a>
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
                    <!--<div class="row">
                        <center>
                            <div class="btn-group btn-breadcrumb group-crumbs" id="milestone">
                                <?php //foreach ($breadcrumbs as $row): ?>
                                    <?php //if (echo $row->flow == "Monitoring"): ?>
                                        <a href="#" class="btn crumbs crumbs-size" value="1"><?php //echo $nama-flow ?></a>
                                    <?php //else: ?>
                                        <a href="#" class="btn crumbs crumbs-size" value="0"><?php //echo $nama-flow ?></a>
                                    <?php //endif ?>
                                <?php //endforeach ?>
                            </div>
                        </center>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Monitoring</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <form method="POST" action="<?php echo base_url('wanperformance/insert_monitoring')?>">
                    <input type="hidden" name="tahap" value="7">
                    <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                    <div class="row">
                        <div class="input-group col-lg-6">
                            <?php foreach ($lokasiid as $row) : ?>
                                <input type="hidden" value="<?php echo $row->site_name ?>" name="lokasi">
                            <?php endforeach?>
                        </div>
                    </div>
                        <div class="row">
                             <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" name="cacti" value="1">
                                     </span>
                                    <input type="text" class="form-control" value="Monitoring Cacti" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                        <br>
                        <div class="row">
                             <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" name="npmd" value="1">
                                     </span>
                                    <input type="text" class="form-control" value="Monitoring NPMD" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                        <br>
                        <div class="row">
                             <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" name="smokeping" value="1">
                                     </span>
                                    <input type="text" class="form-control" value="Monitoring Smokeping" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Keterangan</span>
                                    <textarea class="form-control" name="keterangan" cols="40" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-lg-6">
                            <?php echo form_submit('reject', ' Reject ', 'class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"'); ?>
                            <?php echo form_submit('submit', ' Submit ', 'class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;"'); ?>
                            </div>
                        </div>
                    </form>
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

        <script type="text/javascript">
            $("#milestone").find("a[value='1']").addClass("btn-active");
        </script>
    </body>
</html>