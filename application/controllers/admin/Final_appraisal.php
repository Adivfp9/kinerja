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
		// var_dump($data);
		// return;
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
		//print $kode;exit;
		$kode = explode('+', $kode);
// var_dump($kode);
// return ;
		$id_karyawan =$kode[1];
		$inisial = $kode[2];
		$kode_form = $kode[11];
		$kode_form2 = $kode[12];
		$kode_form3 = $kode[13];
		$id_jabatan = $kode[15];
		$tanggal_appraisal = $kode[14];
		$nama_karyawan = $kode[6];
		$atasan = $kode[7];
		$kode = "$tanggal_appraisal$inisial$atasan";

		$kry = $this->db->query("select nik from karyawan where id='$id_karyawan'");
		foreach ($kry->result() as $row2)
		{
			$nik = $row2->nik;
		}
		
		$data['get_masukan_360'] = $this->transaksi_model->get_masukan_360($kode_form);
		$data['get_karyawan_360_nilai_per'] = $this->transaksi_model->get_karyawan_360_nilai_per($kode_form);
		$data['get_karyawan_360_nilai_att'] = $this->transaksi_model->get_karyawan_360_nilai_att($kode_form);
		$data['hitung_360_per'] = $this->transaksi_model->hitung_360_per($inisial,$kode_form);
		$data['hitung_360_att'] = $this->transaksi_model->hitung_360_att($inisial,$kode_form);

		// rekan 2

		$data['get_masukan_3602'] = $this->transaksi_model->get_masukan_3602($kode_form2);
		$data['get_karyawan_360_nilai_per2'] = $this->transaksi_model->get_karyawan_360_nilai_per2($kode_form2);
		$data['get_karyawan_360_nilai_att2'] = $this->transaksi_model->get_karyawan_360_nilai_att2($kode_form2);
		$data['hitung_360_per2'] = $this->transaksi_model->hitung_360_per2($inisial,$kode_form2);
		$data['hitung_360_att2'] = $this->transaksi_model->hitung_360_att2($inisial,$kode_form2);

		//rekan 3

		$data['get_masukan_3603'] = $this->transaksi_model->get_masukan_3602($kode_form3);
		$data['get_karyawan_360_nilai_per3'] = $this->transaksi_model->get_karyawan_360_nilai_per3($kode_form3);
		$data['get_karyawan_360_nilai_att3'] = $this->transaksi_model->get_karyawan_360_nilai_att3($kode_form3);
		$data['hitung_360_per3'] = $this->transaksi_model->hitung_360_per2($inisial,$kode_form3);
		$data['hitung_360_att3'] = $this->transaksi_model->hitung_360_att2($inisial,$kode_form3);
		// var_dump($data);
		$this->load->view('admin/final/generate_pdf',$data);

		// self appraisal
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
		
		$kondisi4="individual";
		$data['get_karyawan_self_know'] = $this->transaksi_model->get_karyawan_self_know($kondisi1,$kode);
		$data['get_karyawan_self_skills'] = $this->transaksi_model->get_karyawan_self_skills($kondisi2,$kode);
		$data['get_karyawan_self_att'] = $this->transaksi_model->get_karyawan_self_att($kondisi3,$kode);
		$data['get_karyawan_self_other'] = $this->transaksi_model->get_karyawan_self_other($kondisi4,$kode);

		$data['hitung_self_know'] = $this->transaksi_model->hitung_self_know($kondisi1,$kode);	
		$data['hitung_self_skills'] = $this->transaksi_model->hitung_self_skills($kondisi2,$kode);	
		$data['hitung_self_attitude'] = $this->transaksi_model->hitung_self_attitude($kondisi3,$kode);
		$data['hitung_self_other'] = $this->transaksi_model->hitung_self_other($kondisi4,$kode);

		$where = array('nik' => $nik);

		$data['get_nilai'] = $this->master_model->edit_nilai($where,'nilai')->result();
	
		$this->load->view('admin/final/generate_pdf_self',$data);
		
		$data['get_email_atasan_int'] = $this->transaksi_model->get_email_atasan_int($atasan);
		$get_email_atasan_int = $data['get_email_atasan_int'];
		foreach($get_email_atasan_int as $row){
			$email = $row['email'];
		}
		// var_dump($email);
		// return ;

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
			mohon untuk dapat menghubungi Dept. HR (Sara Putri /sara@pinc.group/ +6851 5788 1097 )</p>
			
			</body></html>";

			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->cc('gita@pinc.group,it@pincgroup.id,ellen@pinc.group,sara@pincgroup.id');
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
		
		
		$inisial = $kode[2];
		$kode_form = $kode[11];
		$kode_form2 = $kode[12];
		$kode_form3 = $kode[13];

		// rekan 1
		
		$data['get_masukan_360'] = $this->transaksi_model->get_masukan_360($kode_form);
		$data['get_karyawan_360_nilai_per'] = $this->transaksi_model->get_karyawan_360_nilai_per($kode_form);
		$data['get_karyawan_360_nilai_att'] = $this->transaksi_model->get_karyawan_360_nilai_att($kode_form);
		$data['hitung_360_per'] = $this->transaksi_model->hitung_360_per($inisial,$kode_form);
		$data['hitung_360_att'] = $this->transaksi_model->hitung_360_att($inisial,$kode_form);

		// rekan 2

		$data['get_masukan_3602'] = $this->transaksi_model->get_masukan_3602($kode_form2);
		$data['get_karyawan_360_nilai_per2'] = $this->transaksi_model->get_karyawan_360_nilai_per2($kode_form2);
		$data['get_karyawan_360_nilai_att2'] = $this->transaksi_model->get_karyawan_360_nilai_att2($kode_form2);
		$data['hitung_360_per2'] = $this->transaksi_model->hitung_360_per2($inisial,$kode_form2);
		$data['hitung_360_att2'] = $this->transaksi_model->hitung_360_att2($inisial,$kode_form2);

		//rekan 3

		$data['get_masukan_3603'] = $this->transaksi_model->get_masukan_3602($kode_form3);
		$data['get_karyawan_360_nilai_per3'] = $this->transaksi_model->get_karyawan_360_nilai_per3($kode_form3);
		$data['get_karyawan_360_nilai_att3'] = $this->transaksi_model->get_karyawan_360_nilai_att3($kode_form3);
		$data['hitung_360_per3'] = $this->transaksi_model->hitung_360_per2($inisial,$kode_form3);
		$data['hitung_360_att3'] = $this->transaksi_model->hitung_360_att2($inisial,$kode_form3);
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
