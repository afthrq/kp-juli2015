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
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_srv" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Survey <span class="badge pull-right"><?php echo $count_srv?></span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_imp"><i class="fa fa-edit fa-fw"></i> Implementasi <span class="badge pull-right"><?php echo $count_imp?></span></a>
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
                                        if ($row->name == "Survey"): ?>
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
                            <h1 class="page-header">Survey</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <form method="POST" action="<?php echo base_url('wananalyst/insertdatasurvey')?>">
                        <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                        <?php foreach ($lokasiid as $row): ?>   
                            <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
                        <?php endforeach ?>
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
                        <div class="row">
                            <div class="col-lg-6">
                            <button class="btn btn-outline btn-primary btn-danger"id="modal_trigger" href="#modal">Reject</button>
                            <?php echo form_submit('submit', ' Submit ', 'class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;"'); ?>
                            </div>
                        </div>
                        <input type="hidden" name="tahap" value="4">
                    </form>
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