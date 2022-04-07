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
              <li class="breadcrumb-item active">List Supervisor Review</li>
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
              <h5 class="card-title"> </i>List Supervisor Review
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
               
                <?php
                $id=$row['id_karyawan'];
                $rekan_kerja = $row['rekan_kerja'];
                $nama_karyawan = $row['nama_karyawan'];
                $nama_jabatan = $row['nama_jabatan'];
                $atasan = $row['atasan'];
                $nama_departemen = $row['nama_departemen'];
                $email = $row['email'];
                $kode ="+$id+$rekan_kerja+$nama_karyawan+$atasan+$nama_departemen+$email+$nama_jabatan";
                $kode= base64_encode($kode);
                ?> 
                <td>
                <a href="/kinerja/admin/Spv_appraisal/lihat_form/<?= $kode; ?>" class="btn btn-danger" ><i class="nav-icon fa fa-eye"> Lihat</i></a>
                <a href="/kinerja/admin/Spv_appraisal/spv_pdf/<?= $kode; ?>" class="btn btn-success" ><i class="nav-icon fa fa-file"> Download PDF</i></a>
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

