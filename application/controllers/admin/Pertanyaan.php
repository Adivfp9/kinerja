<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pertanyaan extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
  	}
	public function index(){
		$data['title'] = 'Table Pertanyaan';
		$data['get_pertanyaan'] = $this->master_model->get_pertanyaan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/pertanyaan/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function add(){
		if($this->input->post('submit')){
		$this->form_validation->set_rules('kategori_pertanyaan', 'kategori_pertanyaan', 'trim|required');
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/pertanyaan/add'),'refresh');
		}
		else{
		$data = array(
		'kategori_pertanyaan' => $this->input->post('kategori_pertanyaan'),
		'pertanyaan' => $this->input->post('pertanyaan'),
		);
		$result = $this->master_model->add_pertanyaan($data);
		if($result){
				$this->session->set_flashdata('success', 'User has been added successfully!');
				redirect(base_url('admin/pertanyaan'));
		}
		}
		}
		else{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/pertanyaan/add');
		$this->load->view('admin/includes/_footer');
		}
}
	public function edit(){
		$data['title'] = 'Table Pertanyaan';
		$id =$this->uri->segment(4);
		$where = array('id' => $id);
		$data['get_pertanyaan'] = $this->master_model->edit_pertanyaan($where,'pertanyaan')->result();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/pertanyaan/edit', $data);
		$this->load->view('admin/includes/_footer');
	}	
	public function update(){
			$id = $this->input->post('id');
			$kategori_pertanyaan = $this->input->post('kategori_pertanyaan');
			$pertanyaan = $this->input->post('pertanyaan');
			$data = array(
			'kategori_pertanyaan' => $kategori_pertanyaan,
			'pertanyaan' => $pertanyaan
			);
			$where = array(
				'id' => $id
			);
			$this->master_model->Updatepertanyaan($where,$data,'pertanyaan');
			redirect('admin/pertanyaan/index');
	}
	public function delete($id = 0)
	{
		$this->db->delete('pertanyaan', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/pertanyaan'));
	}
}
?>
