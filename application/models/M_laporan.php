<?php
class M_laporan extends CI_Model{

	function get_all_laporan(){
    $akses= $this->session->userdata('akses');
    $id   = $this->session->userdata('idadmin');
    
    if($akses==2){
      $hsl=$this->db->query("SELECT * FROM tbl_menu a INNER JOIN tbl_det_jual b ON a.kode_menu=b.kode_menu INNER JOIN tbl_master_jual c ON c.nofak_jual=b.nofak_jual INNER JOIN x_tbl_pengguna d ON d.pengguna_id=c.pengguna_id ORDER BY c.nofak_jual, c.tgl_jual");
    }else{
      $hsl=$this->db->query("SELECT * FROM tbl_menu a INNER JOIN tbl_det_jual b ON a.kode_menu=b.kode_menu INNER JOIN tbl_master_jual c ON c.nofak_jual=b.nofak_jual INNER JOIN x_tbl_pengguna d ON d.pengguna_id=c.pengguna_id WHERE c.pengguna_id='$id' ORDER BY c.nofak_jual, c.tgl_jual");
    }
    return $hsl;	
	}

  function get_laporan(){

    $this->db->select('*');
    $this->db->from('tbl_menu');
    $this->db->join('tbl_det_jual','tbl_det_jual.kode_menu=tbl_menu.kode_menu');
    $this->db->join('tbl_master_jual','tbl_master_jual.nofak_jual=tbl_det_jual.nofak_jual');
    $this->db->join('x_tbl_pengguna','x_tbl_pengguna.pengguna_id=tbl_master_jual.pengguna_id');
    // $this->db->where('x_tbl_pengguna.pengguna_hak_akses', '3');
    // $this->db->where('tbl_master_jual.tgl_jual >=', date_format($tglDari, 'Y-m-d'));
    // $this->db->where('tbl_master_jual.tgl_jual <=', $tglSampai);
    // $this->db->where('tbl_master_jual.tgl_jual BETWEEN "'. date('Y-m-d', strtotime($tglDari)). '" AND "'. date('Y-m-d', strtotime($tglSampai)).'"');
    return $this->db->get();	
	}

  function get_all_pengguna(){
    // $all_pengguna = "CALL p_pengguna()";
    $all_pengguna = "SELECT * FROM x_tbl_pengguna WHERE pengguna_hak_akses ='3' ORDER BY pengguna_nama";
		$query = $this->db->query($all_pengguna);
		return $query;	
	}

  function get_pengguna_nama($pengguna_id){
    $nama = "SELECT * FROM x_tbl_pengguna WHERE pengguna_id='$pengguna_id' ORDER BY pengguna_id";
		$d = $this->db->query($nama)->num_rows();
    if($d>0){
      $d = $this->db->query($nama)->row_array();
      echo $d['pengguna_nama'];
    }
  }

}