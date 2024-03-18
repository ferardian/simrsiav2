

<body>
    <br>
<table class="tb" width="100%">
<th >
    <tr>
        <td>Tanggal dan Jam</td>
        <td>Diagnosis</td>
        <td>Riwayat Alergi</td>
        <td>Riwayat Pengobatan</td>
        <td>Riwayat Tindakan</td>
        <td>Riwayat Rawat Inap</td>
        <td>Nama Terang dan Ttd</td>
    </tr>
</th>
<tbody>
    <?
        foreach ($get_resume_ralan as $data) {?>
            <tr></tr>
        <?}
    ?>
    <tr>
        <td><?=date("d-m-Y", strtotime($data->tgl_registrasi))." ".$data->jam_reg;?></td>
        <td><?=$data->kd_penyakit." - ".$data->nm_penyakit?></td>
        <td>-</td>
        <td><?=@nl2br($data->rtl)?></td>
        <td><?=@nl2br($data->instruksi);?></td>
        <td>-</td>
        <td><img src="<?=base_url('assets/'.@$ttd_dokter);?>"> <br> <?=$nama_dokter->nama?></td>
    </tr>
</tbody>
<!-- <?
    foreach ($get_resume_ralan as $data) {
      
        ?>
        <tr>
            <td style="border: 1px solid black; width: 100%;">
                <table >
                    <tr>
                        <td>Tanggal Periksa</td>
                        <td>:</td>
                        <td><?=date("d-m-Y", strtotime($data->tgl_registrasi));?></td>
                        <td>  Jam</td>
                        <td>:</td>
                        <td><?=$data->jam_reg;?></td>
                    </tr>
                    <tr>
                        <td>Poli</td>
                        <td>:</td>
                        <td><?=$data->nm_poli;?></td>
                    </tr>
                    <tr>
                        <td>Cara Bayar</td>
                        <td>:</td>
                        <td><?=$data->png_jawab;?></td>
                    </tr>
                    <tr>
                        <td>DPJP</td>
                        <td>:</td>
                        <td><?=$data->nm_dokter;?></td>
                    </tr>
                </table>
            </td>
    
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>ANAMNESIS</b> <br>
            <?=nl2br($data->keluhan);?><br>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>PEMERIKSAAN FISIK</b> <br>
            <?=nl2br($data->pemeriksaan);?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>PEMERIKSAAN PENUNJANG</b> <br>
            <?=nl2br($data->hasil_laborat);?> <br>
            <?=nl2br($data->pemeriksaan_penunjang);?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>DIAGNOSA</b> <br>
            <table width="100%">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>ICD-10</td>
                </tr>
                <tr>
                    <td>Diagnosa Utama</td>
                    <td>:</td>
                    <td><?=$data->nm_penyakit?></td>
                    <td><?=$data->kd_penyakit?></td>
                </tr>
              
            </table>
            </td>
        </tr>
    
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>PENGOBATAN / TERAPI</b> <br>
            <?=@nl2br($data->instruksi)?>
            </td>
        </tr>
     
        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table width="100%" style="text-align: center;">
                    <tr>
                        <td></td>
                        <td style="width: 15%;"></td>
                        <td>Pekalongan,</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Dokter Penanggung Jawab Pelayanan</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="<?=base_url('assets/'.@$ttd_dokter);?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?
                           
                        ?></td>
                        <td><?=$nama_dokter->nama?></td>
                    </tr>
                </table>
            </td>
        </tr>
    <?}
?> -->
</table>
</body>