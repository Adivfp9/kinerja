<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends My_Controller {



	public function __construct(){

		parent::__construct();

		auth_check(); // check login auth

		$this->rbac->check_module_access();

		// if($this->uri->segment(3) != '')
		// $this->rbac->check_operation_access();

		$this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/transaksi_model', 'transaksi_model');
		require_once APPPATH.'/helpers/mpdf/mpdf.php';
		
	}

	//--------------------------------------------------------------------------

	public function index(){

		$data['title'] = 'Dashboard';
		$data['get_karyawan'] = $this->transaksi_model->get_karyawan_depan();
		$data['get_jumlah_karyawan'] = $this->master_model->get_jumlah_karyawan();
		$data['get_jumlah_final'] = $this->master_model->get_jumlah_final();
		$data['get_jumlah_spv'] = $this->master_model->get_jumlah_spv();
		$data['get_jumlah_self'] = $this->master_model->get_jumlah_self();
		$get360 = $this->db->query("SELECT * FROM form_360 group by kode_form");
		$jumlah360 = $get360->num_rows() ;
		$data['jumlah360'] = $jumlah360;
		$data['get_company'] = $this->master_model->get_company();

		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/general', $data);
    	$this->load->view('admin/includes/_footer');
	}
	public function filter_company_dashboard(){
		$data['title'] = 'Dashboard';
		$idPerush = $this->input->get('company');
		$data['get_karyawan'] = $this->transaksi_model->get_karyawan_dashboard_sort($idPerush);
		$data['get_jumlah_karyawan'] = $this->master_model->get_jumlah_karyawan();
		$data['get_jumlah_final'] = $this->master_model->get_jumlah_final();
		$data['get_jumlah_spv'] = $this->master_model->get_jumlah_spv();
		$data['get_jumlah_self'] = $this->master_model->get_jumlah_self();
		$get360 = $this->db->query("SELECT * FROM form_360 group by kode_form");
		$jumlah360 = $get360->num_rows() ;
		$data['jumlah360'] = $jumlah360;
		$data['get_company'] = $this->master_model->get_company();
		// var_dump($data);
		// return;

		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/general', $data);
    	$this->load->view('admin/includes/_footer');
	}

	public function send_hr(){
		$this->load->helper('pdf_helper');
		$data['title'] = 'Upcoming Appraisal';
		$data['get_karyawan'] = $this->transaksi_model->get_karyawan_depan();

		$tahun = date('Y');
		$bulan_sekarang = date('m');
		$bulan = $bulan_sekarang+1;
		$tanggal = date('Y-m-d', strtotime('+1 month'));
		$d=cal_days_in_month(CAL_GREGORIAN,$bulan_sekarang,$tahun);

		$tgl_str = substr($tanggal,0,8)."01";
		$tgl_end = substr($tanggal,0,8).$d;
		$periode1 = date('d F Y ', strtotime($tgl_str)).' to '.date('d F Y ', strtotime($tgl_end));
		$data['get_periode']= $periode1;
		// var_dump($data);
		// return;
		$this->load->view('admin/dashboard/generate_upcoming',$data);

		$filename = './uploads/dashboard/Data Appraisal '.$periode1.'.pdf';

		/* ini emailnya */
		$gani	= "gani@pincgroup.id";
		$mala	= "mala@pincgroup.id";
		$gita	= "gita@pincgroup.id";

		$this->load->library('email');
		$from	= "hrd@pincgroup.id";
		$to	= $gani;
		$cc = $mala;
		$bcc = $gita;
		$subject = "Data Appraisal Karyawan";

		$message ="
			<html><body>
			<p>Dear Tim HR,</p>
			<p>Berikut terlampir data karyawan yang akan di apprasial.</p>
			</body></html>";
			

			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->cc($cc);
			$this->email->bcc($bcc);
			// $this->email->cc('gita@pincgroup.id,it@pincgroup.id,mala@pincgroup.id,gani@pincgroup.id');
			$this->email->subject($subject);
			$this->email->set_mailtype("html");
			$this->email->message($message);
			$this->email->attach( $filename);
			try{
			$this->email->send();
				echo 'Message has been sent.';	
			}catch(Exception $e){
				echo $e->getMessage();
			}

			// return;
		echo '<script>
		alert("Data Karyawan Appraisal Berhasil Di Kirim"); 
		</script>';
		redirect('admin/dashboard');
		
	}
	public function index_laporan(){

		$data['title'] = 'Dashboard';
		$data['get_karyawan'] = $this->master_model->get_karyawan();

		$this->load->view('admin/includes/_header', $data);

    	$this->load->view('admin/dashboard/general');

    	$this->load->view('admin/includes/_footer');

	}

	//--------------------------------------------------------------------------






	


}
?>	