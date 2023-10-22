<?php require 'includes/header_start.php'; ?>

    <!-- DataTables -->
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/package/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<?php require 'includes/header_end.php'; ?>

<div class="content-page">

<div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-xl-12">
              <div class="page-title-box">
                  <h1 class="page-title float-left">LABA / RUGI</h1>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>


    <div class="row">

            <!-- Column -->
        <div class="col-lg-10">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">PENERIMAAN</h4>
                    <hr style="display: block; border-width: 5px;">
                    <h5 class="card-title" style="color:#18a1a4;">Rawat Inap (<?php
                    if ($tgl == 1) {

                      echo "Januari" ;
                    } else if ($tgl == 2) {

                      echo "Februari" ;
                    } else if ($tgl == 3) {

                      echo "Maret" ;
                    } else if ($tgl == 4) {

                      echo "April" ;
                    } else if ($tgl == 5) {

                      echo "Mei" ;
                    } else if ($tgl == 6) {

                      echo "Juni" ;
                    } else if ($tgl == 7) {

                      echo "Juli" ;
                    } else if ($tgl == 8) {

                      echo "Agustus" ;
                    } else if ($tgl == 9) {

                      echo "September" ;
                    } else if ($tgl == 10) {

                      echo "Oktober" ;
                    } else if ($tgl == 11) {

                      echo "November" ;
                    } else if ($tgl == 12) {

                      echo "Desember" ;
                    }

                  ?> - <?php echo $tahun ?>)</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Nama Akun 3</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total1=0;
                                $debet=0;
                                $moneyFormat = new moneyFormat();

                                foreach ($penerimaan1 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td>PENERIMAAN</td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php

                                echo $moneyFormat->rupiah($r->tarif); $total1+=$r->tarif-$debet;

                                ?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3" ><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total1); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>
                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#58ae19;">Rawat Jalan (<?php
                    if ($tgl == 1) {

                      echo "Januari" ;
                    } else if ($tgl == 2) {

                      echo "Februari" ;
                    } else if ($tgl == 3) {

                      echo "Maret" ;
                    } else if ($tgl == 4) {

                      echo "April" ;
                    } else if ($tgl == 5) {

                      echo "Mei" ;
                    } else if ($tgl == 6) {

                      echo "Juni" ;
                    } else if ($tgl == 7) {

                      echo "Juli" ;
                    } else if ($tgl == 8) {

                      echo "Agustus" ;
                    } else if ($tgl == 9) {

                      echo "September" ;
                    } else if ($tgl == 10) {

                      echo "Oktober" ;
                    } else if ($tgl == 11) {

                      echo "November" ;
                    } else if ($tgl == 12) {

                      echo "Desember" ;
                    }

                  ?> - <?php echo $tahun ?>)</h5>
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Nama Akun 3</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total2=0;
                                $debet2=0;
                                $moneyFormat = new moneyFormat();

                                foreach ($penerimaan2 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td>PENERIMAAN</td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php

                                echo $moneyFormat->rupiah($r->tarif); $total2+=$r->tarif-$debet2;

                                ?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3" ><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total2); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>
                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#c81515;">Total</h5>
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>
                            <th>Jenis</th>
                            <th>Total</th>



                        </tr>
                        </thead>


                        <tbody>
                            <?php $sub_total1=0; ?>
                                <tr>
                                <td align="center"><?php echo 1 ?></td>
                                <td >Rawat Inap</td>
                                <td align="right"><?php echo $moneyFormat->rupiah($total1); ?></td>
                              </tr>
                                <tr>
                                  <td align="center"><?php echo 2 ?></td>
                                  <td >Rawat Jalan</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total2); $sub_total1=$total1+$total2;?></td>
                                </tr>

                                <tr>
                                  <td align="center" colspan="2"><b>Sub Total</b></td>
                                  <td align="right"><b><?php echo $moneyFormat->rupiah($sub_total1);?> </b></td>
                                </tr>




                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
            <!-- Column -->
        <div class="col-lg-10">
            <div class="card-box table-responsive">
                <div class="card-block">
                    <h4 class="card-title">PENGELUARAN</h4>
                    <hr style="display: block; border-width: 5px;">
                    <h5 class="card-title" style="color:#1599c8;">Adminstrasi & Umum</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_1=0;
                                foreach ($pengeluaran1 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_1+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_1); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>
                    <hr style="display: block; border-width: 5px;">
                    <h5 class="card-title" style="color:#c1c815;">Biaya Langsung</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_2=0;
                                foreach ($pengeluaran2 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_2+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_2); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>
                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#c84e15;">Biaya Penyusutan</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_3=0;
                                foreach ($pengeluaran3 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_3+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_3); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>

                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#3a8d20;">Biaya Pemeliharaan</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_4=0;
                                foreach ($pengeluaran4 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_4+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_4); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>


                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#206a8d;">Biaya Perlengkapan Rumah</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_5=0;
                                foreach ($pengeluaran5 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_5+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_5); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>


                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#964acd;">Biaya Diluar Usaha</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_6=0;
                                foreach ($pengeluaran6 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_6+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_6); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>


                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#d71686;">Biaya Pajak</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_7=0;
                                foreach ($pengeluaran7 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_7=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_7); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>

                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#1e22d2;">Lain - lain</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_8=0;
                                foreach ($pengeluaran8 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_8+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_8); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>

                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#a4740e;">Biaya Labu Darah</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama Akun 1</th>
                            <th>Keterangan</th>
                            <th>Kredit</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_9=0;
                                foreach ($pengeluaran9 as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_acc1; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_9=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_9); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>



                    <hr style="display: block; border-width: 5px;">
                    <h5 class="card-title" style="color:#a40e0e;">Total</h5>
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>
                            <th>Jenis</th>
                            <th>Total</th>



                        </tr>
                        </thead>


                        <tbody>
                            <?php $sub_total2=0; ?>
                                <tr>
                                <td align="center"><?php echo 1 ?></td>
                                <td >Administrasi & Umum</td>
                                <td align="right"><?php echo $moneyFormat->rupiah($total_1); ?></td>
                              </tr>
                                <tr>
                                  <td align="center"><?php echo 2 ?></td>
                                  <td >Biaya Langsung</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_2); ?></td>
                                </tr>
                              </tr>
                                <tr>
                                  <td align="center"><?php echo 3 ?></td>
                                  <td >Biaya Penyusutan</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_3); ?></td>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo 4 ?></td>
                                  <td >Biaya Pemeliharaan</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_4); ?></td>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo 5 ?></td>
                                  <td >Biaya Perlengkapan Rumah</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_5); ?></td>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo 6 ?></td>
                                  <td >Biaya Diluar Usaha</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_6); ?></td>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo 7 ?></td>
                                  <td >Biaya Pajak</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_7); ?></td>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo 8 ?></td>
                                  <td >Lain - lain</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_8); ?></td>
                                </tr>
                                <tr>
                                  <td align="center"><?php echo 9 ?></td>
                                  <td >Biaya Labu Darah</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_9); $sub_total2=$total_1+$total_2+$total_3+$total_4+$total_5+$total_6+$total_7+$total_8+$total_9;?></td>
                                </tr>

                                <tr>
                                  <td align="center" colspan="2"><b>Sub Total</b></td>
                                  <td align="right"><b><?php echo $moneyFormat->rupiah($sub_total2);?> </b></td>
                                </tr>




                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
            <!-- Column -->
        <div class="col-lg-10">
            <div class="card-box table-responsive" data-toggle="collapse">
                <div class="card-block">

                    <h4 class="card-title">LABA (RUGI)</h4>
                    <hr style="display: block; border-width: 5px;">

                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <h5 class="card-title" style="color:#a40e0e;">Total</h5>
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>
                            <th>Jenis</th>
                            <th>Total</th>



                        </tr>
                        </thead>


                        <tbody>
                            <?php $grand_total=0; ?>
                                <tr>
                                <td align="center"><?php echo 1 ?></td>
                                <td >PENERIMAAN</td>
                                <td align="right"><?php echo $moneyFormat->rupiah($sub_total1); ?></td>
                              </tr>
                                <tr>
                                  <td align="center"><?php echo 2 ?></td>
                                  <td >PENGELUARAN</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($sub_total2); $grand_total=$sub_total1-$sub_total2;?></td>
                                </tr>

                                <tr>
                                  <td align="center" colspan="2"><b>Total</b></td>
                                  <td align="right"><b><?php echo $moneyFormat->rupiah($grand_total);?> </b></td>
                                </tr>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>

<!--
<script type="text/javascript">
    var myDropzone = new Dropzone("#unggah", { url: "<?php echo site_url('import/proses') ?>"});
    Dropzone.options.myDropzone = {
      paramName: "file", // The name that will be used to transfer the file
      accept: function(file, done) {
        if (file.name == "justinbieber.jpg") {
          done("Naha, you don't.");
        }
        else { done(); }
        gj();
      }
    };
    myDropzone.on("complete", function(file) {
      // myDropzone.removeFile(file);
      gj();
    });
    function unggah() {
        $("#unggah").trigger('click')
    }
</script>
<style type="text/css">
    #unggah {
        text-align: center;
         border: 1px dashed #000;
         padding-top: 20px;
          padding-bottom: 20px;
    }
    #unggah:hover{
        background: #f5f5f5;
        cursor: pointer;
    }
</style> -->

<?php require 'includes/footer_start.php' ?>

    <!-- Required datatable js -->
    <script src="<?php echo base_url() ?>assets/package/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/buttons.print.min.js"></script>

    <!-- Key Tables -->
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.keyTable.min.js"></script>

    <!-- Responsive examples -->
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Selection table -->
    <script src="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.select.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            // Default Datatable
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,

            });

            // Key Tables

            $('#key-table').DataTable({
                keys: true
            });

            // Responsive Datatable
            $('#responsive-datatable').DataTable();

            // Multi Selection Datatable
            $('#selection-datatable').DataTable({
                select: {
                    style: 'multi'
                }
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>
    <script type="text/javascript">
        <?php if ($sukses) {
            ?>
            swal("Sukses :)", "Data berhasil di import", "success");
            <?php

        } ?>
    </script>
<?php require 'includes/footer_end.php' ?>
