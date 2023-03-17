<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
    // Block user jika tidak login
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
	}

  function index(){
		$data['judul']="Dashboard HARTINI'S Cafe & Resto";
		$this->load->view('template/header', $data);
		$this->load->view('admin/v_dashboard');
		$this->load->view('template/footer');
	}

}