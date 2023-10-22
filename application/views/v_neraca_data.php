<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->


<?php require 'includes/header_end.php'; ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-xl-12">
                  <div class="page-title-box">
                      <h1 class="page-title float-left">NERACA <?php echo $bulan." ".$tahun ?></h1>
                      <div class="clearfix"></div>
                  </div>
              </div>
          </div>
<div class="row">
  <div class="col-xs-12 col-lg-12 col-xl-6">
      <div class="card-box">

          <h4 >Aktiva</h4>
          <hr style="display: block; border-width: 5px;">


          <div class="table-responsive">
            <table class="table table-bordered mb-0 table-sm">

                <tbody>
                  <td colspan="2" style="color:blue"><h6 class="header-title">Aset Lancar</h6></td>
                  <?php
                  $total1=0;
                  $moneyFormat = new moneyFormat();
                    foreach ($aset_lancar as $a){
                      ?>

                      <tr>

                        <td><?php echo $a->nama_sub_head;?></td>
                        <td align="right">
                        <?php
                        $t= $a->debet - $a->kredit;
                        echo $moneyFormat->rupiah($t);

                        $total1+=$t;
                        ?></td>
                      </tr>

                  <?  }

                   ?><tr>
                     <td align="left" style="color:red"><b>Jumlah Aset Lancar</b></td>
                     <td align="right"><b><?php echo $moneyFormat->rupiah($total1);?> </b></td>
                   </tr>

                  <td colspan="2" style="color:blue"><h6 class="header-title">Aset Tidak Lancar</h6></td>
                  <?php
                  $total2=0;
                  $moneyFormat = new moneyFormat();
                    foreach ($aset_tetap as $a){
                      ?>

                      <tr>
                        <td><?php echo $a->nama_sub_head;?></td>
                        <td align="right">
                        <?php
                        if (!($a->debet)) {
                          echo 0;
                        } else {
                        echo $moneyFormat->rupiah($a->debet);
                        }
                        $total2+=$a->debet;
                        ?></td>
                      </tr>

                  <?  }

                   ?><tr>
                     <td align="left" style="color:red"><b>Harga Perolehan</b></td>
                     <td align="right"><b><?php echo $moneyFormat->rupiah($total2);?> </b></td>
                   </tr>

                  <td colspan="2" style="color:blue"><h6 class="header-title">Akumulasi Penyusutan</h6></td>
                  <?php
                  $total3=0;
                  $moneyFormat = new moneyFormat();
                    foreach ($penyusutan as $a){
                      ?>

                      <tr>
                        <td><?php echo $a->nama_sub_head;?></td>
                        <td align="right">
                        <?php
                        if (!($a->kredit)) {
                          echo 0;
                        } else {
                        echo $moneyFormat->rupiah($a->kredit);
                        }
                        $total3+=$a->kredit;
                        ?></td>
                      </tr>

                  <?  }

                   ?><tr>
                     <td align="left" style="color:red"><b>Nilai Buku</b></td>
                     <td align="right"><b><?php echo $moneyFormat->rupiah($total2-$total3);?> </b></td>
                   </tr>
                  <td colspan="2" style="color:blue"><h6 class="header-title">Aset Lainnya</h6></td>
                  <?php
                  $total4=0;
                  $moneyFormat = new moneyFormat();
                    foreach ($aset_lain as $a){
                      ?>

                      <tr>
                        <td><?php echo $a->nama_sub_head;?></td>
                        <td align="right">
                        <?php
                        if (!($a->kredit)) {
                          echo 0;
                        } else {
                        echo $moneyFormat->rupiah($a->kredit);
                        }
                        $total4+=$a->kredit;
                        ?></td>
                      </tr>

                  <?  }

                   ?><tr>
                     <td align="left" style="color:red"><b>TOTAL ASET</b></td>
                     <td align="right"><b><?php echo $moneyFormat->rupiah($total1+$total2-$total3+$total4);?> </b></td>
                   </tr>
                </tbody>
            </table>


          </div>


      </div>
  </div>

  <div class="col-xs-12 col-lg-12 col-xl-6">
      <div class="card-box">

          <h4>Pasiva</h4>
          <hr style="display: block; border-width: 5px;">
          <div class="table-responsive">
              <table class="table table-bordered mb-0 table-sm" >
                  <thead>

                  </thead>
                  <tbody>
                    <td colspan="2" style="color:blue"><h6 class="header-title">Kewajiban Jangka Pendek</h6></td>
                    <?php
                    $moneyFormat = new moneyFormat();
                    $total5=0;
                      foreach ($hutang as $a){
                        ?>

                        <tr>
                          <td><?php echo $a->nama_sub_head;?></td>
                          <td align="right"><?php echo  $moneyFormat->rupiah($a->kredit); $total5+=$a->kredit;?></td>
                        </tr>


                    <?  }
                     ?><tr>
                       <td align="left" style="color:red"><b>Jumlah Kewajiban Jangka Pendek</b></td>
                       <td align="right"><b><?php echo $moneyFormat->rupiah($total5);?> </b></td>
                     </tr>
                    <td colspan="2" style="color:blue"><h6 class="header-title">Ekuitas</h6></td>
                    <?php
                    $moneyFormat = new moneyFormat();
                    $total6=0;
                      foreach ($ekuitas as $a){
                        ?>

                        <tr>
                          <td><?php echo $a->nama_sub_head;?></td>
                          <td align="right"><?php echo  $moneyFormat->rupiah($a->kredit); $total6+=$a->kredit;?></td>
                        </tr>


                    <?  }
                     ?><tr>
                       <td align="left" style="color:red"><b>Jumlah Ekuitas</b></td>
                       <td align="right"><b><?php echo $moneyFormat->rupiah($total6);?> </b></td>
                     </tr>
                    <td colspan="2" style="color:blue"><h6 class="header-title">LABA (RUGI)</h6></td>
                    <?php
                    $moneyFormat = new moneyFormat();
                    $total7=0;
                    $total8=0;
                    $total9=0;
                    $total10=0;
                      foreach ($penerimaan_ri as $a){
                        $total7+=$a->tarif;
                      }

                      foreach ($penerimaan_rj as $b){
                        $total8+=$b->tarif;
                      }

                      foreach ($pengeluaran as $c){
                        $total9+=$c->debet; $total10=$total7+$total8-$total9;
                      }

                     ?>
                     <tr>
                       <td>Penerimaan</td>
                       <td align="right"><?php echo  $moneyFormat->rupiah($total7+$total8);?></td>
                     </tr>
                     <tr>
                       <td>Pengeluaran</td>
                       <td align="right"><?php echo  "(".$moneyFormat->rupiah($total9).")";?></td>
                     </tr>
                     <tr>
                       <td align="left" style="color:red"><b>LABA (RUGI)</b></td>
                       <td align="right"><b><?php echo $moneyFormat->rupiah($total10);?> </b></td>
                     </tr>
                    <tr>
                       <td align="left" style="color:red"><b>TOTAL KEWAJIBAN DAN EKUITAS</b></td>
                       <td align="right"><b><?php echo $moneyFormat->rupiah($total5+$total6+$total10);?> </b></td>
                     </tr>
                  </tbody>
              </table>
          </div>


      </div>
  </div


</div>
</div>
</div>
</div>

<?php require 'includes/footer_start.php' ?>

<!--Morris Chart-->


<?php require 'includes/footer_end.php' ?>
