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
                                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan_rl" class="sidebar-active">Relokasi WAN</a>
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
                             <h1 class="page-header">Form Relokasi</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Data WAN</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Relokasi WAN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active"><br>
                            <form method ="POST" action ="<?php echo base_url('inputor/form_relokasi')?>">
                            <?php foreach ($update_list as $row): ?>
                            <input type="hidden" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->no_jar ?>" name ="nojar" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provider</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provider_name ?>" name ="provider" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->service_name ?>" name ="layanan" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->bw ?>" name="bw" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
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
                                            <td><?php echo $row->pic_name ?></td>
                                            <td><?php echo $row->phone ?></td>
                                            <td><?php echo $row->phone2 ?></td>
                                        </tbody>
                                  </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Tipe Upgrade</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="Relokasi" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div id="sectionB" class="tab-pane fade"><br>
                                <?php foreach ($lokasiid as $row): ?>   
                                    <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                                <?php endforeach ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                                            <div class="dropdown">
                                            <?php echo form_dropdown('perusahaan', $perusahaan_list,'','class="form-control" id="perusahaan" name="perusahaan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
                                            <div class="dropdown">
                                                <select class="form-control" name="region" id="region">
                                                    <option value="">(Pilih Perusahaan Terlebih Dahulu)</option>    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class=" col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
                                            <div class="dropdown">
                                                <select placeholder="Pilih Perusahaan" class="form-control" name="jenis">    
                                                    <?php foreach ($jenis_list as $row) : ?>
                                                        <option><?php echo $row->type_name ?></option>
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
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="lokasi">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                                            <div class="dropdown">
                                                <select placeholder="Pilih Perusahaan" class="form-control" name="prov">    
                                                    <?php foreach ($provinsi_list as $row) : ?>
                                                        <option><?php echo $row->provinsi_name ?></option>
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
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
                                            <textarea class="form-control" name="alamat" cols="40" rows="5" id="alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Latitude</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="latitude">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1">Longitude</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="longitude">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="tahap" value="1">
                                <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                                <input type="hidden" name="proses" value="6">
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

        <script type="text/javascript">  
                  $(document).ready(function() {  
                     $("#perusahaan").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url();?>index.php/inputor/buildregion",  
                        data: {id: $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#region").html(data);  
                     }  
                  });  
               });  
            });  
        </script> 


        <script type="text/javascript"> 

        function stopRKey(evt) { 
          var evt = (evt) ? evt : ((event) ? event : null); 
          var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
          if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
        } 

        document.onkeypress = stopRKey; 

        </script>
    </body>
</html>