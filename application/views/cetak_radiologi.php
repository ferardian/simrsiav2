
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
#tbcustom td {
  border-top:1px solid black;
  /* border-left:1px solid black; */
  /* border-right:1px solid black; */
  border-bottom:1px solid black;
}
</style>

   <body style="font-family: times new roman; font-size: 11pt;">
        <table id="tbcustom" autosize="1" style="line-height: 15px;width:100%; font-size:11pt;">
        
        
        <?
          
              $detail_periksa = $this->dashboard_mod->get_detail_radiologi($no_rawat,$tgl_periksa,$jam)->row();
            ?>
           
        <thead>
            <tr>
                <th align="left">Hasil Pemeriksaan : </th>
            </tr>
            <!-- <tr style="background-color: #F3F0D7;">
                <th>Pemeriksaan</th>
                <th>Hasil</th>
                <th>Satuan</th>
                <th>Nilai Rujukan</th>
                <th>Keterangan</th>
            </tr> -->
        </thead>
        <tbody>
          <tr>
            <td>
                <?
                    echo nl2br($detail_periksa->hasil);
                ?>
            </td>
          </tr>
          </tbody>
          <?
          
        ?>
      
    </table>
    <br>
    
  
    <table align="center" width="100%">
    <tr>
        <td align="center"></td>
        <td align="center">Tgl. Cetak : <?=date('d/m/Y', strtotime($tgl_periksa))." ".$jam?></td>
      </tr>
        <tr>
            <td align="center">Penanggung Jawab</td>
            <td align="center">Petugas Radiologi</td>
        </tr>
        <tr>
            <td align="center"><img src="<?=base_url('assets/'.$ttd_rad1);?>"></td>
            <td align="center"><img src="<?=base_url('assets/'.$ttd_rad2);?>"></td>
        </tr>
        <tr>
            <td align="center"><?=$nm_dokter1?></td>
            <td align="center"><?=$nama?></td>
        </tr>
    </table>
</body>
</html>