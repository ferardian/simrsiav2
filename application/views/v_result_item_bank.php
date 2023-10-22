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
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0"></h3>
            </div>
        </div>



    <div class="row">
            <!-- Column -->
        <div class="col-lg-8">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title"> </h4>

                    <div class="row col-md-12">
                        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col-xl-8">
                          <?php $nilai=0; ?>
                          <?php foreach ($record as $r) {
                            ?>
                            <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/item_kas_bank") ?>" target="_blank">
                                <button type="submit" class="
                                <?php
                                if ($nilai%2 == 0) {?>
                                  btn btn-primary btn-block
                                <?} else {?>
                                  btn btn-warning btn-block
                                <?}

                                 ?>

                                "><?php echo $r->nama_acc3 ?></button>
                                <input type="hidden" name="kd_acc3" value="<?php echo $r->kd_acc3 ?>">
                                <input type="hidden" name="nama_acc3" value="<?php echo $r->nama_acc3 ?>">
                                <?php $nama=$r->nama_acc3; ?>
                            </form>

                            <br>
                        <?  $nilai++; } ?>




                </div>
                </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>



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
