<?php
class M_pengguna extends CI_Model{

	function get_all_pengguna(){
    // $all_pengguna = "CALL p_pengguna()";
    $all_pengguna = "SELECT * FROM x_tbl_pengguna ORDER BY pengguna_nama";
		$query = $this->db->query($all_pengguna);
		return $query;	
	}

	function get_all_pengguna_cetak(){
		$hsl=$this->db->query("SELECT * FROM x_tbl_pengguna");
		return $hsl;
	}

  // Pengguna Simpan
	function simpan_pengguna($nama, $username, $password, $email, $xnohp, $akses, $gambar){
		$hsl=$this->db->query("INSERT INTO x_tbl_pengguna (pengguna_nama, pengguna_username, pengguna_password, pengguna_email, pengguna_nohp, pengguna_hak_akses, pengguna_photo) VALUES ('$nama', '$username', md5('$password'), '$email', '$xnohp', '$akses','$gambar')");
		return $hsl;
	}

  // Pengguna Simpan tampa Gambar
	function simpan_pengguna_tanpa_gambar($nama, $username, $password,$email, $nohp, $akses, $gambar){
		$hsl = $this->db->query("INSERT INTO x_tbl_pengguna (pengguna_nama, pengguna_username, pengguna_password, pengguna_email, pengguna_nohp,pengguna_hak_akses, pengguna_photo) VALUES ('$nama', '$username', md5('$password'),'$email', '$nohp', '$akses', '$gambar')");
		return $hsl;
	}

	// Update penggunan tanpa password dan gambar
  function update_pengguna_tanpa_pass_dan_gambar($kode, $nama, $username, $email, $username1, $email1, $nohp, $level){
    if($username==$username1 && $email==$email1){
      $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
        pengguna_nama       = '$nama',
        pengguna_nohp       = '$nohp',
        pengguna_hak_akses  = '$level' 
      WHERE pengguna_id     = '$kode'");
    }else if($username<>$username1 && $email==$email1){
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_username' => $username])->row_array();
      if(!$h){
        $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
          pengguna_nama       = '$nama',
          pengguna_username   = '$username',
          pengguna_nohp       = '$nohp',
          pengguna_hak_akses  = '$level' 
        WHERE pengguna_id     = '$kode'");
      }
    }else if($username==$username1 && $email<>$email1){
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
      if(!$h){
        $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
          pengguna_nama       = '$nama',
          pengguna_nohp       = '$nohp',
          pengguna_email      = '$email',
          pengguna_hak_akses  = '$level' 
        WHERE pengguna_id     = '$kode'");
      }
    }else{
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_username' => $username])->row_array();
      
      $i = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
      if(!$h && !$i){
        $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
          pengguna_username   = '$username',
          pengguna_nama       = '$nama',
          pengguna_nohp       = '$nohp',
          pengguna_email      = '$email',
          pengguna_hak_akses  = '$level' 
        WHERE pengguna_id     = '$kode'");
      }
    }
    return $hsl;
	}

  // Update pengguna tanpa Gambar tetapi menggunakan Password
  function update_pengguna_tanpa_gambar($kode, $nama, $username, $email,$username1, $email1, $password, $nohp, $level){
    if($username==$username1 && $email==$email1){
      $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
        pengguna_password   = md5('$password'),
        pengguna_nama       = '$nama',
        pengguna_nohp       = '$nohp',
        pengguna_hak_akses  = '$level' 
      WHERE pengguna_id     = '$kode'");
    }else if($username<>$username1 && $email==$email1){
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_username' => $username])->row_array();
      if(!$h){
        $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
          pengguna_nama       = '$nama',
          pengguna_username   = '$username',
          pengguna_password   = md5('$password'),
          pengguna_nohp       = '$nohp',
          pengguna_hak_akses  = '$level' 
        WHERE pengguna_id     = '$kode'");
      }
    }else if($username==$username1 && $email<>$email1){
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
      if(!$h){
        $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
          pengguna_nama       = '$nama',
          pengguna_password   = md5('$password'),
          pengguna_nohp       = '$nohp',
          pengguna_email      = '$email',
          pengguna_hak_akses  = '$level' 
        WHERE pengguna_id     = '$kode'");
      }
    }else{
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_username' => $username])->row_array();
      
      $i = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
      if(!$h && !$i){
        $hsl = $this->db->query("UPDATE x_tbl_pengguna SET
          pengguna_username   = '$username',
          pengguna_password   = md5('$password'),
          pengguna_nama       = '$nama',
          pengguna_nohp       = '$nohp',
          pengguna_email      = '$email',
          pengguna_hak_akses  = '$level' 
        WHERE pengguna_id     = '$kode'");
      }
    
    }
    return $hsl;
	}
  
  // Update pengguna dengan gambar tetapi tidak menggunakan password
  function update_pengguna_tanpa_pass($kode, $nama, $username, $email,$username1, $email1, $nohp, $level, $gambar){
    $d = $this->db->get_where('x_tbl_pengguna',['pengguna_id'=>$kode])->row_array();
    $pengguna_photo = $d['pengguna_photo'];

    $hsl=1;
    if($username==$username1 && $email==$email1){
      $this->db->query("UPDATE x_tbl_pengguna SET 
        pengguna_nama       = '$nama',
        pengguna_nohp       = '$nohp',
        pengguna_hak_akses  = '$level',
        pengguna_photo      = '$gambar' 
      WHERE pengguna_id     = '$kode'");
      if($pengguna_photo!='favicon.png'){unlink('assets/images/'.$pengguna_photo);}
    }else if($username<>$username1 && $email==$email1){
      $d = $this->db->get_where('x_tbl_pengguna',['pengguna_id'=>$kode])->num_rows();
      if($d==1){
        unlink('assets/images/'.$gambar);
        $hsl=2;
      }else{
        $this->db->query("UPDATE x_tbl_pengguna SET 
          pengguna_nama       = '$nama',
          pengguna_username   = '$username',
          pengguna_nohp       = '$nohp',
          pengguna_hak_akses  = '$level',
          pengguna_photo      = '$gambar' 
        WHERE pengguna_id     = '$kode'");
        if($pengguna_photo!='favicon.png'){unlink('assets/images/'.$pengguna_photo);}
      }
    }else if($username==$username1 && $email<>$email1){
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
      if($d==1){
        unlink('assets/images/'.$gambar);
        $hsl=2;
      }else{
        $this->db->query("UPDATE x_tbl_pengguna SET 
          pengguna_nama       = '$nama',
          pengguna_email      = '$email',
          pengguna_nohp       = '$nohp',
          pengguna_hak_akses  = '$level',
          pengguna_photo      = '$gambar' 
        WHERE pengguna_id     = '$kode'");
        if($pengguna_photo!='favicon.png'){unlink('assets/images/'.$pengguna_photo);}
        
      }
    }else{
      $h = $this->db->get_where('X_tbl_pengguna', ['pengguna_username' => $username])->row_array();
      
      $i = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
      if(!$h && !$i){ 
        $this->db->query("UPDATE x_tbl_pengguna SET 
          pengguna_nama       = '$nama',
          pengguna_username   = '$username',
          pengguna_email      = '$email',
          pengguna_nohp       = '$nohp',
          pengguna_hak_akses  = '$level',
          pengguna_photo      = '$gambar' 
        WHERE pengguna_id     = '$kode'");
        if($pengguna_photo!='favicon.png'){unlink('assets/images/'.$pengguna_photo);}
      }else{
        unlink('assets/images/'.$gambar);
        $hsl=2;
      }
    }
		return $hsl;
	}

  // Update semua
  function update_pengguna($kode, $nama, $username, $username1, $password, $email, $email1, $nohp, $level, $gambar){
    $d = $this->db->get_where('x_tbl_pengguna',['pengguna_id'=>$kode])->row_array();
    $photo_makanan = $d['pengguna_photo'];

		$hsl = $this->db->query("UPDATE x_tbl_pengguna SET 
      pengguna_nama       = '$nama',
      pengguna_username   = '$username',
      pengguna_password   = md5('$password'),
      pengguna_email      = '$email',
      pengguna_nohp       = '$nohp',
      pengguna_hak_akses  = '$level',
      pengguna_photo      = '$gambar' 
    WHERE pengguna_id     = '$kode'");
    unlink('assets/images/'.$photo_makanan);

		return $hsl;
	}
	//END UPDATE PENGGUNA//

	function hapus_pengguna($kode){
    $d = $this->db->get_where('tbl_jenis',['pengguna_id'=>$kode])->row_array();

    $e = $this->db->get_where('tbl_menu',['pengguna_id'=>$kode])->row_array();

    $f = $this->db->get_where('tbl_master_jual',['pengguna_id'=>$kode])->row_array();

    $hsl=1;
    if($d || $e || $f){
      $hsl=2;
    }else{
      $this->db->where('pengguna_id', $kode);
      $this->db->delete('x_tbl_pengguna');
    }
		return $hsl;
	}

	function getusername($id){
		$hsl = $this->db->query("SELECT * FROM x_tbl_pengguna where pengguna_id = '$id'");
		return $hsl;
	}

	function resetpass($id,$pass){
		$hsl = $this->db->query("UPDATE x_tbl_pengguna SET pengguna_password = md5('$pass') WHERE pengguna_id = '$id'");
		return $hsl;
	}

	function get_pengguna_login($kode){
		$hsl = $this->db->query("SELECT * FROM x_tbl_pengguna WHERE pengguna_id = '$kode'");
		return $hsl;
	}

  

}