<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Level</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Job Level</li>
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
              <h5 class="card-title"><i class="nav-icon fa fa-plus"></i>Add Job Level 
              <a href="/kinerja/admin/golongan/add/"><button type="button" class="btn btn-primary"><i class="nav-icon fa fa-plus"></i></button></a>
              </h5>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                  <th>Job Level Code</th>
                  <th>Job Level Name</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                            $no = 0;
                            foreach($get_golongan as $row) { 
                            $no++;
                ?>
                <tr>
              <td><?php echo $no; ?></td>
                <td><?= $row['kode_golongan']; ?></td>
                <td><?= $row['nama_golongan']; ?></td>
                 <td>
                <a href="/kinerja/admin/golongan/edit/<?= $row['id']; ?>" ><i class="nav-icon fa fa-pencil-square-o"></i></a>
                <a href="/kinerja/admin/golongan/delete/<?= $row['id']; ?>" onclick="return confirmDelete();"><i class="nav-icon fa fa-close"></i></a>
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
  return confirm('Menghapus golongan Dengan Nama <?= $row['nama_golongan']; ?>?');
  }
</script>
</body>
</html>
