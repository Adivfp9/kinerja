<?php $kode = $this->uri->segment(4);
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		$inisial = $kode[1];
		$jabatan = $kode[2];
		$tanggal = $kode[3];
		$rekan = $kode[4];
		$nama_departemen = $kode[5];
		$kode_form = $kode[6];
    $tgl_appraisal = substr($kode_form,0,10);
    ?>

<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View 360 Degree Feedback</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">    
          <div class="card">
            <!-- ini yang edit buat button tambah-->
            <div class="card-header">
              <h5 class="card-title"><i class="nav-icon fa fa-list"></i> View 360 Degree Feedback
            </h5>
            </div>
               <!-- ini akhir dari yang edit buat button tambah-->
            <!-- /.card-header -->

            <div class="card-body">
            <table class="table table-striped border">
           
                <thead>
               
                <tr>
                  <th>Employees Infromation</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                <td>Employee Name : <?= $inisial; ?></td>
                </tr>
                <tr>
                <td>Job position: <?= $jabatan; ?></td>
                </tr>
                <tr>
                <td>Department : <?= $nama_departemen; ?></td>
                </tr>
                <tr>
                <td>Colleague : <?= $rekan; ?></td>
                </tr>
            
                <tr>
                <td>Submission Date : <?= $tanggal; ?></td>
                </tr>
                <tr>
                <td>Appraisal Date : <?= $tgl_appraisal; ?></td>
                </tr>

               
          
             </tbody></tfoot>
              </table>
            </div>
            <!-- /.card-body -->

            
                    
                  </div>
              <div class="card-header">
              <h5 class="card-title">360 Degree Feedback Review
            </h5>
            </div>

            <!-- table pertanyaan -->
            <div class="card-body">
            <table class="table table-striped border"> <thead><tr>
                  <th>Indicator</th>
                  <th>Grade</th>
                </thead>
                <tbody>
               <tr> <th colspan="2">Performance(45%)</th></tr>
                <?php foreach($get_karyawan_360_nilai_per as $row) { ?>
                <tr>
              <td><?= $row['pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
             </tr>
             <?php } ?> 

             <tr> <th colspan="2">Attitude(55%)</th></tr>
             <?php foreach($get_karyawan_360_nilai_att as $row) { ?>
                <tr>
              <td><?= $row['pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
             </tr>
             <?php } ?> 
            </tbody>
              </tfoot>
              </table>
              <br>
               <!--table masukan-->
              <table class="table table-striped border">
            <thead>
                <tr>
             <tr> <th colspan="2">Others Feedback</th></tr>  </thead>
             <?php foreach($get_masukan_360 as $rowz) { ?>
              <tr>
              <td colspan="2"><?= $rowz['masukan']; ?></td>
             
             </tr>
             <?php } ?> 
           
             </table>
               <!--table end masukan-->
             <br>
            <!--table penilaian-->
            <table class="table table-striped border" style="width: 50%;">
            <thead>
                <tr>
                  <th>Total Score</th>
                  <th>Average Scores</th>
                  <th>Final Score</th>
                </thead>
            <tbody>

              <?php foreach($hitung_360_per as $row4) { 
               $nilai_per = $row4['nilai'];
               $rata_per = $nilai_per / 2 ;
               $rata_per = round($rata_per,2);
               $final_per = (45/100) * $rata_per;
               $final_per = round($final_per,2);
              }?>

              <?php foreach($hitung_360_att as $row5) { 
               $nilai_att = $row5['nilai'];
               $rata_att = $nilai_att / 3 ;
               $rata_att = round($rata_att,2);
               $final_att = (55/100) * $rata_att;
               $final_att = round($final_att,2);
              
              }
              
              $nilai_final = $final_att + $final_per;
              ?>
     <tr>
     <td>Performance</td>
     <td><?= $rata_per; ?></td>
     <td><?= $final_per; ?></td>
     </tr>
     <tr>
     <td>Attitude</td>
     <td><?= $rata_att; ?></td>
     <td><?= $final_att; ?></td>
     </tr>
     <tr>
     <td colspan="2"></td>
     <td><?= $nilai_final; ?></td>
     </tr>
      </tbody>
      </tfoot>
     </table>
      </div>
            
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
