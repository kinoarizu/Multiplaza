<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Profil Saya</li>
				</ol>
			</nav>
    </div>

		<div class="col-lg-12"><h1>Profil Saya</h1><hr>
			<div class="form-row">
				<div class="form-group col-lg-6"><label>Nama</label><br>
		      <?php echo $profil->name ?>
		    </div>
		    <div class="form-group col-lg-6"><label>Username</label><br>
		      <?php echo $profil->username ?>
		    </div>
			</div>
			<div class="form-row">
		    <div class="form-group col-lg-6"><label>No. HP</label><br>
		      <?php echo $profil->phone ?>
		    </div>
		    <div class="form-group col-lg-6"><label>Email</label><br>
		      <?php echo $profil->email ?>
		    </div>
			</div>
	    <div class="form-group"><label>Alamat</label><br>
	      <?php echo $profil->address ?>
	    </div>
		</div>
	</div>
</div>

<?php $this->load->view('front/footer'); ?>
