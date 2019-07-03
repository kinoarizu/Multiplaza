<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"><img src="<?php echo base_url()?>assets/images/user/<?php echo $this->session->userdata('photo').$this->session->userdata('photo_type') ?>" class="img-circle" alt="User Image"/></div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('name'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MENU UTAMA</li>
      <li <?php if($this->uri->segment(2)=="dashboard"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>" target="_blank">
          <i class="fa fa-globe"></i> <span>Lihat Website</span>
        </a>
      </li>
      <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2)=="penjualan"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/penjualan') ?>">
          <i class="fa fa-money"></i> <span>Kelola Data Pemesanan</span>
        </a>
      </li>
      <?php endif ?>

       <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2)=="penjualan"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/track') ?>">
          <i class="fa fa-truck"></i> <span>Kelola Tracking</span>
        </a>
      </li>
      <?php endif ?>
      <?php if ($this->ion_auth->is_manager()): ?>
      <li <?php if($this->uri->segment(2)=="penjualan"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/penjualan') ?>">
          <i class="fa fa-money"></i> <span>Kelola Data Pemesanan</span>
        </a>
      </li>
      <?php endif ?>
      <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2)=="konfirmasi"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/konfirmasi') ?>">
          <i class="fa fa-check"></i> <span>Kelola Data Transaksi</span>
        </a>
      </li>
      <?php endif ?>

        <?php if ($this->ion_auth->is_manager()): ?>
      <li <?php if($this->uri->segment(2)=="konfirmasi"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/konfirmasi') ?>">
          <i class="fa fa-check"></i> <span>Kelola Data Transaksi</span>
        </a>
      </li>
      <?php endif ?>

      <li <?php if($this->uri->segment(2) == "produk"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-shopping-cart'></i><span>Kelola Data Barang </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "produk" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/produk/create') ?>'><i class='fa fa-circle-o'></i> Tambah Barang </a></li>
          <li <?php if($this->uri->segment(2) == "produk" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/produk') ?>'><i class='fa fa-circle-o'></i> Data Barang </a></li>
        </ul>
      </li>
      <li <?php if($this->uri->segment(2) == "featured"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-star'></i><span> Featured </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "featured" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/featured/create') ?>'><i class='fa fa-circle-o'></i> Tambah Featured </a></li>
          <li <?php if($this->uri->segment(2) == "featured" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/featured') ?>'><i class='fa fa-circle-o'></i> Data Featured </a></li>
        </ul>
      </li>
      <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2) == "kategori"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-tags'></i><span> Kategori </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "kategori" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kategori/create') ?>'><i class='fa fa-circle-o'></i> Tambah Kategori </a></li>
          <li <?php if($this->uri->segment(2) == "kategori" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kategori') ?>'><i class='fa fa-circle-o'></i> Data Kategori </a></li>
        </ul>
      </li>
      <?php endif ?>

          <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2) == "subkategori"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-tags'></i><span> SubKategori </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "subkategori" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/subkategori/create') ?>'><i class='fa fa-circle-o'></i> Tambah SubKategori </a></li>
          <li <?php if($this->uri->segment(2) == "subkategori" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/subkategori') ?>'><i class='fa fa-circle-o'></i> Data SubKategori </a></li>
        </ul>
      </li>
       <?php endif ?>

       <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2) == "supersubkategori"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-tags'></i><span> SuperSubKategori </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "supersubkategori" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/supersubkategori/create') ?>'><i class='fa fa-circle-o'></i> Tambah SuperSubKategori </a></li>
          <li <?php if($this->uri->segment(2) == "supersubkategori" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/supersubkategori') ?>'><i class='fa fa-circle-o'></i> Data SuperSubKategori </a></li>
        </ul>
      </li>
       <?php endif ?>
       <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2) == "slider"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-newspaper-o'></i><span> Slider </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "slider" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/slider/create') ?>'><i class='fa fa-circle-o'></i> Tambah Slider </a></li>
          <li <?php if($this->uri->segment(2) == "slider" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/slider') ?>'><i class='fa fa-circle-o'></i> Data Slider </a></li>
        </ul>
      </li>
      <?php endif ?>

      <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2)=="laporan"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/laporan') ?>">
          <i class="fa fa-file"></i> <span>Laporan</span>
        </a>
      </li>
      <?php endif ?>

      <li class="header">SETTING</li>

        <?php if ($this->ion_auth->is_manager()): ?>
      <li><a href='<?php echo base_url() ?>admin/company/update/1'> <i class="fa fa-building">
      </i> <span>Profil Toko</span> </a> </li>
      <?php endif ?>

      <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "kontak" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kontak/create') ?>'><i class='fa fa-circle-o'></i> Tambah Kontak </a></li>
          <li <?php if($this->uri->segment(2) == "kontak" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kontak') ?>'><i class='fa fa-circle-o'></i> Data Kontak </a></li>
        </ul>
      
      <li class='treeview'>
        <a href='<?php $user_id = $this->session->userdata('user_id'); echo base_url('admin/auth/edit_user/'.$user_id.'') ?>'>
          <i class='fa fa-edit'></i><span> Edit Akun </span>
        </a>
      </li>
      
      <?php if ($this->ion_auth->is_superadmin()): ?>
      <li <?php if($this->uri->segment(2) == "kontak"){echo "class='active'";} ?>>
        <a href='#'><i class  ='fa fa-phone'></i><span> Kontak </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "kontak" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kontak/create') ?>'><i class='fa fa-circle-o'></i> Tambah Kontak </a></li>
          <li <?php if($this->uri->segment(2) == "kontak" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kontak') ?>'><i class='fa fa-circle-o'></i> Data Kontak </a></li>
        </ul>
      </li>
      <?php endif ?>

      <?php if ($this->ion_auth->is_manager()): ?>
        <li <?php if($this->uri->segment(2) == "auth"){echo "class='active'";} ?>>
          <a href='#'><i class='fa fa-user'></i><span> Pegawai </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li <?php if($this->uri->segment(2) == "auth" && $this->uri->segment(3) == "create_user"){echo "class='active'";} ?>><a href='<?php echo base_url() ?>admin/auth/create_supplier'><i class='fa fa-circle-o'></i> Tambah Pegawai</a></li>
          </ul>
        </li>
      <?php endif ?>


      <?php if ($this->ion_auth->is_superadmin()): ?>
        <li <?php if($this->uri->segment(2) == "auth"){echo "class='active'";} ?>>
          <a href='#'><i class='fa fa-user'></i><span> User </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li <?php if($this->uri->segment(2) == "auth" && $this->uri->segment(3) == "create_user"){echo "class='active'";} ?>><a href='<?php echo base_url() ?>admin/auth/create_user'><i class='fa fa-circle-o'></i> Tambah User</a></li>
            <li <?php if($this->uri->segment(2) == "auth" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url() ?>admin/auth/'><i class='fa fa-circle-o'></i> Data User</a></li>
          </ul>
        </li>
      <?php endif ?>
      <li> <a href='<?php echo base_url() ?>admin/auth/logout'> <i class="fa fa-sign-out"></i> <span>Logout</span> </a> </li>
    </ul>

  </section>
</aside>
