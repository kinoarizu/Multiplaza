<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="#">Produk</a></li>
					<li class="breadcrumb-item active">Katalog Produk</li>
			  </ol>
			</nav>
    </div>
		<div class="col-lg-9 col-lg-3">
      <h1>Katalog Produk</h1><hr>
			<div class="row">
			  <?php foreach($katalog_data as $katalog){ ?>
			  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
			    <div class="card mb-4 box-shadow">
			      <a href="<?php echo base_url("produk/$katalog->slug_produk ") ?>">
			        <?php
			        if(empty($katalog->foto)) {echo "<img class='card-img-top' src='".base_url()."assets/images/no_image_thumb.png'>";}
			        else { echo " <img class='card-img-top' src='".base_url()."assets/images/produk/".$katalog->foto.'_thumb'.$katalog->foto_type."'> ";}
			        ?>
			      </a>
						<div class="card-body">
							<a href="<?php echo base_url("produk/$katalog->slug_produk ") ?>">
								<p class="card-text"><b><?php echo character_limiter($katalog->judul_produk,50) ?></b></p>
							</a>
							<br>
							<p align="center">
								<strike><b>Rp <?php echo number_format($katalog->harga_normal) ?></b></strike><br>
								<b>Rp <?php echo number_format($katalog->harga_diskon) ?></b> <font style="font-size:15px"><span class="badge badge-pill badge-primary"><?php echo $katalog->diskon ?>% OFF</span></font>
							</p>
							<p align="center">

								<?php
				          if ($this->session->userdata('usertype')) {
								?>
								<a href="<?php echo base_url('cart/buy/').$katalog->id_produk ?>">
									<button class="btn btn btn-info"><i class="fa fa-shopping-cart"></i> Beli</button>
								</a>

								<?php
									} else {
										
									}

								?>

								<a href="<?php echo base_url('produk/').$katalog->slug_produk ?>">
									<button class="btn btn btn-danger"><i class="fa fa-eye"></i> Detail</button>
								</a>
							</p>
						</div>
			    </div>
			  </div>
			  <?php } ?>
			</div>
			<?php echo $this->pagination->create_links() ?>
		</div>

		<?php $this->load->view('front/sidebar'); ?>

  <?php $this->load->view('front/footer'); ?>
