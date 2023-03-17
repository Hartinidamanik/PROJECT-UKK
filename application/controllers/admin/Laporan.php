<?php

class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
		$this->load->model('m_laporan');
	}

	function index(){
		$x['data']=$this->m_laporan->get_all_laporan();
    
    $data['judul']="Laporan HARTINI'S Cafe & Resto";
		$this->load->view('template/header',$data);
		$this->load->view('admin/v_laporan',$x);
		$this->load->view('template/footer');
	}

  function laporan_details(){
    // $pengguna_id= $this->input->post('pengguna_id'); 
		$x['data']=$this->m_laporan->get_laporan();
 		$this->load->view('admin/v_laporan_detail',$x);
	}

  function cetak_laporan(){
    $x['data']=$this->m_laporan->get_all_laporan();
    $this->load->view('admin/vcetak_laporan',$x); 
  }

  
}