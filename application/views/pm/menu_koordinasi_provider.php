<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>pm"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>pm/menu_koordinasi_provider"><i class="fa fa-edit fa-fw"></i> Koordinasi Provider</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>pm/online_billing"><i class="fa fa-edit fa-fw"></i> Online Billing</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Request yang perlu dilakukan Koordinasi Provider</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
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
                                <th>Lokasi</th>
                                <th>Jenis Lokasi</th>
                                <th>Layanan</th>
                                <th>Bandwidth</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                            <?php 
                                $count = 0;
                                foreach ($list_permintaan as $row):
                                $count++; ?>
                                <tr>
                                  <td><?php echo $count?></td>
                                  <td><a href="<?php echo base_url() ?>pm/koordinasi_provider"><?php echo $row->name ?></a></td> //from t_network_order ->t_nw_site
                                  <td><?php echo $row->type_name?></td> //from t_network_order -> t_nw_site -> p_site_type
                                  <td><?php echo $row->name?> | <?php echo $row->package?></td> //from t_network_order -> t_nw_service -> p_nw_service
                                  <td><?php echo $row->bw ?></td> //from t_network_order
                                </tr>
                            <?php endforeach ?>
                        </tbody>-->
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
<!-- /#page-wrapper -->