
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
          
              $detail_periksa = $this->dashboard_mod->get_detail($no_rawat,$tgl_periksa,$jam)->result();
            ?>
           
        <thead>
            <tr style="background-color: #F3F0D7;">
                <th>Pemeriksaan</th>
                <th>Hasil</th>
                <th>Satuan</th>
                <th>Nilai Rujukan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?
              foreach($detail_periksa as $dp){
                  $template = $this->dashboard_mod->get_template($dp->no_rawat,$dp->kd_jenis_prw,$dp->tgl_periksa,$dp->jam)->result();
                ?>
                  <tr>
                    <td style="font-weight:bold;"><?=$dp->nm_perawatan?></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    
                  </tr>
                  <?
                    foreach($template as $t){?>
                        <tr>
                          <td><?="&nbsp;&nbsp;&nbsp;".$t->Pemeriksaan?></td>
                          <td align="center"><?=$t->nilai?></td>
                          <td align="center" ><?=$t->satuan?></td>
                          <td align="center" ><?=$t->nilai_rujukan?></td>
                          <td align="center" ><?=$t->keterangan?></td>
                    
                        </tr>

                    <?}
                  ?>
              <?}
              
            ?>
          <!-- <tr>
            <td><br></td>
          </tr> -->
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
            <td align="center">Petugas Laboratorium</td>
        </tr>
        <tr>
            <td align="center"><img src="<?=base_url('assets/'.$ttd1);?>"></td>
            <td align="center"><img src="<?=base_url('assets/'.$ttd2);?>"></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td align="center"><?=$nama?></td>
        </tr>
    </table>
<table style="font-size:9pt">
    <tr>
        <td><b>Catatan :</b></td>
    </tr>
    <tr>
        <td>Jika ada keragu-raguan pemeriksaan,</td>
    </tr>
    <tr>
        <td>diharapkan segera menghubungi laboratorium</td>
    </tr>
</table>
</body>
</html>