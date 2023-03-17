<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>Cetak Transaksi HARTINI'S Cafe & Resto</title>
    <!-- Logo -->
    <link rel="shorcut icon" type="text/css" href="<?= base_url().'assets/images/favicon.png'?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <style>
      tr>th{text-align: center; height: 35px !important;;}
      tr>td{padding-left: 5px;vertical-align: middle !important;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
      tr>td.right{text-align: right!important; padding-right: 3px;}
    </style>
  </head>
  <body onload="window.print(); window.onafterprint = window.close; ">
    <?php 
      $akses        = $_POST['akses'];
      $pengguna_id  = $_POST['pengguna_id'];
      $tglDari      = $_POST['tglDari'];
      $tglSampai    = $_POST['tglSampai'];
    ?>

    <span style="margin-left: 10px; font-size: 24px;">LAPORAN TRANSAKSI</span>
    <span style="margin-left: 10px; font-size: 24px;"></span></br>
    <span style="margin-left: 10px;">Periode dari tanggal: <?= date_format(date_create($_POST['tglDari']), 'd M Y');?> s.d. tanggal: <?= date_format(date_create($_POST['tglSampai']), 'd M Y');?> </span></br>
    <?php 
    if($pengguna_id!=""){?>
      <span style="margin-left: 10px;">Nama Kasir: <?= $this->m_laporan->get_pengguna_nama($pengguna_id);?> </span>
      <?php 
    }?>
    <table class="table table-bordered" style="width:98%; margin-left: 10px; margin-bottom:0px;">         
      <thead>
        <tr>
          <th>No</th>
          <th>Nomor Faktur</th>
          <th>Tanggal</th>
          <th>Detail</th>
          <th>Total </th>
          <th>Nomor Meja</th>
          <?php 
          if($pengguna_id == ""){?>
            <th>Nama Kasir</th>
            <?php 
          }?>
        </tr>
      </thead>
      <tbody>
        <?php
          $k=1;
          $ttl=0;
          foreach ($data->result_array() as $i) :
            $tgl_jual     = $i['tgl_jual'];
            $nofak_jual   = $i['nofak_jual'];
            $total_harga  = $i['total_harga'];
            $no_meja      = $i['no_meja'];
            $pengguna_nama= $i['pengguna_nama'];
            $ttl          = $ttl+$total_harga;
            if($tgl_jual>=$tglDari && $tgl_jual<=$tglSampai){?>
              <tr>
                <td align="center"><?= $k++;?>.</td>
                <td><?= $nofak_jual;?></td>
                <td align="center"><?= date_format(date_create($tgl_jual), 'd M Y');?></td>
                <td align="center">
                  <table class="table table-bordered" style="margin-top:5px; margin-bottom:5px; width:98%;">
                    <thead>
                      <tr >
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga Jual</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $dt=$this->m_transaksi->get_details($nofak_jual);
                      foreach ($dt->result_array() as $s) :
                        $nama_menu    = $s['nama_menu'];
                        $idDetJual    = $s['id_det_jual'];
                        $jumlah_item  = $s['jumlah_item'];
                        $harga_jual   = $s['harga_jual'];?>
                        <tr>
                          <td align="center"><?= $no++;?>.</td>
                          <td><?= $nama_menu;?></td>
                          <td align="right"><?= number_format($harga_jual);?></td>
                          <td align="right"><?= $jumlah_item;?></td>
                          <td align="right"><?= number_format($harga_jual*$jumlah_item);?></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </td>
                <td align="right"><?= number_format($total_harga);?></td>
                <td align="center"><?= $no_meja;?></td>
                <?php 
                if($pengguna_id == ""){?>
                  <td><?= $pengguna_nama;?></td>
                  <?php 
                }?>
              </tr>
              <?php
            }
          endforeach;
        ?>
      </tbody>
      <tr height="40px">
        <td align="right" colspan="4">Total &nbsp;</td>
        <td align="right"><?= number_format($ttl); ?> &nbsp;</td>
        <td></td>
        <?php 
        if($pengguna_id =="" ){?>
          <td></td>
          <?php 
        }?>
      </tr>
     
    </table>
    <?php 
      date_default_timezone_set("Asia/Jakarta");
    ?>
    <small style="margin-left: 10px; font-weight:bold;">Dietak : <?= date('d M Y - H:i:s'); ?></small><br>
  </body>
</html>  