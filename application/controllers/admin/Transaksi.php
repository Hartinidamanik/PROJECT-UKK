<?php

class Transaksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
		$this->load->model('m_transaksi');
		$this->load->model('m_laporan');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_transaksi->get_all_transaksi();
    
    $data['judul']="Transaksi HARTINI'S Cafe & Resto";
		$this->load->view('template/header',$data);
		$this->load->view('admin/v_transaksi',$x);
		$this->load->view('template/footer');
	}

  function simpan_transaksi(){
    date_default_timezone_set("Asia/Jakarta");
    $tglHariIni=date('Ymd');

    $jumlah_item  = $this->input->post('qty');
    $kode_menu    = $this->input->post('kode_menu');
    $data=$this->db->get_where('tbl_menu', ['kode_menu'=>$kode_menu])->row_array();
    $harga_jual = $data['hrg_jual'];

    $total_harga = $jumlah_item*$harga_jual;

    $a=$this->db->query("SELECT id_master_jual FROM tbl_master_jual ORDER BY id_master_jual DESC")->row_array();
    if($a){
      $nofak = $a['id_master_jual'];
      if($nofak<10){
        $nofak = "000000".$nofak;
      }else if($nofak<100){
        $nofak = "00000".$nofak;
      }else if($nofak<1000){
        $nofak = "0000".$nofak;
      }else if($nofak<10000){
        $nofak = "000".$nofak;
      }else if($nofak<100000){
        $nofak = "00".$nofak;
      }else if($nofak<100000){
        $nofak = "0".$nofak;
      }
    }else{
      $nofak = "0000001";
    }
    $no_faktur  = $this->input->post('no_faktur');
    if($no_faktur==""){
      echo  $nofak1 = $tglHariIni.$nofak;
      $data = array(
        'nofak_jual'=>$nofak1,
        'tgl_jual'=>$this->input->post('tgl_jual'),
        'total_harga'=>$total_harga,
        'no_meja'=>$this->input->post('no_meja'),
        'pengguna_id'=>$this->session->userdata('idadmin')
      );
      $this->db->insert('tbl_master_jual',$data);
    }else{
      echo  $nofak1 = $no_faktur;
      
      $h = $this->db->get_where('tbl_master_jual', ['nofak_jual' => $no_faktur])->row_array();
      $ttl_harga = $h['total_harga']+$total_harga;

      $data = array(
        'total_harga'=>$ttl_harga
      );
      $this->db->where('nofak_jual', $no_faktur);
      $this->db->update('tbl_master_jual',$data);
    }
    $data = array(
      'nofak_jual'=>$nofak1,
      'kode_menu'=>$kode_menu,
      'jumlah_item'=>$jumlah_item,
      'harga_jual'=>$harga_jual
    );
    $this->db->insert('tbl_det_jual',$data);
  }

  function transaksi_all_details(){
		$x['data']=$this->m_transaksi->get_all_transaksi();
		$this->load->view('admin/v_transaksi_all_details',$x);
  }

  function transaksi_after_delete(){
		$x['data']=$this->m_transaksi->get_all_transaksi();
		$this->load->view('admin/v_transaksi_after_delete',$x);
  }

  function transaksi_details(){
		$nofak_jual = $this->input->post('nofak_jual');
    $x['data']=$this->m_transaksi->get_details($nofak_jual);
    $this->load->view('admin/v_transaksi_details', $x);
  }

  function laporan_transaksi_details(){
    $akses = $this->session->userdata('akses');
    $pengguna_id= $this->input->post('pengguna_id'); 
		$x['data']=$this->m_transaksi->get_laporan_transaksi($pengguna_id, $akses);
 		$this->load->view('admin/v_laporan_transaksi_detail',$x);
	}

  function transaksi_hitung(){
    $nofak_jual = $this->input->post('nofak_jual');
    $h = $this->db->get_where('tbl_master_jual', ['nofak_jual' => $nofak_jual])->row_array();
    echo number_format($h['total_harga']);
  }

  function transaksi_hapus(){
    $id   = $this->input->post('id');
    $nofak= $this->input->post('nofak');
    
    $h1 = $this->db->get_where('tbl_master_jual', ['nofak_jual' => $nofak])->row_array();
    $total_harga1 = $h1['total_harga'];
    
    $h2 = $this->db->get_where('tbl_det_jual', ['id_det_jual' => $id])->row_array();
    $jumlah_item  = $h2['jumlah_item'];
    $harga_jual   = $h2['harga_jual'];

    $total_harga2 = $jumlah_item*$harga_jual;
    $total_harga  = $total_harga1 - $total_harga2;

    $this->db->where('id_det_jual', $id);
    $this->db->delete('tbl_det_jual');
    
    $h3 = $this->db->get_where('tbl_det_jual', ['nofak_jual' => $nofak])->num_rows();
    if($h3>0){
      $this->db->set('total_harga', $total_harga);
      $this->db->where('nofak_jual', $nofak);
      $this->db->update('tbl_master_jual');
    }else{
      $this->db->where('nofak_jual', $nofak);
      $this->db->delete('tbl_master_jual');
    }
  }
  
  function cetak_transaksi(){
    $akses = $this->session->userdata('akses');
    $pengguna_id= $this->input->post('pengguna_id'); 
    $x['data']=$this->m_transaksi->get_laporan_transaksi($pengguna_id, $akses);
    $this->load->view('admin/vcetak_transaksi',$x); 
  }

  function cetak_struk(){
    $no_faktur =  $this->input->post('no_faktur');
    $x['data']=$this->m_transaksi->get_cetak($no_faktur);
    $this->load->view('admin/vcetak_struk', $x); 
  }

  function simpan_transaksi_bayar(){
    $no_faktur  = $this->input->post('no_faktur');
    $total_bayar= str_replace(',','', $this->input->post('total_bayar'));

    $x['data']=$this->m_transaksi->simpan_transaksi_bayar($no_faktur, $total_bayar);
    $this->load->view('admin/vcetak_struk', $x);

  }


}