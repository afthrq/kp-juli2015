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
                                  <a href="<?php echo base_url() ?>networkarchitect/menu_list_permintaan_vp"><i class="fa fa-edit fa-fw"></i> Verifikasi Permintaan <span class="badge pull-right"><?php echo $count_vp?></span></a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url() ?>networkarchitect/menu_list_permintaan_kp"><i class="fa fa-edit fa-fw"></i> Koordinasi Provider <span class="badge pull-right"><?php echo $count_kp?></span></a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url() ?>networkarchitect/menu_list_permintaan_ob" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Online Billing <span class="badge pull-right"><?php echo $count_ob?></span></a>
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
                                        if ($row->name == "Online Billing"): ?>
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
                            <h1 class="page-header">Component Online Billing</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Online Billing</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Data Administrasi</a></li>
                        <li><a data-toggle="tab" href="#sectionC">Data Teknis</a></li>
                        <li><a data-toggle="tab" href="#sectionD">Histori Permintaan</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Tanggal Tagih</span>
                                        <input type="date" class="form-control" aria-describedby="basic-addon1" name="tgltagih">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php foreach ($price_link as $row): ?>
                            <div class="row">
                                <div class="col-lg-2">
                                    <h4>Biaya Instalasi</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                                        <input type="number" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->price_mrc?>" disabled>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <?php endforeach ?>
                            <?php foreach ($price_router as $row): ?>
                            <div class="row">
                                <div class="col-lg-2">
                                    <h4>Biaya Router</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                                        <input type="number" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->price_otc?>" disabled>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <?php endforeach ?>
                            <div class="row">
                                <div class="col-lg-2">
                                    <h4>Biaya Module</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                                        <input type="number" class="form-control" aria-describedby="basic-addon1" value="<?php echo $price_module?>" disabled>
                                    </div>
                                 </div>
                            </div>
                            <br>
                            <form method="POST" action="<?php echo base_url('networkarchitect/submit_online_billing')?>">
                            <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>"></input>
                            <?php foreach ($sitenserviceid as $row): ?>   
                                <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                                <input type="hidden" name="service_id" value="<?php echo $row->p_order_type_id?>">
                            <?php endforeach ?>
                            <input type="hidden" name="tahap" value="9"></input>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:137px">Keterangan</span>
                                        <textarea class="form-control" name="keterangan" cols="40" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:137px">Judul Dokumen</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="caption">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:137px">Tipe Dokumen</span>
                                        <select name="tipe_dokumen" class="form-control">
                                            <option value="1">Form Permintaan</option>
                                            <option value="2">Memo</option>
                                            <option value="3">Nota Pengantar</option>
                                            <option value="4">BALO</option>
                                            <option value="5">Form UAT</option>
                                            <option value="6">Lain - Lain</option>
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
                            <br><br>
                            <input type="hidden" name="tahap" value="9"></input>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-outline btn-primary btn-danger"id="modal_trigger" href="#modal">Reject</button>
                                    <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
                                </div>
                            </div>
                            </form>
                            <div id="modal" class="popupContainer" style="display:none;">
                                <header class="popupHeader">
                                    <span class="header_title">Reject</span>
                                    <span class="modal_close"><i class="fa fa-times"></i></span>
                                </header>
                                <div class="social_login">
                                    <div class="">
                                        <br>
                                        <center>
                                            Anda yakin ingin mereject permintaan ?
                                            <br><br>
                                            <form method="POST" action="<?php echo base_url('networkarchitect/reject')?>">
                                                <?php foreach ($lokasiid as $row): ?>   
                                                    <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                                                <?php endforeach ?>
                                                <textarea placeholder="Tuliskan alasan penolakan..." class="form-control ket-reject" name="reject" cols="35" rows="3"></textarea>
                                                <br>
                                                <?php echo form_submit('reject', ' Reject ', 'class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"'); ?>
                                                <input type="hidden" name="tahap" value="9">
                                            </form>
                                        </center>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sectionB" class="tab-pane fade">
                            <br>
                            <?php foreach ($data_permintaan as $row): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->site_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->type_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"> <!-- type_name -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->company_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->address ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- address -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->region_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provinsi_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">PIC</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->pic_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                        <div id="sectionC" class="tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->service_name ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->package ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- package -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->bw ?>" readonly style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- bw -->
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div id="sectionD" class="tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-8">
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
                                                            <th>Proses</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $count = 0; foreach ($list_keterangan as $row) : $count++;?>
                                                            <tr>
                                                            <?php if ($row->name != "Online Billing"): ?>
                                                              <td><?php echo $count?></td>
                                                              <td><?php echo $row->name?></td>
                                                              <td><?php echo $row->keterangan?></td>
                                                            <?php endif ?>
                                                            </tr>
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
                            </div>
                        </div>
                    </div>
                    <!-- /#tab-content -->
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