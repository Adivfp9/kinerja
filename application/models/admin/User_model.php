<?php
	class User_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('ci_users', $data);
			return true;
		}

		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_users(){
			$this->db->select('*');
			$this->db->where('is_admin',0);
			return $this->db->get('ci_users')->result_array();
		}


		//---------------------------------------------------
		// Get user detial by ID
		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit user Record
		public function edit_user($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_users', $data);
			return true;
		}

		//---------------------------------------------------
		// Change user status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ci_users');
		} 
// tambahin
		public function add_mahasiswa($data){
			$this->db->insert('mahasiswa', $data);
			return true;
		}
		public function add_lowongan($data){
			$this->db->insert('lowongan', $data);
			return true;
		}
		public function add_wawancara($data){
			$this->db->insert('wawancara', $data);
			return true;
		}
		public function add_lamaran($data){
			$this->db->insert('lamaran', $data);
			return true;
		}
		public function add_karyawan($data){
			$this->db->insert('id', $data);
			return true;
		}

		public function add_dosen($data){
			$this->db->insert('dosen', $data);
			return true;
		}

		public function add_jurusan($data){
			$this->db->insert('jurusan', $data);
			return true;
		}

		public function add_ruang($data){
			$this->db->insert('ruang', $data);
			return true;
		}

		public function add_syarat($data){
			$this->db->insert('syarat', $data);
			return true;
		}

		public function add_nilai($data){
			$this->db->insert('nilai', $data);
			return true;
		}

		public function add_status($data){
			$this->db->insert('status', $data);
			return true;
		}

		public function add_tahun_akademik($data){
			$this->db->insert('tahun_akademik', $data);
			return true;
		}

		// sampe sini

	}

?>