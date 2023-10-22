<?php

class cashflow extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('cashflow_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  function index(){
    $data['get_date']=$this->cashflow_mod->get_date()->result();
    //$data['last_date']=$this->cashflow_mod->last_date()->result();
    $this->load->view('v_cashflow',$data);
  }


  function get_data(){
    $tanggal = $this->input->post('tgl');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $date = date('m-y',strtotime($tanggal));
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    $data['kas_bank']=$this->cashflow_mod->kas_bank($date)->result();
    $data['kas_tunai']=$this->cashflow_mod->kas_tunai($date)->result();
    $data['kas_anggaran']=$this->cashflow_mod->kas_anggaran($date)->result();
    $data['pengeluaran']=$this->cashflow_mod->pengeluaran($date)->result();
    //$data['penyusutan']=$this->neraca_mod->penyusutan($date)->result();
    //$data['aset_lain']=$this->neraca_mod->aset_lain($date)->result();
    //$data['hutang']=$this->neraca_mod->hutang($date)->result();
    //$data['ekuitas']=$this->neraca_mod->ekuitas($date)->result();
    $this->load->view('v_cashflow_data',$data);
  }






}

 ?>
