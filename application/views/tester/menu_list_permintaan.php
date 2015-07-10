<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>tester"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>tester/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> UAT</a>
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
        <h1 class="page-header">Koordinasi Provider yang perlu dilakukan</h1>
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
                        <tbody>
                            <?php $count = 0; foreach ($list_permintaan as $row) : $count++;?>
                                <form method="POST" action="<?php echo base_url('tester/uat')?>">
                                <tr>
                                  <td><?php echo $count?></td>
                                  <td><input type="hidden" name="order_id" value="<?php echo $row->site_name ?>"><input type="submit" value="<?php echo $row->site_name ?>" class="btn btn-default btn-table"></td>
                                  <td><?php echo $row->type_name?></td>
                                  <td><?php echo $row->service_name?> | <?php echo $row->package?></td>
                                  <td><?php echo $row->bw ?></td>
                                </tr>
                                </form>
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
<!-- /#page-wrapper -->