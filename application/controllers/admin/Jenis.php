<?php
class Jenis extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
		$this->load->model('m_jenis');
		$this->load->library('upload');
	}

	function index(){
		$x['data'] = $this->m_jenis->get_all_jenis();
    $data['judul']="Jenis Menu HARTINI'S Cafe & Resto";

    $this->load->view('template/header', $data);
		$this->load->view('admin/v_jenis',$x);
		$this->load->view('template/footer');
	}

	function simpan_jenis(){
    $pengguna_id = strip_tags($this->input->post('pengguna_id'));
    $jenis_menu  = strip_tags($this->input->post('jenis_menu')); 
		$hsl = $this->db->get_where('tbl_jenis', ['jenis_menu' => $jenis_menu])->row_array();
    // jika jenis menu tidak ada
    if(!$hsl) {
      $this->m_jenis->simpan_jenis($jenis_menu, $pengguna_id);
      echo $this->session->set_flashdata('msg','success');
    }else{
      echo $this->session->set_flashdata('msg','failed');
    }
    redirect('admin/jenis');
	}

	function update_jenis(){
		$namaJenis  = strip_tags($this->input->post('jenis_menu')); 
		$hsl = $this->db->get_where('tbl_jenis', ['jenis_menu' => $namaJenis])->row_array();
    if(!$hsl) {
      $idJenis = strip_tags($this->input->post('id_jenis'));
		  $this->m_jenis->update_jenis($idJenis, $namaJenis);
		  echo $this->session->set_flashdata('msg','info');
    }else{
		  echo $this->session->set_flashdata('msg','failed');
    }
		redirect('admin/jenis');
	}

	function hapus_jenis(){
		$idJenis = strip_tags($this->input->post('id_jenis'));
		$dt = $this->db->get_where('tbl_menu',['id_jenis' => $idJenis])->num_rows();
    if($dt>0){
      echo $this->session->set_flashdata('msg','failed');
    }else{
      $this->m_jenis->hapus_jenis($idJenis);
      echo $this->session->set_flashdata('msg','success-hapus');
    }
		redirect('admin/jenis');
	}
  
	function cetak_jenis(){
		$x['data'] = $this->m_jenis->get_all_jenis_cetak();
		$this->load->view('admin/vcetak_jenis',$x); 
	}

}
