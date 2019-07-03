  <?php foreach($featured_data as $featured){ ?>
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-6">
        <a href="<?php echo base_url('produk/').$featured->slug_produk ?>">
          <img class="img-thumbnail" src="<?php echo base_url('assets/images/produk/').$featured->foto.$featured->foto_type ?>">
        </a>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-6">
        <h5><a href="<?php echo base_url('produk/').$featured->slug_produk ?>"><?php echo character_limiter($featured->judul_produk,'25') ?></a></h5>
        <strike><b>Rp <?php echo number_format($featured->harga_normal) ?></b></strike><br>
        <b>Rp <?php echo number_format($featured->harga_diskon) ?></b> <font style="font-size:15px"><span class="badge badge-pill badge-primary"><?php echo $featured->diskon ?>% OFF</span></font>
      </div>
    </div><br>
  <?php } ?>
