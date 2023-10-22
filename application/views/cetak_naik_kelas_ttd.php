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
                <td><?=$get_pasien_naik_kelas['nomr']?></td>
            </tr>
            <tr>
                <td>Telah diterima dari</td>
                <td>:</td>
                <td><?=$get_pasien_naik_kelas['nm_pasien']?></td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>:</td>
                <td><?=$get_pasien_naik_kelas['diagnosa']?></td>
            </tr>
            <tr>
                <td>Uang Sebanyak</td>
                <td>:</td>
                <td>Rp. <?=$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_akhir'])?></td>
            </tr>
            <tr >
                <td style="vertical-align: top;">Guna Membayar</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;" >Biaya perawatan ranap inap a.n <?=$get_pasien_naik_kelas['nm_pasien']?><br>
                    dirawat dari tanggal <i><?=$get_pasien_naik_kelas['tgl_masuk']?></i> s/d <i><?=$get_pasien_naik_kelas['tgl_keluar']?></i><br>
                    dengan rincian :     
            </td>
            </tr>
           </table>

           <table>
            <tr>
                <td><ul><li>Biaya perawatan (hak peserta BPJS di Kelas <?=$get_pasien_naik_kelas['klsrawat']?>) </li></ul></td>
                <td></td>
                <td align="right">Rp. <?=$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_2'] == $get_pasien_naik_kelas['tarif_2'] ? $get_pasien_naik_kelas['tarif_2'] : $get_pasien_naik_kelas['tarif_1'])?></td>
            </tr>
            <tr>
                <td><ul><li>Biaya perawatan di RSIA Aisyiyah Pekajangan (Naik <?=$get_pasien_naik_kelas['kelas']?>) </li></ul></td>
               
            </tr>
            <tr>
                
            <?
                    if ($get_pasien_naik_kelas['presentase']) {?>
                        <td align="right"><?=$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_1'])." - ".$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_2'])." + (".$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_1'] == $get_pasien_naik_kelas['tarif_2'] ? $get_pasien_naik_kelas['tarif_2'] : $get_pasien_naik_kelas['tarif_1'])." x ".$get_pasien_naik_kelas['presentase']." %) = "?></td>                    
                        <td></td>
                        <td align="right">Rp. <?=$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_akhir'])?></td>                    
                        <?} else {?>
                        <td align="right"><?=$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_1'])." - ".$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_2'])." = "?></td>
                        <td></td>
                        <td align="right">Rp. <?=$moneyFormat->rupiah($get_pasien_naik_kelas['tarif_akhir'])?></td>
                    <?}
                ?>
            </tr>
            <tr>
                
                <td>Terbilang : <?=$moneyFormat->terbilang($get_pasien_naik_kelas['tarif_akhir'])?></td>
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
                <td></td>
                <td></td>
            </tr>
            <tr>
            <td><div style="align-items: center;"><img src="http://192.168.100.31/rsiap/file/verif_sep/<?=@$get_ttd_sep->verifikasi?>" width="20%" ></div></td>
                <td align="center"><img src="<?=base_url('assets/'.$ttd_kasir2);?>"></td>
            </tr>
            <tr>
            <td align="center"></td>
            <td align="center"><?=$nama2?></td>
            
        </tr>
           </table>