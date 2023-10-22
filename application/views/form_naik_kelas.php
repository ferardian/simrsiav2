<div class="row">
                    <div class="col-12">
                        <form class="tampil-data" enctype="multipart/form-data" method="POST">
                    <div class="card-box">                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">No. Rawat</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=$no_rawat?>" disabled>
                                                    <input type="hidden" name="no_rawat" value="<?=$no_rawat?>">
                                        </fieldset>
                                  
                                    <!-- </form> -->
                                </div><!-- end col -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                
                                      
                                        <fieldset class="form-group">
                                            <label for="no_rawat">No. SEP</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=@$sep->no_sep?>" disabled>
                                                    <input type="hidden" name="no_sep" value="<?=@$sep->no_sep?>">
                                                    <input type="hidden" name="jenis" value="<?=@$sep->jnspelayanan?>">
                                                    <input type="hidden" name="tgl_registrasi" value="<?=@$sep->tglsep?>">
                                                    <input type="hidden" name="norm" value="<?=@$sep->nomr?>">
                                        </fieldset> 
                                       
                                    <!-- </form> -->
                                </div><!-- end col -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                    <!-- <form class="tampil-data" action="<?php echo base_url('dashboard/simpan_status_klaim');?>" enctype="multipart/form-data" method="POST"> -->
                                    <!-- <input type="hidden" name="tgl1" value="<?=@$tgl1?>">
                                        <input type="hidden" name="tgl2" value="<?=@$tgl2?>">
                                        <input type="hidden" name="status" value="<?=$status?>"> -->
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Nama Pasien</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=$pasien->nm_pasien?>" disabled>
                                        </fieldset> 
                                    </div><!-- end col -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                    <!-- <form class="tampil-data" action="<?php echo base_url('dashboard/simpan_status_klaim');?>" enctype="multipart/form-data" method="POST"> -->
                                    <!-- <input type="hidden" name="tgl1" value="<?=@$tgl1?>">
                                        <input type="hidden" name="tgl2" value="<?=@$tgl2?>">
                                        <input type="hidden" name="status" value="<?=$status?>"> -->
                                      
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Jenis Pelayanan</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=@$sep->jnspelayanan == 1 ? "Rawat Inap" : "Rawat Jalan"?>" disabled>
                                                    <input type="hidden" name="no_sep" value="<?=@$sep->no_sep?>">
                                                    <input type="hidden" name="jenis" value="<?=@$sep->jnspelayanan?>">
                                                    <input type="hidden" name="tgl_registrasi" value="<?=@$sep->tglsep?>">
                                                    <input type="hidden" name="norm" value="<?=@$sep->nomr?>">
                                        </fieldset> 
                                       
                                    <!-- </form> -->
                                </div><!-- end col -->
                                <!-- <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                <div class="mt-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Naik 1 Kelas</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Naik 2 Kelas</label>
                                                </div>
                                            </div>
                                    </div>
                               -->
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-2">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Tarif 1</label>
                                            <input type="number" class="form-control" id="tarif1" name="tarif1"
                                                    placeholder="Tarif 1" value="<?=@$record->tarif_1;?>" >
                                        </fieldset> 
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-2">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Tarif 2</label>
                                            <input type="text" class="form-control" id="tarif2" name="tarif2"
                                                    placeholder="Tarif 2" value="<?=@$record->tarif_2;?>" >
                                        </fieldset> 
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-2">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Presentase</label>
                                            <input type="text" class="form-control" id="presentase" name="presentase"
                                                    placeholder="Presentase" value="<?=@$record->presentase;?>" >
                                        </fieldset> 
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-2">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Tarif Akhir</label>
                                            <input type="text" class="form-control" id="tarif_akhir" name="tarif_akhir"
                                                    placeholder="Tarif Akhir" value="<?=@$record->tarif_akhir;?>" >
                                        </fieldset> 
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-2">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">Diagnosa</label>
                                            <input type="text" class="form-control" id="diagnosa" name="diagnosa"
                                                    placeholder="Diagnosa" value="<?=@$record->diagnosa;?>" >
                                        </fieldset> 
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                        <?
                                            if($record){?>
                                                <button type="button" onclick="edit()" class="btn btn-warning">Edit</button>
                                            <?} else { ?>
                                                <button type="button" onclick="simpan()" class="btn btn-primary">Submit</button>
                                            <?}
                                        ?>
                                    </div>
                                
                            </div>
                        </form>
                    </div><!-- end col -->
                </div>


    <script>
        $('#tarif1').bind("keyup change", function(e) {
        var tarif1 = parseInt($('#tarif1').val());
        // var tb = parseInt($('#tb').val()) / 100;
        var nilai = tarif1;
        parseInt($('#tarif_akhir').val(nilai));
    });
        $('#tarif2').bind("keyup change", function(e) {
        var tarif1 = parseInt($('#tarif1').val());
        var tarif2 = parseInt($('#tarif2').val());
        // var tb = parseInt($('#tb').val()) / 100;
        var nilai = tarif1 - tarif2;
        parseInt($('#tarif_akhir').val(nilai));
    });
        $('#presentase').bind("keyup change", function(e) {
        var tarif1 = parseInt($('#tarif1').val());
        var tarif2 = parseInt($('#tarif2').val());
        var presentase = parseFloat($('#presentase').val());
        // var tb = parseInt($('#tb').val()) / 100;
        var nilai = tarif1 - tarif2 + (tarif1*(presentase/100));
        parseInt($('#tarif_akhir').val(nilai));
    });

    function ambil(no_rawat) {
        const myArray = no_rawat.split("+");
        let tombol = myArray[3];
            $.ajax({
                url: "<?php echo site_url('dashboard/ambil_cppt_save')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    var dt = JSON.parse(data)
                    console.log(dt.status)
                    if (dt.status == false) {
                        swal.fire(
                            'Gagal',
                            'Proses Dibatalkan',
                            'error'
                        )
                    } else {
                        swal.fire(
                        'Sukses',
                        'Berhasil Diambil',
                        'success'
                        )
                        if($('#btn_ambil'+tombol).is(":hidden")){
                            $('#btn_ambil'+tombol).attr("hidden", false);
                            $("#btn_batal"+tombol).attr("hidden", true)
                        } else {
                            $('#btn_ambil'+tombol).attr("hidden", true);
                            $("#btn_batal"+tombol).attr("hidden", false);
                        }
                    }
                }
            });
    }

    function batal(no_rawat) {
        const myArray = no_rawat.split("+");
        let tombol = myArray[3];
            $.ajax({
                url: "<?php echo site_url('dashboard/hapus_cppt_klaim')."/"; ?>"+no_rawat,
                success:function (data)
                {
                    var dt = JSON.parse(data)
                    console.log(dt.status)
                    if (dt.status == false) {
                        swal.fire(
                            'Gagal',
                            'Proses Dibatalkan',
                            'error'
                        )
                    } else {
                        swal.fire(
                        'Sukses',
                        'Berhasil Dibatalkan',
                        'success'
                        )
                        if($('#btn_batal'+tombol).is(":hidden")){
                            $('#btn_batal'+tombol).attr("hidden", false);
                            $("#btn_ambil"+tombol).attr("hidden", true)
                        } else {
                            $('#btn_batal'+tombol).attr("hidden", true);
                            $("#btn_ambil"+tombol).attr("hidden", false);
                        }
                    }
                }
            });
    }

        // function simpan() {
        //     var status = "";
        //     $.ajax({
        //         type: "POST",
        //         data:$('.tampil-data').serialize(),
        //         url: "<?php echo site_url('dashboard/simpan_status_klaim'); ?>",
        //         success: function  (data) {
        //             Swal.fire({
        //             position: 'center',
        //             icon: 'success',
        //             title: 'SUKSES!',
        //             html: '<b>--BERHASIL--</b>',
        //             showConfirmButton: false,
        //             timer: 2000
        //     })
        //     $('.modal').modal('hide');
        //     dashboard(status);
        //         // if (status === "Perbaiki") {
        //         //     dashboard();
        //         //     // cari_perbaiki();
        //         // } else if (status === "Verifikasi Resume") {
        //         //     dashboard();
        //         // } else if (status === "Lengkap") {
        //         //     dashboard();
        //         // } else if (status === "Pengajuan") {
        //         //     dashboard();
        //         //     // pengajuan();
        //         // } else if (status === "Disetujui") {
        //         //     dashboard();
        //         // }

        //         }
        //     });  
        // }
        function simpan() {
         
            $.ajax({
                type: "POST",
                data:$('.tampil-data').serialize(),
                url: "<?php echo site_url('dashboard/simpan_naik_kelas'); ?>",
                success: function  (data) {
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'SUKSES!',
                    html: '<b>--BERHASIL--</b>',
                    showConfirmButton: false,
                    timer: 2000
            })
            $('.modal').modal('hide');

                // tampil_data(tgl1,tgl2,status);
                }
            });  
        }
        function edit() {
         
            $.ajax({
                type: "POST",
                data:$('.tampil-data').serialize(),
                url: "<?php echo site_url('dashboard/edit_naik_kelas'); ?>",
                success: function  (data) {
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'SUKSES!',
                    html: '<b>--BERHASIL--</b>',
                    showConfirmButton: false,
                    timer: 2000
            })
            $('.modal').modal('hide');
            location.reload();
                // tampil_data(tgl1,tgl2,status);
                }
            });  
        }
    </script>