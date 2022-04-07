  <div class="content-wrapper">
     <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add Appraisal Score </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="/kinerja/admin/hrd/" class="btn btn-success"><i class="fa fa-list"></i> Appraisal Score List </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/hrd/add'), 'class="form-horizontal"');  ?> 
                 

                  <div class="form-group">
                        <label for="nik" class="control-label">Employee</label>
                        <select class="form-control" name="nik" id="nik">
                        <?php foreach($get_karyawan as $row){ ?>
                        <option value="<?php echo $row['nik']; ?>"><?php echo $row['nama_karyawan']; ?></option>
                        <?php } ?>
                        </select> 
                      </div>
                 
                  

                  <div class="form-group">
                      <label for="tanggal" class="control-label">Appraisal Date</label>
                      <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tanggal" class="form-control datepicker" id="tanggal" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                    </div>
                    </div>


                  <div class="form-group">
                    <label for="s_knowledge" class="col-md-12 control-label">Knowledge Score</label>
                    <div class="col-md-12">
                      <input type="text" name="s_knowledge" class="form-control" id="s_knowledge" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="s_skills" class="col-md-12 control-label">Skill Score</label>
                    <div class="col-md-12">
                      <input type="text" name="s_skills" class="form-control" id="s_skills" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="s_attitude" class="col-md-12 control-label">Attitude Score</label>
                    <div class="col-md-12">
                      <input type="text" name="s_attitude" class="form-control" id="s_attitude" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="s_individual" class="col-md-12 control-label">Individual Deliverable Score</label>
                    <div class="col-md-12">
                      <input type="text" name="s_individual" class="form-control" id="s_individual" placeholder="">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="w_knowledge" class="col-md-12 control-label">Knowledge Weighted</label>
                    <div class="col-md-12">
                      <input type="text" name="w_knowledge" class="form-control" id="w_knowledge" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="w_skills" class="col-md-12 control-label">Skill Weighted</label>
                    <div class="col-md-12">
                      <input type="text" name="w_skills" class="form-control" id="w_skills" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="w_attitude" class="col-md-12 control-label">Attitude Weighted</label>
                    <div class="col-md-12">
                      <input type="text" name="w_attitude" class="form-control" id="w_attitude" placeholder="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="w_individual" class="col-md-12 control-label">Individual Deliverable Weighted</label>
                    <div class="col-md-12">
                      <input type="text" name="w_individual" class="form-control" id="w_individual" placeholder="">
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