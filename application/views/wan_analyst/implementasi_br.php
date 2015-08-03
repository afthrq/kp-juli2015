<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Database untuk Data WAN">
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
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_imp" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Implementasi <span class="badge pull-right"><?php echo $count_imp?></span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_balo"><i class="fa fa-edit fa-fw"></i> Berita Acara Laik Operasi <span class="badge pull-right"><?php echo $count_balo?></span></a>
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
                        <center>
                            <div class="btn-group btn-breadcrumb group-crumbs" id="milestone">
                                <?php foreach ($breadcrumbs as $row): ?>
                                    <?php 
                                        if ($row->name == "Implementasi"): ?>
                                        <a href="#" class="btn crumbs crumbs-size" value="1"><?php echo $row->name ?></a>
                                    <?php else: ?>
                                        <a href="#" class="btn crumbs crumbs-size" value="0"><?php echo $row->name ?></a>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </center>
                    </div>   
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Implementasi - Permintaan Baru</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Data Permintaan</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Form Data Implementasi</a></li>
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
                            <form method="POST" action="<?php echo base_url('wananalyst/insertdatainstalasi')?>">
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">IP WAN</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="ipwan">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">Netmask WAN</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="netmaskwan">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">IP LAN</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="iplan">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">Netmask LAN</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="netmasklan">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">IP Loop</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="iploop">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">ASN</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="asn">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">Lastmile</span>
                                        <div class="dropdown">
                                            <select placeholder="Pilih Perusahaan" class="form-control" name="lastmile">    
                                                <?php foreach ($lastmile_list as $row) : ?>
                                                    <option><?php echo $row->name ?></option>
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
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">Traffic Management</span>
                                        <select name="traffic" class="form-control">
                                            <option value="Load Balance">Load Balance</option>
                                            <option value="Load Sharing">Load Sharing</option>
                                            <option value="Automatic Fail Over">Automatic Fail Over</option>
                                            <option value="Manual Fail Over">Manual Fail Over</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">SLA (%)</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="sla">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">Hostname</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="hostname">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-instalasi" id="basic-addon1">Keterangan</span>
                                        <textarea class="form-control" name="keterangan" cols="40" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_submit('reject', ' Reject ', 'class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"'); ?>
                                    <?php echo form_submit('submit', ' Submit ', 'class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;"'); ?>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                            <?php foreach ($update_list as $row) : ?>
                                <input type="hidden" value="<?php echo $row->site_name ?>" name="lokasi">
                            <?php endforeach?>
                            <input type="hidden" name="tahap" value="5">
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

        <script src="<?php echo base_url('assets/js/jquery-1.4.4.min.js') ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.leanModal.min.js') ?>"></script>

        <script type="text/javascript">
            var oldJquery = $.noConflict(true);
        </script>

        <script type="text/javascript">
            oldJquery("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
        </script>

        <script type="text/javascript">
            $("#milestone").find("a[value='1']").addClass("btn-active");
        </script>
    </body>
</html>