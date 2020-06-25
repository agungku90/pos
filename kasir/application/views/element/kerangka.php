<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/prism/prism.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/dropzonejs/dropzone.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="search-element">
         </div>
        </form>
        <ul class="navbar-nav navbar-right">
         
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url(); ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?=$nama?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a href="<?=base_url('welcome/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">St</a>
          </div>
          <ul class="sidebar-menu">
			  <li class="menu-header">Dashboard</li>
			  <?php if ($this->session->userdata('user_level') == 'Pimpinan') { ?>
              <li class="nav-item dropdown active">
              <li><a class="nav-link" href="<?=base_url('pimpinan')?>"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
				<li>
                <a href="<?=base_url('pimpinan/laporan')?>" class="nav-link"><i class="fas fa-chart-line"></i><span>Laporan Penjualan</span></a>
			  </li>
			  	<?php } elseif ($this->session->userdata('user_level') == 'Admin') { ?>
					<li>
						<a class="nav-link" href="<?=base_url('admin')?>"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
					<li >
						<a href="<?=site_url('admin/barang')?>" class="nav-link " ><i class="fas fa-boxes"></i><span>Barang</span></a>
					</li>
					<!-- <li >
						<a href="<?=site_url('admin/pembelian')?>" class="nav-link " ><span>Pembelian</span></a>
					
					</li> -->
			 	 <?php } else {?>
						<li><a class="nav-link" href="<?=site_url('kasir')?>"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
						<li><a class="nav-link" href="<?=site_url('kasir/transaksi') ?>"><i class="fas fa-exchange-alt"></i> <span>Transaksi</span></a></li>
					
					<?php }?>
              
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
       
         
		  <?php
				if (isset($content)) {
					echo $content;
				}
				?>
      
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>

  <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/forms-advanced-forms.js"></script>
</body>
</html>
