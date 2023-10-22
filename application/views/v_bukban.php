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
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <div class="row col-md-12">
                        <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 col-xl-4">
                    <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/item_bank") ?>">
                        <button type="submit" class="btn btn-primary btn-block">Kas / Bank</button>
                    </form>

                    <br>

                    <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/piutang") ?>" >
                        <button type="submit" class="btn btn-danger btn-block">Piutang</button>

                    </form>

                    <br>

                    <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/aset") ?>" >
                        <button type="submit" class="btn btn-danger btn-block">Aset</button>
                    </form>

                    <br>

                    <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/persediaan") ?>" >
                        <button type="submit" class="btn btn-danger btn-block">Persediaan</button>
                    </form>

                    <br>

                    <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/pengeluaran") ?>" >
                        <button type="submit" class="btn btn-danger btn-block">Pengeluaran</button>
                    </form>

                    <br>

                    <form class="form-horizontal" method="POST" action="<?php echo site_url("buku_bantu/penerimaan") ?>" >
                        <button type="submit" class="btn btn-danger btn-block">Penerimaan</button>
                    </form>

                </div>
                </div>
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
