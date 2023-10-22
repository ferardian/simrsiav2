<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<br>

<table autosize="1" style="border: 1px solid black;font-size:10pt;width:100%;">
<?
$get_detail_operasi = $this->dashboard_mod->get_detail_laporan_operasi($no_rawat,$tgl_operasi,$tgl_selesai)->result();
    foreach ($get_detail_operasi as $data) {?>
        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Dokter Ahli Bedah : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->dokter_operator1?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
            <td style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Asisten : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->asisten_op1?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
            <td style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Perawat : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->asisten_op2?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Dokter Ahli Anestesi : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->anestesi1?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Jenis Anestesi : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->jenis_anestesi?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>   
        </tr>

        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Diagnosa Pre Operatif : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td align="center"><?=$data->diagnosa_preop?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Diagnosa Post Operatif : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->diagnosa_postop?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Jumlah darah masuk transfusi : </td>
                        <td><?=$data->darah_masuk?></td>
                    </tr>
                    <tr>
                        <td>Jumlah darah yang hilang : </td>
                        <td><?=$data->darah_hilang?></td>
                    </tr>
                    <br>
                    <br>
                  
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
            <table>
                    <tr>
                        <td>Komplikasi :</td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->komplikasi?></td>
                    </tr>
                    <br>
                    <br>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Jaringan yang di-Eksis/insisi :</td>
                        
                    </tr>
                    <tr>
                        <td><?=$data->jaringan_insisi;?></td>
                        
                    </tr>
                   
                  
                </table>
            </td>
            <td colspan="2" style="border: 1px solid black;">
                <table >
                    <tr>
                        
                        <td>Pemeriksaan PA :</td>
                    </tr>
                    <tr>
                        
                        <td><?=$data->pemeriksaan_pa;?></td>
                    </tr>
                   
                  
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Tanggal Operasi :</td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=date('d-m-Y',strtotime($data->tgl_operasi));?></td>
                    </tr>
                  
                </table>
            </td>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Jam Operasi dimulai :</td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                    <td><?=date('H:i:s',strtotime($data->tgl_operasi));?></td>

                    </tr>
                  
                </table>
            </td>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Jam Operasi selesai :</td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                    <td><?=date('H:i:s',strtotime($data->tgl_selesai));?></td>
                    </tr>
                  
                </table>
            </td>
            <td style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Lama Operasi :</td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><??></td>
                    </tr>
                  
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border: 1px solid black;">
                <table >
                    <tr>
                        <td>Nama/ Macam Operasi : </td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=$data->nm_perawatan;?></td>
                    </tr>
                  
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border: 1px solid black;">
                <table width="100%">
                    <tr>
                        <td>Laporan Jalannya Operasi :</td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><?=nl2br($data->laporan_operasi);?></td>
                    </tr>
                    <tr>
                        <td align="right">
                            <table>
                                <tr>
                                    <td align="center"><img src="<?=base_url('assets/'.@$ttd_dokter);?>"></td>
                                </tr>
                                <tr>
                                    <td align="center"><?=$data->dokter_operator1?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                  
                </table>
            </td>
        </tr>
    <?}
?>
</table>