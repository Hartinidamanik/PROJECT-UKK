<style type="text/css">
.content .row {
  font-family: Comic Sans MS, cursive;
}
.content-header h1 {
  font-family: Comic Sans MS, cursive;
}
.content-header .breadcrumb {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-md-12 .jumbotron {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-md-12 .jumbotron .container {
  font-family: Comic Sans MS, cursive;
}
.content .row {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-md-12 .jumbotron .container .row .col-sm-6 {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-md-12 .jumbotron .container .row .col-sm-6 {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-md-12 .jumbotron .container {
  font-family: Comic Sans MS, cursive;
}
.content .row {
  font-family: Comic Sans MS, cursive;
}
.content .row .col-md-12 .jumbotron {
  font-family: Comic Sans MS, cursive;
}
</style>

<section class="content-header">
  <h1> Dashboard </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Left col -->
    <div class="col-md-12">
      <?php 
      $nama=$this->session->userdata('nama'); 
      $photo=$this->session->userdata('photo'); 
      
      ?>
      <div class="jumbotron" style="padding: 30px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3)">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <h2>Selamat Datang <?= $nama;?></br>
              di APLIKASI KASIR HARTINI'S Cafe & Resto</h2>
            </div>
            <div class="col-sm-6">
              <img src="<?= base_url().'assets/images/'.$photo;?>" alt="photo" width="80" height="80" style="float:right; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3); margin-top:8px;"> 
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>