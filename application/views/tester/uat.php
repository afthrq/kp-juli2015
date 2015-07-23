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
        <h1 class="page-header">UAT</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('tester/submit_upload_tester')?>">
<input type="hidden" name="tahap" value="4">
<?php foreach ($lokasiid as $row): ?>   
    <input type="hidden" name="site_id" value="<?php echo $row->t_nw_site_id?>">
<?php endforeach ?>
<input type="hidden" name="user" value="<?php echo  $this->session->userdata('user_name')?>">

    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Caption Dokumen</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="caption">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="input-group">
                <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Tipe Dokumen</span>
                <select name="tipe_dokumen" class="form-control">
                    <option value="1">Form Permintaan</option>
                    <option value="2">Memo</option>
                    <option value="3">Nota Pengantar</option>
                    <option value="4">BALO</option>
                    <option value="5">Form UAT</option>
                    <option value="6">Lain - Lain</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-6">
            <div class="uploadify-queue" id="file-queue"></div>
            <input type="file" id="upload_btn" />
            <input type="hidden" class="form-control" aria-describedby="basic-addon1" id="path" name="path">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <a href="verifikasi_permintaan.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
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