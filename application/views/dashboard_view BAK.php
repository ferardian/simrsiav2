<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/panel/plugins/morris/morris.css">
<link href="<?php echo base_url(); ?>assets/panel/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/panel/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/panel/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<?php require 'includes/header_end.php'; ?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard</h4>

                        

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xs-12 col-lg-12 col-xl-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-20">Resep Obat</h4>
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col-xl-8">
                                <form  class="resep" action="<?php echo base_url('dashboard/cetak_resep');?>" enctype="multipart/form-data" method="POST">
                                  <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <div class="input-group">
                                      <input onchange="getrawat()" type="text" class="tanggal form-control" name="tanggal"  id="datepicker" autocomplete="off">
                                      <div class="input-group-append">
                                          <span class="input-group-text"><i class="icon-calender"></i></span>
                                      </div>
                                      </div>
                                  </fieldset>

                        <fieldset class="form-group">
                            <label>No. Rawat</label>
                            <select name="no_rawat" class="set_no_rawat form-control select2" style="width: 100%;">
                                <option value='0' disable>Pilih No Rawat</option>
                            </select>
                              <!-- <input type="text" class="form-control" id="inputku" name="no_rawat"  autocomplete="off"> -->
                              
                        </fieldset>

                       
                    <button type="submit" name="submit" class="btn btn-primary" formtarget="_blank">Cetak</button>
                   <button type="button" onclick='lihat_resep()' class="btn btn-primary">
                        Lihat Resep
                    </button>
                </form>
            </div><!-- end col -->


        </div>
                       

                    </div>
                </div><!-- end col-->



            </div>
            <!-- end row -->


          
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
    

</div>

<div class="tampil_resep">

</div>

<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>

<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/pages/jquery.formadvanced.init.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/clockpicker/bootstrap-clockpicker.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/panel/pages/jquery.form-pickers.init.js"></script>

<script>

//options method for call datepicker
$("#datepicker").datepicker({
  format:'yyyy-mm-dd',
  todayHighlight:'TRUE',
  orientation: 'top',
              autoclose: true });

  </script>
<script type="text/javascript">
    function getrawat(){
        $.ajax({
            type: "GET",
            url: "<? echo site_url('dashboard/getrawat');?>/"+$('.tanggal').val(),
            success: function (data){
                $('.set_no_rawat').html(data);
            }
        });
    }
</script>


  <script type="text/javascript">
  function lihat_resep(){
      $.ajax({
          type:"POST",
          data:$('.resep').serialize(),
          url: "<?php echo site_url('dashboard/lihat_resep');?>",
          success: function (data){
              $('.tampil_resep').html(data);
          }
      });
  }
  </script>

<?php require 'includes/footer_end.php' ?>
