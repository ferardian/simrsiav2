<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured panel theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="<?php base_url() ?>assets/panel/images/rsiap.ico">

    <!-- App title -->
    <title>Admin Kliam BPJS - RSIAP</title>

    <!-- Bootstrap CSS -->
    <link href="<?php base_url() ?>assets/panel/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="<?php base_url() ?>assets/panel/css/style.css" rel="stylesheet" type="text/css"/>

    <script src="<?php base_url() ?>assets/panel/js/modernizr.min.js"></script>

</head>


<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">

        <div class="account-bg">
            <div class="card-box mb-0">
                <div class="text-center m-t-20">
                    <a href="index.html" class="logo">
                        <i class="zmdi zmdi-group-work icon-c-logo"></i>
                        <span>Admin Kliam BPJS - RSIAP</span>
                    </a>
                </div>
                <div class="m-t-10 p-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                        </div>
                    </div>
                    <p class="login-box-msg">
                  <?php echo $this->session->flashdata('pesan')?>
        </p>
                        <?php echo form_open('login_controller/pros_login', array('name' => 'form_login'))?>
                    <form class="m-t-20"">

                        <div class="form-group row">
                            <div class="col-12">
                                 <?php echo form_error('username');?>
                                <input name="username" class="form-control" type="text" required="" placeholder="Username" value="<?php set_value('username')?>" autofocus>
                            </div>
                        </div>
                        <?php echo form_error('password');?>
                        <div class="form-group row">
                            <div class="col-12">
                                <input name="password" class="form-control" type="password" required="" placeholder="Password" value="<?php set_value('password')?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                         <?php echo form_close()?>


                    </form>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end card-box-->



    </div>
    <!-- end wrapper page -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php base_url() ?>assets/panel/js/jquery.min.js"></script>
<script src="<?php base_url() ?>assets/panel/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="<?php base_url() ?>assets/panel/js/bootstrap.min.js"></script>
<script src="<?php base_url() ?>assets/panel/js/detect.js"></script>
<script src="<?php base_url() ?>assets/panel/js/fastclick.js"></script>
<script src="<?php base_url() ?>assets/panel/js/jquery.blockUI.js"></script>
<script src="<?php base_url() ?>assets/panel/js/waves.js"></script>
<script src="<?php base_url() ?>assets/panel/js/jquery.nicescroll.js"></script>
<script src="<?php base_url() ?>assets/panel/js/jquery.scrollTo.min.js"></script>
<script src="<?php base_url() ?>assets/panel/js/jquery.slimscroll.js"></script>
<script src="<?php base_url() ?>assets/panel/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="<?php base_url() ?>assets/panel/js/jquery.core.js"></script>
<script src="<?php base_url() ?>assets/panel/js/jquery.app.js"></script>

</body>
</html>
