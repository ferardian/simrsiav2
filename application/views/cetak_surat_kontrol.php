<table width="1000">
    <tr>
        <td>
            <table>
            <tr >
   				<td width="300"><img src="<?php echo base_url() ?>assets/gambar/bpjslogo.png" width="400" height="68">
   			    </td>
               <td width="400" style="text-align:center;" >
               <div style="font-size:16pt;text-align:center;font-weight:bold;">
                  SURAT RENCANA KONTROL
                </div>
                <div style="font-size:16pt;text-align:center;">
                  RSIA Aisyiyah Pekajangan
                </div>
   			    </td>
               <td width="300">
               <div style="font-size:15pt;text-align:center;font-weight:bold;">
                  No. <?=$get_surat_kontrol->no_surat?>
                </div>
                <div style="font-size:14pt;text-align:center;">
                Tgl. <?=$get_surat_kontrol->tgl_rencana?>
                </div>
   			    </td>
   			</tr>
            </table>
        </td>
    </tr>
   			
           </table>
            <br>
            <br>
           <table width="100%"> 
            <tr>
                <td width="20%">Kepada Yth</td>
                <td width="50%"><?=$get_surat_kontrol->nm_dokter_bpjs?></td>
                <td> 
                <img src="<?php echo base_url(); ?>assets/Barcode.php?codetype=code128&size=50&text=<?=$get_surat_kontrol->no_surat?>" alt="" width="200px">
                </td>
            </tr>
           </table>

        <table>
            <tr>
                <td colspan="3">Mohon Pemeriksaan dan Penanganan Lebih Lanjut :</td>
            </tr>
            <tr>
                <td>No. Kartu</td>
                <td>:</td>
                <td><?=$get_surat_kontrol->no_kartu?></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><?=$get_surat_kontrol->nm_pasien." (".($get_surat_kontrol->jk=="P" ? "PEREMPUAN" : "LAKI-LAKI").")"?></td>
            </tr>
            <tr>
                <td>Tgl. Lahir</td>
                <td>:</td>
                <td><?=$get_surat_kontrol->tgl_lahir?></td>
            </tr>
            <tr>
                <td>Diagnosa Awal</td>
                <td>:</td>
                <td><?=$get_surat_kontrol->nmdiagnosaawal?></td>
            </tr>
            <tr>
                <td>Tgl. Entri</td>
                <td>:</td>
                <td><?=$get_surat_kontrol->tgl_surat?></td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Demikian Atas Bantuannya diucapkan banyak terimakasih</td>
            </tr>
        </table>
    <br>
    <br>
    <br>
        <table width="100%">
            <tr>
                <?date_default_timezone_set('Asia/Jakarta');?>
                <td style="font-size:8pt; width: 50%">Tgl. Cetak <?=date('d-m-Y',strtotime($get_surat_kontrol->tgl_surat))." ".date("H:i:s")?></td>
                <td align="center"><img src="<?=base_url('assets/'.$ttd_dokter);?>"><br><?=@$nama_dokter->nama?></td>
            </tr>
        </table>
