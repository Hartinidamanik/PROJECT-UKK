<?php
date_default_timezone_set("Asia/Jakarta");
$tglHariIni =date('Y-m-d');
$nama = $this->session->userdata('nama');
$akses= $this->session->userdata('akses');
$id   = $this->session->userdata('idadmin');
      
?>

<div class="cetakAllLaporan">
  <section class="content-header">
    <h1>Data Laporan Transaksi</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Transaksi</a></li>
      <li class="active">Data Laporan Transaksi</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <form  action="<?= base_url().'admin/laporan/cetak_laporan'?>" method="post" enctype="multipart/form-data" target="_blank">
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
                    <input type="hidden" name="pengguna_id" value="<?= $id; ?>">
                    <?php
                  }else{?>
                    <div class="col-sm-2" style="margin-left:30px; width:220px;">
                      <select name="pengguna_id" id="pengguna_id" class="form-control chosen-select" >
                        <option value="" selected>~ Pilih Nama Kasir ~</option>
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
                        <a class="btn btn-primary lapCari"><i class="glyphicon glyphicon-search" style="margin-left:25px;"></i> Cari</a>
                        <?php
                      }else{?>
                        <a class="btn btn-primary lapCari"><i class="glyphicon glyphicon-search" style="margin-left:0px;"></i> Cari</a>
                        <?php
                      }?>
                      <button type="submit" class="btn btn-success cetakLaporan"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="box-body" id="transPeriode">
            <table id="example1" class="table cell-border">
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
                  <th>Nama Pegawai</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $k=1;
                foreach ($data->result_array() as $i) :
                  $pengguna_nama= $i['pengguna_nama'];
                  $no_meja      = $i['no_meja'];
                  $nofak_jual   = $i['nofak_jual'];
                  $tgl_jual     = date_create($i['tgl_jual']);
                  $kode_menu    = $i['kode_menu'];
                  $nama_menu    = $i['nama_menu'];
                  $harga_jual   = $i['harga_jual'];
                  $jumlah_item  = $i['jumlah_item'];?>
                
                  <tr>
                    <td align="center"><?= $k++;?>.</td>
                    <td><?= $nofak_jual;?></td>
                    <td align="center"><?= date_format($tgl_jual, 'd M Y');?></td>
                    <td><?= $kode_menu;?></td>
                    <td><?= $nama_menu;?></td>
                    <td align="right"><?= number_format($harga_jual);?></td>
                    <td align="right"><?= number_format($jumlah_item);?></td>
                    <td align="right"><?= number_format($jumlah_item*$harga_jual);?></td>
                    <td align="center"><?= $no_meja;?></td>
                    <td><?= $pengguna_nama;?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>