<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/panel/plugins/morris/morris.css">
<link href="<?echo base_url()?>assets/panel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <!-- DataTables -->
  <link href="<?echo base_url()?>assets/panel/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?echo base_url()?>assets/panel/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />


<?php require 'includes/header_end.php'; ?>
<style>
    .modal {
  padding: 0 !important; // override inline padding-right added from js
}
.modal .modal-dialog {
  width: 100%;
  max-width: none;
  height: 100%;
  margin: 0;
}
.modal .modal-content {
  height: 100%;
  border: 0;
  border-radius: 0;
}
.modal .modal-body {
  overflow-y: auto;
}
</style>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard Klaim Bulan <?=bulan_panjang($bulan)." ".$tahun;?></h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">RSIAP Klaim BPJS</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
            <div class="col-lg-6">
            <label>SET BULAN PELAYANAN</label>
                                                            <div class="input-group">
                                                                <form action="">
                                                                <input type="text" class="form-control date1" placeholder="Pilih Bulan" name="tgl1"  id="datepicker" required>
                                                                </form>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                                                </div>
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                <button type="button" class="btn tombol btn-success" onclick="cari()" disabled="disabled"> <span>Set BuPel</span></button>
                                                            </div><!-- input-group -->
                                                        </div>
                                                      
            </div>
            <br>
            <div id="body1">
            <?
            $arr_perbaiki_ranap = array();
            $arr_verif_resume_ranap = array();
            $arr_pengajuan_ranap = array();
            $arr_disetujui_ranap = array();
            $arr_klaim_ambulans_ranap = array();
            $arr_lengkap_ranap = array();
            $arr_berkas_batal_ranap = array();
            $arr_pending_ranap = array();
            
            $arr_perbaiki_ralan = array();
            $arr_verif_resume_ralan = array();
            $arr_pengajuan_ralan = array();
            $arr_disetujui_ralan = array();
            $arr_klaim_ambulans_ralan = array();
            $arr_lengkap_ralan = array();
            $arr_berkas_batal_ralan = array();
            $arr_pending_ralan = array();

            $perbaiki_ranap=0;
            $verif_resume_ranap=0;
            $pengajuan_ranap=0;
            $disetujui_ranap=0;
            $klaim_ambulans_ranap=0;
            $lengkap_ranap=0;
            $batal_ranap=0;
            $pending_ranap_jml=0;

            $perbaiki_ralan=0;
            $verif_resume_ralan=0;
            $pengajuan_ralan=0;
            $disetujui_ralan=0;
            $klaim_ambulans_ralan=0;
            $lengkap_ralan=0;
            $batal_ralan=0;
            $pending_ralan_jml=0;

                foreach ($perbaikan_ranap as $data ) {
                    $status_ranap = $this->dashboard_mod->hitung_status($data->no_rawat)->row();
                    if (@$status_ranap->status == "Perbaiki") {
                        $arr_perbaiki_ranap[] = $data;
                        $perbaiki_ranap+=1;
                    } else if (@$status_ranap->status == "Verifikasi Resume"){
                        $arr_verif_resume_ranap[] = $data;
                        $verif_resume_ranap+=1;
                    } else if (@$status_ranap->status == "Pengajuan"){
                        $arr_pengajuan_ranap[] = $data;
                        $pengajuan_ranap+=1;
                    } else if (@$status_ranap->status == "Disetujui"){
                        $arr_disetujui_ranap[] = $data;
                        $disetujui_ranap+=1;
                    } else if (@$status_ranap->status == "Klaim Ambulans"){
                        $arr_klaim_ambulans_ranap[] = $data;
                        $klaim_ambulans_ranap+=1;
                    } else if (@$status_ranap->status == "Lengkap"){
                        $arr_lengkap_ranap[] = $data;
                        $lengkap_ranap+=1;
                    } else if (@$status_ranap->status == "Batal Klaim"){
                        $arr_berkas_batal_ranap[] = $data;
                        $batal_ranap+=1;
                    } 
                    // else if (@$status_ranap->status == "Pending"){
                    //     $arr_pending_ranap[] = $data;
                    //     $pending_ranap+=1;
                    // }
                }
                foreach ($perbaikan_ralan as $data ) {
                    $status_ralan = $this->dashboard_mod->hitung_status($data->no_rawat)->row();
                    if (@$status_ralan->status == "Perbaiki") {
                        $arr_perbaiki_ralan[] = $data;
                        $perbaiki_ralan+=1;
                    } else if (@$status_ralan->status == "Verifikasi Resume"){
                        $arr_verif_resume_ralan[] = $data;
                        $verif_resume_ralan+=1;
                    } else if (@$status_ralan->status == "Pengajuan"){
                        $arr_pengajuan_ralan[] = $data;
                        $pengajuan_ralan+=1;
                    } else if (@$status_ralan->status == "Disetujui"){
                        $arr_disetujui_ralan[] = $data;
                        $disetujui_ralan+=1;
                    } else if (@$status_ralan->status == "Klaim Ambulans"){
                        $arr_klaim_ambulans_ralan[] = $data;
                        $klaim_ambulans_ralan+=1;
                    } else if (@$status_ralan->status == "Lengkap"){
                        $arr_lengkap_ralan[] = $data;
                        $lengkap_ralan+=1;
                    } else if (@$status_ralan->status == "Batal Klaim"){
                        $arr_berkas_batal_ralan[] = $data;
                        $batal_ralan+=1;
                    } 
                    // else if (@$status_ralan->status == "Pending"){
                    //     $arr_pending_ralan[] = $data;
                    //     $pending_ralan+=1;
                    // } 
                }

                foreach ($pending_ranap as $pr ) {
                    $cek_pending = $this->dashboard_mod->cek_pending($pr->no_rawat)->row();
                    if($cek_pending->status == 'Pending'){
                        $data_pasien = $this->dashboard_mod->pasien_pending($pr->no_rawat)->row();
                        $arr_pending_ranap[] = $data_pasien;
                        $pending_ranap_jml+=1;
                    }                    
                }
                foreach ($pending_ralan as $pr ) {
                    $cek_pending = $this->dashboard_mod->cek_pending($pr->no_rawat)->row();
                    if($cek_pending->status == 'Pending'){
                        $data_pasien = $this->dashboard_mod->pasien_pending($pr->no_rawat)->row();
                        $arr_pending_ralan[] = $data_pasien;
                        $pending_ralan_jml+=1;
                    }
                }

                // foreach ($arr_perbaiki_ranap as $key => $value) {
                //     echo $value->tanggal.'</br>';
                // }
            ?>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                    <!-- <form class="tampil-status"> -->
                    <a onclick="cari_perbaiki()" href="#">
                        <div class="card-box tilebox-one bg-danger text-white">
                            <i class="fa fa-warning float-right text-muted" style="color:white !important;"></i>
                            <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Perbaikan</h6>
                            <h2 class="m-b-20" data-plugin="counterup"><?=$perbaiki_ranap+$perbaiki_ralan?></h2>
                        </div>
                    </a>
                    <!-- </form> -->
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="verif_resume()" href="#">
                    <div class="card-box tilebox-one bg-warning text-white">
                        <i class="fa fa-edit float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Verif Resume</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$verif_resume_ranap+$verif_resume_ralan?></span></h2>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="lengkap()" href="#">
                    <div class="card-box tilebox-one bg-primary text-white">
                        <i class="fa fa-check-square-o float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Lengkap</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$lengkap_ranap+$lengkap_ralan?></span></h2>
                        
                    </div>
                </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="batal()" href="#">
                    <div class="card-box tilebox-one bg-danger text-white">
                        <i class="fa fa-calendar-times-o float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Batal Klaim</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$batal_ralan+$batal_ranap?></span></h2>
                        
                    </div>
                </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                    <a onclick="pending()" href="#">
                    <div class="card-box tilebox-one bg-warning text-white">
                        <i class="icon-user-following float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Pending</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$pending_ranap_jml+$pending_ralan_jml?></span></h2>
                        
                    </div>
                </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                    <a onclick="disetujui()" href="#">
                    <div class="card-box tilebox-one bg-info text-white">
                        <i class="icon-user-following float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Disetujui</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$disetujui_ranap+$disetujui_ralan?></span></h2>
                        
                    </div>
                </a>
                </div>
             
            </div>
            <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="pengajuan_rajal()" href="#">
                    <div class="card-box tilebox-one bg-secondary text-white">
                        <i class="fa fa-send-o float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Pengajuan RJ</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$pengajuan_ralan?></span></h2>
                        
                    </div>
                </a>
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <!-- <form class="tampil-status"> -->
                    <a onclick="klaim_ralan()" href="#">
                        <div class="card-box tilebox-one bg-primary text-white">
                            <i class="fa fa-cloud-upload float-right text-muted" style="color:white !important;"></i>
                            <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Berkas Kirim Ralan</h6>
                            <h2 class="m-b-20" data-plugin="counterup"><?=count($berkas_klaim_ralan)?></h2>
                        </div>
                    </a>
                    <!-- </form> -->
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="pengajuan_ranap()" href="#">
                    <div class="card-box tilebox-one bg-dark text-white">
                        <i class="fa fa-send-o float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Pengajuan RI</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$pengajuan_ranap?></span></h2>
                        
                    </div>
                </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <a onclick="klaim_ranap()" href="#">
                    <div class="card-box tilebox-one bg-success text-white">
                        <i class="fa fa-cloud-upload float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Berkas Kirim Ranap</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=count($berkas_klaim_ranap)?></span></h2>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="klaim_ambulans()" href="#">
                    <div class="card-box tilebox-one bg-warning text-white">
                        <i class="fa fa-send-o float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="font-size:10pt;color:white !important;">Klaim Ambulans</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$klaim_ambulans_ralan+$klaim_ambulans_ranap?></span></h2>
                        
                    </div>
                </a>
                </div>
              
            </div>
            </div>
            <div id="body2">

            </div>
            <div class="konten_perbaiki">

            </div>
            
            <!-- end row -->


        
            <!-- end row -->


           
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->


</div>
<!-- End content-page -->

<div class="modal fade modal_status" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mySmallModalLabel">Status Pengajuan Klaim</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body konten_status">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
<div class="modal fade modal_cppt" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mySmallModalLabel">Data CPPT</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body konten_cppt">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>

<!--Morris Chart-->
<script src="<?php echo base_url();?>assets/panel/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url();?>assets/panel/plugins/raphael/raphael-min.js"></script>


<!-- Page specific js -->
<script src="<?php echo base_url();?>assets/panel/pages/jquery.dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/moment/moment.js"></script>

<script src="<?echo base_url()?>assets/panel/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="<? echo base_url()?>assets/panel/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/jszip.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/pdfmake.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/vfs_fonts.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/buttons.print.min.js"></script>
<script src="<? echo base_url()?>assets/panel/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <script src="<?php echo base_url() ?>assets/panel/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<? echo base_url()?>assets/panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/clockpicker/bootstrap-clockpicker.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<? echo base_url()?>assets/panel/pages/jquery.form-pickers.init.js"></script>
<script>

// $('.konten_perbaiki').hide();
function dashboard(status){
    $.ajax({
                url: "<?php echo site_url('dashboard/index_load'); ?>",
                success:function (data)
                {
                    $('#body2').html(data);    
                    $('#body1').remove();    
                    // cari_perbaiki();
                    if (status === "Perbaiki") {
                    cari_perbaiki();
                    // cari_perbaiki();
                } else if (status === "Verifikasi Resume") {
                    verif_resume();
                } else if (status === "Lengkap") {
                    lengkap();
                } else if (status === "Pengajuan") {
                    pengajuan();
                    // pengajuan();
                } else if (status === "Disetujui") {
                    disetujui();
                } else if (status === "Klaim Ambulans") {
                    klaim_ambulans();
                } else if (status === "Batal Klaim") {
                    disetujui();
                }
                }
            });
}

function cari_perbaiki(){
    var status = "Perbaiki";
    var data1 = '<?php echo json_encode($arr_perbaiki_ralan)?>';
    var data2 = '<?php echo json_encode($arr_perbaiki_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function  (data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function verif_resume(){
    var status = "Verifikasi Resume";
    var data1 = '<?php echo json_encode($arr_verif_resume_ralan)?>';
    var data2 = '<?php echo json_encode($arr_verif_resume_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function lengkap(){
    var status = "Lengkap";
    var data1 = '<?php echo json_encode($arr_lengkap_ralan)?>';
    var data2 = '<?php echo json_encode($arr_lengkap_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function batal(){
    var status = "Batal Klaim";
    var data1 = '<?php echo json_encode($arr_berkas_batal_ralan)?>';
    var data2 = '<?php echo json_encode($arr_berkas_batal_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function pengajuan_rajal(){
    var status = "Pengajuan";
    var data1 = '<?php echo json_encode($arr_pengajuan_ralan)?>';
    var data2 = '<?php echo json_encode([])?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}
function pengajuan_ranap(){
    var status = "Pengajuan";
    // var data1 = '';
    var data1 = '<?php echo json_encode($arr_pengajuan_ranap)?>';
    var data2 = '<?php echo json_encode([])?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function klaim_ambulans(){
    var status = "Klaim Ambulans";
    var data1 = '<?php echo json_encode($arr_klaim_ambulans_ralan)?>';
    var data2 = '<?php echo json_encode($arr_klaim_ambulans_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function disetujui(){
    var status = "Disetujui";
    var data1 = '<?php echo json_encode($arr_disetujui_ralan)?>';
    var data2 = '<?php echo json_encode($arr_disetujui_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status, data1: data1, data2: data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function pending(){
    var status = "Pending";
    var data1 = '<?php echo json_encode($arr_pending_ralan)?>';
    var data2 = '<?php echo json_encode($arr_pending_ranap)?>';
    console.log(data2);
    $.ajax({
            type: "POST",
            data:{status: status,data1:data1,data2:data2},
            url: "<?php echo site_url('dashboard/cari_status'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function klaim_ralan(){
    var data1 = '<?php echo json_encode($berkas_klaim_ralan)?>';
    console.log(data1);
    $.ajax({
            type: "POST",
            data:{data1: data1},
            url: "<?php echo site_url('dashboard/cari_berkas'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function klaim_ranap(){
    // var status = "";
    var data1 = '<?php echo json_encode($berkas_klaim_ranap)?>';
    // var data2 = "";
    console.log(data1);
    $.ajax({
            type: "POST",
            data:{data1: data1},
            url: "<?php echo site_url('dashboard/cari_berkas'); ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    }
                })
            },
            complete: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses !',
                    text: 'Data Berhasil Diproses',
                    showConfirmButton: false,
                    timer: 1500
                    // text: 'Something went wrong!',
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            },
            success: function(data) {
                $('.konten_perbaiki').html(data);
            // $('#div0').hide();  
            }
        });  
}

function detail_status (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/status_klaim')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    $('.konten_status').html(data);    
                    // $('#custom-modal').modal();
                }
            });
        }

function detail_status_dashboard (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/status_klaim_dashboard')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    $('.konten_status').html(data);    
                    // $('#custom-modal').modal();
                }
            });
        }

function ambil_cppt (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/ambil_cppt')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    $('.konten_cppt').html(data);    
                    // $('#custom-modal').modal();
                }
            });
        }

        function ambil_klaim_inacbg (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/get_lembar_klaim')."/"; ?>"+no_rawat,
                success:function(data)
                {
                    // var dt = JSON.parse(data)
                    // console.log(dt.status)
                    // if (dt.status == true) {
                    //     swal.fire(
                    //     'Sukses',
                    //     'Berhasil Diambil',
                    //     'success'
                    //         )
                    // } else {
                    //     swal.fire(
                    //         'Gagal',
                    //         'Proses Dibatalkan',
                    //         'error'
                    //     )
                    // }
                }
                
            
               
           
               
            });
        }

function kirim_berkas (no_rawat) {
    var aksi = "kirim";
    var no_rawat = no_rawat;
    var status = "Pengajuan";
    console.log(no_rawat);
            $.ajax({
                type: "POST",
                data:{no_rawat: no_rawat, aksi: aksi},
                url: "<?php echo site_url('dashboard/cetak_resep'); ?>",
                success:function (data)
                {
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'SUKSES!',
                    html: '<b>--BERHASIL--</b>',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    dashboard(status);

                }
            });
        }


    $("#datepicker").datepicker({
        format: 'yyyy-mm',
  todayHighlight:'TRUE',

                viewMode: "years",
                minViewMode: "months",
                autoclose: true
    
});



</script>
<?php require 'includes/footer_end.php' ?>