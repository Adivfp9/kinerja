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
                  <th>Employee</th>
                 <th>Appraisal Date</th>
                  <th>Supervisor</th>
                  
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
               <td><?= $row['tng_app']; ?></td>
                <td><?= $row['atasan']; ?></td>
              

                <?php
                $tgl_appraisal = $row['tng_app'];
                $id=$row['id_karyawan'];
                $rekan_kerja = $row['rekan_kerja'];
                $inisial = $row['inisial'];
                $nama_karyawan = $row['nama_karyawan'];
                $nama_jabatan = $row['nama_jabatan'];
                $id_jabatan = $row['id_jabatan'];
                $atasan = $row['atasan'];
                $tanggal_appraisal = $row['tgl_appraisal'];
                $tanggal = $row['tgl_appraisal'];
                
                $nama_departemen = $row['nama_departemen'];
                $email = $row['email'];
                $inisial_atasan= substr($atasan,0,3);
                $kode_form = $row['kode_form'];
                $skyes = "$tgl_appraisal$inisial$inisial_atasan";
                $kode ="+$id+$inisial+$nama_karyawan+$inisial_atasan+$nama_departemen+$email+$nama_jabatan+$id_jabatan+$kode_form+$tanggal";

    //             $kode = explode('+', $kode);
		// var_dump($kode);
		// // return ;
                $kode= base64_encode($kode);
                ?> 
                <td>
                <a href="/kinerja/admin/Spv_appraisal/lihat_form/<?= $kode; ?>" class="btn btn-danger" ><i class="nav-icon fa fa-eye"> Lihat</i></a>
                <a href="/kinerja/admin/Spv_appraisal/pdf_spv/<?= $kode; ?>" class="btn btn-success" ><i class="nav-icon fa fa-file"> Download PDF</i></a>
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
