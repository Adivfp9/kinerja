<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datepicker/datepicker3.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
             TAMBAH DATA KARYAWAN </h3>
          </div>
          <div class="d-inline-block float-right">
             <a href="<?= base_url('admin/karyawan'); ?>" class="btn btn-success"><i class="fa fa-list"></i> List Karyawan</a>
          </div>
        </div>
        <?php foreach($get_karyawan as $u){ ?>
        <div class="card-body">
   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open( base_url('admin/karyawan/add')); ?>
            <input type="hidden" name="id" value="<?php echo $u->id ?>"  />
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <!-- form start -->
                  <div class="card-body">

                      <div class="form-group">
                        <label for="nama_karyawan" class="control-label">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" value="<?php echo $u->nama_karyawan ?>" placeholder="" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="nik" class="control-label">Nomor Induk Karyawan</label>
                        <input type="text" name="nik" class="form-control" id="nik" value="<?php echo $u->nik ?>" placeholder="" required>
                      </div>

                 

                      <div class="form-group">
                        <label for="departemen" class="control-label">Departemen</label>
                        <select class="form-control" name="departemen" id="departemen">
                        <option value="<?php echo $u->departemen ?>"><?php echo $u->departemen ?></option>
                        <?php  foreach($get_departemen as $row) {  ?>
                        <option value="<?= $row['nama_departemen']; ?>"><?= $row['nama_departemen']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>

                      <div class="form-group">
                        <label for="jabatan" class="control-label">Jabatan</label>
                        <select class="form-control" name="jabatan" id="jabatan">
                        <option value="<?php echo $u->jabatan ?>"><?php echo $u->jabatan ?></option>
                        <?php foreach($get_jabatan as $row){ ?>
                        <option value="<?php echo $row['id_jabatan']; ?>"><?php echo $row['nama_jabatan']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>

                      <div class="form-group">
                        <label for="golongan" class="control-label">Golongan</label>
                        <select class="form-control" name="golongan" id="golongan">
                        <option value="<?php echo $u->golongan ?>"><?php echo $u->golongan ?></option>
                        <?php foreach($get_golongan as $row){ ?>
                        <option value="<?php echo $row['nama_golongan']; ?>"><?php echo $row['nama_golongan']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>

                      <div class="form-group">
                        <label for="atasan" class="control-label">Nama Atasan</label>
                        <select class="form-control" name="atasan" id="atasan">
                        <?php foreach($get_karyawan2 as $row){ ?>
                          <option value="<?php echo $u->atasan ?>"><?php echo $u->atasan ?></option>
                        <option value="<?php echo $row['nama_karyawan']; ?>"><?php echo $row['nama_karyawan']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>

                      <div class="form-group">
                        <label for="rekan_kerja" class="control-label">Nama Rekan Kerja</label>
                        <select class="form-control" name="rekan_kerja" id="rekan_kerja">
                        <option value="<?php echo $u->rekan_kerja ?>"><?php echo $u->rekan_kerja ?></option>
                        <?php foreach($get_karyawan2 as $row){ ?>
                        <option value="<?php echo $row['nama_karyawan']; ?>"><?php echo $row['nama_karyawan']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>

                      <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $u->email ?>" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="phone" class="control-label">Nomor Telepon</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $u->phone ?>" placeholder="" required>
                      </div>
                       </div>
                    <!-- /.card-body -->
                </div>
              </div>

              <div class="col-md-6">
                <div class="card">
            
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">

                      <div class="form-group">
                        <label for="alamat" class="control-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $u->alamat ?>" placeholder="" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $u->tempat_lahir ?>" placeholder="" required>
                      </div>
                      
                      <div class="form-group">
                      <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tgl_lahir" class="form-control datepicker" id="tgl_lahir" value="<?php echo $u->tgl_lahir ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                    </div>
                    </div>

                      <div class="form-group">
                        <label for="agama" class="control-label">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                        <option value="<?php echo $u->agama ?>"><?php echo $u->agama ?></option>
                        <option value="islam">Islam</option>
                        <option value="protestan">Protestan</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="khonghucu">Khonghucu</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="<?php echo $u->jenis_kelamin ?>"><?php echo $u->jenis_kelamin ?></option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                      </select>
                      </div>
                     

                      <div class="form-group">
                        <label for="no_ktp" class="control-label">Nomor KTP</label>
                        <input type="text" name="no_ktp" class="form-control" id="no_ktp" placeholder="" value="<?php echo $u->no_ktp ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="npwp" class="control-label">Nomor NPWP</label>
                        <input type="text" name="npwp" class="form-control" id="npwp" placeholder="" value="<?php echo $u->npwp ?>"required>
                      </div>
                      <div class="form-group">
                        <label for="no_rek" class="control-label">Nomor Rekening</label>
                        <input type="text" name="no_rek" class="form-control" id="no_rek" placeholder="" value="<?php echo $u->no_rek ?>"required>
                      </div>

                      <div class="form-group">
                      <label for="tgl_masuk" class="control-label">Tanggal Masuk</label>
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tgl_masuk" class="form-control datepicker" id="tgl_masuk" value="<?php echo $u->tgl_masuk ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                    </div>
                    </div>

                    </div>
                    <!-- /.card-body -->
                </div>
              </div>

              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">

                      <div class="form-group">
                      <label for="date" class="control-label">Tanggal Appraisal</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tgl_appraisal" class="form-control datepicker" id="tgl_appraisal" value="<?php echo $u->tgl_appraisal ?>"data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div>
                  </div>
                 </div>
                      

                      
                    <div class="col-md-6">

                      <div class="form-group">
                      <label for="date" class="control-label">Tanggal Keluar</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tgl_keluar" class="form-control datepicker" id="tgl_keluar" value="<?php echo $u->tgl_keluar ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

                  
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

                <div class="col-md-12">
              
                  <div class="card-body">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
                  </div>
              
              </div>
            </div>
          <?php echo form_close(); ?>
          <?php } ?>
        </div>  
      </div>
    </section> 



    <script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script>
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      dateFormat: 'yyyy/mm/dd'
    });
  </script> 

<script type="text/javascript">
	$('#file-upload').change(function() {
		var filepath = this.value;
		var m = filepath.match(/([^\/\\]+)$/);
		var filename = m[1];
		$('#filename').html(filename);
	});
</script>