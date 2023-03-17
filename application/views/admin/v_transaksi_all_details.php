<?php
date_default_timezone_set("Asia/Jakarta");
$tglHariIni=date('Y-m-d');
$akses=$this->session->userdata('akses');
?>

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
                <?php if($akses==2){?>
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
                $idDetJual    = $s['id_det_jual'];
                $nama_menu    = $s['nama_menu'];
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
          <form  action="<?= base_url().'admin/transaksi/cetak_struk' ?>"   method="post" target="_blank">
            <input type="hidden" name="no_faktur" value="<?= $nofak_jual; ?>">
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-print"></i></button>
          </form>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>