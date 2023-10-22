<table width="1000">
    <tr>
        <td>
            <table>
            <tr >
   				<td width="100"><img src="<?php echo base_url() ?>assets/gambar/logo.jpg" width="100" height="100">
   			    </td>
               <td width="500" style="text-align:center;" >
               <div style="font-size:20px;text-align:center;font-weight:bold;">
                  RUMAH SAKIT IBU DAN ANAK AISYIYAH PEKAJANGAN - PEKALONGAN
                </div>
                <div style="font-size:16px;text-align:center;">
                  Jalan Raya Pekajangan No. 610, Pekalongan, 51172<br>
                  Telp. (0285) 785909 Email : rba610@gmail.com <br>
                  Website : www.rsiaaisyiyah.com <br>
                </div>
   			    </td>
                <td width="20"></td>
                <td width="400" rowspan="3" style="border:1px solid black;">
                    <table style="font-size: 14pt;">
                        <?
                            foreach ($get_resume_gabung as $data ) {?>
                                <tr>
                                    <td>No. RM</td>
                                    <td>:</td>
                                    <td><?=$data->no_rkm_medis;?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?=$data->nm_pasien;?></td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td><?=$data->umurdaftar." ".$data->sttsumur;?></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Lahir</td>
                                    <td>:</td>
                                    <td><?=date('d-m-Y',strtotime($data->tgl_lahir));?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?=$data->alamat;?></td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>:</td>
                                    <td><?=$data->no_tlp;?></td>
                                </tr>
                            <?}
                        ?>
                        
                    </table>
                </td>
   			</tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:center;" colspan="2">
                    <table>
                        <tr>
                            <td style="font-size:20pt;font-weight:bold;">RESUME MEDIS</td>
                        </tr>
                    </table>
                </td>
            </tr>
            </table>
        </td>
    </tr>
   			
           </table>