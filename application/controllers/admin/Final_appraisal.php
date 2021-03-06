<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Final_appraisal extends MY_Controller {
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
		$data['get_karyawan'] = $this->master_model->get_final_spv();

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/final/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function list_index(){
		$data['title'] = 'Table karyawan';
		$data['get_final_appx'] = $this->master_model->get_final_appx();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/final/list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function kirim(){
		$data['title'] = 'Table 360 Form';
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/final/kirim', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function add(){
		
		$data['get_karyawan'] = $this->master_model->get_karyawanxxx();
		if($this->input->post('submit')){

			$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/karyawan/add'),'refresh');
		}
		else{
		$data = array(
		'id_karyawan' => $this->input->post('id_karyawan'),
		'summary' => $this->input->post('summary'),
		'next_action' => $this->input->post('next_action'),
		'increstmen' => $this->input->post('increstmen'),
		'tgl_input' => date('Y-m-d'),
					
	
		);
		$result = $this->master_model->add_final_app($data);
		if($result){
				$this->session->set_flashdata('success', 'Final Appraisal added successfully!');
				$id_karyawan = $this->input->post('id_karyawan');
				$query = $this->db->query("select * from karyawan where id='$id_karyawan'");

				foreach ($query->result() as $row)
				{
						$tgl_appraisalx=  $row->tgl_appraisal;
						$date1 = str_replace('-', '/', $tgl_appraisalx);
						$tomorrow = date('Y-m-d',strtotime($date1 . "+1 years"));

						
				}

				$data = array(
					'mark' => '0',
					'tgl_appraisal' => $tomorrow,);
				$where = array(
					'id' => $id_karyawan
				);
				$this->master_model->Updatekaryawan($where,$data,'karyawan');

			

				redirect(base_url('admin/Final_appraisal/list_index'));
		}
		}
		}
		else{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/final/add',$data);
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
	public function kirim_form(){
		$this->load->helper('pdf_helper');
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		// var_dump($kode);
		// return;
		$id_karyawan =$kode[1];
		$inisial = $kode[2];
		$rekan1 = $kode[3];
		$rekan2 = $kode[4];
		$rekan3 = $kode[5];
		$kode_form = $kode[11];
		$kode_form2 = $kode[12];
		$kode_form3 = $kode[13];
		$id_jabatan = $kode[10];
		$tanggal_appraisal = $kode[14];
		$nama_karyawan = $kode[6];
		$atasan = $kode[7];
		$kode = "$tanggal_appraisal$inisial$atasan";

		$kry = $this->db->query("select k.nik, c.nama_perusahaan from karyawan k, perusahaan c  where k.id_perusahaan=c.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
		}
		$data['get_company']= $perusahaan;
		
		// rekan 1
		
		$data['get_masukan_360'] = $this->transaksi_model->get_masukan_360($kode_form);
		$data['get_karyawan_360_nilai_per'] = $this->transaksi_model->get_karyawan_360_nilai_per($kode_form);
		$data['get_karyawan_360_nilai_att'] = $this->transaksi_model->get_karyawan_360_nilai_att($kode_form);
		$data['hitung_360_per'] = $this->transaksi_model->hitung_360_per($id_karyawan,$kode_form);
		$data['hitung_360_att'] = $this->transaksi_model->hitung_360_att($id_karyawan,$kode_form);

		$qry1=$this->db->query("select nama_karyawan from karyawan where inisial='$rekan1'");
		foreach ($qry1->result() as $row_r1)
		{
			$nama_rekan1 = $row_r1->nama_karyawan;
		}
		$data['get_rekan1']= $nama_rekan1;

		$qry_tg1=$this->db->query("select tgl_appraisal from form_360 where kode_form='$kode_form' and id_karyawan='$id_karyawan'");
		foreach ($qry_tg1->result() as $row_t1)
		{
			$tgl_input1 = $row_t1->tgl_appraisal;
		}
		$data['tgl_appr1']= $tgl_input1;

		// rekan 2

		$data['get_masukan_3602'] = $this->transaksi_model->get_masukan_3602($kode_form2);
		$data['get_karyawan_360_nilai_per2'] = $this->transaksi_model->get_karyawan_360_nilai_per2($kode_form2);
		$data['get_karyawan_360_nilai_att2'] = $this->transaksi_model->get_karyawan_360_nilai_att2($kode_form2);
		$data['hitung_360_per2'] = $this->transaksi_model->hitung_360_per2($id_karyawan,$kode_form2);
		$data['hitung_360_att2'] = $this->transaksi_model->hitung_360_att2($id_karyawan,$kode_form2);

		$qry2=$this->db->query("select nama_karyawan from karyawan where inisial='$rekan2'");
		foreach ($qry2->result() as $row_r2)
		{
			$nama_rekan2 = $row_r2->nama_karyawan;
		}
		$data['get_rekan2']= $nama_rekan2;

		$qry_tg2=$this->db->query("select tgl_appraisal from form_360 where kode_form='$kode_form' and id_karyawan='$id_karyawan'");
		foreach ($qry_tg2->result() as $row_t2)
		{
			$tgl_input2 = $row_t2->tgl_appraisal;
		}
		$data['tgl_appr2']= $tgl_input2;

		//rekan 3

		$data['get_masukan_3603'] = $this->transaksi_model->get_masukan_3603($kode_form3);
		$data['get_karyawan_360_nilai_per3'] = $this->transaksi_model->get_karyawan_360_nilai_per3($kode_form3);
		$data['get_karyawan_360_nilai_att3'] = $this->transaksi_model->get_karyawan_360_nilai_att3($kode_form3);
		$data['hitung_360_per3'] = $this->transaksi_model->hitung_360_per2($id_karyawan,$kode_form3);
		$data['hitung_360_att3'] = $this->transaksi_model->hitung_360_att2($id_karyawan,$kode_form3);

		$qry3=$this->db->query("select nama_karyawan from karyawan where inisial='$rekan3'");
		foreach ($qry3->result() as $row_r3)
		{
			$nama_rekan3 = $row_r3->nama_karyawan;
		}
		$data['get_rekan3']= $nama_rekan3;

		$qry_tg3=$this->db->query("select tgl_appraisal from form_360 where kode_form='$kode_form' and id_karyawan='$id_karyawan'");
		foreach ($qry_tg3->result() as $row_t3)
		{
			$tgl_input3 = $row_t3->tgl_appraisal;
		}
		$data['tgl_appr3']= $tgl_input3;

		$kry = $this->db->query("select k.nik, c.nama_perusahaan, j.nama_jabatan from karyawan k, perusahaan c, jabatan j  where k.id_perusahaan=c.id and k.id_jabatan=j.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
			$jabatan = $row2->nama_jabatan;
		}
		$data['get_company']= $perusahaan;
		$data['get_jabatan']= $jabatan;

		$this->load->view('admin/final/generate_pdf',$data);


		// self appraisal
		$kry = $this->db->query("select k.nik, c.* from karyawan k, perusahaan c  where k.id_perusahaan=c.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
			$PicName	= $row2->pic_name;
			$PicEmail	= $row2->pic_email;
			$PicPhone	= $row2->pic_phone;
		}
		$data['get_company']= $perusahaan;


		$query = $this->db->query("select * from master_form where id_jabatan='$id_jabatan'");

		foreach ($query->result() as $row)
		{
				$kondisi1=  $row->kondisi1;
				$kondisi2= $row->kondisi2;
				$kondisi3= $row->kondisi3;
		}
		$kondisi4="individual";
		$data['get_karyawan_self'] = $this->transaksi_model->get_karyawan_self($id_karyawan);
		$data['get_karyawan_self_know'] = $this->transaksi_model->get_karyawan_self_know($kondisi1,$kode);
		$data['get_karyawan_self_skills'] = $this->transaksi_model->get_karyawan_self_skills($kondisi2,$kode);
		$data['get_karyawan_self_att'] = $this->transaksi_model->get_karyawan_self_att($kondisi3,$kode);
		$data['get_karyawan_self_other'] = $this->transaksi_model->get_karyawan_self_other($kondisi4,$kode);

		$data['hitung_self_know'] = $this->transaksi_model->hitung_self_know($kondisi1,$kode);
		$data['hitung_self_skills'] = $this->transaksi_model->hitung_self_skills($kondisi2,$kode);	
		$data['hitung_self_attitude'] = $this->transaksi_model->hitung_self_attitude($kondisi3,$kode);	

		
		
		$data['hitung_self_know'] = $this->transaksi_model->hitung_self_know($kondisi1,$kode);	
		$data['hitung_self_skills'] = $this->transaksi_model->hitung_self_skills($kondisi2,$kode);	
		$data['hitung_self_attitude'] = $this->transaksi_model->hitung_self_attitude($kondisi3,$kode);
		$data['hitung_self_other'] = $this->transaksi_model->hitung_self_other($kondisi4,$kode);

		$where = array('nik' => $nik);

		$data['get_nilai'] = $this->master_model->edit_nilai($where,'nilai')->result();

		$getSpv = $this->db->query("select nama_karyawan from karyawan where inisial='$atasan'");
		foreach ($getSpv->result() as $rowSpv)
		{
			$nama_spv = $rowSpv->nama_karyawan;
		}
		$data['get_spv']= $nama_spv;
	
		$this->load->view('admin/final/generate_pdf_self',$data);
		
		$data['get_email_atasan_int'] = $this->transaksi_model->get_email_atasan_int($atasan);
		$get_email_atasan_int = $data['get_email_atasan_int'];
		foreach($get_email_atasan_int as $row){
			$email = $row['email'];
		}

		$getSpv = $this->db->query("select nama_karyawan from karyawan where inisial='$atasan'");
		foreach ($getSpv->result() as $rowSpv)
		{
			$nama_spv = $rowSpv->nama_karyawan;
		}
		$data['get_spv']= $nama_spv;

		$filenameself = './uploads/self/selfForm'.$tanggal_appraisal.$inisial.'.pdf';
		//print $filenameself;exit;
		$filename360 = './uploads/360/360Form'.$tanggal_appraisal.$inisial.'.pdf';

			/* ini emailnya */

			$this->load->library('email');
			$from	= "hrd@pincgroup.id";
			$to	= $email;
			$subject = "Data Appraisal - $nama_karyawan";

			$message ="
			<html><body>
			<p>Dear $atasan - $nama_spv,</p>
			<p>Berikut terlampir Hasil Performance Review Dari $nama_karyawan,</p>
			<p>Mohon untuk melakukan penilaian kepada karyawan yang bersangkutan dengan mengisi : form supervisi appraisal ada link berikut (<a href='http://182.16.171.166/kinerja/admin/online/spv/$url/'>Isi Supervisi Appraisal form</a>)
			</p>
			<p>Apabila terdapat kesulitan dalam pelaksanaan Employee Performance Appraisal ini, 
			mohon untuk dapat menghubungi Dept. HR.</p>
			<p> $PicName | $PicEmail | $PicPhone </p>
			
			</body></html>";
			// <p> Dewi Kemalasari | mala@pincgroup.id | +62 877-7561-7587 </p>
			// <p> Gani Setiadi    | gani@pincgroup.id | +62 878-2326-9818 </p>

			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			// $this->email->cc('gita@pincgroup.id,it@pincgroup.id,mala@pincgroup.id,gani@pincgroup.id');
			$this->email->subject($subject);
			$this->email->set_mailtype("html");
			$this->email->message($message);
			$this->email->attach( $filename360);
			$this->email->attach( $filenameself);
			try{
			$this->email->send();
			echo 'Message has been sent.';
	
			}catch(Exception $e){
			echo $e->getMessage();
			}

			$data_notif3[]=array('nama_karyawan' => substr($nama_karyawan,6),
					'nik' => $nik,
					'jenis' => 'Supervisor Appraisal Form',
					'nama' => $nama_spv,
					'email' => $to,
					'status' => 1);
			$insert_notif3 = count($data_notif3);

			if($insert_notif3){
				$this->db->insert_batch('notice', $data_notif3);
			}
			
		echo '<script>
		alert("Email Form Performance Review Berhasil Di Kirim"); 
		</script>';
		redirect('admin/final_appraisal/index');

	
	}

	public function final360pdf(){
		$this->load->helper('pdf_helper');
		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		// var_dump($kode);
		// return;
		
		$id_karyawan = $kode[1];
		$inisial = $kode[2];
		$rekan1 = $kode[3];
		$rekan2 = $kode[4];
		$rekan3 = $kode[5];
		$kode_form = $kode[11];
		$kode_form2 = $kode[12];
		$kode_form3 = $kode[13];

		// rekan 1
		
		$data['get_masukan_360'] = $this->transaksi_model->get_masukan_360($kode_form);
		$data['get_karyawan_360_nilai_per'] = $this->transaksi_model->get_karyawan_360_nilai_per($kode_form);
		$data['get_karyawan_360_nilai_att'] = $this->transaksi_model->get_karyawan_360_nilai_att($kode_form);
		$data['hitung_360_per'] = $this->transaksi_model->hitung_360_per($id_karyawan,$kode_form);
		$data['hitung_360_att'] = $this->transaksi_model->hitung_360_att($id_karyawan,$kode_form);

		$qry1=$this->db->query("select nama_karyawan from karyawan where inisial='$rekan1'");
		foreach ($qry1->result() as $row_r1)
		{
			$nama_rekan1 = $row_r1->nama_karyawan;
		}
		$data['get_rekan1']= $nama_rekan1;

		$qry_tg1=$this->db->query("select tgl_appraisal from form_360 where kode_form='$kode_form' and id_karyawan='$id_karyawan'");
		foreach ($qry_tg1->result() as $row_t1)
		{
			$tgl_input1 = $row_t1->tgl_appraisal;
		}
		$data['tgl_appr1']= $tgl_input1;

		// rekan 2

		$data['get_masukan_3602'] = $this->transaksi_model->get_masukan_3602($kode_form2);
		$data['get_karyawan_360_nilai_per2'] = $this->transaksi_model->get_karyawan_360_nilai_per2($kode_form2);
		$data['get_karyawan_360_nilai_att2'] = $this->transaksi_model->get_karyawan_360_nilai_att2($kode_form2);
		$data['hitung_360_per2'] = $this->transaksi_model->hitung_360_per2($id_karyawan,$kode_form2);
		$data['hitung_360_att2'] = $this->transaksi_model->hitung_360_att2($id_karyawan,$kode_form2);

		$qry2=$this->db->query("select nama_karyawan from karyawan where inisial='$rekan2'");
		foreach ($qry2->result() as $row_r2)
		{
			$nama_rekan2 = $row_r2->nama_karyawan;
		}
		$data['get_rekan2']= $nama_rekan2;

		$qry_tg2=$this->db->query("select tgl_appraisal from form_360 where kode_form='$kode_form' and id_karyawan='$id_karyawan'");
		foreach ($qry_tg2->result() as $row_t2)
		{
			$tgl_input2 = $row_t2->tgl_appraisal;
		}
		$data['tgl_appr2']= $tgl_input2;

		//rekan 3

		$data['get_masukan_3603'] = $this->transaksi_model->get_masukan_3603($kode_form3);
		$data['get_karyawan_360_nilai_per3'] = $this->transaksi_model->get_karyawan_360_nilai_per3($kode_form3);
		$data['get_karyawan_360_nilai_att3'] = $this->transaksi_model->get_karyawan_360_nilai_att3($kode_form3);
		$data['hitung_360_per3'] = $this->transaksi_model->hitung_360_per2($id_karyawan,$kode_form3);
		$data['hitung_360_att3'] = $this->transaksi_model->hitung_360_att2($id_karyawan,$kode_form3);

		$qry3=$this->db->query("select nama_karyawan from karyawan where inisial='$rekan3'");
		foreach ($qry3->result() as $row_r3)
		{
			$nama_rekan3 = $row_r3->nama_karyawan;
		}
		$data['get_rekan3']= $nama_rekan3;

		$qry_tg3=$this->db->query("select tgl_appraisal from form_360 where kode_form='$kode_form' and id_karyawan='$id_karyawan'");
		foreach ($qry_tg3->result() as $row_t3)
		{
			$tgl_input3 = $row_t3->tgl_appraisal;
		}
		$data['tgl_appr3']= $tgl_input3;

		$kry = $this->db->query("select k.nik, c.nama_perusahaan, j.nama_jabatan from karyawan k, perusahaan c, jabatan j  where k.id_perusahaan=c.id and k.id_jabatan=j.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
			$jabatan = $row2->nama_jabatan;
		}
		$data['get_company']= $perusahaan;
		$data['get_jabatan']= $jabatan;

		$this->load->view('admin/final/final360pdf', $data);

	}

	public function finalself(){
		$this->load->helper('pdf_helper');

		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);

		
		$kode = explode('+', $kode);
		// var_dump($kode);
		// return;
		
		$id_karyawan = $kode[1];
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$nama_departemen = $kode[5];
		$email2 = $kode[6];
		$jabatan = $kode[7];
		$id_jabatan = $kode[8];
		$kode = $kode[9];
		$tanggal_appraisal = $kode[10];

		$kry = $this->db->query("select k.nik, c.nama_perusahaan from karyawan k, perusahaan c  where k.id_perusahaan=c.id and k.id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
			$perusahaan = $row2->nama_perusahaan;
		}
		$data['get_company']= $perusahaan;
		
		$query = $this->db->query("select * from master_form where id_jabatan='$id_jabatan'");

		foreach ($query->result() as $row)
		{
				$kondisi1=  $row->kondisi1;
				$kondisi2= $row->kondisi2;
				$kondisi3= $row->kondisi3;
				
		}

		$kondisi4="individual";
		$data['get_karyawan_self'] = $this->transaksi_model->get_karyawan_self($id_karyawan);
		$data['get_karyawan_self_know'] = $this->transaksi_model->get_karyawan_self_know($kondisi1,$kode);
		$data['get_karyawan_self_skills'] = $this->transaksi_model->get_karyawan_self_skills($kondisi2,$kode);
		$data['get_karyawan_self_att'] = $this->transaksi_model->get_karyawan_self_att($kondisi3,$kode);
		$data['get_karyawan_self_other'] = $this->transaksi_model->get_karyawan_self_other($kondisi4,$kode);

		$data['hitung_self_know'] = $this->transaksi_model->hitung_self_know($kondisi1,$kode);
		$data['hitung_self_skills'] = $this->transaksi_model->hitung_self_skills($kondisi2,$kode);	
		$data['hitung_self_attitude'] = $this->transaksi_model->hitung_self_attitude($kondisi3,$kode);	

		
		
		$data['hitung_self_know'] = $this->transaksi_model->hitung_self_know($kondisi1,$kode);	
		$data['hitung_self_skills'] = $this->transaksi_model->hitung_self_skills($kondisi2,$kode);	
		$data['hitung_self_attitude'] = $this->transaksi_model->hitung_self_attitude($kondisi3,$kode);
		$data['hitung_self_other'] = $this->transaksi_model->hitung_self_other($kondisi4,$kode);

		$where = array('nik' => $nik);

		$data['get_nilai'] = $this->master_model->edit_nilai($where,'nilai')->result();

		$getSpv = $this->db->query("select nama_karyawan from karyawan where inisial='$atasan'");
		foreach ($getSpv->result() as $rowSpv)
		{
			$nama_spv = $rowSpv->nama_karyawan;
		}
		$data['get_spv']= $nama_spv;

		$this->load->view('admin/final/final_self', $data);

	}
}
?>
