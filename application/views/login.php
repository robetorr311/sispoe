<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.::SISPOE::.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.css">
        
  </head>
  <body class="hold-transition login-page">
  <div class="box box-default">
    <div class="box-header with-border">
      <h4 class="box-title">
        <div class="pull-left"><img src="<?php echo base_url(); ?>assets/img/membrete.png" /></div>
        <div class="pull-right"></div><br><br>

      <div class="pull-left">SISTEMA DE VIGILANCIA EPIDEMIOLOGICA Y CONTROL DE DOSIMETRIA PARA EL PERSONAL OCUPACIONALMENTE EXPUESTO A RADIACIONES</div>
      </h4>
    </div>
    <div class="box-body">
    <div class="login-box">
      <div class="login-logo">
        <b><img src="<?php echo base_url(); ?>assets/img/logo-lndpe-transp.png" /></b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicio de sesion</p>
        <form action="<?php echo base_url(); ?>index.php/Inicio/acceso" method="post">
          <div class="row">
            <div class="col-xs-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" id="login" name="login" class="form-control" placeholder="Nombre de usuario">
                    </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                 <!-- <input type="checkbox"> Remember Me -->
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-8">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingrese</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    </div><!-- /.box-body -->
  </div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>
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
