<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="/naimun/admin/laporan/periodik_pdf/"><h5 class="card-title  " ><i class="nav-icon fa fa-print"></i> Cetak Laporan
             </a>
              </h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Wawancara</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- ini buat card kecil2-->

       <div class="row">
       <?php foreach($get_periodik_jumlah_wawancara as $row1) { ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Jumlah Wawancara</h3>

                <h4><?= $row1['jumlah_wawancara']; ?> Orang Telah Diwawancara</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="http://localhost/naimun/admin/wawancara" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?> 
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <?php foreach($get_periodik_jumlah_lowongan as $row2) { ?>
            <div class="small-box bg-info">
              <div class="inner">
              <h3>Lowongan</h3>

<h4> Terdapat <?= $row2['jumlah_lowongan']; ?> Lowongan</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="http://localhost/naimun/admin/lowongan" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?> 
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <?php foreach($get_periodik_jumlah_lamaran as $row3) { ?>
            <div class="small-box bg-success">
              <div class="inner">
              <h3>Lamaran</h3>

<h4> Terdapat <?= $row3['jumlah_lamaran']; ?> Lamaran</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="http://localhost/naimun/admin/lamaran" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?> 
          <!-- ./col -->
     
        </div>
        <!-- /.row -->
        
        <!-- end ini buat card kecil2-->
        
      <div class="row">
        <div class="col-12">    
          <div class="card">
            <!-- ini yang edit buat button tambah-->
            <div class="card-header">
          
            </div>
               <!-- ini akhir dari yang edit buat button tambah-->
            <!-- /.card-header -->
            


        <!-- table tanpa search-->


    

       <!-- end table tanpa search-->



            <div class="card-body">
            <table class="table table-striped">
           
                <thead>
                <tr>
                  <th>No</th>
                  <th>Lowongan</th>
                  <th style="width: 10%">Nama Pelamar</th>
                  <th style="width: 10%">Alamat Pelamar</th>
                  <th style="width: 10%">Pewawancara 1</th>
                  <th style="width: 10%">Pewawancara 2</th>
                  <th style="width: 12%">Tanggal Wawancara</th>
                  <th style="width: 10%">Jam Wawancara</th>
                  
                 
                </tr>
                </thead>

                <tbody>

                <?php 
                            $no = 0;
                            foreach($get_periodik as $row) { 
                            $no++;
                            ?>
        
              <tr>
                <td><?php echo $no; ?></td>
                <td><?= $row['jabatan']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['pewawancara1']; ?></td>
                <td><?= $row['pewawancara2']; ?></td>
                <td><?= $row['tgl_wawancara']; ?></td>
                <td><?= $row['jam_wawancara']; ?></td>
               
                
                
                              
              </tr>
              <?php } ?> 
          </tbody>




           
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
