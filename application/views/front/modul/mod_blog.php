<?php foreach($blog_data as $blog){ ?>
  <div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4">
      <a href="<?php echo base_url('blog/read/').$blog->slug_blog ?>">
        <img class="img-fluid" src="<?php echo base_url('assets/images/blog/').$blog->foto.$blog->foto_type ?>">
      </a>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8">
      <a href="<?php echo base_url('blog/read/').$blog->slug_blog ?>"><h5><?php echo character_limiter($blog->judul_blog,'25') ?></h5></a>
    </div>
  </div><br>
<?php } ?>
