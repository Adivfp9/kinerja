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
              <li class="breadcrumb-item active">Send Self Performance Review Form</li>
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
              <h5 class="card-title"> </i>Send Self Performance Review Form
              </h5>
            </div>
            <div class="card-body">
              <!-- Filter Company -->
              <form method="get" action="<?php echo base_url('admin/Self_appraisal/filter_company_self')?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="departemen" class="control-label">Company</label>
                  <select class="form-control" name="company" id="company">
                  <?php  foreach($get_company as $row) {  ?>
                  <option value="<?= $row['id_perusahaan']; ?>"><?= $row['nama_perusahaan']; ?></option>
                  <?php } ?>
                  </select> 
                </div>                
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="departemen" class="control-label">Appraisal Date</label>
                    <div class="row">
                      <div class="col-md-6">
                        <input type="date" name="tgl_mulai" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="tgl_sampai" class="form-control">
                      </div>
                    </div>
                    
                    
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="submit" name="submit" value="Search" class="btn btn-primary">
              </button>
                </div>
                
              </div>
            </form>
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
               <td><?= $row['tgl_appraisal']; ?></td>
                <td><?= $row['atasan']; ?></td>
               
                <td>

                <?php
                $tanggal_appraisal = $row['tgl_appraisal'];
                $id=$row['id_karyawan'];
                $rekan_kerja = $row['rekan_kerja'];
                $nama_karyawan = $row['nama_karyawan'];
                $nama_jabatan = $row['nama_jabatan'];
                $atasan = $row['atasan'];
                $nama_departemen = $row['nama_departemen'];
                $email = $row['email'];
                $id_departemen = $row['id_jabatan'];
                $skyes = "$tanggal_appraisal$nama_karyawan$atasan";
                
                $kode ="+$id+$rekan_kerja+$nama_karyawan+$atasan+$nama_departemen+$email+$nama_jabatan+$skyes+$id_departemen";
                       $kode= base64_encode($kode);
          
                ?> 


                <a href="/kinerja/admin/Self_appraisal/kirim_form/<?= $kode; ?>" class="btn btn-info" ><i class="nav-icon fa fa-send"> Send</i></a>
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
