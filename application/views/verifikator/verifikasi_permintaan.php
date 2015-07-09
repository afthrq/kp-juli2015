<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>verifikator"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>verifikator/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> Verifikasi Permintaan</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>verifikator/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> Verifikasi BALO</a>
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
        <h1 class="page-header">Verifikasi Permintaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#sectionA">Data Permintaan</a></li>
    <li><a data-toggle="tab" href="#sectionB">Verifikasi Permintaan</a></li>
</ul>
<div class="tab-content">
    <div id="sectionA" class="tab-pane fade in active">
        <br>
        <?php foreach ($data_permintaan as $row): ?>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"> <!-- type_name -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- address -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">PIC</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- package -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-group col-lg-6">
                <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->name ?>" disabled style="font-weight: bold !important; background-color: rgb(244, 244, 244) !important;"><!-- bw -->
            </div>
        </div>
        <br>
        <?php endforeach ?>
    </div>
    <div id="sectionB" class="tab-pane fade">
        <br>
        <form method="POST" action="<?php echo base_url('verifikator/submit_verifikasi_permintaan')?>">
            <div class="row">
                <div class="input-group col-lg-6">
                    <span class="input-group-addon input-permintaan" id="basic-addon1">No. Form Permintaan</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="no_form">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="input-group col-lg-6">
                    <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Tanggal Permintaan</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="tanggal_permintaan">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="input-group col-lg-6">
                    <span class="input-group-addon input-permintaan" id="basic-addon1" style="min-width:162px">Caption Dokumen</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="caption">
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
</div>
</div>
<!-- /#page-wrapper -->