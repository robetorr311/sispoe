<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.::SISPOE::.</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/dist/css/AdminLTE.min.css">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/googleapis.css">  
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/menu.css">        
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>         
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/menu.js"></script>

    <script type="text/javascript">
      var ruta_url = "<?php echo base_url(); ?>";
      var base_url = "<?php echo site_url(); ?>";
    </script>
    <style>
      .blanco {
        background-color: #ffffff;
      }
    </style>       
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top #ffffff">
            <div class="blanco">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <div class="pull-left"><img src="<?php echo base_url(); ?>assets/img/gobiernobolivariano.png" /></div>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <div class="pull-right"><img src="<?php echo base_url(); ?>assets/img/lndpe.png" /></div>
                    </ul>
                </div>
            </div>    
            </div>
        </div>
        <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side">
        <div id='cssmenu'>
                <ul  id="menu">
                    <?php echo $menuhtml; ?>
                </ul>
        </div>
        </aside>
        <aside class="right-side">
        <section class="content-header">
          <h1>
            <small>SISTEMA DE VIGILANCIA RADIOLOGICA Y CONTROL DE DOSIMETRIA PARA EL PERSONAL OCUPACIONALMENTE EXPUESTO</small>
          </h1>

          <?php echo $contenido; ?>
        </section>        
        </aside> 
        </div>   
    </div>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/fastclick/fastclick.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dist/js/demo.js"></script> 
</body>
</html>  
  
