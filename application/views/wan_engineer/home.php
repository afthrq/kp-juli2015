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
                                <a href="<?php echo base_url() ?>wanengineer" class="sidebar-active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wanengineer/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> UAT</a>
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
                        <h1 class="page-header"><?php echo $this->session->userdata('user_name') ?> Home</h1>
                      </div>

                      <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Cari Permintaan yang ingin di Proses ...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cari</button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            Kondisi Permintaan
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Tugas</th>
                                    <th>Valid From</th>
                                    <th>Valid To</th>
                                    <th>Layanan</th>
                                    <th>Bandwidth</th>
                                    <th>Pelaksana</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Form Permintaan</td>
                                    <td>12/5/2015</td>
                                    <td>12/5/2015</td>
                                    <td>Internet</td>
                                    <td>10Mbps</td>
                                    <td>Jaka</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Verifikasi Permintaan</td>
                                    <td>12/5/2015</td>
                                    <td>14/5/2015</td>
                                    <td>Internet</td>
                                    <td>10Mbps</td>
                                    <td>Rudy</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Koordinasi Provider</td>
                                    <td>14/5/2015</td>
                                    <td>19/5/2015</td>
                                    <td>Internet</td>
                                    <td>10Mbps</td>
                                    <td>Niko</td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Instalasi</td>
                                    <td>12/5/2015</td>
                                    <td></td>
                                    <td>Internet</td>
                                    <td>10Mbps</td>
                                    <td>...</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.table-responsive -->
                          </div>
                          <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                      </div>
                      <!-- /.col-lg-6 -->
                      <div class="col-lg-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            Engineer
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Sapardi</td>
                                    <td>08121212121</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Djoko</td>
                                    <td>08575757575</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Damono</td>
                                    <td>08232323232</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.table-responsive -->
                          </div>
                          <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                      </div>
                      <!-- /.col-lg-6 -->
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
    </body>
</html>