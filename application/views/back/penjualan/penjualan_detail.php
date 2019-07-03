<?php $this->load->view('back/meta') ?>
  <div class="wrapper">
    <?php $this->load->view('back/navbar') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>INVOICE #<?php echo $customer_data->id_trans ?></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><?php echo $module ?></a></li>
          <li class="active"><?php echo $title ?></li>
        </ol>
      </section>
      <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          Halaman ini bisa langsung diprint dengan cara menekan tombol ctrl + p di keyboard
        </div>
      </div>
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> <?php echo $company_data->company_name ?>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class=" invoice-col">
            No Resi : 00003295<?php echo $customer_data->id_trans ?>
</div>
        <div class="row invoice-info">
    
          <div class="col-sm-4 invoice-col">
            Dari
            <address>
              <strong><?php echo $company_data->company_name ?></strong><br>
              <?php echo $company_data->company_address ?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            Kepada
            <address>
              <strong><?php echo $customer_data->name ?></strong><br>
              <?php echo $customer_data->address.', '.$customer_data->nama_kota.', '.$customer_data->nama_provinsi ?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Tanggal Pemesanan: <?php echo $customer_data->created ?></b><br/>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="text-align: center">No.</th>
                  <th style="text-align: center">Judul Produk</th>
                  <th style="text-align: center">Harga</th>
                  <th style="text-align: center">Berat</th>
                  <th style="text-align: center">Jumlah Berat (gram)</th>
                  <th style="text-align: center">Qty</th>
                  <th style="text-align: center">Total</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach ($cart_data as $cart){ ?>
                <tr>
                  <td style="text-align:center"><?php echo $no++ ?></td>
                  <td style="text-align:left"><?php echo $cart->judul_produk ?></td>
                  <td style="text-align:center"><?php echo number_format($cart->harga) ?></td>
                  <td style="text-align:center"><?php echo $cart->berat ?></td>
                  <td style="text-align:center"><?php echo $cart->total_berat ?></td>
                  <td style="text-align:center"><?php echo $cart->total_qty ?></td>
                  <td style="text-align:right"><?php echo number_format($cart->subtotal) ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="table-responsive">
              <table class="table">
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
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <a href="javascript:window.print()" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          </div>
        </div>
      </section><!-- /.content -->
      <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
  </div>
  <?php $this->load->view('back/js') ?>
</body>
</html>
