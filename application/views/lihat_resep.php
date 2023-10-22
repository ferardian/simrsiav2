<style>
table { 
  border-collapse:collapse; 
  }
th {
  border-top:1px solid black;
  border-bottom:1px solid black;
}
</style>
<div class="content-page">
    <!-- Start content -->
    <div class="content" style="margin-top: 0;">
        <div class="container-fluid">
<div class="row">
                <div class="col-xs-12 col-lg-12 col-xl-12">
                    <div class="card-box">

<!-- Main content -->

  <div class="row">
    <div class="col-md-12">
      <!-- /.box -->

      <div class="box">
        
       <div class="box-body">
       <table  padding="0" >
   			<tr >
   				<td width="30%" style="text-align:center;"><img src="<?php echo base_url() ?>assets/gambar/logo.jpg" width="60px" height="60px" >
   			</td>
   				<td style="text-align:center;" ><h3>Rumah Sakit Ibu dan Anak Aisyiyah Pekajangan</h3>
   					
   				</td>
   			</tr>
           </table>
      <hr>
        <table width=>
          <tr>
            <td><p><strong>Nama Pasien </strong></p></td>
            <td width="5%"><p><strong>: </strong></p></td>
            <td><p><strong><?php  echo $get_pasien['nm_pasien'];?></strong></p></td>
          </tr> 
          <tr>
            <td><p><strong>No RM </strong></p></td>
            <td ><p><strong>: </strong></p></td>
            <td><p><strong><?php  echo $get_pasien['no_rkm_medis'];?></strong></p></td>
          </tr> 
          <tr>
            <td><p><strong>No Rawat </strong></p></td>
            <td ><p><strong>: </strong></p></td>
            <td><p><strong><?php  echo $get_pasien['no_rawat']." [".$get_pasien['status_lanjut']."]";?></strong></p></td>
          </tr> 
          <tr>
            <td><p><strong>Pembiayaan </strong></p></td>
            <td><p><strong>: </strong></p></td>
            <td><p><strong><?php  echo $get_pasien['png_jawab'];?></strong></p></td>
          </tr> 
        </table>
        <hr style="margin:0em; padding:0;">
<br>

        <table width="100%" style="line-height: 15px;">
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
          $tgl_rawat = date('d-m-Y',strtotime($r->tgl_perawatan));  
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
  </div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
<!-- /.content -->
<!-- /.content-wrapper -->

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>


