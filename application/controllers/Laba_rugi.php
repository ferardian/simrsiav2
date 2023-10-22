<?php

class laba_rugi extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('labarugi_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  function index(){
    
    $data['record']=$this->labarugi_mod->select_data()->result();
    $this->load->view('v_labarugi',$data);
  }






}

 ?>
