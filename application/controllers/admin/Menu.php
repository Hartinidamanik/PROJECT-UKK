<?php
class Menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
		$this->load->model('m_menu');
		$this->load->library('upload');
	}

	function index(){
    $x['data']      = $this->m_menu->get_all_menu();
    $data['judul']  = "Data Menu HARTINI'S Cafe & Resto";
		$this->load->view('template/header', $data);
		$this->load->view('admin/v_menu', $x);
		$this->load->view('template/footer');
	}

	function simpan_menu(){
    $kode_menu  = strip_tags($this->input->post('kode_menu')); 
		$hsl = $this->db->get_where('tbl_menu', ['kode_menu' => $kode_menu])->row_array();
    
    $nama_menu  = strip_tags($this->input->post('nama_menu')); 
		$hsl1 = $this->db->get_where('tbl_menu', ['nama_menu' => $nama_menu])->row_array();
  
    // jika Kode menu dan Nama Menu
    if(!$hsl && !$hsl1) {
      $id_jenis   = strip_tags($this->input->post('id_jenis')); 
      $satuan     = strip_tags($this->input->post('satuan')); 
      $harga_jual = strip_tags($this->input->post('harga_jual')); 
      $deskripsi  = strip_tags($this->input->post('deskripsi')); 
      $pengguna_id = $this->session->userdata('idadmin');

      $config['upload_path'] = './assets/images/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

      $this->upload->initialize($config);
      if(!empty($_FILES['filefoto']['name'])){
        if ($this->upload->do_upload('filefoto')){
          $gbr = $this->upload->data();
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/images/'.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '60%';
          $config['width']= 300;
          $config['height']= 300;
          $config['new_image']= './assets/images/'.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          $gambar = $gbr['file_name'];
        }
      }else{
        $gambar = "food.jpg";
      }
		  $this->m_menu->simpan_menu($kode_menu, $id_jenis, $nama_menu, $satuan, $harga_jual, $deskripsi, $pengguna_id, $gambar);
		  echo $this->session->set_flashdata('msg','success');
    }else{
		  echo $this->session->set_flashdata('msg','failed');
    }
    redirect('admin/menu');
	}

	function update_menu(){
		$kode_menu  = strip_tags($this->input->post('kode_menu'));
		$nama_menu  = strip_tags($this->input->post('nama_menu'));
		$nama_menu1 = strip_tags($this->input->post('nama_menu1'));
		$satuan     = strip_tags($this->input->post('satuan'));
		$id_jenis   = strip_tags($this->input->post('id_jenis'));
		$harga_jual = strip_tags($this->input->post('harga_jual'));
		$deskripsi  = strip_tags($this->input->post('deskripsi'));
		$pengguna_id= strip_tags($this->input->post('pengguna_id'));
		$gambar     = strip_tags($_FILES['filefoto']['name']);

    $config['upload_path'] = './assets/images/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

    $this->upload->initialize($config);
    if(!empty($_FILES['filefoto']['name'])){
      if ($this->upload->do_upload('filefoto')){
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library']='gd2';
        $config['source_image']='./assets/images/'.$gbr['file_name'];
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['quality']= '60%';
        $config['width']= 300;
        $config['height']= 300;
        $config['new_image']= './assets/images/'.$gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $gambar = $gbr['file_name'];
      }
    }
		$hasil = $this->m_menu->update_menu($kode_menu, $nama_menu, $nama_menu1,$satuan, $id_jenis, $harga_jual, $deskripsi, $pengguna_id, $gambar);
    if($hasil==1){
		  echo $this->session->set_flashdata('msg','info');
    }else{
		  echo $this->session->set_flashdata('msg','failed');
      if($gambar!="food.png"){
        unlink('assets/images/'.$gambar);
      }
    }
      redirect('admin/menu');
	}

	function hapus_menu(){
		$kode_menu = strip_tags($this->input->post('kode_menu'));
    $h = $this->db->get_where('tbl_det_jual', ['kode_menu' => $kode_menu])->num_rows();
    if($h>0){
      echo $this->session->set_flashdata('msg','failed');
    }else{
      $this->m_menu->hapus_menu($kode_menu);
      echo $this->session->set_flashdata('msg','success-hapus');
    }
		redirect('admin/menu');
	}

	function cetak_menu(){
		$x['data']=$this->m_menu->get_all_menu();
		$this->load->view('admin/vcetak_menu',$x); 
	}

}
