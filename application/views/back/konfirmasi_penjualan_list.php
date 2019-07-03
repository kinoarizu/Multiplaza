<?php $this->load->view('back/meta') ?>
  <div class="wrapper">
    <?php $this->load->view('back/navbar') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1><?php echo $title ?></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><?php echo $module ?></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-md-3">
        <a href="<?php echo base_url('admin/konfirmasi/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
        </div>
          <div class="col-lg-12">
						<div class="box box-primary">
              <div class="box-body">
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <div class="table-responsive no-padding">
									<table id="datatable" class="table table-striped">
										<thead>
											<tr>
												<th style="text-align: center">Invoice</th>
												<th style="text-align: center">Nama</th>
												<th style="text-align: center">Jumlah</th>
												<th style="text-align: center">Bank Asal</th>
												<th style="text-align: center">Bank Tujuan</th>
												<th style="text-align: center">Foto Struk</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; foreach ($konfirmasi_pembayaran as $konfirmasi):?>
											<tr>
												<td style="text-align:center"><?php echo $konfirmasi->invoice ?></td>
												<td style="text-align:center"><?php echo $konfirmasi->nama ?></td>
												<td style="text-align:center"><?= $konfirmasi->jumlah ?></td>
												<td style="text-align:center"><?php echo $konfirmasi->bank_asal ?></td>
												<td style="text-align:center"><?php echo $konfirmasi->bank_tujuan ?></td>
												<td style="text-align:center">
                                                    
                                                        <?php
                                                            if(empty($konfirmasi->foto)) {echo "<img class='img-thumbnail' src='".base_url()."assets/images/no_image_thumb.png' width='400' height='400'>";}
                                                            else{
                                                            echo "<a href='".base_url()."assets/images/bukti/".$konfirmasi->foto.$konfirmasi->foto_type."'>
                                                            <img data-action='zoom' class='img-thumbnail' src='".base_url()."assets/images/bukti/".$konfirmasi->foto.''.$konfirmasi->foto_type."' title='Bukti Pembayaran' alt='Bukti Pembayaran' width='200' height='200'>
                                                            </a>";}
                                                        ?>
                                                </td>
												<td style="text-align:center">
												<!-- <?php
												echo anchor(site_url('admin/penjualan/view/'.$penjualan->id_trans),'<i class="fa fa-search-plus"></i>','title="Lihat", class="btn btn-sm btn-primary"'); echo ' ';
												echo anchor(site_url('admin/penjualan/update/'.$penjualan->id_trans),'<i class="fa fa-pencil"></i>','title="Input Resi", class="btn btn-sm btn-success"');
												?>
												</td> -->
											</tr>
											<?php endforeach;?>
										</tbody>
									</table>
                </div>
							</div>
						</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
  </div>
  <?php $this->load->view('back/js') ?>
	<!-- DATA TABLES-->
  <link href="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    function confirmDialog() {
      return confirm('Apakah anda yakin?')
    }
    $('#datatable').dataTable({
      "bPaginate": true,
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false,
      "aaSorting": [[0,'desc']],
      "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
    });
  </script>
  <script src="<?php echo base_url('assets/plugins/zooming/build/zooming.min.js') ?>"></script>

</body>
</html>
