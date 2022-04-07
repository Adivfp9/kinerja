<?php
	class Master_model extends CI_Model{
// model untuk master departemen
        public function add_departemen($data){
            $this->db->insert('departemen', $data);
            return true;
        }
		public function get_departemen(){
			$this->db->select('*');
			$this->db->from('departemen');
			return $this->db->get()->result_array();
		}
        public function edit_departemen($where,$table){		
			return $this->db->get_where($table,$where);
		}
        public function UpdateDepartemen($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
// akhir model untuk master departemen
// model untuk master jabatan
public function add_jabatan($data){
    $this->db->insert('jabatan', $data);
    return true;
}
public function get_jabatan(){
    $this->db->select('*');
    $this->db->from('jabatan');
    return $this->db->get()->result_array();
}
public function edit_jabatan($where,$table){		
    return $this->db->get_where($table,$where);
}
public function Updatejabatan($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}
// akhir model untuk master jabatan
// model untuk master golongan
public function add_golongan($data){
    $this->db->insert('golongan', $data);
    return true;
}
public function get_golongan(){
    $this->db->select('*');
    $this->db->from('golongan');
    return $this->db->get()->result_array();
}
public function edit_golongan($where,$table){		
    return $this->db->get_where($table,$where);
}
public function Updategolongan($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}
// akhir model untuk master golongan
// model untuk master pertanyaan
public function add_pertanyaan($data){
    $this->db->insert('pertanyaan', $data);
    return true;
}
public function get_pertanyaan(){
    $this->db->select('*');
    $this->db->from('pertanyaan');
    return $this->db->get()->result_array();
}
public function edit_pertanyaan($where,$table){		
    return $this->db->get_where($table,$where);
}
public function Updatepertanyaan($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}
// akhir model untuk master pertanyaan
// model untuk master karyawan
public function add_karyawan($data){
    $this->db->insert('karyawan', $data);
    return true;
}
public function get_karyawan(){
    $this->db->select('*');
    $this->db->from('karyawan');
    return $this->db->get()->result_array();
}
public function edit_karyawan($where,$table){		
    return $this->db->get_where($table,$where);
}
public function Updatekaryawan($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}
// akhir model untuk master karyawan

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
		public function get_lowongan_filter($where,$table){		
			return $this->db->get_where($table,$where);
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

