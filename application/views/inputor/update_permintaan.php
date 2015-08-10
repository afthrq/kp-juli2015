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
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_br">Permintaan Baru</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan" class="sidebar-active">Upgrade WAN</a>
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
                             <h1 class="page-header">Form Upgrade</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <form method ="POST" action ="<?php echo base_url('inputor/form_update')?>">
                    <?php foreach ($update_list as $row): ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->site_name ?>" name ="lokasi" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    </form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->type_name ?>" name="jenis" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->company_name ?>" name="perusahaan" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->address ?>" name ="alamat" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->region_name ?>" name="region" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provinsi_name ?>" name="provinsi" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Latitude</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->latitude ?>" name="provinsi" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Longitude</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->longitude ?>" name="provinsi" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">No. Jaringan</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->no_jar ?>" name="nojar" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php endforeach?>

                    <div class="row">
                        <div class="col-lg-6">
                            <table id="pic" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th style="background-color: #EEE;" colspan="3">PIC</th>
                                </thead>
                                <thead>
                                  <tr>
                                    <th width="50%">Nama PIC</th>
                                    <th width="25%">No. Telepon 1</th>
                                    <th width="25%">No. Telepon 2</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($pic_list as $row): ?>
                                <tr>
                                    <td><?php echo $row->pic_name ?></td>
                                    <td><?php echo $row->phone ?></td>
                                    <td><?php echo $row->phone2 ?></td>
                                </tr>
                                <?php endforeach?>
                                </tbody>
                          </table>
                        </div>
                    </div>
                    </form>
                    <form method="POST" action ="<?php echo base_url('inputor/form_update')?>">
                    <?php foreach ($lokasiid as $row): ?>   
                        <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                    <?php endforeach ?>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                                <div class="dropdown">
                                    <?php echo form_dropdown('up_layanan', $upserv_list,'','class="form-control" id="up_layanan" name="update_layanan"');  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
                                <div class="dropdown">
                                    <select class="form-control" name="update_paket" id="up_paket">
                                        <option value="1">(Pilih Layanan Terlebih Dahulu)</option>    
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Provider</span>
                                <div class="dropdown">
                                    <select placeholder="Pilih Perusahaan" class="form-control" name="provider">    
                                        <?php foreach ($provider_list as $row) : ?>
                                            <option><?php echo $row->provider_name ?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="update_bw">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon input-permintaan" id="basic-addon1">Tipe Upgrade</span>
                                <select name="proses" class="form-control">
                                    <option value="2">Upgrade</option>
                                    <option value="3">Upgrade (ganti Infra)</option>
                                    <option value="4">Upgrade Temporer</option>
                                    <option value="5">Downgrade</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="tahap" value="1">
                    <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                    <br>
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
                    </div>
                    </form>
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

        <script type="text/javascript">  
            $(document).ready(function() {  
                $("#up_layanan").change(function(){  
                    /*dropdown post *///  
                    $.ajax({  
                        url:"<?php echo base_url();?>index.php/inputor/buildpaketupdate",  
                        data: {id: $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#up_paket").html(data);  
                        }  
                    });  
                });  
            });  
        </script>
        
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
