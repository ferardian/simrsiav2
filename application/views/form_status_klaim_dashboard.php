<div class="row">
                    <div class="col-12">
                        <div class="card-box">                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <form class="tampil-data" action="<?php echo base_url('dashboard/simpan_status_klaim');?>" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="tgl1" value="<?=@$tgl1?>">
                                        <input type="hidden" name="tgl2" value="<?=@$tgl2?>">
                                        <input type="hidden" name="status" value="<?=$status?>">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">No. Rawat</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=$no_rawat?>" disabled>
                                                    <input type="hidden" name="no_rawat" value="<?=$no_rawat?>">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="no_rawat">No. SEP</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=$sep->no_sep?>" disabled>
                                                    <input type="hidden" name="no_sep" value="<?=$sep->no_sep?>">
                                                    <input type="hidden" name="jenis" value="<?=$sep->jnspelayanan?>">
                                                    <input type="hidden" name="tgl_registrasi" value="<?=$sep->tglsep?>">
                                                    <input type="hidden" name="norm" value="<?=$sep->nomr?>">
                                        </fieldset>
                                        <fieldset class="form-group">
                                        <label for="no_rawat">Status Klaim</label>
                                        <select class="form-control select2" name="status" required>
                                            <option value="" disabled selected>--Pilih Status--</option>
                                                <option value="Verifikasi Resume">Verifikasi Resume</option>  
                                                <option value="Lengkap">Lengkap</option>  
                                                <option value="Pengajuan">Pengajuan</option>  
                                                <option value="Perbaiki">Perbaiki</option>  
                                                <option value="Disetujui">Disetujui</option>  
                                                <option value="Klaim Ambulans">Klaim Ambulans</option>  
                                                <option value="Batal Klaim">Batal Klaim</option>  
                                                <option value="Pending">Pending</option>  
                                        </select>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleTextarea">Catatan</label>
                                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                        </fieldset>

                                      
                                        <button type="button" onclick="simpan()" class="btn btn-primary">Submit</button>
                                    </form>
                                </div><!-- end col -->

                            
                            </div><!-- end row -->
                           
                        </div>
                        <div class="card-box">                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <b>Feedback</b>
                                    <?
                                        if($data_status){?>
                                             <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <?
                                                        foreach ($data_status as $dt) {
                                                            $photo = $this->dashboard_mod->getPhoto($dt->username)->row();
                                                            ?>
                                                            <tr>
                                                            <th scope="row"> 
                                                                    <?
                                                                        if ($dt->username <> "-") {?>
                                                                            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"] ?>/../../../rsiap/file/pegawai/<?=@$photo->photo?>" alt="user" style="width:30px;border-radius: 10%;">
                                                                        <?}
                                                                    ?>
                                                                </th>
                                                                <td>
                                                                    <?=@$photo->nama?> <br>
                                                                    <?=$dt->catatan?>
                                                                </td>
                                                                <td><?=date('d-m-Y',strtotime($dt->tanggal))?></td>
                                                            </tr>
                                                        <?}
                                                    ?>
                                                
                                                </tbody>
                                            </table>
                                        <?}
                                    ?>
                               
                                </div><!-- end col -->

                            
                            </div><!-- end row -->
                           
                        </div>
                    </div><!-- end col -->
                </div>


    <script>
        function simpan() {
            var status = "<?php echo $status?>";
            $.ajax({
                type: "POST",
                data:$('.tampil-data').serialize(),
                url: "<?php echo site_url('dashboard/simpan_status_klaim'); ?>",
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
            dashboard(status);
                // if (status === "Perbaiki") {
                //     dashboard();
                //     // cari_perbaiki();
                // } else if (status === "Verifikasi Resume") {
                //     dashboard();
                // } else if (status === "Lengkap") {
                //     dashboard();
                // } else if (status === "Pengajuan") {
                //     dashboard();
                //     // pengajuan();
                // } else if (status === "Disetujui") {
                //     dashboard();
                // }

                }
            });  
        }
    </script>