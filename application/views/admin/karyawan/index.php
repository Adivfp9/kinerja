<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">



    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
          
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>Employee</th>
                  <th>Employee ID</th>
				  <th>Company</th>
                  <th>Email</th>
                  <th>Religion</th>
                  <th>Gender</th>
                  <th>Join Date</th>
                  <th>Resign Date</th>
                  <th>Appraisal Date</th>
                  <th>Supervisor</th>
                  <th>Colleague-1</th>
                  <th>Colleague-2</th>
                  <th>Colleague-3</th>
                  <th>Department</th>
                  <th>Job position</th>
                  <th>Job level</th>
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
				
                <td><?= $row['nik']; ?></td>
				<td><?= $row['nama_perusahaan']; ?></td>
                <td><?= $row['email']; ?></td>
                

                <td><?= $row['agama']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                
                <td><?= $row['tgl_masuk']; ?></td>
                <td><?= $row['tgl_keluar']; ?></td>
                <td><?= $row['tgl_appraisal']; ?></td>
                <td><?= $row['atasan']; ?></td>
                <td><?= $row['rekan_kerja']; ?></td>
                <td><?= $row['rekan_kerja2']; ?></td>
                <td><?= $row['rekan_kerja3']; ?></td>
                <td><?= $row['nama_departemen']; ?></td>
                <td><?= $row['nama_jabatan']; ?></td>
                <td><?= $row['nama_golongan']; ?></td>
     
                <td>
                <!-- <a href="/kinerja/admin/karyawan/edit/<?= $row['id_karyawan']; ?>" class="view btn btn-sm btn-warning" ><i class="nav-icon fa fa-pencil-square-o"></i> UBAH </a> -->
                <a href="/kinerja/admin/karyawan/delete/<?= $row['id_karyawan']; ?>" class="view btn btn-sm btn-danger" onclick="return confirmDelete();">
                <i class="nav-icon fa fa-close" ></i> HAPUS </a>
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
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
<script>
  $(function () {
  
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      autoWidth: true,
      "scrollX": true,
      "scrollY": true,
      "scrollCollapse": true,
      "fixedColumns": {
        left: 2
    }

     
    });
  });
</script>
<script type="text/javascript">
  function confirmDelete() {
  return confirm('Menghapus karyawan Dengan Nama <?= $row['nama_karyawan']; ?>?');
  }
</script>
</body>
</html>
