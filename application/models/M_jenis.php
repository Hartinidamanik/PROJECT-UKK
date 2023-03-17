<?php
class M_jenis extends CI_Model{
	
  function get_all_jenis(){
		$hsl = $this->db->query("SELECT * FROM tbl_jenis ORDER BY jenis_menu");
		return $hsl;
	}
  
	function simpan_jenis($jenis_menu, $pengguna_id){ 
    $this->db->query("INSERT INTO tbl_jenis(jenis_menu, pengguna_id) values ('$jenis_menu', '$pengguna_id')");
    // return $hsl;

}

	function update_jenis($idJenis,$jenis_menu){
		$hsl=$this->db->query("UPDATE tbl_jenis SET jenis_menu ='$jenis_menu' where id_jenis ='$idJenis'");
		return $hsl;
	}
  
	function hapus_jenis($idJenis){
		$hsl = $this->db->query("DELETE FROM tbl_jenis WHERE id_jenis = '$idJenis'");
		return $hsl;
	}
	
  function get_all_jenis_cetak(){
		$hsl=$this->db->query("SELECT * FROM tbl_jenis ORDER BY jenis_menu");
		return $hsl;
	}
}