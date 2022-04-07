<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?= $this->general_settings['application_name']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DropZone -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/dropzone/dropzone.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>

</head>
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
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">    
          <div class="card">
            <!-- ini yang edit buat button tambah-->
            <div class="card-header">
              <h5 class="card-title"><i class="nav-icon fa fa-list"></i> Data 360 Form
            </h5>
            </div>
               <!-- ini akhir dari yang edit buat button tambah-->
            <!-- /.card-header -->

            <div class="card-body">
            <table class="table table-striped border">
           
                <thead>
                <?php 
                            $no = 0;
                            foreach($get_karyawan_360 as $row) { 
                            $no++;
                            ?>
                <tr>
                  <th>Infromasi Karyawan</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                <td>Nama Karyawan : <?= $row['nama_karyawan']; ?></td>
                </tr>
                <tr>
                <td>Jabatan: <?= $row['nama_jabatan']; ?></td>
                </tr>
                <tr>
                <td>Departemen : <?= $row['nama_departemen']; ?></td>
                </tr>
                <tr>
                <td>Nama Rekan Kerja : <?= $row['rekan_kerja']; ?></td>
                </tr>
                <tr>
                <td>Masukan Untuk Rekan Kerja : <?= $row['masukan']; ?></td>
                </tr>
                <tr>
                <td>Tanggal Feedback : <?= $row['tgl_appraisal']; ?></td>
                </tr>
                

              <?php } ?> 
          </tbody></tfoot>
              </table>
            </div>
            <!-- /.card-body -->

            
                    
                  </div>
              <div class="card-header">
              <h5 class="card-title">Penilaian 360 Form
            </h5>
            </div>


            <div class="card-body">
            <table class="table table-striped border">
            
                <thead>
                <tr>
                  <th>Pertanyaan</th>
                  <th>Nilai</th>
                </thead>
                <tbody>
                <?php foreach($get_karyawan_360_nilai as $row) { ?>
                <tr>
              <td><?= $row['pertanyaan']; ?></td>
             <td><?= $row['nilai']; ?></td>
         
               
             </tr>
             <?php } ?> 
            
 
              
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