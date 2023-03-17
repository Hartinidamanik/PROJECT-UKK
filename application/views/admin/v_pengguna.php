<style type="text/css">
.content-header h1 {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb li a {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb .active {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-header form .btn.btn-success.btn-sm {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-body #example1 tbody tr td {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-body #example1 tbody tr td {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-body #example1 thead tr th {
  font-family: Comic Sans MS, cursive;
}
#ModalResetPassword .modal-dialog .modal-content .modal-footer .btn.btn-default {
  font-family: Comic Sans MS, cursive;
}
#ModalResetPassword .modal-dialog .modal-content .modal-body table {
  font-family: Comic Sans MS, cursive;
}
#ModalResetPassword .modal-dialog .modal-content .modal-header #myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModal {
  font-family: Comic Sans MS, cursive;
}
#example1 {
  font-family: Comic Sans MS, cursive;
}
#myModal {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModal {
  font-family: Comic Sans MS, cursive;
}
#example1 {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .form-horizontal .modal-body .form-group.form-group-sm.batas_bawah {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .form-horizontal .modal-body .form-group.form-group-sm.batas_bawah .col-sm-7 {
  font-family: Comic Sans MS, cursive;
}
.modal-dialog .modal-content .form-horizontal .modal-body .form-group.form-group-sm.batas_bawah .col-sm-7 {
  font-family: Comic Sans MS, cursive;
}
.form-group.form-group-sm.batas_bawah .col-sm-7 {
  font-family: Comic Sans MS, cursive;
}
#example1 {
  font-family: Comic Sans MS, cursive;
}
#example1 {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .modal-header #myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModal {
  font-family: Comic Sans MS, cursive;
}
#example1 {
  font-family: Comic Sans MS, cursive;
}
#example1 {
  font-family: Comic Sans MS, cursive;
}
#ModalResetPassword {
  font-family: Comic Sans MS, cursive;
}
#ModalResetPassword {
  font-family: Comic Sans MS, cursive;
}
</style>

<section class="content-header">
  <h1>Data Pengguna</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Pengguna</a></li>
    <li class="active">Data Pengguna</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <form  action="<?= base_url().'admin/pengguna/cetak_pengguna'?>" method="post" enctype="multipart/form-data" target="_blank">  
            <!-- Add Pengguna -->
            <a class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&nbsp; Tambahkan Pengguna</a>

            <!-- Cetak -->
            <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
          </form> 
        </div>
        
        <!-- Tabel Pengguna -->
        <div class="box-body">
          <table id="example1" class="table table-border">
            <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Akses</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $k=1;
                foreach ($data->result_array() as $i) :
                $pengguna_id        = $i['pengguna_id'];
                $pengguna_nama      = $i['pengguna_nama'];
                $pengguna_username  = $i['pengguna_username'];
                $pengguna_password  = $i['pengguna_password'];
                $pengguna_email     = $i['pengguna_email'];
                $pengguna_nohp      = $i['pengguna_nohp'];
                $pengguna_hak_akses = $i['pengguna_hak_akses'];
                if($pengguna_hak_akses=='1'){
                  $pLevel = "Administrator";
                }else if($pengguna_hak_akses=='2'){
                  $pLevel = "Manajer";
                }else{
                  $pLevel = "Kasir";
                }
                $pengguna_photo=$i['pengguna_photo'];?>
                <tr>
                  <td align="center"><?= $k++;?>.</td>
                  <td align="center"><img width="40" height="40" class="img-circle" src="<?= base_url().'assets/images/'.$pengguna_photo;?>"></td>
                  <td><?= $pengguna_nama;?></td>
                  <td><?= $pengguna_username;?></td>
                  <td><?= $pengguna_password;?></td>
                  <td><?= $pengguna_email;?></td>
                  <td><?= $pengguna_nohp;?></td>
                  <td><?= $pLevel; ?></td>
                  <td align="center">
                    <!-- Edit Pengguna -->
                    <a data-toggle="modal" data-target="#ModalEdit<?= $pengguna_id;?>" title="Edit"><i class="fa fa-pencil"></i></a>
                    
                    <a href="<?= base_url().'admin/pengguna/reset_password/'.$pengguna_id;?>" title="Refresh"><i class="fa fa-refresh"></i></a>

                    <!-- Hapus Pengguna -->
                    <a data-toggle="modal" data-target="#ModalHapus<?= $pengguna_id;?>" title="Hapus"><i class="fa fa-trash"></i></a>
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

<!-- Modal Simpan Pengguna -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambahkan Pengguna</h4>
      </div>

      <form class="form-horizontal" action="<?= base_url().'admin/pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- nama -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" name="xnama" class="form-control form-control-sm" id="inputUserName" placeholder="Nama Lengkap" required autocomplete="off">
            </div>
          </div>
          
          <!-- Username -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputUserName" class="col-sm-4 control-label">Username</label>
            <div class="col-sm-7">
              <input type="text" name="xusername" class="form-control form-control-sm" id="inputUserName" placeholder="Username" required autocomplete="off">
            </div>
          </div>

          <!-- Password -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-7">
              <input type="password" name="xpassword" class="form-control form-control-sm" id="inputPassword3" placeholder="Password" required>
            </div>
          </div>

          <!-- Repeat Password -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
            <div class="col-sm-7">
              <input type="password" name="xpassword2" class="form-control form-control-sm" id="inputPassword4" placeholder="Ulangi Password" required>
            </div>
          </div>

          <!-- Email -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-7">
              <input type="email" name="xemail" class="form-control form-control-sm" id="inputEmail3" placeholder="Email" required autocomplete="off">
            </div>
          </div>
          
          <!-- No HP -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="xnohp" class="col-sm-4 control-label">No HP </label>
            <div class="col-sm-7">
              <input type="text" name="xnohp" class="form-control form-control-sm" id="xnohp" placeholder="No. Telp/WA" required autocomplete="off">
            </div>
          </div>

          <!-- Hak Akses -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputUserName" class="col-sm-4 control-label">Level</label>
            <div class="col-sm-7">
              <select class="form-control form-control-sm" name="xlevel" required>
                <option value="" selected>~ Pilih Hak Akses ~</option>
                <option value="1">Admin</option>
                <option value="2">Manager</option>
                <option value="3">Kasir</option>
              </select>
            </div>
          </div>

          <!-- Photo -->
          <div class="form-group form-group-sm batas_bawah">
            <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
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
  $pengguna_id        = $i['pengguna_id'];
  $pengguna_nama      = $i['pengguna_nama'];
  $pengguna_username  = $i['pengguna_username'];
  $pengguna_password  = $i['pengguna_password'];
  $pengguna_email     = $i['pengguna_email'];
  $pengguna_nohp      = $i['pengguna_nohp'];
  $pengguna_hak_akses = $i['pengguna_hak_akses'];
  $pengguna_photo     = $i['pengguna_photo'];
  ?>
  <!--Modal Edit Pengguna-->
  <div class="modal fade" id="ModalEdit<?= $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Update Pengguna</h4>
        </div>
        
        <form class="form-horizontal" action="<?= base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <!-- Nama Pengguna -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputUserName" class="col-sm-4 control-label">Nama Pengguna</label>
              <div class="col-sm-7">
                <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                <input type="text" name="xnama" class="form-control form-control-sm" id="inputUserName" value="<?php echo $pengguna_nama;?>" placeholder="Nama Lengkap" required autocomplete="off">
             </div>
            </div>

            <!-- Username -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputUserName" class="col-sm-4 control-label">Username</label>
              <div class="col-sm-7">
                <input type="text" name="xusername" class="form-control form-control-sm" value="<?= $pengguna_username;?>" id="inputUserName" placeholder="Username" required autocomplete="off">
                <input type="hidden" name="xusername1" value="<?= $pengguna_username;?>">
              </div>
            </div>

            <!-- Password -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-7">
                <input type="password" name="xpassword" class="form-control form-control-sm" id="inputPassword3" placeholder="Password">
              </div>
            </div>

            <!-- Repeat Password -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
              <div class="col-sm-7">
                <input type="password" name="xpassword2" class="form-control form-control-sm" id="inputPassword4" placeholder="Ulangi Password">
              </div>
            </div>
        
            <!-- Email -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
              <div class="col-sm-7">
                <input type="email" name="xemail" class="form-control form-control-sm" value="<?= $pengguna_email;?>" id="inputEmail3" placeholder="Email" required autocomplete="off">
                <input type="hidden" name="xemail1" value="<?= $pengguna_email;?>">
              </div>
            </div>
         
            <!-- No Telp -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputUserName" class="col-sm-4 control-label">No HP</label>
              <div class="col-sm-7">
                <input type="text" name="xkontak" class="form-control form-control-sm" value="<?php echo $pengguna_nohp;?>" id="inputUserName" placeholder="Kontak Person" required autocomplete="off">
              </div>
            </div>

            <!-- Hak Akses -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputUserName" class="col-sm-4 control-label">Level</label>
              <div class="col-sm-7">
                <select class="form-control form-control-sm" name="xlevel" required>
                  <?php if($pengguna_hak_akses=='1'):?>
                    <option value="1" selected>Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">Kasir</option>
                  <?php elseif($pengguna_hak_akses=='2'):?>
                    <option value="1">Admin</option>
                    <option value="2" selected>Manager</option>
                    <option value="3">Kasir</option>
                  <?php elseif($pengguna_hak_akses=='3'):?>
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    <option value="3" selected>Kasir</option>
                  <?php endif;?>
                </select>
              </div>
            </div>

            <!-- Photo -->
            <div class="form-group form-group-sm batas_bawah">
              <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
              <div class="col-sm-7">
                <input type="file" name="filefoto" class="form-control form-control-sm" accept="image/*"/>
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

<!-- Hapus Pengguna -->
<?php foreach ($data->result_array() as $i) :
  $pengguna_id        = $i['pengguna_id'];
  $pengguna_nama      = $i['pengguna_nama'];
  $pengguna_email     = $i['pengguna_email'];
  $pengguna_username  = $i['pengguna_username'];
  $pengguna_password  = $i['pengguna_password'];
  $pengguna_nohp      = $i['pengguna_nohp'];
  $pengguna_level     = $i['pengguna_level'];
  $pengguna_photo     = $i['pengguna_photo'];?>

  <div class="modal fade" id="ModalHapus<?= $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
        </div>
      
        <form class="form-horizontal" action="<?= base_url().'admin/pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
            <p>Apakah Anda yakin mau menghapus Pengguna <b><?= $pengguna_nama;?></b> ?</p>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>

<!--Modal Reset Password-->
<div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
      </div>

      <div class="modal-body">
        <table>
          <tr>
            <th style="width:120px;">Username</th>
            <th>:</th>
            <th><?php echo $this->session->flashdata('uname');?></th>
          </tr>
          <tr>
            <th style="width:120px;">Password Baru</th>
            <th>:</th>
            <th><?php echo $this->session->flashdata('upass');?></th>
          </tr>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>