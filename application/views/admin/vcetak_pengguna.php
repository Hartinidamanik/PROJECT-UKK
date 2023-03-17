<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>Cetak Data Pengguna HARTINI'S Cafe & Resto</title>
    <!-- Logo -->
    <link rel="shorcut icon" type="text/css" href="<?= base_url().'assets/images/favicon.png'?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css'?>">

    <style>
      tr>th{text-align: center; height: 35px; border: 2px solid;}
      tr>td{padding-left: 5px;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
    </style>
    
  </head>

  <body onload="window.print(); window.onafterprint = window.close;">
    <span style="margin-left: 10px; font-size: 24px;">Laporan Data Pengguna</span>
    <table width="90%" border='1' style="margin-left: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Photo</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>
          <th>No HP</th>
          <th>Hak Akses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($data->result_array() as $i) :
          $pengguna_id        = $i['pengguna_id'];
          $pengguna_nama      = $i['pengguna_nama'];
          $pengguna_username  = $i['pengguna_username'];
          $pengguna_password  = $i['pengguna_password'];
          $pengguna_email     = $i['pengguna_email'];
          $pengguna_nohp      = $i['pengguna_nohp'];
          $pengguna_hak_akses = $i['pengguna_hak_akses'];
          if($pengguna_hak_akses=='1'){
            $pLevel = "Administrator";
          }else if($pengguna_hak_akses=='2'){
            $pLevel = "Manajer";
          }else{
            $pLevel = "Kasir";
          }
          $pengguna_photo=$i['pengguna_photo'];?>
          <tr>
            <td align="center"><?= $no++;?>.</td>
            <td align="center">
              <img width="30" height="30" class="img-circle" src="<?= base_url().'assets/images/'.$pengguna_photo;?>">
            </td>
            <td><?= $pengguna_nama;?></td>
            <td><?= $pengguna_username;?></td>
            <td><?= $pengguna_password;?></td>
            <td><?= $pengguna_email;?></td>
            <td><?= $pengguna_nohp;?></td>
            <td><?= $pLevel;?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </body>
</html>

