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
                  <h1 class="page-title float-left"><?php echo $nama; ?></h1>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>




    <div class="row">
            <!-- Column -->
        <div class="col-lg-8">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title"></h4>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Bulan</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>


                        <tbody>
                            <?php
                                $no=1;
                                $saldo=0;
                                foreach ($record as $r){
                                  $moneyFormat = new moneyFormat();
                                ?>
                                <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $r->tanggal; ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->debet); ?></td>
                                <td align="right"><?php echo $moneyFormat->rupiah($r->kredit); ?></td>
                                <?php $saldo = $saldo + $r->debet - $r->kredit; ?>
                                <td align="right"><?php echo $moneyFormat->rupiah($saldo); ?></td>
                                <td align="center">
                                    <form class="form-horizontal" method="POST" action="<?php echo site_url("bukban_data/index")?>" target="_blank">
                                      <button type="submit" class="btn btn-danger btn-block">Detail</button>
                                      <input type="hidden" name="nama" value="<?php echo $nama;?>">
                                      <input type="hidden" name="kode" value="<?php echo $kode  ?>">
                                      <input type="hidden" name="tgl" value="<?php
                                      $tgl = substr($r->tanggal,0,-5);
                                      if ($tgl == "Januari") {
                                        $time = 1;
                                        echo $time ;
                                      } else if ($tgl == "Februari") {
                                        $time = 2;
                                        echo $time ;
                                      } else if ($tgl == "Maret") {
                                        $time = 3;
                                        echo $time ;
                                      } else if ($tgl == "April") {
                                        $time = 4;
                                        echo $time ;
                                      } else if ($tgl == "Mei") {
                                        $time = 5;
                                        echo $time ;
                                      } else if ($tgl == "Juni") {
                                        $time = 6;
                                        echo $time ;
                                      } else if ($tgl == "Juli") {
                                        $time = 7;
                                        echo $time ;
                                      } else if ($tgl == "Agustus") {
                                        $time = 8;
                                        echo $time ;
                                      } else if ($tgl == "September") {
                                        $time = 9;
                                        echo $time ;
                                      } else if ($tgl == "Oktober") {
                                        $time = 10;
                                        echo $time ;
                                      } else if ($tgl == "November") {
                                        $time = 11;
                                        echo $time ;
                                      } else if ($tgl == "Desember") {
                                        $time = 12;
                                        echo $time ;
                                      }

                                      ?>">
                                    </form>


                            </td>


                              </tr>
                                <?}

                             ?>

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
