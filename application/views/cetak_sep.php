
<style>
table { 
  border-collapse:collapse; 
  }
th {
  border-top:1px solid black;
  /* border-left:1px solid black; */
  /* border-right:1px solid black; */
  border-bottom:1px solid black;
}
  .tb,.tb th, .tb td {
    /* width: 100%; */
    border: 1px solid black !important;
    border-collapse: collapse;
    height: 40px;
    padding-left: 10px;
    padding-top: 10px;
    vertical-align: top;
  }
#tbcustom td {
  border-top:1px solid black;
  /* border-left:1px solid black; */
  /* border-right:1px solid black; */
  border-bottom:1px solid black;
}
</style>
<body style="font-family: times new roman; font-size: 11pt;">
<table  autosize="1" style="line-height: 15px;width:100%; font-size:11pt;">
    
        <tr>
            <?
            foreach ($get_sep as $dt ) {?>
                <td>
                <table>
                <tr>
                    <td>No.SEP</td>
                    <td>:</td>
                    <td><?=$dt->no_sep?></td>
                </tr>
                <tr>
                    <td>Tgl.SEP</td>
                    <td>:</td>
                    <td><?=$dt->tglsep?></td>
                </tr>
                <tr>
                    <td>No.Kartu</td>
                    <td>:</td>
                    <td><?=$dt->no_kartu." ( MR : ".$dt->no_rkm_medis." )"?></td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td>:</td>
                    <td><?=$dt->nm_pasien?></td>
                </tr>
                <tr>
                    <td>Tgl. Lahir</td>
                    <td>:</td>
                    <td><?=$dt->tgl_lahir?></td>
                </tr>
                <tr>
                    <td>No. Telpon</td>
                    <td>:</td>
                    <td><?=$dt->notelep?></td>
                </tr>
                <tr>
                    <td>Sub/Spesialis</td>
                    <td>:</td>
                    <td><?=$dt->nmpolitujuan?></td>
                </tr>
                <tr>
                    <td>Dokter</td>
                    <td>:</td>
                    <td><?=$dt->nmdpdjp?></td>
                </tr>
                <tr>
                    <td>Faskes Perujuk</td>
                    <td>:</td>
                    <td><?=$dt->nmppkrujukan?></td>
                </tr>
                <?
                  if($dt->jnspelayanan=="2"){?>
                <tr>
                    <td>No. Rujukan</td>
                    <td>:</td>
                  <td><?=$dt->no_rujukan?></td>
                </tr>
                  <?}
                ?>
                <tr>
                    <td>Diagnosa Awal</td>
                    <td>:</td>
                    <td><?=$dt->nmdiagnosaawal?></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
              
            </table>
              
            </td>
                <td>
                <table>
                  <tr>
                    <td colspan="3">
                    <img src="<?php echo base_url(); ?>assets/Barcode.php?codetype=code128&size=50&text=<?=$dt->no_sep?>" alt="" width="200px">
                    </td>
                  </tr>
                <tr>
                    <td>No.Rawat</td>
                    <td>:</td>
                    <td><?=$dt->no_rawat?></td>
                </tr>
                <tr>
                    <td>No. Reg</td>
                    <td>:</td>
                    <td><?=$dt->no_reg?></td>
                </tr>
                <tr>
                    <td>Peserta</td>
                    <td>:</td>
                    <td><?=$dt->peserta?></td>
                </tr>
                <tr>
                    <td>Jns. Rawat</td>
                    <td>:</td>
                    <td><?=$dt->jnspelayanan=="1" ? "Rawat Inap" : "Rawat Jalan" ?></td>
                </tr>
                <tr>
                    <td>Jns. Kunjungan</td>
                    <td>:</td>
                    <td><?=$dt->tujuankunjungan == 0 ? "Konsultasi Dokter (pertama)" : "Kunjungan Kontrol(ulangan)" ?></td>
                </tr>
                <tr>
                  <td><br></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                    <td>Poli Perujuk</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Kls. Hak</td>
                    <td>:</td>
                    <td><?="Kelas ".$dt->klsrawat?></td>
                </tr>
                <tr>
                    <td>Kls. Rawat</td>
                    <td>:</td>
                    <td><?
                    if($dt->klsnaik == "1") {
                      echo "VVIP";
                    } else if($dt->klsnaik == "2"){
                      echo "VIP";
                    } else if ($dt->klsnaik == "3") {
                      echo "Kelas 1";
                    } else if ($dt->klsnaik == "4"){
                      echo "Kelas 2";
                    } else if ($dt->klsnaik == "5") {
                      echo "Kelas 3";
                    } else if ($dt->klsnaik == "8") {
                      echo "Diatas Kelas 1";
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>Penjamin</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
              
            </td>
            <?}
        ?>
        </tr>
       
    
    </table>
    <table autosize="1" style="line-height: 15px;width:100%; font-size:11pt;">
        <tr>
            <td>
                <table width="60%">
                <tr>
                <? date_default_timezone_set('Asia/Jakarta'); ?>
                <td style="font-size:8pt; font-style: italic;">* Saya menyetujui BPJS Kesehatan menggunakan infomasi medis pasien jika diperlukan. <br> * SEP Bukan sebagai bukti penjaminan peserta. <br> ** Dengan tampilnya luaran SEP elektronik ini merupakan hasil validasi terhadap eligibilitas Pasien secara elektronik
 (validasi finger print atau biometrik / sistem validasi lain)
 dan selanjutnya Pasien dapat mengakses pelayanan kesehatan rujukan sesuai ketentuan berlaku.
 Kebenaran dan keaslian atas informasi data Pasien menjadi tanggung jawab penuh FKRTL <br><br> Cetakan ke-1 <?= date('d-m-Y',strtotime($dt->tglsep))." ".date('H:i:s')?></td>
                 </tr>
                </table>
            </td>
               
        </tr>
        </table>  
        <br>
        <br>
        <br>
    <table>
      <tr>
        <td width="1000" align="center">
          <div style="font-size:28px;text-align:center;font-weight:bold;">
            FORMULIR VERIFIKASI BPJS
          </div>
          <div style="font-size:21px;text-align:center; text-transform: uppercase;">
            RSIA ASIYIYAH PEKAJANGAN
          </div>
        </td>
      </tr>
    </table>
    <br>
    <table class="tb">
 
      <tr>
        <td colspan="2">DIISI DIAGNOSA DAN TINDAKAN DENGAN LENGKAP JELAS DAN TERBACA </td>
        <td align="center">KODE</td>
      </tr>
      <tr>
        <td style="width: 30%;">DIAGNOSA UTAMA</td>
        <td style="width: 50%"><?=@$get_diagnosa_primer->nm_penyakit?></td>
        <td><?=@$get_diagnosa_primer->kd_penyakit?></td>
        
      </tr>
      <tr>
        <?
            if ($get_diagnosa_sekunder) {?>
                <td rowspan="<?=count($get_diagnosa_sekunder)+1?>">DIAGNOSA SEKUNDER</td>
            <?} else {?>
                <td rowspan="2">DIAGNOSA SEKUNDER</td>      
            <?}
        ?>
      </tr>
      <?

      if ($get_diagnosa_sekunder) {
        $no=1;
        foreach ($get_diagnosa_sekunder as $diagnosa ) {?>
            <tr>
                <td><?=$no.". ".$diagnosa->nm_penyakit;?></td>
                <td><?=$diagnosa->kd_penyakit;?></td>
            </tr>
        <?
        $no++;    
    }
      } else {?>
        <tr>
        <td>-</td>
        <td>-</td>
        </tr>
      <?}
        
      ?>
      

      <tr>
        <td rowspan="5">TINDAKAN / OPERASI</td>
      </tr>
      <?
      if ($get_prosedur) {
        $no=1;
        foreach ($get_prosedur as $prosedur ) {?>
            <tr>
                <td><?=$no.". ".$prosedur->deskripsi_panjang;?></td>
                <td><?=$prosedur->kode;?></td>
            </tr>
        <?
        $no++;    
      }
       
    } else {?>
<tr>
  <td>-</td>
  <td>-</td>
</tr>
    <?}
      ?>
    </table>
    <table>
      <tr>
        <td>CATATAN :</td>
      </tr>
      <tr>
        <td>
          &#x25A2; Rujukan Terlampir
        </td>
      </tr>
    </table>
    <br>
    <table width="100%">
      <tr>
        <td align="center" width="50%">Pasien,</td>
        <td></td>
        <td align="center" width="50%">Dokter,</td>
      </tr>
      <tr>
        <td align="center"><div style="align-items: center;"><img src="<?=base_url('assets/'.@$ttd_pasien);?>"></div></td>
        <td></td>
        <td align="center"><img src="<?=base_url('assets/'.$ttd_dokter);?>"></td>
      </tr>
      <tr>
        <td align="center"><?=ucwords(strtolower(@$nama_pasien->nm_pasien))?></td>
        <td></td>
        <td align="center"><?=@$nama_dokter->nama?></td>
      </tr>      
    </table>
</body>
</html>