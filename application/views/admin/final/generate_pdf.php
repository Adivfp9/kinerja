<?php 
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);

		//print $kode;exit;
		$kode = explode('+', $kode);

		$id_karyawan = $kode[1];
		$inisial =  $kode[2];
		$rekan1 =  $kode[3];
		$rekan2 =  $kode[4];
		$rekan3 =  $kode[5];
		$nama_karyawan = $kode[6];
		$atasan = $kode[7];
		$nama_departemen = $kode[8];
		$email = $kode[9];
		$jabatan = $kode[10];
		$kode_form1 = $kode[11];
		$kode_form2 = $kode[12];
		$kode_form3 = $kode[13];
		$tanggal_appraisal = $kode[14];
		//print $nama_karyawan;exit;
	
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
					 <h1 align="center">'.$nama_karyawan.'</h1>
					 <h2 align="center">360 Degree Feedback</h2>
					 <table id=customers>
					 <tr>
					   <th id=th1>Company Name </th>
					    <th>: '.$get_company.'</th>
					   </tr>
					 <tr>
					 <tr>
					   <th id=th1>Employee Name</th>
					    <th>: '.$nama_karyawan.'</th>
					   </tr>
					<tr>
					   	<th id=th1>Departement   </th>
						<th>: '.$nama_departemen.' - '.$get_jabatan.'</th>
					</tr>
					<tr>
						<th id=th1>Colleague Name</th>
				  		<th>: '.$rekan1.' - '.$get_rekan1.'</th>
					</tr>
					<tr>
						<th id=th1>Submission Date  </th>
				   		<th>: '.$tgl_appr1.'</th>
					</tr>
					<tr>
						<th id=th1>Appraisal Date  </th>
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
	<tr style="background-color: #f2f2f2;"><td colspan=2>Performance (45%)</td></tr>';
	?>


<?php
foreach($get_karyawan_360_nilai_per as $rnilai)
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
<tr style="background-color: #f2f2f2;"><td colspan=2>Attitude (55%)</td></tr>';
	?>
<?php
foreach($get_karyawan_360_nilai_att as $rnilai)
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

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;"><td colspan=2>Others Feedback:</td></tr>';
	?>


<?php
foreach($get_masukan_360 as $rnilai)
	{
 ?>
<?php
$html .='
  <tr>
    <td>'.$rnilai['masukan'].'</td>
    
 </tr>
'; 
  }  ?>
<?php
$html .='
</table>';
	?>


<?php foreach($hitung_360_per as $row4) { 
               $nilai_per = $row4['nilai'];
               $rata_per = $nilai_per / 2 ;
               $rata_per = round($rata_per,2);
               $final_per = (45/100) * $rata_per;
               $final_per = round($final_per,2);
              }?>

              <?php foreach($hitung_360_att as $row5) { 
               $nilai_att = $row5['nilai'];
               $rata_att = $nilai_att / 3 ;
               $rata_att = round($rata_att,2);
               $final_att = (55/100) * $rata_att;
               $final_att = round($final_att,2);
              
              }
              
              $nilai_final = $final_att + $final_per;
              ?>



<?php
		
$html .='

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;">
<td>SUMMARY SCORE</td>
<td>Weight</td>
<td>Average SCORE</td>
<td>Final SCORE</td>
</tr>

<tr>
<td>Performance</td>
<td>45%</td>
<td>'.$rata_per.'</td>
<td>'.$final_per.'</td>
</tr>

<tr>
<td>Attitude</td>
<td>55%</td>
<td>'.$rata_att.'</td>
<td>'.$final_att.'</td>
</tr>
<tr>
<td colspan=3></td>
<td>'.$nilai_final.'</td>
</tr>

';?>




<?php
$html .='
</table>';
	?>

<?php
$html .='
<br><br><br>';
	?>



<!--next page -->
<?php
                     $html .='   
					 <h1 align="center">'.$nama_karyawan.'</h1>
					 <h2 align="center">360 Degree Feedback</h2>
					 <table id=customers>
					 <tr>
					   <th id=th1>Company Name </th>
					    <th>: '.$get_company.'</th>
					   </tr>
					 <tr>
					   <th id=th1>Employee</th>
					    <th>: '.$nama_karyawan.'</th>
					   </tr>
					 <tr>
						<th id=th1>Departement   </th>
						<th>: '.$nama_departemen.' - '.$get_jabatan.'</th>
					</tr>
					<tr>
						<th id=th1>Colleague Name</th>
						<th>: '.$rekan2.' - '.$get_rekan2.'</th>
					</tr>
					<tr>
						<th id=th1>Submission Date  </th>
						<th>: '.$tgl_appr2.'</th>
					</tr>
					<tr>
						<th id=th1>Appraisal Date  </th>
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
	<tr style="background-color: #f2f2f2;"><td colspan=2>Performance (45%)</td></tr>';
	?>


<?php
foreach($get_karyawan_360_nilai_per2 as $rnilai)
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
<tr style="background-color: #f2f2f2;"><td colspan=2>Atittude (55%)</td></tr>';
	?>
<?php
foreach($get_karyawan_360_nilai_att2 as $rnilai)
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

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;"><td colspan=2>Others Feedback:</td></tr>';
	?>


<?php
foreach($get_masukan_3602 as $rnilai)
	{
 ?>
<?php
$html .='
  <tr>
    <td>'.$rnilai['masukan'].'</td>
    
 </tr>
'; 
  }  ?>
<?php
$html .='
</table>';
	?>


<?php foreach($hitung_360_per2 as $row4) { 
               $nilai_per = $row4['nilai'];
               $rata_per = $nilai_per / 2 ;
               $rata_per = round($rata_per,2);
               $final_per = (45/100) * $rata_per;
               $final_per = round($final_per,2);
              }?>

              <?php foreach($hitung_360_att2 as $row5) { 
               $nilai_att = $row5['nilai'];
               $rata_att = $nilai_att / 3 ;
               $rata_att = round($rata_att,2);
               $final_att = (55/100) * $rata_att;
               $final_att = round($final_att,2);
              
              }
              
              $nilai_final = $final_att + $final_per;
              ?>



<?php
		
$html .='

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;">
<td>SUMMARY SCORE</td>
<td>Weight</td>
<td>Average SCORE</td>
<td>Final SCORE</td>
</tr>

<tr>
<td>Performance</td>
<td>45%</td>
<td>'.$rata_per.'</td>
<td>'.$final_per.'</td>
</tr>

<tr>
<td>Attitude</td>
<td>55%</td>
<td>'.$rata_att.'</td>
<td>'.$final_att.'</td>
</tr>
<tr>
<td colspan=3></td>
<td>'.$nilai_final.'</td>
</tr>

';?>




<?php
$html .='
</table>';
	?>



<!-- end next page-->



<?php
$html .='
<br><br><br><br>';
	?>



<!--next page 3-->
<?php
                     $html .='   
					 <h1 align="center">'.$nama_karyawan.'</h1>
					 <h2 align="center">360 Degree Feedback</h2>
					 <table id=customers>
					 <tr>
					   <th id=th1>Company Name </th>
					    <th>: '.$get_company.'</th>
					   </tr>
					 <tr>
					 <tr>
					   <th id=th1>Employee Name</th>
					    <th>: '.$nama_karyawan.'</th>
					   </tr>
				   <tr>
				   <th id=th1>Departement   </th>
				    <th>: '.$nama_departemen.' - '.$get_jabatan.'</th>
					</tr>
					<tr>
						<th id=th1>Colleague Name</th>
				  		<th>: '.$rekan3.' - '.$get_rekan3.'</th>
					</tr>
					<tr>
						<th id=th1>Submission Date  </th>
				   		<th>: '.$tgl_appr3.'</th>
					</tr>
					<tr>
						<th id=th1>Appraisal Date  </th>
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
	<tr style="background-color: #f2f2f2;"><td colspan=2>Performance (45%)</td></tr>';
	?>


<?php
foreach($get_karyawan_360_nilai_per3 as $rnilai)
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
<tr style="background-color: #f2f2f2;"><td colspan=2>Atittude (55%)</td></tr>';
	?>
<?php
foreach($get_karyawan_360_nilai_att3 as $rnilai)
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

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;"><td colspan=2>Others Feedback:</td></tr>';
	?>


<?php
foreach($get_masukan_3603 as $rnilai)
	{
 ?>
<?php
$html .='
  <tr>
    <td>'.$rnilai['masukan'].'</td>
    
 </tr>
'; 
  }  ?>
<?php
$html .='
</table>';
	?>


<?php foreach($hitung_360_per3 as $row4) { 
               $nilai_per = $row4['nilai'];
               $rata_per = $nilai_per / 2 ;
               $rata_per = round($rata_per,2);
               $final_per = (45/100) * $rata_per;
               $final_per = round($final_per,2);
              }?>

              <?php foreach($hitung_360_att3 as $row5) { 
               $nilai_att = $row5['nilai'];
               $rata_att = $nilai_att / 3 ;
               $rata_att = round($rata_att,2);
               $final_att = (55/100) * $rata_att;
               $final_att = round($final_att,2);
              
              }
              
              $nilai_final = $final_att + $final_per;
              ?>



<?php
		
$html .='

<br><br>
<table id=pertanyaan>
<tr style="background-color: #f2f2f2;">
<td>SUMMARY SCORE</td>
<td>Weight</td>
<td>Average SCORE</td>
<td>Final SCORE</td>
</tr>

<tr>
<td>Performance</td>
<td>45%</td>
<td>'.$rata_per.'</td>
<td>'.$final_per.'</td>
</tr>

<tr>
<td>Attitude</td>
<td>55%</td>
<td>'.$rata_att.'</td>
<td>'.$final_att.'</td>
</tr>
<tr>
<td colspan=3></td>
<td>'.$nilai_final.'</td>
</tr>

';?>




<?php
$html .='
</table>';
	?>



<!-- end next page 3-->








<?php

$mpdf = new mPDF('c');

 		$mpdf->SetProtection(array('print'));
 		$mpdf->SetTitle("Codeglamour - Users List");
		$mpdf->SetAuthor("Codeglamour");
		$mpdf->watermark_font = 'Codeglamour';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);
	
		$filename = './uploads/360/360Form'.$tanggal_appraisal.$inisial;
		ob_clean();
		

		$mpdf->Output($filename.'.pdf','F');			
		
	
?>