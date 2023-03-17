<style type="text/css">
.content-header h1 {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb li a .fa.fa-dashboard {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb li a {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-header form .btn.btn-success.btn-sm {
  font-family: Comic Sans MS, cursive;
}
.content .row {
  font-family: Comic Sans MS, cursive;
}
</style>


<?php $akses=$this->session->userdata('akses'); ?>
<section class="content-header">
  <h1>HISTORY LOG</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">History Log</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <form  action="<?= base_url().'admin/log/cetak_log'?>" method="post" enctype="multipart/form-data" target="_blank">
            <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> Cetak</button>
          </form>  
        </div> 
        <div id="cetak" class="box-body">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th>No</th>
                <th width="120px">Tanggal</th>
                <th width="180px">Nama Pengguna</th>
                <th>Action</th>
                <?php 
                if($akses=="2"){?>
                  <th></th>
                  <?php 
                }?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=0;
              $tBayar =0;
              foreach ($data->result_array() as $a) :
                $no++;
                $pengunjung_id= $a['pengunjung_id'];
                $pengguna_id  = $a['pengguna_id'];
                $nama         = $a['pengguna_nama'];
                if($nama=="Belum Ada Pengguna"){
                  $nama = $this->m_log->update_log($pengguna_id, $pengunjung_id, $nama);
                  // $nama = $this->m_log->update_log2($pengguna_id);
                }?>
                <tr>
                  <td style="text-align: center"><?= $no;?>.</td>
                  <td align="center"><?= $a['pengunjung_tanggal'];?></td>
                  <td><?= $nama;?></td>
                  <td><?= $a['aksi'];?></td>
                  <?php 
                  if($akses=="2"){?>
                    <td align="center">
                      <form  action="<?= base_url().'admin/log/hapus_log'?>" method="post">
                        <input type="hidden" name="pengunjung_id" value="<?= $pengunjung_id; ?>">
                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Data akan dihapus?');" class="text-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>  
                     
                    </td>
                    <?php 
                  }?>

                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

