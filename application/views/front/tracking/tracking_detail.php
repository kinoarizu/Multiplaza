<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Tracking Detail</li>
			  </ol>
			</nav>
    </div>

    <div class="col-lg-12"><h1>Tracking Detail</h1><hr>
			<div class="row">
			  <div class="col-lg-12">
          <div class="box-body table-responsive padding">
						<?php if(empty($detail_track)){echo "Belum ada Tracking";}else{ ?>
            	<table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center">No.</th>
                  <th style="text-align: center">No. Resi</th>
									<th style="text-align: center">Tanggal Tracking</th>
                  <th style="text-align: center">Status Tracking</th>
									<th style="text-align: center">provinsi</th>
                  <th style="text-align: center">kota</th>
                  <th style="text-align: center">alamat_tracking</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach ($detail_track as $history){ ?>
                <tr>
                  <td style="text-align:center"><?php echo $no++ ?></td>
                  <td style="text-align:center">
                    <?php if($history->no_resi != NULL){echo $history->no_resi;}else{echo "Belum ada";} ?>
                  </td>
				  <td style="text-align:center"><?php echo $history->tgl_tracking ?></td>
                  <td style="text-align:center"><?php echo $history->status_tracking ?></td>
				  <td style="text-align:center">
                    <?= $history->nama_provinsi; ?>
                  </td>
				 <td style="text-align:center">
                    <?= $history->nama_kota ?>
                 </td>
                 <td style="text-align:center">
                    <?= $history->alamat_tracking ?>
                 </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
						<?php } ?>
  			  </div>
  			</div>
			</div>
	  </div>
	</div>
</div>

<?php $this->load->view('front/footer'); ?>
