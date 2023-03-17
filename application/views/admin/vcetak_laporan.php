<?php
date_default_timezone_set("Asia/Jakarta");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>Cetak Laporan HARTINI'S Cafe & Resto</title>
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
  <body onload="window.print(); window.onafterprint = window.close; ">
    <div class="box">
      <div id="cetak">
        <?php
        $tglDari      = $_POST['tglDari'];
        $tglSampai    = $_POST['tglSampai'];
        $pengguna_id  = $_POST['pengguna_id'];
        $akses        = $_POST['akses'];

        $tgl1=date_create($tglDari);
        $tgl2=date_create($tglSampai);?>
        <span style="margin-left: 10px; font-size: 24px;">Laporan Transaksi</span></br>
        <span style="margin-left: 10px;">Periode dari tanggal: <?= date_format($tgl1, 'd M Y');?> s.d. tanggal: <?= date_format($tgl2, 'd M Y');?> </span></br>
        <span style="margin-left: 10px;">Nama Kasir: <?= $this->m_laporan->get_pengguna_nama($pengguna_id);?> </span>
        
        <table width="90%" border='1' style="margin-left: 10px;">         
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor Faktur</th>
              <th>Tanggal</th>
              <th>Kode Menu</th>
              <th>Nama Menu</th>
              <th>Harga Jual </th>
              <th>Qty </th>
              <th>Sub Total </th>
              <th>Nomor Meja</th>
              <?php 
              if($akses!=3){?>
                <th>Nama Kasir</th>
                <?php 
              }?>
            </tr>
          </thead>
          <tbody>
            <?php 
            $k=1;
            $ttl1=0;
            $ttl2=0;
            foreach ($data->result_array() as $i) :
              $tgl_jual     = $i['tgl_jual'];
              $id           = $i['pengguna_id'];
              $pengguna_nama= $i['pengguna_nama'];
              $no_meja      = $i['no_meja'];
              $nofak_jual   = $i['nofak_jual'];
              $kode_menu    = $i['kode_menu'];
              $nama_menu    = $i['nama_menu'];
              $harga_jual   = $i['harga_jual'];
              $jumlah_item  = $i['jumlah_item'];
              $tgl=date_create($tgl_jual);
              if($pengguna_id==""){
                if($tgl_jual>=$tglDari && $tgl_jual<=$tglSampai){?>
                  <tr>
                    <td align="center"><?= $k++;?>.</td>
                    <td><?= $nofak_jual;?></td>
                    <td align="center"><?= date_format($tgl, 'd M Y');?></td>
                    <td><?= $kode_menu;?></td>
                    <td><?= $nama_menu;?></td>
                    <td align="right"><?= number_format($harga_jual);?> &nbsp;</td>
                    <td align="center"><?= number_format($jumlah_item);?></td>
                    <td align="right"><?= number_format($jumlah_item*$harga_jual);?> &nbsp;</td>
                    <td align="center"><?= $no_meja;?></td>
                    <?php 
                    $ttl1=$ttl1+($jumlah_item*$harga_jual);
                    if($akses!=3){?>
                      <td><?= $pengguna_nama;?></td>
                      <?php 
                    }?>
                  </tr>
                  <?php 
                }
              }else{
                if($tgl_jual>=$tglDari && $tgl_jual<=$tglSampai && $id==$pengguna_id){?>
                  <tr>
                    <td align="center"><?= $k++;?>.</td>
                    <td><?= $nofak_jual;?></td>
                    <td align="center"><?= date_format($tgl, 'd M Y');?></td>
                    <td><?= $kode_menu;?></td>
                    <td><?= $nama_menu;?></td>
                    <td align="right"><?= number_format($harga_jual);?> &nbsp;</td>
                    <td align="center"><?= number_format($jumlah_item);?></td>
                    <td align="right"><?= number_format($jumlah_item*$harga_jual);?> &nbsp;</td>
                    <td align="center"><?= $no_meja;?></td>
                    <?php 
                    $ttl2=$ttl2+($jumlah_item*$harga_jual);
                    if($akses!=3){?>
                      <td><?= $pengguna_nama;?></td>
                      <?php 
                    }?>
                  </tr>
                  <?php 
                }
              }
            endforeach;?>

            <tr>
              <td colspan="7" align="right" height="30">Total &nbsp;</td>
              <td style="text-align:right; font-size:16px; font-weight:bold;">
                <?php 
                if($pengguna_id==""){ 
                  echo number_format($ttl1);
                }else{
                  echo number_format($ttl2);
                }?> &nbsp;
              </td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <small style="margin-left: 10px; font-weight:bold;">Dicetak Pada : <?= date('d M Y - H:i:s'); ?></small>
      </div>
    </div>
  </body>
</html>  