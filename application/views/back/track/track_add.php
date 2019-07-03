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
          <li><a href="#"><?php echo $module ?></a></li>
					<li class="active"><?php echo $title ?></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
						<div class="box box-primary">
              <div class="box-body">
								<?php echo validation_errors() ?>
								<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
								<?php echo form_open($action);?>
									<div class="form-group">
                                    <label class="control-label" for="datetime">Date</label>
                                    <input name="tgl_tracking" class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
										<!-- <?php echo date($tgl_tracking);?> -->
									</div>
                                    </div>
									<div class="form-group"><label>Status Tracking</label>
										<?= form_dropdown('', $ambil_status, '', $status_tracking); ?>
									</div>

                                 <div class="form-row">
                                     <div class="form-group col-md-6"><label>Provinsi</label>
                                          <?php echo form_dropdown('', $ambil_provinsi, '', $provinsi_id); ?>
                                    </div>
                                 <div class="form-group col-md-6"><label>Kabupaten/ Kota</label>
                               <?php echo form_dropdown('', array(''=>'- Pilih Kota -'), '', $kota_id); ?>
                            </div>
                      </div>
                                    <div class="form-group"><label>Alamat Tracking</label>
										<?php echo form_input($alamat_tracking);?>
									</div>
                                    <div class="form-group"><label>No Resi</label>
                                    <?php echo form_dropdown('', $allidresi,'' , $subkat_id); ?><br>
									</div>
									<button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
									<button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
								<?php echo form_close(); ?>
							</div>
						</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>

	 <!-- <script type="text/javascript">
	function tampilKota()
	{
	  provinsi_id = document.getElementById("provinsi_id").value;
	  $.ajax({
		  url:"<?php echo base_url();?>track/pilih_kota/"+provinsi_id+"",
		  success: function(response){
		    $("#kota_id").html(response);
		  },
		  dataType:"html"
	  });
	  return false;
	}
</script>
 -->

  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
  
</body>
</html>
	 <script type="text/javascript">
	function tampilKota()
	{
	  provinsi_id = document.getElementById("provinsi_id").value;
	  $.ajax({
		  url:"<?php echo base_url();?>auth/pilih_kota/"+provinsi_id+"",
		  success: function(response){
		    $("#kota_id").html(response);
		  },
		  dataType:"html"
	  });
	  return false;
	}
</script>


