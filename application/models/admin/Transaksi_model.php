<?php
	class Transaksi_model extends CI_Model{

		public function get_email_rekan($rekan_kerja){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('inisial',$rekan_kerja);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_depan(){
    $tahun = date('Y');
    $bulan_sekarang = date('m');
	$bulan = $bulan_sekarang+1;

	
    $this->db->select('*,karyawan.id as id_karyawan');
    $this->db->from('karyawan');
	$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
$this->db->join('perusahaan', 'perusahaan.id = karyawan.id_perusahaan', 'inner');
	$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
	$this->db->join('golongan', 'golongan.kode_golongan = karyawan.id_golongan', 'inner');
    $this->db->like('karyawan.tgl_appraisal', "$tahun-0$bulan", 'after');
	//$this->db->where('karyawan.tgl_appraisal','2021-12-01');
$this->db->order_by("karyawan.id_perusahaan", "asc");
    return $this->db->get()->result_array();
}
		public function get_email_atasan_int($atasan){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('inisial',$atasan);
			return $this->db->get()->result_array();
		}

		public function get_email_rekan2($rekan_kerja2){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('inisial',$rekan_kerja2);
			return $this->db->get()->result_array();
		}
		public function get_email_rekan3($rekan_kerja3){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('inisial',$rekan_kerja3);
			return $this->db->get()->result_array();
		}
		public function get_pertanyaan_360_rekan($rekan_kerja){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('inisial',$rekan_kerja);
			return $this->db->get()->result_array();
		}

		public function get_score($nik){
			$this->db->select('*');
			$this->db->from('nilai');
			$this->db->where('nik',$nik);
			return $this->db->get()->result_array();
		}
		public function get_pertanyaan_360($kondisi){
			$this->db->select('*');
			$this->db->from('pertanyaan');
			$this->db->where('kategori_pertanyaan',$kondisi);
			return $this->db->get()->result_array();
		}
		public function get_pertanyaan_360_per($kondisi1){
			$this->db->select('*');
			$this->db->from('pertanyaan');
			$this->db->where('kategori_pertanyaan',$kondisi1);
			return $this->db->get()->result_array();
		}
		public function get_pertanyaan_360_att($kondisi2){
			$this->db->select('*');
			$this->db->from('pertanyaan');
			$this->db->where('kategori_pertanyaan',$kondisi2);
			return $this->db->get()->result_array();
		}

		public function get_pertanyaan_self_know($kondisi1){
			$this->db->select('*');
			$this->db->from('pertanyaan');
			$this->db->where('kategori_pertanyaan',$kondisi1);
			return $this->db->get()->result_array();
		}

		public function get_pertanyaan_spv_know($kondisi1,$kode){
			$this->db->select('self_appraisal.*,pertanyaan.*');
			$this->db->from('self_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = self_appraisal.id_pertanyaan', 'inner');
			$this->db->where('self_appraisal.jenis_form',$kondisi1);
			$this->db->where('self_appraisal.kode_form',$kode);
			return $this->db->get()->result_array();
		}

		public function get_pertanyaan_spv_skills($kondisi2,$kode){
			$this->db->select('self_appraisal.*,pertanyaan.*');
			$this->db->from('self_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = self_appraisal.id_pertanyaan', 'inner');
			$this->db->where('self_appraisal.jenis_form',$kondisi2);
			$this->db->where('self_appraisal.kode_form',$kode);
			return $this->db->get()->result_array();
		}

		public function get_pertanyaan_self_skills($kondisi2){
			$this->db->select('*');
			$this->db->from('pertanyaan');
			$this->db->where('kategori_pertanyaan',$kondisi2);
			return $this->db->get()->result_array();
		}

		public function get_pertanyaan_self_attitude($kondisi3){
			$this->db->select('*');
			$this->db->from('pertanyaan');
			$this->db->where('kategori_pertanyaan',$kondisi3);
			return $this->db->get()->result_array();
		}
		public function get_pertanyaan_spv_attitude($kondisi3,$kode){
			$this->db->select('self_appraisal.*,pertanyaan.*');
			$this->db->from('self_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = self_appraisal.id_pertanyaan', 'inner');
			$this->db->where('self_appraisal.jenis_form',$kondisi3);
			$this->db->where('self_appraisal.kode_form',$kode);
			return $this->db->get()->result_array();
		}
		


		
		public function get_email_atasan($atasan){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('nama_karyawan',$atasan);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360($id_karyawan){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('form_360', 'form_360.id_karyawan = karyawan.id', 'inner');
			$this->db->where('karyawan.id',$id_karyawan);
			
			$this->db->group_by('karyawan.id');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai($id_karyawan){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('form_360', 'form_360.id_karyawan = karyawan.id', 'inner');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			
			$this->db->where('karyawan.id',$id_karyawan);
		
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai_per($kode_form){
			$this->db->select('*');
			$this->db->from('form_360');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('form_360.kode_form',$kode_form);
			$this->db->where('form_360.id_pertanyaan<','5');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai_per2($kode_form2){
			$this->db->select('*');
			$this->db->from('form_360');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('form_360.kode_form',$kode_form2);
			$this->db->where('form_360.id_pertanyaan<','5');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai_per3($kode_form3){
			$this->db->select('*');
			$this->db->from('form_360');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('form_360.kode_form',$kode_form3);
			$this->db->where('form_360.id_pertanyaan<','5');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai_att($kode_form){
			$this->db->select('*');
			$this->db->from('form_360');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('form_360.kode_form',$kode_form);
			$this->db->where('form_360.id_pertanyaan>','4');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai_att2($kode_form2){
			$this->db->select('*');
			$this->db->from('form_360');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('form_360.kode_form',$kode_form2);
			$this->db->where('form_360.id_pertanyaan>','4');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_360_nilai_att3($kode_form3){
			$this->db->select('*');
			$this->db->from('form_360');
			$this->db->join('pertanyaan', 'form_360.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('form_360.kode_form',$kode_form3);
			$this->db->where('form_360.id_pertanyaan>','4');
			return $this->db->get()->result_array();
		}
		
		public function get_masukan_360($kode_form){
			$this->db->select('DISTINCT(masukan)');
			$this->db->from('form_360');
			$this->db->where('form_360.kode_form',$kode_form);
			return $this->db->get()->result_array();
		}
		public function get_masukan_3602($kode_form2){
			$this->db->select('DISTINCT(masukan)');
			$this->db->from('form_360');
			$this->db->where('form_360.kode_form',$kode_form2);
			return $this->db->get()->result_array();
		}
		public function get_masukan_3603($kode_form3){
			$this->db->select('DISTINCT(masukan)');
			$this->db->from('form_360');
			$this->db->where('form_360.kode_form',$kode_form3);
			return $this->db->get()->result_array();
		}
		public function hitung_360_per($inisial,$kode_form){
			$this->db->select_sum('nilai');
			$this->db->from('form_360');
			$this->db->where('form_360.inisial',$inisial);
			$this->db->where('form_360.id_pertanyaan<','5');
			$this->db->where('form_360.kode_form',$kode_form);
		
			return $this->db->get()->result_array();
		}
		public function hitung_360_per2($inisial,$kode_form2){
			$this->db->select_sum('nilai');
			$this->db->from('form_360');
			$this->db->where('form_360.inisial',$inisial);
			$this->db->where('form_360.id_pertanyaan<','5');
			$this->db->where('form_360.kode_form',$kode_form2);
		
			return $this->db->get()->result_array();
		}
		public function hitung_360_per3($inisial,$kode_form3){
			$this->db->select_sum('nilai');
			$this->db->from('form_360');
			$this->db->where('form_360.inisial',$inisial);
			$this->db->where('form_360.id_pertanyaan<','5');
			$this->db->where('form_360.kode_form',$kode_form3);
		
			return $this->db->get()->result_array();
		}
		public function hitung_360_att($inisial,$kode_form){
			$this->db->select_sum('nilai');
			$this->db->from('form_360');
			$this->db->where('form_360.inisial',$inisial);
			$this->db->where('form_360.id_pertanyaan>','4');
			$this->db->where('form_360.kode_form',$kode_form);
		
			return $this->db->get()->result_array();
		}
		public function hitung_360_att2($inisial,$kode_form2){
			$this->db->select_sum('nilai');
			$this->db->from('form_360');
			$this->db->where('form_360.inisial',$inisial);
			$this->db->where('form_360.id_pertanyaan>','4');
			$this->db->where('form_360.kode_form',$kode_form2);
		
			return $this->db->get()->result_array();
		}
		public function hitung_360_att3($inisial,$kode_form3){
			$this->db->select_sum('nilai');
			$this->db->from('form_360');
			$this->db->where('form_360.inisial',$inisial);
			$this->db->where('form_360.id_pertanyaan>','4');
			$this->db->where('form_360.kode_form',$kode_form3);
		
			return $this->db->get()->result_array();
		}
		// public function get_id_rekan_kerja($inisial,$kode_form){
		// 	$this->db->select('*');
		// 	$this->db->from('karyawan');
		// 	$this->db->where('nama_karyawan',$atasan);
		// 	return $this->db->get()->result_array();
		// }
		public function get_karyawan(){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('form_360', 'form_360.id_karyawan = karyawan.id', 'inner');
			$this->db->group_by('karyawan.id');
			return $this->db->get()->result_array();
		}

		public function hasil_360(){
			$this->db->select('DISTINCT(kode_form),inisial,posisi,rekan,tgl_appraisal,posisi,kode_form,team');
			$this->db->from('form_360');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_ss_self(){
			$this->db->select('*,karyawan.id as id_karyawan,karyawan.tgl_appraisal as tgl_appraisal');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.kode_golongan = karyawan.id_golongan', 'inner');
			$this->db->join('self_appraisal', 'self_appraisal.id_karyawan = karyawan.id', 'inner');
			$this->db->group_by('karyawan.id');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_ss_spv(){
			$this->db->select('*,karyawan.id as id_karyawan,karyawan.tgl_appraisal as tng_app');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('spv_appraisal', 'spv_appraisal.id_karyawan = karyawan.id', 'inner');
			$this->db->group_by('karyawan.id');
			return $this->db->get()->result_array();
		}
		public function get_karyawan_self_nilai($id_karyawan){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('self_appraisal', 'self_appraisal.id_karyawan = karyawan.id', 'inner');
			$this->db->join('pertanyaan', 'self_appraisal.id_pertanyaan= pertanyaan.id', 'inner');
			$this->db->where('karyawan.id',$id_karyawan);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_self_know($kondisi1,$kode){
			$this->db->select('self_appraisal.*,pertanyaan.*');
			$this->db->from('self_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = self_appraisal.id_pertanyaan', 'inner');
			$this->db->where('self_appraisal.kode_form',$kode);
			$this->db->where('self_appraisal.jenis_form',$kondisi1);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_spv_know($kondisi1,$kode){
			$this->db->select('spv_appraisal.*,pertanyaan.*');
			$this->db->from('spv_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = spv_appraisal.id_pertanyaan', 'inner');
			$this->db->where('spv_appraisal.kode_form',$kode);
			$this->db->where('spv_appraisal.jenis_form',$kondisi1);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_self_skills($kondisi2,$kode){
			$this->db->select('self_appraisal.*,pertanyaan.*');
			$this->db->from('self_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = self_appraisal.id_pertanyaan', 'inner');
			$this->db->where('self_appraisal.kode_form',$kode);
			$this->db->where('self_appraisal.jenis_form',$kondisi2);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_spv_skills($kondisi2,$kode){
			$this->db->select('spv_appraisal.*,pertanyaan.*');
			$this->db->from('spv_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = spv_appraisal.id_pertanyaan', 'inner');
			$this->db->where('spv_appraisal.kode_form',$kode);
			$this->db->where('spv_appraisal.jenis_form',$kondisi2);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_self_att($kondisi3,$kode){
			$this->db->select('self_appraisal.*,pertanyaan.*');
			$this->db->from('self_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = self_appraisal.id_pertanyaan', 'inner');
			$this->db->where('self_appraisal.kode_form',$kode);
			$this->db->where('self_appraisal.jenis_form',$kondisi3);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_self_other($kondisi4,$kode){
			$this->db->select('self_appraisal.*');
			$this->db->from('self_appraisal');
		
			$this->db->where('self_appraisal.kode_form',$kode);
			$this->db->where('self_appraisal.jenis_form',$kondisi4);
			return $this->db->get()->result_array();
		}
		public function get_karyawan_spv_att($kondisi3,$kode){
			$this->db->select('spv_appraisal.*,pertanyaan.*');
			$this->db->from('spv_appraisal');
			$this->db->join('pertanyaan', 'pertanyaan.id = spv_appraisal.id_pertanyaan', 'inner');
			$this->db->where('spv_appraisal.kode_form',$kode);
			$this->db->where('spv_appraisal.jenis_form',$kondisi3);
			return $this->db->get()->result_array();
		}

		

	
		public function hitung_self_know($kondisi1,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('self_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi1);
			return $this->db->get()->result_array();
		}
		public function hitung_self_other($kondisi4,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('self_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi4);
			return $this->db->get()->result_array();
		}
		public function hitung_spv_know($kondisi1,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('spv_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi1);
			return $this->db->get()->result_array();
		}
		public function hitung_self_skills($kondisi2,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('self_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi2);
			return $this->db->get()->result_array();
		}
		public function hitung_spv_skills($kondisi2,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('spv_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi2);
			return $this->db->get()->result_array();
		}

		public function hitung_self_attitude($kondisi3,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('self_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi3);
			return $this->db->get()->result_array();
		}
		public function hitung_spv_attitude($kondisi3,$kode){
			$this->db->select('count(nilai) as jumlah,sum(nilai) as nilai');
			$this->db->from('spv_appraisal');
			$this->db->where('kode_form',$kode);
			$this->db->where('jenis_form',$kondisi3);
			return $this->db->get()->result_array();
		}


	
		public function get_karyawan_spv_nilai($id_karyawan){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('self_appraisal', 'self_appraisal.id_karyawan = karyawan.id', 'inner');
			$this->db->join('pertanyaan', 'self_appraisal.id_pertanyaan= pertanyaan.id', 'inner');
			
			$this->db->where('karyawan.id',$id_karyawan);
		
			return $this->db->get()->result_array();
		}
		public function get_karyawan_self($id_karyawan){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('self_appraisal', 'self_appraisal.id_karyawan = karyawan.id', 'inner');
			$this->db->where('karyawan.id',$id_karyawan);
			$this->db->group_by('karyawan.id');
			return $this->db->get()->result_array();
		}

		public function get_karyawan_spv($id_karyawan){
			$this->db->select('*,karyawan.id as id_karyawan');
			$this->db->from('karyawan');
			$this->db->join('departemen', 'departemen.id = karyawan.id_departemen', 'inner');
			$this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan', 'inner');
			$this->db->join('golongan', 'golongan.id = karyawan.id_golongan', 'inner');
			$this->db->join('spv_appraisal', 'spv_appraisal.id_karyawan = karyawan.id', 'inner');
			
			$this->db->where('karyawan.id',$id_karyawan);
			$this->db->group_by('karyawan.id');
			return $this->db->get()->result_array();
		}

		


		
	}

?>

