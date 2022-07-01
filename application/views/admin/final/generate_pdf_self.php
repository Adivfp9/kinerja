<?php 
$kode = $this->uri->segment(4);
$url = $this->uri->segment(4);
$kode = base64_decode($kode);
//print $kode;exit;
$kode = explode('+', $kode);

$id_karyawan = $kode[1];
$inisial =  $kode[2];
//$rekan_kerja = $kode[2];
$nama_karyawan = $kode[6];
$atasan = $kode[7];
$nama_departemen = $kode[8];
$email2 = $kode[9];
$jabatan = $kode[10];
$id_jabatan = $kode[15];
$tanggal_appraisal = $kode[14];
$kode_form = "$tanggal_appraisal$nama_karyawan$atasan";
//$kode_form = $kode[9];

//$tanggal_appraisal = $kode[10];

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
    <th>Question</th>
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

<?php foreach($hitung_self_know as $row4) { 
              $nilai_know = $row4['nilai'];
			  $jumlah = $row4['jumlah'];
			  $rata_knowx = $nilai_know / $jumlah ;
			  $rata_know = round($rata_knowx,2);
			  $final_knowx = (25/100)*$rata_knowx;
			  $final_know = round($final_knowx,2);
                }?>
              
              <?php foreach($hitung_self_skills as $row5) { 
               $nilai_skills = $row5['nilai'];
               $jumlah = $row5['jumlah'];
               $rata_skillsx = $nilai_skills / $jumlah ;
			   $rata_skills = round($rata_skillsx,2);
               $final_skills = (25/100)*$rata_skillsx;
               $final_skills = round($final_knowx,2);
                }?>

          <?php foreach($hitung_self_attitude as $row6) { 
			   $nilai_att = $row6['nilai'];
               $jumlah = $row6['jumlah'];
               $rata_attx = $nilai_att / $jumlah ;
			   $rata_att = round($rata_attx,2);
               $final_att = (45/100)*$rata_att;
               $final_attitude = round($final_att,2);
                }?>
			<?php foreach($hitung_self_other as $row7) { 
               $nilai_att = $row7['nilai'];
               $jumlah = $row7['jumlah'];
               $rata_otherx = $nilai_att / $jumlah ;
               $rata_other = round($rata_otherx,2);
               $final_otherx = (5/100)*$rata_other;
               $final_other = round($final_otherx,2);
               if ($nilai_att > 0){
                $prog_other = round((($final_other-$w_ind)/$w_ind)*100,2);
               }else{ 
                $prog_other = 0.00;
               }

                }?>

              <?php
              
              $total = $final_attitude + $final_skills + $final_know+$final_other;
              ?>



<?php
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

$html .='

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;">
<td>Summary Score</td>
<td>Previous Score</td>
<td>Average Score</td>
<td>Final Score</td>
</tr>

<tr>
<td>KNOWLEDGE</td>
<td>'.$s_know.'</td>
<td>'.$rata_know.'</td>
<td>'.$final_know.'</td>
</tr>

<tr>
<td>SKILLS</td>
<td>'.$s_skil.'</td>
<td>'.$rata_skills.'</td>
<td>'.$final_skills.'</td>
</tr>


<tr>
<td>ATTITUDE</td>
<td>'.$s_att.'</td>
<td>'.$rata_att.'</td>
<td>'.$final_attitude.'</td>
</tr>
<tr>

<tr>
<td>INDIVIDUAL DELIVERABLES</td>
<td>'.$s_ind.'</td>
<td>'.$rata_other.'</td>
<td>'.$final_other.'</td>
</tr>
<tr>
<td colspan=3></td>
<td>'.$total.'</td>
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
	
		$filename = './uploads/self/selfForm'.$tanggal_appraisal.$inisial;
		ob_clean();
		

		$mpdf->Output($filename.'.pdf','F');			
		
	
?>

