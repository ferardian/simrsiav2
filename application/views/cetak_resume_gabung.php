<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<br>

<table autosize="1" style="border: 1px solid black;font-size:10pt;width:100%;">
<?
    foreach ($get_resume_gabung as $data) {
        $get_lama_inap = $this->dashboard_mod->get_lama_inap($data->no_rawat)->row();
        ?>
        <tr>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td><?=date("d-m-Y", strtotime($data->tgl_registrasi));?></td>
                        <td> Jam</td>
                        <td>:</td>
                        <td><?=$data->jam_reg;?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Keluar</td>
                        <td>:</td>
                        <td><?=date("d-m-Y", strtotime($get_resume_ibu->tgl_keluar));?></td>
                        <td> Jam</td>
                        <td>:</td>
                        <td><?=$get_resume_ibu->jam_keluar;?></td>
                    </tr>
                    <tr>
                        <td>Lama Dirawat</td>
                        <td>:</td>
                        <td><?=$get_lama_inap->lama." Hari";?></td>
                    </tr>
                    <tr>
                        <td>Ruang Rawat</td>
                        <td>:</td>
                        <td><?=$get_resume_ibu->nm_bangsal;?></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Cara Bayar</td>
                        <td>:</td>
                        <td><?=$get_resume_ibu->png_jawab;?></td>
                    </tr>
                    <tr>
                        <td>Indikasi Rawat</td>
                        <td>:</td>
                        <td><?=$data->alasan;?></td>
                    </tr>
                    <tr>
                        <td>Diagnosa Awal</td>
                        <td>:</td>
                        <td><?=$data->diagnosa_awal;?></td>
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
            <?=nl2br($data->keluhan_utama);?><br>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>PEMERIKSAAN FISIK</b> <br>
            <?=nl2br($data->pemeriksaan_fisik);?>
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
            <b>DIAGNOSA AKHIR</b> <br>
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
                    <td><?=$data->diagnosa_utama?></td>
                    <td><?=$data->kd_diagnosa_utama?></td>
                </tr>
                <tr>
                    <td>Diagnosa Sekunder</td>
                    <td>:</td>
                    <td>1. <?=$data->diagnosa_sekunder?></td>
                    <td><?=$data->kd_diagnosa_sekunder?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>2. <?=$data->diagnosa_sekunder2?></td>
                    <td><?=$data->kd_diagnosa_sekunder2?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>3. <?=$data->diagnosa_sekunder3?></td>
                    <td><?=$data->kd_diagnosa_sekunder3?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>4. <?=$data->diagnosa_sekunder4?></td>
                    <td><?=$data->kd_diagnosa_sekunder4?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>5. <?=$data->diagnosa_sekunder5?></td>
                    <td><?=$data->kd_diagnosa_sekunder5?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>6. <?=$data->diagnosa_sekunder6?></td>
                    <td><?=$data->kd_diagnosa_sekunder6?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>7. <?=$data->diagnosa_sekunder7?></td>
                    <td><?=$data->kd_diagnosa_sekunder7?></td>
                </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>TINDAKAN / OPERASI</b> <br>
            <table width="100%">
                <tr>
                    <td width="140"></td>
                    <td></td>                    
                    <td></td>                    
                    <td>ICD-9-CM</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>1. <?=$data->prosedur_utama?></td>
                    <td><?=$data->kd_prosedur_utama?></td>
                </tr>
                <tr>
                    <td></td>                    
                    <td></td>                    
                    <td>2. <?=$data->prosedur_sekunder?></td>
                    <td><?=$data->kd_prosedur_sekunder?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>3. <?=$data->prosedur_sekunder2?></td>
                    <td><?=$data->kd_prosedur_sekunder2?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>4. <?=$data->prosedur_sekunder3?></td>
                    <td><?=$data->kd_prosedur_sekunder3?></td>
                </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>PENGOBATAN / TERAPI</b> <br>
            <?=@nl2br($data->obat_di_rs)?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>PROGNOSIS</b> <br>
            <?=@nl2br($data->ket_keadaan)?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <table>
                <tr>
                    <td width="150"><b>KONDISI PULANG</b> </td>
                    <?
                        if ($data->cara_keluar == "Pulang Atas Permintaan Sendiri" && $data->keadaan=="Membaik") {?>
                            <td><span style="font-size: 20pt;">&#9725;</span> Membaik</td>
                            <td><span style="font-size: 20pt;">&#9726;</span> Pulang Atas Permintaan Sendiri</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Meninggal</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Rujuk</td>
                        <?} else if($data->cara_keluar == "Atas Izin Dokter" && $data->keadaan=="Membaik") {?>
                            <td><span style="font-size: 20pt;">&#9726;</span> Membaik</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Pulang Atas Permintaan Sendiri</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Meninggal</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Rujuk</td>
                        <?} else if ($data->keadaan=="Meninggal") {?>
                            <td><span style="font-size: 20pt;">&#9725;</span> Membaik</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Pulang Atas Permintaan Sendiri</td>
                            <td><span style="font-size: 20pt;">&#9726;</span> Meninggal</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Rujuk</td>
                        <?} else if($data->cara_keluar == "Pindah RS") {?>
                            <td><span style="font-size: 20pt;">&#9725;</span> Membaik</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Pulang Atas Permintaan Sendiri</td>
                            <td><span style="font-size: 20pt;">&#9725;</span> Meninggal</td>
                            <td><span style="font-size: 20pt;">&#9726;</span> Rujuk <?=$data->ket_keluar?></td>

                            <!-- <td><?=$data->keadaan=="Membaik" ? '<span style="font-size: 20pt;">&#9726;</span> '.$data->keadaan : '<span style="font-size: 20pt;">&#9725;</span> Membaik' ?></td>
                            <td><?=$data->keadaan=="Sembuh" ? '<span style="font-size: 20pt;">&#9726;</span> '.$data->keadaan : '<span style="font-size: 20pt;">&#9725;</span> Sembuh' ?></td>
                            <td><?=$data->keadaan=="Keadaan Khusus" ? '<span style="font-size: 20pt;">&#9726;</span> '.$data->keadaan : '<span style="font-size: 20pt;">&#9725;</span> Keadaan Khusus' ?></td>
                            <td><?=$data->keadaan=="Meninggal" ? '<span style="font-size: 20pt;">&#9726;</span> '.$data->keadaan : '<span style="font-size: 20pt;">&#9725;</span> Meninggal' ?></td> -->
                        <?}
                    ?>
                  
                </tr>
            </table>
            </td>
            
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <b>OBAT PULANG</b> <br>
            <?=@nl2br($data->obat_pulang);?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <table>
                <tr>
                    <td width="250"><b>SHK</b></td>
                    <td>
                        <?
                            echo $data->shk;
                        ?>
                        <!-- Dilanjutkan <?=$data->dilanjutkan == "Kembali Ke RS" ? "Kontrol" : "ke ".$data->dilanjutkan?> -->
                    </td>
                    <td>
                        <?
                            echo $data->shk_keterangan;
                        ?>
                        <!-- Dilanjutkan <?=$data->dilanjutkan == "Kembali Ke RS" ? "Kontrol" : "ke ".$data->dilanjutkan?> -->
                    </td>
                   
                </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
            <table>
                <tr>
                    <td width="250"><b>INSTRUKSI TINDAK LANJUT</b></td>
                    <td>
                        <?
                            if($data->dilanjutkan == "Kembali Ke RS"){
                                $text = "Kontrol";
                            } else if($data->dilanjutkan == "Puskesmes"){
                                $text = "Dilanjutkan ke FKTP";
                            } else if($data->dilanjutkan == "Dokter Luar"){
                                $text = "Dilanjutkan ke FKTP";
                            } else if($data->dilanjutkan == "RS Lain") {
                                $text = "Rujuk RS Lain";
                            } else {
                                $text = "Lainnya";
                            }
                            echo $text;
                        ?>
                        <!-- Dilanjutkan <?=$data->dilanjutkan == "Kembali Ke RS" ? "Kontrol" : "ke ".$data->dilanjutkan?> -->
                    </td>
                    <td>:</td>
                    <td><?=@date('d-m-Y', strtotime($data->kontrol))?></td>
                </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table width="100%" style="text-align: center;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Pekalongan,</td>
                    </tr>
                    <tr>
                        <td>Kepala Ruang</td>
                        <td>Pasien/Keluarga</td>
                        <td>Dokter Penanggung Jawab Pelayanan</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><img src="<?=base_url('assets/'.@$ttd_resume);?>"></td>
                        <td><div style="align-items: center;"><img src="http://192.168.100.31/rsiap/file/verif_sep/<?=@$get_ttd_sep->verifikasi?>" width="20%" ></div></td>
                        <td><img src="<?=base_url('assets/'.@$ttd_dokter);?>"></td>
                    </tr>
                    <tr>
                        <td><?=$nama_koor?></td>
                        <td><?
                            // if ((int)date("d",strtotime($data->tgl_registrasi)) < 15) {
                            //     echo ucwords(strtolower($data->namakeluarga));
                            // }
                            
                        ?></td>
                        <td><?=$data->nm_dokter?></td>
                    </tr>
                </table>
            </td>
        </tr>
    <?}
?>
</table>