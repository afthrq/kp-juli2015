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
        <h1 class="page-header">Instalasi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('engineer/insertdatainstalasi')?>">
<div class="row">
    <div class="input-group col-lg-6">
        <?php foreach ($update_list as $row) : ?>
            <input type="hidden" value="<?php echo $row->site_name ?>" name="lokasi"><?php echo $row->site_name ?>
        <?php endforeach?>
    </div>
</div>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">IP WAN</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="ipwan">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">Netmask WAN</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="netmaskwan">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">IP LAN</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="iplan">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">Netmask LAN</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="netmasklan">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">IP Loop</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="iploop">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">ASN</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="asn">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">Lastmile</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="lastmile">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">Traffic Management</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="traffic">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">SLA</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="sla">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-instalasi" id="basic-addon1">Hostname</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="hostname">
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