<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Golongan extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
  	}
	public function index(){
		$data['title'] = 'Table Golongan';
		$data['get_golongan'] = $this->master_model->get_golongan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/golongan/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function add(){
		if($this->input->post('submit')){
		$this->form_validation->set_rules('kode_golongan', 'kode_golongan', 'trim|required');
		$this->form_validation->set_rules('nama_golongan', 'nama_golongan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/golongan/add'),'refresh');
		}
		else{
		$data = array(
		'kode_golongan' => $this->input->post('kode_golongan'),
		'nama_golongan' => $this->input->post('nama_golongan'),
		);
		$result = $this->master_model->add_golongan($data);
		if($result){
				$this->session->set_flashdata('success', 'User has been added successfully!');
				redirect(base_url('admin/golongan'));
		}
		}
		}
		else{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/golongan/add');
		$this->load->view('admin/includes/_footer');
		}
}
	public function edit(){
		$data['title'] = 'Table golongan';
		$id =$this->uri->segment(4);
		$where = array('id' => $id);
		$data['get_golongan'] = $this->master_model->edit_golongan($where,'golongan')->result();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/golongan/edit', $data);
		$this->load->view('admin/includes/_footer');
	}	
	public function update(){
			$id = $this->input->post('id');
			$kode_golongan = $this->input->post('kode_golongan');
			$nama_golongan = $this->input->post('nama_golongan');
			$data = array(
			'kode_golongan' => $kode_golongan,
			'nama_golongan' => $nama_golongan
			);
			$where = array(
				'id' => $id
			);
			$this->master_model->Updategolongan($where,$data,'golongan');
			redirect('admin/golongan/index');
	}
	public function delete($id = 0)
	{
		$this->db->delete('golongan', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/golongan'));
	}
}
?>
