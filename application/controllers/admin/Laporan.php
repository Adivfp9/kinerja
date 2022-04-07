<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends MY_Controller {

	public function __construct()
  {
    parent::__construct();
	auth_check(); 
    $this->load->model('admin/join_model', 'join_model');
	$this->load->model('admin/user_model', 'user_model');
	$this->load->model('admin/example_model', 'example_model');
	$this->load->model('admin/master_model', 'master_model');
	$this->load->model('admin/transaksi_model', 'transaksi_model');
	$this->load->library('pagination'); // loaded codeigniter pagination liberary
	$this->load->helper('string'); 
  }

	public function index(){
		$kondisi ="1";
		$where = array('status' => $kondisi);
		$data['get_lowongan'] = $this->join_model->get_lowongan_filter($where,'lowongan')->result_array();
		$data['get_lamaran'] = $this->join_model->get_lamaran();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/laporan/periodik', $data);
		$this->load->view('admin/includes/_footer');
		

	}

	public function periodik(){

		
		
		$data['title'] = 'Dashboard';
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		$data['get_jumlah_karyawan'] = $this->master_model->get_jumlah_karyawan();
		$data['get_jumlah_final'] = $this->master_model->get_jumlah_final();
		$data['get_jumlah_spv'] = $this->master_model->get_jumlah_spv();
		$data['get_jumlah_self'] = $this->master_model->get_jumlah_self();

		$this->load->view('admin/includes/_header', $data);

    	$this->load->view('admin/dashboard/general');

    	$this->load->view('admin/includes/_footer');

	}
	public function executive(){

		
		$data['title'] = 'Dashboard';
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		$data['get_jumlah_karyawan'] = $this->master_model->get_jumlah_karyawan();
		$data['get_jumlah_final'] = $this->master_model->get_jumlah_final();
		$data['get_jumlah_spv'] = $this->master_model->get_jumlah_spv();
		$data['get_jumlah_self'] = $this->master_model->get_jumlah_self();

		$this->load->view('admin/includes/_header', $data);

    	$this->load->view('admin/dashboard/general');

    	$this->load->view('admin/includes/_footer');

	}
	public function periodik_pdf(){

		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['get_periodik'] = $this->join_model->get_periodik();
		$data['get_periodik_jumlah_wawancara'] = $this->join_model->get_periodik_jumlah_wawancara();
		$data['get_periodik_jumlah_lowongan'] = $this->join_model->get_periodik_jumlah_lowongan();
		$data['get_periodik_jumlah_lamaran'] = $this->join_model->get_periodik_jumlah_lamaran();

		$this->load->view('admin/laporan/periodik_pdf', $data);
	}
	
	
    
	public function add(){
		//print $this->input->post('tgl_lamaran');exit;
		
		$kondisi ="1";
		$where = array('status' => $kondisi);
		$data['get_lowongan'] = $this->join_model->get_lowongan_filter($where,'lowongan')->result_array();

		
		if($this->input->post('submit')){
           
			$this->form_validation->set_rules('id_lowongan', 'id_lowongan', 'trim|required');
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
			$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
			$this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
			//$this->form_validation->set_rules('userfile', 'userfile', 'trim|required');
			//$this->form_validation->set_rules('tgl_lamaran', 'tgl_lamaran', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/front/index'),'refresh');
			}
			else{
			
				$data = array(
					
                    'id_lowongan' => $this->input->post('id_lowongan'),
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'email' => $this->input->post('email'),
                    'no_hp' => $this->input->post('no_hp'),
					'pendidikan' => $this->input->post('pendidikan'),
					'gaji' => $this->input->post('gaji'),
					'file' => $this->_uploadImage(),

					'file' => $this->upload->data("file_name"),
					//'file' => $this->input->post('userfile'),
					'tgl_lamaran' => date("d-m-Y"),
				
					
				);
			
				$result = $this->user_model->add_lamaran($data);

			
				if($result){
					$this->session->set_flashdata('success', 'User has been added successfully!');
					redirect(base_url('admin/front'));
				}
			}
		}
		else{
			$this->load->view('admin/front/index');	
		}
	}
	

}
?>
