<?php

class labarugi_data extends CI_Controller{

  function __construct(){
    parent::__construct();
    //$this->load->library('datatables');
    $this->load->model('labarugi_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  public function index() {
      $data['page'] = 'order';
      $data['tgl'] =$this->uri->segment(3);
      $data['title'] = 'Data Table | TechArise';
      $this->load->view('v_labarugi_data', $data);
  }
  // get Orders List
  public function getDataList() {
      $tgl = $this->input->post('tgl');
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
      $getOrderInfo = $this->labarugi_mod->getData($tgl);
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



  public function GroupByAkun() {

      $tgl =$this->uri->segment(3);
      $tahun =$this->uri->segment(4);
      $data['tgl'] =$this->uri->segment(3);
      $data['tahun'] =$this->uri->segment(4);
      $data['penerimaan1'] = $this->labarugi_mod->getDataGroupByAkun($tgl,$tahun);
      $data['penerimaan2'] = $this->labarugi_mod->getDataGroupByAkun2($tgl,$tahun);
      $data['pengeluaran1'] = $this->labarugi_mod->getDataGroupByAkun3($tgl,$tahun);
      $data['pengeluaran2'] = $this->labarugi_mod->getDataGroupByAkun4($tgl,$tahun);
      $data['pengeluaran3'] = $this->labarugi_mod->getDataGroupByAkun5($tgl,$tahun);
      $data['pengeluaran4'] = $this->labarugi_mod->getDataGroupByAkun6($tgl,$tahun);
      $data['pengeluaran5'] = $this->labarugi_mod->getDataGroupByAkun7($tgl,$tahun);
      $data['pengeluaran6'] = $this->labarugi_mod->getDataGroupByAkun8($tgl,$tahun);
      $data['pengeluaran7'] = $this->labarugi_mod->getDataGroupByAkun9($tgl,$tahun);
      $data['pengeluaran8'] = $this->labarugi_mod->getDataGroupByAkun10($tgl,$tahun);
      $data['pengeluaran9'] = $this->labarugi_mod->getDataGroupByAkun11($tgl,$tahun);

      $this->load->view('v_labarugi_data2', $data);
  }
  // get Orders List
  public function getDataList2() {
      $tgl = $this->input->post('tgl');
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
      $getOrderInfo = $this->labarugi_mod->getDataGroupByAkun($tgl);
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
              number_format($element['debet'],0, ',' , '.' ),
              number_format($element['kredit'],0, ',' , '.' ),
              number_format($saldo,0, ',' , '.' ),

            //  $element['status'],
          );
      }
      echo json_encode(array("data" => $dataArray));
  }


}

 ?>
