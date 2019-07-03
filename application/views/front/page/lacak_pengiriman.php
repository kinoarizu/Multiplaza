<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-sm-12 col-lg-12">
      <ol class="breadcrumb">
    	  <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
    	  <li class="active">Lacak Pengiriman</li>
    	</ol>
    </div>
		<div class="col-sm-12 col-lg-9"><h1>Lacak Pengiriman</h1><hr>
			<div class="row">
        <div class="col-sm-6">
          <h4>Cek Ongkir</h4>
          <div data-theme="light" id="rajaongkir-widget"></div>
          <script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script>
        </div>
        <div class="col-sm-6">
          <h4>Lacak Pengiriman</h4>
          <div id="cekresicom_id"></div>
    			<script type="text/javascript" src="http://www.cekresi.com/widget/widgetcekresicom_v1.js"></script>
    			<script type="text/javascript">
    			init_widget_cekresicom('w3',370,80)
    			</script>
        </div>
      </div>
		</div>

		<?php $this->load->view('front/sidebar'); ?>
	</div>

  <?php $this->load->view('front/footer'); ?>
