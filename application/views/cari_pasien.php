<div class="body">
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
                                                <form action="<?php echo base_url('dashboard/cetak_resep');?>" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" name="no_rawat" value="<?=$data->no_rawat;?>">
                                                        <input type="hidden" name="aksi" value="lihat">
                                                        <button type="submit" name="submit" class="btn btn-sm btn-success" formtarget="_blank">Lihat Berkas Klaim</button>
                                                    </form>
                                                    <!-- <button class="btn btn-sm btn-primary" style="margin-bottom: 5px;">Lihat Berkas Klaim</button>  -->
                                                    
                                                    <br>
                                                    <a onclick='detail_status("<? echo str_replace("/","-",$data->no_rawat);?>+<?echo $tgl1;?>+<?echo $tgl2;?>+<?echo $status;?>")' ><button class="btn btn-sm btn-secondary waves-effect waves-light" data-toggle="modal" data-target=".modal_status">Status</button></a> 
                                                    <?
                                                        if($get_status){
                                                            if($get_status->status == "Lengkap"){?>
                                                                 <button type="button" class="btn btn-sm btn-primary waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Pengajuan"){?>
                                                                <button type="button" class="btn btn-sm btn-success waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-send-o"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Perbaiki"){?>
                                                                <button type="button" class="btn btn-sm btn-danger waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-warning"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Verifikasi Resume") {?>
                                                                <button type="button" class="btn btn-sm btn-warning waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-edit"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Disetujui") {?>
                                                                <button type="button" class="btn btn-sm btn-info waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Batal Klaim") {?>
                                                                <button type="button" class="btn btn-sm btn-info waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Pending") {?>
                                                                <button type="button" class="btn btn-sm btn-warning waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Revisi") {?>
                                                                <button type="button" class="btn btn-sm btn-info waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} else if($get_status->status == "Acc") {?>
                                                                <button type="button" class="btn btn-sm btn-info waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span><?=@$get_status->status?></button>
                                                            <?} 
                                                            ?>
                                                            
                                                        <?} else {
                                                            if ($data->no_sep!="") {?>
                                                                <button type="button" class="btn btn-sm btn-warning waves-effect waves-light">
                                                                <span class="btn-label"><i class="fa fa-check"></i>
                                                                </span>Belum</button>
                                                            <?}
                                                        }
                                                    ?>
                                                    <br>
                                                    <!-- <a onclick='detail("<? echo str_replace("/","-",$data->no_rawat)?>")' ><button class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm">Upload Berkas</button></a> <br> -->
                                                    <a onclick='ambil_klaim_inacbg("<? echo str_replace("/","-",$data->no_rawat)?>")' target="_blank"><button class="btn btn-sm btn-purple waves-effect waves-light">Ambil Lembar Klaim (Inacbg)</button></a>
                                                    
                                                    <?
                                                        if(@$get_status->status == "Pengajuan"){?>
                                                        <br>
                                                    <br>
                                                    <br>
                                                             <a onclick='kirim_berkas("<? echo $data->no_rawat;?>")' target="_blank"><button class="btn btn-sm btn-primary waves-effect waves-light"> <span class="btn-label"><i class="fa fa-send-o"></i>
                                                                </span>Kirim Berkas Klaim</button></a>
                                                        <?}
                                                    ?>
                                                     <br>
                                                    <br>
                                                    <br>
                                                    <a onclick='ambil_cppt("<? echo str_replace("/","-",$data->no_rawat)?>")' ><button class="btn btn-sm btn-dark waves-effect waves-light" data-toggle="modal" data-target=".modal_cppt">Ambil CPPT</button></a> 
                                                    <br>
                                                    <br>
                                                    <a onclick='naik_kelas("<? echo str_replace("/","-",$data->no_rawat)?>")' ><button class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".modal_naik_kelas">Hitung Naik Kelas</button></a> 
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
                                                                    <?= $data->status_lanjut=="Ralan" ? "Poli" : "Kamar";?>
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                <?= $data->status_lanjut=="Ralan" ? $data->nm_poli : $data->nm_bangsal;?>
                                                                </td>
                                                            </tr>
                                                            <?
                                                                if ($data->status_lanjut=="Ranap") {?>
                                                                      <tr>
                                                                <td>
                                                                    Asal
                                                                </td>
                                                                <td>
                                                                    :
                                                                </td>
                                                                <td>
                                                                <?=  $data->nm_poli;?>
                                                                </td>
                                                            </tr>
                                                                <?}
                                                            ?>
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
                                                            <td><?=($data->jnspelayanan == "1" ? "Rawat Inap" : "Rawat Jalan")?></td>
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
        
<script>
    
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