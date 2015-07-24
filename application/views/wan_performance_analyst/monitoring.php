<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>wan_performance_analyst"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>wan_performance_analyst/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> Monitoring</a>
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
        <h1 class="page-header">Monitoring</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('wan_performance_analyst/insert_data_balo')?>">
<input type="hidden" name="tahap" value="7">
<input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">
<div class="row">
    <div class="input-group col-lg-6">
        <?php foreach ($balo_list as $row) : ?>
            <input type="hidden" value="<?php echo $row->site_name ?>" name="lokasi">
        <?php endforeach?>
    </div>
</div>
<br>
<br>
    <div class="row">
         <div class="col-lg-6">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" name="cacti" value="1">
                 </span>
                <input type="text" class="form-control" value="Monitoring Cacti" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <br>
    <div class="row">
         <div class="col-lg-6">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" name="npmd" value="1">
                 </span>
                <input type="text" class="form-control" value="Monitoring NPMD" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <br>
    <div class="row">
         <div class="col-lg-6">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" name="smokeping" value="1">
                 </span>
                <input type="text" class="form-control" value="Monitoring Smokeping" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <br>
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
            <a href="koordinasi_provider.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
            <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
        </div>
    </div>
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
