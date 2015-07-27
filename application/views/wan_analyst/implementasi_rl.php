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
                <a href="<?php echo base_url() ?>wananalyst/menu_list_permintaan_imp"><i class="fa fa-edit fa-fw"></i> Implementasi</a>
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
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Implementasi - Relokasi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('wananalyst/insertdatainstalasi')?>">
    <input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">

<div class="row">
    <div class="input-group col-lg-6">
        <?php foreach ($update_list as $row) : ?>
            <input type="hidden" value="<?php echo $row->site_name ?>" name="lokasi">
        <?php endforeach?>
    </div>
</div>
    <input type="hidden" name="ipwan" value="">
    <input type="hidden" name="netmaskwan" value="">
    <input type="hidden" name="iplan" value="">
    <input type="hidden" name="netmasklan" value="">
    <input type="hidden" name="iploop" value="">
    <input type="hidden" name="asn" value="">
    <input type="hidden" name="lastmile" value="">
    <input type="hidden" name="traffic" value="">
    <input type="hidden" name="sla" value="">
    <input type="hidden" name="hostname" value="">        
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

<input type="hidden" name="tahap" value="5">
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