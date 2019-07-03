<!doctype html>
<html lang="en">
<head>
  <title><?php echo $title;?> | MultiPlaza</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php if($this->uri->segment('1') == 'produk' and $this->uri->segment('2') != 'katalog' and $this->uri->segment('2') != 'cari_produk'){ ?>
  
    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $produk->judul_produk ?> | <?php echo $company_data->company_name ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?php echo current_url() ?>" />
    <meta property="og:image" content="<?php echo base_url('assets/images/produk/').$produk->foto.$produk->foto_type ?>" />
    <!-- <meta property="og:description" content="<?php echo character_limiter($produk->deskripsi, '50') ?>" /> -->
  <?php } ?>
	<!-- core ui -->
	<link href="<?php echo base_url()?>assets/template/frontend/css/theme/simplex.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()?>assets/template/frontend/css/custom.css" rel="stylesheet">
  <script src="<?php echo base_url()?>assets/plugins/jquery/jquery-3.3.1.js" rel="stylesheet"></script>
  <script src="<?php echo base_url()?>assets/template/frontend/js/bootstrap.min.js" rel="stylesheet"></script>
  <!-- FontAwesome 4.3.0 -->
  <link href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- SLIDER -->
	<script src="<?php echo base_url('assets/plugins/slider/slippry-1.4.0/src/')?>slippry.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/slider/slippry-1.4.0/dist/')?>slippry.css" />
  <!-- dropdown menu plugin -->
	<link href="<?php echo base_url('assets/plugins/cssmenu/') ?>styles.css" rel="stylesheet">
  <script src="<?php echo base_url('assets/plugins/cssmenu/') ?>script.js"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.png" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114929317-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114929317-1');
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body>
