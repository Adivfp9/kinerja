<?php
$kode = $this->uri->segment(4);
$url = $this->uri->segment(4);
$kode = base64_decode($kode);
//print $kode;exit;
$kode = explode('+', $kode);

//print $kode[6];exit;
$nama_karyawan = $kode[6];
$jabatan = $kode[10];
$nama_departemen = $kode[8];
$atasan = $kode[7];

$id_karyawan = $kode[1];
$rekan_kerja = $kode[2];


$email2 = $kode[6];
$tanggal_appraisal = $kode[14];
$nama_karyawan = $kode[6];
$atasan = $kode[7];
$kode = "$tanggal_appraisal$nama_karyawan$atasan";

$kode_form = $kode;
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
              Supervisor Form </h3>
          </div>
     
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/online/proses_spv'), 'class="form-horizontal"');  ?> 


                  <div class="form-group">
                    <label for="nama" class="col-md-12 control-label">Nama Karyawan</label>
                    <div class="col-md-12">
                    <input type="text" readonly name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="" value="<?= $nama_karyawan; ?>">
                    <input type="hidden" readonly name="id_karyawan" class="form-control" id="id_karyawan" placeholder="" value="<?= $id_karyawan; ?>">
                    <input type="hidden" readonly name="kode_form" class="form-control" id="kode_form" placeholder="" value="<?= $kode_form; ?>">
                   
                    <?php foreach($get_pertanyaan_360_rekan as $row) { ?>
                      <input type="hidden" readonly name="id_karyawan_penilai" class="form-control" id="id_karyawan_penilai" placeholder="" value="<?= $row['id']; ?>">
                      <?php } ?> </div>
                  </div>

                  <div class="form-group">
                    <label for="posisi" class="col-md-12 control-label">Posisi</label>
                    <div class="col-md-12">
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
                    <label for="rekan" class="col-md-12 control-label">Atasan</label>
                    <div class="col-md-12">
                    <input type="text" readonly name="atasan" class="form-control" id="atasan" placeholder="" value="<?= $atasan; ?>">
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
                <tr><td colspan="4">*Grade value min = 1 , max = 5, using . for decimal grade</th></tr>
                <tr>
                <th>No</th>
                <th>Indicator</th>
                  <th>Grade Employee</th>
                  <th>Grade Supervisor</th>
                     </tr>
                </thead>
                <tbody>

                <!--set of knowledge -->
                <tr><td colspan="4"><b> SET OF KNOWLEDGE<b></th></tr>
                <?php 
                            $no = 0;
                            foreach($get_pertanyaan_spv_know as $row) { 
                            $no++;
                            ?>
                                      <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['jenis_form']; ?>" >
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id_pertanyaan']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td><center><?= $row['nilai']; ?></center></td>
                <td width="100px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>
  <?php } ?>
                <!--end set of knowledge -->


                 <!--set of skills -->
                 <tr><td colspan="4"><b> SET OF SKILLS<b></th></tr>
                <?php 
                            
                            foreach($get_pertanyaan_spv_skills as $row) { 
                            $no++;
                            ?>
                                <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>" >
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td><center><?= $row['nilai']; ?></center></td>
                <td width="70px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01" > </td>                             
              </tr>
              <?php } ?>
                <!--end set of skills -->

                                 <!--set of ATTITUDE -->
                                 <tr><td colspan="4"><b> SET OF ATTITUDE<b></th></tr>
                <?php 
                            
                            foreach($get_pertanyaan_spv_attitude as $row) { 
                            $no++;
                            ?>
                            <tr>
                            <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>" >
              
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td><center><?= $row['nilai']; ?></center></td>
                <td width="70px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>

       
              <?php } ?>

              <tr>
               <td colspan='4'> 
              <div class="form-group">
                    <label for="summary" class="col-md-12 control-label">Summary </label>
                    <p style="color:blue;">&nbsp;&nbsp;&nbsp;Summary From Employee : <?php echo $summary;?></p>
                    <div class="col-md-12">
                      <textarea class="form-control" id="summary" name="summary" rows="3"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="action" class="col-md-12 control-label">Next Action </label>
                    <p style="color:blue;">&nbsp;&nbsp;&nbsp;Next Action From Employee : <?php echo $action;?></p>
                    <div class="col-md-12">
                      <textarea class="form-control" id="action" name="action" rows="3"></textarea>
                    </div>
                  </div>

                            </td>
                            </tr>

              
                <!--end set of ATTITUDE -->


                
               </div>
                </div>
                  </div>
                  

                 
              </table>
<br>
 <table id="example1" class="table table-bordered table-striped text-center text-middle">

                  <tbody>
                    <tr class="bg-info">
                      <th rowspan="2" class="align-middle">SUMMARY SCORE</th>
                      <th rowspan="2" class="align-middle" width="5%">weight</th>
                      <th colspan="2">previous performance</th>
                      <th colspan="2">actual performance</th>
                      <th rowspan="2" class="align-middle">Performance Progress</th>

                    </tr>
                    <tr class="bg-info">
                      <th width="8%">score</th>
                      <th width="8%">weighted</th>
                      <th width="8%">score</th>
                      <th width="8%">weighted</th>
                    </tr>
                  <?php  

                if(sizeof($get_score)>0){
               
                  foreach($get_score as $rowxz) {
                   
                   if(!empty($rowxz['s_knowledge'])){ $s_knowledge = $rowxz['s_knowledge'];} 
                   else {$s_knowledge = 0;}

                   if(!empty($rowxz['w_knowledge'])){ $w_knowledge = $rowxz['w_knowledge'];} 
                   else {$w_knowledge = 0;}

                   if(!empty($rowxz['s_skills'])){ $s_skills = $rowxz['s_skills'];} 
                   else {$s_skills = 0;}

                   if(!empty($rowxz['w_skills'])){ $w_skills = $rowxz['w_skills'];} 
                   else {$w_skills = 0;}

                   if(!empty($rowxz['s_attitude'])){ $s_attitude = $rowxz['s_attitude'];} 
                   else {$s_attitude = 0;}

                   if(!empty($rowxz['w_attitude'])){ $w_attitude = $rowxz['w_attitude'];} 
                   else {$w_attitude = 0;}

                   if(!empty($rowxz['s_individual'])){ $s_individual = $rowxz['s_individual'];} 
                   else {$s_individual = 0;}

                   if(!empty($rowxz['w_individual'])){ $w_individual = $rowxz['w_individual'];} 
                   else {$w_individual = 0;}

                   if(!empty($rowxz['s_total'])){ $s_total = $rowxz['s_total'];} 
                   else {$s_total = 0;}

                   if(!empty($rowxz['w_total'])){ $w_total = $rowxz['w_total'];} 
                   else {$w_total = 0;}

                  }

                }
                else {$s_knowledge = 0; $w_knowledge = 0; $s_skills = 0; $w_skills = 0;$s_attitude = 0; $w_attitude = 0; $s_individual = 0; $w_individual = 0; $s_total = 0; $w_total = 0;}
             
              ?>

                     
                    <tr>
                      <th>1. K N O W L E D G E</th>

                     
                      <th>25%</th>
                      <td width="8%">
                      <?php echo $s_knowledge;?>
                     </td>
                      <td width="8%">
                      <?php echo $w_knowledge;?>
                     </td>
                      <td>
                        <span id="v_score_know_act"></span>
                        <input type="hidden" id="score_know_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_know_act"></span>
                        <input type="hidden" id="weight_know_act" value="0">
                      </td>
                      <td></td>
                    </tr>

                    <tr>
                      <th>2. S K I L L</th>
                      <th>25%</th>
                      <td width="8%">
                      <?php echo $s_skills;?>
                      </td>
                      <td width="8%">
                      <?php echo $w_skills;?>
                     </td>
                      <td>
                        <span id="v_score_skills_act"></span>
                        <input type="hidden" id="score_skills_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_skills_act"></span>
                        <input type="hidden" id="weight_skills_act" value="0">
                      </td>
                      <td></td>

                    </tr>

                    <tr>
                      <th>3. A T T I T U D E</th>
                      <th>55%</th>
                      <td width="8%">
                      <?php echo $s_attitude;?>
                      </td>
                      <td width="8%">
                      <?php echo $w_attitude;?>
                        
                     </td>
                      <td>
                        <span id="v_score_attitude_act"></span>
                        <input type="hidden" id="score_attitude_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_attitude_act"></span>
                        <input type="hidden" id="weight_attitude_act" value="0">
                      </td>
                      <td></td>

                    </tr>

                    <tr>
                      <th>4. INDIVIDUAL DELIVERABLE</th>
                      <th>5%</th>
                      <td width="8%">
                      <?php echo $s_individual;?>
                      </td>
                      <td width="8%">
                      <?php echo $w_individual;?>
                     </td>
                      <td>
                        <span id="v_score_individu_act"></span>
                        <input type="hidden" id="score_individu_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_individu_act"></span>
                        <input type="hidden" id="weight_individu_act" value="0">
                      </td>
                      <td></td>

                    </tr>

                    <tr>
                      <th class="text-center">S U B T O T A L</th>
                      <th>100%</th>
                      <th>
                        <span id="v_tot_scored_prev"></span>
                        <?php echo $s_total;?>
                      </th>
                      <th>
                      <?php echo $w_total;?>
                      </th>
                      <td></td>
                      <td></td>
                      <td></td>

                    </tr>
                  </tbody>
                </table>
                  
<br>

<table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th width='40%'>TOTAL SCORE</th>
                      <th>DEFINITION </th>
                      <th>Salary Adjusment Range</th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>1 to 1,49</td>
                      <td>Poor</td>
                      <td>0</td>
                    </tr>

                    <tr>
                      <td>1,5 to 2,25</td>
                      <td>Adequate </td>
                      <td>0</td>
                    </tr>

                    <tr>
                      <td>2,26 to 3,49</td>
                      <td>Good</td>
                      <td>5-10%</td>
                    </tr>

                    <tr>
                      <td>3,5 to 4</td>
                      <td>Great </td>
                      <td>10-X%</td>
                    </tr>

                  </tbody>
                </table>

                <br>


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