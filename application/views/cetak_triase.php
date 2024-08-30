<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<br>

<table autosize="1" style="border: 1px solid black;font-size:10pt;width:100%;">
<?
    foreach ($get_asmed_ugd as $data) {
        
        ?>
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
                    <!-- <tr>
                        <td>Anamnesis</td>
                        <td>:</td>
                        <td><?=$data->anamnesis?></td>                        
                    </tr> -->
                </table>
            </td>
        </tr>
    <tr>
        <td align="center" style="border: 1px solid black;">Prioritas Waktu Tunggu</td>
        <td align="center" style="border: 1px solid black; background-color: #dc3545;"><?=count($get_triase_skala1) > 0 ? "<b>√ ATS I</b><br><b>Segera</b>" : "☐ ATS I<br>Segera"?></td>
        <td align="center" style="border: 1px solid black; background-color: #ffc107;"><?=count($get_triase_skala2) > 0 ? "<b>√ ATS II</b><br><b>10 Menit</b>" : "☐ ATS II<br>10 Menit"?></td>
        <td align="center" style="border: 1px solid black; background-color: #198754;"><?=count($get_triase_skala3) > 0 ? "<b>√ ATS III</b><br><b>30 Menit</b>" : "☐ ATS III<br>30 Menit"?></td>
        <td align="center" style="border: 1px solid black; background-color: #0d6efd;"><?=count($get_triase_skala4) > 0 ? "<b>√ ATS IV</b><br><b>60 Menit</b>" : "☐ ATS IV<br>60 Menit"?></td>
        <td align="center" style="border: 1px solid black;"><?=count($get_triase_skala5) > 0 ? "<b>√ ATS V</b><br><b>120 Menit</b>" : "☐ ATS V<br>120 Menit"?></td>
    </tr>
    <tr>
        <td style="border: 1px solid black;">Jalan Nafas</td>
        <td style="border: 1px solid black;">
            <?
            echo $this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Obstruksi')->row() ? "<b>√ Obstruksi</b>" : "☐ Obstruksi";
            ?>

        </td>
        <td style="border: 1px solid black;">
            <?
            echo $this->dashboard_mod->cek_triase_skala2($get_triase_skala2->no_rawat,'Paten')->row() ? "<b>√ Paten</b>" : "☐ Paten";
            ?>
        </td>
        <td style="border: 1px solid black;">
            <?
            echo $this->dashboard_mod->cek_triase_skala3($get_triase_skala3->no_rawat,'Paten')->row() ? "<b>√ Paten</b>" : "☐ Paten";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
        echo $this->dashboard_mod->cek_triase_skala4($get_triase_skala4->no_rawat,'Paten')->row() ? "<b>√ Paten</b>" : "☐ Paten";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
        echo $this->dashboard_mod->cek_triase_skala5($get_triase_skala5->no_rawat,'Paten')->row() ? "<b>√ Paten</b>" : "☐ Paten";
            ?>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid black;">Pernapasan</td>
        <td style="border: 1px solid black;">
        <? 
        echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Distres napas berat')->row()) ? "<b>√ Distres napas berat</b><br>" : "☐ Distres napas berat<br>";
        echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Henti napas')->row()) ? "<b>√ Henti napas</b><br>" : "☐ Henti napas<br>";
        echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Hipoventilasi')->row()) ? "<b>√ Hipoventilasi</b>" : "☐ Hipoventilasi";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
        echo ($this->dashboard_mod->cek_triase_skala2($get_triase_skala2->no_rawat,'Distres napas sedang')->row()) ? "<b>√ Distres napas sedang</b>" : "☐ Distres napas sedang";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
            echo ($this->dashboard_mod->cek_triase_skala3($get_triase_skala3->no_rawat,'Distres napas ringan')->row()) ? "<b>√ Distres napas ringan</b>" : "☐ Distres napas ringan";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
        echo ($this->dashboard_mod->cek_triase_skala4($get_triase_skala4->no_rawat,'Tidak ada distres napas')->row()) ? "<b>√ Tidak ada distres napas</b>" : "☐ Tidak ada distres napas";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
        echo ($this->dashboard_mod->cek_triase_skala5($get_triase_skala5->no_rawat,'Tidak ada distres napas')->row()) ? "<b>√ Tidak ada distres napas</b>" : "☐ Tidak ada distres napas";
            ?>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid black;">Sirkulasi</td>
        <td style="border: 1px solid black;">
        <? 
         echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Gangguan hemodinamik berat')->row()) ? "<b>√ Gangguan hemodinamik berat</b><br>" : "☐ Gangguan hemodinamik berat<br>";
         echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Henti jantung')->row()) ? "<b>√ Henti jantung</b><br>" : "☐ Henti jantung<br>";
         echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'Perdarahan tak terkontrol')->row()) ? "<b>√ Perdarahan tak terkontrol</b>" : "☐ Perdarahan tak terkontrol";
            ?>
    </td>
        <td style="border: 1px solid black;">
        <?
        echo ($this->dashboard_mod->cek_triase_skala2($get_triase_skala2->no_rawat,'Gangguan hemodinamik sedang')->row()) ? "<b>√ Gangguan hemodinamik sedang</b>" : "☐ Gangguan hemodinamik sedang";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
            echo ($this->dashboard_mod->cek_triase_skala3($get_triase_skala3->no_rawat,'Gangguan hemodinamik ringan')->row()) ? "<b>√ Gangguan hemodinamik ringan</b>" : "☐ Gangguan hemodinamik ringan";
            ?>
        
        </td>
        <td style="border: 1px solid black;">
        <?
         echo ($this->dashboard_mod->cek_triase_skala4($get_triase_skala4->no_rawat,'Tidak ada gangguan sirkulasi')->row()) ? "<b>√ Tidak ada gangguan sirkulasi</b>" : "☐ Tidak ada gangguan sirkulasi";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
         echo ($this->dashboard_mod->cek_triase_skala5($get_triase_skala5->no_rawat,'Tidak ada gangguan sirkulasi')->row()) ? "<b>√ Tidak ada gangguan sirkulasi</b>" : "☐ Tidak ada gangguan sirkulasi";
            ?>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid black;">GCS</td>
        <td style="border: 1px solid black;">
        <?
         echo ($this->dashboard_mod->cek_triase_skala1($get_triase_skala1->no_rawat,'GCS < 9')->row()) ? "<b>√ GCS < 9</b>" : "☐ GCS < 9";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
         echo ($this->dashboard_mod->cek_triase_skala2($get_triase_skala2->no_rawat,'GCS 9 - 12')->row()) ? "<b>√ GCS 9 - 12</b>" : "☐ GCS 9 - 12";
            ?>
        </td>
        <td style="border: 1px solid black;">
             <?
             echo ($this->dashboard_mod->cek_triase_skala3($get_triase_skala3->no_rawat,'GCS > 12')->row()) ? "<b>√ GCS > 12</b>" : "☐ GCS > 12";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
         echo ($this->dashboard_mod->cek_triase_skala4($get_triase_skala4->no_rawat,'Normal GCS')->row()) ? "<b>√ Normal GCS</b>" : "☐ Normal GCS";
            ?>
        </td>
        <td style="border: 1px solid black;">
        <?
            echo ($this->dashboard_mod->cek_triase_skala5($get_triase_skala5->no_rawat,'Normal GCS')->row()) ? "<b>√ Normal GCS</b>" : "☐ Normal GCS";
            ?>
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