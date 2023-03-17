<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>Cetak Data Jenis Menu HARTINI'S Cafe & Resto</title>
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
    <span style="margin-left: 10px; font-size: 24px">Laporan Jenis Menu</span>
    <table width="60%" border='1' style="margin-left: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>id Jenis</th>
          <th>Jenis Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
        foreach ($data->result_array() as $i) :
          $no++;
          $idJenis    = $i['id_jenis'];
          $namaJenis  = $i['jenis_menu'];?>
          <tr>
            <td align="center"><?= $no;?>.</td>
            <td><?= $idJenis;?></td>
            <td><?= $namaJenis;?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </body>
</html>
