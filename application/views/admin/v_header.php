<style type="text/css">
.main-header .logo .logo-mini {
  font-family: Comic Sans MS, cursive;
}
.main-sidebar .sidebar .sidebar-menu .header {
  font-family: Comic Sans MS, cursive;
}
.main-sidebar .sidebar .sidebar-menu li {
  font-family: Comic Sans MS, cursive;
}
.main-header .navbar.navbar-static-top .navbar-custom-menu {
  font-family: Comic Sans MS, cursive;
}
.main-header .navbar.navbar-static-top .sidebar-toggle {
  font-family: Comic Sans MS, cursive;
}
</style>

<header class="main-header">
  <a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">HARTINI'S Cafe & Resto</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">HARTINI'S Cafe & Resto</span>
  </a>

  <!-- NavBar -->
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <ul class="dropdown-menu">
            <ul class="menu">
              <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM x_tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
              ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="user-image" alt="">
                  <span class="hidden-xs"><?= $c['pengguna_nama'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="img-circle" alt="">
                    <p>
                      <?php echo $c['pengguna_nama'];?>
                      <?php 
                      if($c['pengguna_hak_akses']=='1'){?>
                        <small>Admin</small>
                        <?php 
                      }else if($c['pengguna_hak_akses']=='2'){?>
                        <small>Manager</small>
                        <?php 
                      }else if($c['pengguna_hak_akses']=='3'){?>
                        <small>Kasir</small>
                        <?php 
                      }?>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url().'admin/loginku/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url().''?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
              </li>
            </ul>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- Sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">Menu Utama</li>
      
      <li>
        <a href="<?= base_url().'admin/dashboard'?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <?php 
      $akses=$this->session->userdata('akses');
      if($akses=='1'){?> 
        <li>
          <a href="<?= base_url().'admin/pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna/Petugas</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php
      }else if($akses=='2'){?>
        <li>
          <a href="<?= base_url().'admin/jenis'?>">
            <i class="fa fa-thumb-tack"></i> <span>Jenis Menu</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
          <a href="<?= base_url().'admin/menu'?>">
            <i class="fa fa-thumb-tack"></i> <span>Data Menu</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php 
      }
      if($akses=='2' || $akses=='3'){?>
        <li>  
          <a href="<?= base_url().'admin/transaksi'?>">
            <i class="fa fa-thumb-tack"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
          <a href="<?= base_url().'admin/laporan'?>">
            <i class="fa fa-thumb-tack"></i> <span>Laporan Transaksi</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php 
      }?>

      <?php 
      if($akses!='3'){?>
        <li>
          <a href="<?= base_url().'admin/log'?>">
            <i class="fa fa-users"></i> <span>Log</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php
      }?>

      <!-- Logout -->
      <li>
        <a href="<?= base_url().'admin/loginku/logout'?>">
          <i class="fa fa-sign-out"></i> <span>Sign Out</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
    </ul>
  </section>
</aside>