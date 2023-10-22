<style>


</style>

<body >

<table width="100%" style="font-family: times new roman; font-size: 10pt; text-align:left;">
    <tr>
        <td style="border:1px solid black;" colspan="7">
            <table>
            <tr >
   				<td ><img src="<?php echo base_url() ?>assets/gambar/logo.jpg" width="100" height="100">
   			    </td>
               <td style="text-align:left;" >
               <div style="font-size:14px;text-align:left;font-weight:bold;">
                  RUMAH SAKIT IBU DAN ANAK AISYIYAH PEKAJANGAN - PEKALONGAN
                </div>
                <div style="font-size:14px;text-align:center;">
                  Jalan Raya Pekajangan No. 610, Pekalongan, 51172<br>
                  Telp. (0285) 785909 Email : rba610@gmail.com <br>
                  Website : www.rsiaaisyiyah.com <br>
                </div>
   			    </td>
   			</tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="border:1px solid black;" colspan="7">
    <br>
    <br>
        </td>
    </tr>
    <tr >
        <td style="border:1px solid black; font-size:16pt;" colspan="4">NOMOR REKAM MEDIS</td>
        <td style="border:1px solid black; font-size:16pt;" colspan="3"><b><?=$get_pasien['no_rkm_medis']?></b></td>
    </tr>
    <tr style="border:1px solid black;">
        <td width="100px" >NAMA PASIEN</td>
        <td width="10px">:</td>
        <td width="170px"><?=$get_pasien['nm_pasien']?></td>
        <td></td>
        <td>NAMA IBU</td>
        <td>:</td>
        <td><?=$get_pasien['nm_ibu']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>No. Identitas</td>
        <td>:</td>
        <td><?=$get_pasien['no_ktp']?></td>
        <td></td>
        <td>Umur</td>
        <td>:</td>
        <td><?=$get_pasien['umur']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>Agama</td>
        <td>:</td>
        <td><?=$get_pasien['agama']?></td>
        <td></td>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td><?=$get_pasien['tgl_lahir']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>Status</td>
        <td>:</td>
        <td><?=$get_pasien['stts']?></td>
        <td></td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?=$get_pasien['jk']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?=$get_pasien['pekerjaan']?></td>
        <td></td>
        <td>Pendidikan</td>
        <td>:</td>
        <td><?=$get_pasien['pnd']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td >Alamat</td>
        <td>:</td>
        <td colspan="5"><?=$get_pasien['alamat']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>Nama Keluarga</td>
        <td>:</td>
        <td><?=$get_pasien['pekerjaan']?></td>
        <td></td>
        <td>Hubungan Keluarga</td>
        <td>:</td>
        <td><?=$get_pasien['pnd']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td style="border:1px solid black;"  rowspan="3">Bila Ada Sesuatu Menghubungi</td>
        <td >Nama</td>
        <td>:</td>
        <td colspan="4" style="text-align:left;"><?=$get_pasien['nm_pasien']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>Alamat</td>
        <td>:</td>
        <td colspan="4"><?=$get_pasien['alamat']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td>No. Telp</td>
        <td>:</td>
        <td colspan="4" style="text-align:left;"><?=$get_pasien['no_tlp']?></td>
    </tr>
    <tr style="border:1px solid black;">
        <td colspan="7">
            <br>
        </td>
    </tr>
   			
           </table>