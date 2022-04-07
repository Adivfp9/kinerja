<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jabatan extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
  	}
	public function index(){
		$data['title'] = 'Table Jabatan';
		$data['get_jabatan'] = $this->master_model->get_jabatan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/jabatan/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function add(){
		if($this->input->post('submit')){
		$this->form_validation->set_rules('kode_jabatan', 'kode_jabatan', 'trim|required');
		$this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/jabatan/add'),'refresh');
		}
		else{
		$data = array(
		'kode_jabatan' => $this->input->post('kode_jabatan'),
		'nama_jabatan' => $this->input->post('nama_jabatan'),
		);
		$result = $this->master_model->add_jabatan($data);
		if($result){
				$this->session->set_flashdata('success', 'User has been added successfully!');
				redirect(base_url('admin/jabatan'));
		}
		}
		}
		else{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/jabatan/add');
		$this->load->view('admin/includes/_footer');
		}
}
	public function edit(){
		$data['title'] = 'Table Jabatan';
		$id =$this->uri->segment(4);
		$where = array('id' => $id);
		$data['get_jabatan'] = $this->master_model->edit_jabatan($where,'jabatan')->result();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/jabatan/edit', $data);
		$this->load->view('admin/includes/_footer');
	}	
	public function update(){
			$id = $this->input->post('id');
			$kode_jabatan = $this->input->post('kode_jabatan');
			$nama_jabatan = $this->input->post('nama_jabatan');
			$data = array(
			'kode_jabatan' => $kode_jabatan,
			'nama_jabatan' => $nama_jabatan
			);
			$where = array(
				'id' => $id
			);
			$this->master_model->Updatejabatan($where,$data,'jabatan');
			redirect('admin/jabatan/index');
	}
	public function delete($id = 0)
	{
		$this->db->delete('jabatan', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/jabatan'));
	}
}
?>
