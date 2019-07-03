<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Profil Toko</li>
			  </ol>
			</nav>
    </div>
		<div class="col-lg-9 col-lg-3"><h1>Profil <?php echo $company->company_name ?></h1><hr>
			<div class="row">
			  <div class="col-lg-12">
					<p align="center"><?php
						if(empty($company->logo)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='400' height='400'>";}
						else { echo " <img src='".base_url()."assets/images/company/".$company->logo.'_thumb'.$company->logo_type."' class='img-responsive' title='$company->company_name' alt='$company->company_name'> ";}
						?>
					</p>
					<p><?php echo $company->company_desc ?></p><br>
          <p><b>Alamat:</b><br>
            <?php echo $company->company_address ?>
          </p>
          <p><b>Email:</b><br>
            <?php echo $company->company_email ?>
          </p>
          <p><b>Telepon:</b><br>
            <?php echo $company->company_phone ?>
            <?php if($company->company_phone2 > 0){echo " / ". $company->company_phone2;} ?>
          </p>
          <?php if($company->company_fax > 0){ ?>
          <p><b>Fax:</b><br>
            <?php echo $company->company_fax ?>
          </p>
          <?php } ?>
				</div>
			</div>
		</div>

		<?php $this->load->view('front/sidebar'); ?>
	</div>
</div>
<?php $this->load->view('front/footer'); ?>
