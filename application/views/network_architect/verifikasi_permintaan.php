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
                                  <a href="<?php echo base_url() ?>networkarchitect"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url() ?>networkarchitect/menu_list_permintaan_vp" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Verifikasi Permintaan</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url() ?>networkarchitect/menu_list_permintaan_kp"><i class="fa fa-edit fa-fw"></i> Koordinasi Provider</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url() ?>networkarchitect/menu_list_permintaan_ob"><i class="fa fa-edit fa-fw"></i> Online Billing</a>
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
                            <h1 class="page-header">Verifikasi Permintaan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Data Permintaan</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Verifikasi Permintaan</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                            <br>
                            <?php foreach ($data_permintaan as $row): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->site_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->type_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"> <!-- type_name -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->company_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->address ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- address -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->region_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provinsi_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">PIC</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->pic_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->service_name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->package ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- package -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->bw ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- bw -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <?php endforeach ?>
                        </div>
                        <div id="sectionB" class="tab-pane fade">
                            <br>
                            <form method="POST" action="<?php echo base_url('networkarchitect/submit_verifikasi_permintaan')?>">

                            <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                            <?php foreach ($lokasiid as $row): ?>   
                                <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                            <?php endforeach ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:163px">No. Form Permintaan</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="no_form">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:163px">Tanggal Permintaan</span>
                                            <input type="date" class="form-control" aria-describedby="basic-addon1" name="tanggal_permintaan">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:163px">Caption Dokumen</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="caption">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="1" name="tipe_dokumen">
                                <br>
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:163px">Keterangan</span>
                                                <textarea class="form-control" name="keterangan" cols="40" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="uploadify-queue" id="file-queue"></div>
                                        <input type="file" id="upload_btn" />
                                        <input type="hidden" class="form-control" aria-describedby="basic-addon1" id="path" name="path">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="verifikasi_permintaan.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
                                    </div>
                                </div>
                                    <input type="hidden" name="tahap" value="2">
                            </form>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
            </div>
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
        <script src="<?php echo base_url('assets/js/lib/jquery.uploadify.min.js') ?>"></script>
        <script type='text/javascript' >
        $(function() {
            $('#upload_btn').uploadify({
                'debug'   : false,
                'swf'   : '<?php echo base_url() ?>assets/js/lib/uploadify.swf',
                'uploader'  : '<?php echo base_url('upload/uploadify')?>',
                'cancelImage' : '<?php echo base_url() ?>assets/js/lib/uploadify-cancel.png',
                'queueID'  : 'file-queue',
                'buttonClass'  : 'btn btn-default up-btn',
                'buttonText' : "Upload Dokumen",
                'multi'   : true,
                'auto'   : true,
                
                'fileExt'   : '*.jpg;*.gif;*.png;*.txt;*.pdf;*.doc;*.docx',   // any extension you want to allow
                'fileDesc'  : 'Upload Files (.JPG, .GIF, .PNG, .TXT, .PDF, .DOC, .DOCX)',
                'method'  : 'post',
                'fileObjName' : 'userfile',
                'queueSizeLimit': 40,
                'simUploadLimit': 2,
                'sizeLimit'  : 10240000,
                'onUploadSuccess' : function(file, data, response) {
                var json = jQuery.parseJSON(data);
                alert('The file ' + file.name + ' was successfully uploaded as ' + ':' + json.file_name);
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