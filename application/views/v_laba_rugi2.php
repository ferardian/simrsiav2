<!doctype html>
<html>
    <head>
        <title>Serverside Datatables</title>
        <?php require 'includes/header_start.php'; ?>


      	<link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>



        <?php require 'includes/header_end.php'; ?>

    </head>
    <body>
      <div class="content-page">
             <!-- Start content -->
             <div class="content">
                 <div class="container-fluid">

                     <div class="row">
                         <div class="col-xl-12">
                             <div class="page-title-box">
                                 <h4 class="page-title float-left">Data Anggaran</h4>

                                 <ol class="breadcrumb float-right">
                                     <li class="breadcrumb-item"><a href="#">RSSK</a></li>
                                     <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                     <li class="breadcrumb-item active">Datatable</li>
                                 </ol>

                                 <div class="clearfix"></div>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <div class="card-box table-responsive">

                                 <br />
                                 <br />

                                  <table class="display" cellspacing="0" width="100%" id="table">
                                     <thead>
                                       <tr>
                                           <th>No</th>
                                           <th>Tanggal</th>
                                           <th>No. Reff</th>
                                           <th>Nama Acc1</th>
                                           <th>Nama Acc2</th>
                                           <th>Nama Acc3</th>
                                           <th>Debet</th>
                                           <th>Kredit</th>
                                           <th>Saldo</th>

                                       </tr>
                                     </thead>


                                     <tbody>

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

        <script src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>

        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>



        <script>
            var table;
            $(document).ready(function() {

                //datatables
                table = $('#table').DataTable({

                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('labarugi_data/get_data_user')?>",
                        "data":{ tgl:<?php echo $tgl ?>},
                        "type": "POST"
                    },


                    "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "orderable": false,
                    },
                    ],

                });

            });

        </script>
        <?php require 'includes/footer_end.php' ?>

    </body>
</html>
