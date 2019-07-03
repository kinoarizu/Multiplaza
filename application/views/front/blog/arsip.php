<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Arsip Blog</li>
			  </ol>
			</nav>
    </div>
		<div class="col-sm-12 col-lg-9"><h1>Arsip Blog</h1><hr>
			<?php foreach($arsip as $arsip){ ?>
			<div class="row">
				<div class="col-sm-4">
					<?php
					if(empty($arsip->foto)) {echo "<img class='img-thumbnail' src='".base_url()."assets/images/no_image_thumb.png'>";}
					else { echo " <img class='img-thumbnail' src='".base_url()."assets/images/blog/".$arsip->foto.'_thumb'.$arsip->foto_type."'> ";}
					?>
				</div>
				<div class="col-sm-8">
					<h5><a href="<?php echo base_url("blog/read/$arsip->slug_blog ") ?>"><?php echo character_limiter($arsip->judul_blog,100) ?></a></h5>
					<i class="fa fa-user"></i> <?php echo $arsip->created_by ?> | <i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($arsip->created)); ?>
					<p><?php echo character_limiter($arsip->isi_blog,150) ?></p>
					<p align="right">
						<a href="<?php echo base_url("blog/read/$arsip->slug_blog ") ?>">
							<button type="button" name="button" class="btn btn-sm btn-primary">Selengkapnya</button>
						</a>
					</p>
				</div>
			</div><br>
			<?php } ?>
    	<div align="center"><?php echo $this->pagination->create_links() ?></div>
		</div>

		<?php $this->load->view('front/sidebar'); ?>
	</div>
</div>
<?php $this->load->view('front/footer'); ?>
