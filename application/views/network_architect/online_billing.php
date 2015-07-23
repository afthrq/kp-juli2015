<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>network_architect"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>network_architect/menu_list_permintaan_vp"><i class="fa fa-edit fa-fw"></i> Verifikasi Permintaan</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>network_architect/menu_list_permintaan_kp"><i class="fa fa-edit fa-fw"></i> Koordinasi Provider</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>network_architect/menu_list_permintaan_ob"><i class="fa fa-edit fa-fw"></i> Online Billing</a>
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
        <h1 class="page-header">Online Billing</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">

    <div class="col-lg-2">
        <h4>Biaya Instalasi</h4>
    </div>
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Rp</span>
            <input type="number" class="form-control" aria-describedby="basic-addon1" value="100000" disabled>
        </div>
     </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2">
        <h4>Biaya Router</h4>
    </div>
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Rp</span>
            <input type="number" class="form-control" aria-describedby="basic-addon1" value="100000" disabled>
        </div>
     </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2">
        <h4>Biaya Modul</h4>
    </div>
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Rp</span>
            <input type="number" class="form-control" aria-describedby="basic-addon1" value="100000" disabled>
        </div>
     </div>
</div>
<br><br>
<div class="row">
    <form method="POST" action="<?php echo base_url('pm/submit_online_billing')?>">
    <?php foreach ($lokasiid as $row): ?>   
        <input type="text" name="site_id" value="<?php echo $row->t_nw_site_id?>">
    <?php endforeach ?>
        <div class="col-lg-6">
            <a href="verifikasi_balo.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
            <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
        </div>
    </form>
</div>
</div>
<!-- /#page-wrapper -->
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