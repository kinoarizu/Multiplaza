<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>
	<?php $this->load->view('front/home/slider'); ?>
  <?php $this->load->view('front/home/produk_new'); ?>
	
</div>

<?php $this->load->view('front/footer'); ?>
