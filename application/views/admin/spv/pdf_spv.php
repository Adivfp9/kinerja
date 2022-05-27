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
					 <h1 align="center">'.$nama_karyawan.' - Supervisor Review</h1>
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
foreach($get_karyawan_spv_know as $rnilai)
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
foreach($get_karyawan_spv_skills as $rnilai)
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
foreach($get_karyawan_spv_att as $rnilai)
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
</table>';
	?>

<?php
$html .='
</table>';
	?>

<?php foreach($hitung_spv_know as $row4) { 
               $nilai_know = $row4['nilai'];
               $jumlah = $row4['jumlah'];
               $rata_knowx = $nilai_know / $jumlah ;
			   $rata_know = round($rata_knowx,2);
               $final_knowx = (25/100)*$rata_know;
               $final_know = round($final_knowx,2);
                }?>
              
              <?php foreach($hitung_spv_skills as $row5) { 
               $nilai_skills = $row5['nilai'];
               $jumlah = $row5['jumlah'];
               $rata_skillsx = $nilai_skills / $jumlah ;
			   $rata_skills = round($rata_skillsx,2);
               $final_skills = (25/100)*$rata_skills;
               $final_skills = round($final_knowx,2);
                }?>

          <?php foreach($hitung_spv_attitude as $row6) { 
               $nilai_att = $row6['nilai'];
               $jumlah = $row6['jumlah'];
               $rata_attx = $nilai_att / $jumlah ;
			   $rata_att = round($rata_attx,2);
               $final_att = (45/100)*$rata_att;
               $final_attitude = round($final_att,2);
                }?>

              <?php
              
              $total = $final_attitude + $final_skills + $final_know;
              ?>



<?php
		
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
<td></td>
<td>'.$rata_know.'</td>
<td>'.$final_know.'</td>
</tr>

<tr>
<td>SKILLS</td>
<td></td>
<td>'.$rata_skills.'</td>
<td>'.$final_skills.'</td>
</tr>


<tr>
<td>ATTITUDE</td>
<td></td>
<td>'.$rata_att.'</td>
<td>'.$final_attitude.'</td>
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
 		$mpdf->SetTitle("Suvervisor Review");
		$mpdf->SetAuthor("PINC");
		$mpdf->watermark_font = 'PINC>';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);

		$filename = 'Suvervisor Review';
		ob_clean();
		$mpdf->Output($filename.'.pdf', 'D','F');			
		
		exit;
?>