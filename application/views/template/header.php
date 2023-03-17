<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $judul; ?></title>
    <link rel="shorcut icon" type="text/css" href="<?= base_url().'assets/images/favicon.png'?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css'?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url().'assets/font-awesome/css/font-awesome.min.css'?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url().'assets/dist/css/AdminLTE.min.css'?>">
    <link rel="stylesheet" href="<?= base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
 
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
    
    <!-- Select Option Chosen -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/component-chosen.css'?>">
    
   <style>
      tr>th{text-align: center; background-color: #badbda; vertical-align: middle!important;}
      .batas_bawah{margin-bottom: 3px;}
      .box-body{padding-left: 10px;}
      tbody td{border: 1px solid #badbda;}
      td>a{margin-top: -5px;padding:0px}
      .nomer{width: 15px; text-align: center;}
      span.fa{padding: -10px; margin: -15px; font-size: 16px;}
      td{vertical-align: middle!important;}
      .fa.fa-pencil{color: blue; padding-right: 5px;}
      .fa.fa-pencil:hover{cursor: pointer;}
      .fa.fa-refresh{color: green; padding-right: 5px;}
      .fa.fa-refresh:hover{cursor: pointer;}
      .fa.fa-trash{color: red; }
      .fa.fa-trash:hover{cursor: pointer;}
      label{text-align: left!important;}
      a#transaksiSimpan, a#transaksiBaru{text-decoration: none; height: 32px;}
      select>option{color: black!important;}
      .glyphicon:hover{cursor: pointer;}
     
    </style>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
      $this->load->view('admin/v_header');
      ?>
      <div class="content-wrapper">