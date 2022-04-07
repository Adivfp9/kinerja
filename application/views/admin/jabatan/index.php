<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job position</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Job position</li>
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
              <h5 class="card-title"><i class="nav-icon fa fa-plus"></i>Add Job position
              <a href="/kinerja/admin/jabatan/add/"><button type="button" class="btn btn-primary"><i class="nav-icon fa fa-plus"></i></button></a>
              </h5>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                  <th>Job position Code</th>
                  <th>Job position Name</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                            $no = 0;
                            foreach($get_jabatan as $row) { 
                            $no++;
                ?>
                <tr>
              <td><?php echo $no; ?></td>
                <td><?= $row['kode_jabatan']; ?></td>
                <td><?= $row['nama_jabatan']; ?></td>
                 <td>
                <a href="/kinerja/admin/jabatan/edit/<?= $row['id']; ?>" ><i class="nav-icon fa fa-pencil-square-o"></i></a>
                <a href="/kinerja/admin/jabatan/delete/<?= $row['id']; ?>" onclick="return confirmDelete();"><i class="nav-icon fa fa-close"></i></a>
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
<script type="text/javascript">
  function confirmDelete() {
  return confirm('Menghapus Jabatan Dengan Nama <?= $row['nama_jabatan']; ?>?');
  }
</script>
</body>
</html>
