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

<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>  
<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>  
<script type="text/javascript">  
          $(document).ready(function() {  
             $("#perusahaan").change(function(){  
             /*dropdown post *///  
             $.ajax({  
                url:"<?php echo base_url();?>index.php/inputor/buildregion",  
                data: {id: $(this).val()},  
                type: "POST",  
                success:function(data){  
                $("#region").html(data);  
             }  
          });  
       });  
    });  
</script> 

<script type="text/javascript">  
          $(document).ready(function() {  
             $("#layanan").change(function(){  
             /*dropdown post *///  
             $.ajax({  
                url:"<?php echo base_url();?>index.php/inputor/buildpaket",  
                data: {id: $(this).val()},  
                type: "POST",  
                success:function(data){  
                $("#paket").html(data);  
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
        <h1 class="page-header">Form Permintaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST" action="<?php echo base_url('inputor/form_input')?>">
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Lokasi</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="lokasi">
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Jenis Lokasi</span>
        <div class="dropdown">
            <select placeholder="Pilih Perusahaan" class="form-control" name="jenis">    
                <?php foreach ($jenis_list as $row) : ?>
                    <option><?php echo $row->type_name ?></option>
                <?php endforeach?>
            </select>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Perusahaan</span>
        <div class="dropdown">
            <!--<select placeholder="Pilih Perusahaan" class="form-control" name="perusahaan" id="perusahaan">    
                <php foreach ($perusahaan_list as $row) : ?>
                    <option><php echo $row->name ?></option>
                <php endforeach?>     
            </select>-->
        <?php echo form_dropdown('perusahaan', $perusahaan_list,'','class="form-control" id="perusahaan" name="perusahaan"'); ?>
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
            <select class="form-control" name="region" id="region">
                <option value="">Pilih Perusahaan Terlebih Dahulu</option>    
            </select>
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
            <!--<select placeholder="Pilih Perusahaan" class="form-control" name="layanan">    
                <php foreach ($layanan_list as $row) : ?>
                    <option><php echo $row->name ></option>
                <php endforeach?>
            </select>-->
            <?php echo form_dropdown('layanan', $layanan_list,'','class="form-control" id="layanan" name="layanan"');  ?>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="input-group col-lg-6">
        <span class="input-group-addon input-permintaan" id="basic-addon1">Paket Layanan</span>
        <div class="dropdown">
            <select class="form-control" name="paket" id="paket">
                <option value="">Pilih Layanan Terlebih Dahulu</option>    
            </select>
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
    <input type="submit" name="submit" value="Submit" class="btn btn-outline btn-primary btn-success" style="padding: 5px 12px;">
</div>
</form>
</div>
<!-- /#page-wrapper -->

