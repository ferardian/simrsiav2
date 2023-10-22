<?php

class bukban_data extends CI_Controller{

  function __construct(){
    parent::__construct();
      $this->load->library('datatables');
    $this->load->model('bukban_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  public function index() {
      $data['page'] = 'order';
      $data['nama'] =$this->input->post('nama');
      $data['acc'] =$this->input->post('kode');
      $data['tgl'] =$this->input->post('tgl');

      $data['title'] = 'Data Table | TechArise';
      $this->load->view('v_bukban_data', $data);
  }
  // get Orders List
  public function getDataList1() {
      $tgl = $this->input->post('tgl');
      $acc = $this->input->post('acc');
      $nama1 = $this->input->post('nama_acc1');
      $nama2 = $this->input->post('nama_acc2');
      $nama3 = $this->input->post('nama_acc3');
      $date = $this->input->post('tanggal');
      //$endDate = $this->input->post('end_date');
      if(!empty($nama1)){
          $this->labarugi_mod->setNama1($nama1);
      }
      if(!empty($nama2)){
          $this->labarugi_mod->setNama2($nama2);
      }
      if(!empty($nama3)){
          $this->labarugi_mod->setNama3($nama3);
      }
      if(!empty($date)) {
          $this->labarugi_mod->setDate(date('Y-m-d', strtotime($date)));
          //$this->site->setEndDate(date('Y-m-d', strtotime($endDate)));
      }
      $getOrderInfo = $this->bukban_mod->getData1($tgl,$acc);
      $dataArray = array();
      $saldo=0;
      $no=0;
      foreach ($getOrderInfo as $element) {
        $no++;
        $saldo+=$element['debet']-$element['kredit'];
          $dataArray[] = array(
              $no,
              //date(DATE_FORMAT_SIMPLE, $element['order_date']),
              $element['tanggal'],
              $element['no_reff'],
              $element['nama_acc1'],
              $element['nama_acc2'],
              $element['nama_acc3'],
              $element['keterangan'],
              number_format($element['debet'],0, ',' , '.' ),
              number_format($element['kredit'],0, ',' , '.' ),
              number_format($saldo,0, ',' , '.' ),

            //  $element['status'],
          );
      }
      echo json_encode(array("data" => $dataArray));
  }

  public function getDataList2() {
      $tgl = $this->input->post('tgl');
      $acc = $this->input->post('acc');
      $nama1 = $this->input->post('nama_acc1');
      $nama2 = $this->input->post('nama_acc2');
      $nama3 = $this->input->post('nama_acc3');
      $date = $this->input->post('tanggal');
      //$endDate = $this->input->post('end_date');
      if(!empty($nama1)){
          $this->labarugi_mod->setNama1($nama1);
      }
      if(!empty($nama2)){
          $this->labarugi_mod->setNama2($nama2);
      }
      if(!empty($nama3)){
          $this->labarugi_mod->setNama3($nama3);
      }
      if(!empty($date)) {
          $this->labarugi_mod->setDate(date('Y-m-d', strtotime($date)));
          //$this->site->setEndDate(date('Y-m-d', strtotime($endDate)));
      }
      $getOrderInfo = $this->bukban_mod->getData2($tgl,$acc);
      $dataArray = array();
      $saldo=0;
      $no=0;
      foreach ($getOrderInfo as $element) {
        $no++;

          $dataArray[] = array(
              $no,
              //date(DATE_FORMAT_SIMPLE, $element['order_date']),
              $element['tanggal'],
              $element['no_reff'],
              $element['nama_acc1'],
              $element['nama_acc2'],
              $element['nama_acc3'],
              $element['keterangan'],
              number_format($element['debet'],0, ',' , '.' ),
              number_format($element['kredit'],0, ',' , '.' ),
              number_format($saldo,0, ',' , '.' ),

            //  $element['status'],
          );
      }
      echo json_encode(array("data" => $dataArray));
  }

  public function getDataList3() {
      $tgl = $this->input->post('tgl');
      $acc = $this->input->post('acc');
      $nama1 = $this->input->post('nama_acc1');
      $nama2 = $this->input->post('nama_acc2');
      $nama3 = $this->input->post('nama_acc3');
      $date = $this->input->post('tanggal');
      //$endDate = $this->input->post('end_date');
      if(!empty($nama1)){
          $this->labarugi_mod->setNama1($nama1);
      }
      if(!empty($nama2)){
          $this->labarugi_mod->setNama2($nama2);
      }
      if(!empty($nama3)){
          $this->labarugi_mod->setNama3($nama3);
      }
      if(!empty($date)) {
          $this->labarugi_mod->setDate(date('Y-m-d', strtotime($date)));
          //$this->site->setEndDate(date('Y-m-d', strtotime($endDate)));
      }
      $getOrderInfo = $this->bukban_mod->getData3($tgl,$acc);
      $dataArray = array();
      $saldo=0;
      $no=0;
      foreach ($getOrderInfo as $element) {
        $no++;

        if ($acc==5) {
          $saldo+=$element['debet']+$element['kredit'];
        } else{
          $saldo+=$element['debet']-$element['kredit'];
        }

          $dataArray[] = array(
              $no,
              //date(DATE_FORMAT_SIMPLE, $element['order_date']),
              $element['tanggal'],
              $element['no_reff'],
              $element['nama_acc1'],
              $element['nama_acc2'],
              $element['nama_acc3'],
              $element['keterangan'],
              number_format($element['debet'],0, ',' , '.' ),
              number_format($element['kredit'],0, ',' , '.' ),
              number_format($saldo,0, ',' , '.' ),

            //  $element['status'],
          );
      }
      echo json_encode(array("data" => $dataArray));
  }
  // function index(){
  //   $data['acc'] =$this->uri->segment(3);
  //   $data['tgl'] =$this->uri->segment(4);
  //   //$data['acc'] = $this->input->post('kd_acc3');
  //   //$data['tgl'] = $this->input->post('tgl');
  //   $this->load->view('v_bukban_data',$data);
  // }
  //
  // function json(){
  //   $id = $this->input->post('acc');
  //   $tgl = $this->input->post('tgl');
  //   $data = $this->bukban_mod->json($id,$tgl);
  //   header('Content-Type: application/json');
  //   echo $data;
  // }
  //
  // function json2(){
  //
  //
  //   $id = $this->input->post('acc');
  //   $tgl = $this->input->post('tgl');
  //   $data = $this->bukban_mod->json2($id,$tgl);
  //   header('Content-Type: application/json');
  //   echo $data;
  // }
  //
  // function json3(){
  //
  //
  //   $id = $this->input->post('acc');
  //   $tgl = $this->input->post('tgl');
  //   $data = $this->bukban_mod->json3($id,$tgl);
  //   header('Content-Type: application/json');
  //   echo $data;
  // }




}

 ?>
