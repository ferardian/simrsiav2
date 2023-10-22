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
                    }else if (@$status_ranap->status == "Batal Klaim"){
                        $arr_berkas_batal_ranap[] = $data;
                        $batal_ranap+=1;
                    }
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
                            <i class="icon-info float-right text-muted" style="color:white !important;"></i>
                            <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Perbaikan</h6>
                            <h2 class="m-b-20" data-plugin="counterup"><?=$perbaiki_ranap+$perbaiki_ralan?></h2>
                        </div>
                    </a>
                    <!-- </form> -->
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="verif_resume()" href="#">
                    <div class="card-box tilebox-one bg-warning text-white">
                        <i class="icon-note float-right text-muted" style="color:white !important;"></i>
                        <h6 class="text-muted text-uppercase m-b-20" style="color:white !important;">Verif Resume</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$verif_resume_ranap+$verif_resume_ralan?></span></h2>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-2">
                <a onclick="lengkap()" href="#">
                    <div class="card-box tilebox-one bg-primary text-white">
                        <i class="icon-check float-right text-muted" style="color:white !important;"></i>
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

<script>
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
            success: function(data) {
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
</script>            