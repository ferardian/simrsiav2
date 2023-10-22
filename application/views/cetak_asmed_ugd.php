<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<br>

<table autosize="1" style="border: 1px solid black;font-size:10pt;width:100%;">
<?
    foreach ($get_asmed_ugd as $data) {?>
        <tr>
            <!-- <td colspan="5" style="border: 1px solid black;">
                <table width="100%">
                    <tr>
                        <td>No. RM</td>
                        <td>:</td>
                        <td><?=$data->no_rkm_medis?></td>
                        <td></td>
                        <td></td>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?=$data->jk?></td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?=$data->nm_pasien?></td>
                        <td></td>
                        <td></td>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?=date('d-m-Y', strtotime($data->tgl_lahir))?></td>
                    </tr>
                </table>
            </td> -->
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?=date('d-m-Y H:i:s',strtotime($data->tanggal))?></td>
                    </tr>
                    <tr>
                        <td>Anamnesis</td>
                        <td>:</td>
                        <td><?=$data->anamnesis?></td>                        
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><b>I. RIWAYAT KESEHATAN</b></td>
                    </tr>
                    <tr>
                        <td>&emsp;Keluhan Utama</td>
                        <td>:</td>
                        <td><?=$data->keluhan_utama?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Riwayat Penyakit Sekarang : <?=$data->rps?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="3" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Riawayat Penyakit Dahulu : <?=$data->rpd?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
            <td colspan="3" style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Riwayat Penyakit dalam Keluarga : <?=$data->rpk?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="3" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Riawayat Pengobatan : <?=$data->rpo?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
            <td colspan="3" style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Riwayat Alergi : <?=$data->alergi?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><b>II. PEMERIKSAAN FISIK</b></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table width="100%">
                    <tr>
                        <td>Keadaan Umum : <?=$data->keadaan?></td>
                        <td>Kesadaran : <?=$data->kesadaran?></td>
                        <td>GCS(E,V,M) : <?=$data->gcs?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table width="100%">
                    <tr>
                        <td>Tanda Vital : </td>
                        <td>TD : <?=$data->td?></td>
                        <td>N : <?=$data->nadi?></td>
                        <td>R : <?=$data->rr?></td>
                        <td>S : <?=$data->suhu?></td>
                        <td>SPO : <?=$data->spo?></td>
                        <td>BB : <?=$data->bb?></td>
                        <td>TB : <?=$data->tb?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Kepala</td>
                    </tr>                
                    <tr>
                        <td>Mata</td>
                    </tr>                
                    <tr>
                        <td>Gigi & Mulut</td>
                    </tr>                
                    <tr>
                        <td>Leher</td>
                    </tr>                
                </table>
            </td>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><?=$data->kepala?></td>
                    </tr>                
                    <tr>
                        <td><?=$data->mata?></td>
                    </tr>                
                    <tr>
                        <td><?=$data->gigi?></td>
                    </tr>                
                    <tr>
                        <td><?=$data->leher?></td>
                    </tr>                
                </table>
            </td>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Thoraks</td>
                    </tr>                
                    <tr>
                        <td>Abdomen</td>
                    </tr>                
                    <tr>
                        <td>Genital & Anus</td>
                    </tr>                
                    <tr>
                        <td>Ekstremitas</td>
                    </tr>                
                </table>
            </td>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><?=$data->thoraks?></td>
                    </tr>                
                    <tr>
                        <td><?=$data->abdomen?></td>
                    </tr>                
                    <tr>
                        <td><?=$data->genital?></td>
                    </tr>                
                    <tr>
                        <td><?=$data->ekstremitas?></td>
                    </tr>                
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><?=$data->ket_fisik?></td>
                    </tr>                
                </table>
            </td>
            
        </tr>
        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><b>III. STATUS LOKALIS</b></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?=$data->ket_lokalis?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><b>IV. PEMERIKSAAN PENUNJANG</b></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>EKG</td>
                        <td>:</td>
                        <td><?=$data->ekg?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Radiologi</td>
                        <td>:</td>
                        <td><?=$data->rad?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Laboratorium</td>
                        <td>:</td>
                        <td><?=$data->lab?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><b>V. DIAGNOSIS</b></td>
                    </tr>
                    <tr>
                        <td><?=nl2br($data->diagnosis)?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><b>VI. TATA LAKSANA</b></td>
                    </tr>
                    <tr>
                        <td><?=nl2br($data->tata)?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td >Tanggal dan Jam</td>
                    </tr>
                </table>
            </td>
            <td align="center" colspan="3" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td >Nama Dokter dan Tanda Tangan</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><?=date('d-m-Y H:i:s',strtotime($data->tanggal))?></td>
                    </tr>
                </table>
            </td>
            <td align="center" colspan="3" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td><img src="<?=base_url('assets/'.@$ttd_dokter_asmed_ugd);?>"></td>
                    </tr>
                    <tr>
                        <td><?=$data->nm_dokter?></td>
                    </tr>
                </table>
            </td>
        </tr>
    <?}
?>
</table>