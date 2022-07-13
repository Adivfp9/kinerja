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
              <li class="breadcrumb-item active">360 Degree Feedback List</li>
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
              <h5 class="card-title"> </i>360 Degree Feedback List
              </h5>
            </div>
            <div class="card-body">
              <!-- Filter Company -->
              
            <table id="example1" class="table table-bordered nowrap" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>Initial </th>
                 <th>Job position</th>
                  <th>Date

                  </th>
                  <th>Colleague Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                            $no = 0;
                            foreach($hasil_360 as $row) { 
                            $no++;
                ?>
                <tr>
              <td><?php echo $no; ?></td>
                <td><?= $row['inisial']; ?></td>
                <td><?= $row['posisi']; ?></td>
               <td><?= $row['tgl_appraisal']; ?></td>
                <td><?= $row['rekan']; ?></td>

                <?php
                $id=$row['id_form_360'];
                $inisial = $row['inisial'];
                $posisi = $row['posisi'];
                $tgl_appraisal = $row['tgl_appraisal'];
                $rekan = $row['rekan'];
                $team = $row['team'];
                $kode_form = $row['kode_form'];
                $id_karyawan = $row['id_karyawan'];
                $kode ="+$inisial+$posisi+$tgl_appraisal+$rekan+$team+$kode_form+$id_karyawan";

                $kode= base64_encode($kode);
                ?> 
                <td>
                <a href="/kinerja/admin/tigaenampuluh/lihat_form/<?= $kode; ?>" class="btn btn-danger" ><i class="nav-icon fa fa-eye"> View</i></a>
                <a href="/kinerja/admin/tigaenampuluh/pdf360/<?= $kode; ?>" class="btn btn-success" ><i class="nav-icon fa fa-file"> Download PDF</i></a>
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
