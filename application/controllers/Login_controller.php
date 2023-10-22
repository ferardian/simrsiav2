<?php

class login_controller extends CI_Controller{
	public function __construct() {
    	parent::__construct();
    	$this->load->model('login_mod');
  	}

  	public function index() {
    	$this->load->view('login_view');
  	}

  	// public function hasil_login() {
		//
    // 	if ($this->session->userdata('login')==TRUE) {
    // 		redirect('dashboard');
		//
    // 	}else {
    // 		redirect('login_controller');
  	// 	}
  	// }

 	public function pros_login(){
		$this->form_validation->set_rules('username', 'Nama Akun', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', 'Kolom %s harus di isi');
		$this->form_validation->set_error_delimiters('<p class="text-bold">','<p>');

	if ($this->form_validation->run() == TRUE){
	 		$username = $this->input->post('username');
	  		$password = $this->input->post('password');
		if ($this->login_mod->get_login($username)->password == $password){
	   		$hasil = $this->login_mod->get_user($username);
			$nama = $this->login_mod->get_nama($hasil['id_user']);
	    	$pegawai = $this->login_mod->get_id_pegawai($hasil['id']);
			$data = array('username'=>$username, 'login' => TRUE,  'id_user' => $hasil['nik'], 'nama' => $pegawai['nama'], 'id_pegawai' => $pegawai['id'], 'departemen' => $pegawai['departemen']);
	    	$this->session->set_userdata($data);

			if ($pegawai['departemen'] == "DNM1" || $pegawai['departemen'] == "DM14") {
				redirect('dashboard/cetak_resume');
			} else {
				redirect('dashboard');
			}
	  	}else{
	    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
	      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      	<strong class="fa fa-frown-o"></strong> Akun tidak ditemukan
	      	</div>');
	    	redirect('login_controller');
	  	}
	}else{
		$this->load->view('login_view');
	}

	}

	public function logout() {
  		$this->session->sess_destroy();
  		redirect ('login_controller');
	}

}
