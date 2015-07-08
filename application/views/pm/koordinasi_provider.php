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
        <h1 class="page-header">Koordinasi Provider</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('pm/submit_koordinasi_provider')?>">
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Tiket Provider</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="tiket_provider">
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">PIC Provider</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="pic_provider">
    </div>
</div>
<br><br>
<div class="row">
    <a href="verifikasi_permintaan.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
    <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;"></a>
</div>
</form>
</div>
<!-- /#page-wrapper -->