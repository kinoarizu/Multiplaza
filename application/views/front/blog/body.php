<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="#">Blog</a></li>
					<li class="breadcrumb-item active"><?php echo $blog->judul_blog ?></li>
			  </ol>
			</nav>
    </div>
		<div class="col-lg-9">
      <h1><?php echo $blog->judul_blog ?></h1><hr>
			<div class="row">
				<div class="col-lg-12" align="center">
					<?php
					if(empty($blog->foto)) {echo "<img class='img-fluid' src='".base_url()."assets/images/no_image_thumb.png' width='400' height='400'>";}
					else { echo " <img class='img-fluid' src='".base_url()."assets/images/blog/".$blog->foto.$blog->foto_type."' class='img-responsive' title='$blog->judul_blog' alt='$blog->judul_blog' id='myImg'> ";}
					?>
					<br>
				</div>
			</div>
			<p><i class="fa fa-user"></i> <?php echo $blog->created_by ?> | <i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($blog->created)); ?></p>

			<div class="row">
				<div class="col-lg-12">
					<p><?php echo $blog->isi_blog ?></p>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-lg-12"><h4>Lihat Juga</h4><hr>
					<?php foreach($blog_lainnya as $lainnya){ ?>
					<div class="row">
						<div class="col-sm-4">
							<div class="thumbnail">
								<?php
								if(empty($lainnya->foto)) {echo "<img class='img-fluid' src='".base_url()."assets/images/no_image_thumb.png'>";}
								else { echo " <img class='img-fluid' src='".base_url()."assets/images/blog/".$lainnya->foto.'_thumb'.$lainnya->foto_type."'> ";}
								?>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="caption">
								<h5><a href="<?php echo base_url("blog/read/$lainnya->slug_blog ") ?>"><?php echo character_limiter($lainnya->judul_blog,100) ?></a></h5>
								<i class="fa fa-user"></i> <?php echo $lainnya->created_by ?> | <i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($lainnya->created)); ?>
								<p><?php echo character_limiter($lainnya->isi_blog,150) ?></p>
								<p align="right">
									<a href="<?php echo base_url("blog/read/$lainnya->slug_blog ") ?>">
										<button type="button" name="button" class="btn btn-sm btn-primary">Selengkapnya</button>
									</a>
								</p>
							</div>
						</div>
					</div><br>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php $this->load->view('front/sidebar'); ?>

  <?php $this->load->view('front/footer'); ?>
