<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>engineer"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>engineer/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> Instalasi</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>engineer/menu_list_permintaan_balo"><i class="fa fa-edit fa-fw"></i> Berita Acara Laik Operasi</a>
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
        <h1 class="page-header">Berita Acara Laik Operasi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('engineer/insert_data_balo')?>">
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
                    <input type="checkbox" name="sms" value="1">
                 </span>
                <input type="text" class="form-control" value="Monitoring SMS Alert" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <br>
    <div class="row">
         <div class="col-lg-6">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" name="logbook" value="1">
                 </span>
                <input type="text" class="form-control" value="Monitoring Logbook" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
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
