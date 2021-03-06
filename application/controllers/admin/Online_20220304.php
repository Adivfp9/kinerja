<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Online extends MY_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('admin/auth_model', 'auth_model');
		$this->load->model('admin/join_model', 'join_model');
		$this->load->model('admin/master_model', 'master_model');
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/transaksi_model', 'transaksi_model');
	}
	public function tigaenampuluh(){
		$kondisi2 ="360_att";
		$kondisi1 ="360_per";
		$kode = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
		$id_karyawan = $kode[1];
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$jabatan = $kode[5];
		$inisial = $kode[6];
		$kode = $kode[7];
		$data['get_pertanyaan_360_rekan'] = $this->transaksi_model->get_pertanyaan_360_rekan($rekan_kerja);
		$data['get_pertanyaan_360_per'] = $this->transaksi_model->get_pertanyaan_360_per($kondisi1);
		$data['get_pertanyaan_360_att'] = $this->transaksi_model->get_pertanyaan_360_att($kondisi2);

		// Query hitung jumlah pertanyaan masing2 kondisi
		$sql = "select * from pertanyaan where kategori_pertanyaan='$kondisi1'";
		$data['jml_360per']= $this->db->query($sql)->num_rows();

		$sql2 = "select * from pertanyaan where kategori_pertanyaan='$kondisi2'";
		$data['jml_360att']= $this->db->query($sql2)->num_rows();

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/online/tigaenampuluh', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function self(){
		$kondisi ="self ";
		
		$where = array('kategori_pertanyaan' => $kondisi);
		$data['get_pertanyaan_360'] = $this->master_model->get_pertanyaan_360($where,'pertanyaan')->result_array();

		$kode = $this->uri->segment(4);
		$kode = base64_decode($kode);
		$kode = explode('+', $kode);
	
		$id_karyawan = $kode[1];
		$rekan_kerja = $kode[2];
		$nama_karyawan = $kode[3];
		$atasan = $kode[4];
		$nama_departemen = $kode[5];
		$email = $kode[6];
		$jabatan = $kode[7];
		$kode_form = $kode[8];
		$id_jabatan = $kode[9];
		$query = $this->db->query("select * from master_form where id_jabatan='$id_jabatan'");

		foreach ($query->result() as $row)
		{
			$kondisi1=  $row->kondisi1;
			$kondisi2= $row->kondisi2;
			$kondisi3= $row->kondisi3;
				
		}

		$query = $this->db->query("select * from karyawan where id='$id_karyawan'");

		foreach ($query->result() as $row23)
		{
			$nik=  $row23->nik;
			
		}

	
		$data['get_score'] = $this->transaksi_model->get_score($nik);
		$data['get_pertanyaan_360_rekan'] = $this->transaksi_model->get_pertanyaan_360_rekan($rekan_kerja);
		$data['get_pertanyaan_360'] = $this->transaksi_model->get_pertanyaan_360($kondisi);
		$data['get_pertanyaan_self_know'] = $this->transaksi_model->get_pertanyaan_self_know($kondisi1);
		$data['get_pertanyaan_self_skills'] = $this->transaksi_model->get_pertanyaan_self_skills($kondisi2);
		$data['get_pertanyaan_self_attitude'] = $this->transaksi_model->get_pertanyaan_self_attitude($kondisi3);
	
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/online/self', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function spv(){

		
		$kondisi ="self ";
		$where = array('kategori_pertanyaan' => $kondisi);
		$data['get_pertanyaan_360'] = $this->master_model->get_pertanyaan_360($where,'pertanyaan')->result_array();
		
		
		$kode = $this->uri->segment(4);
		$kode = base64_decode($kode);
		//print $kode;exit;

		$kode = explode('+', $kode);
		//print $kode[7];exit;
		$tanggal_appraisal = $kode[14];
		$nama_karyawan = $kode[6];
		$atasan = $kode[7];
		$id_karyawan = $kode[1];
		$rekan_kerja = $kode[2];
		

		$nama_departemen = $kode[5];
		$email = $kode[6];
		$jabatan = $kode[7];
		$kode_form = $kode[8];
		$id_jabatan = $kode[15];
		$kode = "$tanggal_appraisal$nama_karyawan$atasan";
		//print $kode;exit;

		
	
		
		$query = $this->db->query("select * from master_form where id_jabatan='$id_jabatan'");
		foreach ($query->result() as $row)
		{
				$kondisi1=  $row->kondisi1;
				$kondisi2= $row->kondisi2;
				$kondisi3= $row->kondisi3;
		}

		$query = $this->db->query("SELECT DISTINCT summary, action FROM self_appraisal WHERE kode_form='$kode'");

		foreach ($query->result() as $row5)
		{
			$data['summary']=  $row5->summary;
			$data['action']= $row5->action;		
		}
		
		$data['get_pertanyaan_360_rekan'] = $this->transaksi_model->get_pertanyaan_360_rekan($rekan_kerja);
		$data['get_pertanyaan_360'] = $this->transaksi_model->get_pertanyaan_360($kondisi);
		
		$data['get_pertanyaan_spv_know'] = $this->transaksi_model->get_pertanyaan_spv_know($kondisi1,$kode);
		$data['get_pertanyaan_spv_skills'] = $this->transaksi_model->get_pertanyaan_spv_skills($kondisi2,$kode);
		$data['get_pertanyaan_spv_attitude'] = $this->transaksi_model->get_pertanyaan_spv_attitude($kondisi3,$kode);



				$query = $this->db->query("select * from karyawan where id='$id_karyawan'");

		foreach ($query->result() as $row23)
		{
			$nik=  $row23->nik;
			
		}

	
		$data['get_score'] = $this->transaksi_model->get_score($nik);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/online/spv', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function proses(){
		$pertanyaan = $this->input->post('pertanyaan');
		$jumlah_berkas = count($pertanyaan);
		$inisial = $this->input->post('nama_karyawan');
		$nama = $this->input->post('nama');
		$posisi = $this->input->post('posisi');
	    $rekan=$this->input->post('rekan');
		$team = $this->input->post('brand');
		$tanggal = $this->input->post('tanggal');
		$rekan = $this->input->post('rekan');
		$masukan = $this->input->post('deskripsi');
		$pertanyaan = $this->input->post('pertanyaan');
		$kode_form=$this->input->post('kode');
		$jenis_form='360';
		$r = $this->input->post('r');

		for($i = 0; $i < $jumlah_berkas;$i++)
		{
			 $a=$i+1;
		     $data[]=array('inisial' => $inisial,
							'posisi' => $posisi,
							'team' => $team,
							'tgl_appraisal' => $tanggal,
							'rekan' => $rekan,
							'id_pertanyaan' => $pertanyaan[$i],
							'nilai'=>$this->input->post('jawaban'.$a),
							'masukan'=>$masukan,
							'kode_form'=>$kode_form,
							'jenis_form'=>$jenis_form);

		}
		$query = $this->db->query("SELECT * FROM form_360 where kode_form='$kode_form'");
		$jumlah = $query->num_rows();
		if ($jumlah>'0'){
			echo '<script>alert("Form 360 Sudah Pernah Di Isi")</script>';
			echo '<script>history.back();</script>';
			exit;
		}
	
		$insert = count($data);

            if($insert)
            {
            $this->db->insert_batch('form_360', $data);
            }
			$query = $this->db->query("select mark from karyawan where inisial='$inisial'");
			foreach ($query->result() as $row){	$mark=  $row->mark;}
			$mark_now = $mark + 1;
			$data = array(
				'mark' => $mark_now,);
			$where = array(
				'inisial' => $inisial
			);
			$this->master_model->Updatekaryawan($where,$data,'karyawan');
			return redirect('admin/auth/login');
		
	}
	public function proses_self(){

		$pertanyaan = $this->input->post('pertanyaan');
		$jumlah_berkas = count($pertanyaan);

		
		$id_karyawan = $this->input->post('id_karyawan');
	
		$nama = $this->input->post('nama');
		$posisi = $this->input->post('posisi');
	    $atasan=$this->input->post('atasan');
		$team = $this->input->post('brand');
		$tanggal = $this->input->post('tanggal');
		$rekan = $this->input->post('rekan');
		$masukan = $this->input->post('deskripsi');
		$pertanyaan = $this->input->post('pertanyaan');
		$kode_form=$this->input->post('kode_form');
		$summary=$this->input->post('summary');
		$action=$this->input->post('action');
		//$jenis_form=$this->input->post('');
	//	$jenis_form='self_appraisal';
		
		$r = $this->input->post('r');

		for($i = 0; $i < $jumlah_berkas;$i++)
		{
			 $a=$i+1;
		     $data[]=array('id_karyawan' => $id_karyawan,
							'posisi' => $posisi,
							'team' => $team,
							'tgl_appraisal' => $tanggal,
							'atasan' => $atasan,
							'id_pertanyaan' => $pertanyaan[$i],
							'nilai'=>$this->input->post('jawaban'.$a),
							'summary'=>$summary,
							'action'=>$action,
							'kode_form'=>$kode_form,
							'jenis_form'=>$this->input->post('jenis_form'.$a));


		}
		$query = $this->db->query("SELECT * FROM self_appraisal where kode_form='$kode_form'");
		$jumlah = $query->num_rows();

		if ($jumlah>'0'){
			echo '<script>alert("Form Self Appraisal Sudah Pernah Di Isi")</script>';
			echo '<script>history.back();</script>';
			exit;
			
  			
		}
		$insert = count($data);
	

            if($insert)
            {
            $this->db->insert_batch('self_appraisal', $data);
            }

			$query = $this->db->query("select mark from karyawan where id='$id_karyawan'");
			foreach ($query->result() as $row){	$mark=  $row->mark;}
			$mark_now = $mark + 1;
			$data = array(
				'mark' => $mark_now,);
			$where = array(
				'id' => $id_karyawan
			);
			$this->master_model->Updatekaryawan($where,$data,'karyawan');
	
            return redirect('admin/auth/login');
		
	}

	public function proses_spv(){

		$pertanyaan = $this->input->post('pertanyaan');
		$jumlah_berkas = count($pertanyaan);
		
		
		$id_karyawan = $this->input->post('id_karyawan');
		
		$nama = $this->input->post('nama');
		$posisi = $this->input->post('posisi');
		$atasan=$this->input->post('atasan');
		$team = $this->input->post('brand');
		$tanggal = $this->input->post('tanggal');
		$rekan = $this->input->post('rekan');
		$summary = $this->input->post('summary');
		$action = $this->input->post('action');
		$pertanyaan = $this->input->post('pertanyaan');
		$kode_form=$this->input->post('kode_form');
		
		
		$r = $this->input->post('r');
		
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
			 $a=$i+1;
			 $data[]=array('id_karyawan' => $id_karyawan,
							'posisi' => $posisi,
							'team' => $team,
							'tgl_appraisal' => $tanggal,
							'atasan' => $atasan,
							'id_pertanyaan' => $pertanyaan[$i],
							'nilai'=>$this->input->post('jawaban'.$a),
							'summary'=>$summary,
							'action'=>$action,
							'kode_form'=>$kode_form,
							'jenis_form'=>$this->input->post('jenis_form'.$a));
		
		
		}
		$query = $this->db->query("SELECT * FROM spv_appraisal where kode_form='$kode_form'");
		$jumlah = $query->num_rows();
		
		if ($jumlah>'0'){
			echo '<script>alert("Form SPV Appraisal Sudah Pernah Di Isi")</script>';
			echo '<script>history.back();</script>';
			exit;
			
			  
		}
		$insert = count($data);
		
		
			if($insert)
			{
			$this->db->insert_batch('spv_appraisal', $data);
			}
		
			
			return redirect('admin/auth/login');
		
		}
	public function proses_spv3(){

		$pertanyaan = $this->input->post('pertanyaan');
		$jumlah_berkas = count($pertanyaan);
		$id_karyawan = $this->input->post('id_karyawan');
	
		$nama = $this->input->post('nama');
		$posisi = $this->input->post('posisi');
	    $id_karyawan_penilai=$this->input->post('id_karyawan_penilai');
		$team = $this->input->post('brand');
		$tanggal = $this->input->post('tanggal');
		$rekan = $this->input->post('rekan');
		$masukan = $this->input->post('deskripsi');
		$pertanyaan = $this->input->post('pertanyaan');
		
	    $kode_form='01';
		$jenis_form='360';
		
		$r = $this->input->post('r');

		for($i = 0; $i < $jumlah_berkas;$i++)
		{
			 $a=$i+1;
		     $data[]=array('id_karyawan' => $id_karyawan,
							'posisi' => $posisi,
							'team' => $team,
							'tgl_appraisal' => $tanggal,
							'id_karyawan_penilai' => $id_karyawan_penilai,
							'id_pertanyaan' => $pertanyaan[$i],
							'nilai'=>$this->input->post('jawaban'.$a),
							'masukan'=>$masukan,
							'kode_form'=>$kode_form,
							'jenis_form'=>$jenis_form);

		}
		$insert = count($data);

            if($insert)
            {
            $this->db->insert_batch('spv_appraisal', $data);
            }
	
            return redirect('admin/auth/login');
		
	}

	//--------------------------------------------------------------
	

	}  // end class


?>