<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('/');
			redirect($url);
		};
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_pengguna->get_all_pengguna();
		
    $data['judul']="Pengguna HARTINI'S Cafe & Resto";
		$this->load->view('template/header',$data);
		$this->load->view('admin/v_pengguna',$x);
		$this->load->view('template/footer');
	}

	function simpan_pengguna(){
    $username = strip_tags($this->input->post('xusername')); 
		$hsl      = $this->db->get_where('X_tbl_pengguna', ['pengguna_username' => $username])->row_array();
    
    $email = strip_tags($this->input->post('xemail')); 
		$hsl1  = $this->db->get_where('X_tbl_pengguna', ['pengguna_email' => $email])->row_array();
    // jika username tidak ada
    if(!$hsl && !$hsl1) {
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

          $gambar           = $gbr['file_name'];
          $nama             = $this->input->post('xnama');
          $username         = $this->input->post('xusername');
          $password         = $this->input->post('xpassword');
          $konfirm_password = $this->input->post('xpassword2');
          $email            = $this->input->post('xemail');
          $nohp             = $this->input->post('xnohp');
          $level            = $this->input->post('xlevel');
          if ($password <> $konfirm_password) {
            echo $this->session->set_flashdata('msg','error');
          }else{
            $this->m_pengguna->simpan_pengguna($nama, $username, $password,$email,$nohp, $level,$gambar);
            echo $this->session->set_flashdata('msg','success');
          }
        }else{
          echo $this->session->set_flashdata('msg','warning');
        }
      }else{
        $nama             = $this->input->post('xnama');
        $username         = $this->input->post('xusername');
        $password         = $this->input->post('xpassword');
        $konfirm_password = $this->input->post('xpassword2');
        $email            = $this->input->post('xemail');
        $nohp             = $this->input->post('xnohp');
        $level            = $this->input->post('xlevel');
        $gambar           = 'favicon.png';
        if ($password <> $konfirm_password) {
          echo $this->session->set_flashdata('msg','error');
        }else{
          $this->m_pengguna->simpan_pengguna_tanpa_gambar($nama, $username, $password, $email, $nohp, $level, $gambar);
          echo $this->session->set_flashdata('msg','success');
        }
      } 
    }else{
      echo $this->session->set_flashdata('msg','failed');
    }
    redirect('admin/pengguna');
	}

	function update_pengguna(){
    $config['upload_path']    = './assets/images/'; //path folder
    $config['allowed_types']  = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name']   = TRUE; //nama yang terupload nantinya

    // Jika menyertakan Photo
    $this->upload->initialize($config);
    if(!empty($_FILES['filefoto']['name'])){
      if($this->upload->do_upload('filefoto')){
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library']  ='gd2';
        $config['source_image']   ='./assets/images/'.$gbr['file_name'];
        $config['create_thumb']   = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality']        = '60%';
        $config['width']          = 300;
        $config['height']         = 300;
        $config['new_image']      = './assets/images/'.$gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $gambar   = $gbr['file_name'];
        $kode     = $this->input->post('kode');
        $nama     = $this->input->post('xnama');
        $username = $this->input->post('xusername');
        $username1= $this->input->post('xusername1');
        $password = $this->input->post('xpassword');
        $konfirm_password=$this->input->post('xpassword2');
        $email    = $this->input->post('xemail');
        $email1   = $this->input->post('xemail1');
        $nohp     = $this->input->post('xkontak');
        $level    = $this->input->post('xlevel');
        if (empty($password) && empty($konfirm_password)) {
          // Update dengan gambar tanpa password
          $hsl=$this->m_pengguna->update_pengguna_tanpa_pass($kode, $nama, $username, $email,$username1, $email1, $nohp, $level, $gambar);
          if($hsl==1){
            echo $this->session->set_flashdata('msg','info');
          }else{
            echo $this->session->set_flashdata('msg','failed');
          }
        }elseif ($password <> $konfirm_password) {
          echo $this->session->set_flashdata('msg','error');
        }else{
          // Update dengan gambar dan password
          $this->m_pengguna->update_pengguna($kode, $nama, $username, $username1, $password, $email, $email1, $nohp, $level, $gambar);
          echo $this->session->set_flashdata('msg','info');
        }
        redirect('admin/pengguna');

      }else{
        echo $this->session->set_flashdata('msg','warning');
      }
    // Tidak menyertakan dengan photo
    }else{
      $kode     = $this->input->post('kode');
      $nama     = $this->input->post('xnama');
      $username = $this->input->post('xusername');
      $username1= $this->input->post('xusername1');
      $password = $this->input->post('xpassword');
      $konfirm_password=$this->input->post('xpassword2');
      $email    = $this->input->post('xemail');
      $email1   = $this->input->post('xemail1');
      $nohp     = $this->input->post('xkontak');
      $level    = $this->input->post('xlevel');
      if (empty($password) && empty($konfirm_password)) {
        $j = $this->m_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode, $nama, $username, $email, $username1, $email1, $nohp, $level);
        if(!$j){
          echo $this->session->set_flashdata('msg','failed');
        }else{
          echo $this->session->set_flashdata('msg','info');
        }
      }elseif ($password <> $konfirm_password) {
        echo $this->session->set_flashdata('msg','error');
      }else{
        $this->m_pengguna->update_pengguna_tanpa_gambar($kode, $nama, $username, $email, $username1, $email1, $password, $nohp, $level);
        echo $this->session->set_flashdata('msg','warning');
      }
    }
    redirect('admin/pengguna');
  }

  function hapus_pengguna(){
    $kode = $this->input->post('kode');
    $hsl = $this->m_pengguna->hapus_pengguna($kode);
    if($hsl==1){
      $data = $this->m_pengguna->get_pengguna_login($kode);
      $q    = $data->row_array();
      $p    = $q['pengguna_photo'];
      if(file_exists('assets/images/'.$p)){
        if($p!="favicon.png"){
          unlink('assets/images/'.$p);
        }
        echo $this->session->set_flashdata('msg','success-hapus');
      }else{
        echo $this->session->set_flashdata('msg','failed');
      }
    }else{
      echo $this->session->set_flashdata('msg','failed');
    }
    redirect('admin/pengguna');
  }

  function reset_password(){
    $id = $this->uri->segment(4);
    $get= $this->m_pengguna->getusername($id);
    if($get->num_rows()>0){
      $a=$get->row_array();
      $b=$a['pengguna_username'];
    }
    $pass=rand(123456,999999);
    $this->m_pengguna->resetpass($id,$pass);
    echo $this->session->set_flashdata('msg','show-modal');
    echo $this->session->set_flashdata('uname',$b);
    echo $this->session->set_flashdata('upass',$pass);
    redirect('admin/pengguna');
  }

  function cetak_pengguna(){
    $x['data']=$this->m_pengguna->get_all_pengguna_cetak();
    $this->load->view('admin/vcetak_pengguna',$x); 
  }

}