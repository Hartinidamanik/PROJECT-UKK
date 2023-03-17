<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN HARTINI'S Cafe & Resto</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Icon -->
    <link rel="shorcut icon" type="text/css" href="<?= base_url().'assets/images/favicon.png'?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css'?>">

    

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url().'assets/dist/css/AdminLTE.min.css'?>">
    <style type="text/css">
    .hold-transition.login-page {
  font-family: Comic Sans MS, cursive;
}
    .hold-transition.login-page div {
  font-family: Comic Sans MS, cursive;
}
    .hold-transition.login-page .login-box-body form .row .col-md-4 .btn.btn-primary.btn-sm.glyphicon.glyphicon-lock {
  font-family: Comic Sans MS, cursive;
}
    .hold-transition.login-page .login-box-body form .form-group.has-feedback {
  font-family: Comic Sans MS, cursive;
}
    .hold-transition.login-page .login-box-body form .form-group.has-feedback {
  font-family: Comic Sans MS, cursive;
}
    .hold-transition.login-page div {
  font-family: Comic Sans MS, cursive;
}
    </style>

  </head>
  <body class="hold-transition login-page" style="background-size: 100%;
  background-image: url(theme/images/logo.jpg);">
    <div class="login-box">
      <div><p><?= $this->session->flashdata('msg');?></p></div>

      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"> <img width="130px;" src="<?= base_url().'theme/images/logoo.png'?>"></p>

        <form action="<?= base_url().'admin/loginku/auth'?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off" autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary btn-sm glyphicon glyphicon-lock"> Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>

    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <!-- iCheck -->
    <!-- <script src="<?= base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script> -->
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
