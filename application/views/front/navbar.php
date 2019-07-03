
<div id='cssmenu' class="align-center">

  <ul>
  <body>
  <li class='active'><a href='<?php echo base_url() ?>'>MultiPlaza Computer</a></li>
  <!-- <a class="navbar-brand" href="<?php echo base_url() ?>">Multi Plaza Computer</a> -->
  </body>
    <li class='active'><a href='<?= base_url('blog/paymentway') ?>'><i class=""></i> <font size="0.3px" >Cara Bayar</font></a>
    <li class='active'><a href='#'><i class="fa fa-tags"></i> Kategori</a>
      <ul>
        <li><a href="<?php echo base_url('produk/katalog') ?>">Semua Produk</a></li>
        <?php
        $sql = $this->db->query("SELECT * FROM kategori ORDER BY judul_kategori"); // Memanggil kategori/ top kategori
        $data = $sql->result();
        foreach($data as $row)
        {
          $id_kat = $row->id_kategori;
          echo '
          <li><a href="'.base_url('kategori/read/').$row->slug_kat.'">'.$row->judul_kategori.' </a>
            <ul>';

          $sql2   =  $this->db->query("SELECT * FROM subkategori WHERE id_kat = '$id_kat' ORDER BY judul_subkategori "); // Memanggil subkategori/ middle kategori
          $data2  = $sql2->result();
          foreach($data2 as $row2)
          {
            $id_sub = $row2->id_subkategori;
            echo '
              <li><a href="'.base_url('kategori/read/').$row->slug_kat.'/'.$row2->slug_subkat.'">'.$row2->judul_subkategori.'</a>';

            $sql3 =  $this->db->query("SELECT * FROM supersubkategori WHERE id_subkat = '$id_sub' ORDER BY judul_supersubkategori "); // Memanggil subkategori/ middle kategori
            $data3 = $sql3->result();
            if($sql3->row() == TRUE)
            {
              echo '<ul>';
              foreach($data3 as $row3)
              {
                $id_supersub = $row3->id_supersubkategori;
                echo '
                <li><a href="'.base_url('kategori/read/').$row->slug_kat.'/'.$row2->slug_subkat.'/'.$row3->slug_supersubkat.'">'.$row3->judul_supersubkategori.'</a></li>';
              }
              echo '
                </ul>
              </li>';
            }
            else
            {
              foreach($data3 as $row3)
              {
                $id_supersub = $row3->id_supersubkategori;
                echo '<li><a href="'.base_url('kategori/read/').$row->slug_kat.'/'.$row2->slug_subkat.'/'.$row3->slug_supersubkat.'">'.$row3->judul_supersubkategori.'</a></li>';
              }

            }
          }
          echo '
          </ul>';
        }
        echo '
        </li>';
        ?>
      </ul>
    </li>
    <li>
      <a href="#">
        <?php echo form_open('produk/cari_produk') ?>
          <input class="form-control mr-md-5" type="text" name="cari" size="30" placeholder="Cari Barang">
        <?php echo form_close() ?>
      </a>
    </li>
    <?php
      if ($total_cart_navbar == "") {
    ?>
        <li><a href="#"><i class="fa fa-shopping-cart"></i> Keranjang (<?php echo $total_cart_navbar ?>)</a></li>
    <?php
      }else{
    ?>
        <li><a href="<?php echo base_url('cart') ?>"><i class="fa fa-shopping-cart"></i> Keranjang (<?php echo $total_cart_navbar ?>)</a></li>
    <?php
      }
    ?>
    <?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
    <li>
      <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user"></i> Hi, <?php echo $this->session->userdata('username') ?>
      </a>
      <ul>
        <li><a href="<?php echo base_url('cart/history/')?>">Riwayat Transaksi</a></li>
        <li><a href="<?php echo base_url('tracking/history') ?>">Lihat Tracking</a></li>
        <li><a href="<?php echo base_url('auth/profil') ?>">Profil Saya</a></li>
        <li><a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profil</a></li>

        <!-- <li><a href="<?php echo base_url('konfirmasi_pembayaran') ?>">Konfirmasi Pembayaran</a></li> -->
        <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
      </ul>
    </li>
    <li>
      <a href="#" role="button">
      <?php
        if ($isi_notif == "") {
      ?>
        <i class="fas fa-bell" style="width: 24px;heigth: 24px;"></i>notif (<?= $total_notif ?>)
      <?php
        }else {
      ?>
        <i class="fas fa-bell" style="width: 24px;heigth: 24px;"></i>notif(<?= $total_notif ?>)
      <?php
        }
      ?>
      </a>
      <ul class="dropdown-menu scrollable-menu" role="menu">
        <li><a href="#">Barang terkirim:</a></li>
        <?php foreach ($isi_notif as $isi){ ?>
          <li><a href="<?= base_url('cart/history_detail/'. $isi->trans_id); ?>"><?= $isi->judul_produk ?></a></li>
        <?php } ?>
      </ul>
    </li>
    <?php } else { ?>
    <li><a href="<?php echo base_url('auth/register') ?>"><i class="fa fa-user"></i> Register / Login</a></li>
    <?php } ?>
  </ul>
</div>
<br>
