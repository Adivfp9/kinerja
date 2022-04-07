<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appraisal Score</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Appraisal Score</li>
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
              <h5 class="card-title"><i class="nav-icon fa fa-plus"></i> Add Appraisal Score
              <a href="/kinerja/admin/hrd/add/"><button type="button" class="btn btn-primary"><i class="nav-icon fa fa-plus"></i></button></a>
              </h5>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
              
                 <th width="15%" rowspan="2" class="text-center align-middle">Employee</th>
                 <th width="1%" colspan="4" class="text-center ">Score</th>
                 <th width="1%" colspan="4" class="text-center">Weighted</th>
                  
                   
                   <th rowspan="2" class="text-center align-middle">Action</th>
                </tr>

                <tr>
               
                 <th width="1%">Knowledge</th>
                  <th>Skill</th>
                   <th>Attitude</th>
                   <th>Individual Deliverable</th>
                   <th>Knowledge</th>
                  <th>Skill</th>
                   <th>Attitude</th>
                   <th>Individual Deliverable</th>
                   
                </tr>
                </thead>
                <tbody>
                <?php 
                           
                            foreach($get_nilai as $row) { 
                            
                ?>
                <tr>
              
                <td><?= $row['namakar']; ?></td>

                <td><?= $row['s_knowledge']; ?></td>
                <td><?= $row['s_skills']; ?></td>
               
                <td><?= $row['s_attitude']; ?></td>
                <td><?= $row['s_individual']; ?></td>

                <td><?= $row['w_knowledge']; ?></td>
                <td><?= $row['w_skills']; ?></td>
                <td><?= $row['w_attitude']; ?></td>
                <td><?= $row['w_individual']; ?></td>

               
                 <td>
                <a href="/kinerja/admin/hrd/edit/<?= $row['id']; ?>" ><i class="nav-icon fa fa-pencil-square-o"></i></a>
                <a href="/kinerja/admin/hrd/delete/<?= $row['id']; ?>" onclick="return confirmDelete();"><i class="nav-icon fa fa-close"></i></a>
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
