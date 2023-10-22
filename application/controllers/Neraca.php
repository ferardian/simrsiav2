<?php

class neraca extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('neraca_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  function index(){
    $data['get_date']=$this->neraca_mod->get_date()->result();
    //$data['aset_lancar']=$this->neraca_mod->aset_lancar()->result();
    //$data['aset_tetap']=$this->neraca_mod->aset_tetap()->result();
    //$data['aset_lain']=$this->neraca_mod->aset_lain()->result();
    //$data['hutang']=$this->neraca_mod->hutang()->result();
    //$data['ekuitas']=$this->neraca_mod->ekuitas()->result();
    $this->load->view('v_neraca',$data);
  }


  function get_data(){
    $tanggal = $this->input->post('tgl');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $date = date('m-y',strtotime($tanggal));
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    $data['aset_lancar']=$this->neraca_mod->aset_lancar($date)->result();
    $data['aset_tetap']=$this->neraca_mod->aset_tetap($date)->result();
    $data['penyusutan']=$this->neraca_mod->penyusutan($date)->result();
    $data['aset_lain']=$this->neraca_mod->aset_lain($date)->result();
    $data['hutang']=$this->neraca_mod->hutang($date)->result();
    $data['ekuitas']=$this->neraca_mod->ekuitas($date)->result();
    $data['penerimaan_ri']=$this->neraca_mod->penerimaan_ri($date)->result();
    $data['penerimaan_rj']=$this->neraca_mod->penerimaan_rj($date)->result();
    $data['pengeluaran']=$this->neraca_mod->pengeluaran($date)->result();
    $this->load->view('v_neraca_data',$data);
  }






}

 ?>
