<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><?= trans('home') ?></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
      
   
          
        </div>
        <!-- /.row -->
      <div class="row">
      <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Employee ID</th>
                  <th>Employee</th>
		  <th>Company</th>
                  <th>Department</th>
                  <th>Job Position</th>
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
                <td><?= $row['nama_departemen']; ?></td>
                <td><?= $row['nama_jabatan']; ?></td>

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
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->