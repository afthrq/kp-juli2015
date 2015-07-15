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
                        <a href="<?php echo base_url() ?>inputor/menu_list_permintaan"><i class="fa fa-edit fa-fw"></i> Update Permintaan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>

<script type="text/javascript">  
          $(document).ready(function() {  
             $("#up_layanan").change(function(){  
             /*dropdown post *///  
             $.ajax({  
                url:"<?php echo base_url();?>index.php/inputor/buildpaketupdate",  
                data: {id: $(this).val()},  
                type: "POST",  
                success:function(data){  
                $("#up_paket").html(data);  
             }  
          });  
       });  
    });  
</script>

<!-- /.navbar-static-side -->
</nav>
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Permintaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method ="POST" action ="<?php echo base_url('inputor/form_update')?>">



<?php foreach ($update_list as $row): ?>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->site_name ?>" name ="lokasi" disabled>
        </div>
    </div>
</div>
<br>
</form>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->type_name ?>" name="jenis" disabled>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->company_name ?>" name="perusahaan" disabled>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Alamat</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->address ?>" name ="alamat" disabled>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Region</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->region_name ?>" name="region" disabled>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Provinsi</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->provinsi_name ?>" name="provinsi" disabled>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">PIC</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row->pic_name ?>" name="pic" disabled>
        </div>
    </div>
</div>
</form>
<?php endforeach ?>
<form method="POST" action ="<?php echo base_url('inputor/form_update')?>">
<?php foreach ($lokasiid as $row): ?>   
    <input type="text" name="site_id" value="<?php echo $row->t_nw_site_id?>">
<?php endforeach ?>
<input type="hidden" name="proses" value="2">
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Layanan</span>
            <div class="dropdown">
                <?php echo form_dropdown('up_layanan', $upserv_list,'','class="form-control" id="up_layanan" name="update_layanan"');  ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
            <div class="dropdown">
                <select class="form-control" name="update_paket" id="up_paket">
                    <option value="1">Pilih Layanan Terlebih Dahulu</option>    
                </select>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-addon input-permintaan" id="basic-addon1">Bandwidth</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="update_bw">
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