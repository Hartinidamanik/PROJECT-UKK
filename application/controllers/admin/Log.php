<?php
class Log extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
		$this->load->model('m_log');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_log->get_all_log();
    $data['judul']="History Log HARTINI'S Cafe & Resto";

    $this->load->view('template/header', $data);
		$this->load->view('admin/v_log',$x);
		$this->load->view('template/footer');
	}

	function cetak_log(){
		$x['data']=$this->m_log->get_log_cetak();
		$this->load->view('admin/vcetak_log',$x); 
	}

  function hapus_log(){
		$pengunjung_id = strip_tags($this->input->post('pengunjung_id'));
    $this->m_log->hapus_log($pengunjung_id);
    echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/log');
	}
  
}