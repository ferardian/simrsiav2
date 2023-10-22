<?php require 'includes/header_start.php'; ?>

    <!-- DataTables -->
    <link href="<?echo base_url()?>assets/panel/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?echo base_url()?>assets/panel/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?echo base_url()?>assets/panel/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="<?echo base_url()?>assets/panel/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?echo base_url()?>assets/panel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?echo base_url()?>assets/panel/plugins/custombox/css/custombox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/panel/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/panel/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>



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


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">DATA KLAIM</h4>

                        

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
<div class="row">
    
                    <div class="col-12">
                        <div class="card-box table-responsive">
                        <div class="form-group">
                                                        <label>Filter Data</label>
                                                        <form role="form" method="POST" class="tampil" action="">
                                                        <div class="row">
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control date1" placeholder="yyyy/mm/dd" name="tgl1" data-date-format='yyyy-mm-dd' id="datepicker-autoclose" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                                                </div>
                                                            </div><!-- input-group -->
                                                        </div>
                                                        <div>
                                                            <div class="input-group">
                                                               &nbsp;
                                                               &nbsp;
                                                               &nbsp;
                                                            </div><!-- input-group -->
                                                        </div>
                                                            
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control date2" placeholder="yyyy/mm/dd" name="tgl2" data-date-format='yyyy-mm-dd' id="datepicker-autoclose" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                                                </div>
                                                            </div><!-- input-group -->
                                                        </div>
                                                        &nbsp;
                                                               &nbsp;
                                                               &nbsp;
                                                               &nbsp;
                                                <div class="radio">
                                                    <input type="radio" name="status" id="radio1" value="RANAP">
                                                    <label for="radio1">
                                                        RANAP
                                                    </label>
                                                    &nbsp;
                                                    <input type="radio" name="status" id="radio2" value="RALAN">
                                                    <label for="radio2">
                                                        RAJAL
                                                    </label>
                                                    &nbsp;
                                                    <!-- <input type="radio" name="status" id="radio3" value="SEMUA">
                                                    <label for="radio3">
                                                        SEMUA
                                                    </label>
                                                    &nbsp;
                                                    <input type="radio" name="status" id="radio4" value="UMUM">
                                                    <label for="radio4">
                                                        PASIEN UMUM
                                                    </label> -->
                                                </div>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    <button type="button" class="btn tombol btn-primary" onclick="cari()" disabled="disabled"> <span><i class="fa fa-search"></i></span></button>

                                                        </div>
                                                        </form>
                                                    </div>
                                                    <hr>
                                                    <div class="konten1">

                    </div>
          <div class="body" id="div0">

                            <table id="datatable-buttons" class="table table-striped table-bordered tb-sm" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Data Registrasi</th>
                                    <th>Data Kunjungan</th>
                                    <th>Berkas Upload</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?
                                        foreach ($pasien as $data ) {
                                            @$get_status = $this->dashboard_mod->get_status($data->no_sep)->row();
                                            ?>
                                            <tr>
                                                <td>
                                                    <form action="<?php echo base_url('dashboard/cetak_resume_keuangan');?>" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" name="no_rawat" value="<?=$data->no_rawat;?>">
                                                        <input type="hidden" name="aksi" value="lihat">
                                                        <button type="submit" name="submit" class="btn btn-sm btn-success" formtarget="_blank">Lihat Berkas Klaim</button>
                                                    </form>
                                                    <!-- <button class="btn btn-sm btn-primary" style="margin-bottom: 5px;">Lihat Berkas Klaim</button>  -->
                                                    <br>

                                                </td>
                                                <td>
                                                    <table class="table mb-0 table-sm table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <td width="80px">
                                                                    No. Rawat
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <?=$data->no_rawat?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <?=$data->nm_pasien?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No. RM
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <?=$data->no_rkm_medis?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Poli
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <?=$data->nm_poli?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Dokter
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <?=$data->nm_dokter?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tgl. Register
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <?=$data->tgl_registrasi?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table class="table mb-0 table-sm table-borderless tb-sm">
                                                        <tr>
                                                            <td width="110px">No. SEP</td>
                                                            <td>:</td>
                                                            <td><?=$data->no_sep?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tgl. SEP</td>
                                                            <td>:</td>
                                                            <td><?=$data->tglsep?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Pelayanan</td>
                                                            <td>:</td>
                                                            <td><?=($data->status_lanjut)?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peserta</td>
                                                            <td>:</td>
                                                            <td><?=$data->peserta?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Kartu</td>
                                                            <td>:</td>
                                                            <td><?=$data->no_kartu?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Diagnosa Utama</td>
                                                            <td>:</td>
                                                            <td><?=@$this->dashboard_mod->getDiagnosa($data->no_rawat)->kd_penyakit." ".@$this->dashboard_mod->getDiagnosa($data->no_rawat)->nm_penyakit;?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table class="table mb-0 table-sm table-borderless tb-sm">
                                                        <?
                                                        // $no=1;
                                                        $berkas = $this->dashboard_mod->get_berkas($data->no_rawat)->result();
                                                        $berkas2 = $this->dashboard_mod->get_berkas2($data->no_rawat)->result();
                                                            foreach ($berkas as $dt) {?>
                                                            <tr>
                                                                <td>-</td>
                                                                <td>
                                                                    <?=$dt->nama?> 
                                                                </td>
                                                            </tr>
                                                            <?
                                                   
                                                        }
                                                        
                                                        foreach ($berkas2 as $dt) {?>
                                                            <tr>
                                                                <td>-</td>
                                                                <td>
                                                                    <?=strtoupper($dt->kategori)?> 
                                                                </td>
                                                            </tr>
                                                            <?
                                                         
                                                        }
                                                        ?>
                                                    </table>
                                                   
                                                </td>
                                             
                                            </tr>
                                        <?}
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title">Input Data</h4>
                    <div class="custom-modal-text konten">
                        
                    </div>
                </div>
                </div> <!-- container -->

</div> <!-- content -->


</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mySmallModalLabel">Upload Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body konten">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

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

                <?php require 'includes/footer_start.php' ?>

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

    <!-- Key Tables -->
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/dataTables.keyTable.min.js"></script>

    <!-- Responsive examples -->
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Selection table -->
    <script src="<? echo base_url()?>assets/panel/plugins/datatables/dataTables.select.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/moment/moment.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/clockpicker/bootstrap-clockpicker.js"></script>
    <script src="<? echo base_url()?>assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<? echo base_url()?>assets/panel/pages/jquery.form-pickers.init.js"></script>
    
    <script src="<?php echo base_url() ?>assets/panel/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/custombox/js/custombox.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/custombox/js/legacy.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/panel/pages/jquery.formadvanced.init.js"></script>
    <?php require 'includes/footer_end.php' ?>




    <script type="text/javascript">

// function cetak (no_rawat) {
//             $.ajax({
//                 url: "<?php echo site_url('dashboard/cetak_resep')."/"; ?>"+no_rawat,
//                 success:function (data)
//                 {
//                     window.open("data:application/pdf," + data);
//                     // $('.konten').html(data);    
//                     // $('#modal').modal();
//                 }
//             });
//         }

function tampil_data(tgl1,tgl2,status){
    $.ajax({
            type: "POST",
            data:{tgl1 : tgl1, tgl2 : tgl2, status : status},
            url: "<?php echo site_url('dashboard/cari_pasien'); ?>",
            success: function  (data) {
                $('.konten1').html(data);

            }
        });  
}

function kirim_berkas(){
    
    $.ajax({
            type: "POST",
            data:{tgl1 : tgl1, tgl2 : tgl2, status : status},
            url: "<?php echo site_url('dashboard/cari_pasien'); ?>",
            success: function  (data) {
                $('.konten1').html(data);

            }
        });  
}

function detail (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/upload_berkas')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    $('.konten').html(data);    
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
function ambil_klaim_inacbg (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/get_lembar_klaim')."/"; ?>"+no_rawat,
                success:function(data)
                {
                    var dt = JSON.parse(data)
                    console.log(dt.status)
                    if (dt.status == true) {
                        swal.fire(
                        'Sukses',
                        'Berhasil Diambil',
                        'success'
                            )
                    } else {
                        swal.fire(
                            'Gagal',
                            'Proses Dibatalkan',
                            'error'
                        )
                    }
                }
                
            
               
           
               
            });
        }
function detail2 (no_rawat) {
            $.ajax({
                url: "<?php echo site_url('dashboard/upload_berkas')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    $('.konten2').html(data);    
                    // $('#custom-modal').modal();
                }
            });
        }

function cari() {
        $.ajax({
            type: "POST",
            data:$('.tampil').serialize(),
            url: "<?php echo site_url('dashboard/cari_cetak_resume'); ?>",
            beforeSend: function(){
                swal.fire({
                    title: 'Memproses Data',
                    text: 'Mohon Tunggu',
                    footer: '<img width="25" src="<? echo base_url(); ?>assets/gambar/rsiap.ico"><b>&nbsp;RSIA AISYIYAH PEKAJANGAN</b>',
                    onOpen: () => {
                        swal.showLoading();
                    } 
                })  
            },
            complete: function(){
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
            $('.konten1').html(data);
            $('#div0').hide();  
            }
        });  
    }

$('.radio').change(function(){
  $('.tombol').prop('disabled',false);
});

$('.date1').datepicker({
    dateFormat: "yyyy-mm-dd",
    todayHighlight: true,
    autoclose: true
});
$('.date2').datepicker({
    dateFormat: "yyyy-mm-dd",
    todayHighlight: true,
    autoclose: true
});

        $(document).ready(function() {

            // Default Datatable
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                paging: false,
                scrollY: '600px',
                scrollCollapse: true,
                ordering: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            // Key Tables

            $('#key-table').DataTable({
                keys: true
            });

            // Responsive Datatable
            $('#responsive-datatable').DataTable();

            // Multi Selection Datatable
            $('#selection-datatable').DataTable({
                select: {
                    style: 'multi'
                }
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>