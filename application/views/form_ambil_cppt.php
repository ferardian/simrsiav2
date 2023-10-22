<div class="row">
                    <div class="col-12">
                        <form class="tampil-data" action="<?php echo base_url('dashboard/simpan_status_klaim');?>" enctype="multipart/form-data" method="POST">
                    <div class="card-box">                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                    <!-- <input type="hidden" name="tgl1" value="<?=@$tgl1?>">
                                        <input type="hidden" name="tgl2" value="<?=@$tgl2?>">
                                        <input type="hidden" name="status" value="<?=$status?>"> -->
                                        <fieldset class="form-group">
                                            <label for="no_rawat">No. Rawat</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=$no_rawat?>" disabled>
                                                    <input type="hidden" name="no_rawat" value="<?=$no_rawat?>">
                                        </fieldset>
                                  
                                    <!-- </form> -->
                                </div><!-- end col -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                                    <!-- <form class="tampil-data" action="<?php echo base_url('dashboard/simpan_status_klaim');?>" enctype="multipart/form-data" method="POST"> -->
                                    <!-- <input type="hidden" name="tgl1" value="<?=@$tgl1?>">
                                        <input type="hidden" name="tgl2" value="<?=@$tgl2?>">
                                        <input type="hidden" name="status" value="<?=$status?>"> -->
                                      
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
                              
                                    
                                    
                                </div><!-- end row -->
                                
                            </div>
                        </form>
                        <div class="card-box">                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <?
                                    
                                    if (count($get_asmed_ugd)>0) {?>
                                         <h3>Asmed UGD</h3>
                                <table class="table table-sm table-responsive">
                                    <tbody>
                                    <tr>
                                                    <th>Tanggal</th>
                                                    <th>Dokter</th>
                                                    <th>Anamnesis</th>
                                                    <th>Keluhan Utama</th>
                                                    <th>RPS</th>
                                                    <th>Keadaan</th>
                                                    <th>GCS</th>
                                                    <th>Kesadaran</th>
                                                    <th>Nadi</th>
                                                    <th>RR</th>
                                                    <th>Suhu</th>
                                                    <th>SPO</th>
                                                    <th>BB</th>
                                                    <th>TB</th>
                                                    <th>Ket. Fisik</th>
                                                    <th>Diagnosis</th>
                                                    <th>Tatalaksana</th>
                                                </tr>
                                        <?
                                            foreach ($get_asmed_ugd as $data) {?>
                                                <tr>
                                                    <td><?=$data->tanggal?></td>
                                                    <td><?=$data->nm_dokter?></td>
                                                    <td><?=$data->anamnesis?></td>
                                                    <td><?=$data->keluhan_utama?></td>
                                                    <td><?=$data->rps?></td>
                                                    <td><?=$data->keadaan?></td>
                                                    <td><?=$data->gcs?></td>
                                                    <td><?=$data->kesadaran?></td>
                                                    <td><?=$data->nadi?></td>
                                                    <td><?=$data->rr?></td>
                                                    <td><?=$data->suhu?></td>
                                                    <td><?=$data->spo?></td>
                                                    <td><?=$data->bb?></td>
                                                    <td><?=$data->tb?></td>
                                                    <td><?=$data->ket_fisik?></td>
                                                    <td><?=$data->diagnosis?></td>
                                                    <td><?=$data->tata?></td>
                                                </tr>
                                            <?}
                                        ?>
                                        
                                    </tbody>
                                </table>
                                    <?}
                                ?>

<h3>CPPT</h3>
                                             <table id="datatable-cppt" class="table table-sm table-responsive">
                                                <tbody>
                                              
                                                    <?
                                                    $no=1;
                                                        foreach ($cppt as $data) {
                                                            // $photo = $this->dashboard_mod->getPhoto($dt->username)->row();
                                                            ?>
                                                              <tr>
                                                                <th>Aksi</th>
                                                                <!-- <th>No.</th> -->
                                                                <th>Tanggal</th>
                                                                <th>Suhu(C)</th>
                                                                <th>Tensi(mmHg)</th>
                                                                <th>Nadi(/menit) </th>
                                                                <th>RR(/menit)</th>
                                                                <th>Tinggi(cm)</th>
                                                                <th>Berat(Kg)</th>
                                                                <th>GCS(E,V,M)</th>
                                                                <th>SPO2</th>
                                                                <th>Alergi</th>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="7">
                                                                    <table>
                                                                        <tr>
                                                                            <td>No. Rawat</td>
                                                                            <td>:</td>
                                                                            <td><?=$data->no_rawat?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tgl Registrasi</td>
                                                                            <td>:</td>
                                                                            <td><?=$data->tgl_registrasi?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No. SEP</td>
                                                                            <td>:</td>
                                                                            <td><?=$data->no_sep?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Poli</td>
                                                                            <td>:</td>
                                                                        <?
                                                                        if ($data->jnspelayanan == "2") {?>
                                                                            <td><?=$data->nm_poli?></td>
                                                                            
                                                                            <?} else {
                                                                                echo "<td>Rawat Inap</td>";
                                                                            }
                                                                    ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Petugas</td>
                                                                        <td>:</td>
                                                                        <td><?=$data->nama?></td>
                                                                    </tr>
                                                                    </table>
                                                                    <!-- No. Rawat : <?=$data->no_rawat?> <br>
                                                                    Tgl Registrasi : <?=$data->tgl_registrasi?> <br>
                                                                    No. SEP : <?=$data->no_sep?> <br> -->
                                                                    <?

                                                                    if ($data->jnspelayanan == "2") {
                                                                        $cari_CPPT = $this->dashboard_mod->cari_cppt_ralan($data->no_rawat,$data->tgl_perawatan,$data->jam_rawat)->row();  
                                                                    } else {
                                                                        $cari_CPPT = $this->dashboard_mod->cari_cppt($data->no_rawat,$data->tgl_perawatan,$data->jam_rawat)->row();
                                                                    }
                                                                    
                                                                    if ($cari_CPPT) {?>
                                                                        <a onclick='batal("<? echo str_replace("/","-",$data->no_rawat)."+".$data->tgl_perawatan."+".$data->jam_rawat."+".$no;?>")' ><button id="btn_batal<?=$no;?>"  class="btn btn-block btn-sm btn-danger waves-effect waves-light">BATAL</button></a>
                                                                        <a onclick='ambil("<? echo str_replace("/","-",$data->no_rawat)."+".$data->tgl_perawatan."+".$data->jam_rawat."+".$no;?>")' ><button id="btn_ambil<?=$no;?>" class="btn btn-block btn-sm btn-primary waves-effect waves-light" hidden>AMBIL CPPT</button></a>
                                                                    <?} else {?>
                                                                        <a onclick='ambil("<? echo str_replace("/","-",$data->no_rawat)."+".$data->tgl_perawatan."+".$data->jam_rawat."+".$no;?>")' ><button id="btn_ambil<?=$no;?>" class="btn btn-block btn-sm btn-primary waves-effect waves-light">AMBIL CPPT</button></a>
                                                                        <a  onclick='batal("<? echo str_replace("/","-",$data->no_rawat)."+".$data->tgl_perawatan."+".$data->jam_rawat."+".$no;?>")' ><button id="btn_batal<?=$no;?>" class="btn btn-block btn-sm btn-danger waves-effect waves-light" hidden>BATAL</button></a>
                                                                    <?}
                                                                    ?>

                                                                    <!-- <a onclick='ambil("<? echo str_replace("/","-",$data->no_rawat)."+".$data->tgl_perawatan."+".$data->jam_rawat;?>")' ><button class="btn btn-block btn-sm btn-primary waves-effect waves-light">AMBIL CPPT</button></a>  -->
                                                                    
                                                                </td>
                                                                <!-- <td rowspan="7"><?=$no;?></td> -->
                                                                <td rowspan="7"><?=$data->tgl_perawatan." ".$data->jam_rawat;?></td>
                                                                <td><?=$data->suhu_tubuh;?></td>
                                                                <td><?=$data->tensi;?></td>
                                                                <td><?=$data->nadi;?></td>
                                                                <td><?=$data->respirasi;?></td>
                                                                <td><?=$data->tinggi;?></td>
                                                                <td><?=$data->berat;?></td>
                                                                <td><?=$data->gcs;?></td>
                                                                <td><?=$data->spo2;?></td>
                                                                <td><?=$data->alergi;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" ><b>Kesadaran</b></td>
                                                                <td colspan="7"><?=$data->kesadaran;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>Subyektif</b></td>
                                                                <td colspan="7"><?=$data->keluhan;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>Obyektif</b></td>
                                                                <td colspan="7"><?=$data->pemeriksaan;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>Assesment</b></td>
                                                                <td colspan="7"><?=$data->penilaian;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>Plan</b></td>
                                                                <td colspan="7"><?=$data->rtl;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><b>Instruksi & Evaluasi</b></td>
                                                                <td colspan="7">Instruksi : <?=$data->instruksi;?><br>Evaluasi : <?=$data->evaluasi;?></td>
                                                            </tr>
                                                        <?
                                                    $no++;    
                                                    }
                                                    ?>
                                                
                                                </tbody>
                                            </table>
                                    
                               
                                </div><!-- end col -->

                            
                            </div><!-- end row -->
                           
                        </div>
                    </div><!-- end col -->
                </div>


    <script>


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
    </script>