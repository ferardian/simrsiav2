
<?php require 'includes/header_start.php'; ?>
<!-- Plugins css -->
<link href="<?php echo base_url(); ?>assets/panel/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/panel/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/panel/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>

<?php require 'includes/header_end.php'; ?>

<script type="text/javascript">
   function fnHitung() {
	var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('inputku').value)))); //input ke dalam angka tanpa titik
	if (document.getElementById('inputku').value == "") {
	 alert("Jangan Dikosongi");
	 document.getElementById('inputku').focus();
	 return false;
	}
	else
	 if (angka >= 1) {
	 alert("angka aslinya : "+angka);
	 document.getElementById('inputku').focus();
	 document.getElementById('inputku').value = tandaPemisahTitik(angka);
	 return false;
	}

}
// function startCalc(){
// interval = setInterval("calc()",1);
//
// }
// function calc(){
//
// jan = document.getElementsByName('jan')[0].value;
// feb = document.getElementsByName('feb')[0].value;
// mar = document.getElementsByName('mar')[0].value;
// apr = document.getElementsByName('apr')[0].value;
// mei = document.getElementsByName('mei')[0].value;
// jun = document.getElementsByName('jun')[0].value;
// jul = document.getElementsByName('jul')[0].value;
// jun = document.getElementsByName('jun')[0].value;
// agu = document.getElementsByName('agu')[0].value;
// sep = document.getElementsByName('sep')[0].value;
// okt = document.getElementsByName('okt')[0].value;
// nov = document.getElementsByName('nov')[0].value;
// dec = document.getElementsByName('dec')[0].value;
// document.getElementsByName('realisasi')[0].value = (jan * 1) + (feb * 1) + (mar * 1) + (apr * 1) + (mei * 1) + (jun * 1) + (jul * 1) + (agu * 1) + (sep * 1) + (okt * 1) + (nov * 1) + (dec * 1);
//
//
// }
// function stopCalc(){
//
// clearInterval(interval);}
  </script>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">
                            <?php
                            if($stat == 'new'){
                                echo "Form Tambah Data";
                            }
                            else{
                                echo "Form Edit Data";
                            }
                            ?>

                        </h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form elements</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-8">
                    <div class="card-box">


                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col-xl-8">
                                <form action="<?php echo base_url('adjustment/simpan_data');?>" enctype="multipart/form-data" method="POST">
                                  <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" name="tanggal" value="<?=$tanggal?>" placeholder="mm/dd/yyyy" id="datepicker" >
                                      <div class="input-group-append">
                                          <span class="input-group-text"><i class="icon-calender"></i></span>
                                      </div>
                                      </div>


                                      <input type="hidden" name="kode" value="<?=$kode?>" />
                                      <input type="hidden" name="adjust" value="<?=$adjust?>" />
                                      <input type="hidden" name="stat" value="<?=$stat?>" />

                                  </fieldset>



                        <fieldset class="form-group">
                            <label for="exampleSelect1">Akun</label>
                            <select name="kd_acc3" class="form-control select2">
                                  <?php
                        if($stat == 'new'){?>
                                 <option value="<?=$kd_acc3?>">--Pilih Akun--</option>

                                <?php
                                foreach ($data_akun as $da){
                                    echo "<option value='$da->kd_acc3|$da->kd_acc1|$da->kd_acc2'>$da->nama_acc3</option>";
                                    }
                                 ?>
                            <?}
                        else{?>
                            <option value="<?=$kd_acc3?>"><?php
                                    echo "--".$nama_acc3."--";
                                 ?></option>
                                  <?php
                                foreach ($data_akun as $da){
                                    echo "<option value='$da->kd_acc3|$da->kd_acc1|$da->kd_acc2'>$da->nama_acc3</option>";

                                    }
                                 ?>
                            <?}?>

                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Debet</label>
                            <div class="row col-lg-12">
                              <div class="col-lg-2">
                                <select class="form-control" name="negative">
                                  <option value="0">+</option>
                                  <option value="1">-</option>
                                </select>
                              </div>
                              <div class="col-lg-6">
                              <input type="text" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"  name="debet" value="<?=$debet?>" placeholder="Debet" >
                              </div>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Kredit</label>
                            <div class="row col-lg-12">
                              <div class="col-lg-2">
                                <select class="form-control" name="negative1">
                                  <option value="0">+</option>
                                  <option value="1">-</option>
                                </select>
                              </div>
                              <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="kredit" value="<?=$kredit?>" placeholder="Kredit" >
                            </div>
                        </fieldset>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <?php
                        if($stat == 'new'){
                            echo "Simpan";
                        }
                        else{
                            echo "Update";
                        }
                        ?>
                    </button>
                   <button onclick="history.go(-1);" class="btn btn-primary">
                        Kembali
                    </button>
                </form>
            </div><!-- end col -->


        </div>

    </fieldset>
</form>
</div><!-- end col -->

</div><!-- end row -->
</div>
</div><!-- end col -->
</div>
<!-- end row -->


</div> <!-- content -->



</div>
<!-- End content-page -->

<?php require 'includes/footer_start.php' ?>

<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<!-- Autocomplete -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/plugins/autocomplete/countries.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/pages/jquery.autocomplete.init.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/panel/pages/jquery.formadvanced.init.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/clockpicker/bootstrap-clockpicker.js"></script>
<script src="<?php echo base_url(); ?>assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/panel/pages/jquery.form-pickers.init.js"></script>



<?php require 'includes/footer_end.php' ?>
