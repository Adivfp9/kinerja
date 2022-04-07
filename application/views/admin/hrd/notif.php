<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Notification</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Send Notification</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
        
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
       
               
                 <th>Nama Karyawan</th>
                  <th>Jenis Penilaian</th>
                   <th>Nama Penilai</th>
                   <th>Email Penilai</th>
                   <th>Action</th>
           
                   
                </tr>
                </thead>
                <tbody>
                <?php 
                           
                            foreach($get_notif as $row) { 
                            
                ?>
                <tr>
              
                <td><?= $row['nama_karyawan']; ?></td>

           
                <td><?= $row['jenis']; ?></td>
               
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
               
                <td>

<?php
$nama_karyawan=$row['nama_karyawan'];
$jenis = $row['jenis'];
$nama = $row['nama'];
$email = $row['email'];


$kode ="+$nama_karyawan+$jenis+$nama+$email";
 $kode= base64_encode($kode);

?> 

<a href="/kinerja/admin/hrd/kirim_notif/<?= $kode; ?>" class="btn btn-primary" ><i class="nav-icon fa fa-send"> Send</i></a>
</td>
              </tr>
              <?php } ?>  
              </tbody>
              </tfoot>
              </table>
            </div>
            </div>
           </div>
          </div>
         </section>
         </div>
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example2").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollY": true
    });
  });
</script>
<script type="text/javascript">
  function confirmDelete() {
  return confirm('Menghapus Jabatan Dengan Nama <?= $row['nama_jabatan']; ?>?');
  }
</script>
</body>
</html>
