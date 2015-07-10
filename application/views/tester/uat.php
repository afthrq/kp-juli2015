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
            <div class="row">
                <div class="input-group col-lg-6">
                    <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Caption Dokumen</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="caption">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="input-group col-lg-6">
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
            <br>
            <div class="row">
                <div class="uploadify-queue" id="file-queue"></div>
                <input type="file" id="upload_btn" />
                <input type="hidden" class="form-control" aria-describedby="basic-addon1" id="path" name="path">
            </div>
            <br>
            <div class="row">
                <a href="verifikasi_permintaan.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
                <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
            </div>
        </form>
   

</div>
<!-- /#page-wrapper -->