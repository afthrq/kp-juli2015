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
        <link href="<?php echo base_url('assets/css/jquery-ui.css') ?>" rel="stylesheet" type="text/css"/>
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
                                <a href="<?php echo base_url() ?>inputor" class="sidebar-active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>inputor/data_wan"><i class="fa fa-table fa-fw"></i> Data Jaringan WAN</a>
                            </li>      
                            <li class="active">
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Permintaan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_br">Permintaan Baru</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan">Upgrade WAN</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_rl">Relokasi WAN</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_dm" class="sidebar-active">Dismantle WAN</a>
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
                             <h1 class="page-header">Dismantle</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Data Administrasi</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Data Teknis</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                            <br>
                            <form method="POST" action="<?php echo base_url('inputor/form_dismantle')?>">
                            <input type="hidden" name="proses" value="7">
                            <input type="hidden" name="tahap" value="1">
                            <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                            <?php foreach ($lokasiid as $row): ?>   
                                <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                            <?php endforeach ?>
                            <?php foreach ($update_list as $row): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->company_name ?>" name="perusahaan" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->region_name ?>" name="region" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->type_name ?>" name="jenis" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->site_name ?>" name="lokasi" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>                     
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provinsi_name ?>" name="prov" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
                                        <textarea class="form-control" name="alamat" cols="40" rows="5" id="alamat"  value="" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><?php echo $row->address ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Latitude</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->latitude ?>" name="latitude" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Longitude</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->longitude ?>" name="longitude" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                        <div id="sectionB" class="tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">PIC</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->pic_name ?>" name="pic" id="pic" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provider</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provider_name ?>" name="provider" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->service_name ?>" name="layanan" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->package ?>" name="paket" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php endforeach ?>
                            <?php foreach ($router_list as $row): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Router</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->service_name ?>" name="router" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php endforeach ?>

                            <?php foreach ($modul_list as $row): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Module</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->service_name ?>" name="modul" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth (Kb)</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->bw ?>" name="bw" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php endforeach ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Keterangan</span>
                                        <textarea class="form-control" name="keterangan" cols="40" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
                                </div>
                                <br><br>
                            </div>
                            </form>
                        </div>
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

        <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>

        <script type="text/javascript">
            $(window).on('beforeunload', function(){
            return "Any changes will be lost";
            });

            // Form Submit
            $(document).on("submit", "form", function(event){
                // disable unload warning
                $(window).off('beforeunload');
            });
        </script>
    </body>
</html>