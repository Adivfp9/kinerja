<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Spv_appraisal extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/transaksi_model', 'transaksi_model');
  	}
	public function index(){
		$data['title'] = 'Table karyawan';
		$data['get_karyawan'] = $this->transaksi_model->get_karyawan_ss_spv();
		// var_dump($data);
		// return ;
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/spv/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function kirim(){
		
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/spv/kirim', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function lihat_form(){
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		
		//print $kode;exit;
		$kode = explode('+', $kode);
		// var_dump($kode);
		// return ;
		
		$id_karyawan = $kode[1];
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$nama_departemen = $kode[5];
		$email2 = $kode[6];
		$nama_jabatan = $kode[7];
		$id_jabatan = $kode[8];
		$kode = $kode[9];
		//print $kode;exit;

		$kry = $this->db->query("select nik from karyawan where id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
		}
		
		$query = $this->db->query("select * from master_form where id_jabatan='$id_jabatan'");
		// var_dump(($query->result()));
		// return ;
		foreach ($query->result() as $row)
		{
				$kondisi1=  $row->kondisi1;
				$kondisi2= $row->kondisi2;
				$kondisi3= $row->kondisi3;
				
		}
		$data['get_karyawan_spv'] = $this->transaksi_model->get_karyawan_spv($id_karyawan);
		//$data['get_karyawan_spv_nilai'] = $this->transaksi_model->get_karyawan_spv_nilai($id_karyawan);
		
		$data['get_karyawan_spv_know'] = $this->transaksi_model->get_karyawan_spv_know($kondisi1,$kode);

		$data['get_karyawan_spv_skills'] = $this->transaksi_model->get_karyawan_spv_skills($kondisi2,$kode);
		$data['get_karyawan_spv_att'] = $this->transaksi_model->get_karyawan_spv_att($kondisi3,$kode);

		$kondisi4 ='individual';
		$data['get_karyawan_spv_ind'] = $this->transaksi_model->get_karyawan_spv_ind($kondisi4,$kode);
		// var_dump($data);
		// return;

		$data['hitung_spv_know'] = $this->transaksi_model->hitung_spv_know($kondisi1,$kode);	
		$data['hitung_spv_skills'] = $this->transaksi_model->hitung_spv_skills($kondisi2,$kode);	
		$data['hitung_spv_attitude'] = $this->transaksi_model->hitung_spv_attitude($kondisi3,$kode);
		$data['hitung_spv_individual'] = $this->transaksi_model->hitung_spv_ind($kondisi4,$kode);	
		$where = array('nik' => $nik);
		$data['get_nilai'] = $this->master_model->edit_nilai($where,'nilai')->result();
		
		$getSpv = $this->db->query("select nama_karyawan from karyawan where inisial='$atasan'");
		foreach ($getSpv->result() as $rowSpv)
		{
			$nama_spv = $rowSpv->nama_karyawan;
		}
		$data['get_spv']= $nama_spv;
		
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/spv/lihat', $data);
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
		$data['get_email_rekan'] = $this->transaksi_model->get_email_rekan($rekan_kerja);
		$get_email_rekan = $data['get_email_rekan'];
		foreach($get_email_rekan as $row){
			$email = $row['email'];
		}
			$this->load->library('email');
			$from	= "hrd@pinc.group";
			$to	= $email;
			$subject = "Supervisor Appraisal - $nama_karyawan";
			$message ="
			<html><body>
			<p>Dear $atasan,</p>
			<p>Berikut adalah link terkait Self Appraisal form (<a href='http://182.16.171.166/kinerja/admin/online/spv/$url'>Isi SPV Appraisal form</a>) terhadap diri $nama_karyawan
			<p>Mohon perhatikan petunjuk pengisian dan timeline & Employee Performance Appraisal berikut :</p><br>

			<p><center><b>Petunjuk Pelaksanaan Employee Performance Appraisal</b></center></p>
			<p>1. Ikuti timeline yang telah ditentukan dalam melaksanakan tahapan Employee Performance Appraisal.</p>
			<p>2. Berikan penilaian pada Knowledge, Skill dan Attitude dengan mempertimbangkan tingkat pengalaman setiap Karyawan yang akan dinilai, apakah yang bersangkutan merupakan karyawan dengan tingkat pengalaman Junior, Middle atau Senior .</p>
			<p>3. Pada bagian Atittude , cara penilaian ditentukan berdasarkan kontribusi karyawan yang bersangkutan terhadap kinerja tim, apakah Individu tersebut memberikan kinerja kerja tim yang baik, solutif, gigih serta selalu berupaya memberikan performa terbaik untuk kepentingan tim.</p>
			<p>4. Pada bagian Individual Deliverable (jika ada), penilaian ini diisi dengan hal-hal yang bersifat luar biasa yang diberikan oleh karyawan yang bersangkutan dalam kinerja nya.Contoh : pada form penilaian Graphic Designer, terdapat kinerja yang diluar biasanya yaitu able to develop communications strategy</p>
			<p>5. HRD akan mempertimbangkan 360' review/ feedback atasan, dan dari karyawan yang bersangkutansebagai referensi dan dokumen pendukung pengambilan keputusan pada proses Appraisal.</p>
			<p>6. Dalam mengisi form appraisal, form tersebut wajib diisi secara lengkap.</p>
			<p>7. Apabila terdapat kesulitan dalam pelaksanaan Employee Performance Appraisal ini, mohon untuk dapat menghubungi Dept. HR (Gani Setiadi/gani@pinc.group/ +62 878-2326-9818)</p>
			
			</body></html>";
			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->set_mailtype("html");
			$this->email->message($message);
			try{
			$this->email->send();
			echo 'Message has been sent.';
	
			}catch(Exception $e){
			echo $e->getMessage();
			}
			
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
	
			
			$data = array(
			'nama_karyawan' => $nama_karyawan,
			'nik' => $nik,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir,
			'npwp' => $npwp,
			'no_rek' => $no_rek,
			'agama' => $agama,
			// 'jenis_kelamin' => $jenis_kelamin,
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
			// 'golongan' => $golongan,
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

	public function spv_pdf(){
		$this->load->helper('pdf_helper');
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
		$data['get_karyawan_self'] = $this->transaksi_model->get_karyawan_ss_spv($id_karyawan);
		$data['get_karyawan_self_nilai'] = $this->transaksi_model->get_karyawan_self_nilai($id_karyawan);
		
		$this->load->view('admin/spv/spv_pdf', $data);
	}



	public function pdf_spv(){
		$this->load->helper('pdf_helper');

		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		//print $kode;exit;
		$kode = explode('+', $kode);
		// var_dump($kode);
		// return;
		$id_karyawan = $kode[1];
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$nama_departemen = $kode[5];
		$email2 = $kode[6];
		$nama_jabatan = $kode[7];
		$id_jabatan = $kode[8];
		$kode = $kode[9];
		$kry = $this->db->query("select nik from karyawan where id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
		}
		
		$query = $this->db->query("select * from master_form where id_jabatan='$id_jabatan'");

		foreach ($query->result() as $row)
		{
				$kondisi1=  $row->kondisi1;
				$kondisi2= $row->kondisi2;
				$kondisi3= $row->kondisi3;
				
		}
		$data['get_karyawan_spv'] = $this->transaksi_model->get_karyawan_spv($id_karyawan);
		//$data['get_karyawan_spv_nilai'] = $this->transaksi_model->get_karyawan_spv_nilai($id_karyawan);
		
		$data['get_karyawan_spv_know'] = $this->transaksi_model->get_karyawan_spv_know($kondisi1,$kode);

		$data['get_karyawan_spv_skills'] = $this->transaksi_model->get_karyawan_spv_skills($kondisi2,$kode);
		$data['get_karyawan_spv_att'] = $this->transaksi_model->get_karyawan_spv_att($kondisi3,$kode);

		$kondisi4 ='individual';
		$data['get_karyawan_spv_ind'] = $this->transaksi_model->get_karyawan_spv_ind($kondisi4,$kode);
		// var_dump($data);
		// return;

		$data['hitung_spv_know'] = $this->transaksi_model->hitung_spv_know($kondisi1,$kode);	
		$data['hitung_spv_skills'] = $this->transaksi_model->hitung_spv_skills($kondisi2,$kode);	
		$data['hitung_spv_attitude'] = $this->transaksi_model->hitung_spv_attitude($kondisi3,$kode);
		$data['hitung_spv_individual'] = $this->transaksi_model->hitung_spv_ind($kondisi4,$kode);	
		$where = array('nik' => $nik);
		$data['get_nilai'] = $this->master_model->edit_nilai($where,'nilai')->result();
		
		$getSpv = $this->db->query("select nama_karyawan from karyawan where inisial='$atasan'");
		foreach ($getSpv->result() as $rowSpv)
		{
			$nama_spv = $rowSpv->nama_karyawan;
		}
		$data['get_spv']= $nama_spv;

	
		$this->load->view('admin/spv/pdf_spv', $data);
	}
}
?>
