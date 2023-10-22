
<?php require 'includes/header_start.php'; ?>



<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-timepicker-addon.css">
<?php require 'includes/header_end.php'; ?>
<!-- jQuery -->
<link rel="icon" type="image/ico" href="http://techarise.com/wp-content/themes/webhaunt/images/favicon.ico">
</head>
<body class="page-template-default page page-id-116 logged-in admin-bar  customize-support" cz-shortcut-listen="true">

  <div class="content-page">
         <!-- Start content -->
         <div class="content">
             <div class="container-fluid">

  <div class="row">
      <div class="col-xl-12">
          <div class="page-title-box">
              <h4 class="page-title float-left">LABA / RUGI</h4>

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

            <div class="col-lg-2">
                <div class="form-group">
                    <input type="text" name="nama_acc1" value="" class="form-control" id="filter-nama-acc1" placeholder="Nama Acc 1">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                     <input type="text" name="nama_acc2" value="" class="form-control" id="filter-nama-acc2" placeholder="Nama Acc 2">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                     <input type="text" name="nama_acc3" value="" class="form-control" id="filter-nama-acc3" placeholder="Nama Acc 3">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="text" name="tanggal" value="" class="form-control getDatePicker" id="order-tanggal" placeholder="Tanggal">
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <button name="filter_order_filter" type="button" class="btn btn-primary btn-block" id="filter-order-filter" value="filter"><i class="fa fa-search fa-fw"></i></button>
                </div>
            </div>
            <div class="col-lg-12">
              <div class="card-box ">
                <div class="card-block ">
        <div class="row">
            <div class="col-lg-12">
              <div id="render-list-of-order">
              </div>
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
<script>var baseurl = "<?php echo site_url(); ?>";</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script>
// render order list data table
// default render page
jQuery(document).ready(function() {
    var data = {nama_acc1:"", nama_acc2:"",nama_acc3:"", tanggal: ""};
    generateOrderTable(data);
});

// render date datewise
jQuery(document).on('click','#filter-order-filter', function(){
    var nama_acc1 = jQuery('input#filter-nama-acc1').val();
    var nama_acc2 = jQuery('input#filter-nama-acc2').val();
    var nama_acc3 = jQuery('input#filter-nama-acc3').val();
    var tanggal = jQuery('input#order-tanggal').val();

    var data = {nama_acc1:nama_acc1, nama_acc2:nama_acc2, nama_acc3:nama_acc3, tanggal:tanggal};
    generateOrderTable(data);
});
// generate Order Table
function generateOrderTable(element){
    jQuery.ajax({

        url: baseurl + 'labarugi_data/getDataList' ,
        data: {'nama_acc1' : element.nama_acc1 , 'nama_acc2' : element.nama_acc2 , 'nama_acc3' : element.nama_acc3 , 'tanggal' : element.tanggal, tgl:<?php echo $tgl ?> },
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
            jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
        },
        success: function (html) {
            var dataTable='<table id="order-datatable" class="table table-striped" cellspacing="0" width="100%"></table>';
            jQuery('#render-list-of-order').html(dataTable);
            var table = $('#order-datatable').DataTable({
                data: html.data,
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": true,
                columns: [
                    { title: "No", "width": "5%"},
                    { title: "Tanggal", "width": "16%"},
                    { title: "No. Reff", "width": "17%"},
                    { title: "Nama Acc 1", "width": "17%"},
                    { title: "Nama Acc 2", "width": "15%"},
                    { title: "Nama Acc 3", "width": "15%"},
                    { title: "Keterangan", "width": "15%"},
                    { title: "Debet", "width": "15%"},
                    { title: "Kredit", "width": "15%"},
                    { title: "Saldo", "width": "15%"}
                ],
            });
        }
    });
}

// get DatePicker
jQuery(document).on('focus', '.getDatePicker', function () {
    jQuery(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: "1940:2050"
    });
});


</script>
<?php require 'includes/footer_end.php' ?>
