<?php

foreach($get_periodik_jumlah_wawancara as $row1) { 
	$jumlah_wawancara = $row1['jumlah_wawancara'];
}
foreach($get_periodik_jumlah_lamaran as $row2) { 
	$jumlah_lamaran = $row2['jumlah_lamaran'];
}
foreach($get_periodik_jumlah_lowongan as $row3) { 
	$jumlah_lowongan = $row3['jumlah_lowongan'];
}

$html = '
		<h3>Jumlah Lowongan : '.$jumlah_lowongan.'</h3>
		<h3>Jumlah Lamaran : '.$jumlah_lamaran.'</h3>
		<h3>Jumlah Wawancara : '.$jumlah_wawancara.'</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>No</th>
					<th>Lowongan</th>
					<th>Nama Pelamar</th>
					<th>Alamat Pelamar</th>
					<th>Pewawancara 1</th>
					<th>Pewawancara 2</th>
					<th>Tanggal Wawancara</th>
					<th>Jam Wawancara</th>
				</tr>
			</thead>
			<tbody>';
			$no = 0;
			foreach($get_periodik as $row) { 
			$no++;
			
			$html .= '		
				<tr class="oddrow">
				
					<td>'.$no.'</td>
					<td>'.$row['jabatan'].'</td>
					<td>'.$row['nama'].'</td>
					<td>'.$row['alamat'].'</td>
					<td>'.$row['pewawancara1'].'</td>
					<td>'.$row['pewawancara2'].'</td>
					<td>'.$row['tgl_wawancara'].'</td>
					<td>'.$row['jam_wawancara'].'</td>
				</tr>';
			};

			$html .=	'</tbody>
			</table>			
		 ';
				
				
			   
		$mpdf = new mPDF('c');

		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Codeglamour - Users List");
		$mpdf->SetAuthor("Codeglamour");
		$mpdf->watermark_font = 'Codeglamour';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);

		$filename = 'users_list1';

		ob_clean();
		$mpdf->Output($filename . '.pdf', 'D');			

		exit;
