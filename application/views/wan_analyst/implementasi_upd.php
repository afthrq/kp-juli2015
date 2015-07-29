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
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_srv"><i class="fa fa-edit fa-fw"></i> Survey</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_imp" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Implementasi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_balo"><i class="fa fa-edit fa-fw"></i> Berita Acara Laik Operasi</a>
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
                            <h1 class="page-header">Implementasi - Upgrade/Downgrade</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <form method="POST" action="<?php echo base_url('wananalyst/updatedatainstalasi')?>">

                        <?php foreach ($update_list as $row) : ?>
                        <input type="hidden" value="<?php echo $row->site_name ?>" name="lokasi">
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">IP WAN</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="ipwan" value="<?php echo $row->ip_wan ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">Netmask WAN</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="netmaskwan" value="<?php echo $row->netmask_wan ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">IP LAN</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="iplan" value="<?php echo $row->ip_lan ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">Netmask LAN</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="netmasklan" value="<?php echo $row->netmask_lan ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">IP Loop</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="iploop" value="<?php echo $row->ip_loop ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">ASN</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="asn" value="<?php echo $row->asn ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">Lastmile</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="lastmile" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="traffic" value="">
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">SLA (%)</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="sla" value="<?php echo $row->sla ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">Hostname</span>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="hostname" value="<?php echo $row->hostname ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
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
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-instalasi" id="basic-addon1">Keterangan</span>
                                    <textarea class="form-control" name="keterangan" cols="40" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="koordinasi_provider.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
                                <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
                    <input type="hidden" name="tahap" value="5">
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