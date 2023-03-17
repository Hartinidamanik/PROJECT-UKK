<style type="text/css">
.content-header h1 {
  font-family: Lucida Console, Monaco, monospace;
}
.content-header h1 {
  font-family: Verdana, Geneva, sans-serif;
}
.content-header h1 {
  font-family: Tahoma, Geneva, sans-serif;
}
.content-header h1 {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
.content-header .breadcrumb li a {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
.content-header .breadcrumb .active {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
.content .row .col-xs-12 .box .box-header form #simpan {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
.content .row .col-xs-12 .box .box-header form #simpan {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
.content .row .col-xs-12 .box .box-body {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
#myModal .modal-dialog .modal-content .modal-header {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
#simpan {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
#example1 {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
#example1 {
  font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
</style>

<section class="content-header">
  <h1>Data Menu</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Menu</a></li>
    <li class="active">Data Menu</li>
  </ol>
</section>

<!-- Main content Tabel-->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <form  action="<?php echo base_url().'admin/menu/cetak_menu'?>" method="post" enctype="multipart/form-data" target="_blank">
            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&nbsp; Tambahkan Menu</a> 

            <!-- Cetak Data -->
            <button type="submit" class="btn btn-success btn-sm" id="simpan"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak </button>
          </form> 
        </div>

        <!-- Tabel -->
        <div class="box-body" style="width: 85%;">
          <table id="example1" class="table table-striped">
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
                <th>Action</th>
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
                  <td align="right"><?= number_format($hargaJual);?></td>
                  <td><?= $deskripsi;?></td>
                  <td align="center">
                    <a data-toggle="modal" data-target="#ModalEdit<?= $kodeMenu;?>" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a data-toggle="modal" data-target="#ModalHapus<?= $kodeMenu;?>" title="Hapus"><i class="fa fa-trash"></i></a>
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

<!--Modal Add Menu-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambahkan Menu </h4>
      </div>

      <form class="form-horizontal" action="<?= base_url().'admin/menu/simpan_menu'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- Kode Menu -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="kode_menu" class="col-sm-4 control-label">Kode Menu</label>
            <div class="col-sm-7">
              <input type="text" name="kode_menu" class="form-control form-control-sm" id="kode_menu" placeholder="Input Kode Menu " required autocomplete="off" maxlength="12">
            </div>
          </div>

          <!-- Nama Menu -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="nama_menu" class="col-sm-4 control-label">Nama Menu</label>
            <div class="col-sm-7">
              <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Input Nama Menu" required autocomplete="off">
            </div>
          </div>

          <!-- Jenis Menu -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="id_jenis" class="col-sm-4 control-label">Jenis Menu</label>
            <div class="col-sm-7">
              <select name="id_jenis" id="id_jenis" class="form-control form-control-sm" required>
                <option value="" selected>~ Pilih Jenis ~</option>
                <?php
                $data1 = $this->m_menu->get_all_jenis();
                foreach ($data1->result_array() as $k) {
                  $idJenis    = $k['id_jenis'];
                  $jenisMenu  = $k['jenis_menu'];?>
                  <option value="<?= $idJenis;?>"><?= $jenisMenu;?></option>
                  <?php 
                }?>
              </select>
            </div>
          </div>

          <!-- Satuan -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="satuan" class="col-sm-4 control-label">Nama Satuan</label>
            <div class="col-sm-7">
              <select name="satuan" class="form-control form-control-sm" required>
                <option value="" selected>~ Pilih Satuan ~</option>
                <option value="pcs">Pcs</option>
                <option value="paket">Paket</option>
              </select>
            </div>
          </div>

          <!-- Harga Jual -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="harga_jual" class="col-sm-4 control-label">Harga Jual</label>
            <div class="col-sm-7">
              <input type="text" name="harga_jual" class="form-control form-control-sm text-right angkaSemua money" id="harga_jual" placeholder="Input Harga Jual" required autocomplete="off">
            </div>
          </div>

          <!-- Deskripsi -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="deskripsi" class="col-sm-4 control-label">Deskripsi</label>
            <div class="col-sm-7">
              <textarea name="deskripsi" id="harga_jual" cols="50" rows="2" class="form-control form-control-sm"></textarea>
            </div>
          </div>

          <!-- Photo -->
          <div class="form-group form-group-sm batas_bawah">
            <label class="col-sm-4 control-label">Gambar</label>
            <div class="col-sm-7">
              <input type="file" name="filefoto" class="form-control form-control-sm" accept="image/*" />
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat btn-sm" id="simpan">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Edit Pengguna-->
<?php foreach ($data->result_array() as $i) :
  $kodeMenu     = $i['kode_menu'];
  $namaMenu     = $i['nama_menu'];
  $idJenis      = $i['id_jenis'];
  $satuan       = $i['satuan'];
  $hargaJual    = $i['hrg_jual'];
  $deskripsi    = $i['deskripsi'];
  $photo        = $i['photo_makanan'];
  $pengguna_id  = $i['pengguna_id'];?>
  <div class="modal fade" id="ModalEdit<?= $kodeMenu;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Update Data Menu</h4>
        </div>

        <form class="form-horizontal" action="<?= base_url().'admin/menu/update_menu'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <!-- Pengguna Id -->
            <input type="hidden" name="pengguna_id" value="<?= $pengguna_id;?>">
            
            <!-- Kode Menu -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="kode_menu" class="col-sm-4 control-label">Kode Menu</label>
              <div class="col-sm-7">
                <input type="text" name="kode_menu" class="form-control form-control-sm" id="kode_menu" value="<?= $kodeMenu;?>" readonly>
              </div>
            </div>

            <!-- Nama Menu -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="nama_menu" class="col-sm-4 control-label">Nama Menu</label>
              <div class="col-sm-7">
                <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Input Nama Menu" required autocomplete="off" value="<?= $namaMenu;?>">
                
                <input type="hidden" name="nama_menu1" value="<?= $namaMenu;?>">
              </div>
            </div>

            <!-- Jenis Menu -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="id_jenis" class="col-sm-4 control-label">Jenis Menu</label>
              <div class="col-sm-7">
                <select name="id_jenis" id="id_jenis" class="form-control form-control-sm" required>
                  <option value="">~ Pilih Jenis ~</option>
                  <?php
                  $data1 = $this->m_menu->get_all_jenis();
                  foreach ($data1->result_array() as $k) {
                    $id_jenis   = $k['id_jenis'];
                    $jenis_menu = $k['jenis_menu'];?>
                    <option value="<?= $id_jenis;?>" <?php if($id_jenis==$idJenis){echo "selected";};?>><?= $jenis_menu;?></option>
                    <?php 
                  }?>
                </select>
              </div>
            </div>

            <!-- Satuan -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="satuan" class="col-sm-4 control-label">Nama Satuan</label>
              <div class="col-sm-7">
                <select name="satuan" class="form-control form-control-sm" required>
                  <option value="">~ Pilih Satuan ~</option>
                  <option value="pcs" <?php if($satuan=="pcs"){echo "selected";};?>>Pcs</option>
                  <option value="paket" <?php if($satuan=="paket"){echo "selected";};?>>Paket</option>
                </select>
              </div>
            </div>

            <!-- Harga Jual -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="harga_jual" class="col-sm-4 control-label">Harga Jual</label>
              <div class="col-sm-7">
                <input type="text" name="harga_jual" class="form-control form-control-sm text-right money angkaSemua" id="harga_jual" placeholder="Input Harga Jual" required autocomplete="off" value="<?= $hargaJual;?>">
              </div>
            </div>
            
            <!-- Deskripsi -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="deskripsi" class="col-sm-4 control-label">Deskripsi</label>
              <div class="col-sm-7">
                <textarea name="deskripsi" id="harga_jual" cols="50" rows="2" class="form-control form-control-sm"><?= $deskripsi;?></textarea>
              </div>
            </div>
        
             <!-- gambar -->
             <div class="form-group form-group-sm batas_bawah">
              <label class="col-sm-4 control-label">Gambar</label>
              <div class="col-sm-1">
                <img src="<?= base_url().'assets/images/'.$photo;?>" alt="photo" width="40" height="40">
              </div>
              <div class="col-sm-6">
                <input type="file" name="filefoto" class="form-control form-control-sm" accept="image/*" style="margin-top: 10px;"/>
              </div>
            </div>
          </div> 

          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat btn-sm" id="simpan">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>

<!--Modal Hapus Pengguna-->
<?php foreach ($data->result_array() as $i) :
  $kodeMenu =  $i['kode_menu'];?>
  <div class="modal fade" id="ModalHapus<?= $kodeMenu;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Data Menu</h4>
        </div>

        <form class="form-horizontal" action="<?= base_url().'admin/menu/hapus_menu'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode_menu" value="<?= $kodeMenu;?>"/>
           <p>Apakah Anda yakin akan menghapus Data Menu?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat btn-sm" id="simpan">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>