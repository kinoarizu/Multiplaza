<center>
<div class="row">
  <div class="col-lg-12">
    <ul id="thumbnails">
      <?php foreach($slider_data as $slider){ ?>
        <li>
          <a href="<?php echo $slider->link ?>" target="_self">
            <img src="<?php echo base_url('assets/images/slider/').$slider->foto.$slider->foto_type?>">
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>
</center>

<script type="text/javascript">
	var thumbs = jQuery('#thumbnails').slippry({
	// general elements & wrapper
	slippryWrapper: '<div class="slippry_box thumbnails" />',
	// options
	transition: 'horizontal',
	onSlideBefore: function (el, index_old, index_new) {
		jQuery('.thumbs a img').removeClass('active');
		jQuery('img', jQuery('.thumbs a')[index_new]).addClass('active');
	}
	});

	jQuery('.thumbs a').click(function () {
	thumbs.goToSlide($(this).data('slide'));
	return false;
	});
</script>
<!-- bxSlider Javascript file -->
<script src="<?php echo base_url('assets/plugins/slider/jquery.bxslider/jquery.bxslider.min.js') ?>"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo base_url('assets/plugins/slider/jquery.bxslider/jquery.bxslider.css') ?>" rel="stylesheet" />
<script type="text/javascript">$('.bxslider').bxSlider({auto: true,});</script>
