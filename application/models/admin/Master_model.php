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

public function add_nilai($data){
    $this->db->insert('nilai', $data);
    return true;
}
public function add_final_app($data){
    $this->db->insert('final_appraisal', $data);
    return true;
}
public function get_nilai(){
    $this->db->select('karyawan.*,nilai.*,karyawan.nama_karyawan as namakar');
    $this->db->from('nilai');
	$this->db->join('karyawan', 'karyawan.nik = nilai.nik', 'inner');
	$this->db->order_by("karyawan.nama_karyawan", "asc");
    return $this->db->get()->result_array();
}


public function get_notif(){
    $this->db->select('*');
    $this->db->from('notice');
    $this->db->where('status','1');
    return $this->db->get()->result_array();
}
public function get_jabatan(){
    $this->db->select('*');
    $this->db->from('jabatan');
    return $this->db->get()->result_array();
}
public function edit_jabatan($where,$table){		
    return $this->db->get_where($table,$where);
}
public function edit_nilai($where,$table){		
    return $this->db->get_where($table,$where);
}
public function Updatejabatan($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}

public function UpdateNilai($where,$data,$table){
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
public function count_karyawan(){
    $this->db->select('count(*) as jumlah_karyawan');
    $this->db->from('karyawan');
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
    $this->db->select('*,karyawan.id as id_karyawan,perusahaan.*,golongan.*');
    $this->db->from('karyawan');
	$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
	$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
	$this->db->join('golongan', 'golongan.kode_golongan = karyawan.id_golongan', 'inner');
	$this->db->join('perusahaan', 'perusahaan.id_perusahaan = karyawan.id_perusahaan', 'inner');
    $this->db->order_by("karyawan.nama_karyawan", "asc");
    return $this->db->get()->result_array();
}

public function get_karyawan_byinisial($key){
    $this->db->select('*,karyawan.id as id_karyawan,perusahaan.*,golongan.*');
    $this->db->from('karyawan');
	$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
	$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
	$this->db->join('golongan', 'golongan.kode_golongan = karyawan.id_golongan', 'inner');
	$this->db->join('perusahaan', 'perusahaan.id_perusahaan = karyawan.id_perusahaan', 'inner')->where('karyawan.inisial', $key);
    return $this->db->get()->result_array();
}

public function get_karyawan_filter($idperush, $tglmulai, $tglsampai){
    $this->db->select('*,karyawan.id as id_karyawan,perusahaan.*,golongan.*');
    $this->db->from('karyawan');
	$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
	$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
	$this->db->join('golongan', 'golongan.kode_golongan = karyawan.id_golongan', 'inner');
	$this->db->join('perusahaan', 'perusahaan.id_perusahaan = karyawan.id_perusahaan', 'inner')->where('perusahaan.id_perusahaan',$idperush);
    
    $this->db->where('karyawan.tgl_appraisal >=', $tglmulai)
    ->where('karyawan.tgl_appraisal <=', $tglsampai)->order_by("karyawan.nama_karyawan", "asc");
    return $this->db->get()->result_array();
}
public function get_final_spv(){
    $key = 4;
    $this->db->select('*, karyawan.id as id_karyawan,karyawan.id_jabatan as id_jabatan');
    $this->db->from('karyawan');
	$this->db->join('departemen', 'departemen.kode_departemen = karyawan.id_departemen', 'inner');
	$this->db->join('jabatan', 'jabatan.kode_jabatan = karyawan.id_jabatan', 'inner')->where('karyawan.mark', $key)->order_by("karyawan.nama_karyawan", "asc");
    return $this->db->get()->result_array();
}

public function get_karyawan_depan(){
    $tahunx = date('Y');
    $bulan_sekarang = date('m');
    if($bulan_sekarang>11)
    { 
        $bulan = "01";
        $tahun = $tahunx+1;

    }else{
      $bulan = $bulan_sekarang+1;
      $tahun = $tahunx;
    }  
	
    $this->db->select('*,karyawan.id as id_karyawan');
    $this->db->from('karyawan');
	$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
$this->db->join('perusahaan', 'perusahaan.id = karyawan.id_perusahaan', 'inner');
	$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
	$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
    $this->db->like('karyawan.tgl_appraisal', "$tahun-$bulan", 'after');
	//$this->db->where('karyawan.tgl_appraisal','2021-12-01');
$this->db->order_by("karyawan.id_perusahaan", "asc");
    return $this->db->get()->result_array();
}
public function get_karyawanxxx(){
    $this->db->select('*');
    $this->db->from('karyawan');
    $this->db->where('mark','4');

    return $this->db->get()->result_array();
}
public function get_final_appx(){
    $this->db->select('*');
    $this->db->from('karyawan');

	$this->db->join('final_appraisal', 'final_appraisal.id_karyawan = karyawan.id', 'inner');
	
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

// model master company //
public function get_company(){
    $this->db->select('*');
    $this->db->from('perusahaan')->where('pic_email <>', '');
    return $this->db->get()->result_array();
}

// form 360 model //
public function get_pertanyaan_360($where,$table){		
	return $this->db->get_where($table,$where);
}

public function get_all_fruits() 
{ 
        return $this->db->get('Fruits')->result(); 
} 
public function get_status(){
			$this->db->select('*');
			$this->db->from('status');
			return $this->db->get()->result_array();
}
public function get_jumlah_karyawan(){
    $this->db->select ( 'COUNT(*) AS jumlah_karyawan');
        $this->db->from ( 'karyawan' );
        return $this->db->get()->result_array();
    }

    public function get_jumlah_final(){
        $this->db->select ( '*');
            $this->db->from ( 'final_appraisal' );
            return $this->db->get()->num_rows();
        }
        public function get_jumlah_360(){
            $this->db->select('*');
            $this->db->from('form_360');
            $this->db->group_by('kode_form');
            return $this->db->get()->result_array();
            // $this->db->select ( 'COUNT(*) AS jumlah_spv');
            //     $this->db->from ( 'spv_appraisal' );
            //     $this->db->group_by('id_karyawan'); 
            //     return $this->db->get()->result_array();
            }

        public function get_jumlah_spv(){
            $this->db->select('COUNT(*) AS jumlah_spv');
            $this->db->from('spv_appraisal');
            $this->db->group_by('id_karyawan');
            return $this->db->get()->num_rows();
            // $this->db->select ( 'COUNT(*) AS jumlah_spv');
            //     $this->db->from ( 'spv_appraisal' );
            //     $this->db->group_by('id_karyawan'); 
            //     return $this->db->get()->result_array();
            }

            public function get_jumlah_self(){
                $this->db->select('COUNT(*) AS jumlah_self');
                $this->db->from('self_appraisal');
                $this->db->group_by('id_karyawan');
                return $this->db->get()->num_rows();
                // $this->db->select ( 'COUNT(*) AS jumlah_self');
                //     $this->db->from ( 'self_appraisal' );
                //     $this->db->group_by('id_karyawan'); 
                //     return $this->db->get()->result_array();
                }

		
}

?>

