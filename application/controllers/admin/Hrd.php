<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Hrd extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); 
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
  	}
	public function index(){
		$data['title'] = 'Table Nilai';
		$data['get_nilai'] = $this->master_model->get_nilai();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/hrd/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function notif(){
		$data['title'] = 'Table Notifikasi';
		$data['get_notif'] = $this->master_model->get_notif();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/hrd/notif', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function kirim_notif(){

		$kode = $this->uri->segment(4);
		$url = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);

		$nama_karyawan = $kode[1];
		$jenis = $kode[2];
		$nama = $kode[3];
		$email = $kode[4];




		$this->load->library('email');
		$from	= "hrd@pincgroup.id";
		// $ellen	= "ellen@pincgroup.id";
		$to	= $email;
		$subject = "Pengingat Pengisian $jenis";
		$message ="
		<html><body>
		<p>Dear $nama,</p>
		<p>Mohon untuk melakukan pengisian Form $jenis terhadap $nama_karyawan<p>
		<p>Apabila terdapat kesulitan dalam pengisian, mohon untuk dapat menghubungi Dept. HR </p>
		</body></html>";
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		//$this->email->cc($ellen);
		$this->email->subject($subject);
		$this->email->set_mailtype("html");
		$this->email->message($message);
		
	try{
		$this->email->send();
		echo 'Message has been sent.';
		}catch(Exception $e){
		echo $e->getMessage();
	}	
	redirect('admin/hrd/notif');

}
	public function add(){
		if($this->input->post('submit')){
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('s_knowledge', 's_knowledge', 'trim|required');
		$this->form_validation->set_rules('s_skills', 's_skills', 'trim|required');
        $this->form_validation->set_rules('s_attitude', 's_attitude', 'trim|required');
		$this->form_validation->set_rules('s_individual', 's_individual', 'trim|required');
        $this->form_validation->set_rules('w_knowledge', 'w_knowledge', 'trim|required');
		$this->form_validation->set_rules('w_skills', 'w_skills', 'trim|required');
        $this->form_validation->set_rules('w_attitude', 'w_attitude', 'trim|required');
		$this->form_validation->set_rules('w_individual', 'w_individual', 'trim|required');
        

        $nik = $this->input->post('nik');
        $tanggal = $this->input->post('tanggal');
        $s_knowledge = $this->input->post('s_knowledge');
        $s_skills = $this->input->post('s_skills');
        $s_attitude = $this->input->post('s_attitude');
        $s_individual = $this->input->post('s_individual');
        $w_knowledge = $this->input->post('w_knowledge');
        $w_skills = $this->input->post('w_skills');
        $w_attitude = $this->input->post('w_attitude');
        $w_individual = $this->input->post('w_individual');
        $s_total = $s_knowledge + $s_attitude + $s_skills + $s_individual;
        $w_total = $w_knowledge + $w_attitude + $w_skills + $w_individual;


		if ($this->form_validation->run() == FALSE) {
		$data = array(
				'errors' => validation_errors()
		);
		$this->session->set_flashdata('errors', $data['errors']);
		redirect(base_url('admin/hrd/add'),'refresh');
		}
		else{
		$data = array(
		'nik' => $nik,
		'tanggal' => $tanggal,
        's_knowledge' => $s_knowledge,
        's_skills' => $s_skills,
        's_attitude' => $s_attitude,
        's_individual' => $s_individual,
        's_total' => $s_total,
        'w_knowledge' => $w_knowledge,
        'w_skills' => $w_skills,
        'w_attitude' => $w_attitude,
        'w_individual' => $w_individual,
        'w_total' => $w_total,
        );
		$result = $this->master_model->add_nilai($data);
		if($result){
				$this->session->set_flashdata('success', 'Data Appraisal added successfully!');
				redirect(base_url('admin/hrd'));
		}
		}
		}
		else{
        $data['get_karyawan'] = $this->master_model->get_karyawan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/hrd/add', $data);
		$this->load->view('admin/includes/_footer');
		}
}
	public function edit(){
		$data['title'] = 'Table Jabatan';
		$id =$this->uri->segment(4);
		$where = array('id' => $id);
		$data['get_nilai'] = $this->master_model->edit_nilai($where,'nilai')->result();
        $data['get_karyawan'] = $this->master_model->get_karyawan();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/hrd/edit', $data);
		$this->load->view('admin/includes/_footer');
	}	
	public function update(){
			$id = $this->input->post('id');
            $nik = $this->input->post('nik');
            $tanggal = $this->input->post('tanggal');
            $s_knowledge = $this->input->post('s_knowledge');
            $s_skills = $this->input->post('s_skills');
            $s_attitude = $this->input->post('s_attitude');
            $s_individual = $this->input->post('s_individual');
            $w_knowledge = $this->input->post('w_knowledge');
            $w_skills = $this->input->post('w_skills');
            $w_attitude = $this->input->post('w_attitude');
            $w_individual = $this->input->post('w_individual');
            $s_total = $s_knowledge + $s_attitude + $s_skills + $s_individual;
            $w_total = $w_knowledge + $w_attitude + $w_skills + $w_individual;
			$data = array(
			'nik' => $nik,
			'tanggal' => $tanggal,
            's_knowledge' => $s_knowledge,
            's_skills' => $s_skills,
            's_attitude' => $s_attitude,
            's_individual' => $s_individual,
            'w_total' => $w_total,
            'w_knowledge' => $w_knowledge,
            'w_skills' => $w_skills,
            'w_attitude' => $w_attitude,
            'w_individual' => $w_individual,
            'w_total' => $w_total,

			);
			$where = array(
				'id' => $id
			);
			$this->master_model->UpdateNilai($where,$data,'nilai');
			redirect('admin/hrd/index');
	}
	public function delete($id = 0)
	{
		$this->db->delete('nilai', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/hrd'));
	}
}
?>
