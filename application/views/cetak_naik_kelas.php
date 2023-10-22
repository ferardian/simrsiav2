<table width="1000">
<?$moneyFormat = new moneyFormat();?>
            <tr >
   				<td style="text-align: center;font-size:16pt;font-weight:bold;">KUITANSI PEMBAYARAN PASIEN BPJS NAIK KELAS</td>
            </tr>
      
           </table>
           <br>
           <table>
           <tr>
                <td>No.</td>
                <td>:</td>
                <td><?=$get_pasien['nomr']?></td>
            </tr>
            <tr>
                <td>Telah diterima dari</td>
                <td>:</td>
                <td><?=$get_pasien['nm_pasien']?></td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>:</td>
                <td><?=$get_pasien['diagnosa']?></td>
            </tr>
            <tr>
                <td>Uang Sebanyak</td>
                <td>:</td>
                <td>Rp. <?=$moneyFormat->rupiah($get_pasien['tarif_akhir'])?></td>
            </tr>
            <tr >
                <td style="vertical-align: top;">Guna Membayar</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;" >Biaya perawatan ranap inap a.n <?=$get_pasien['nm_pasien']?><br>
                    dirawat dari tanggal <i><?=$get_pasien['tgl_masuk']?></i> s/d <i><?=$get_pasien['tgl_keluar']?></i><br>
                    dengan rincian :     
            </td>
            </tr>
           </table>

           <table>
            <tr>
                <td><ul><li>Biaya perawatan (hak peserta BPJS di Kelas <?=$get_pasien['klsrawat']?>) </li></ul></td>
                <td></td>
                <td align="right">Rp. <?=$moneyFormat->rupiah($get_pasien['tarif_2'] == $get_pasien['tarif_1'] ? $get_pasien['tarif_2'] : $get_pasien['tarif_1'])?></td>
            </tr>
            <tr>
                <td><ul><li>Biaya perawatan di RSIA Aisyiyah Pekajangan (Naik <?=$get_pasien['kelas']?>) </li></ul></td>
               
            </tr>
            <tr>
                
            <?
                    if ($get_pasien['presentase']) {?>
                        <td align="right"><?=$moneyFormat->rupiah($get_pasien['tarif_1'])." - ".$moneyFormat->rupiah($get_pasien['tarif_2'])." + (".$moneyFormat->rupiah($get_pasien['tarif_2'] == $get_pasien['tarif_1'] ? $get_pasien['tarif_2'] : $get_pasien['tarif_1'])." x ".$get_pasien['presentase']." %) = "?></td>                    
                        <td></td>
                        <td align="right">Rp. <?=$moneyFormat->rupiah($get_pasien['tarif_akhir'])?></td>                    
                        <?} else {?>
                        <td align="right"><?=$moneyFormat->rupiah($get_pasien['tarif_1'])." - ".$moneyFormat->rupiah($get_pasien['tarif_2'])." = "?></td>
                        <td></td>
                        <td align="right">Rp. <?=$moneyFormat->rupiah($get_pasien['tarif_akhir'])?></td>
                    <?}
                ?>
            </tr>
            <tr>
                
                <td>Terbilang : <?=$moneyFormat->terbilang($get_pasien['tarif_akhir'])?></td>
            </tr>
           </table>
           <br>
           <br>
        
           <table width="1000" style="text-align: center;font-size:16pt;">
            <tr>
                <td></td>
                <td>Pekajangan, <?=date('d-m-Y')?></td>
            </tr>
            <tr>
                <td>Keluarga Pasien</td>
                <td>Kasir</td>
            </tr>
            <tr>
                <td><br><br><br><br><br></td>
                <td></td>
            </tr>
            <tr>
                <td>(................................)</td>
                <td>(................................)</td>
            </tr>
           </table>