<table>
    <tr style="border:1px solid black;">
        <th style="border:1px solid black;">No.</th>
        <th style="border:1px solid black;">Tanggal</th>
        <th style="border:1px solid black;">Suhu(C)</th>
        <th style="border:1px solid black;">Tensi(mmHg)</th>
        <th style="border:1px solid black;">Nadi(/menit)</th>
        <th style="border:1px solid black;">RR(/menit)</th>
        <th style="border:1px solid black;">Tinggi(cm)</th>
        <th style="border:1px solid black;">Berat(Kg)</th>
        <th style="border:1px solid black;">GCS(E,V,M)</th>
        <th style="border:1px solid black;">SPO2</th>
        <th style="border:1px solid black;">Alergi</th>
        <!-- <th style="border:1px solid black;">Instruksi & Evaluasi</th> -->
    </tr>
    <?
        $no=1;
        
        foreach ($get_pemeriksaan as $data) {?>
            <tr>
                <td rowspan="7" style="vertical-align:top;border:1px solid black;"><?=$no;?></td>
                <td rowspan="7" style="vertical-align:top;border:1px solid black;"><?=$data->tgl_perawatan." ".$data->jam_rawat;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->suhu_tubuh;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->tensi;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->nadi;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->respirasi;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->tinggi;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->berat;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->gcs;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->spo2;?></td>
                <td style="border:1px solid black; text-align:center;"><?=$data->alergi;?></td>
                <!-- <td rowspan="6" style="vertical-align:top;border:1px solid black;">Instruksi : <?=$data->instruksi;?><br>Evaluasi : <?=$data->evaluasi;?></td> -->
            </tr>        
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Kesadaran</b></td>
                <td colspan="7" style="border:1px solid black;"><?=$data->kesadaran;?></td>
            </tr>
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Subyektif</b></td>
                <td colspan="7" style="border:1px solid black;"><?=$data->keluhan;?></td>
            </tr>
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Obyektif</b></td>
                <td colspan="7" style="border:1px solid black;"><?=$data->pemeriksaan;?></td>
            </tr>
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Assesment</b></td>
                <td colspan="7" style="border:1px solid black;"><?=$data->penilaian;?></td>
            </tr>
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Plan</b></td>
                <td colspan="7" style="border:1px solid black;"><?=$data->rtl;?></td>
            </tr>
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Instruksi & Evaluasi</b></td>
                <td colspan="7" style="border:1px solid black;">Instruksi : <?=$data->instruksi;?><br>Evaluasi : <?=$data->evaluasi;?></td>
            </tr>
            <tr>
                <td colspan="2" style="border:1px solid black;"><b>Dokter / Petugas</b></td>
                <td colspan="9" style="border:1px solid black;"><?=$data->nama;?></td>
            </tr>
        <?
        $no++;        
    }

    ?>
    
</table>
</body>