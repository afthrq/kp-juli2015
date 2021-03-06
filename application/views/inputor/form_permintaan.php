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
                                <a href="<?php echo base_url() ?>inputor"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                             <h1 class="page-header">Form Permintaan</h1>
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
                            <form method="POST" action="<?php echo base_url('inputor/get_mod_val')?>">
                            <input type="hidden" name="proses" value="1" id="proses" href="#">
                            <input type="hidden" name="tahap" value="1" id="tahap" href="#">
                            <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>" id="user" href="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                                        <div class="dropdown">
                                        <?php echo form_dropdown('perusahaan', $perusahaan_list,'','class="form-control" id="perusahaan" name="perusahaan" href="#"'); ?>
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
                                            <select class="form-control" name="region" id="region" href="#">
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
                                            <select placeholder="Pilih Perusahaan" class="form-control" name="jenis" id="jenis" href="#">    
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
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="lokasi" id="lokasi" href="#">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                                        <div class="dropdown">
                                            <select placeholder="Pilih Perusahaan" class="form-control" name="prov" id="provinsi" href="#">    
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
                                        <textarea class="form-control" name="alamat" cols="40" rows="5" id="alamat" href="#"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Latitude</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="latitude" id="latitude" href="#">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Longitude</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="longitude" id="longitude" href="#">
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                        <div id="sectionB" class="tab-pane fade">
                            <br>
                            <div id="users-contain" class="row">
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
                                
                                        </tbody>
                                  </table>
                                </div>
                                <div class="col-lg-4">
                                    <button class="btn btn-primary"id="modal_trigger_pic" href="#modalpic"><i class="fa fa-plus"></i> PIC</button>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provider</span>
                                        <div class="dropdown">
                                            <select placeholder="Pilih Perusahaan" class="form-control" name="provider" id="provider" href="#">    
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
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                                        <div class="dropdown">
                                            <?php echo form_dropdown('layanan', $layanan_list,'','class="form-control" id="layanan" name="layanan" href="#"');  ?>
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
                                            <select class="form-control" name="paket" id="paket" href="#">
                                                <option value="">(Pilih Layanan Terlebih Dahulu)</option>    
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Router</span>
                                        <select name="router" class="form-control" id="router" href="#">
                                            <option value="14">Cisco 2801-V/K9</option>
                                            <option value="15">Cisco 2901-V/K9</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div id="users-contain" class="row">
                                <div class="col-lg-6">
                                    <table id="modul" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <th style="background-color: #EEE;" colspan="2">Modul</th>
                                        </thead>
                                        <thead>
                                          <tr>
                                            <th style="width: 90%;">Nama Modul</th>
                                            <th style="width: 10%;">Jumlah</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                
                                        </tbody>
                                  </table>
                                </div>
                                <div class="col-lg-4">
                                    <button class="btn btn-primary"id="modal_trigger_modul" href="#modalmodul"><i class="fa fa-plus"></i> Modul</button>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth (Kb)</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="bw" id="bw" href="#">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Keterangan</span>
                                        <textarea class="form-control" name="keterangan" cols="40" rows="5" id="keterangan" href="#"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:163px">Judul Dokumen</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="caption">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:163px">Tipe Dokumen</span>
                                        <select name="tipe_dokumen" class="form-control">
                                            <?php foreach($dokumen_list as $row): ?>
                                                <option value="<?php echo $row->p_doc_type_id?>"><?php echo $row->name?></option>
                                            <?php endforeach?>
                                        </select>
                                   </div>
                               </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div><input type="file" id="userfile" /></div>
                                    <div class="uploadify-queue" id="file-queue"></div>
                                    <input type="submit" value="Upload" class="btn btn-default btn-primary" id="upload-btn">
                                    <input type="hidden" class="form-control" aria-describedby="basic-addon1" id="path" name="path">
                                </div>
                            </div>
                            </form>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" name="submit" value="Submit" id="submit" href="#" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo base_url('inputor/form_input')?>">
                    <div id="modalpic" class="popupContainer pic-container" style="display:none;">
                        <header class="popupHeader">
                            <span class="header_title">PIC</span>
                            <span class="modal_close"><i class="fa fa-times"></i></span>
                        </header>
                        <div class="social_login">
                            <div class="">
                                <div id="dialog-form" title="Create new user" class="modal-box">
                                  <form>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-10">
                                               <label for="name">Nama</label>
                                               <input type="text" name="name" id="picname" value="" class="form-control"> 
                                            </div>
                                            <div class="col-xs-2">
                                                <label style="visibility:hidden">.</label>
                                                <span id="phonequery" class="btn btn-primary" href="#" style="margin-left:-50%;"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                               <label for="name">No. Telepon 1</label>
                                               <input type="text" id="telepon1" value="" class="form-control"> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                               <label for="name">No. Telepon 2</label>
                                               <input type="text" id="telepon2" value="" class="form-control"> 
                                            </div>
                                        </div>
                                 
                                      <!-- Allow form submission with keyboard without duplicating the dialog button -->
                                      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                                    </fieldset>
                                    <br>
                                    <center><a id="addpic" class="btn btn-primary">Tambah PIC</a></center>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modalmodul" class="popupContainer" style="display:none;">
                        <header class="popupHeader">
                            <span class="header_title">Modul</span>
                            <span class="modal_close"><i class="fa fa-times"></i></span>
                        </header>
                        <div class="social_login">
                            <div class="">
                                <div id="dialog-form" title="Create new user" class="modal-box">
                                  <form>
                                    <fieldset>
                                      <label for="name">Nama Modul</label><br>
                                        <select name="modul" class="form-control" id="modname">
                                            <option value="HWIC-2T">HWIC-2T</option>
                                            <option value="HWIC-2FE">HWIC-2FE</option>
                                        </select>
                                      <label for="phone1">Jumlah</label><br>
                                      <input type="number" name="jumlah" id="modjml" value="" class="form-control">
                                 
                                      <!-- Allow form submission with keyboard without duplicating the dialog button -->
                                      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                                    </fieldset>
                                    <br>
                                    <center><a id="addmodul" class="btn btn-primary href">Tambah Modul</a></center>
                                </form>
                                </div>
                            </div>
                        </div>
                    </form>
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
        <!-- Jquery 1.4.4 for Popup Modul & Autocomplete -->
        <script src="<?php echo base_url('assets/js/jquery-1.4.4.min.js') ?>"></script>
        <!-- Function Popup Modul -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.leanModal.min.js') ?>"></script>
        <script type="text/javascript">
            var oldJquery = $.noConflict(true);
            oldJquery("#modal_trigger_pic").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
            oldJquery("#modal_trigger_modul").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
        </script>
        <!-- jquery ui for autocomplete -->
        <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
        <!-- autocomplete PIC name -->
        <script type="text/javascript">
            $(document).ready(function () {
                oldJquery(function () {
                    $( "#picname" ).autocomplete({
                        source: function(request, response) {
                            $.ajax({ 
                                url: "<?php echo base_url('inputor/ac_pic'); ?>",
                                data: { id: $("#picname").val()},
                                dataType: "json",
                                type: "POST",
                                success: function(data){
                                    response(data);
                                }    
                            });
                        },
                    });
                });
            });
        </script>

        <script>
        $("#phonequery").click(function() {


            $.ajax({
                url: "<?php echo base_url('inputor/get_phone'); ?>",
                data: {id: $("#picname").val()},
                dataType: "json",
                type: "POST",
                success: function(data){
                    
                //    var phone1 = data.phone;
                    $("#telepon1").val(data.phone);
                    $("#telepon2").val(data.phone2);
                    }

            });
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
                  $(document).ready(function() {  
                     $("#layanan").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url();?>index.php/inputor/buildpaket",  
                        data: {id: $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#paket").html(data);  
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

        <!-- Add data from PIC Modal to PIC Table -->
        <script type="text/javascript">
            $(function() {
                var name = $( "#picname" ),
                    phone1 = $( "#telepon1" ),
                    phone2 = $( "#telepon2" );

                    $("#addpic").click(function() {
                        if( name.val().length === 0 ) {
                            alert("Nama PIC harus diisi!");
                        }
                        else {
                            $( "#pic tbody" ).append(                            
                                "<tr>" +
                                "<td>" + name.val() + "<input type='hidden' name='namapic' value='"+ name.val() + "'> " +  "</td>"+
                                "<td>" + phone1.val() + "<input type='hidden' name='tlp1pic' value='"+ phone1.val() + "'> " + "</td>" +
                                "<td>" + phone2.val() + "<input type='hidden' name='tlp2pic' value='"+ phone2.val() + "'> " + "</td>" +
                                "</tr>");
                        }
                        name.val('');
                        phone1.val('');
                        phone2.val('');
                });

            });
        </script>

        <!-- Add data from Modul Modal to Modul Table -->
        <script type="text/javascript">
        $(function() {
            var modul = $( "#modname" ),
                jumlah = $( "#modjml" ),
                realVal;

            $("#addmodul").click(function() {
                if( jumlah.val().length === 0 ) {
                    alert("Jumlah Modul tidak terisi!");
                }
                else {
                    if ($.trim(modul.val()) == "HWIC-2T") {
                        realVal = 16;
                        $( "#modul tbody" ).append(
                        "<tr>" +
                            "<td>" + modul.val() +  "</td>" +
                            "<td>" + jumlah.val() + "</td>" +
                        "</tr>" 
                        );
                        modul.val('');
                        jumlah.val('');
                        realVal = 0;
                    }
                    else if($.trim(modul.val()) == "HWIC-2FE"){
                        realVal = 17;
                        $( "#modul tbody" ).append(
                        "<tr>" +
                            "<td>" + modul.val() + "<input type='hidden' name='modulname[]' value='"+ realVal + "'> " +  "</td>" +
                            "<td>" + jumlah.val() + "<input type='hidden' name='jmlmodul' value='"+ jumlah.val() + "'> " + "</td>" +
                        "</tr>" 
                        );
                        modul.val('');
                        jumlah.val('');
                        realVal = 0;
                    } 
                }
            });
        });
        </script>


        <!-- Script buat pass value Modul & PIC disatukan -->
       
        <script>
        jQuery(document).ready(function() {
            $("#submit").click(function(){
                sendTblDataToServer();
                location.href = "inputor";
                
            });
        });

        function storeTblValues()
        {
            var TableData = new Array();
            var TableData2 = new Array();
            $('#modul tr').each(function(row, tr){
                TableData[row]={
                    "Modul" : $(tr).find('td:eq(0)').text()
                    , "Jumlah" :$(tr).find('td:eq(1)').text()
                    , "Lokasi" : $("#lokasi").val()
                    , "Perusahaan" : $("#perusahaan").val()
                    , "Region" : $("#region").val()
                    , "Provinsi" : $("#provinsi").val()
                    , "Jenis" : $("#jenis").val()
                    , "Alamat" : $("#alamat").val()
                    , "Provider" : $("#provider").val()
                    , "Layanan" : $("#layanan").val()
                    , "Paket" : $("#paket").val()
                    , "Router" : $("#router").val()
                    , "Bw" : $("#bw").val()
                    , "Latitude" : $("#latitude").val()
                    , "Longitude" : $("#longitude").val()
                    , "Tahap" : $("#tahap").val()
                    , "Proses" : $("#proses").val()
                    , "User" : $("#user").val()
                    , "Keterangan" : $("#keterangan").val()
                }
            });
            
            $('#pic tr').each(function(row, tr){
                TableData2[row]={
                    "PIC" : $(tr).find('td:eq(0)').text()
                    , "Phone1" :$(tr).find('td:eq(1)').text()
                    , "Phone2" :$(tr).find('td:eq(2)').text()
                }
            }); 

            TableData.shift();  // first row will be empty - so remove 
            TableData2.shift();  // first row will be empty - so remove
            return {TableData,TableData2}

        }


        function sendTblDataToServer()
        {
            var TableData, TableData2;
            TableData = JSON.stringify(storeTblValues().TableData);
            TableData2 = JSON.stringify(storeTblValues().TableData2);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('inputor/form_input'); ?>",
                data: "pTableData=" + TableData + "&pTableData2=" + TableData2,
                
                success: function(msg){
                    // return value stored in msg variable 
                   alert("Data berhasil dimasukkan");
                },
            });
        }
        </script>

        <script src="<?php echo base_url('assets/js/lib/jquery.uploadify.min.js') ?>"></script>
        <script type='text/javascript' >
        $(function() {

            $('#upload-btn').click(function (e) {
                e.preventDefault();
            $('#userfile').uploadify('upload', '*');
            });

            $('#userfile').uploadify({
                'debug'   : false,
                'swf'   : '<?php echo base_url() ?>assets/js/lib/uploadify.swf',
                'uploader'  : '<?php echo base_url('upload/uploadify')?>',
                'cancelImage' : '<?php echo base_url() ?>assets/js/lib/uploadify-cancel.png',
                'queueID'  : 'file-queue',
                'buttonClass'  : 'btn btn-default up-btn',
                'buttonText' : "Pilih Dokumen",
                'multi'   : false,
                'auto'   : false,
                
                'fileTypeExts':'*.pdf;*.doc;*.docx',
                'fileTypeDesc':'Image Files (.pdf,.doc,.docx,)',
                'method'  : 'post',
                'fileObjName' : 'userfile',
                'queueSizeLimit': 1,
                'simUploadLimit': 1,
                'sizeLimit'  : 10240000,
                'removeCompleted' : false,
                'onUploadSuccess' : function(file, data, response) {
                var json = jQuery.parseJSON(data);
                alert('File bernama ' + file.name + ' telah berhasil di upload dengan nama ' + ': ' + json.file_name);
                $("#path").attr('value',json.file_name);
                },
                /*'onUploadComplete' : function(file) {
                alert('The file ' + file.name + ' finished processing.');
                },*/
                'onQueueFull': function(event, queueSizeLimit) {
                alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
                return false;
                },
            });
        });
        </script>
    </body>
</html>