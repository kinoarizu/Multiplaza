<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

	<div class="container">
		<div class="row">
	    <div class="col-sm-12 col-lg-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Detail Riwayat Transaksi</li>
				  </ol>
				</nav>
	    </div>

	    <div class="col-lg-12"><h1>Detail Riwayat Transaksi</h1><hr>
        <h4>Invoice NO. <?php echo $history_detail_row->id_trans ?></h4>
				<div class="row">
				  <div class="col-lg-12">
	          <div class="box-body table-responsive padding">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center">Produk</th>
										<th style="text-align: center">Harga</th>
                    <th style="text-align: center">Berat</th>
                    <th style="text-align: center">Jumlah Berat (gram)</th>
										<th style="text-align: center">Qty</th>
                    <th style="text-align: center">Total</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($history_detail as $history){ ?>
                  <tr>
                    <td style="text-align:center"><?php echo $no++ ?></td>
                    <td style="text-align:left"><?php echo $history->judul_produk ?></a></td>
										<td style="text-align:center"><?php echo $history->harga_diskon ?></td>
                    <td style="text-align:center"><?php echo $history->berat ?></td>
                    <td style="text-align:center"><?php echo $history->total_berat ?></td>
                    <td style="text-align:center"><?php echo $history->total_qty ?></td>
                    <td style="text-align:center"><?php echo $history->subtotal ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
	  			  </div>
	  			</div>
				</div>
		  </div>

			<div class="col-lg-12">
				<table class="table table-striped table-bordered">
      <tbody>
				<tr>
					<th>Total Berat</th>
					<td colspan="2" align="right"><?php echo $history_detail_row->total_berat ?> (gram) / <?php echo berat($history_detail_row->total_berat) ?> (kg)</td>
				</tr>
        <tr>
          <th>SubTotal</th>
          <td></td>
          <td align="right"><?php echo number_format($subtotal_history->subtotal) ?></td>
        </tr>
        <tr>
          <th>Ongkos Kirim</th>
          <td align="right">Via: <?php echo strtoupper($history_detail_row->kurir).' '.$history_detail_row->service ?></td>
          <td align="right"><?php echo number_format($history_detail_row->ongkir) ?></td>
        </tr>
        <tr>
          <th scope="row">Grand Total</th>
          <td align="right">Subtotal + Total Ongkir</td>
          <td align="right"><b><?php echo number_format(ceil(berat($history_detail_row->total_berat)) * $history_detail_row->ongkir + $subtotal_history->subtotal) ?></b></td>
        </tr>
      </tbody>
    </table>
    <li>Silahkan melakukan konfirmasi pembayaran ke halaman berikut ini,
      <?= form_open('page/konfirmasi_pembayaran'); ?>
						<input type="hidden" name="invoice" value="<?= $history_detail_row->id_trans; ?>">
						<input type="hidden" name="grandtot" value="<?= ceil(berat($history_detail_row->total_berat)) * $history_detail_row->ongkir + $subtotal_history->subtotal ?>">
						<?php
							$data = array(
								'type'	=> 'submit',
								'value'	=> 'klik di sini',
								'class'	=> 'btn btn-primary'
							);
						?>
						<?= form_submit($data) ?>
						<?= form_close(); ?>
      <!-- <a href="<?php echo base_url('konfirmasi_pembayaran') ?>">Klik Disini</a> atau langsung menghubungi kami ke customer service yang telah disediakan dan melampirkan foto bukti bayar. -->
    </li>
			<li>Kami akan segera memproses pemesanan Anda setelah mendapatkan konfirmasi pembayaran segera mungkin.</li>
			</div>
	  </div>
	</div>
<?php $this->load->view('front/footer'); ?>
