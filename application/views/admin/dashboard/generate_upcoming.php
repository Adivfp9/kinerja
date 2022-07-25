<<?php
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
                    $no=0;
                    $html .='   
					<h2 align="center">Data Appraisal Karyawan</h2>
					<h5 align="center">'.$get_periode.'</h5>

					<table id=customers>
                        
                        <thead>
                        <tr>
                            <th id=th1 width="50">No</th>
                            <th id=th1>Empleyee Name</th>
                            <th id=th1>Company Name</th>
                            <th id=th1>Supervisor</th>
                            <th id=th1>Colleague 1</th>
                            <th id=th1>Colleague 2</th>
                            <th id=th1>Colleague 3</th>
                            <th id=th1>Data Appraisal</th>
                        </tr>
                        </thead>
                        <tbody>';

                            $no = 0;
                            foreach($get_karyawan as $row) { 
                                $no++;
                                $Nama = $row['nama_karyawan'];
                                $Company = $row['nama_perusahaan'];
                                $Spv    = $row['atasan'];
                                $rekan1 = $row['rekan_kerja'];
                                $rekan2 = $row['rekan_kerja2'];
                                $rekan3 = $row['rekan_kerja3'];
                                $tgl = $row['tgl_appraisal'];

                                $html .='
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$Nama.'</td>
                                        <td>'.$Company.'</td>
                                        <td>'.$Spv.'</td>
                                        <td>'.$rekan1.'</td>
                                        <td>'.$rekan2.'</td>
                                        <td>'.$rekan3.'</td>
                                        <td>'.$tgl.'</td>
                                    </tr>
                                ';
                            }
                        $html .='</tbody>
                        </table>
                        ';
?>
<?php

$mpdf = new mPDF('c');

 		$mpdf->SetProtection(array('print'));
 		$mpdf->SetTitle("Data Appraisal");
		$mpdf->SetAuthor("PINC");
		$mpdf->watermark_font = 'PINC>';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);
	
		$filename = './uploads/dashboard/Data Appraisal '.$get_periode;
		ob_clean();
		

		$mpdf->Output($filename.'.pdf','F');			
		
	
?>

