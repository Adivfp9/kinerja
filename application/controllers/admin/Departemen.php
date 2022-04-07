<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Departemen extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
  	}
	public function index(){
		$data['title'] = 'Table Departemen';
		$data['get_departemen'] = $this->master_model->get_departemen();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/departemen/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function add(){
		if($this->input->post('submit')){
		$this->form_validation->set_rules('kode_departemen', 'kode_departemen', 'trim|required');
		$this->form_validation->set_rules('nama_departemen', 'nama_departemen', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/departemen/add'),'refresh');
		}
		else{
		$data = array(
		'kode_departemen' => $this->input->post('kode_departemen'),
		'nama_departemen' => $this->input->post('nama_departemen'),
		);
		$result = $this->master_model->add_departemen($data);
		if($result){
				$this->session->set_flashdata('success', 'User has been added successfully!');
				redirect(base_url('admin/departemen'));
		}
		}
		}
		else{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/departemen/add');
		$this->load->view('admin/includes/_footer');
		}
}
	public function edit(){
		$data['title'] = 'Table Departemen';
		$id =$this->uri->segment(4);
		$where = array('id' => $id);
		$data['get_departemen'] = $this->master_model->edit_departemen($where,'departemen')->result();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/departemen/edit', $data);
		$this->load->view('admin/includes/_footer');
	}	
	public function update(){
			$id = $this->input->post('id');
			$kode_departemen = $this->input->post('kode_departemen');
			$nama_departemen = $this->input->post('nama_departemen');
			$data = array(
			'kode_departemen' => $kode_departemen,
			'nama_departemen' => $nama_departemen
			);
			$where = array(
				'id' => $id
			);
			$this->master_model->UpdateDepartemen($where,$data,'departemen');
			redirect('admin/departemen/index');
	}
	public function delete($id = 0)
	{
		$this->db->delete('departemen', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/departemen'));
	}
}
?>
