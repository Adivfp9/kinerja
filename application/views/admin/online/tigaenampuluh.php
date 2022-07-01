<?php
$kode = $this->uri->segment(4);
$url = $this->uri->segment(4);
$kode = base64_decode($kode);
$kode = explode('+', $kode);
// var_dump($kode);
// return ;
$id_karyawan = $kode[1];
$rekan_kerja = $kode[2];
// $tgl_appraisal = $kode[11];
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
                <?php echo form_open(base_url('admin/online/proses'), array('class' => 'form-horizontal', 'id' => 'formCalc')); 
                foreach ($get_karyawan_360 as $row_360) {
                  $nama_karyawan= $row_360['inisial'] .' - '.$row_360['nama_karyawan'];
                }
                foreach ($get_rekan_360 as $rekan_360) {
                  $nama_rekan= $rekan_360['inisial'] .' - '.$rekan_360['nama_karyawan'];
                }
                ?>
                <div class="form-group">
                  <label for="nama" class="col-md-12 control-label">Employee Name</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="" value="<?= $nama_karyawan; ?>">
                    <input type="hidden" readonly name="id_karyawan" class="form-control" id="id_karyawan" placeholder="" value="<?= $id_karyawan; ?>">
                    <?php foreach ($get_pertanyaan_360_rekan as $rowx) { ?>
                      <input type="hidden" readonly name="id_karyawan_penilai" class="form-control" id="id_karyawan_penilai" placeholder="" value="<?= $rowx['id']; ?>xx">
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="posisi" class="col-md-12 control-label">Position</label>
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
                  <label for="tanggal" class="col-md-12 control-label">Date</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="tanggal" class="form-control" id="tanggal" placeholder="" value="<?= $tanggal_input; ?>">
                    <!-- <input type="hidden" name="tgl_appraisal" value="<?= $tgl_appraisal; ?>"> -->
                  </div>
                </div>

                <div class="form-group">
                  <label for="rekan" class="col-md-12 control-label">Colleague Name</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="rekan" class="form-control" id="rekan" placeholder="" value="<?= $nama_rekan; ?>">
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
                            <tr>
                              <td colspan="3">*Grade value min = 1 , max = 5, using . for decimal grade</th>
                            </tr>
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
                            foreach ($get_pertanyaan_360_per as $row) {
                              $no++;
                            ?>
                              <tr>
                                <td width="50"><?php echo $no; ?></td>
                                <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                                <td><?= $row['pertanyaan']; ?></td>
                                <td width="100px">
                                  <input type="number" min="1" max="5" id="jawaban<?php echo $no; ?>" name="jawaban<?php echo $no; ?>" class="form-control" onkeyup="hitungrata_per();" value="0" required step="0.01">
                                </td>
                              </tr>
                            <?php } ?>
                            <tr>
                              <th colspan="3">Attitude (55%)</th>
                            </tr>
                            </tr>
                            <input type="hidden" name="total_per" value="<?php echo $jml_360per; ?>" id="total_per">
                            <input type="hidden" name="total_att" value="<?php echo $jml_360att; ?>" id="total_att">
                            <?php
                            foreach ($get_pertanyaan_360_att as $row) {
                              $no++;
                            ?>
                              <tr>
                                <td width="50"><?php echo $no; ?></td>
                                <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                                <td><?= $row['pertanyaan']; ?></td>
                                <td width="70px">
                                  <input type="number" min="1" max="5" id="jawaban<?php echo $no; ?>" name="jawaban<?php echo $no; ?>" class="form-control" value="0" required step="0.01" onkeyup="hitungrata_att();">
                                </td>
                              </tr>
                            <?php } ?>
                      </div>
                    </div>
                  </div>
                  </table>
                  <div class="form-group">
                    <label for="deskripsi" class="col-md-12 control-label">Others Feedback</label>
                    <div class="col-md-12">
                      <textarea class="form-control" required id="deskripsi" name="deskripsi" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <!-- <div class="col-md-8"> -->
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Summary Score 360</th>
                            <th>Weight</th>
                            <th>Average Score</th>
                            <th>Final Score</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Performance</td>
                            <td>45%</td>
                            <td>
                              <!-- <input type="text" id="rata_perf" readonly="readonly" disabled> </td> -->
                              <div id="rata_perf"></div>
                            <td>
                              <div id="final_perf">
                            </td>
                          </tr>
                          <tr>
                            <td>Attitude</td>
                            <td>55%</td>
                            <td>
                              <div id="rata_att">
                            </td>
                            <td>
                              <div id="final_att">
                            </td>
                          </tr>
                          <tr>
                            <th colspan="3" class="text-center">T O T A L &nbsp &nbsp S C O R E</th>
                            <td>
                              <div id="total_score">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <input type="submit" name="submit" value="<?= trans('submit') ?>" class="btn btn-primary pull-right">
                      <!-- </div> -->
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

  function hitungrata_per() {
    // var tot_per = document.getElementById('total_per').value;
    // var tot_att = document.getElementById('total_att').value;

    var tot_per = $("#total_per").val();
    var tot_att = $("#total_att").val();

    var sum = 0;
    for (var i = 1; i <= parseInt(tot_per); i++) {
      var elems = document.getElementById("jawaban" + i).value == '' ? 0 : document.getElementById("jawaban" + i).value;
      sum += parseFloat(elems);
    }

    var rata_perf = parseFloat(sum / parseInt(tot_per)).toFixed(2);

    document.getElementById("rata_perf").innerHTML = rata_perf;
    document.getElementById("final_perf").innerHTML = parseFloat(rata_perf * (45 / 100)).toFixed(2);

    var final_p = document.getElementById("final_perf").innerHTML == '' ? 0 : document.getElementById("final_perf").innerHTML;

    var final_a = document.getElementById("final_att").innerHTML == '' ? 0 : document.getElementById("final_att").innerHTML;

    // console.log(parseFloat(final_p)+parseFloat(final_a));

    var tot_final_score = parseFloat(final_p) + parseFloat(final_a);

    document.getElementById("total_score").innerHTML = tot_final_score.toFixed(2);

  }

  function hitungrata_att() {
    var tot_per = document.getElementById('total_per').value;
    var tot_att = document.getElementById('total_att').value;

    var sum = 0;

    for (var i = parseInt(tot_per) + 1; i <= parseInt(tot_per) + parseInt(tot_att); i++) {
      var elems = document.getElementById("jawaban" + i).value == '' ? 0 : document.getElementById("jawaban" + i).value;
      sum += parseFloat(elems);
    }
    var rata_att = parseFloat(sum / parseInt(tot_att)).toFixed(2);
    document.getElementById("rata_att").innerHTML = rata_att;
    document.getElementById("final_att").innerHTML = parseFloat(rata_att * (55 / 100)).toFixed(2);

    var final_p = document.getElementById("final_perf").innerHTML == '' ? 0 : document.getElementById("final_perf").innerHTML;

    var final_a = document.getElementById("final_att").innerHTML == '' ? 0 : document.getElementById("final_att").innerHTML;

    // console.log(parseFloat(final_p)+parseFloat(final_a));
    var tot_final_score = parseFloat(final_p) + parseFloat(final_a);

    document.getElementById("total_score").innerHTML = tot_final_score.toFixed(2);


  }


  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
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