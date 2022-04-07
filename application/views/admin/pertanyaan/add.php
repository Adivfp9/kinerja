  <div class="content-wrapper">
     <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add Question </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="/kinerja/admin/pertanyaan/" class="btn btn-success"><i class="fa fa-list"></i> Question List </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/pertanyaan/add'), 'class="form-horizontal"');  ?> 
                  <div class="form-group">
                    <label for="kategori_pertanyaan" class="col-md-12 control-label">Question Category</label>
                    <div class="col-md-12">
                    <input type="text" name="kategori_pertanyaan" class="form-control" id="kategori_pertanyaan" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pertanyaan" class="col-md-12 control-label">Question</label>
                    <div class="col-md-12">
                      <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" placeholder="">
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