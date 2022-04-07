<div class="content-wrapper">
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
              <div class="d-inline-block">
                  <h3 class="card-title"> <i class="fa fa-edit"></i>
                  Change Job position</h3>
              </div>
              <div class="d-inline-block float-right">
                <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> <?= trans('back') ?></a>
              </div>
            </div>
            <?php foreach($get_jabatan as $u){ ?>
            <div class="card-body">
    		  	<?php echo form_open(base_url('admin/jabatan/update'), 'id="frmvalidate"');  ?> 
    			          <input type="hidden" name="id" value="<?php echo $u->id ?>"  />
                    <div class="box-body">
                    <div class="form-group">
                    <label for="nama_jabatan" class="col-md-12 control-label">Job position Code</label>
                    <div class="col-md-12">
                    <input type="text" name="kode_jabatan" class="form-control" value="<?php echo $u->kode_jabatan ?>" id="kode_jabatan" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="nama_jabatan" class="col-md-12 control-label">Job position Name</label>
                    <div class="col-md-12">
                    <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $u->nama_jabatan ?>" id="nama_jabatan" placeholder="">
                    </div>
            </div>
            <div class="box-footer">
                        <input type="hidden" name="submit" value="submit"  />
                        <button type="submit" class="btn btn-success pull-right"><?= trans('submit') ?></button>
                    </div>
                    <?php } ?>
                <?php echo form_close(); ?>
    	    	</div>
            </div>
            </section>
            </div>
