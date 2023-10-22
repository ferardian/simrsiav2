<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="index.php" class="logo">
        <img width="13%" src="<?php echo base_url();?>assets/panel/images/users/rsiap.png" alt="user" class="rounded-circle">

            <span>RSIAP Klaim BPJS</span></a>
    </div>

    <nav class="navbar-custom">
    <?
                    $photo = $this->dashboard_mod->getPhoto($this->session->userdata('id_user'))->row();
                    ?>
        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="<?php echo $_SERVER["DOCUMENT_ROOT"] ?>/../../../rsiap/file/pegawai/<?=$photo->photo?>" alt="user" style="border-radius: 50%; object-fit: cover;">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                    <h5 class="text-overflow"><small><?=$this->session->userdata('nama')?></small> </h5>
                    </div>

                    <!-- item-->

                    <!-- item-->
                    <a onclick="keluar()" href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
            <li class="hidden-mobile app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->

<script type="text/javascript">

    function keluar (){
  var jawab = confirm('Yakin Ingin Keluar?');
  if (jawab) {
    window.location='<?php echo base_url();?>login_controller/logout';
  }

}

</script>
