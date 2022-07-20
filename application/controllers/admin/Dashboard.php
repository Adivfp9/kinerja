<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends My_Controller {



	public function __construct(){

		parent::__construct();

		auth_check(); // check login auth

		$this->rbac->check_module_access();

		if($this->uri->segment(3) != '')
		$this->rbac->check_operation_access();

		$this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/transaksi_model', 'transaksi_model');

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


		// var_dump($data);
		// return ;	

		$this->load->view('admin/includes/_header');

    	$this->load->view('admin/dashboard/general', $data);

    	$this->load->view('admin/includes/_footer');

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