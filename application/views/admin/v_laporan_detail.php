<table id="example1" class="table cell-border">
  <thead>
    <tr>
      <th>No</th>
      <th>Nomor Faktur</th>
      <th>Tanggal</th>
      <th>Kode Menu</th>
      <th>Nama Menu</th>
      <th>Harga Jual</th>
      <th>Qty</th>
      <th>Sub Total</th>
      <th>Nomor Meja</th>
      <th>Nama Pegawai</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $akses        = $this->session->userdata('akses');
    $id_pengguna  = $this->session->userdata('idadmin');
    
    $tglDari      = $_POST['tglDari']; 
    $tglSampai    = $_POST['tglSampai']; 
    $pengguna_id  = $_POST['pengguna_id']; 
    $k=1;
    foreach ($data->result_array() as $i) :
      $tgl_jual     = $i['tgl_jual'];
      $tgl          = date_create($i['tgl_jual']);
      $id           = $i['pengguna_id'];
      $pengguna_nama= $i['pengguna_nama'];
      $no_meja      = $i['no_meja'];
      $nofak_jual   = $i['nofak_jual'];
      $kode_menu    = $i['kode_menu'];
      $nama_menu    = $i['nama_menu'];
      $harga_jual   = $i['harga_jual'];
      $jumlah_item  = $i['jumlah_item'];
      if($akses==3){
        if($id_pengguna==$id && $tgl_jual>=$tglDari && $tgl_jual<=$tglSampai){?>
          <tr>
            <td align="center"><?= $k++;?>.</td>
            <td><?= $nofak_jual;?></td>
            <td align="center"><?= date_format($tgl, 'd M Y');?></td>
            <td><?= $kode_menu;?></td>
            <td><?= $nama_menu;?></td>
            <td align="right"><?= number_format($harga_jual);?></td>
            <td align="right"><?= number_format($jumlah_item);?></td>
            <td align="right"><?= number_format($jumlah_item*$harga_jual);?></td>
            <td align="center"><?= $no_meja;?></td>
            <td><?= $pengguna_nama;?></td>
          </tr>
          <?php 
        }
      }else{
        if($pengguna_id=="" && $tgl_jual>=$tglDari && $tgl_jual<=$tglSampai){?>
          <tr>
            <td align="center"><?= $k++;?>.</td>
            <td><?= $nofak_jual;?></td>
            <td align="center"><?= date_format($tgl, 'd M Y');?></td>
            <td><?= $kode_menu;?></td>
            <td><?= $nama_menu;?></td>
            <td align="right"><?= number_format($harga_jual);?></td>
            <td align="right"><?= number_format($jumlah_item);?></td>
            <td align="right"><?= number_format($jumlah_item*$harga_jual);?></td>
            <td align="center"><?= $no_meja;?></td>
            <td><?= $pengguna_nama;?></td>
          </tr>
          <?php 
        }else if($pengguna_id==$id && $tgl_jual>=$tglDari && $tgl_jual<=$tglSampai){?>
          <tr>
            <td align="center"><?= $k++;?>.</td>
            <td><?= $nofak_jual;?></td>
            <td align="center"><?= date_format($tgl, 'd M Y');?></td>
            <td><?= $kode_menu;?></td>
            <td><?= $nama_menu;?></td>
            <td align="right"><?= number_format($harga_jual);?></td>
            <td align="right"><?= number_format($jumlah_item);?></td>
            <td align="right"><?= number_format($jumlah_item*$harga_jual);?></td>
            <td align="center"><?= $no_meja;?></td>
            <td><?= $pengguna_nama;?></td>
          </tr>
          <?php 
        }
      }
      endforeach;?>
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
