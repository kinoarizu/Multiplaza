<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head>
<body>
  <table align="center">
    <tr>
      <th rowspan="3"></th>
      <td align="center">
        <font style="font-size: 18px"><b><?php echo $company_data->company_name;?></b></font>
        <br><?php echo $company_data->company_address;?>
        <br>No. HP: <?php echo $company_data->company_phone;?> | Telp: <?php echo $company_data->company_phone2;?> | Email: <?php echo $company_data->company_email;?>
      </td>
    </tr>
  </table>
  <hr/>
  <div align="center"><b>INVOICE NO. <?php echo $this->uri->segment('3'); ?></b></div>

  <?php if($this->session->userdata('user_id') != NULL){ ?>
    <table>
      <thead>
        <tr>
          <th style="text-align: center; background: #ddd; width: 30px">No.</th>
          <th style="text-align: center; background: #ddd; width: 260px">Daftar Produk</th>
          <th style="text-align: center; background: #ddd; width: 70px">Harga</th>
          <th style="text-align: center; background: #ddd; width: 60px">Berat</th>
          <th style="text-align: center; background: #ddd; width: 130px">Jumlah Berat (gram)</th>
          <th style="text-align: center; background: #ddd; width: 50px">Qty</th>
          <th style="text-align: center; background: #ddd; width: 70px">Total</th>
        </tr>
      </thead>
      <tbody>
      <?php $no=1; foreach ($cart_finished as $cart){ ?>
        <tr>
          <td style="text-align:center;width: 30px"><?php echo $no++ ?></td>
          <td style="text-align:left;width: 260px"><?php echo $cart->judul_produk ?></td>
          <td style="text-align:right;width: 70px"><?php echo number_format($cart->harga_diskon) ?></td>
          <td style="text-align:center;width: 60px"><?php echo $cart->berat ?></td>
          <td style="text-align:center;width: 130px"><?php echo $cart->total_berat ?></td>
          <td style="text-align:center;width: 50px"><?php echo $cart->total_qty ?></td>
          <td style="text-align:center;width: 70px"><?php echo number_format($cart->subtotal) ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <table align="right">
      <tbody>
				<tr>
					<th>Total Berat</th>
					<td colspan="2" align="right"><?php echo $total_berat_dan_subtotal->total_berat ?> (gram) / <?php echo berat($total_berat_dan_subtotal->total_berat) ?> (kg)</td>
				</tr>
        <tr>
          <th>SubTotal</th>
          <td></td>
          <td align="right"><?php echo number_format($total_berat_dan_subtotal->subtotal) ?></td>
        </tr>
        <tr>
          <th>Ongkos Kirim</th>
          <td align="right">Via: <?php echo strtoupper($customer_data->kurir).' '.$customer_data->service ?></td>
          <td align="right"><?php echo number_format($customer_data->ongkir) ?></td>
        </tr>
        <tr>
          <th scope="row">Grand Total</th>
          <td align="right">Subtotal + Total Ongkir</td>
          <td align="right"><b><?php echo number_format($customer_data->ongkir + $total_berat_dan_subtotal->subtotal) ?></b></td>
        </tr>
      </tbody>
    </table>

		<div><b>Pembayaran</b></div>
		<table cellspacing='10'>
			<thead>
				<tr>
					<th style="text-align: center">No.</th>
					<th style="text-align: center">Bank</th>
					<th style="text-align: center">Atas Nama</th>
					<th style="text-align: center">No. Rekening</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($data_bank as $bank){ ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $bank->nama_bank ?></td>
					<td><?php echo $bank->atas_nama ?></td>
					<td><?php echo $bank->norek ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

    <div><b>Alamat Tujuan</b></div>
		Nama: <?php echo $customer_data->name ?><br>
		No. HP: <?php echo $customer_data->phone ?><br>
		Alamat: <?php echo $customer_data->address.', '.$customer_data->nama_provinsi.', '.$customer_data->nama_kota?><br>

	  <div><b>PERHATIAN</b></div>
		<ul>
			<li>Silahkan melakukan konfirmasi pembayaran ke halaman berikut ini, <a href="<?php echo base_url('konfirmasi_pembayaran') ?>">Klik Disini</a> atau langsung menghubungi kami ke customer service yang telah disediakan dan melampirkan foto bukti bayar.</li>
			<li>Kami akan segera memproses pemesanan Anda setelah mendapatkan konfirmasi pembayaran segera mungkin.</li>
		</ul>
		<p align="center">Terima kasih telah berbelanja bersama kami.</p>

  <?php } ?>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
