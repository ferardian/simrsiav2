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
                  <h1 class="page-title float-left">CASHFLOW</h1>
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
                    <h5 class="card-title" style="color:#18a1a4;">Bank (<?php
                    echo $bulan

                  ?> - <?php echo $tahun ?>)</h5>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>

                            <th>Nama Akun 3</th>
                            <th>Debet</th>




                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total1=0;
                                $debet=0;
                                $saldo1=0;
                                $moneyFormat = new moneyFormat();

                                foreach ($kas_bank as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>

                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php  echo $moneyFormat->rupiah($r->debet); $total1+=$r->debet;?></td>


                                </tr>
                                  <?}
                             ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td align="center" colspan="2" ><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total1); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>

                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#58ae19;">Kas (<?php echo $bulan ?> - <?php echo $tahun ?>)</h5>
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px" align="center">No.</th>

                            <th>Nama Akun 3</th>
                            <th>Debet</th>



                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total2=0;
                                $debet2=0;
                                $saldo2=0;
                                $moneyFormat = new moneyFormat();

                                foreach ($kas_tunai as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>

                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php  echo $moneyFormat->rupiah($r->debet); $total2+=$r->debet;?></td>

                                </tr>
                                <?}?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td align="center" colspan="2" ><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total2); ?></b></td>
                          </tr>
                        </tfoot>
                    </table>

                    <hr style="display: block; border-width: 5px;">

                    <h5 class="card-title" style="color:#c81515;">Total Penerimaan</h5>
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
                                <td >Bank</td>
                                <td align="right"><?php echo $moneyFormat->rupiah($total1); ?></td>
                              </tr>
                                <tr>
                                  <td align="center"><?php echo 2 ?></td>
                                  <td >Kas</td>
                                  <td align="right"><?php echo $moneyFormat->rupiah($total2); $sub_total1=$total1+$total2; ?></td>
                                </tr>

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

                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead >
                        <tr>
                            <th width="20px">No.</th>
                            <th>Kode Akun</th>
                            <th>Keterangan</th>
                            <th>Debet</th>


                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $total_1=0;
                                foreach ($pengeluaran as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>

                                <td align="center"><?php echo $r->kd_acc2; ?></td>
                                <td><?php echo $r->nama_acc3; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); $total_1+=$r->debet?></td>
                              </tr>
                                <?}

                             ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td align="center" colspan="3"><b>Total</b></td>
                            <td align="right"><b><?php echo $moneyFormat->rupiah($total_1); ?></b></td>
                          </tr>
                        </tfoot>
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

                    <h4 class="card-title">KENAIKAN KAS</h4>
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
                                  <td align="right"><?php echo $moneyFormat->rupiah($total_1); $grand_total=$sub_total1-$total_1;?></td>
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
