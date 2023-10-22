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
                <h3 class="text-themecolor m-b-0 m-t-0"><?php
                //$data=0;
                      if ($no==1) {
                        echo "Import data TXT PENJUALAN";

                      } else {
                        echo "Import data TXT JURNAL";

                      }

                  ?></h3>
            </div>
        </div>



    <div class="row">
            <!-- Column -->
        <div class="col-lg-10">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title"> </h4>
                    <!-- <div class="col-md-12 " id="unggah">
                       <h1 onclick="unggah()" >Upload disini</h1>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">


                          <?php
                          if ($no==1){?>
                            <form class="form-horizontal" method="POST" action="<?php echo site_url("import/proses1");?>">
                              <fieldset class="form-group">
                                <textarea name="data" class="form-control" placeholder="Paste kan data yang telah dicopy dari file .txt" ></textarea>
                              </fieldset>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            <?} else  {?>
                              <form class="form-horizontal" method="POST" action="<?php echo site_url("import/proses2");?>">
                                <fieldset class="form-group">
                                  <textarea name="data" class="form-control" placeholder="Paste kan data yang telah dicopy dari file .txt" ></textarea>
                                </fieldset>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </form>
                          <?  } ?>


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
