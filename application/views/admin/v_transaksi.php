<?php
date_default_timezone_set("Asia/Jakarta");
$tglHariIni=date('Y-m-d');
$akses=$this->session->userdata('akses');
?>

<section class="content-header">
  <h1>Data Transaksi</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Transaksi</a></li>
    <li class="active">Transaksi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?php
          if($akses==3){?>
            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" id="addTransaksi"><i class="fa fa-plus"></i>&nbsp; Tambahkan Transaksi</a>
            <?php
          }else{?>
            <form  action="<?= base_url().'admin/transaksi/cetak_transaksi'?>" method="post" enctype="multipart/form-data" target="_blank">
              <input type="hidden" name="akses" value="<?= $akses; ?>">

              <div class="container">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="input-group">
                      <span class="input-group-addon" style="background-color:aqua;">Dari</span>
                      <input type="date" name="tglDari" class="form-control" value="<?= $tglHariIni;?>" style="width:150px;">
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="input-group">
                      <span class="input-group-addon" style="background-color:aqua;">Sampai</span>
                      <input type="date" name="tglSampai" class="form-control" value="<?= $tglHariIni;?>" style="width:150px;">
                    </div>
                  </div>

                  <!-- Jika Sebagai kasir -->
                  <?php
                  if($akses=="3"){?>
                    <input type="hidden" name="pengguna_id" value="<?= $this->session->userdata('idadmin'); ?>">
                    <?php
                  }else{?>
                    <div class="col-sm-2" style="margin-left:30px; width:220px;">
                      <select name="pengguna_id" id="pengguna_id" class="form-control chosen-select" >
                        <option value="" selected>~ Pilih Nama Kasir~</option>
                        <?php
                        $data1 = $this->m_laporan->get_all_pengguna();
                        foreach ($data1->result_array() as $k) {
                          $pengguna_id    = $k['pengguna_id'];
                          $pengguna_nama  = $k['pengguna_nama'];?>
                          <option value="<?= $pengguna_id;?>"><?= $pengguna_nama;?></option>
                          <?php 
                        }?>
                      </select>
                    </div>
                    <?php 
                  }?>
                    
                  <div class="col-sm-3">
                    <div class="input-group">
                      <?php
                      if($akses=="3"){?>
                        <a class="btn btn-primary lapCariTransaksi"><i class="glyphicon glyphicon-search" style="margin-left:25px;"></i> Cari</a>
                        <?php
                      }else{?>
                        <a class="btn btn-primary lapCariTransaksi"><i class="glyphicon glyphicon-search" style="margin-left:0px;"></i> Cari</a>
                        <?php
                      }?>
                      <button type="submit" class="btn btn-success cetakLaporan"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <?php 
          }?>
        </div>
        
        <!-- Tabel Pengguna -->
        <div class="box-body" id="allTransaksi">
          <table id="example1" class="table cell-border">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Faktur</th>
                <th>Tanggal</th>
                <th>Detail</th>
                <th>Total </th>
                <th>Nomor Meja</th>
                <th>Nama Kasir</th>
                <th>Cetak</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $k=1;
                foreach ($data->result_array() as $i) :
                $nofak_jual   = $i['nofak_jual'];
                $tgl_jual     = date_create($i['tgl_jual']);
                $total_harga  = $i['total_harga'];
                $no_meja      = $i['no_meja'];
                $pengguna_nama= $i['pengguna_nama'];?>
               
                <tr>
                  <td align="center"><?= $k++;?>.</td>
                  <td><?= $nofak_jual;?></td>
                  <td align="center"><?= date_format($tgl_jual, 'd M Y');?></td>
                  <td align="center">
                    <table class="table" style="margin-bottom: 0px;">
                      <thead>
                        <tr >
                          <th>No</th>
                          <th>Nama Menu</th>
                          <th>Harga Jual</th>
                          <th>Jumlah</th>
                          <th>Sub Total</th>
                          <?php 
                          if($akses==2){?>
                            <th>Action</th>
                            <?php
                          }?>
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
                            <?php if($akses==2){?>
                              <td align="center"><a id=<?= $idDetJual;?> id1=<?= $nofak_jual;?> title="Hapus" class="transaksiDetailsHapus"><i class="fa fa-trash text-danger"></i></td>
                              <?php
                            }?>
                            
                          </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </td>
                  <td align="right"><?= number_format($total_harga);?></td>
                  <td align="center"><?= $no_meja;?></td>
                  <td><?= $pengguna_nama;?></td>
                  
                  <td align="center">
                    <form action="<?= base_url().'admin/transaksi/cetak_struk' ?>" method="post" target="_blank">
                      <input type="hidden" name="no_faktur" value="<?= $nofak_jual; ?>">
                      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-print"></i></button>
                    </form>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Simpan Transaksi -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Menu Transaksi</h4>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 bg-primary" style="width: 30%; margin-left:10px;">
            <form class="form-horizontal" method="post" id="transaksiMenu">
              <div class="modal-body">
                <!-- Tanggal -->
                <div class="form-group form-group-sm batas_bawah">
                  <label class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_jual" class="form-control form-control-sm" value="<?= $tglHariIni;?>">
                  </div>
                </div>
                
                <!-- Nama Menu -->
                <div class="form-group form-group-sm batas_bawah">
                  <label class="col-sm-4 control-label">Nama Menu</label>
                  <div class="col-sm-8">
                    <select name="kode_menu" id="kode_menu" class="form-control chosen-select">
                      <option value="">~ Pilih Menu ~</option>
                      <?php
                      $data1 = $this->m_transaksi->get_all_menu();
                      foreach ($data1->result_array() as $k) {
                        $kode_menu = $k['kode_menu'];
                        $nama_menu = $k['nama_menu'];
                        $harga_jual= $k['hrg_jual'];?>
                        <option value="<?= $kode_menu;?>"><?= $nama_menu;?>- Rp. &nbsp;<?= number_format($harga_jual);?></option>
                        <?php 
                      }?>
                    </select>
                  </div>
                </div>

                <!-- Qty dan No. Meja-->
                <div class="form-group form-group-sm batas_bawah">
                  <label class="col-sm-4 control-label">Qty</label>
                  <div class="col-sm-3">
                    <input type="text" name="qty" class="form-control form-control-sm text-right angkaSemua" placeholder="Qty" required autocomplete="off">
                  </div>
                  <label class="col-sm-2 control-label" style="margin-left: -20px; width:73px; display: inline-block; padding-right:0;">No Meja</label>
                  <div class="col-sm-3">
                    <input type="text" name="no_meja" class="form-control form-control-sm text-right angkaSemua" placeholder="Meja" required" autocomplete="off"> 
                  </div>
                </div>

                <div class="modal-footer col-sm-12">
                  <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal" id="transaksiClose">Close</button>
                 
                  <a class="btn btn-success btn-flat btn-sm" id="transaksiSimpan"> Save</a>

                  <a class="btn btn-success btn-flat btn-sm" id="transaksiBaru"> New&nbsp;&nbsp;</a>

                </div>
              </div>
            </form>       
          </div>

          <!-- Detail Penjualan -->
          <div class="col-sm-6" style="width: 45%; padding:0">
            <div class="panel panel-success" style="margin-left:10px; margin-right:10px;">

              <!-- Panel Header -->
              <div class="panel-heading panel-heading-success">
                <div class="form-group form-group-sm" style="padding-bottom: 10px;">
                  <label class="col-sm-3 group-control-label" style=" margin-top: 2px; padding-left:0;">No Faktur Jual: </label>
                  <div class="col-sm-9">
                    <input class="group-control" type="text" name="no_faktur" readonly style="border: none; background:transparent; font-weight:bold;">
                  </div>
                </div>
              </div>

              <!-- Body -->
              <div class="panel-body" style="margin-bottom: -25px;">
                <div class="tampilkanDetails">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Nama Menu</th>
                        <th>Harga Jual</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

              <div class="panel-footer" >
                <table style="width:100%; margin-top:-5px;">
                  <form action="<?= base_url().'admin/transaksi/simpan_transaksi_bayar'?>" method="POST" target="_blank">
                    <input type="hidden" name="no_faktur">
       
                    <!-- Total Penjualan -->
                    <tr>
                      <td style="text-align:right; width:350px; border:0px; padding-right:10px;">Total Penjualan</td>
                      <td style="border:0px; width:100px;">Rp. </td>
                      
                      <td style="padding-right:5px; font-weight:bold; width:150px;"><input class="input-control text-right" type="text" name="total_penjualan" id="total_penjualan" readonly></td>

                      <td rowspan="3" style="border:0px; ">
                        <button type="submit" class="btn btn-lg btn-success cekBayar"><i class="fa fa-dollar fa-2x"></i></button>
                      </td>
                    </tr>

                    <!-- Total Pembayaran -->
                    <tr>
                      <td style="text-align:right; border:0px; padding-right:10px;">Total Bayar</td>
                      <td style="border:0px;">Rp. </td>

                      <td style="padding-right:5px; font-weight:bold; width:150px;"><input type="text" class="input-control input-control-sm text-right money angkaSemua" name="total_bayar" id="total_bayar" autocomplete="off"></td>
                    </tr>

                    <!-- Total Pengembalian -->
                    <tr>
                      <td style="text-align:right; border:0px; padding-right:10px;">Total Kembalian</td>
                      <td style="border:0px;">Rp. </td>
                      
                      <td style="padding-right:5px; font-weight:bold; width:150px;"><input class="input-control text-right" type="text" name="total_kembali" id="total_kembali" readonly></td>
                    </tr>
                  </form>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>