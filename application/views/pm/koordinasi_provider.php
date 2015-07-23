<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>pm"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>pm/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> Koordinasi Provider</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>pm/menu_list_permintaan_ob"><i class="fa fa-edit fa-fw"></i> Online Billing</a>
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
<input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
<?php foreach ($lokasiid as $row): ?>   
    <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
<?php endforeach ?>
<div class="row">
    <div class=" col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Tiket Provider</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="tiket_provider">
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class=" col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">PIC Provider</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="pic_provider">
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-lg-6">
        <a href="verifikasi_permintaan.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
        <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
    </div>
</div>
<input type="hidden" name="tahap" value="3">
</form>
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