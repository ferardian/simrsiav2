
<table  padding="0" >
   			<tr >
   				<td width="30%" style="text-align:center;"><img src="<?php echo base_url() ?>assets/gambar/logo.jpg" width="60px" height="60px" >
   			</td>
   				<td style="text-align:center;" ><h3>Rumah Sakit Ibu dan Anak Aisyiyah Pekajangan</h3>
   					
   				</td>
   			</tr>
           </table>
   <br>
      

           <table width="100%" style="line-height: 15px;">
               <tr>
                    <td>Jl. Raya Pekajangan No. 610 </td>   
                    <td >Phone</td>
                    <td>:</td>
                    <td>(0285) 785909</td>
               </tr>
               <tr>
                    <td>Kecamatan Kedungwuni</td>
                    <td >Fax</td>
                    <td>:</td>
                    <td>(0285) 785909</td>
               </tr>
               <tr>
                    <td>Kabupaten Pekalongan</td>
                    <td >Email</td>
                    <td>:</td>
                    <td>rba610@gmail.com</td>
               </tr>
           </table>
           <hr style="margin:0em; padding:0;"> 

<table  padding="0">

          <tr>
            <td>Nama Pasien </td>
            <td width="5%">: </td>
            <td><?php  echo $get_pasien_gabung['nm_pasien'];?></td>
          </tr> 
          <tr>
            <td>No RM</td>
            <td >: </td>
            <td><?php  echo $get_pasien_gabung['no_rkm_medis'];?></td>
          </tr> 
          <tr>
            <td>No Rawat </td>
            <td >: </td>
            <td><?php  echo $get_pasien_gabung['no_rawat']." [".$get_pasien_gabung['status_lanjut']."]";?></td>
          </tr> 
          <tr>
            <td>Pembiayaan </strong></p></td>
            <td>: </td>
            <td><?php  echo $get_pasien_gabung['png_jawab'];?></td>
          </tr> 
</table>

<hr style="margin:0em; padding:0;">
<br>
<br>



       