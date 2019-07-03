<hr><h4 align="center">Blog</h4><hr>
<?php foreach($blog_new_data as $blog){ ?>
  <div class="row">
    <div class="col-sm-4">
      <a href="<?php echo base_url("blog/read/$blog->slug_blog ") ?>">
        <?php
        if(empty($blog->foto)) {echo "<img class='img-thumbnail' src='".base_url()."assets/images/no_image_thumb.png'>";}
        else { echo " <img class='img-thumbnail' src='".base_url()."assets/images/blog/".$blog->foto.'_thumb'.$blog->foto_type."'> ";}
        ?>
      </a>
    </div>
    <div class="col-sm-8">
      <h5><a href="<?php echo base_url("blog/read/$blog->slug_blog ") ?>"><?php echo character_limiter($blog->judul_blog,100) ?></a></h5>
      <i class="fa fa-user"></i> <?php echo $blog->created_by ?> | <i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($blog->created)); ?>
      <p><?php echo character_limiter($blog->isi_blog,350) ?></p>
      <p align="right">
        <a href="<?php echo base_url("blog/read/$blog->slug_blog ") ?>">
          <button type="button" name="button" class="btn btn-sm btn-primary">Selengkapnya</button>
        </a>
      </p>
    </div>
  </div>
  <br>
<?php } ?>
