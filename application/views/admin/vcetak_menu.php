 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>Cetak Daftar Menu HARTINI'S Cafe & Resto</title>
    <!-- Logo -->
    <link rel="shorcut icon" type="text/css" href="<?= base_url().'assets/images/favicon.png'?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css'?>">

    <style>
      tr>th{text-align: center; height: 35px; border: 2px solid;}
      tr>td{padding-left: 5px;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
      tr>td.right{text-align: right!important; padding-right: 3px;}
    </style>
  </head>
  <body onload="window.print(); window.onafterprint = window.close;">
    <span style="margin-left: 10px; font-size: 24px">Laporan Daftar Menu</span>
    <table width="80%" border='1' style="margin-left: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Kode Menu</th>
          <th>Nama Menu</th>
          <th>Jenis Menu</th>
          <th>Satuan</th>
          <th>Harga Jual</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
        foreach ($data->result_array() as $i) :
          $no++;
          $photoMakanan = $i['photo_makanan'];
          $kodeMenu     = $i['kode_menu'];
          $jenisMenu    = $i['jenis_menu'];
          $namaMenu     = $i['nama_menu'];
          $hargaJual    = $i['hrg_jual'];
          $deskripsi    = $i['deskripsi'];
          $satuan       = $i['satuan'];?>
          <tr>
            <td align="center"><?= $no;?>.</td>
            <td align="center"><img width="40" height="40" class="img-circle" src="<?= base_url().'assets/images/'.$photoMakanan;?>"></td>
            <td><?= $kodeMenu;?></td>
            <td><?= $namaMenu;?></td>
            <td><?= $jenisMenu;?></td>
            <td><?= $satuan;?></td>
            <td class="right"><?= number_format($hargaJual);?></td>
            <td><?= $deskripsi;?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </body>
</html>

