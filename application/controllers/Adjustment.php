<?php

class adjustment extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('adjustment_mod');
    if (!is_login()) {
      redirect('login_controller');
    }
  }

  function index(){
    $data['record']=$this->adjustment_mod->select_data()->result();
    $this->load->view('v_adjustment',$data);
  }

  function tambah_data(){
  	//$session_id = $this->session->userdata('id_user');
  	//$data ['data_spesialis'] = $this->dokter_mod->ambilSpesialis()->result();
  	$data = array(
  					           'title'        => 'Tambah Data',
                       'kode'             => '',
                       'tanggal'         => '',
                       'kd_acc1'         => '',
                       'kd_acc2'         => '',
                       'kd_acc3'         => '',
                       'nama_acc3'         => '',
                       'debet'           => '',
                       'kredit'         => '',
                       'negative' =>'',
                       'adjust'	        => '1',
                       'stat'           => 'new',
  	);
  	$data['data_akun'] = $this->adjustment_mod->select_akun()->result();
  	$this->load->view('adjustment_form_view',$data);

  		}

  function simpan_data(){
  	if(isset($_POST['submit'])){

  		$kode 			     = $this->input->post('kode');
  		$tanggal 			   = $this->input->post('tanggal');
      $negative       = $this->input->post('negative');
      $negative1       = $this->input->post('negative1');

  		//$kd_acc1	       = $this->input->post('kd_acc1');
  		//$kd_acc2	       = $this->input->post('kd_acc2');
  		$kd_acc3	       = $this->input->post('kd_acc3');
      $pecah           = explode("|",$kd_acc3);
  		$tgl             = date("Y-m-d", strtotime($tanggal));
  		$debet	         = $this->input->post('debet');
      if ($negative == 1) {
        $d               =(float) str_replace('.','',$debet);
        $d2 = ('-'.$d);
      } else {
        $d2 =(float) str_replace('.','',$debet);
      }
      
      $kredit	         = $this->input->post('kredit');
      if ($negative1 == 1) {
        $k               =(float) str_replace('.','',$kredit);
        $k2 = ('-'.$k);
      } else {
        $k2 =(float) str_replace('.','',$kredit);
      }


  		$adjust	         = $this->input->post('adjust');
  		$stat			       = $this->input->post('stat');


  		if($stat == 'new'){

  			$data = array(
  							'tanggal' => $tgl,
  							'kd_acc3'	=> $pecah[0],
  							'kd_acc1'	=> $pecah[1],
  							'kd_acc2'	=> $pecah[2],
  							'debet'	  => $d2,
  							'kredit'	=> $k2,
  							'adjust'	=> $adjust,

  			);

  		$this->adjustment_mod->insert_data($data);
  		$this->session->set_flashdata("save_artikel","<div class='alert alert-info alert-dismissable'>
                                          <i class='fa fa-info'></i>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <b>Sukses!</b> Data berhasil di simpan
                                      </div>");
                          redirect('adjustment');
  		}else{
  			$this->db->where('id',$kode);
  			$query =$this->db->get('dt_jurnal');

  			$row =$query->row();

        if ( $pecah[1] == 0) {
          $data = array(
            'tanggal' => $tgl,
            'debet'	  => $d2,
            'kredit'	=> $k2,
            'adjust'	=> $adjust,
    			);

        } else if ($pecah[2] == 0) {
          $data = array(
            'tanggal' => $tgl,
            'debet'	  => $d2,
            'kredit'	=> $k2,
            'adjust'	=> $adjust,
    			);
        } else  {
          $data = array(
            'tanggal' => $tgl,
            'kd_acc3'	=> $pecah[0],
            'kd_acc1'	=> $pecah[1],
            'kd_acc2'	=> $pecah[2],
            'debet'	  => $d2,
            'kredit'	=> $k2,
            'adjust'	=> $adjust,
          );
        }

  			$this->adjustment_mod->update_data('dt_jurnal',$data,array('id' => $kode));
  			$this->session->set_flashdata("save_artikel","<div class='alert alert-success alert-dismissable'>
                                          <i class='fa fa-info'></i>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <b>Sukses!</b> Data berhasil di edit
                                      </div>");
                          redirect('adjustment');
  		}
  	}else{
  		redirect('adjustment');
  	}
  	}


  function edit_data($kode=0){
  	$data_konten 	= $this->adjustment_mod->getData($kode)->result_array();
    $tanggal = $data_konten[0]['tanggal'];
    $tgl = date("m/d/Y", strtotime($tanggal));
  	$data = array(
  					'title' 		     => 'Edit Data',
  					'kode'			     => $data_konten[0]['id'],
  					'tanggal'			   => $tgl,
  					// 'kd_acc1'	       => $data_konten[0]['kd_acc1'],
  					// 'kd_acc2'	        => $data_konten[0]['kd_acc2'],
  					'kd_acc3'	       => $data_konten[0]['kd_acc3'],
  					'nama_acc3'	     => $data_konten[0]['nama_acc3'],
  					'debet'		       => $data_konten[0]['debet'],
  					'kredit'	       => $data_konten[0]['kredit'],
  					'adjust'	       => $data_konten[0]['adjust'],
  					'stat'			     => 'edit',
  	);

  	$data['data_akun'] = $this->adjustment_mod->select_akun()->result();
  	$this->load->view('adjustment_form_view',$data);
  }

  function hapus_data($kode=0){
  	$this->db->where('id',$kode);
  	$query 	= $this->db->get('dt_jurnal');
  	$row	= $query->row();

  	$this->adjustment_mod->delData('dt_jurnal',array('id' => $kode));
  	$this->session->set_flashdata("save_data","<div class='alert alert-warning alert-dismissable'>
                                          <i class='fa fa-info'></i>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                          <b>Sukses!</b> Data berhasil dihapus
                                      </div>");
                      redirect('adjustment');
  }





}

 ?>
