<style>
    div #hasil{
        font-size: 20pt;
        text-align: center;
        font-weight: bold;
    }

    table th {
    border-left: 1px solid rgba(0,0,0,0.2);
    border-right: 1px solid rgba(0,0,0,0.2);
}
</style>

<!-- <div id="hasil"></div> -->
<table style="width:100%;">
<tr>
                <td style="font-size:11pt;font-weight:bold;" align="center">BILLING</td>
                <!-- <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td> -->
                    <!-- <td style="display: none;"></td> -->
            </tr>
</table>
<!-- <div class="table-responsive"> -->
    <br>

<table style=" color: black !important; border-color:white; font-size:10pt; width:100%;" >
    
    <thead >
        <tr>
            <th colspan="2" style="border-left: none !important;">Keterangan</th>
            <th colspan="2">Tindakan/Terapi</th>
            <th >Biaya</th>
            <th >Jumlah</th>
            <th >Tambahan</th>
            <th style="border-right: none !important;">Total Biaya</th>
        </tr>
    </thead>
<?
      date_default_timezone_set('Asia/Jakarta');

$moneyFormat  = new moneyFormat();

    foreach ($pasien as $d) {
        $kamar_inap_belum = $this->pasien_mod->getRanapKamarBelum($d->no_rawat);
        $kamar_inap_sudah = $this->pasien_mod->getRanapKamarSudah($d->no_rawat);
        $kamar_lama = $this->pasien_mod->kamar($d->no_rawat)->result();
        $sep = $this->pasien_mod->getRanapSep($d->no_rawat);
        $no_nota = $this->dashboard_mod->notaInap($d->no_rawat)->row();


        $now = now();
        // $tgl_masuk = strtotime($kamar_inap_belum->tgl_registrasi.' '.$kamar_inap_belum->jam_reg);
        // $tgl_masuk2 = strtotime($kamar_inap_sudah->tgl_registrasi.' '.$kamar_inap_sudah->jam_reg);
        // $lama_inap = round(abs($now - $tgl_masuk)/(60 * 60 * 24)+1);
        // $lama_inap2 = round(abs($tgl_masuk2 - $tgl_masuk2)/(60 * 60 * 24)+1);
        ?>
        <tr>
            <td><b>No. Nota</b></td>
            <td>:</td>
            <td colspan="6">
                <?
                    echo @$no_nota->no_nota;
                    // if (isset($kamar_inap_belum)) {
                    //     echo $kamar_inap_belum->no_rawat;
                    // } else if(isset($kamar_inap_sudah)){
                    //     echo $kamar_inap_sudah->no_rawat;
                    // }

                    // $kamar_inap->no_rawat
                ?>
            </td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
        <tr>
            <td><b>Bangsal/Kamar</b></td>
            <td>:</td>
            <td colspan="6"><?
                if (isset($kamar_inap_belum)) {
                    echo $kamar_inap_belum->kamar;
                } else if(isset($kamar_inap_sudah)){
                    echo $kamar_inap_sudah->kamar;
                }
            
            ?></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
        <tr>
            <td><b>Tanggal Perawatan</b></td>
            <td>:</td>
            <td colspan="6"><?
                $tot_lama = 0;

                foreach($kamar_lama as $kl){
                    $tot_lama += $kl->lama;
                }

                if (isset($kamar_inap_belum)) {
                    $tgl_masuk = strtotime($kamar_inap_belum->tgl_registrasi);
                    $lama_inap = round(abs($now - $tgl_masuk)/(60 * 60 * 24)+1);
                    echo date('d-m-Y H:i:s', strtotime($kamar_inap_belum->tgl_registrasi))." ".$kamar_inap_belum->jam_reg." <b><i>s.d.</i></b> ".date('d-m-Y H:i:s')." ( ".$tot_lama." Hari )";
                } else if(isset($kamar_inap_sudah)){
                    $tgl_masuk2 = strtotime($kamar_inap_sudah->tgl_registrasi);
                    $lama_inap2 = round(abs(strtotime($kamar_inap_sudah->tgl_keluar) - $tgl_masuk2)/(60 * 60 * 24)+1);
                    // if ($lama_inap2 <= 1) {
                    //     $lama_inap2 = $lama_inap2;
                    // } else {
                    //     $lama_inap2 = $lama_inap2-1;
                    // }
                    echo date('d-m-Y', strtotime($kamar_inap_sudah->tgl_registrasi))." ".$kamar_inap_sudah->jam_reg." <b><i>s.d.</i></b> ".date('d-m-Y', strtotime($kamar_inap_sudah->tgl_keluar))." ".$kamar_inap_sudah->jam_keluar." ( ".$tot_lama." Hari ) <span id='hasil'></span> ";
                }
            ?></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
        <tr>
            <td><b>Jenis Bayar</b></td>
            <td>:</td>
            <td colspan="6"><?
                if (isset($sep->klsrawat)) {
                    if (isset($kamar_inap_belum)) {
                        echo $kamar_inap_belum->png_jawab." - KELAS ".$sep->klsrawat;
                    } else if (isset($kamar_inap_sudah)){
                        echo $kamar_inap_sudah->png_jawab." - KELAS ".$sep->klsrawat;
                    }
                    
                } else {
                    if (isset($kamar_inap_belum)) {
                        echo $kamar_inap_belum->png_jawab;
                    } else if (isset($kamar_inap_sudah)){
                        echo $kamar_inap_sudah->png_jawab;
                    }
                }
            ?></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
       
        <?
            $cek_gabung = $this->pasien_mod->cekPasienGabung($d->no_rawat)->row();
            if (isset($cek_gabung->no_rawat2)) {?>
                <tr>
                    <td><b>No. RM Ibu</b></td>
                    <td>:</td>
                    <td colspan="6"><?=$d->no_rkm_medis?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
                <tr>
                    <td><b>Nama Ibu</b></td>
                    <td>:</td>
                    <td colspan="6"><?=$d->nm_pasien?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
                <tr>
                    <td><b>No. RM Bayi</b></td>
                    <td>:</td>
                    <td colspan="6"><?=$cek_gabung->no_rkm_medis?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
                <tr>
                    <td><b>Nama Bayi</b></td>
                    <td>:</td>
                    <td colspan="6"><?=$cek_gabung->nm_pasien?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>
            <?} else {?>
                <tr>
                    <td><b>No. RM</b></td>
                    <td>:</td>
                    <td colspan="6"><?=$d->no_rkm_medis?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
                <tr>
                    <td><b>Nama Pasien</b></td>
                    <td>:</td>
                    <td colspan="6"><?=$d->nm_pasien?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
            <?}
        ?>
         <tr>
            <td><b>Alamat Pasien</b></td>
            <td>:</td>
            <td colspan="6"><?=$d->alamat?></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
         <tr>
            <td><b>Dokter</b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
        <?
            $dokter = $this->pasien_mod->getDokterBiaya($d->no_rawat)->result();
            @$registrasi = $this->pasien_mod->registrasi($d->no_rawat)->row();
            $kamar = $this->pasien_mod->kamar($d->no_rawat)->result();
            $total_register = 0;
            foreach ($dokter as $dk ) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="6"><?=$dk->nm_dokter?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
           <? }
        ?>
                <tr>
                    <td><b>Registrasi</b></td>
                    <td>:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah(@$registrasi->biaya_reg); @$total_register = $registrasi->biaya_reg?></td>
                </tr>  
                <tr>
                    <td><b>Ruang</b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
                
        <?
        $total_kamar = 0;
        $total_lama = 0;
            foreach ($kamar as $km ) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$km->kd_kamar.", ".$km->nm_bangsal?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($km->trf_kamar)?></td>
                    <td align="right"><?=$km->lama; $total_lama+=$km->lama?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($km->total); $total_kamar+=$km->total;?></td>
                </tr>  
                
            <?}?>
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total Kamar Inap : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_kamar)?></b></td>
            </tr>
        <?
            if (isset($cek_gabung->no_rawat2)) {?>
            <tr>
                <td><b>Biaya Perawatan Ibu</b></td>
                <td>:</td>
                <td colspan="6"></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            </tr>
            <?} 
        ?>
            <tr>
            <td><b>Rincian  Biaya</b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            </tr>

        <? $kategori = $this->pasien_mod->kategoriTindakan()->result();
            $no=1;
            $grand_total_tindakan1=0;
            $grand_total_tindakan2=0;
            $grand_total_tindakan3=0;
            $gtot1=0;
            
            foreach ($kategori as $kt ) {
                $psRalanDokter  = $this->pasien_mod->getRalanDokter($d->no_rawat,$kt->kd_kategori)->result();
                $psRalanDrPr    = $this->pasien_mod->getRalanDrPr($d->no_rawat,$kt->kd_kategori)->result();
                $psRalanPerawat = $this->pasien_mod->getRalanPerawat($d->no_rawat,$kt->kd_kategori)->result();

            if (count($psRalanDokter)>0||count($psRalanDrPr)>0||count($psRalanPerawat)>0) {?>
                <tr> 
                    
                    <td><b><?=$no.". ".$kt->nm_kategori?></b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
                    <?$no++?>
                </tr> 

            <?

            $total_tindakan=0;
            foreach ($psRalanDokter as $rld ) {?>
            <tr> 
                <td></td>
                <td></td>
                <td><?=$rld->nm_perawatan?></td>
                <td>:</td>
                <td align="right"><?=$moneyFormat->rupiah($rld->total_byrdr)?></td>
                <td align="right"><?=$rld->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($rld->biaya);$total_tindakan+=$rld->biaya;?></td>
            </tr> 


            <?}?>    

            <? foreach ($psRalanDrPr as $rldrpr ) {?>
            <tr> 
                <td></td>
                <td></td>
                <td><?=$rldrpr->nm_perawatan?></td>
                <td>:</td>
                <td align="right"><?=$moneyFormat->rupiah($rldrpr->total_byrdr)?></td>
                <td align="right"><?=$rldrpr->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($rldrpr->biaya);$total_tindakan+=$rldrpr->biaya;?></td>
            </tr> 
            <?}   ?>

            <? foreach ($psRalanPerawat as $rlp ) {?>
            <tr> 
                <td></td>
                <td></td>
                <td><?=$rlp->nm_perawatan?></td>
                <td>:</td>
                <td align="right"><?=$moneyFormat->rupiah($rlp->total_byrpr)?></td>
                <td align="right"><?=$rlp->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($rlp->biaya);$total_tindakan+=$rlp->biaya;?></td>
            </tr> 
            <?}   ?>

            <tr>
            <td></td>
            <td></td>
            <td colspan="6"><b>Total <?=$kt->nm_kategori?> : <?=$moneyFormat->rupiah($total_tindakan); $gtot1+=$total_tindakan; ?></b></td>
            <td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
                <td style="display: none;"></td>
            </tr>
            <?}
            


     
                $psRanapDokter  = $this->pasien_mod->getRanapDokter($d->no_rawat,$kt->kd_kategori)->result();
                $psRanapDrPr    = $this->pasien_mod->getRanapDrPr($d->no_rawat,$kt->kd_kategori)->result();
                $psRanapPerawat = $this->pasien_mod->getRanapPerawat($d->no_rawat,$kt->kd_kategori)->result();
                if (count($psRanapDokter)>0||count($psRanapDrPr)>0||count($psRanapPerawat)>0) {?>
                    <tr> 
                        
                        <td><b><?=$no.". ".$kt->nm_kategori?></b></td>
                        <td>:</td>
                        <td colspan="6"></td>
                        <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                        <?$no++?>
                    </tr> 

                <?
            
            $total_tindakan=0;
            foreach ($psRanapDokter as $rnd ) {?>
                <tr> 
                    <td></td>
                    <td></td>
                    <td><?=$rnd->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnd->total_byrdr)?></td>
                    <td align="right"><?=$rnd->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnd->biaya);$total_tindakan+=$rnd->biaya;?></td>
                </tr> 

               
            <?}?>    
            
            <? foreach ($psRanapDrPr as $rndrpr ) {?>
                <tr> 
                    <td></td>
                    <td></td>
                    <td><?=$rndrpr->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rndrpr->total_byrdrpr)?></td>
                    <td align="right"><?=$rndrpr->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rndrpr->biaya);$total_tindakan+=$rndrpr->biaya;?></td>
                </tr> 
            <?}   ?>

            <? foreach ($psRanapPerawat as $rnp ) {?>
                <tr> 
                    <td></td>
                    <td></td>
                    <td><?=$rnp->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnp->total_byrpr)?></td>
                    <td align="right"><?=$rnp->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnp->biaya);$total_tindakan+=$rnp->biaya;?></td>
                </tr> 
            <?}   ?>
            
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total <?=$kt->nm_kategori?> : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td align="right"><b><?=$moneyFormat->rupiah($total_tindakan); $gtot1+=$total_tindakan; ?></b></td>
            </tr>
            <?}
            }

            
   
            
            ?>
                
            
            <? $psRanapLab = $this->pasien_mod->getRanapLab($d->no_rawat)->result();
            
            $total_lab1=0;

            if (count($psRanapLab)>0) {?>
                <tr>         
                    <td><b><?=$no.". Pemeriksaan Lab"?></b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <?$no++?>
                </tr> 
            
            <!-- $psRanapLabDetail = $this->pasien_mod->getRanapLab($d->no_rawat)->result(); -->
            <? foreach ($psRanapLab as $rnl ) {
                $psRanapLabDetail = $this->pasien_mod->getRanapLabDetail($d->no_rawat,$rnl->kd_jenis_prw)->row();?>
                <tr>         
                    <td></td>
                    <td></td>
                    <td><?=$rnl->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnl->biaya)?></td>
                    <td align="right"><?=$rnl->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnl->total+$psRanapLabDetail->total); $total_lab1+=$rnl->total+$psRanapLabDetail->total?></td>
                </tr> 
            <?}?>
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total Periksa Lab : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_lab1)?></b></td>
            </tr>
            <?}?>


            <? $psRanapRad = $this->pasien_mod->getRanapRad($d->no_rawat)->result();
            
            $total_rad=0;

            if (count($psRanapRad)>0) {?>
                <tr>         
                    <td><b><?=$no.". Pemeriksaan Radiologi"?></b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <?$no++?>
                </tr> 
            
            <!-- $psRanapLabDetail = $this->pasien_mod->getRanapLab($d->no_rawat)->result(); -->
            <? foreach ($psRanapRad as $rnr ) {
                // $psRanapRadDetail = $this->pasien_mod->getRanapLabDetail($d->no_rawat,$rnr->kd_jenis_prw)->row();?>
                <tr>         
                    <td></td>
                    <td></td>
                    <td><?=$rnr->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->biaya)?></td>
                    <td align="right"><?=$rnr->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->total); $total_rad+=$rnr->total?></td>
                </tr> 
            <?}?>
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total Periksa Radiologi : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_rad)?></b></td>
            </tr>
            <?}?>
        
        
        <?
        $total_operasi1 = 0;
        $psRanapOperasi = $this->pasien_mod->getRanapOperasi($d->no_rawat)->result();

        if (count($psRanapOperasi)>0) {?>
            <tr>         
                <td><b><?=$no.". Operasi"?></b></td>
                <td>:</td>
                <td colspan="6"></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                <?$no++?>
            </tr> 
            
            <?
                foreach ($psRanapOperasi as $rno ) {?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="6"><?=$rno->nm_perawatan?></td>
                        <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    </tr>  
                    <?
                        if ($rno->biayaoperator1>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator1)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator1)?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaoperator2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator2)?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaoperator3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator3)?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaoperator3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaoperator3)?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaasisten_operator1>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Operator 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_operator1)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_operator1)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_operator2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Operator 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_operator2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_operator2)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_operator3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Operator 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_operator3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_operator3)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayainstrumen>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Instrumen</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayainstrumen)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayainstrumen)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayadokter_anak>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter Anak</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayadokter_anak)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayadokter_anak)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaperawaat_resusitas>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Perawat Resusitasi</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaperawaat_resusitas)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaperawaat_resusitas)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayadokter_anestesi>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter Anestesi</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayadokter_anestesi)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayadokter_anestesi)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_anestesi>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Anestesi 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_anestesi)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_anestesi)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_anestesi2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Anestesi 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_anestesi2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaasisten_anestesi2)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayabidan>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Bidan 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayabidan2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Bidan 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan2)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayabidan3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Bidan 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan3)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaperawat_luar>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Perawat Luar</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaperawat_luar)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaperawat_luar)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaalat>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Alat</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaalat)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaalat)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayasewaok>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Sewa OK/VK</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasewaok)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasewaok)?></td>
                            </tr>  
                        <?}
                        if ($rno->akomodasi>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Akomodasi</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->akomodasi)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->akomodasi)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop2)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop3)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop4>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 4</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop4)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop4)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop5>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 5</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop5)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop5)?></td>
                            </tr>  
                        <?}
                        if ($rno->bagian_rs>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; N.M.S.</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->bagian_rs)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->bagian_rs)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayasarpras>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Sarpras</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasarpras)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasarpras)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_dokter_pjanak>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter PJ Anak</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_pjanak)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_pjanak)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_dokter_umum>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter Umum</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_umum)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_umum)?></td>
                            </tr>  
                        <?}
                            $total_operasi1+=$rno->biaya;
                        ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td ><b>Total Operasi : </b></td>
                                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_operasi1)?></b></td>
                            </tr>      
                    <?}?>
                <?}?>

        

        <?
            $total_obat1 =0;
            $psRanapObat = $this->pasien_mod->getRanapObat($d->no_rawat)->result();
            if (count($psRanapObat)>0) {?>
                <tr>         
                    <td><b><?=$no.". Obat & BHP"?></b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <?$no++?>
                </tr> 
            <?
            foreach ($psRanapObat as $rnob) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$rnob->nama_brng." (".$rnob->nama.")"?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnob->biaya_obat)?></td>
                    <td align="right"><?=$rnob->jml?></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnob->tambahan)?></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnob->total); $total_obat1+=$rnob->total?></td>
                </tr>
            <?}?>
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total Obat & BHP : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_obat1)?></b></td>
            </tr>
            <?}?>
        
        <?
        $total_retur1 = 0;
        $psRanapRetur = $this->pasien_mod->getRanapRetur($d->no_rawat)->result();
            if (count($psRanapRetur)>0) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="6"><b>Retur Obat : </b></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>        
            <?
            foreach ($psRanapRetur as $rnr ) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$rnr->nama_brng?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->h_retur)?></td>
                    <td align="right"><?=$rnr->jml?></td>
                    <td align="right">0</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->ttl); $total_retur1+=$rnr->ttl?></td>
                </tr>     
            <?}?>    
            <tr>
                <td></td>
                <td></td>
                <td><b>Total Retur Obat : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_retur1)?></b></td>
            </tr>

            

        <?}
        
            if (count($psRanapObat)>0) {?>
                 <tr>
                <td></td>
                <td></td>
                <td ><b>Total Obat Bersih : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_obat1+$total_retur1)?></b></td>
            </tr>
            <?}
        ?>
                
               
           
        
        <tr>
            <td><b>Resep Pulang</b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>

        <?
            $total_resep_pulang1=0;
            $psRanapResepPulang = $this->pasien_mod->getRanapResepPulang($d->no_rawat)->result();

            if (count($psRanapResepPulang)>0) {
                foreach ($psRanapResepPulang as $rnrp ) {?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$rnrp->nama_brng." ".$rnrp->dosis?></td>
                        <td>:</td>
                        <td><?=$moneyFormat->rupiah($rnrp->harga)?></td>
                        <td><?=$rnrp->jml_barang?></td>
                        <td><?=$moneyFormat->rupiah($rnrp->total); $total_resep_pulang1+=$rnrp->total;?></td>
                    </tr>
                <?}?>
                <tr>
                    <td></td>
                    <td></td>
                    <td ><b>Total Resep Pulang : </b></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><?=$moneyFormat->rupiah($total_resep_pulang1)?></td>
                </tr>
            <?}
        ?>
       <tr>
            <td><b>Tambahan Biaya</b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>

        <?
            $total_tambahan1 = 0;
            $psRanapTambahan = $this->pasien_mod->getRanapTambahan($d->no_rawat)->result();
            if (count($psRanapTambahan)>0) {
                foreach ($psRanapTambahan as $rntmbh ) {?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$rntmbh->nama_biaya;?></td>
                        <td>:</td>
                        <td align="right"><?=$moneyFormat->rupiah($rntmbh->besar_biaya);?></td>
                        <td align="right">1</td>
                        <td align="right">0</td>
                        <td align="right"><?=$moneyFormat->rupiah($rntmbh->besar_biaya); $total_tambahan1+=$rntmbh->besar_biaya;?></td>
                    </tr>
                <?}?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total Tambahan : </b></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_tambahan1)?></b></td>
                </tr>
                <?}?>

                <tr>
                    <td><b>Potongan Biaya</b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>
                <?
                    $total_potongan1 = 0;
                    $psRanapPotongan = $this->pasien_mod->getRanapPotongan($d->no_rawat)->result();

                    if (count($psRanapPotongan)>0) {
                        foreach ($psRanapPotongan as $rnpot ) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?=$rnpot->nama_pengurangan?></td>
                                <td>:</td>
                                <td><?=$moneyFormat->rupiah($rnpot->besar_pengurangan)?></td>
                                <td>1</td>
                                <td>0</td>
                                <td><?=$moneyFormat->rupiah(-1*$rnpot->besar_pengurangan); $total_potongan1+=$rnpot->besar_pengurangan*-1?></td>
                            </tr>
                        <?}?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total Potongan : <?=$moneyFormat->rupiah($total_potongan1)?></b></td>
                            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_potongan1)?></b></td>
                        </tr>
                    <?}?>



 <!-- RINCIAN BAYI  -->
        <?
            if (isset($cek_gabung->no_rawat2)) {?>
            <tr>
                <td colspan="8">============================================================================================================</td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            
            </tr>
            <tr>
                <td><b>Biaya Perawatan Bayi</b></td>
                <td>:</td>
                <td colspan="6"></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            </tr>
            <?} 
        ?>
           

        <? $kategori = $this->pasien_mod->kategoriTindakan()->result();
            $no=1;
            $gtot2 = 0;
            if (isset($cek_gabung->no_rawat2)) {
            foreach ($kategori as $kt ) {
                $psRalanDokter  = $this->pasien_mod->getRalanDokter($cek_gabung->no_rawat2,$kt->kd_kategori)->result();
                $psRalanDrPr    = $this->pasien_mod->getRalanDrPr($cek_gabung->no_rawat2,$kt->kd_kategori)->result();
                $pdRalanPerawat = $this->pasien_mod->getRalanPerawat($cek_gabung->no_rawat2,$kt->kd_kategori)->result();
                $psRanapDokter  = $this->pasien_mod->getRanapDokter($cek_gabung->no_rawat2,$kt->kd_kategori)->result();
                $psRanapDrPr    = $this->pasien_mod->getRanapDrPr($cek_gabung->no_rawat2,$kt->kd_kategori)->result();
                $psRanapPerawat = $this->pasien_mod->getRanapPerawat($cek_gabung->no_rawat2,$kt->kd_kategori)->result();
                if (count($psRanapDokter)>0||count($psRanapDrPr)>0||count($psRanapPerawat)>0) {?>
                    <tr> 
                        
                        <td><b><?=$no.". ".$kt->nm_kategori?></b></td>
                        <td>:</td>
                        <td colspan="6"></td>
                        <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                        <?$no++?>
                    </tr> 
            <?
            $total_tindakan=0;
            foreach ($psRanapDokter as $rnd ) {?>
                <tr> 
                    <td></td>
                    <td></td>
                    <td><?=$rnd->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnd->total_byrdr)?></td>
                    <td align="right"><?=$rnd->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnd->biaya);$total_tindakan+=$rnd->biaya?></td>
                </tr> 

               
            <?}?>    
            
            <? foreach ($psRanapDrPr as $rndrpr ) {?>
                <tr> 
                    <td></td>
                    <td></td>
                    <td><?=$rndrpr->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rndrpr->total_byrdrpr)?></td>
                    <td align="right"><?=$rndrpr->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rndrpr->biaya);$total_tindakan+=$rndrpr->biaya?></td>
                </tr> 
            <?}   ?>

            <? foreach ($psRanapPerawat as $rnp ) {?>
                <tr> 
                    <td></td>
                    <td></td>
                    <td><?=$rnp->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnp->total_byrpr)?></td>
                    <td align="right"><?=$rnp->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnp->biaya);$total_tindakan+=$rnp->biaya?></td>
                </tr> 
            <?}   ?>
            
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total <?=$kt->nm_kategori?> : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_tindakan); $gtot2+=$total_tindakan?></b></td>
            </tr>  
            <?}
                
            }?>
            
            <? $psRanapLab = $this->pasien_mod->getRanapLab($cek_gabung->no_rawat2)->result();
                if (count($psRanapLab)>0) {?>
                    <tr>         
                    <td><b><?=$no.". Pemeriksaan Lab"?></b></td>
                    <td>:</td>
                    <?$no++?>
                    </tr> 
                


            <?
            $total_lab2=0;
            // $psRanapLabDetail = $this->pasien_mod->getRanapLab($cek_gabung->no_rawat2)->result();
            foreach ($psRanapLab as $rnl ) {
                $psRanapLabDetail = $this->pasien_mod->getRanapLabDetail($cek_gabung->no_rawat2,$rnl->kd_jenis_prw)->row();?>
                <tr>         
                    <td></td>
                    <td></td>
                    <td><?=$rnl->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnl->biaya)?></td>
                    <td align="right"><?=$rnl->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnl->total+$psRanapLabDetail->total); $total_lab2+=$rnl->total+$psRanapLabDetail->total?></td>
                </tr> 
            <?}?>
        <tr>
            <td></td>
            <td></td>
            <td><b>Total Periksa Lab : </b></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_lab2)?></b></td>
         </tr>
         <?}?>
        
         <? $psRanapRad = $this->pasien_mod->getRanapRad($cek_gabung->no_rawat2)->result();
            
            $total_rad2=0;

            if (count($psRanapRad)>0) {?>
                <tr>         
                    <td><b><?=$no.". Pemeriksaan Radiologi"?></b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <?$no++?>
                </tr> 
            
            <!-- $psRanapLabDetail = $this->pasien_mod->getRanapLab($d->no_rawat)->result(); -->
            <? foreach ($psRanapRad as $rnr ) {
                // $psRanapRadDetail = $this->pasien_mod->getRanapLabDetail($d->no_rawat,$rnr->kd_jenis_prw)->row();?>
                <tr>         
                    <td></td>
                    <td></td>
                    <td><?=$rnr->nm_perawatan?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->biaya)?></td>
                    <td align="right"><?=$rnr->jml?></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->total); $total_rad2+=$rnr->total?></td>
                </tr> 
            <?}?>
            <tr>
                <td></td>
                <td></td>
                <td ><b>Total Periksa Radiologi : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_rad2)?></b></td>
            </tr>
            <?}?>
         
        <?
        $total_operasi2 = 0;
        $psRanapOperasi = $this->pasien_mod->getRanapOperasi($cek_gabung->no_rawat2)->result();

        if (count($psRanapOperasi)>0) {?>
            <tr>         
            <td><b><?=$no.". Operasi"?></b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            <?$no++?>
        </tr> 
            <?    foreach ($psRanapOperasi as $rno ) {?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$rno->nm_perawatan?></td>
                    </tr>  
                    <?
                        if ($rno->biayaoperator1>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 1</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaoperator1?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaoperator1?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaoperator2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 2</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaoperator2?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaoperator2?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaoperator3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 3</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaoperator3?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaoperator3?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaoperator3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Operator 3</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaoperator3?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaoperator3?></td>
                            </tr>  
                        <?}

                        if ($rno->biayaasisten_operator1>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Operator 1</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaasisten_operator1?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaasisten_operator1?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_operator2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Operator 2</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaasisten_operator2?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaasisten_operator2?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_operator3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Operator 3</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaasisten_operator3?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaasisten_operator3?></td>
                            </tr>  
                        <?}
                        if ($rno->biayainstrumen>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Instrumen</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayainstrumen?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayainstrumen?></td>
                            </tr>  
                        <?}
                        if ($rno->biayadokter_anak>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter Anak</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayadokter_anak?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayadokter_anak?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaperawaat_resusitas>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Perawat Resusitasi</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaperawaat_resusitas?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaperawaat_resusitas?></td>
                            </tr>  
                        <?}
                        if ($rno->biayadokter_anestesi>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter Anestesi</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayadokter_anestesi?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayadokter_anestesi?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_anestesi>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Anestesi 1</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaasisten_anestesi?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaasisten_anestesi?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaasisten_anestesi2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Asisten Anestesi 2</td>
                                <td>:</td>
                                <td align="right"><?=$rno->biayaasisten_anestesi2?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$rno->biayaasisten_anestesi2?></td>
                            </tr>  
                        <?}
                        if ($rno->biayabidan>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Bidan 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayabidan2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Bidan 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan2)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayabidan3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Bidan 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayabidan3)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaperawat_luar>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Perawat Luar</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaperawat_luar)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaperawat_luar)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayaalat>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Alat</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaalat)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayaalat)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayasewaok>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Sewa OK/VK</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasewaok)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasewaok)?></td>
                            </tr>  
                        <?}
                        if ($rno->akomodasi>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Akomodasi</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->akomodasi)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->akomodasi)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 1</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop2>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 2</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop2)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop2)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop3>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 3</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop3)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop3)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop4>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 4</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop4)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop4)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_omloop5>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Onloop 5</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop5)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_omloop5)?></td>
                            </tr>  
                        <?}
                        if ($rno->bagian_rs>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; N.M.S.</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->bagian_rs)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->bagian_rs)?></td>
                            </tr>  
                        <?}
                        if ($rno->biayasarpras>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Sarpras</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasarpras)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biayasarpras)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_dokter_pjanak>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter PJ Anak</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_pjanak)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_pjanak)?></td>
                            </tr>  
                        <?}
                        if ($rno->biaya_dokter_umum>0) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>&nbsp; Biaya Dokter Umum</td>
                                <td>:</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_umum)?></td>
                                <td align="right">1</td>
                                <td align="right">0</td>
                                <td align="right"><?=$moneyFormat->rupiah($rno->biaya_dokter_umum)?></td>
                            </tr>  
                        <?}
                            $total_operasi2+=$rno->biaya;
                        ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Total Operasi : </b></td>
                                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><?=$moneyFormat->rupiah($total_operasi2)?></td>
                            </tr>  
                        
                  <?}?>
        <?}?>

       

        <?
            $total_obat2 =0;
            $psRanapObat = $this->pasien_mod->getRanapObat($cek_gabung->no_rawat2)->result();
            
            if (count($psRanapObat)>0) {?>
                <tr>         
                <td><b><?=$no.". Obat & BHP"?></b></td>
                <td>:</td>
                <td colspan="6"></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            <?$no++?>
            </tr> 
            <? foreach ($psRanapObat as $rnob) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$rnob->nama_brng." (".$rnob->nama.")"?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnob->biaya_obat)?></td>
                    <td align="right"><?=$rnob->jml?></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnob->tambahan)?></td>
                    <td align="right"><?=$moneyFormat->rupiah($rnob->total); $total_obat2+=$rnob->total?></td>
                </tr>
            <?}
            
        ?>
        <tr>
            <td></td>
            <td></td>
            <td><b>Total Obat & BHP : </b></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_obat2)?></b></td>
        </tr>
        
            <?}?>

            <?
        $total_retur2 = 0;
        $psRanapRetur = $this->pasien_mod->getRanapRetur($cek_gabung->no_rawat2)->result();
            if (count($psRanapRetur)>0) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Retur Obat : </b></td>
                </tr>        
            <?
            foreach ($psRanapRetur as $rnr ) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$rnr->nama_brng?></td>
                    <td>:</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->h_retur)?></td>
                    <td align="right"><?=$rnr->jml?></td>
                    <td align="right">0</td>
                    <td align="right"><?=$moneyFormat->rupiah($rnr->ttl); $total_retur2+=$rnr->ttl?></td>
                </tr>     
            <?}?>    
            <tr>
                <td></td>
                <td></td>
                <td><b>Total Retur Obat : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_retur2)?></b></td>
            </tr>
            
            <?}
            
            if (count($psRanapObat)>0) {?>
            
            <tr>
                <td></td>
                <td></td>
                <td><b>Total Obat Bersih : </b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_obat2+$total_retur2)?></b></td>
            </tr>
            
            <?}
            ?>

            
            <tr>
                <td><b>Resep Pulang</b></td>
                <td>:</td>
                <td colspan="6"></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            </tr>

        <?
            $total_resep_pulang2=0;
            $psRanapResepPulang = $this->pasien_mod->getRanapResepPulang($cek_gabung->no_rawat2)->result();

            if (count($psRanapResepPulang)>0) {
                foreach ($psRanapResepPulang as $rnrp ) {?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$rnrp->nama_brng." ".$rnrp->dosis?></td>
                        <td>:</td>
                        <td><?=$moneyFormat->rupiah($rnrp->harga)?></td>
                        <td><?=$rnrp->jml_barang?></td>
                        <td><?=$moneyFormat->rupiah($rnrp->total); $total_resep_pulang2+=$rnrp->total;?></td>
                    </tr>
                <?}?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total Resep Pulang : </b></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_resep_pulang2)?></b></td>
                </tr>
            <?}?>
             <tr>
            <td><b>Tambahan Biaya</b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>

        <?
            $total_tambahan2 = 0;
            $psRanapTambahan = $this->pasien_mod->getRanapTambahan($cek_gabung->no_rawat2)->result();
            if (count($psRanapTambahan)>0) {
                foreach ($psRanapTambahan as $rntmbh ) {?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$rntmbh->nama_biaya;?></td>
                        <td>:</td>
                        <td align="right"><?=$moneyFormat->rupiah($rntmbh->besar_biaya);?></td>
                        <td align="right">1</td>
                        <td align="right">0</td>
                        <td align="right"><?=$moneyFormat->rupiah($rntmbh->besar_biaya); $total_tambahan2+=$rntmbh->besar_biaya;?></td>
                    </tr>
                <?}?>
                <tr>
                    <td></td>
                    <td></td>
                    <td ><b>Total Tambahan : </b></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"><b><?=$moneyFormat->rupiah($total_tambahan2)?></b></td>
                </tr>
                <?}?> 

                <tr>
                    <td><b>Potongan Biaya</b></td>
                    <td>:</td>
                    <td colspan="6"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>
                <?
                    $total_potongan2 = 0;
                    $psRanapPotongan = $this->pasien_mod->getRanapPotongan($cek_gabung->no_rawat2)->result();

                    if (count($psRanapPotongan)>0) {
                        foreach ($psRanapPotongan as $rnpot ) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?=$rnpot->nama_pengurangan?></td>
                                <td>:</td>
                                <td><?=$moneyFormat->rupiah($rnpot->besar_pengurangan)?></td>
                                <td>1</td>
                                <td>0</td>
                                <td><?=$moneyFormat->rupiah(-1*$rnpot->besar_pengurangan); $total_potongan2+=$rnpot->besar_pengurangan*-1?></td>
                            </tr>
                        <?}?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total Potongan : </b></td>
                            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;" align="right"><?=$moneyFormat->rupiah($total_potongan2)?></td>
                        </tr>
                    <?}?>
                              

        <?}?>

        <tr style="font-size:18pt;">
                            <td><i><b>Total Tagihan</b></i></td>
                            <td>:</td>
                            <!-- <td colspan="6"></td> -->
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <!-- <td style="display: none;"></td> -->
                            <!-- <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td> -->
                            <?
                                $grand_total = @$gtot1+@$gtot2+@$total_kamar+@$total_lab1+@$total_lab2+@$total_obat1+@$total_obat2+@$total_operasi1+@$total_operasi2+@$total_potongan1+@$total_potongan2+@$total_register+@$total_resep_pulang1+@$total_resep_pulang2+@$total_retur1+@$total_retur2+@$total_tambahan1+@$total_tambahan2+@$total_rad+@$total_rad2;
                            ?>
                            <td align="right"><i><b><?=$moneyFormat->rupiah($grand_total)?></b></i></td>
                        </tr>    
    <?}?>

</table>

<br>
<br>

<table align="center" width="100%" style="font-size: 10pt;">
    <tr>
        <td align="center"></td>
        <!-- <td align="center">Tgl. Cetak : <?=date('d/m/Y', strtotime($tgl_periksa))." ".$jam?></td> -->
      </tr>
        <tr>
            <td align="center" width="50%">Mengetahui,<br>a/n Direktur<br>Kabid Umum dan Keuangan</td>
            <td align="center">Kasir</td>
        </tr>
        <tr>
            <td align="center"><img src="<?=base_url('assets/'.$ttd_kasir);?>"></td>
            <td align="center"><img src="<?=base_url('assets/'.$ttd_kasir2);?>"></td>
        </tr>
        <tr>
            <td align="center"><?=$nama?></td>
            <td align="center"><?=$nama2?></td>
            
        </tr>
    </table>

    <br>

<table style="font-size:9pt">
    <tr>
        <td><i>NB : Mohon maaf apabila ada tagihan yang belum tertagihkan dalam perincian ini akan ditagihkan kemudian, dan apabila berlebih akan dikembalikan</i></td>
    </tr>
    
</table>
                        <!-- </div> -->

<!-- <script>
    var total = '<? echo $moneyFormat->rupiah($grand_total)?>';
    document.getElementById("hasil").innerHTML = "Total Tagihan : "+total;


    var table = $('#example2').DataTable({
    scrollY: "400px",
    scrollX: true,
    scrollCollapse: true,
    bSort: false,
    paging: false,
    searching : false,
    dom: 'Bfrtip',
    buttons: [
      'copy',
      'csv',
      {
        extend: 'excel',
        className: 'excelButton',
        customize: function(xlsx) {
          var sheet = xlsx.xl.worksheets['sheet1.xml'];
          $('row c', sheet).each(function() {
            $(this).attr('s', '0');
          });
        }
      },
      'pdf',
      'print'
    ],
    
  });

</script> -->

<!-- <script>
    var total = '<? echo $total_lama ?>';
    document.getElementById("hasil").innerHTML = total;
</script> -->