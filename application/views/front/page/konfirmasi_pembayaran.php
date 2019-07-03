<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-sm-12 col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
      	  <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
      	  <li class="active">Konfirmasi Pembayaran</li>
      	</ol>
      </nav>
    </div>
		<div class="col-sm-12 col-lg-9"><h1>Konfirmasi Pembayaran</h1><hr>
			<div class="row">
        <div class="col-lg-12">
          <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          <!-- <?php echo form_open('konfirmasi_kirim') ?> -->
          <?= form_open_multipart($action); ?>
            <div class="form-group has-feedback"><label>No. Invoice</label>
              <input type="number" name="invoice" class="form-control" value="<?= $invoice ?>">
            </div>
            <div class="form-group has-feedback"><label>Nama Pengirim</label>
              <input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('name') ?>" >
            </div>
            <div class="form-group has-feedback"><label>Total Pembayaran</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" name="jumlah" class="form-control" value="<?= number_format($grandtot) ?>" >
              </div>
              <!-- <span class="input-group-addon">Rp.</span>
              <input type="text" name="jumlah" class="form-control" value="<?= number_format($grandtot) ?>" disabled> -->
            </div>
            <div class="form-group has-feedback"><label>Bank Asal</label>
              <!-- <input type="text" name="bank_asal" class="form-control"> -->
              <?= form_dropdown('', $nama_bank, '', $bank_asal) ?>
            </div>
            <div class="form-group has-feedback"><label>Bank Tujuan</label>
              <!-- <input type="text" name="bank_tujuan" class="form-control"> -->
              <?= form_dropdown('', $nama_bank, '', $bank_tujuan) ?>
            </div>
            <div class="form-group"><label>Bukti Pembayaran</label>
							<input type="file" class="form-control" name="bukti_pembayaran" id="foto" onchange="tampilkanPreview(this,'preview')"/>
							<img id="preview" src="" alt="" width="350px"/>
						</div>
            <button type="submit" name="button" class="btn btn-primary">Kirim</button>
          <?php echo form_close() ?>
        </div>
      </div>
		</div>

		<?php $this->load->view('front/sidebar'); ?>
	</div>

  <?php $this->load->view('front/footer'); ?>
