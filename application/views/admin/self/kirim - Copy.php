<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kirim 360 Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
              <h5 class="card-title"> </i>Kirim 360 Form
              </h5>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered nowrap" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>Nama karyawan</th>
                 <th>Tanggal Appraisal</th>
                  <th>Atasan</th>
                  <th>Rekan Kerja</th>
                  <th>Action</th>
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
                <td><?= $row['nama_karyawan']; ?></td>
               <td><?= $row['tgl_appraisal']; ?></td>
                <td><?= $row['atasan']; ?></td>
                <td><?= $row['rekan_kerja']; ?></td>
                <td>

                <?php
                $id=$row['id'];
                $rekan_kerja = $row['rekan_kerja'];
                $nama_karyawan = $row['nama_karyawan'];
                $atasan = $row['atasan'];
                $nama_departemen = $row['nama_departemen'];
                $email = $row['email'];
                $kode ="+$id+$rekan_kerja+$nama_karyawan+$atasan+$nama_departemen+$email";
                $kode= base64_encode($kode);
                ?> 

                <a href="/kinerja/admin/tigaenampuluh/kirim_form/<?= $kode; ?>" class="btn btn-primary" ><i class="nav-icon fa fa-send">Kirim Form 360</i></a>
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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
     });
  });
</script>
</body>
</html>
