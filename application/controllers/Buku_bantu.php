<?php

class buku_bantu extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('bukban_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  function index(){
    $this->load->view('v_bukban');
  }

  function item_bank(){
    $data['record'] = $this->bukban_mod->item_bank()->result();
    $this->load->view('v_result_item_bank',$data);
  }

  function item_kas_bank(){
    $data['nama']= $this->input->post('nama_acc3');
    $data['kode']=$this->input->post('kd_acc3');
    $id = $this->input->post('kd_acc3');
    $data['record'] = $this->bukban_mod->item_kas_bank($id)->result();
    $this->load->view('v_result_bank',$data);
  }

  function kas_bank(){

    $data['record']= $this->bukban_mod->select_kas_bank()->result();
    $this->load->view('v_result_bukban',$data);
  }

  function piutang(){
    $data['nama'] = "Piutang";
    $data['kode']=11;
    $data['record']= $this->bukban_mod->select_piutang()->result();
    $this->load->view('v_result_bukban',$data);
  }

  function aset(){
    $data['nama'] = "Aset";
    $data['kode']=25;
    $data['record']= $this->bukban_mod->select_aset()->result();
    $this->load->view('v_result_bukban',$data);
  }


  function persediaan(){
    $data['nama'] = "Persediaan";
    $data['kode']= 12;
    $data['record']= $this->bukban_mod->select_persediaan()->result();
    $this->load->view('v_result_bukban',$data);
  }

  function pengeluaran(){
    $data['nama'] = "Pengeluaran";
    $data['kode']= 6;
    $data['record']= $this->bukban_mod->select_pengeluaran()->result();
    $this->load->view('v_result_bukban',$data);
  }

  function penerimaan(){
    $data['nama'] = "Penerimaan";
    $data['kode']= 5;
    $data['record']= $this->bukban_mod->select_penerimaan()->result();
    $this->load->view('v_result_bukban',$data);
  }



}

 ?>
