<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-3">
        <div class="small-box bg-success">
          <div class="inner">
            <h1><?php 
              echo $get_jumlah_final;
            ?></h1>
            <h4>Final Reviews</h4>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
            <a href="/kinerja/admin/Final_appraisal/list_index" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="small-box bg-primary">
          <div class="inner">
            <h1><?php 
              echo $jumlah360;
            ?></h1>
            <h4>360 Reviews</h4>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
            <a href="/kinerja/admin/tigaenampuluh/" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="small-box bg-warning">
          <div class="inner">
            <h1><?php 
              echo $get_jumlah_self;
            ?></h1>
            <h4>Self Reviews</h4>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
            <a href="/kinerja/admin/Self_appraisal/" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="small-box bg-danger">
          <div class="inner">
            <h1><?php 
              echo $get_jumlah_spv;
            ?></h1>
            <h4>SPV Reviews</h4>
          </div>
          <div class="icon">
            <i class="ion ion-bookmark"></i>
          </div>
            <a href="/kinerja/admin/Spv_appraisal/" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
      </div>
    </div>
  </div>
    <div class="container-fluid">
        <!-- /.row -->
      <div class="row">
      <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
              <h3 class="card-title"> </i>Upcoming Appraisal
                <div class="pull-right">
                  <a href="/kinerja/admin/dashboard/send_hr" class="btn btn-success">Send to HR</a>
                </div> 
              </h3>
              
         </div>
        <div class="card-body">
        
          <!-- Filter Company -->
          <!-- <form method="get" action="<?php echo base_url('admin/dashboard/filter_company_dashboard')?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="departemen" class="control-label">Company</label>
                  <select class="form-control" name="company" id="company">
                  <?php  foreach($get_company as $row) {  ?>
                  <option value="<?= $row['id_perusahaan']; ?>"><?= $row['nama_perusahaan']; ?></option>
                  <?php } ?>
                  </select> 
                </div>                
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="submit" name="submit" value="Search" class="btn btn-primary">
                    </div>  
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="button" name="send" value="Send to HR" class="btn btn-success">
                    </div> 
                  </div>
                </div>                              
              </div>
          </form> -->
            <table id="#" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Employee ID</th>
                  <th>Employee</th>
		              <th>Company</th>
                  <th>Department</th>
                  <th>Join Date</th>
                  <th>Appraisal Date</th>    
                </tr>
                </thead>

                <tbody>

                <?php 
                            $no = 0;
                            foreach($get_karyawan as $row) { 
                            $no++;
                ?>

              <tr>
              <td><?php echo $no; ?></td>
                <td><?= $row['nik']; ?></td>
                <td><?= $row['nama_karyawan']; ?></td>
                <td><?= $row['nama_perusahaan']; ?></td>
                <td><?= $row['nama_departemen']; ?> - <?= $row['nama_jabatan']; ?></td>

                <?php

                $tanggal_masuk = $row['tgl_masuk'];
                $tanggal_masuk = date('d F Y ', strtotime($tanggal_masuk));
                $tgl_appraisal = $row['tgl_appraisal'];
                $tgl_appraisal = date('d F Y ', strtotime($tgl_appraisal));
                

                ?>
                <td><?= $tanggal_masuk; ?></td>
                <td><?= $tgl_appraisal; ?></td>
                
            
             


                              
              </tr>
              <?php } ?>  
          </tbody>




           
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
      </div>
      </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
<script>
  $(function () {
  
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      autoWidth: true,
      "scrollX": true,
      "scrollY": true,
      "scrollCollapse": true,
      "fixedColumns": {
        left: 2
    }

     
    });
  });
</script>