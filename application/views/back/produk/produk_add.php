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
								<?php echo form_open_multipart($action);?>
									<div class="form-group"><label>Nama Barang</label>
										<?php echo form_input($judul_produk);?>
									</div>
									<div class="form-group"><label>Keywords</label>
										<?php echo form_input($keywords);?>
									</div>
									<div class="form-group"><label>Deskripsi Barang</label>
										<?php echo form_textarea($deskripsi);?>
									</div>
                  <div class="row">
                    <input class="form-control"  name="hd" type="hidden" id="c" size="30" onkeyup="hitung();" readonly/>
										<div class="col-lg-4"><label>Harga Normal</label>
											<?php echo form_input($harga_normal);?><br>
										</div>
										<div class="col-lg-4"><label>Diskon (%)</label>
											<?php echo form_input($diskon);?><br>
										</div>
										<div class="col-lg-4"><label>Harga Diskon</label>
											<?php echo form_input($harga_diskon);?><br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6"><label>Stok</label>
											<?php echo form_input($stok);?><br>
										</div>
										<div class="col-lg-6"><label>Berat</label>
											<?php echo form_input($berat);?><br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4"><label>Kategori</label>
											<?php echo form_dropdown('', $ambil_kategori, '', $kat_id); ?><br>
										</div>
										<div class="col-lg-4"><label>Sub Kategori</label>
											<?php echo form_dropdown('', array(''=>'- Pilih Sub Kategori -'), '', $subkat_id); ?><br>
										</div>
										<div class="col-lg-4"><label>SuperSubKategori</label>
											<?php echo form_dropdown('', array(''=>'- Pilih SubKategori Dulu -'), '', $supersubkat_id); ?>
										</div><br>
									</div>
									<div class="form-group"><label>Gambar</label>
										<input type="file" class="form-control" name="foto" id="foto" onchange="tampilkanPreview(this,'preview')"/>
										<br><p><b>Preview Gambar</b><br>
										<img id="preview" src="" alt="" width="350px"/>
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
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
	<script src="<?php echo base_url('assets/plugins/jquery/angka.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
  function hitung() {
    var a = $("#a").val();
    var b = $("#b").val();
    c = a * b/100; //Persentase: a x b dibagi 100%
    $("#c").val(c);
    d = b - c; //Harga Setelah Diskon: Harga Awal (b) - Harga Diskon (c)
    $("#d").val(d);
  }
	tinymce.init({
		selector: "textarea",

		// ===========================================
		// INCLUDE THE PLUGIN
		// ===========================================

		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste jbimages"
		],

		// ===========================================
		// PUT PLUGIN'S BUTTON on the toolbar
		// ===========================================

		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

		// ===========================================
		// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
		// ===========================================

		relative_urls: false,
		remove_script_host : false,
		convert_urls : true,

	});

	function tampilkanPreview(foto,idpreview)
	{ //membuat objek gambar
		var gb = foto.files;
		//loop untuk merender gambar
		for (var i = 0; i < gb.length; i++)
		{ //bikin variabel
			var gbPreview = gb[i];
			var imageType = /image.*/;
			var preview=document.getElementById(idpreview);
			var reader = new FileReader();
			if (gbPreview.type.match(imageType))
			{ //jika tipe data sesuai
				preview.file = gbPreview;
				reader.onload = (function(element)
				{
					return function(e)
					{
						element.src = e.target.result;
					};
				})(preview);
				//membaca data URL gambar
				reader.readAsDataURL(gbPreview);
			}
			else
			{ //jika tipe data tidak sesuai
				alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
			}
		}
	}

	function tampilSubkat()
	{
		kat_id = document.getElementById("kat_id").value;
		$.ajax({
			url:"<?php echo base_url();?>admin/produk/pilih_subkategori/"+kat_id+"",
			success: function(response){
				$("#subkat_id").html(response);
			},
			dataType:"html"
		});
		return false;
	}

	function tampilSuperSubkat()
	{
		subkat_id = document.getElementById("subkat_id").value;
		$.ajax({
			url:"<?php echo base_url();?>admin/produk/pilih_supersubkategori/"+subkat_id+"",
			success: function(response){
				$("#supersubkat_id").html(response);
			},
			dataType:"html"
		});



		return false;
	}
</script>
</body>
</html>
