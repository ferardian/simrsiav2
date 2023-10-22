<?php require 'includes/header_start.php'; ?>

    <!-- DataTables -->
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="<?php echo base_url() ?>assets/panel/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<?php require 'includes/header_end.php'; ?>

 <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Adjustment Jurnal</h4>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box table-responsive">
                          <div class="col-lg-12">
                            <a href="<?php echo base_url();?>adjustment/tambah_data" class="btn btn-success btn-sm"><i class='fa fa-plus-circle'></i> Tambah Data</a>
                          </div>
                            <br />
                            <br />
                            <?php echo $this->session->flashdata('save_data');?>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th width="20px">No.</th>
                                    <th>Tanggal</th>
                                    <th>Nama Akun 1</th>
                                    <th>Nama Akun 2</th>
                                    <th>Nama Akun 3</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                        $no=1;
                                        foreach ($record as $r){
                                          $moneyFormat = new moneyFormat();
                                        ?>
                                        <tr>
                                        <td align="center"><?php echo $no++; ?></td>
                                        <td><?php echo $r->tanggal; ?></td>
                                        <td><?php echo $r->nama_acc1; ?></td>
                                        <td><?php echo $r->nama_acc2; ?></td>
                                        <td><?php echo $r->nama_acc3; ?></td>
                                        <td><?php echo $moneyFormat->rupiah($r->debet); ?></td>
                                        <td><?php echo $moneyFormat->rupiah($r->kredit); ?></td>

                                        <td class="text-center"><a href="<?=base_url('adjustment/edit_data')?>/<?=$r->id?>"><button class="btn btn-success bg-blue btn-circle"><i class="fa fa-edit"></i></button></a></td>
                                        <td class="text-center"><a onclick="return confirm('Yakin ingin menghapus artikel ini..?')" href="<?=base_url('adjustment/hapus_data')?>/<?=$r->id?>"><button class="btn btn-danger bg-red btn-circle"><i class="fa fa-trash-o"></i></button></a></td>
                                        <!-- <td style="display: none;"></td>
                                    <td style="display: none;"></td> -->
                                      </tr>
                                        <?}

                                     ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                </div> <!-- container -->

        </div> <!-- content -->



    </div>

<?php require 'includes/footer_start.php' ?>

    <!-- Required datatable js -->
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

<?php require 'includes/footer_end.php' ?>
