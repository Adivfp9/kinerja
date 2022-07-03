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
$id_jabatan = $kode[8];
$kode_form = $kode[9];

$tanggal_appraisal = $kode[10];

?>

<?php
$html = '
<html>
<head>
<style>
#customers {
  font-family: Helvetica;
	width: 100%;
  border: 0px;
}
#th1 {
	font-family: Helvetica;
	border-collapse: collapse;
	width: 29%;
  }


#customers td, #customers th {
  border: 0px solid #ddd;
  padding: 8px;
  font-size:14px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  
  text-align: left;
  background-color: #ffffff;
  color: #404040;
 
}
#pertanyaan {
	font-family: Helvetica;
	width: 100%;
	border: 1px;
	border-collapse: collapse;
  }
#pertanyaan th {
  
	text-align: left;
	background-color: #a6a6a6;
	color: #ffffff;
	width: max-content;
	font-size:18px;
   
  }
  #pertanyaan td, #pertanyaan th {
	border: 1px solid #ddd;
	padding: 8px;
  }
</style>
</head>
';
?>

				<?php
                     $html .='   
					 <h1 align="center">'.$nama_karyawan.' - Self Performance Review</h1>
					 <table id=customers>
					 <tr>
					   <th id=th1>Employee</th>
					    <th>: '.$nama_karyawan.'</th>
					   </tr>
					 <tr>
					 <th id=th1>Job Position</th>
					  <th>: '.$jabatan.'</th>
					 </tr>
				   <tr>
				   <th id=th1>Organization   </th>
				    <th>: '.$nama_departemen.'</th>
					</tr>
					<tr>
					<th id=th1>Supervisor </th>
				  <th>: '.$atasan.'</th>
					 </tr>
					 <tr>
					<th id=th1>Tanggal  </th>
				   	<th>: '.$tanggal_appraisal.'</th>
					 </tr>
					</table>'; ?>



<?php
		
$html .='

<br><br>
<table id=pertanyaan>
  <tr>
    <th>Indicator</th>
    <th>Grade</th></tr>
	<tr style="background-color: #f2f2f2;"><td colspan=2>KNOWLEDGE</td></tr>';
	?>


<?php
foreach($get_karyawan_self_know as $rnilai)
	{
		$no++; ?>

<?php
$html .='
  <tr>
    <td>'.$rnilai['pertanyaan'].'</td>
    <td>'.$rnilai['nilai'].'</td>
 </tr>
 
'; 
  }  ?>

<?php
$html .='
  <tr>
    <td colspan=2>&nbsp;</td>
 </tr>';
 ?>


<?php
$html .='
<tr style="background-color: #f2f2f2;"><td colspan=2>SKILLS</td></tr>';
	?>
<?php
foreach($get_karyawan_self_skills as $rnilai)
	{
		$no++; ?>

<?php
$html .='
  <tr>
    <td>'.$rnilai['pertanyaan'].'</td>
    <td>'.$rnilai['nilai'].'</td>
 </tr>
';   }  ?>

<?php
$html .='
  <tr>
    <td colspan=2>&nbsp;</td>
 </tr>';
 ?>




<?php
$html .='
<tr style="background-color: #f2f2f2;"><td colspan=2>ATTITUDE</td></tr>';
	?>
<?php
foreach($get_karyawan_self_att as $rnilai)
	{
		$no++; ?>

<?php
$html .='
  <tr>
    <td>'.$rnilai['pertanyaan'].'</td>
    <td>'.$rnilai['nilai'].'</td>
 </tr>
'; 
  }  ?>

<?php
$html .='
<tr style="background-color: #f2f2f2;"><td colspan=2>INDIVIDUAL DELIVERABLES</td></tr>';
	?>
<?php
foreach($get_karyawan_self_other as $dnilai)
	{
		$no++; ?>

<?php
$html .='
  <tr>
    <td>'.$dnilai['id_pertanyaan'].'</td>
    <td>'.$dnilai['nilai'].'</td>
 </tr>
'; 
  }  ?>

<?php
$html .='
</table>';
	?>

<?php
$html .='
</table>';
	?>

<?php
if(sizeof($get_nilai)>0){
  foreach($get_nilai as $n){
	$s_know = $n->s_knowledge;
	$w_know = $n->w_knowledge;
	
	$s_skil = $n->s_skills;
	$w_skil = $n->w_skills;
	
	$s_att = $n->s_attitude;
	$w_att = $n->w_attitude;

	$s_ind = $n->s_individual;
	$w_ind = $n->w_individual;

	$total_prev_score = round($s_know+$s_skil+$s_att+$s_ind,2);
	$total_prev_wight = round($w_know+$w_skil+$w_att+$w_ind,2);
  }
}else{
	$s_know = 0;
	$w_know = 0;
	
	$s_skil = 0;
	$w_skil = 0;
	
	$s_att = 0;
	$w_att = 0;

	$s_ind = 0;
	$w_ind = 0;

	$total_prev_score = round($s_know+$s_skil+$s_att+$s_ind,2);
	$total_prev_wight = round($w_know+$w_skil+$w_att+$w_ind,2);
}
foreach($hitung_self_know as $row4) { 
               $nilai_know = $row4['nilai'];
               $jumlah = $row4['jumlah'];
               $rata_knowx = $nilai_know / $jumlah ;
			   $rata_know = round($rata_knowx,2);
               $final_knowx = (25/100)*$rata_knowx;
               $final_know = round($final_knowx,2);
			   if ($w_know>0){
                $prog_know = round((($final_know-$w_know)/$w_know)*100,2);
               }else{
                $prog_know = 0;
               }

                }?>
              
              <?php foreach($hitung_self_skills as $row5) { 
               $nilai_skills = $row5['nilai'];
               $jumlah = $row5['jumlah'];
               $rata_skillsx = $nilai_skills / $jumlah ;
			   $rata_skills = round($rata_skillsx,2);
               $final_skills = (25/100)*$rata_skillsx;
               $final_skills = round($final_knowx,2);

			   if ($w_skil>0){
				$prog_skill = round((($final_skills-$w_skil)/$w_skil)*100,2);
			  }else{
				$prog_skill = 0;
			  }
                }?>

          <?php foreach($hitung_self_attitude as $row6) { 
               $nilai_att = $row6['nilai'];
               $jumlah = $row6['jumlah'];
               $rata_attx = $nilai_att / $jumlah ;
			   $rata_att = round($rata_attx,2);
               $final_att = (45/100)*$rata_att;
               $final_attitude = round($final_att,2);
			   if ($w_att>0){
				$prog_att = round((($final_attitude-$w_att)/$w_att)*100,2);
			   }else{
				 $prog_att = 0;
			   }
                }?>

		<?php foreach($hitung_self_other as $row7) { 
               $nilai_att = $row7['nilai'];
               $jumlah = $row7['jumlah'];
               $rata_otherx = $nilai_att / $jumlah ;
               $rata_other = round($rata_otherx,2);
               $final_otherx = (5/100)*$rata_other;
               $final_other = round($final_otherx,2);
               if ($w_ind > 0){
                $prog_other = round((($final_other-$w_ind)/$w_ind)*100,2);
               }else{ 
                $prog_other = 0.00;
               }




                }?>



              <?php
              $total_actual_score = $rata_know+$rata_skills+$rata_att+$rata_other;
              $total = $final_attitude + $final_skills + $final_know +$final_other ;
              if ($total_prev_wight>0){
                $inTotal = round((($total-$total_prev_wight)/$total_prev_wight)*100,2);
              }else{
                $inTotal = 0;
              }
              ?>
			
			



<!--* Previous Performance *-->
<?php
              if(sizeof($get_nilai)>0){
                foreach($get_nilai as $n){
                  $s_know = $n->s_knowledge;
                  $w_know = $n->w_knowledge;
                  
                  $s_skil = $n->s_skills;
                  $w_skil = $n->w_skills;
                  
                  $s_att = $n->s_attitude;
                  $w_att = $n->w_attitude;

                  $s_ind = $n->s_individual;
                  $w_ind = $n->w_individual;

                  $total_prev_score = round($s_know+$s_skil+$s_att+$s_ind,2);
                  $total_prev_wight = round($w_know+$w_skil+$w_att+$w_ind,2);
                }
              }else{
                  $s_know = 0;
                  $w_know = 0;
                  
                  $s_skil = 0;
                  $w_skil = 0;
                  
                  $s_att = 0;
                  $w_att = 0;

                  $s_ind = 0;
                  $w_ind = 0;

                  $total_prev_score = round($s_know+$s_skil+$s_att+$s_ind,2);
                  $total_prev_wight = round($w_know+$w_skil+$w_att+$w_ind,2);
              }
            
		 
$html .='

<br><br>
<table id=pertanyaan width="100%">
<tr align="center">
	<th rowspan="2" valign="middle">SUMMARY Score</th>
    <th rowspan="2" valign="middle">Weight</th>
    <th colspan="2" valign="middle">Previous Performance</th>
    <th colspan="2" valign="middle">Actual Performance</th>
    <th rowspan="2" valign="middle" width="15px">Progress Performance</th>
</tr>
<tr align="center">
	<th>Score</th>
	<th>Weight</th>
	<th>Score</th>
	<th>Weight</th>
</tr>
<tr>
<td>KNOWLEDGE</td>
<td >25 %</td>
 <td>'.number_format($s_know,2).'</td>
 <td>'.number_format($w_know,2).'</td>
 <td>'.number_format($rata_know,2).'</td>
 <td>'.number_format($final_know,2).'</td>
 <td>'.number_format($prog_know,2).' %</td>
</tr>
<tr>';
$html .='

<tr>
     <td>SKILLS</td>
     <td>25 %</td>
     <td>'.number_format($s_skil,2).'</td>
     <td>'.number_format($w_skil,2).'</td>
     <td>'.number_format($rata_skills,2).'</td>
     <td>'.number_format($final_skills,2).'</td>
     <td>'.number_format($prog_skill,2).' %</td>
     </tr>
<tr>
<tr>
      <td>ATTITUDE</td>
      <td>45 %</td>
      <td>'.number_format($s_att,2).'</td>
      <td>'.number_format($w_att,2).'</td>
      <td>'.number_format($rata_att,2).'</td>
      <td>'.number_format($final_attitude,2).'</td>
      <td>'.number_format($prog_att,2).' %</td>
      <td style="font-weight: bold;">In Total</td>
     </tr>

     <tr>
      <td>Individual Deliverables</td>
      <td>5 %</td>
      <td>'.number_format($s_ind,2).'</td>
      <td>'.number_format($w_ind,2).'</td>
      <td>'.number_format($rata_other,2).'</td>
      <td>'.number_format($final_other,2).'</td>
      <td>'.number_format($prog_other,2).' %</td>
      <td style="font-weight: bold;">'.$inTotal.' %</td>
     </tr>

     <tr style="font-weight: bold;">
      <td align="center">Subtotal</td>
      <td>100 %</td>
      <td>'.number_format($total_prev_score,2).'</td>
      <td>'.number_format($total_prev_wight,2).'</td>
      <td>'.number_format($total_actual_score,2).'</td>
      <td>'.number_format($total,2).'</td>
     </tr>
';?>




<?php
$html .='
</table>';
	?>









<?php

$mpdf = new mPDF('c');

 		$mpdf->SetProtection(array('print'));
 		$mpdf->SetTitle("Form Self Appraisal");
		$mpdf->SetAuthor("PINC");
		$mpdf->watermark_font = 'PINC>';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);

		$filename = 'Self Appraisal';
		ob_clean();
		$mpdf->Output($filename.'.pdf', 'D','F');			
		
		exit;
?>