<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->


<?php require 'includes/header_end.php'; ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
<div class="row">
  <div class="col-xs-12 col-lg-12 col-xl-6">
      <div class="card-box">

          <h4 >NERACA</h4>
          <hr style="display: block; border-width: 5px;">


          <div class="table-responsive">
            <table class="table table-bordered mb-0 ">

                <tbody>
                  <?php
                  $total1=0;
                  $bulan="";
                  $tahun="";
                  $moneyFormat = new moneyFormat();
                    foreach ($get_date as $a){
                      ?>

                      <tr>
                        <td><b><?php
                        $date = date('d,m,Y', strtotime($a->tanggal));
                        $pecah = explode(",",$date);
                        if ($pecah[1]==01) {
                          $bulan = "Januari";
                        }
                        else if ($pecah[1]==02) {
                          $bulan = "Februari";
                        }
                        else if ($pecah[1]==03) {
                          $bulan = "Maret";
                        }
                        else if ($pecah[1]==04) {
                          $bulan = "April";
                        }
                        else if ($pecah[1]==05) {
                          $bulan = "Mei";
                        }
                        else if ($pecah[1]==06) {
                          $bulan = "Juni";
                        }
                        else if ($pecah[1]==07) {
                          $bulan = "Juli";
                        }
                        else if ($pecah[1]==08) {
                          $bulan = "Agustus";
                        }
                        else if ($pecah[1]==09) {
                          $bulan = "September";
                        }
                        else if ($pecah[1]==10) {
                          $bulan = "Oktober";
                        }
                        else if ($pecah[1]==11) {
                          $bulan = "November";
                        }
                        else if ($pecah[1]==12) {
                          $bulan = "Desember";
                        }
                        $tahun = $pecah[2];
                        $tanggal = $pecah[0];

                          echo $bulan." ".$tahun;
                        ?></b><br>
                        Data Terakhir : <?php echo $tanggal." ".$bulan." ".$tahun; ?>
                      </td>
                        <td>
                          <form class="form-horizontal" method="POST" action="<?php echo site_url("neraca/get_data") ?>" >
                              <button type="submit" class="btn btn-danger btn-block">Detail</button>
                              <input type="hidden" name="tgl" value="<?php echo $a->tanggal; ?>">
                              <input type="hidden" name="bulan" value="<?php echo $bulan; ?>">
                              <input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
                          </form>
                        </td>

                      </tr>

                  <?  }

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

<?php require 'includes/footer_start.php' ?>

<!--Morris Chart-->


<?php require 'includes/footer_end.php' ?>
