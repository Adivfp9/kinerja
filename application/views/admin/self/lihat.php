<?php $kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		$id_karyawan = $kode[1];
 
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$nama_departemen = $kode[5];
		$email2 = $kode[6];?>

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
              <li class="breadcrumb-item active"> Self Performance Review</li>
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
              <h5 class="card-title"><i class="nav-icon fa fa-list"></i> Self Performance Review
            </h5>
            </div>
               <!-- ini akhir dari yang edit buat button tambah-->
            <!-- /.card-header -->

            <div class="card-body">
            <table class="table table-striped border">
           
                <thead>
                <?php 
                            $no = 0;
                            foreach($get_karyawan_self as $row) { 
                            $no++;
                            ?>
                <tr>
                  <th>Employees Infromation</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                <td>Employee : <?= $row['nama_karyawan']; ?></td>
                </tr>
                <tr>
                <td>Job Position: <?= $row['nama_jabatan']; ?></td>
                </tr>
                <tr>
                <td>Organization : <?= $row['nama_departemen']; ?></td>
                </tr>
                <tr>
                <td>Supervisor : <?= $atasan; ?></td>
                </tr>
              
                <tr>
                <td>Date : <?= $row['tgl_appraisal']; ?></td>
                </tr>
                

              <?php } ?> 
          </tbody></tfoot>
              </table>
            </div>
            <!-- /.card-body -->

            
                    
                  </div>
              <div class="card-header">
              <h5 class="card-title">Self Performance Review
            </h5>
            </div>


            <div class="card-body">
            <table class="table table-striped border">
            
                <thead>
                <tr>
                  <th>Indicator</th>
                  <th>Grade</th>
                </thead>
                <tbody>
                <tr> <th colspan="2">KNOWLEDGE</th></tr>
                <?php foreach($get_karyawan_self_know as $row) { ?>
                <tr>
              <td><?= $row['pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
            </tr>
             <?php } ?> 

             <tr> <th colspan="2">SKILLS</th></tr>
                <?php foreach($get_karyawan_self_skills as $row) { ?>
                <tr>
              <td><?= $row['pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
            </tr>
             <?php } ?> 

             <tr> <th colspan="2">ATTITUDE</th></tr>
                <?php foreach($get_karyawan_self_att as $row) { ?>
                <tr>
              <td><?= $row['pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
            </tr>
             <?php } ?> 

             <tr> <th colspan="2">Individual Deliverables</th></tr>
                <?php foreach($get_karyawan_self_other as $row) { ?>
                <tr>
              <td><?= $row['id_pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
            </tr>
             <?php } ?> 
            
            
 
              
          </tbody>




           
                </tfoot>
              </table>
              
<br><br>

              <table class="table table-striped border" style="width: 50%;">
            <thead>
                <tr>
                  <th>SUMMARY Score</th>
                  <th>Previous Score</th>
                  <th>Average Score</th>
                  <th>Final Score</th>
                </thead>
            <tbody>

              <?php foreach($hitung_self_know as $row4) { 
               $nilai_know = $row4['nilai'];
               $jumlah = $row4['jumlah'];
               $rata_knowx = $nilai_know / $jumlah ;
               $rata_know = round($rata_knowx,2);
               $final_knowx = (25/100)*$rata_knowx;
               $final_know = round($final_knowx,2);
                }?>
              
              <?php foreach($hitung_self_skills as $row5) { 
               $nilai_skills = $row5['nilai'];
               $jumlah = $row5['jumlah'];
               $rata_skillsx = $nilai_skills / $jumlah ;
               $rata_skills = round($rata_skillsx,2);
               $final_skills = (25/100)*$rata_skillsx;
               $final_skills = round($final_knowx,2);
                }?>

          <?php foreach($hitung_self_attitude as $row6) { 
               $nilai_att = $row6['nilai'];
               $jumlah = $row6['jumlah'];
               $rata_attx = $nilai_att / $jumlah ;
               $rata_att = round($rata_attx,2);
               $final_att = (45/100)*$rata_attx;
               $final_attitude = round($final_att,2);
                }?>


        <?php foreach($hitung_self_other as $row7) { 
               $nilai_att = $row7['nilai'];
               $jumlah = $row7['jumlah'];
               $rata_otherx = $nilai_att / $jumlah ;
               $rata_other = round($rata_otherx,2);
               $final_otherx = (5/100)*$rata_other;
               $final_other = round($final_otherx,2);
                }?>

              <?php
              
              $total = $final_attitude + $final_skills + $final_know +$final_other ;
              ?>
     <tr>
       
     <?php
        foreach($get_nilai as $n){
          $s_know = $n->s_knowledge;
          $s_skil = $n->s_skills;
          $s_att = $n->s_attitude;
          $s_ind = $n->s_individual;
        }
     ?>
     
     <td>KNOWLEDGE</td>
     <td><?= $s_know; ?></td>
     <td><?= $rata_know; ?></td>
     <td><?= $final_know; ?></td>
     </tr>
     <tr>
     <td>SKILLS</td>
     <td><?=  $s_skil; ?></td>
     <td><?= $rata_skills; ?></td>
     <td><?= $final_skills; ?></td>
     </tr>
     <tr>
     <td>ATTITUDE</td>
     <td><?= $s_att; ?></td>
     <td><?= $rata_att; ?></td>
     <td><?= $final_attitude; ?></td>
     </tr>
     <tr>
     <td>Deliverables</td>
     <td><?= $s_ind; ?></td>
     <td><?= $rata_other; ?></td>
     <td><?= $final_other; ?></td>
     </tr>

     <tr>
     <td colspan=3></td>
     <td><?= $total; ?></td>
     
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