<table class="table cell-border">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Menu</th>
      <th>Harga Jual</th>
      <th>Qty</th>
      <th>Sub Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $k=1;
      foreach ($data->result_array() as $i) :
      $idDetJual = $i['id_det_jual'];
      $nofak_jual  = $i['nofak_jual'];
      $nama_menu   = $i['nama_menu'];
      $harga_jual  = $i['harga_jual'];
      $jumlah_item = $i['jumlah_item'];
      $sub = $harga_jual * $jumlah_item;?>
      
      <tr>
        <td align="center"><?= $k++;?>.</td>
        <td><?= $nama_menu;?></td>
        <td align="right"><?= number_format($harga_jual);?></td>
        <td align="right"><?= $jumlah_item;?></td>
        <td align="right"><?= number_format($sub);?></td>
        <td align="center"><a id=<?= $idDetJual;?> id1=<?= $nofak_jual;?> title="Hapus" class="transaksiDetailsHapus"><i class="fa fa-trash text-danger"></i></td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>


