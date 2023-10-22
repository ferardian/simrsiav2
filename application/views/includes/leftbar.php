<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <?
                if ($this->session->userdata('departemen')=="DNM1" || $this->session->userdata('departemen')=="DM14") {?>
                    <li class="has_sub">
                    <a href="<?php echo base_url();?>dashboard/cetak_resume" class="waves-effect"><i class="fa fa-dashboard"></i><span>Cetak Resume + Billing</span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="<?php echo base_url();?>dashboard/data_naik_kelas" class="waves-effect"><i class="fa fa-dashboard"></i><span>Data Naik Kelas</span> </a>
                    </li>
                <?} else {?>
                    <li class="has_sub">
                        <a href="<?php echo base_url();?>dashboard" class="waves-effect"><i class="fa fa-dashboard"></i><span>Dashboard </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="<?php echo base_url();?>dashboard/index2" class="waves-effect"><i class="fa fa-dashboard"></i><span>Berkas Klaim </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="<?php echo base_url();?>dashboard/index3" class="waves-effect"><i class="fa fa-dashboard"></i><span>Berkas Klaim Pengajuan</span> </a>
                    </li>
                        <li class="has_sub">
                        <a href="<?php echo base_url();?>dashboard/data_naik_kelas" class="waves-effect"><i class="fa fa-dashboard"></i><span>Data Naik Kelas</span> </a>
                    </li>
                 
                <?}
               ?>
               



            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
