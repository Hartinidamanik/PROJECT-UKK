<style type="text/css">
.content-header h1 {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb li a {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .modal-header #myModalLabel {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-body #example1 thead tr th {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .form-horizontal .modal-body .form-group.form-group-sm {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .form-horizontal .modal-footer .btn.btn-default.btn-flat.btn-sm {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .form-horizontal .modal-footer #simpan {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-header form .btn.btn-success.btn-flat.btn-sm {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-xs-12 .box .box-header form .btn.btn-success.btn-sm {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
body p {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModal .modal-dialog .modal-content .form-horizontal .modal-body .form-group.form-group-sm .col-sm-7 {
  font-family: Comic Sans MS, cursive;
}
#myModal {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModalLabel {
  font-family: Comic Sans MS, cursive;
}
#myModal {
  font-family: Comic Sans MS, cursive;
}
</style>

<section class="content-header">
  <h1>Jenis Menu</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Jenis Menu</a></li>
    <li class="active">Data Jenis Menu</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- Button -->
        <div class="box-header">
          <form  action="<?= base_url().'admin/jenis/cetak_jenis'?>" method="post" enctype="multipart/form-data" target="_blank">
            <a class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&nbsp; Tambahkan Jenis</a> 

            <!-- Cetak Data -->
            <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
          </form> 
        </div>

        <!-- Tabel -->
        <div class="box-body" style="width: 60%;">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Menu</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=0;
              foreach ($data->result_array() as $i) :
                $no++;
                $idJenis = $i['id_jenis'];?>
                <tr>
                  <td class="nomer"><?= $no;?>.</td>
                  <td><?= $i['jenis_menu'];?></td>
                  <td align="center">
                    <a data-toggle="modal" data-target="#ModalEdit<?= $idJenis;?>" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a data-toggle="modal" data-target="#ModalHapus<?= $idJenis;?>" title="Hapus"><i class="fa fa-trash text-danger"></i></a>
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

<!--Modal Add Jenis Menu-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambahkan Jenis </h4>
      </div>

      <form class="form-horizontal" action="<?= base_url().'admin/jenis/simpan_jenis'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- Jenis Menu-->
          <div class="form-group form-group-sm">
            <label for="xtahun" class="col-sm-4 control-label">Jenis Menu</label>
            <div class="col-sm-7">
              <input type="hidden" name="pengguna_id" value="<?= $this->session->userdata('idadmin'); ?>">
              <input type="text" name="jenis_menu" class="form-control form-control-sm" placeholder="Jenis Menu" required autocomplete="off">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">&nbsp;&nbsp;Close&nbsp;&nbsp;</button>
          <button type="submit" class="btn btn-primary btn-flat btn-sm" id="simpan">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Edit Pengguna-->
<?php foreach ($data->result_array() as $i) :
  $idJenis    = $i['id_jenis'];
  $jenisMenu  = $i['jenis_menu'];?>
  <div class="modal fade" id="ModalEdit<?= $idJenis;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Update Jenis Menu</h4>
        </div>

        <form class="form-horizontal" action="<?= base_url().'admin/jenis/update_jenis'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group form-group-sm">
              <label for="inputUserName" class="col-sm-4 control-label">Jenis Menu</label>
              <div class="col-sm-7">
                <input type="hidden" name="id_jenis" value="<?= $idJenis;?>"/>
                <input type="text" name="jenis_menu" class="form-control form-control-sm" id="inputUserName" value="<?= $jenisMenu;?>" placeholder="Input Jenis Menu" required autocomplete="off">
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

<!-- Jenis Menu Hapus -->
<?php foreach ($data->result_array() as $i) :
  $idJenis = $i['id_jenis'];?>
  <div class="modal fade" id="ModalHapus<?= $idJenis;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Data Jenis</h4>
        </div>

        <form class="form-horizontal" action="<?= base_url().'admin/jenis/hapus_jenis'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
           <input type="hidden" name="id_jenis" value="<?= $idJenis;?>"/>
           <p>Apakah Anda yakin mau menghapus Data Jenis Menu?</span></p>
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