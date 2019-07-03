<div align="center"><img src="<?php echo base_url('assets/images/wa.jpg') ?>" width="100px"></div>
<?php foreach($kontak as $kontak){?>
  <b><?php echo $kontak->nama ?></b><br>
  +<?php echo $kontak->nohp ?><br>
  <a href="https://api.whatsapp.com/send?phone=+<?php echo $kontak->nohp ?>&text=Hi%20Gan,%20Saya%20minat%20dengan%20barangnya%20yang%20di%20website">
    <button class="btn btn-success" type="submit" name="button">Chat via Whatsapp (klik disini)</button>
  </a><br><br>
<?php } ?>
