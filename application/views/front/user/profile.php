<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-3" align="center">
    <img src="<?php echo base_url('assets/images/user/').$profil_data->photo.$profil_data->photo_type ?>" class="img-circle" width="100px">
    </div><br>
    <div class="col-lg-6">
      <p><b>Nama Toko</b>: <?php echo $profil_data->username ?></p>
      <p><b>Email</b>: <?php echo $profil_data->email ?></p>
      <p><b>Telp</b>: +<?php echo $profil_data->phone ?></p>
      <p>
        <!-- <a href="https://api.whatsapp.com/send?phone=+<?php echo $profil_data->phone ?>&text=Hi%20Gan,%20Saya%20minat%20dengan%20barangnya%20yang%20di%20website">
          <button type="submit" name="button" class="btn btn-success">Kontak Seller via Whatsapp</button>
        </a> -->
      </p>
    </div>
    <div class="col-lg-12">
      <hr>
  		<h5>Produk dari Toko <?php echo $profil_data->name?> </h5>
  		<hr>
  		<div class="row">
        <?php foreach ($profil as $profil_new){ ?>
  	      <div class="col-xl-auto col-lg-auto col-md-auto col-sm-auto col-xs-auto ">
  	        <div class="thumbnail">
            <div class="card mb-6 box-shadow">
              <?php
  	          if(empty($profil_new->foto)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' >";}
              else { echo " <img src='".base_url()."assets/images/produk/".$profil_new->foto.'_thumb'.$profil_new->foto_type."'width='253''> ";}
  	          ?>
              <div class="card-body">
              <p align="center">
  	          <div class="caption">
  	            <h6><a href="<?php echo base_url("produk/$profil_new->slug_produk ") ?>">
								<p class="card-text"><b><?php echo character_limiter($profil_new->judul_produk,50) ?></b></p>
							</a></h6>
  	            <p>Rp <?php echo number_format($profil_new->harga_normal) ?></p>
                <p align="center">
								<strike><b>Rp <?php echo number_format($profil_new->harga_normal) ?></b></strike><br>
								<b>Rp <?php echo number_format($profil_new->harga_diskon) ?></b> <font style="font-size:15px"><span class="badge badge-pill badge-primary"><?php echo $profil_new->diskon ?>% OFF</span></font>
							</p>
							<p align="center">
							<?php
				        if ($this->session->userdata('usertype')) {
							?>
								<a href="<?php echo base_url('cart/buy/').$profil_new->id_produk ?>">
									<button class="btn btn btn-info"><i class="fa fa-shopping-cart"></i> Beli</button>
								</a>
								
							<?php
								} else {
									
								}
							?>
								<a href="<?php echo base_url('produk/').$profil_new->slug_produk ?>">
									<button class="btn btn btn-danger"><i class="fa fa-eye"></i> Detail</button>
								</a>
							</p>
  	          </div>
              </p>
              </div>
              </div>
							<br>
  	        </div>
  	      </div>
        <?php } ?>
      </div>
	  </div>

<?php $this->load->view('front/sidebar'); ?>
<?php $this->load->view('front/footer'); ?>
