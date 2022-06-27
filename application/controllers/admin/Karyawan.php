<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
  	}
	public function index(){
		$data['title'] = 'Table karyawan';
		$data['get_karyawan'] = $this->master_model->get_karyawan();
		$data['get_company'] = $this->master_model->get_company();
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/karyawan/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function filter_company(){
		$data['title'] = 'Table karyawan';
		$idPerush = $this->input->get('company');
		$TglMulai = $this->input->get('tgl_mulai');
		$TglSampai = $this->input->get('tgl_sampai');
		// var_dump($TglMulai);
		$data['get_karyawan'] = $this->master_model->get_karyawan_filter($idPerush, $TglMulai, $TglSampai);
		$data['get_company'] = $this->master_model->get_company();
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/karyawan/index', $data);
		$this->load->view('admin/includes/_footer');
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
		//$this->form_validation->set_rules('atasan', 'atasan', 'trim|required');
		//$this->form_validation->set_rules('rekan_kerja', 'rekan_kerja', 'trim|required');

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
		'id_departemen' => $this->input->post('id_departemen'),
		'id_jabatan' => $this->input->post('id_jabatan'),
		'id_golongan' => $this->input->post('id_golongan'),
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
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$golongan = $this->input->post('golongan');
			
			$data = array(
			'nama_karyawan' => $nama_karyawan,
			'nik' => $nik,
			'email' => $email,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir,
			'npwp' => $npwp,
			'no_rek' => $no_rek,
			'agama' => $agama,
			'jenis_kelamin' => $jenis_kelamin,
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
			'golongan' => $golongan,
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
}
?>
