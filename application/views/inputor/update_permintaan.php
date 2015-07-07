<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url() ?>inputor"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-edit fa-fw"></i> Form Permintaan <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li class="dropdown">
                        <a href="<?php echo base_url() ?>inputor/form_permintaan"><i class="fa fa-edit fa-fw"></i> Permintaan Baru</a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo base_url() ?>inputor/update_permintaan"><i class="fa fa-edit fa-fw"></i> Update Permintaan</a>
                    </li>
                </ul>
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
        <h1 class="page-header">Update Permintaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
        <select class="form-control" name="keyword">
        <?php foreach ($loc_list as $loc): ?>
        <option value="<?php echo $loc->name ?>"></option>
        <?php endforeach ?>
      </select>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle dropdown-permintaan" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Pilih Jenis Lokasi
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-permintaan" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle dropdown-permintaan" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Pilih Perusahaan
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-permintaan" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="alamat">
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle dropdown-permintaan" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Pilih Region
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-permintaan" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="prov">
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">PIC</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="pic">
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
        <div class="dropdown dropdown-permintaan">
            <button class="btn btn-default dropdown-toggle dropdown-permintaan" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Pilih Layanan
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-permintaan" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle dropdown-permintaan" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Pilih Paket Layanan
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-permintaan" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="bw">
    </div>
</div>
<br><br>
<div class="row">
    <a href="koordinasi_provider.html"><input type="submit" name="submit" value="Reject" class="btn btn-outline btn-primary btn-danger" style="padding: 5px 12px;"></a>
    <a href="uat.html"><input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;"></a>
</div>
</div>
<!-- /#page-wrapper -->