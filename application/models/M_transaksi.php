<?php
class M_transaksi extends CI_Model{

	function get_all_transaksi(){
    $akses= $this->session->userdata('akses');
    $id   = $this->session->userdata('idadmin');
    
    if($akses==2){
		  $hsl=$this->db->query("SELECT * FROM tbl_master_jual a INNER JOIN x_tbl_pengguna b ON a.pengguna_id=b.pengguna_id ORDER BY a.tgl_jual DESC, a.nofak_jual DESC");
    }else{
		  $hsl=$this->db->query("SELECT * FROM tbl_master_jual a INNER JOIN x_tbl_pengguna b ON a.pengguna_id=b.pengguna_id WHERE a.pengguna_id='$id' ORDER BY a.tgl_jual DESC, a.nofak_jual DESC");
    }
		return $hsl;	
	}

  function get_details($nofak_jual){
		$hsl=$this->db->query("SELECT * FROM tbl_det_jual a INNER JOIN tbl_menu b ON a.kode_menu=b.kode_menu WHERE a.nofak_jual='$nofak_jual' ORDER BY a.nofak_jual DESC");
		return $hsl;	
	}

  function get_laporan_transaksi($pengguna_id, $akses){
    if($pengguna_id=="" && $akses != 3){
      $hsl=$this->db->query("SELECT DISTINCT a.nofak_jual, c.tgl_jual, c.total_harga, c.no_meja, d.pengguna_nama FROM tbl_det_jual a INNER JOIN tbl_menu b ON a.kode_menu=b.kode_menu INNER JOIN tbl_master_jual c ON a.nofak_jual = c.nofak_jual  INNER JOIN x_tbl_pengguna d ON c.pengguna_id = d.pengguna_id ORDER BY a.nofak_jual DESC");
    }else{
      $hsl=$this->db->query("SELECT DISTINCT a.nofak_jual, c.tgl_jual, c.total_harga, c.no_meja, d.pengguna_nama FROM tbl_det_jual a INNER JOIN tbl_menu b ON a.kode_menu=b.kode_menu INNER JOIN tbl_master_jual c ON a.nofak_jual = c.nofak_jual INNER JOIN x_tbl_pengguna d ON c.pengguna_id = d.pengguna_id WHERE c.pengguna_id = '$pengguna_id' ORDER BY a.nofak_jual DESC");
  
    }
		return $hsl;	
	}
  

  function get_all_menu(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu ORDER BY nama_menu");
		return $hsl;	
	}

	// Transaksi Simpan
	function simpan_transaksi($tgl_jual, $total_harga, $no_meja){
    $pengguna_id = $this->session->userdata('idadmin');
    $hsl=$this->db->query("INSERT INTO tbl_master_jual (tgl_jual, total_harga, no_meja, pengguna_id) VALUES ('$tgl_jual', '$total_harga', '$no_meja', '$pengguna_id')");
    return $hsl;
	}

	function simpan_transaksi_bayar($no_faktur, $total_bayar){
    $data = array(
      'total_bayar'=>$total_bayar
    );
    $this->db->where('nofak_jual', $no_faktur);
    $this->db->update('tbl_master_jual',$data);
    
    $hsl = $this->db->query("SELECT * FROM tbl_master_jual a INNER JOIN tbl_det_jual b ON a.nofak_jual = b.nofak_jual INNER JOIN x_tbl_pengguna c ON a.pengguna_id = c.pengguna_id INNER JOIN tbl_menu d ON b.kode_menu = d.kode_menu WHERE a.nofak_jual = '$no_faktur'");
		return $hsl;
  }

  function get_cetak($no_faktur){
		$hsl = $this->db->query("SELECT * FROM tbl_master_jual a INNER JOIN tbl_det_jual b ON a.nofak_jual = b.nofak_jual INNER JOIN x_tbl_pengguna c ON a.pengguna_id = c.pengguna_id INNER JOIN tbl_menu d ON b.kode_menu = d.kode_menu WHERE a.nofak_jual = '$no_faktur'");
		return $hsl;
	}

}