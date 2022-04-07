<?php
$kode = $this->uri->segment(4);
$url = $this->uri->segment(4);
$kode = base64_decode($kode);
$kode = explode('+', $kode);
$id_karyawan = $kode[1];
$rekan_kerja = $kode[2];
$nama_karyawan = $kode[3];
$atasan = $kode[4];
$nama_departemen = $kode[5];
$email2 = $kode[6];
$jabatan = $kode[7];
$inisial = $kode[8];
$kode = $kode[9];
$tanggal_input = date("Y/m/d");
?>



<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/select2.min.css">
<div class="content-wrapper">
     <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> 
              360' Feedback form </h3>
          </div>
     
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/online/proses'), 'class="form-horizontal"');  ?> 


                  <div class="form-group">
                    <label for="nama" class="col-md-12 control-label">Nama Karyawan</label>
                    <div class="col-md-12">
                    <input type="text" readonly name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="" value="<?= $inisial; ?>">
                    <input type="hidden" readonly name="id_karyawan" class="form-control" id="id_karyawan" placeholder="" value="<?= $id_karyawan; ?>">
                    <?php foreach($get_pertanyaan_360_rekan as $rowx) { ?>
                      <input type="hidden" readonly name="id_karyawan_penilai" class="form-control" id="id_karyawan_penilai" placeholder="" value="<?= $rowx['id']; ?>xx">
                      <?php } ?> </div>
                  </div>

                  <div class="form-group">
                    <label for="posisi" class="col-md-12 control-label">Posisi</label>
                    <div class="col-md-12">
                    <input type="hidden" readonly name="id_karyawan_penilai" class="form-control" id="id_karyawan_penilai" placeholder="" value="<?= $rowx['id']; ?>xx">
                    <input type="hidden" readonly name="kode" class="form-control" id="kode" placeholder="" value="<?= $kode; ?>">
                    
                    <input type="text" readonly name="posisi" class="form-control" id="posisi" placeholder="" value="<?= $jabatan; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="brand" class="col-md-12 control-label">Brand / Team</label>
                    <div class="col-md-12">
                    <input type="text" readonly name="brand" class="form-control" id="brand" placeholder="" value="<?= $nama_departemen; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tanggal" class="col-md-12 control-label">Tanggal</label>
                    <div class="col-md-12">
                    <input type="text" readonly name="tanggal" class="form-control" id="tanggal" placeholder="" value="<?= $tanggal_input; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="rekan" class="col-md-12 control-label">Nama Rekan Kerja</label>
                    <div class="col-md-12">
                    <input type="text" readonly name="rekan" class="form-control" id="rekan" placeholder="" value="<?= $rekan_kerja; ?>">
                    </div>
                  </div>


                  
                  <input type="hidden" name="itung" class="form-control" id="itung" placeholder="">
                  <div class="form-group">
                    <label for="pertanyaan" class="col-md-12 control-label"></label>
                    <div class="col-md-12">
                    <div class="row">
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><td colspan="3">*Grade value min = 1 , max = 5, using . for decimal grade</th></tr>
                <tr>
                <th>No</th>
                <th>Indicator</th>
                  <th>Grade</th>
                     </tr>
                </thead>
                <tbody>
                <tr>
                <th colspan="3">Performance (45%)</th>
                
                     </tr>
                         <?php 
                            $no = 0;
                            foreach($get_pertanyaan_360_per as $row) { 
                            $no++;
                            ?>

            
                            <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td width="100px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>

              <?php } ?>

              <tr>
                <th colspan="3">Atittude (55%)</th>
                
                     </tr>
                     </tr>
                         <?php 
                           
                            foreach($get_pertanyaan_360_att as $row) { 
                            $no++;
                            ?>

            
                            <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td width="70px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>
              <?php } ?>
              </div>
                    
                    </div>
                  </div>

                 
              </table>
                  <div class="form-group">
                    <label for="deskripsi" class="col-md-12 control-label">Masukan Lainnya</label>

                    <div class="col-md-12">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('submit') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
             </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>

  <!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Page script -->
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script>
  $("#forms").addClass('active');
  $("#advanced").addClass('active');
</script> 