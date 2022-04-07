  <div class="content-wrapper">
     <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add Results </h3>
          </div>
     
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/Final_appraisal/add'), 'class="form-horizontal"');  ?> 

     


                  <div class="form-group">
                        <label for="id_karyawan" class="control-label">Employee</label>
                        <select class="form-control" name="id_karyawan" id="id_karyawan">
                        <?php foreach($get_karyawan as $row){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_karyawan']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>



                  <div class="form-group">
                    <label for="summary" class="col-md-12 control-label">Summary</label>
                    <div class="col-md-12">
                      <input type="text" name="summary" class="form-control" id="summary" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="next_action" class="col-md-12 control-label">Next Action</label>
                    <div class="col-md-12">
                      <input type="text" name="next_action" class="form-control" id="next_action" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="increstmen" class="col-md-12 control-label">Increasement</label>
                    <div class="col-md-12">
                      <input type="text" name="increstmen" class="form-control" id="increstmen" placeholder="">
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