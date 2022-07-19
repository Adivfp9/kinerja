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
$kode_form = $kode[8];
$tanggal_input = date("Y-m-d");
$tgl_appraisal = substr($kode_form,0,10);

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
            Self Appraisal Form </h3>
        </div>

      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <?php $this->load->view('admin/includes/_messages.php') ?>
                <?php echo form_open(base_url('admin/online/proses_self'), 'class="form-horizontal"');  ?>
                <div class="form-group">
                  <label for="nama" class="col-md-12 control-label">Employee Name</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="" value="<?= $rekan_kerja; ?> - <?= $nama_karyawan; ?>">
                    <input type="hidden" readonly name="id_karyawan" class="form-control" id="id_karyawan" placeholder="" value="<?= $id_karyawan; ?>">
                    <input type="hidden" readonly name="kode_form" class="form-control" id="kode_form" placeholder="" value="<?= $kode_form; ?>">

                    <?php foreach ($get_pertanyaan_360_rekan as $row) { ?>
                      <input type="hidden" readonly name="id_karyawan_penilai" class="form-control" id="id_karyawan_penilai" placeholder="" value="<?= $row['id']; ?>">
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="posisi" class="col-md-12 control-label">Job Position</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="posisi" class="form-control" id="posisi" placeholder="" value="<?= $jabatan; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="brand" class="col-md-12 control-label">Departement</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="brand" class="form-control" id="brand" placeholder="" value="<?= $nama_departemen; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="tanggal" class="col-md-12 control-label">Appraisal Date</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="tanggal" class="form-control" id="tanggal" placeholder="" value="<?= $tanggal_input; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="tanggal" class="col-md-12 control-label">Submission Date</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="tgl_appraisal" class="form-control" id="tanggal" placeholder="" value="<?= $tgl_appraisal; ?>">
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="rekan" class="col-md-12 control-label">Supervisor</label>
                  <div class="col-md-12">
                    <input type="text" readonly name="atasan2" class="form-control" id="atasan" placeholder="" value="<?= $atasan; ?> - <?= $get_spv; ?>">
                    <input type="hidden" readonly name="atasan" class="form-control" id="atasan" placeholder="" value="<?= $atasan; ?>">
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
                              <td colspan="3">*Grade value min = 1 , max = 4, using . for decimal grade</th>
                            </tr>
                            <tr>
                              <th>No</th>
                              <th>Indicator</th>
                              <th>Grade</th>
                            </tr>
                          </thead>
                          <tbody>

                            <!--set of knowledge -->
                            <tr>
                              <td colspan="3"><b> SET OF KNOWLEDGE<b> </th>
                            </tr>
                            <?php
                            $no = 0;
                            foreach ($get_pertanyaan_self_know as $row) {
                              $no++;
                            ?>
                              <tr>
                                <td width="50"><?php echo $no; ?></td>
                                <input type="hidden" name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>">
                                <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                                <td><?= $row['pertanyaan']; ?></td>
                                <td width="100px">
                                  <input type="number" min="1" max="4" id="jawaban<?php echo $no; ?>" name="jawaban<?php echo $no; ?>" class="form-control" onkeyup="count_know();" value="" max="4" required step="0.01">
                                </td>
                              </tr>
                            <?php } ?>
                            <!--end set of knowledge -->

                            <!--set of skills -->
                            <tr>
                              <td colspan="3"><b> SET OF SKILLS<b></th>
                            </tr>
                            <?php

                            foreach ($get_pertanyaan_self_skills as $row) {
                              $no++;
                            ?>
                              <tr>
                                <td width="50"><?php echo $no; ?></td>
                                <input type="hidden" name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>">
                                <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                                <td><?= $row['pertanyaan']; ?></td>
                                <td width="100px">
                                  <input type="number" min="1" max="4" id="jawaban<?php echo $no; ?>" name="jawaban<?php echo $no; ?>" class="form-control" onkeyup="count_skills();" value="" required step="0.01">
                                </td>
                              </tr>
                            <?php } ?>
                            <!--end set of skills -->

                            <!--set of ATTITUDE -->
                            <tr>
                              <td colspan="3"><b> SET OF ATTITUDE<b></th>
                            </tr>
                            <?php

                            foreach ($get_pertanyaan_self_attitude as $row) {
                              $no++;
                            ?>
                              <tr>
                              <tr>
                                <td width="50"><?php echo $no; ?></td>
                                <input type="hidden" name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>">
                                <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                                <td><?= $row['pertanyaan']; ?></td>
                                <td width="100px">
                                  <input type="number" min="1" max="4" id="jawaban<?php echo $no; ?>" name="jawaban<?php echo $no; ?>" class="form-control" onkeyup="count_attitude();" value="" required step="0.01">
                                </td>
                              </tr>
                            <?php } ?>
                            <!--end set of ATTITUDE -->
                            </table>
<br>
                            <!--Individual Deliverables -->
                            <table id="TabelTransaksi" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th width="50"><button id='BarisBaru' class='btn btn-primary pull-left'><i class='fa fa-plus fa-fw'></i> </th>
                                <th colspan="2"><b> INDIVIDUAL DELIVERABLES<b>
                                </th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                            </table>
                        <br>

                        <div class="form-group">
                    <label for="summary" class="col-md-12 control-label">Summary </label>
                    <div class="col-md-12">
                      <textarea class="form-control" required id="summary" name="summary" rows="5"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="action" class="col-md-12 control-label">Next Action </label>
                    <div class="col-md-12">
                      <textarea class="form-control" onkeyup="calc_intotal()"required id="action" name="action" rows="5"></textarea>
                    </div>
                  </div>
                        <!--end Individual Deliverables -->
                      </div>
                    </div>
                  </div>
                </div>


                </table>
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
                        <input type="hidden" id="w_know_prev" value="<?= $w_knowledge; ?> ">
                      </td>
                      <td>
                        <span id="v_score_know_act"></span>
                        <input type="hidden" id="score_know_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_know_act"></span>
                        <input type="hidden" id="weight_know_act" value="0">
                      </td>
                      <td>
                        <span id="v_prog_know"></span> %
                        <input type="hidden" id="prog_know_dec" value="0">
                      </td>
                    </tr>

                    <tr>
                      <th>2. S K I L L</th>
                      <th>25%</th>
                      <td width="8%">
                        <?php echo $s_skills;?>
                      </td>
                      <td width="8%">
                        <?php echo $w_skills;?>
                        <input type="hidden" id="w_skill_prev" value="<?= $w_skills; ?> ">
                     </td>
                      <td>
                        <span id="v_score_skills_act"></span>
                        <input type="hidden" id="score_skills_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_skills_act"></span>
                        <input type="hidden" id="weight_skills_act" value="0">
                      </td>
                      <td>
                        <span id="v_prog_skill"></span> %
                        <input type="hidden" id="prog_skill_dec" value="0">
                      </td>

                    </tr>

                    <tr>
                      <th>3. A T T I T U D E</th>
                      <th>45%</th>
                      <td width="8%">
                      <?php echo $s_attitude;?>
                      </td>
                      <td width="8%">
                      <?php echo $w_attitude;?>
                      <input type="hidden" id="w_attitude_prev" value="<?= $w_attitude; ?> ">
                   </td>
                      <td>
                        <span id="v_score_attitude_act"></span>
                        <input type="hidden" id="score_attitude_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_attitude_act"></span>
                        <input type="hidden" id="weight_attitude_act" value="0">
                      </td>
                      <td>
                        <span id="v_prog_attitude"></span> %
                        <input type="hidden" id="prog_attitude_dec" value="0">
                      </td>
                      <td style="font-weight: bold;">In Total</td>
                    </tr>

                    <tr>
                      <th>4. INDIVIDUAL DELIVERABLE</th>
                      <th>5%</th>
                      <td width="8%">
                      <?php echo $s_individual;?>
                      </td>
                      <td width="8%">
                      <?php echo $w_individual;?>
                      <input type="hidden" id="w_indi_prev" value="<?= $w_individual; ?> ">
                      </td>
                      <td>
                        <span id="v_score_individu_act"></span>
                        <input type="hidden" id="score_individu_act" value="0">
                      </td>
                      <td>
                        <span id="v_weight_individu_act"></span>
                        <input type="hidden" id="weight_individu_act" value="0">
                      </td>
                      <td>
                        <span id="v_prog_ind"></span> %
                        <input type="hidden" id="prog_ind_dec" value="0">
                      </td>
                      <td>
                        <span id="v_inTotal"></span> %
                        <input type="hidden" id="inTotal_dec" value="0">
                      </td>

                    </tr>

                    <tr>
                      <th class="text-center">S U B T O T A L</th>
                      <th>100%</th>
                      <th>
                        <span id="v_tot_scored_prev"></span>
                        <?php echo number_format($s_total,2);?>
                      </th>
                      <th>
                        <span id="v_tot_weight_prev"></span>
                        <?php echo number_format($w_total,2);?>
                      </th>
                      <th>
                        <span id="v_tot_scored_act"></span>
                        <input type="hidden" id="tot_scored_act_dec" value="0">
                      </th>
                      <th>
                        <span id="v_tot_weight_acc"></span>
                        <input type="hidden" id="tot_weight_acc_dec" value="">
                      </th>
                    </tr>
                  </tbody>
                </table>
                  
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

                <br><br>
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
<?php if(!empty($get_pertanyaan_self_know)){
  $tot_know = count($get_pertanyaan_self_know);
} else {
  $tot_know = 0;
}

if(!empty($get_pertanyaan_self_skills)){
  $tot_skills = count($get_pertanyaan_self_skills);
} else {
  $tot_skills = 0;
}

if(!empty($get_pertanyaan_self_attitude)){
  $tot_attitude = count($get_pertanyaan_self_attitude);
} else {
  $tot_attitude = 0;
}
?>

<script>
  $(document).ready(function(){
    // for(B=1; B<=1; B++){
    //   BarisBaru();
    // }

    $('#BarisBaru').click(function(){
      BarisBaru();
    });

    // $("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();
  });

  function BarisBaru()
  {
    var Nomor = $('#TabelTransaksi tbody tr').length + 1;
    var Baris = "<tr>";

  // Kolom tombol remove
    Baris += "<td><button class='btn btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button></td>";
  // kolom input text deliverable
    Baris += "<td>";
      Baris += "<input type='text' class='form-control' required name='add_deliv[";
      Baris += Nomor;
      Baris += "]'";
    Baris += "</td>";

    Baris += "<td width='100px'><input type='number' min='1' max='4' class='form-control'     id='nilai_deliv' value='' name='nilai_deliv[";
    Baris += Nomor;
    Baris += "]'";
    Baris += " required step='0.01'></td>";
    Baris += "</tr>";

    $('#TabelTransaksi tbody').append(Baris);

    $('#TabelTransaksi tbody tr').each(function(){
      // $(this).find('td:nth-child(3) input').focus();
    });

    HitungDeliverables();
  }

  // Key down
  $(document).on('keydown', '#nilai_deliv', function(e){
    var charCode = e.which || e.keyCode;
    if(charCode == 9){
      var Indexnya = $(this).parent().parent().index() + 1;
      var TotalIndex = $('#TabelTransaksi tbody tr').length;
      // if(Indexnya == TotalIndex){
      //   BarisBaru();
      //   return false;
      // }
    }
    HitungDeliverables();
  });
  // Key Up
  $(document).on('keyup', '#nilai_deliv', function(e){
    var charCode = e.which || e.keyCode;
    if(charCode == 9){
      var Indexnya = $(this).parent().parent().index() + 1;
      var TotalIndex = $('#TabelTransaksi tbody tr').length;
      // if(Indexnya == TotalIndex){
      //   BarisBaru();
      //   return false;
      // }
    }
    HitungDeliverables();
  });

  $(document).on('click', '#HapusBaris', function(e){
    e.preventDefault();
    $(this).parent().parent().remove();

    HitungDeliverables();
    calculate_scored_act();
    calc_progress();
    calc_intotal();
  });

  function HitungDeliverables()
  {
    var TotDeliv = $('#TabelTransaksi tbody tr').length;
    var sum = 0;
    $('#TabelTransaksi tbody tr').each(function(){
      if($(this).find('td:nth-child(3) input').val() > 0)
      {
        var answer = $(this).find('td:nth-child(3) input').val();
        // Total = parseInt(Total) + parseInt(SubTotal);
        sum = parseFloat(sum)+parseFloat(answer);
      }
    });

    var scored = parseFloat(sum / parseInt(TotDeliv)).toFixed(2);
    var weight = parseFloat(scored * (5 / 100)).toFixed(2);

    $("#score_individu_act").val(scored);
    $("#weight_individu_act").val(weight);
    $("#v_score_individu_act").html(scored);
    $("#v_weight_individu_act").html(weight);

    calculate_scored_act();
    calculate_weight_acc();
    calc_progress();
    calc_intotal();
  }

  function count_know() {
    var tot_know = <?php echo $tot_know;?>;

    var sum = 0;
    for (var i = 1; i <= parseInt(tot_know); i++) {
      var answer = $("#jawaban"+i).val() == '' ? 0 : $("#jawaban"+i).val();
      sum += parseFloat(answer);
    }

    var scored = parseFloat(sum / parseInt(tot_know)).toFixed(2);
    var weight = parseFloat(scored * (25 / 100)).toFixed(2);


    $("#score_know_act").val(scored);
    $("#weight_know_act").val(weight);
    $("#v_score_know_act").html(scored);
    $("#v_weight_know_act").html(weight);
    // calculate_weight_prev();
    calculate_weight_acc();
    calculate_scored_act();
    calc_progress();
    calc_intotal();
  }

  function count_skills() {
    var tot_know = <?php echo $tot_know;?>;
    var tot_skills = <?php echo $tot_skills;?>;

    var sum = 0;
    for (var i = parseInt(tot_know) + 1; i <= parseInt(tot_know) + parseInt(tot_skills); i++) {
      // console.log(i);

      var answer = $("#jawaban"+i).val() == '' ? 0 : $("#jawaban"+i).val();
      sum += parseFloat(answer);
    }
    var scored = parseFloat(sum / parseInt(tot_skills)).toFixed(2);
    var weight = parseFloat(scored * (25 / 100)).toFixed(2);

    $("#score_skills_act").val(scored);
    $("#weight_skills_act").val(weight);
    $("#v_score_skills_act").html(scored);
    $("#v_weight_skills_act").html(weight);

    // calculate_weight_prev();
    calculate_weight_acc();
    calculate_scored_act();
    calc_progress();
    calc_intotal();
  }

  function count_attitude() {
    var tot_know = <?php echo $tot_know;?>;
    var tot_skills = <?php echo $tot_skills;?>;
    var tot_attitude = <?php echo $tot_attitude;?>;

    var sum = 0;
    for (var i = parseInt(tot_know)+parseInt(tot_skills) + 1; i <= parseInt(tot_know)+parseInt(tot_skills) + parseInt(tot_attitude); i++) {
      var answer = $("#jawaban"+i).val() == '' ? 0 : $("#jawaban"+i).val();
      sum += parseFloat(answer);
    }

    var scored = parseFloat(sum / parseInt(tot_attitude)).toFixed(2);
    var weight = parseFloat(scored * (45 / 100)).toFixed(2);

    //console.log(sum);

    $("#score_attitude_act").val(scored);
    $("#weight_attitude_act").val(weight);
    $("#v_score_attitude_act").html(scored);
    $("#v_weight_attitude_act").html(weight);
    // calculate_weight_prev();
    calculate_scored_act();
    calculate_weight_acc();
    calc_progress();
    calc_intotal();

  }

  function count_deliverables(){
    var Totaldeliv = 0;
      $('#TbPertanyaan tbody tr').each(function(){
      if($(this).find('td:nth-child(6) input').val() > 0)
      {
        var SubTotal = $(this).find('td:nth-child(6) input').val();
        Total = parseInt(Total) + parseInt(SubTotal);
      }
    });
    // calculate_weight_prev();
    calculate_scored_act();
    calculate_weight_acc();
    calc_progress();
    calc_intotal();

  }


   $(document).ready(function(){
      $("#score_know_prev, #score_skills_prev, #score_attitude_prev, #score_individu_prev").on("keyup change",function(){
        calculate_scored_prev();
      });

      $("#weight_know_prev, #weight_skills_prev, #weight_attitude_prev, #weight_individu_prev").on("keyup change",function(){
        calculate_weight_prev();
      }); 

      $("#score_know_act, #score_skills_act, #score_attitude_act, #score_individu_act").on("keyup change",function(){
        calculate_scored_act();
      });

      $("#weight_know_act, #weight_skills_act, #weight_attitude_act, #weight_individu_act").on("keyup change",function(){
        calculate_weight_acc();
      });
  });


  function calculate_scored_prev(){
    var scored_know_prev = $("#score_know_prev").val();
    var scored_skills_prev = $("#score_skills_prev").val();
    var scored_attitude_prev = $("#score_attitude_prev").val();
    var scored_individu_prev = $("#score_individu_prev").val();

    if(scored_know_prev == "" || scored_skills_prev == "" || scored_attitude_prev == "" || scored_individu_prev == "") {
      var scored_know_prev = 0;
      var scored_skills_prev = 0;
      var scored_attitude_prev = 0;
      var scored_individu_prev = 0;
    }

    var tot_scored_prev = parseFloat(scored_know_prev)+parseFloat(scored_skills_prev)+parseFloat(scored_attitude_prev)+parseFloat(scored_individu_prev);
    var tot_scored_prev_dec = tot_scored_prev.toFixed(2);
    $("#v_tot_scored_prev").html(tot_scored_prev_dec);
  }

  function calculate_weight_prev(){
    var weight_know_prev = $("#weight_know_prev").val();
    var weight_skills_prev = $("#weight_skills_prev").val();
    var weight_attitude_prev = $("#weight_attitude_prev").val();
    var weight_individu_prev = $("#weight_individu_prev").val();

    if(weight_know_prev == "" || weight_skills_prev == "" || weight_attitude_prev == "" || weight_individu_prev == "") {
      var weight_know_prev = 0;
      var weight_skills_prev = 0;
      var weight_attitude_prev = 0;
      var weight_individu_prev = 0;
    }

    var tot_weight_prev = parseFloat(weight_know_prev)+parseFloat(weight_skills_prev)+parseFloat(weight_attitude_prev)+parseFloat(weight_individu_prev);
    var tot_weight_prev_dec = tot_weight_prev.toFixed(2);
    $("#v_tot_weight_prev").html(tot_weight_prev_dec);
  }


  function calculate_scored_act(){
    var scored_know_act = $("#score_know_act").val();
    var scored_skills_act = $("#score_skills_act").val();
    var scored_attitude_act = $("#score_attitude_act").val();
    var scored_individu_act = $("#score_individu_act").val();

    if(scored_know_act == "" || scored_skills_act == "" || scored_attitude_act == "" || scored_individu_act == "") {
      var scored_know_act = 0;
      var scored_skills_act = 0;
      var scored_attitude_act = 0;
      var scored_individu_act = 0;
    }
    var tot_scored_act = parseFloat(scored_know_act)+parseFloat(scored_skills_act)+parseFloat(scored_attitude_act)+parseFloat(scored_individu_act);
    var tot_scored_act_dec = tot_scored_act.toFixed(2);

    $("#v_tot_scored_act").html(tot_scored_act_dec);
  }

  function calculate_weight_acc(){
    var weight_know_acc = $("#weight_know_act").val();
    var weight_skills_acc = $("#weight_skills_act").val();
    var weight_attitude_acc = $("#weight_attitude_act").val();
    var weight_individu_acc = $("#weight_individu_act").val();

    if(weight_know_acc== "" || weight_skills_acc == "" || weight_attitude_acc == "" || weight_individu_acc == "") {
      var weight_know_acc = 0;
      var weight_skills_acc = 0;
      var weight_attitude_acc = 0;
      var weight_individu_acc = 0;
    }

    var tot_weight_acc = parseFloat(weight_know_acc)+parseFloat(weight_skills_acc)+parseFloat(weight_attitude_acc)+parseFloat(weight_individu_acc);
    var tot_weight_acc_dec = tot_weight_acc.toFixed(2);
    $("#v_tot_weight_acc").html(tot_weight_acc_dec);
  }

  function calc_progress(){
    //**  rumus ((actualweight-prevweight)/prevweight)  */

    // * Knowledge */
    var weight_know_acc2 = $("#weight_know_act").val();
    var weight_know_prev2 = $("#w_know_prev").val();

    if(weight_know_acc2== "" || weight_know_prev2 == "")
    {
      var weight_know_acc2 = 0;
      var weight_know_prev2 = 0;
    }
     if(weight_know_prev2<=0){
      var prog_know_dec =0;
      $("#v_prog_know").html(prog_know_dec);
     }else{
      var prog_know = ((parseFloat(weight_know_acc2)-parseFloat(weight_know_prev2))/parseFloat(weight_know_prev2))*100;

      var prog_know_dec =prog_know.toFixed(2);
      $("#v_prog_know").html(prog_know_dec);
     }

    // * Skill */
    var weight_skill_acc2 = $("#weight_skills_act").val();
    var weight_skill_prev2 = $("#w_skill_prev").val();
    if(weight_skill_acc2== "" || weight_skill_prev2 == "")
    {
      var weight_skill_acc2 = 0;
      var weight_skill_prev2 = 0;
    }

    if (weight_skill_prev2<= 0){
      var prog_skill_dec = 0;
      $("#v_prog_skill").html(prog_skill_dec);
    }else{
      var prog_skill = ((parseFloat(weight_skill_acc2)-parseFloat(weight_skill_prev2))/parseFloat(weight_skill_prev2))*100;

      var prog_skill_dec =prog_skill.toFixed(2);
      $("#v_prog_skill").html(prog_skill_dec);
    }
    
    // * Attitude */
    var weight_attitude_acc2 = $("#weight_attitude_act").val();
    var weight_attitude_prev2 = $("#w_attitude_prev").val();
    if(weight_attitude_acc2== "" || weight_attitude_prev2 == "")
    {
      var weight_attitude_acc2 = 0;
      var weight_attitude_prev2 = 0;
    }
    if (weight_attitude_prev2<=0){
      var prog_attitude_dec = 0;
      $("#v_prog_attitude").html(prog_attitude_dec);
    }else{
      var prog_attitude = ((parseFloat(weight_attitude_acc2)-parseFloat(weight_attitude_prev2))/parseFloat(weight_attitude_prev2))*100;

      var prog_attitude_dec =prog_attitude.toFixed(2);
      $("#v_prog_attitude").html(prog_attitude_dec);
    }

    // * Individual */
    var weight_indi_acc2 = $("#weight_individu_act").val();
    var weight_indi_prev2 = $("#w_indi_prev").val();
    if(weight_indi_acc2== "" || weight_indi_prev2 == "")
    {
      var weight_indi_acc2 = 0;
      var weight_indi_prev2 = 0;
    }
    
    if (weight_indi_prev2<=0){
      var prog_ind_dec = 0;
      $("#v_prog_ind").html(prog_ind_dec);
    }else{
      var prog_individual = ((parseFloat(weight_indi_acc2)-parseFloat(weight_indi_prev2))/parseFloat(weight_indi_prev2))*100;
      
      var prog_ind_dec =prog_individual.toFixed(2);
      $("#v_prog_ind").html(prog_ind_dec);
    }

  }

  function calc_intotal(){
    var weight_know_acc2 = $("#weight_know_act").val();
    var weight_skill_acc2 = $("#weight_skills_act").val();
    var weight_attitude_acc2 = $("#weight_attitude_act").val();
    var weight_indi_acc2 = $("#weight_individu_act").val();

    var weight_know_prev2 = $("#w_know_prev").val();
    var weight_skill_prev2 = $("#w_skill_prev").val();
    var weight_indi_prev2 = $("#w_indi_prev").val();
    var weight_attitude_prev2 = $("#w_attitude_prev").val();


    var total_weight_act = parseFloat(weight_know_acc2)+parseFloat(weight_skill_acc2)+parseFloat(weight_attitude_acc2)+parseFloat(weight_indi_acc2);

    var total_weight_prev2  = parseFloat(weight_know_prev2)+parseFloat(weight_skill_prev2)+parseFloat(weight_attitude_prev2)+parseFloat(weight_indi_prev2);
    if (total_weight_prev2>0){
      var inTotal = ((parseFloat(total_weight_act)-parseFloat(total_weight_prev2))/parseFloat(total_weight_prev2))*100;
      
      var inTotal_dec =inTotal.toFixed(2);
      $("#v_inTotal").html(inTotal_dec);
    }else{
      var inTotal_dec = 0;
      $("#v_inTotal").html(inTotal_dec);
    }
    


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


    document.getElementById("total_score").innerHTML = parseFloat(final_p) + parseFloat(final_a)


  }

</script>
