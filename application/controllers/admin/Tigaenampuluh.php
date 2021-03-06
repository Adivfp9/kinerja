<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tigaenampuluh extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/transaksi_model', 'transaksi_model');
		$this->load->helpers('pdf_helper');
		require_once APPPATH.'/helpers/mpdf/mpdf.php';
	}
	public function index(){
		$data['title'] = 'Table karyawan';
		$data['hasil_360'] = $this->transaksi_model->hasil_360();
		$data['get_company'] = $this->master_model->get_company();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/tigaenampuluh/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function lihat_form(){
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		// var_dump($kode);
		// return;
		$inisial = $kode[1];
		$jabatan = $kode[2];
		$tanggal = $kode[3];
		$rekan = $kode[4];
		$nama_departemen = $kode[5];
		$kode_form = $kode[6];
		$id_karyawan = $kode[7];

		$data['get_masukan_360'] = $this->transaksi_model->get_masukan_360($kode_form);
		$data['get_karyawan_360_nilai_per'] = $this->transaksi_model->get_karyawan_360_nilai_per($kode_form);
		$data['get_karyawan_360_nilai_att'] = $this->transaksi_model->get_karyawan_360_nilai_att($kode_form);
		$data['hitung_360_per'] = $this->transaksi_model->hitung_360_per($id_karyawan,$kode_form);
		$data['hitung_360_att'] = $this->transaksi_model->hitung_360_att($id_karyawan,$kode_form);
		
		$kry = $this->db->query("select k.nik, c.nama_perusahaan from karyawan k, perusahaan c  where k.id_perusahaan=c.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
		}
		$data['get_company']= $perusahaan;

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/tigaenampuluh/lihat', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function kirim(){
		$data['get_company'] = $this->master_model->get_company();
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/tigaenampuluh/kirim', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function filter_company_360(){
		$idPerush = $this->input->get('company');
		$TglMulai = $this->input->get('tgl_mulai');
		$TglSampai = $this->input->get('tgl_sampai');
		$data['get_karyawan'] = $this->master_model->get_karyawan_filter($idPerush, $TglMulai, $TglSampai);
		$data['get_company'] = $this->master_model->get_company();
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/tigaenampuluh/kirim', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function kirim_form(){
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
		$inisial = $kode[8];
		$rekan_kerja2 = $kode[9];
		$rekan_kerja3 = $kode[10];
		$rekan_kerja3 = $kode[10];
		$tanggal_appraisal = $kode[11];

		$skye1 = "$tanggal_appraisal$inisial$rekan_kerja";
		$skye2 = "$tanggal_appraisal$inisial$rekan_kerja2";
		$skye3 = "$tanggal_appraisal$inisial$rekan_kerja3";
		$ellen	= "ellen@pincgroup.id";
		$sara	= "sara@pincgroup.id";
		//print $tanggal_appraisal;exit;

		$kry = $this->db->query("select k.nik, c.* from karyawan k, perusahaan c  where k.id_perusahaan=c.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
			$PicName	= $row2->pic_name;
			$PicEmail	= $row2->pic_email;
			$PicPhone	= $row2->pic_phone;
		}

		/* Email Ke Rekan Kerja 1 */
		
		$data['get_email_rekan'] = $this->transaksi_model->get_email_rekan($rekan_kerja);
		$get_email_rekan = $data['get_email_rekan'];
		foreach($get_email_rekan as $row){
			$email = $row['email'];
			$nama_rekan	= $row['nama_karyawan'];
		}
			$kode1 ="+$id_karyawan+$rekan_kerja+$nama_karyawan+$atasan+$nama_departemen+$email+$jabatan+$inisial+$skye1";
			$urlx1= base64_encode($kode1);
			/* ini emailnya */
			$linkurl = 'http://182.16.171.166/kinerja/admin/online/tigaenampuluh/'.$urlx1.'/';
			

			
				
		$this->load->library('email');
			$from	= "hrd@pincgroup.id";
			$ellen	= "ellen@pincgroup.id";
			$sara	= "sara@pincgroup.id";
			$to	= $email;
			$subject = "360 Feedback Form - $nama_karyawan";
			
			$message ="
			<html><body>
			<p>Dear $nama_rekan,</p>
			<p>Berikut adalah link terkait 360 feedback form (<a href='$linkurl'>Isi 360 Form</a>) terhadap rekan kerja anda  $nama_karyawan</p>
			<p>Mohon perhatikan petunjuk pengisian dan timeline & activity 360 form berikut :</p><br>
			<p><center><b>Petunjuk Pelaksanaan 360 Form Feedback</b></center></p>
			<p>1. Berikan penilaian terhadap performance (knowledge & skill) & attitude dari rekan kerja/ subordinate tidak langsung secara objektif.</p>
			<p>2. Pada bagian performance, berikan penilaian terhadap knowledge & skill dengan mempertimbangkan tingkat pengalaman setiap karyawan yang akan dinilai,apakah yang bersangkutan merupakan personel Junior, Middle atau Senior.</p>
			<p>3. Pada bagian Atittude , cara penilaian ditentukan berdasarkan kontribusi karyawan yang bersangkutan terhadap kinerja tim, apakah Individu tersebut memberikan kinerja kerja tim yang baik, solutif, gigih serta selalu berupaya memberikan performa terbaik untuk kepentingan tim.</p>
			<p>4. Penilaian skor dari 360 form feedback merupakan angka bulat dari Buruk(1),Kurang(2),Cukup(3),Baik(4) dan sangat baik(5).</p>
			<p>5. Berikan masukan/ saran atas improvement lain yang diharapkan terkait dengan performance & attitude yang bersangkutan pada kolom yang telah disediakan, jika ada.</p>
			<p>6. Apabila terdapat kesulitan dalam proses 360 Form Feedback ini, mohon untuk dapat menghubungi Dept. HR.</p>
			<p> $PicName | $PicEmail | $PicPhone </p>
			</body></html>";
			// <p> Dewi Kemalasari | mala@pincgroup.id | +62 877-7561-7587 </p>
			// <p> Gani Setiadi    | gani@pincgroup.id | +62 878-2326-9818 </p>
			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			// $this->email->cc($sara);
			// $this->email->bcc($ellen);
			$this->email->subject($subject);
			$this->email->set_mailtype("html");
			$this->email->message($message);
			
		try{
			$this->email->send();
			// var_dump("Done");
			echo 'Message has been sent.';
		}catch(Exception $e){
			echo $e->getMessage();
		}
		$data_notif1[]=array('nama_karyawan' => $nama_karyawan,
							'nik' => $nik,
			 				'jenis' => '360 Feedback Form',
							'nama' => $nama_rekan,
							'email' => $email,
							'status' => 1);
		$insert_notif1 = count($data_notif1);

		if($insert_notif1){
			$this->db->insert_batch('notice', $data_notif1);
		}
	/* AKhir Email Ke Rekan Kerja 1 */		

/* Email Ke Rekan Kerja 2 */
		
$data['get_email_rekan2'] = $this->transaksi_model->get_email_rekan2($rekan_kerja2);
$get_email_rekan2 = $data['get_email_rekan2'];
foreach($get_email_rekan2 as $row){
	$email2 = $row['email'];
	$nama_rekan2	= $row['nama_karyawan'];

	
}
		/* ini emailnya */
		$kode2 ="+$id_karyawan+$rekan_kerja2+$nama_karyawan+$atasan+$nama_departemen+$email2+$jabatan+$inisial+$skye2";
		
		$urlx2= base64_encode($kode2);
		$linkurl2 = 'http://182.16.171.166/kinerja/admin/online/tigaenampuluh/'.$urlx2.'/';
		//$urlx2 ="+$id_karyawan+$rekan_kerja2+$nama_karyawan+$atasan+$nama_departemen+$email2+$inisial";
	$this->load->library('email');
	$from	= "hrd@pincgroup.id";
	$to	= $email2;
	$subject = "360 Feedback Form - $nama_karyawan";
	$message2 ="
	<html><body>
	<p>Dear $nama_rekan2,</p>
	<p>Berikut adalah link terkait 360 feedback form (<a href='$linkurl2'>Isi 360 Form</a>) terhadap rekan kerja anda  $nama_karyawan</p>
	<p>Mohon perhatikan petunjuk pengisian dan timeline & activity 360 form berikut :</p><br>
	<p><center><b>Petunjuk Pelaksanaan 360 Form Feedback</b></center></p>
	<p>1. Berikan penilaian terhadap performance (knowledge & skill) & attitude dari rekan kerja/ subordinate tidak langsung secara objektif.</p>
	<p>2. Pada bagian performance, berikan penilaian terhadap knowledge & skill dengan mempertimbangkan tingkat pengalaman setiap karyawan yang akan dinilai,apakah yang bersangkutan merupakan personel Junior, Middle atau Senior.</p>
	<p>3. Pada bagian Atittude , cara penilaian ditentukan berdasarkan kontribusi karyawan yang bersangkutan terhadap kinerja tim, apakah Individu tersebut memberikan kinerja kerja tim yang baik, solutif, gigih serta selalu berupaya memberikan performa terbaik untuk kepentingan tim.</p>
	<p>4. Penilaian skor dari 360 form feedback merupakan angka bulat dari Buruk(1),Kurang(2),Cukup(3),Baik(4) dan sangat baik(5).</p>
	<p>5. Berikan masukan/ saran atas improvement lain yang diharapkan terkait dengan performance & attitude yang bersangkutan pada kolom yang telah disediakan, jika ada.</p>
	<p>6. Apabila terdapat kesulitan dalam proses 360 Form Feedback ini, mohon untuk dapat menghubungi Dept. HR.</p>
	<p> $PicName | $PicEmail | $PicPhone </p>
	</body></html>";
			// <p> Dewi Kemalasari | mala@pincgroup.id | +62 877-7561-7587 </p>
			// <p> Gani Setiadi    | gani@pincgroup.id | +62 878-2326-9818 </p>
	$this->email->set_newline("\r\n");
	$this->email->from($from);
	$this->email->to($to);
	// $this->email->cc($sara);
	// $this->email->bcc($ellen);
	$this->email->subject($subject);
	$this->email->set_mailtype("html");
	$this->email->message($message2);
	try{
	$this->email->send();
	echo 'Message has been sent.';
	}catch(Exception $e){
	echo $e->getMessage();
	}
	$data_notif2[]=array('nama_karyawan' => $nama_karyawan,
						'nik' => $nik,
						'jenis' => '360 Feedback Form',
						'nama' => $nama_rekan2,
						'email' => $email2,
						'status' => 1);
	$insert_notif2 = count($data_notif2);

	if($insert_notif2){
		$this->db->insert_batch('notice', $data_notif2);
	}
/* AKhir Email Ke Rekan Kerja 2 */		



/* Email Ke Rekan Kerja 3 */
		
$data['get_email_rekan3'] = $this->transaksi_model->get_email_rekan3($rekan_kerja3);
$get_email_rekan3 = $data['get_email_rekan3'];
foreach($get_email_rekan3 as $row){
	$email3 = $row['email'];
	$nama_rekan3	= $row['nama_karyawan'];

}
		/* ini emailnya */
		$kode3 ="+$id_karyawan+$rekan_kerja3+$nama_karyawan+$atasan+$nama_departemen+$email2+$jabatan+$inisial+$skye3";
		$urlx3= base64_encode($kode3);
		$linkurl3 = 'http://182.16.171.166/kinerja/admin/online/tigaenampuluh/'.$urlx3.'/';
		//$urlx3 ="+$id_karyawan+$rekan_kerja3+$nama_karyawan+$atasan+$nama_departemen+$email2+$inisial";
$this->load->library('email');
	$from	= "hrd@pincgroup.id";
	$to	= $email3;
	$subject = "360 Feedback Form - $nama_karyawan";
	$message3 ="
	<html><body>
	<p>Dear $nama_rekan3,</p>
	<p>Berikut adalah link terkait 360 feedback form (<a href='$linkurl3'>Isi 360 Form</a>) terhadap rekan kerja anda  $nama_karyawan</p>
	<p>Mohon perhatikan petunjuk pengisian dan timeline & activity 360 form berikut :</p><br>
	<p><center><b>Petunjuk Pelaksanaan 360 Form Feedback</b></center></p>
	<p>1. Berikan penilaian terhadap performance (knowledge & skill) & attitude dari rekan kerja/ subordinate tidak langsung secara objektif.</p>
	<p>2. Pada bagian performance, berikan penilaian terhadap knowledge & skill dengan mempertimbangkan tingkat pengalaman setiap karyawan yang akan dinilai,apakah yang bersangkutan merupakan personel Junior, Middle atau Senior.</p>
	<p>3. Pada bagian Atittude , cara penilaian ditentukan berdasarkan kontribusi karyawan yang bersangkutan terhadap kinerja tim, apakah Individu tersebut memberikan kinerja kerja tim yang baik, solutif, gigih serta selalu berupaya memberikan performa terbaik untuk kepentingan tim.</p>
	<p>4. Penilaian skor dari 360 form feedback merupakan angka bulat dari Buruk(1),Kurang(2),Cukup(3),Baik(4) dan sangat baik(5).</p>
	<p>5. Berikan masukan/ saran atas improvement lain yang diharapkan terkait dengan performance & attitude yang bersangkutan pada kolom yang telah disediakan, jika ada.</p>
	<p>6. Apabila terdapat kesulitan dalam proses 360 Form Feedback ini, mohon untuk dapat menghubungi Dept. HR.</p>
	<p> $PicName | $PicEmail | $PicPhone </p>
	</body></html>";
			// <p> Dewi Kemalasari | mala@pincgroup.id | +62 877-7561-7587 </p>
			// <p> Gani Setiadi    | gani@pincgroup.id | +62 878-2326-9818 </p>
	$this->email->set_newline("\r\n");
	$this->email->from($from);
	$this->email->to($to);
	// $this->email->cc($sara);
	// $this->email->bcc($ellen);
	$this->email->subject($subject);
	$this->email->set_mailtype("html");
	$this->email->message($message3);
	try{
		$this->email->send();
		echo 'Message has been sent.';
	}catch(Exception $e){
		echo $e->getMessage();
	}
	$data_notif3[]=array('nama_karyawan' => $nama_karyawan,
					'nik' => $nik,
					'jenis' => '360 Feedback Form',
					'nama' => $nama_rekan3,
					'email' => $email3,
					'status' => 1);
	$insert_notif3 = count($data_notif3);

	if($insert_notif3){
		$this->db->insert_batch('notice', $data_notif3);
	}
/* AKhir Email Ke Rekan Kerja 3 */	



		echo '<script>
		alert("Email Form 360 Berhasil Di Kirim"); 
		</script>';
		redirect('admin/tigaenampuluh/index');
	
	}


	public function add(){
		$data['get_departemen'] = $this->master_model->get_departemen();
		$data['get_jabatan'] = $this->master_model->get_jabatan();
		$data['get_golongan'] = $this->master_model->get_golongan();
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		if($this->input->post('submit')){
		$this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'trim|required');
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
		$this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
		$this->form_validation->set_rules('no_rek', 'no_rek', 'trim|required');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_ktp', 'no_ktp', 'trim|required');
		$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'trim|required');
		$this->form_validation->set_rules('tgl_appraisal', 'tgl_appraisal', 'trim|required');
		$this->form_validation->set_rules('atasan', 'atasan', 'trim|required');
		$this->form_validation->set_rules('rekan_kerja', 'rekan_kerja', 'trim|required');
		$this->form_validation->set_rules('departemen', 'departemen', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/karyawan/add'),'refresh');
		}
		else{
		$data = array(
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'nik' => $this->input->post('nik'),
		'email' => $this->input->post('email'),
		'tempat_lahir' => $this->input->post('tempat_lahir'),
		'tgl_lahir' => $this->input->post('tgl_lahir'),
		'npwp' => $this->input->post('npwp'),
		'no_rek' => $this->input->post('no_rek'),
		'agama' => $this->input->post('agama'),
		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		'phone' => $this->input->post('phone'),
		'alamat' => $this->input->post('alamat'),
		'no_ktp' => $this->input->post('no_ktp'),
		'tgl_masuk' => $this->input->post('tgl_masuk'),
		'tgl_appraisal' => $this->input->post('tgl_appraisal'),
		'tgl_keluar' => $this->input->post('tgl_keluar'),
		'atasan' => $this->input->post('atasan'),
		'rekan_kerja' => $this->input->post('rekan_kerja'),
		'departemen' => $this->input->post('departemen'),
		'jabatan' => $this->input->post('jabatan'),
		'golongan' => $this->input->post('golongan'),
		);
		$result = $this->master_model->add_karyawan($data);
		if($result){
				$this->session->set_flashdata('success', 'User has been added successfully!');
				redirect(base_url('admin/karyawan'));
		}
		}
		}
		else{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/karyawan/add',$data);
		$this->load->view('admin/includes/_footer');
		}
}
	public function edit(){
		$data['title'] = 'Table karyawan';
		$id =$this->uri->segment(4);
		$where = array('id' => $id);
		$data['get_karyawan'] = $this->master_model->edit_karyawan($where,'karyawan')->result();
		$data['get_departemen'] = $this->master_model->get_departemen();
		$data['get_jabatan'] = $this->master_model->get_jabatan();
		$data['get_golongan'] = $this->master_model->get_golongan();
		$data['get_karyawan2'] = $this->master_model->get_karyawan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/karyawan/edit', $data);
		$this->load->view('admin/includes/_footer');
	}	
	public function update(){
			$id = $this->input->post('id');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$nik = $this->input->post('nik');
			$email = $this->input->post('email');
			$tempat_lahir = $this->tempat_lahir->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$npwp = $this->input->post('npwp');
			$no_rek = $this->input->post('no_rek');
			$agama = $this->input->post('jenis_kelamin');
			$phone = $this->input->post('phone');
			$alamat = $this->input->post('alamat');
			$no_ktp = $this->input->post('no_ktp');
			$tgl_masuk = $this->input->post('tgl_masuk');
			$tgl_keluar = $this->input->post('tgl_keluar');
			$tgl_appraisal = $this->input->post('tgl_appraisal');
			$atasan = $this->input->post('atasan');
			$rekan_kerja = $this->input->post('rekan_kerja');
			$departemen = $this->input->post('departemen');
			$jabatan = $this->input->post('jabatan');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$golongan = $this->input->post('golongan');
	
			
			$data = array(
			'nama_karyawan' => $nama_karyawan,
			'nik' => $nik,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir,
			'npwp' => $npwp,
			'no_rek' => $no_rek,
			'agama' => $agama,
			'jenis_kelamin' => $jenis_kelamin,
			'phone' => $phone,
			'alamat' => $alamat,
			'no_ktp' => $no_ktp,
			'tgl_masuk' => $tgl_masuk,
			'tgl_keluar' => $tgl_keluar,
			'tgl_appraisal' => $tgl_appraisal,
			'atasan' => $atasan,
			'rekan_kerja' => $rekan_kerja,
			'departemen' => $departemen,
			'jabatan' => $jabatan,
			'golongan' => $golongan,
			);
			$where = array(
				'id' => $id
			);
			$this->master_model->Updatekaryawan($where,$data,'karyawan');
			redirect('admin/karyawan/index');
	}
	public function delete($id = 0)
	{
		$this->db->delete('karyawan', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/karyawan'));
	}

	public function pdf360(){
		$this->load->helper('pdf_helper');
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);

		$inisial = $kode[1];
		$jabatan = $kode[2];
		$tanggal = $kode[3];
		$rekan = $kode[4];
		$nama_departemen = $kode[5];
		$kode_form = $kode[6];
		$id_karyawan = $kode[7];
		$data['get_masukan_360'] = $this->transaksi_model->get_masukan_360($kode_form);
		$data['get_karyawan_360_nilai_per'] = $this->transaksi_model->get_karyawan_360_nilai_per($kode_form);
		$data['get_karyawan_360_nilai_att'] = $this->transaksi_model->get_karyawan_360_nilai_att($kode_form);
		$data['hitung_360_per'] = $this->transaksi_model->hitung_360_per($id_karyawan,$kode_form);
		$data['hitung_360_att'] = $this->transaksi_model->hitung_360_att($id_karyawan,$kode_form);


		$kry = $this->db->query("select k.nik, c.nama_perusahaan from karyawan k, perusahaan c  where k.id_perusahaan=c.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
		}
		$data['get_company']= $perusahaan;

		$this->load->view('admin/tigaenampuluh/pdf_360', $data);

	}
}
?>
