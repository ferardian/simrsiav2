
<style>
table { 
  border-collapse:collapse; 
  }
th {
  border-top:1px solid black;
  border-bottom:1px solid black;
}
</style>
<div>
   <body style="font-family: times new roman; font-size: 12pt;">
        <table style="line-height: 15px;">
        <thead >
                <tr>
                  <th>&nbsp;&nbsp;&nbsp;</th>
                <th>No.</th>
                <th >Obat</th>
                <th >Qty</th>
                </tr>
            </thead>
        
         <tbody >
          <?php 
          $nomer=1;
          $nmr=1;
          //$nmr='';

         $tgl_sudah="";
         $jam_sudah="";
          foreach ($get_resep as $r){


          //  //$cetak = $r->tugas==$sudah? '' :$r->tugas;
          //  echo "<tr>";
          //  echo "<td><b>".$r->tgl_perawatan." ".$r->jam. "</b></td>";
          //  echo "</tr>";
          //  echo "<tr>";
          //  echo "<td>".nl2br($r->OBAT). "</br></br></td>";
          //  echo "</tr>";
          $tgl_rawat = $r->tgl_perawatan." ".$r->jam;  
          $tgl = $tgl_rawat==$tgl_sudah? '' :$tgl_rawat;
          //$jam = $r->jam==$jam_sudah? '' :$r->jam;
          $nomer = $tgl_rawat==$tgl_sudah? $nomer :$nmr;
          echo "<tr>";
          echo "<td colspan=4><b>".$tgl."</b></td>";
          echo "</tr>";
          echo "<tr>";
         echo "<td></td>";
          echo "<td>".$nomer."</td>";
          echo "<td>".$r->nama_brng."</td>";
          echo "<td>".$r->jml."</td>";
          echo "</tr>";
          
          
          $nomer++;
          $tgl_sudah = $tgl_rawat;
          //$jam_sudah = $r->jam;
          
          
          //$no++;
            
          

         }?>
        
      </tbody>

    </table>
  


</body>

</div>
