<header class="main-header">
  <a href="<?php echo base_url('admin/dashboard') ?>" class="logo">
    <span class="logo-mini"><b>Multi</b></span>
    <span class="logo-lg"><b>Multi Plaza Admin</b></span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
        </li>
        <!-- notif upload pembayaran -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle gel" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
          <ul class="dropdown-menu list-notif">
          </ul>
        </li>
        <!-- end notif -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url()?>assets/images/user/<?php echo $this->session->userdata('photo').$this->session->userdata('photo_type') ?>" width="160px" height="160px" class="user-image" alt="User Image"/>
            <span class="hidden-xs">
              Halo, <?php echo $this->session->userdata('name') ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo base_url()?>assets/images/user/<?php echo $this->session->userdata('photo').$this->session->userdata('photo_type') ?>" class="img-circle" alt="User Image" />
              <p>
              <?php echo $this->session->userdata('identity') ?>
              </p>
            </li>
            <li class="user-body">
              <div class="col-xs-6 text-center">
                <a href='<?php $user_id = $this->session->userdata('user_id'); echo base_url('admin/auth/edit_user/'.$user_id.'') ?>' class='btn btn-default btn-flat'>Edit Profil</a>
              </div>
              <div class="col-xs-6 text-center">
                <a href='<?php echo base_url() ?>admin/auth/logout' class='btn btn-default btn-flat'>Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<script>
  var base_url = "<?php echo base_url();?>";
  // var base_url = "<?php echo base_url('admin/dashboard/notif') ?>";
  $(document).ready(function() {
    function load_unseen_notification(view = '')
    {
      $.ajax({
        url:base_url+'admin/dashboard/notif',
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
          $('.list-notif').html(data.notification);
          if (data.unseen_notification > 0 ) 
          {
            $('.count').html(data.unseen_notification);
          }
        }
      });
    }

    load_unseen_notification();

    $(document).on('click','.gel', function() {
      $('.count').html('');
      load_unseen_notification('yes');
    });

    setInterval(function(){
      load_unseen_notification();;
    }, 5000);

  });
</script>