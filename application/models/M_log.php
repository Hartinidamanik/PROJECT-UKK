
<?php
class M_log extends CI_Model{

	function get_all_log(){
		$hsl = $this->db->query("SELECT * FROM tbl_log ORDER BY pengunjung_tanggal DESC");
		return $hsl;
	}
	
  function update_log($pengguna_id, $pengunjung_id, $nama){
 		if($nama=="Belum Ada Pengguna"){
      $nm = $this->db->get_where("x_tbl_pengguna",['pengguna_id'=>$pengguna_id])->row_array();
      if($nm){
        $pengguna_nama = $nm['pengguna_nama'];
        
        $this->db->set('pengguna_nama', $pengguna_nama);
        $this->db->where('pengunjung_id', $pengunjung_id);
        $this->db->where('pengguna_nama', 'Belum Ada Pengguna');
        $this->db->update('tbl_log');
      }else{
        $akses = $this->session->userdata('akses');
        if($akses == 2){
          $pengguna_id    = $this->session->userdata('idadmin');
          $pengguna_nama  = $this->session->userdata('nama');
        }else{
          $id = $this->db->get_where("tbl_master_jual",['nofak_jual'=>$pengguna_id])->row_array();
          $pengg = $id['pengguna_id'];

          $id1 = $this->db->get_where("x_tbl_pengguna",['pengguna_id'=>$pengg])->row_array();
          $pengguna_nama = $id1['pengguna_nama'];
        }

        $this->db->set('pengguna_id', $pengguna_id);
        $this->db->set('pengguna_nama', $pengguna_nama);
        $this->db->where('pengunjung_id', $pengunjung_id);
        $this->db->where('pengguna_nama', 'Belum Ada Pengguna');
        $this->db->update('tbl_log');

      }

      return $pengguna_nama;
    }
	}

//   function update_log2($pengguna_id){
//     if($nama=="Belum Ada Pengguna"){
//      $nm = $this->db->get_where("x_tbl_pengguna",['pengguna_id'=>$pengguna_id])->row_array();
//      if($nama){
//        $pengguna_nama = $nm['pengguna_nama'];
       
//        $this->db->set('pengguna_nama', $pengguna_nama);
//        $this->db->where('pengunjung_id', $pengunjung_id);
//        $this->db->where('pengguna_nama', '');
//        $this->db->update('tbl_log');
//      }else{
//        $id = $this->db->get_where("tbl_master_jual",['nofak_jual'=>$pengguna_id])->row_array();
//        $pengg = $id['pengguna_id'];

//        $id1 = $this->db->get_where("x_tbl_pengguna",['pengguna_id'=>$pengg])->row_array();
//        $pengguna_nama = $id1['pengguna_nama'];

//        $this->db->set('pengguna_id', $pengg);
//        $this->db->set('pengguna_nama', $pengguna_nama);
//        $this->db->where('pengunjung_id', $pengunjung_id);
//        $this->db->where('pengguna_nama', '');
//        $this->db->update('tbl_log');

//      }

//      return $pengguna_nama;
//    }
//  }

	function get_log_cetak(){
		$hsl=$this->db->query("SELECT * FROM tbl_log ORDER BY pengunjung_id DESC");
		return $hsl;
	}

  function hapus_log($pengunjung_id){
		$hsl = $this->db->query("DELETE FROM tbl_log WHERE pengunjung_id = '$pengunjung_id'");
		return $hsl;
	}

}