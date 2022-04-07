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
                <tr><td colspan="3">*Grade value min = 1 , max = 5, using . for decimal grade</th></tr>
                <tr>
                <th>No</th>
                <th>Indicator</th>
                  <th>Grade</th>
                     </tr>
                </thead>
                <tbody>

                <!--set of knowledge -->
                <tr><td colspan="3"><b> SET OF KNOWLEDGE<b></th></tr>
                <?php 
                            $no = 0;
                            foreach($get_pertanyaan_self_know as $row) { 
                            $no++;
                            ?>
                                      <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>" >
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td width="100px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>
  <?php } ?>
                <!--end set of knowledge -->


                 <!--set of skills -->
                 <tr><td colspan="3"><b> SET OF SKILLS<b></th></tr>
                <?php 
                            
                            foreach($get_pertanyaan_self_skills as $row) { 
                            $no++;
                            ?>
                                <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>" >
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td width="70px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01" > </td>                             
              </tr>
              <?php } ?>
                <!--end set of skills -->

                                 <!--set of ATTITUDE -->
                                 <tr><td colspan="3"><b> SET OF ATTITUDE<b></th></tr>
                <?php 
                            
                            foreach($get_pertanyaan_self_attitude as $row) { 
                            $no++;
                            ?>
                            <tr>
                            <tr>
              <td width="50"><?php echo $no; ?></td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="<?= $row['kategori_pertanyaan']; ?>" >
              
              <input type="hidden" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value="<?= $row['id']; ?>">
                <td><?= $row['pertanyaan']; ?></td>
                <td width="70px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>
              <?php } ?>
                <!--end set of ATTITUDE -->



                                                 <!--Individual Deliverables -->
            <tr><td colspan="3"><b> Individual Deliverables<b></tr>
         
                            <tr>

                            <?php 
                            
           
                            $no++;
                            ?>
    

                <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                   
                    
                      <tbody class="field_wrapper">

                      <tr>
              <td width="50">  <a href="javascript:void(0);" class="add_button btn btn-sm btn-primary" title="Add field"><i class="fa fa-plus"></i></a>
                            </td>
              <input type="hidden"  name="jenis_form<?php echo $no; ?>" class="form-control" value="other" >
              
   
                <td><input type="text" name="pertanyaan[]" class="form-control" id="pertanyaan[]" value=""></td>
                <td width="70px"><input type="number"  name="jawaban<?php echo $no; ?>" class="form-control" value=" " max="5" required step="0.01"></td>                             
              </tr>
                          
                      </tbody>
                    </table>


                            <!--end Individual Deliverables -->
                    


                  </div>

                
               </div>
                </div>
                  </div>

                 
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

<script type="text/javascript">
    $(function(){

      //---------------------------------------------------------------
      $('#customer').change(function(e){
        var id = $('#customer').val();
        var post_data = {
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
          type: 'POST',
          url: '<?= base_url("admin/invoices/customer_detail/"); ?>'+id,
          data: post_data,
          success: function(response){
            var data = JSON.parse(response);
            console.log(data.id);
            $('#firstname').val(data.firstname);
            $('#address').val(data.address);
            $('#email').val(data.email);
            $('#mobile_no').val(data.mobile_no);
          }
        });

      });

      //---------------------------------------------------------------
      $(document).on("click change paste keyup", ".calcEvent", function() {
        calculate_total();
      });

      var max_field = 10;
      var add_button = $('.add_button');
      var wrapper = $('.field_wrapper');
      var html_fields = '<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="fa fa-minus"></i></a> </td> <td> <div class="form-group"> <input type="hidden"  name="jenis_form[]" class="form-control" value="other" ><input type="text" name="pertanyaan[]" class="form-control calcEvent" id="pertanyaan[]" placeholder="" required> </div> </td> <td> <div class="form-group"> <input type="number"  name="jawaban[]" class="form-control" value=" " max="5" required step="0.01"> </div> </td>   </tr>';
      var x = 1; // 

      $(add_button).click(function(){
        if(x < max_field){
          x++;
          $(wrapper).append(html_fields);
        }

      });

      $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest('tr').remove(); //Remove field html
        x--; //Decrement field counter
      });

    });


     //---------------------------------------------------------------
     function calculate_total(){

        var sub_total    = 0;
        var total       = 0;
        var amountDue   = 0;
        var total_tax    = 0;

        $('tr.item').each(function(){
          var quantity = parseFloat($(this).find(".quantity").val());
          var price = parseFloat($(this).find(".price").val());
          var item_tax = $(this).find(".tax").val();

          var item_total = parseFloat(quantity * price) > 0 ? parseFloat(quantity * price) : 0 ;
          sub_total += parseFloat(price * quantity) > 0 ? parseFloat(price * quantity) : 0;
          total_tax += parseFloat(price * quantity * item_tax/100) > 0 ? parseFloat(price * quantity * item_tax/100) : 0;

          $(this).find('.item_total').text( item_total.toFixed(2) );
          $(this).find('.item_total').val( item_total.toFixed(2) ); 
        });

        var discount    = parseFloat($("[name='discount']").val()) > 0 ? parseFloat($("[name='discount']").val()) : 0;
        total += parseFloat(sub_total + total_tax - discount);

        $( '.sub_total' ).text( sub_total.toFixed(2) );
        $( '.sub_total' ).val( sub_total.toFixed(2) ); // for hidden field

        $( '.total_tax' ).text( total_tax.toFixed(2) );
        $( '.total_tax' ).val( total_tax.toFixed(2) ); // for hidden field

        $( '#grand_total' ).text( total.toFixed(2) );
        $( '.grand_total' ).val( total.toFixed(2) ); // for hidden field

     }


  </script>