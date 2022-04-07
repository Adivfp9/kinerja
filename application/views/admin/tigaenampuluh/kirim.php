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
              <li class="breadcrumb-item active">Send 360 Degree Feedback Form</li>
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
              <h5 class="card-title"> </i>Send 360 Degree Feedback Form
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
                  <th>Colleague-1</th>
                  <th>Colleague-2</th>
                  <th>Colleague-3</th>
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
                <td><?= $row['rekan_kerja2']; ?></td>
                <td><?= $row['rekan_kerja3']; ?></td>
                
                <td>

                <?php
                $id=$row['id_karyawan'];
                $rekan_kerja = $row['rekan_kerja'];
                $rekan_kerja2 = $row['rekan_kerja2'];
                $rekan_kerja3 = $row['rekan_kerja3'];
                $nama_karyawan = $row['nama_karyawan'];
                $nama_jabatan = $row['nama_jabatan'];
                $atasan = $row['atasan'];
                $nama_departemen = $row['nama_departemen'];
                $email = $row['email'];
                $inisial = $row['inisial'];
                $tgl_appraisal = $row['tgl_appraisal'];
                $kode ="+$id+$rekan_kerja+$nama_karyawan+$atasan+$nama_departemen+$email+$nama_jabatan+$inisial+$rekan_kerja2+$rekan_kerja3+$tgl_appraisal";
                       $kode= base64_encode($kode);
          
                ?> 

                <a href="/kinerja/admin/tigaenampuluh/kirim_form/<?= $kode; ?>" class="btn btn-primary" ><i class="nav-icon fa fa-send"> Send</i></a>
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
