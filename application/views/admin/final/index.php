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
              <li class="breadcrumb-item active">List Form Performance Review</li>
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
              <h5 class="card-title"> </i>List Form Performance Review
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
                  <th>Self Performance Review</th>
                  <th>360 Degree Feedback</th>
                
                  
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
                
                $inisial = $row['inisial'];
                
                $id=$row['id_karyawan'];
                $id_jabatan=$row['id_jabatan'];
                $rekan_kerja = $row['rekan_kerja'];
                $rekan_kerja2 = $row['rekan_kerja2'];
                $rekan_kerja3 = $row['rekan_kerja3'];
                $nama_karyawan = $row['nama_karyawan'];
                $nama_jabatan = $row['nama_jabatan'];
                $tanggal_appraisal = $row['tgl_appraisal'];
                $atasan = $row['atasan'];
                $nama_departemen = $row['nama_departemen'];
                $email = $row['email'];
                $skye1 = "$tanggal_appraisal$inisial$rekan_kerja";
                $skye2 = "$tanggal_appraisal$inisial$rekan_kerja2";
                $skye3 = "$tanggal_appraisal$inisial$rekan_kerja3";
                $kode ="+$id+$inisial+$rekan_kerja+$rekan_kerja2+$rekan_kerja3+$nama_karyawan+$atasan+$nama_departemen+$email+$nama_jabatan+$skye1+$skye2+$skye3+$tanggal_appraisal+$id_jabatan";
                $kode= base64_encode($kode);
                
                ?> 
                 <td><a href="/kinerja/admin/final_appraisal/finalself/<?= $kode; ?>"><i class="nav-icon fa fa-download"> Download File</i></a></td>
              
             
                <td><a href="/kinerja/admin/final_appraisal/final360pdf/<?= $kode; ?>"><i class="nav-icon fa fa-download"> Download File</i></a></td>
              
             
               <td> <a href="/kinerja/admin/final_appraisal/kirim_form/<?= $kode; ?>" class="btn btn-primary" ><i class="nav-icon fa fa-send">Send</i></a></td>

               
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
    $("#example1").DataTable();
    $('#example2').DataTable({
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
