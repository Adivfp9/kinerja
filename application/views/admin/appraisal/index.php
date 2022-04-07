<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
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
              <h5 class="card-title"><i class="nav-icon fa fa-plus"></i>Tambah Data Karyawan
              <a href="/kinerja/admin/karyawan/add/"><button type="button" class="btn btn-primary"><i class="nav-icon fa fa-plus"></i></button></a>
              </h5>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered nowrap" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>Nama karyawan</th>
                  <th>Nik</th>
                  <th>Email</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>NPWP</th>
                  <th>Nomor Rekening</th>
                  <th>Agama</th>
                  <th>Jenis Kelamin</th>
                  <th>Nomor Telepon</th>
                  <th>Alamat</th>
                  <th>Nomor KTP</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Keluar</th>
                  <th>Tanggal Appraisal</th>
                  <th>Atasan</th>
                  <th>Rekan Kerja</th>
                  <th>Departemen</th>
                  <th>Jabatan</th>
                  <th>Golongan</th>
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
                <td><?= $row['email']; ?></td>
                <td><?= $row['tempat_lahir']; ?></td>
                <td><?= $row['tgl_lahir']; ?></td>
                <td><?= $row['npwp']; ?></td>
                <td><?= $row['no_rek']; ?></td>
                <td><?= $row['agama']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['no_ktp']; ?></td>
                <td><?= $row['tgl_masuk']; ?></td>
                <td><?= $row['tgl_keluar']; ?></td>
                <td><?= $row['tgl_appraisal']; ?></td>
                <td><?= $row['atasan']; ?></td>
                <td><?= $row['rekan_kerja']; ?></td>
                <td><?= $row['departemen']; ?></td>
                <td><?= $row['jabatan']; ?></td>
                <td><?= $row['golongan']; ?></td>
     
                 <td>
                <a href="/kinerja/admin/karyawan/edit/<?= $row['id']; ?>" ><i class="nav-icon fa fa-pencil-square-o"></i></a>
                <a href="/kinerja/admin/karyawan/delete/<?= $row['id']; ?>" onclick="return confirmDelete();"><i class="nav-icon fa fa-close"></i></a>
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
<script type="text/javascript">
  function confirmDelete() {
  return confirm('Menghapus karyawan Dengan Nama <?= $row['nama_karyawan']; ?>?');
  }
</script>
</body>
</html>
