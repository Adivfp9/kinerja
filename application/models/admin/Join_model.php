<?php
	class Join_model extends CI_Model{
	
		public function get_all_serverside_payments()
	    {
	    	$this->db->select('
	    		ci_payments.id,
				ci_payments.invoice_no,
				ci_payments.grand_total,
				ci_payments.currency,
				ci_payments.created_date,
				ci_users.username as client_name,
				ci_users.email as client_email,
				ci_users.mobile_no as client_mobile_no
	    	');
	    	$this->db->join('ci_users','ci_users.id = ci_payments.user_id','left');
	    	return $this->db->get('ci_payments')->result_array();
	    }


	    public function get_user_payment_details(){
	    	$this->db->select('
	    			ci_payments.id,
	    			ci_payments.invoice_no,
	    			ci_payments.payment_status,
					ci_payments.grand_total,
					ci_payments.currency,
					ci_payments.due_date,
					ci_payments.created_date,
					ci_users.username as client_name,
					ci_users.firstname,
					ci_users.lastname,
					ci_users.email as client_email,
					ci_users.mobile_no as client_mobile_no,
					ci_users.address as client_address,'
	    	);
	    	$this->db->from('ci_payments');
	    	$this->db->join('ci_users', 'ci_users.id = ci_payments.user_id ', 'left');
	    	$query = $this->db->get();					 
			return $query->result_array();
	    }
// bates atas
		public function get_mahasiswa(){
			$this->db->select('*');
			$this->db->from('mahasiswa');
			return $this->db->get()->result_array();
		 
		}

// tambahin
		public function edit_nama_mahasiswa($where,$table){		
			return $this->db->get_where($table,$where);
		}
		public function edit_lowongan($where,$table){		
			return $this->db->get_where($table,$where);
		}
		public function edit_lamaran($where,$table){		
			return $this->db->get_where($table,$where);
		}
		public function edit_wawancara($where,$table){		
			return $this->db->get_where($table,$where);
		}
		public function edit_karyawan($where,$table){		
			return $this->db->get_where($table,$where);
		}
		public function get_jabatan(){
			$this->db->select('*');
			$this->db->from('jabatan');
			return $this->db->get()->result_array();
		}
		public function UpdateMahasiswa($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		public function UpdateLowongan($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		public function Updatewawancara($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		public function UpdateLamaran($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
			public function edit_nama_dosen($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateDosen($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}

			public function edit_nama_jurusan($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateJurusan($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}

			public function edit_nama_ruang($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateRuang($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}
			public function edit_nama_syarat($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateSyarat($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}
			public function edit_angka($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateNilai($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}

			public function edit_nama_status($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateStatus($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}

			public function edit_nama_tahun_akademik($where,$table){		
				return $this->db->get_where($table,$where);
			}
			public function UpdateTahunAkademik($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
			}
	// sampai sini	
		
		//bates bawah

		public function get_dosen(){
			$this->db->select('*');
			$this->db->from('dosen');
			return $this->db->get()->result_array();
			 
		}

		public function get_jurusan(){
			$this->db->select('*');
			$this->db->from('jurusan');
			return $this->db->get()->result_array();
			 
		}
		public function get_lowongan(){
			$this->db->select('*');
			$this->db->from('lowongan');
			return $this->db->get()->result_array();
			 
		}

		
		public function get_wawancara_email($id){
			$query = $this->db->query("SELECT * from wawancara where id_wawancara = '$id'");
			
        	//$result= $query->result();
        	//return $result;
			//$this->db->select('*');
			//$this->db->from('lowongan');
			//return $this->db->get()->result_array();
			 
		}


		public function get_lamaran(){

			$this->db->select ( 'lamaran.*,lowongan.*' )
			->from ( 'lamaran' )
			->join ( 'lowongan', 'lowongan.id_lowongan = lamaran.id_lowongan');
			//$this->db->select('*');
			//$this->db->from('lamaran');
			return $this->db->get()->result_array();
			 
		}
		public function get_periodik(){


			$this->db->select ( 'lamaran.*,lowongan.*,wawancara.*');
			$this->db->from ( 'wawancara' );
			$this->db->join ( 'lamaran', 'lamaran.id_lamaran = wawancara.id_lamaran');
			$this->db->join ( 'lowongan', 'lowongan.id_lowongan = lamaran.id_lowongan');

			return $this->db->get()->result_array();
			 
		}
		public function get_periodik_jumlah_wawancara(){
			$this->db->select ( 'COUNT(id_lamaran) AS jumlah_wawancara');
				$this->db->from ( 'wawancara' );
				return $this->db->get()->result_array();
			}
			public function get_periodik_jumlah_lowongan(){
				$this->db->select ( 'COUNT(id_lowongan) AS jumlah_lowongan');
					$this->db->from ( 'lowongan' );
					return $this->db->get()->result_array();
				}

				public function get_periodik_jumlah_lamaran(){
					$this->db->select ( 'COUNT(id_lamaran) AS jumlah_lamaran');
						$this->db->from ( 'lamaran' );
						return $this->db->get()->result_array();
					}
		public function get_wawancara(){

			$this->db->select ( 'wawancara.*,lamaran.*' )
			->from ( 'wawancara' )
			->join ( 'lamaran', 'lamaran.id_lamaran = wawancara.id_lamaran');
			//$this->db->select('*');
			//$this->db->from('lamaran');
			return $this->db->get()->result_array();
			 
		}

		public function get_all_fruits() 
    { 
        return $this->db->get('Fruits')->result(); 
    } 
	public function get_all_lamaran() 
    { 
        return $this->db->get('lamaran')->result(); 
    } 

		public function get_ruang(){
			$this->db->select('*');
			$this->db->from('ruang');
			return $this->db->get()->result_array();
			 
		}
		public function get_syarat(){
			$this->db->select('*');
			$this->db->from('syarat');
			return $this->db->get()->result_array();
			 
		}

		public function get_nilai(){
			$this->db->select('*');
			$this->db->from('nilai');
			return $this->db->get()->result_array();
			 
		}

		public function get_status(){
			$this->db->select('*');
			$this->db->from('status');
			return $this->db->get()->result_array();
			 
		}

		public function get_tahun_akademik(){
			$this->db->select('*');
			$this->db->from('tahun_akademik');
			return $this->db->get()->result_array();
			 
		}
	}

?>

