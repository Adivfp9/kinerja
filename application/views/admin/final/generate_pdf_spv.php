<?php $kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		$id_karyawan = $kode[1];
 
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$nama_departemen = $kode[5];
		$email2 = $kode[6];?>

<?php
$html = '
<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
<table border = "0">
<thead>';
?>
<?php $no = 0;
                            foreach($get_karyawan_self as $row) { 
                            $no++; 
							?>
				<?php
                     $html .='   
                <tr>
                  <th colspan="3"><h2 align="left">Infromasi Karyawan</h2></th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                	<td width="25%">Nama Karyawan</td>
					<td width="1%">:</td>
					<td width="50%">'.$row['nama_karyawan'].'</td>
                </tr>
                <tr>
					<td width="25%">Jabatan</td>
					<td width="1%">:</td>
					<td width="50%">'.$row['nama_jabatan'].'</td>
                </tr>
                <tr>
					<td width="25%">Departemen</td>
					<td width="1%">:</td>
					<td width="50%">'.$row['nama_departemen'].'</td>
                </tr>
                <tr>
					<td width="25%">Nama Rekan Kerja</td>
					<td width="1%">:</td>
					<td width="50%">'.$row['rekan_kerja'].'</td>
                </tr>
                <tr>
					<td width="25%">Masukan Untuk Rekan Kerja</td>
					<td width="1%">:</td>
					<td width="50%">'.$row['masukan'].'</td>
                </tr>
                <tr>
					<td width="25%">Tanggal Feedback</td>
					<td width="1%">:</td>
					<td width="50%">'.$row['tgl_appraisal'].'</td>
                </tr>';

				}  ?>
				<?php
			  $html .='
          </tbody></table>';
?>
<?php
$html .='
<h2>Penilaian SPV Appraisal</h2>
<table border = "" width ="100%">
<thead>
	<tr>
		<th>Pertanyaan</th>
		<th>Nilai</th>
	</tr>
</thead>
<tbody>
'; ?>
<?php
	$no = 0;
    foreach($get_karyawan_self_nilai as $rnilai)
	{
		$no++; ?>
<?php
$html .='
<tr>
              <td width="95%">'.$rnilai['pertanyaan'].'</td>
             <td width="5%" align="center">'.$rnilai['nilai'].'</td>
         
               
             </tr>';

             }  ?>

<?php
$html .='
</tbody></table>';
$mpdf = new mPDF('c');

 		$mpdf->SetProtection(array('print'));
 		$mpdf->SetTitle("Codeglamour - Users List");
		$mpdf->SetAuthor("Codeglamour");
		$mpdf->watermark_font = 'Codeglamour';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);

		$filename = 'SPV_Appraisal';
		ob_clean();
		$mpdf->Output($filename.'.pdf', 'F');			

?>