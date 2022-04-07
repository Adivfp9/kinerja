<div class="content-wrapper">
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
              <div class="d-inline-block">
                  <h3 class="card-title"> <i class="fa fa-edit"></i>
                  Change Question</h3>
              </div>
              <div class="d-inline-block float-right">
                <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> <?= trans('back') ?></a>
              </div>
            </div>
            <?php foreach($get_pertanyaan as $u){ ?>
            <div class="card-body">
    		  	<?php echo form_open(base_url('admin/pertanyaan/update'), 'id="frmvalidate"');  ?> 
    			          <input type="hidden" name="id" value="<?php echo $u->id ?>"  />
                    <div class="box-body">
                    <div class="form-group">
                    <label for="pertanyaan" class="col-md-12 control-label">Question Category</label>
                    <div class="col-md-12">
                    <input type="text" name="kategori_pertanyaan" class="form-control" value="<?php echo $u->kategori_pertanyaan ?>" id="kategori_pertanyaan" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="pertanyaan" class="col-md-12 control-label">Question</label>
                    <div class="col-md-12">
                    <input type="text" name="pertanyaan" class="form-control" value="<?php echo $u->pertanyaan ?>" id="pertanyaan" placeholder="">
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
