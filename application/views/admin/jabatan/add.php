  <div class="content-wrapper">
     <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add Job position </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="/kinerja/admin/jabatan/" class="btn btn-success"><i class="fa fa-list"></i> Job position List </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/jabatan/add'), 'class="form-horizontal"');  ?> 
                  <div class="form-group">
                    <label for="kode_jabatan" class="col-md-12 control-label">Job position Code</label>
                    <div class="col-md-12">
                    <input type="text" name="kode_jabatan" class="form-control" id="kode_jabatan" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama_jabatan" class="col-md-12 control-label">Job position Name</label>
                    <div class="col-md-12">
                      <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('submit') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
             </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>