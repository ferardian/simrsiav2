<table autosize="1" padding="0" >
   			<tr >
   				<td rowspan="4" width="10%" style="text-align:center;"><img src="<?php echo base_url() ?>assets/gambar/logo.jpg" width="70px" height="70px" >
   			</td>
   				<td style="text-align:center;" ><h3>Rumah Sakit Ibu dan Anak Aisyiyah Pekajangan</h3>
   					
   				</td>
   			</tr>
               <tr >
                   <td align="center">JL. RAYA PEKAJANGAN NO.610 PEKALONGAN</td>
                   
               </tr>
               <tr>
                   <td align="center">(0285) 785909</td>
                   
               </tr>
               <tr>
                   <td align="center">Email : rba610@gmail.com</td>
                   
               </tr>
           </table>
           <hr style="margin-bottom:1px; padding:0;"> 
           <br>
           <hr style="margin:0em; padding:0; border-top:10px solid black !important;"> 
           <br>

<table autosize="1" width="100%" style="margin-top:10px;">
    <tr>
        <td width="10%"></td>
        <td style="text-align:center; font-weight:bold;">HASIL PEMERIKSAAN RADIOLOGI</td>
    </tr>
</table>
<br>

    <table style="font-size:11pt">
        <tr>
            <td>
            <table >
                <tr>
                    <td>No. RM</td>
                    <td>:</td>
                    <td><?=$no_rkm_medis?></td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td><?=$nm_pasien?></td>
                </tr>
                <tr>
                    <td>JK / Umur</td>
                    <td>:</td>
                    <td><?=$jk." / ".$umurdaftar." $sttsumur"?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?=$alamat?></td>
                </tr>
                <tr>
                    <td>No. Periksa</td>
                    <td>:</td>
                    <td><?=$no_rawat?></td>
                </tr>
                <tr>
                    <td><?=@$ruang?></td>
                    <td>:</td>
                    <td><?=@$nama_ruang?></td>
                </tr>
                <tr>
                    <td>Jenis Pemeriksaan</td>
                    <td>:</td>
                    <td><?=$nama_perawatan?></td>
                </tr>
            </table>
            </td>
            <td>
            <table >
            <tr>
                    <td>Dokter Radiologi</td>
                    <td>:</td>
                    <td><?=$nm_dokter1?></td>
                </tr>
                <tr>
                    <td>Dokter Perujuk</td>
                    <td>:</td>
                    <td><?=$nm_dokter2?></td>
                </tr>
                <tr>
                    <td>Tgl. Pemeriksaan</td>
                    <td>:</td>
                    <td><?=date('d-m-Y',strtotime($tgl_periksa))?></td>
                </tr>
                <tr>
                    <td>Jam Pemeriksaan</td>
                    <td>:</td>
                    <td><?=$jam?></td>
                </tr>
               
                
            </table>
            </td>
        </tr>
    </table>
    <br>


