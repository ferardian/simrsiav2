<style>
    div #hasil{
        font-size: 20pt;
        text-align: center;
        font-weight: bold;
    }

    /* table th {
    border-left: 1px solid rgba(0,0,0,0.2);
    border-right: 1px solid rgba(0,0,0,0.2);
} */
</style>

<table style="width:100%;">
<tr>
                <td style="font-size:11pt;font-weight:bold;" align="center">BILLING</td>
            </tr>
</table>
    <br>

<table style=" color: black !important; border-color:white; font-size:10pt; width:100%;" >
    
    <thead >
        <tr>
            <th colspan="2" style="border-left: none !important;">Keterangan</th>
            <th colspan="2">Tindakan/Terapi</th>
            <th ></th>
            <th >Jumlah</th>
            <th ></th>
            <th style="border-right: none !important;">Total Biaya</th>
        </tr>
    </thead>
<?
      date_default_timezone_set('Asia/Jakarta');

$moneyFormat  = new moneyFormat();

    foreach ($pasien as $d) {
        $registrasi = $this->pasien_mod->registrasi_ralan($d->no_rawat)->row();
        $no_nota = $this->dashboard_mod->notaJalan($d->no_rawat)->row();

        $now = now();

        ?>
        <tr>
            <td><b>No. Nota</b></td>
            <td>:</td>
            <td colspan="6">
                <?
                        echo @$no_nota->no_nota;

                ?>
            </td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
        <tr>
            <td><b>Unit/Instansi</b></td>
            <td>:</td>
            <td colspan="6"><?
                    echo $d->nm_poli;
            ?></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
        <tr>
            <td><b>Tanggal & Jam</b></td>
            <td>:</td>
            <td colspan="6"><?
                echo $d->tgl_registrasi." ".$d->jam_reg;
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
                echo $d->png_jawab;
            ?></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
        </tr>  
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
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="6"><?=$d->nm_dokter?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>  
                <tr>
                    <td><b>Registrasi</b></td>
                    <td>:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><?=$moneyFormat->rupiah($registrasi->biaya_reg); $total_register = $registrasi->biaya_reg?></td>
                </tr>  
            <tr>
            <td><b>Tindakan</b></td>
            <td>:</td>
            <td colspan="6"></td>
            <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            </tr>
            <?
                $tarif_dokter = $this->pasien_mod->getRalanDokter2($d->no_rawat)->result();
                $tarif_dokter_perawat = $this->pasien_mod->getRalanDrPr2($d->no_rawat)->result();
                $tarif_perawat = $this->pasien_mod->getRalanPerawat2($d->no_rawat)->result();
                $tarif_lab = $this->pasien_mod->getRanapLab($d->no_rawat)->result();
                $tarif_radiologi = $this->pasien_mod->getRanapRad($d->no_rawat)->result();

                $total_tindakan=0;
                $total_lab=0;
                $total_radiologi=0;

            foreach($tarif_dokter as $td ){?>
            <tr> 
                <td></td>
                <td></td>
                <td><?=$td->nm_perawatan?></td>
                <td>:</td>
                <td></td>
                <!-- <td align="right"><?=$moneyFormat->rupiah($td->total_byrdr)?></td> -->
                <td align="right"><?=$td->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($td->biaya);$total_tindakan+=$td->biaya;?></td>
            </tr> 
            <?}

        foreach($tarif_dokter_perawat as $tdp ){?>
            <tr> 
                <td></td>
                <td></td>
                <td><?=$tdp->nm_perawatan?></td>
                <td>:</td>
                <td></td>
                <!-- <td align="right"><?=$moneyFormat->rupiah($tdp->total_byrdr)?></td> -->
                <td align="right"><?=$tdp->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($tdp->biaya);$total_tindakan+=$tdp->biaya;?></td>
            </tr> 
        <?}

        foreach($tarif_perawat as $tp ){?>
            <tr> 
                <td></td>
                <td></td>
                <td><?=$tp->nm_perawatan?></td>
                <td>:</td>
                <td></td>
                <!-- <td align="right"><?=$moneyFormat->rupiah($tp->total_byrpr)?></td> -->
                <td align="right"><?=$tp->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($tp->biaya);$total_tindakan+=$tp->biaya;?></td>
            </tr> 
        <?}


        foreach($tarif_lab as $tl){?>
            <tr>         
                <td></td>
                <td></td>
                <td><?=$tl->nm_perawatan?></td>
                <td>:</td>
                <td></td>
                <!-- <td align="right"><?=$moneyFormat->rupiah($tl->biaya)?></td> -->
                <td align="right"><?=$tl->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($tl->total); $total_lab+=$tl->total?></td>
            </tr> 
        <?}
        foreach($tarif_radiologi as $tr){?>
            <tr>         
                <td></td>
                <td></td>
                <td><?=$tr->nm_perawatan?></td>
                <td>:</td>
                <td></td>
                <!-- <td align="right"><?=$moneyFormat->rupiah($tl->biaya)?></td> -->
                <td align="right"><?=$tr->jml?></td>
                <td></td>
                <td align="right"><?=$moneyFormat->rupiah($tr->total); $total_radiologi+=$tr->total?></td>
            </tr> 
        <?}
            
            
            
            ?>
        
        <?
            $no=1;
            $total_obat = 0;
            $tarif_obat = $this->pasien_mod->getRalanObat($d->no_rawat)->result();
            if (count($tarif_obat)>0) {?>
                <tr>         
                    <td><b>Obat & BHP</b></td>
                    <td>:</td>
                    <td ></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <?
                    foreach ($tarif_obat as $to) {?>
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td><?=$to->nama_brng." (".$to->nama.")"?></td>
                            <td>:</td>
                            <td align="right"><?=$moneyFormat->rupiah($to->biaya_obat)?></td>
                            <td align="right"><?=$to->jml?></td>
                            <td align="right"><?=$moneyFormat->rupiah($to->tambahan)?></td>
                            <td align="right"><?=$moneyFormat->rupiah($to->total); ?></td>
                        </tr> -->
                        <?=$total_obat+=$to->total?>
                       
                    <?}?>
                    <td style="display: none;" align="right"><?=$moneyFormat->rupiah($total_obat)?></td>
                </tr> 
            
            <!-- <tr>
                <td></td>
                <td></td>
                <td colspan="6"><b>Total Obat & BHP : <?=$moneyFormat->rupiah($total_obat)?></b></td>
                <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
            </tr> -->
            <?}?>
    
                
       

        <?
            $total_tambahan = 0;
            $psRanapTambahan = $this->pasien_mod->getRanapTambahan($d->no_rawat)->result();
            if (count($psRanapTambahan)>0) {
                foreach ($psRanapTambahan as $rntmbh ) {?>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$rntmbh->nama_biaya;?></td>
                        <td>:</td>
                        <td align="right"><?=$moneyFormat->rupiah($rntmbh->besar_biaya);?></td>
                        <td align="right">1</td>
                        <td align="right">0</td>
                        <td align="right"><?=$moneyFormat->rupiah($rntmbh->besar_biaya); $total_tambahan+=$rntmbh->besar_biaya;?></td>
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
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_tambahan)?></b></td>
                </tr>
                <?}?>

                
                <?
                    $total_potongan = 0;
                    $psRanapPotongan = $this->pasien_mod->getRanapPotongan($d->no_rawat)->result();

                    if (count($psRanapPotongan)>0) {
                        foreach ($psRanapPotongan as $rnpot ) {?>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?=$rnpot->nama_pengurangan?></td>
                                <td>:</td>
                                <td><?=$moneyFormat->rupiah($rnpot->besar_pengurangan)?></td>
                                <td>1</td>
                                <td>0</td>
                                <td><?=$moneyFormat->rupiah(-1*$rnpot->besar_pengurangan); $total_potongan+=$rnpot->besar_pengurangan*-1?></td>
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
                    <td style="display: none;" align="right"><b><?=$moneyFormat->rupiah($total_potongan)?></b></td>
                        </tr>
                    <?}?>


        <tr style="font-size:18pt;">
                            <td><i><b>Total Tagihan</b></i></td>
                            <td>:</td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                            <?
                                $grand_total = @$total_tindakan+@$total_lab+@$total_radiologi+@$total_obat+@$total_potongan+@$total_register+@$total_tambahan;
                            ?>
                            <td align="right"><i><b><?=$moneyFormat->rupiah($grand_total)?></b></i></td>
                        </tr>    
    <?}?>

</table>

<br>
<br>

<table align="center" width="100%" style="font-size:9pt">
    <tr>
        <td align="center"></td>
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
