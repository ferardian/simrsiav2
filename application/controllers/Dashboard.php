<?php
require APPPATH.'third_party/endroid_qrcode/autoload.php';
		
use Endroid\QrCode\ErrorCorrectionLevel;
//use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
class dashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('dashboard_mod','pasien_mod'));
        if (!is_login()) {
  				redirect('login_controller');
  			}

    }

    function index(){
      // $data['kas_bank']=$this->cashflow_mod->kas_bank($date)->result();
      // $data['kas_tunai']=$this->cashflow_mod->kas_tunai($date)->result();
      // $data['kas_anggaran']=$this->cashflow_mod->kas_anggaran($date)->result();
      // $data['pengeluaran']=$this->cashflow_mod->pengeluaran($date)->result();
      // $data['dokter'] = $this->dashboard_mod->count_dokter();
      // $data['poli'] = $this->dashboard_mod->count_poli();
      // $data['artikel'] = $this->dashboard_mod->count_artikel();
      // $data['pelayanan'] = $this->dashboard_mod->count_pelayanan();
      $bupel = $this->dashboard_mod->get_bupel()->row()->bulan;
      $bulan = date("m", strtotime($bupel));
      $tahun = date("Y", strtotime($bupel));
      $data['bulan'] = $bulan;
      $data['tahun'] = $tahun;
      $data['perbaikan_ralan'] = $this->dashboard_mod->perbaikan_ralan($bulan,$tahun)->result();
      $data['perbaikan_ranap'] = $this->dashboard_mod->perbaikan_ranap($bulan,$tahun)->result();
      $data['pending_ralan'] = $this->dashboard_mod->pending_ralan()->result();
      $data['pending_ranap'] = $this->dashboard_mod->pending_ranap()->result();

      $data['berkas_klaim_ralan']    = $this->dashboard_mod->berkas_klaim_ralan($bulan,$tahun)->result();
      $data['berkas_klaim_ranap']    = $this->dashboard_mod->berkas_klaim_ranap($bulan,$tahun)->result();
      // $data['verif_resume'] = $this->dashboard_mod->count_verif_resume();
      // $data['lengkap'] = $this->dashboard_mod->count_lengkap();
      // $data['pengajuan'] = $this->dashboard_mod->count_pengajuan();
      // $data['disetujui'] = $this->dashboard_mod->count_disetujui();
      $this->load->view('dashboard_view',$data);
    }

    function index_load(){
      $bupel = $this->dashboard_mod->get_bupel()->row()->bulan;
      $bulan = date("m", strtotime($bupel));
      $tahun = date("Y", strtotime($bupel));
      $data['bulan'] = $bulan;
      $data['tahun'] = $tahun;
      $data['perbaikan_ralan'] = $this->dashboard_mod->perbaikan_ralan($bulan,$tahun)->result();
      $data['perbaikan_ranap'] = $this->dashboard_mod->perbaikan_ranap($bulan,$tahun)->result();
      $data['berkas_klaim_ralan']    = $this->dashboard_mod->berkas_klaim_ralan($bulan,$tahun)->result();
      $data['berkas_klaim_ranap']    = $this->dashboard_mod->berkas_klaim_ranap($bulan,$tahun)->result();
      $this->load->view('dashboard_view_load',$data);
    }

    function cari_status(){
      $data['status'] = $this->input->post('status');
      $data['data1'] = json_decode($this->input->post('data1'));
      $data['data2'] = json_decode($this->input->post('data2'));
      $this->load->view('konten_dashboard',$data);
    }
    function cari_status_pending(){
      $data['status'] = $this->input->post('status');
      $this->
      // $data['data1'] = json_decode($this->input->post('data1'));
      // $data['data2'] = json_decode($this->input->post('data2'));
      $this->load->view('konten_dashboard',$data);
    }

    function cari_berkas(){
      $data['data1'] = json_decode(preg_replace('/\s+/', '',$this->input->post('data1')), true);
      $this->load->view('konten_berkas_dashboard',$data);
    }

    function simpan_bupel(){

    }

    function index2(){
      $data['pasien'] = $this->dashboard_mod->getRegister()->result();
     
      $this->load->view('dashboard_view2',$data);
    }

    function index3(){
      $data['pasien'] = $this->dashboard_mod->getRegisterPengajuan()->result();
     
      $this->load->view('dashboard_view2',$data);
    }

    function data_naik_kelas(){
      $data['record'] = $this->dashboard_mod->get_naik_kelas()->result();
      $this->load->view('dashboard_naik_kelas',$data);
    }

    function naik_kelas($no_rawat){
      $no_rawat = str_replace('-','/',$no_rawat);
      $data['no_rawat'] = $no_rawat;
      $data['pasien'] = $this->pasien_mod->dataPasien($no_rawat)->row();
      $data['sep']=$this->dashboard_mod->get_sep($no_rawat)->row();
      $data['record']=$this->dashboard_mod->get_naik_kelas_where($no_rawat)->row();
      // if ($data['pasien']->status_lanjut == "Ralan") {
      //   $data['cppt'] = $this->dashboard_mod->get_pemeriksaan_ralan($data['pasien']->no_rkm_medis,$data['pasien']->tgl_registrasi)->result();
      // } else {
      //   $data['cppt'] = $this->dashboard_mod->get_pemeriksaan_ranap($data['pasien']->no_rkm_medis,$data['pasien']->tgl_registrasi)->result();
      // }
      $this->load->view('form_naik_kelas',$data);
    }

    function hapus_naik_kelas(){
      $no_sep = $this->input->post('no_sep');
      $this->dashboard_mod->hapusNaikKelas($no_sep);
      redirect('dashboard/index2');
      // redirect('dashboard/index2');
    }

    function cetak_naik_kelas(){
      $no_rawat = $this->input->post('no_rawat');
      // $aksi = $this->input->post('aksi');
      $data['get_pasien']=$this->dashboard_mod->get_naik_kelas_where($no_rawat)->row_array();
      
      $header_naik_kelas = $this->load->view('head_cetak_naik_kelas',$data,true);
      $html_naik_kelas = $this->load->view('cetak_naik_kelas',$data, true);

			$pdfFilePath= $data['get_pasien'];
		
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => [215, 330], 
            'margin_top' => 10, 
        ]);

     

        // $mpdf->SetColumns(0);
        $mpdf->WriteHTML($header_naik_kelas);
        $mpdf->WriteHTML($html_naik_kelas);
     

        
          return $mpdf->Output($pdfFilePath['no_rawat']." ".$pdfFilePath['no_sep'].".pdf", 'I');
        
    }

    function cari_pasien(){
      // $data['menu']           = $this->menu_mod->getmenu($this->session->userdata('id_user'))->result();
      $status = $this->input->post('status');
      $tgl1 = date("Y-m-d",strtotime($this->input->post('tgl1')));
      $tgl2 = date("Y-m-d",strtotime($this->input->post('tgl2')));
      $data['tgl1'] = $tgl1;
      $data['tgl2'] = $tgl2;
      $data['status'] = $status;
      if ($status == "RANAP") {
          $data ['pasien']  = $this->pasien_mod->pasienRanap($tgl1,$tgl2)->result();
          $data ['status'] = "RANAP";
          $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('tgl1')));
          $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('tgl2')));
      } else if ($status == "RALAN") {
          $data ['pasien']  = $this->pasien_mod->pasienRalan($tgl1,$tgl2)->result();
          $data ['status'] = "RALAN";
          $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('tgl1')));
          $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('tgl2')));
      }  else {
        $pasienRanap  = $this->pasien_mod->pasienRanap($tgl1,$tgl2)->result();
        $pasienRalan  = $this->pasien_mod->pasienRalan($tgl1,$tgl2)->result();
        $data ['pasien']  = array_merge($pasienRanap, $pasienRalan);
          $data ['status'] = "SEMUA";
          $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('tgl1')));
          $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('tgl2')));
      }
      $this->load->view('cari_pasien',$data);
  }


    function cari_pasien_pengajuan(){
      // $data['menu']           = $this->menu_mod->getmenu($this->session->userdata('id_user'))->result();
      $status = $this->input->post('status');
      $tgl1 = date("Y-m-d",strtotime($this->input->post('tgl1')));
      $tgl2 = date("Y-m-d",strtotime($this->input->post('tgl2')));
      if ($status == "RANAP") {
          $data ['pasien']  = $this->pasien_mod->pasienRanap($tgl1,$tgl2)->result();
          $data ['status'] = "RANAP";
          $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('start')));
          $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('end')));
      } else if ($status == "RALAN") {
          $data ['pasien']  = $this->pasien_mod->pasienRalan($tgl1,$tgl2)->result();
          $data ['status'] = "RALAN";
          $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('start')));
          $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('end')));
      }  else {
        $data ['pasien']  = $this->pasien_mod->pasienAll($tgl1,$tgl2)->result();
          $data ['status'] = "SEMUA";
          $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('start')));
          $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('end')));
      }
      $this->load->view('cari_pasien',$data);
  }

  function cetak_resume(){
    $data['pasien'] = $this->dashboard_mod->getRegister()->result();
     
    $this->load->view('dashboard_cetak_resume',$data);
  }

  function cari_cetak_resume(){
    $status = $this->input->post('status');
    $tgl1 = date("Y-m-d",strtotime($this->input->post('tgl1')));
    $tgl2 = date("Y-m-d",strtotime($this->input->post('tgl2')));
    $data['tgl1'] = $tgl1;
    $data['tgl2'] = $tgl2;
    $data['status'] = $status;
    if ($status == "RANAP") {
        $data ['pasien']  = $this->pasien_mod->pasienRanapResume($tgl1,$tgl2)->result();
        $data ['status'] = "RANAP";
        $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('tgl1')));
        $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('tgl2')));
    } else if ($status == "RALAN") {
        $data ['pasien']  = $this->pasien_mod->pasienRalanResume($tgl1,$tgl2)->result();
        $data ['status'] = "RALAN";
        $data ['tgl1'] = date("d-m-Y",strtotime($this->input->post('tgl1')));
        $data ['tgl2'] = date("d-m-Y",strtotime($this->input->post('tgl2')));
    } 
    $this->load->view('cari_cetak_resume',$data);
  }

    function upload_berkas($no_rawat){
      $no_rawat = str_replace('-','/',$no_rawat);
      $data['no_rawat'] = $no_rawat;
      $data['jenis_berkas'] = $this->dashboard_mod->getJenisBerkas()->result();
      $this->load->view('form_upload',$data);
    }


    function status_klaim($no_rawat){
      $data = explode('+',$no_rawat);
      $no_rawat = str_replace('-','/',$data[0]);
      $data['tgl1'] = $data[1];
      $data['tgl2'] = $data[2];
      $data['status'] = $data[3];
      $data['no_rawat'] = $no_rawat;
      $data['sep'] = $this->dashboard_mod->get_sep($no_rawat)->row();
      $data['data_status'] = $this->dashboard_mod->get_status_catatan($data['sep']->no_sep)->result();
      $this->load->view('form_status_klaim',$data);
    }

    function status_klaim_dashboard($no_rawat){
      $data = explode('+',$no_rawat);
      $no_rawat = str_replace('-','/',$data[0]);
      $data['status'] = $data[1];
      $data['no_rawat'] = $no_rawat;
      $data['sep'] = $this->dashboard_mod->get_sep($no_rawat)->row();
      $data['data_status'] = $this->dashboard_mod->get_status_catatan(@$data['sep']->no_sep)->result();
      $this->load->view('form_status_klaim_dashboard',$data);
    }

    function ambil_cppt($no_rawat){
      $no_rawat = str_replace('-','/',$no_rawat);
      $data['no_rawat'] = $no_rawat;
      $data['pasien'] = $this->pasien_mod->dataPasien($no_rawat)->row();
      $data['sep']=$this->dashboard_mod->get_sep($no_rawat)->row();
      @$data['get_asmed_ugd']=$this->dashboard_mod->get_asmed_ugd_all($no_rawat)->result();

      if ($data['pasien']->status_lanjut == "Ralan") {
        $data['cppt'] = $this->dashboard_mod->get_pemeriksaan_ralan($data['pasien']->no_rkm_medis,$data['pasien']->tgl_registrasi)->result();
      } else {
        $data['cppt'] = $this->dashboard_mod->get_pemeriksaan_ranap($data['pasien']->no_rkm_medis,$data['pasien']->tgl_registrasi)->result();
      }
        
      $this->load->view('form_ambil_cppt',$data);
    }

    function ambil_cppt_save($no_rawat){
      $data = explode('+',$no_rawat);
      $no_rawat = str_replace('-','/',$data[0]);
      $tgl_perawatan = $data[1];
      $jam_perawatan = $data[2];
      
      $data['sep']=$this->dashboard_mod->get_sep($no_rawat)->row();
      $data['pasien'] = $this->pasien_mod->dataPasien($no_rawat)->row();
      if ($data['pasien']->status_lanjut == "Ranap") {
        $cari_CPPT = $this->dashboard_mod->cari_cppt($no_rawat,$tgl_perawatan,$jam_perawatan)->row();
        $table = "pemeriksaan_ranap_klaim";
        $table_sumber = "pemeriksaan_ranap";
      } else {
        $cari_CPPT = $this->dashboard_mod->cari_cppt_ralan($no_rawat,$tgl_perawatan,$jam_perawatan)->row();
        $table = "pemeriksaan_ralan_klaim";
        $table_sumber = "pemeriksaan_ralan";
      }

      if ($cari_CPPT) {
        $data['status'] = false;
        echo json_encode($data);
      } else {
        $this->dashboard_mod->insertCPPT($table_sumber,$table,$no_rawat,$tgl_perawatan,$jam_perawatan);
        $data['status'] = true;
        echo json_encode($data);
      }

    }

    function hapus_cppt_klaim($no_rawat){
      $data = explode('+',$no_rawat);
      $no_rawat = str_replace('-','/',$data[0]);
      $tgl_perawatan = $data[1];
      $jam_perawatan = $data[2];
      $data = array(
        'no_rawat' => $no_rawat,
        'tgl_perawatan' => $tgl_perawatan,
        'jam_rawat' => $jam_perawatan,
      );
      $sep=$this->dashboard_mod->get_sep($no_rawat)->row();
      $pasien = $this->pasien_mod->dataPasien($no_rawat)->row();

      if ($pasien->status_lanjut == "Ranap") {
        $cari_CPPT = $this->dashboard_mod->cari_cppt($no_rawat,$tgl_perawatan,$jam_perawatan)->row();
        $table = "pemeriksaan_ranap_klaim";
      } else {
        $cari_CPPT = $this->dashboard_mod->cari_cppt_ralan($no_rawat,$tgl_perawatan,$jam_perawatan)->row();
        $table = "pemeriksaan_ralan_klaim";
      }
      if ($cari_CPPT) {  
      $this->dashboard_mod->hapusCPPT($table,$data);
        $data['status'] = true;
        echo json_encode($data);
      } else {
        $data['status'] = false;
        echo json_encode($data);
      }

    }

    function simpan_naik_kelas(){
      $no_sep = $this->input->post('no_sep');
      $tarif1 = $this->input->post('tarif1');
      $tarif2 = $this->input->post('tarif2');
      $presentase = $this->input->post('presentase');
      $tarif_akhir = $this->input->post('tarif_akhir');
      $diagnosa = $this->input->post('diagnosa');
      $data = array(
        'no_sep' => $no_sep,
        'jenis_naik' => $presentase=="" ? "Naik 1 Kelas" : "Naik 2 Kelas",
        'tarif_1' => $tarif1,
        'tarif_2' => $tarif2,
        'presentase' => $presentase,
        'tarif_akhir' => $tarif_akhir,
        'diagnosa' => $diagnosa
      );
      $this->dashboard_mod->insert_naik_kelas($data);
      redirect('dashboard/index2');

    }

    function edit_naik_kelas(){
      $no_rawat = $this->input->post('no_rawat');
      $no_sep = $this->input->post('no_sep');
      $tarif1 = $this->input->post('tarif1');
      $tarif2 = $this->input->post('tarif2');
      $presentase = $this->input->post('presentase');
      $tarif_akhir = $this->input->post('tarif_akhir');
      $diagnosa = $this->input->post('diagnosa');
      $data = array(
        // 'no_sep' => $no_sep,
        'jenis_naik' => $presentase=="" ? "Naik 1 Kelas" : "Naik 2 Kelas",
        'tarif_1' => $tarif1,
        'tarif_2' => $tarif2,
        'presentase' => $presentase,
        'tarif_akhir' => $tarif_akhir,
        'diagnosa' => $diagnosa
      );
      $this->dashboard_mod->edit_naik_kelas($data,$no_sep);
      redirect('dashboard/data_naik_kelas');

    }

    function simpan_status_klaim(){
      // if (isset($_POST['submit'])) {
        $no_rawat = $this->input->post('no_rawat');
        $no_sep = $this->input->post('no_sep');
        $jenis = $this->input->post('jenis');
        $tgl_registrasi = $this->input->post('tgl_registrasi');
        $norm = $this->input->post('norm');
        $status = $this->input->post('status');
        $catatan = $this->input->post('catatan');
        $tanggal = date('Y-m-d');

        $data = array(
            'tanggal' => $tanggal,
            'no_rkm_medis' => $norm,
            'no_rawat' => $no_rawat,
            'tgl_registrasi' => $tgl_registrasi,
            'nosep' => $no_sep,
            'jenis' => $jenis,
            'status' => $status,
            'username' => $this->session->userdata('id_user'),
        );

        $this->dashboard_mod->insert_status($data);
        
        $cek_status = $this->dashboard_mod->cek_status_klaim($no_sep)->row();
        
        if($cek_status){
          $data = array(
            'tanggal' => $tanggal,
            'nosep' => $no_sep,
            'catatan' => $status." - ".$catatan,
            'username' => $this->session->userdata('id_user'),
        );
          $this->dashboard_mod->insert_catatan($data);
        }

        redirect('dashboard/index2');

      // }
    }

    function simpan_upload(){
      if (isset($_POST['submit'])) {
        $no_rawat = $this->input->post('no_rawat');
        $jenis_berkas = $this->input->post('jenis_berkas');
        if($_FILES['berkas']['name'] != ""){
          $config['upload_path']          = 'file';
          $config['allowed_types']        = 'pdf';
          $config['file_name']            = $file_name;
          $config['max_size']             = '200000';
          $config['remove_space']         = true;
          $config['overwrite']            = true;
          $config['encrypt_name']         = false;
          $config['max_width']            = '';
          $config['max_height']           = '';

          $this->load->library('upload',$config);
          $this->upload->initialize($config);
          if($this->upload->do_upload('berkas'))


              $file = $this->upload->data();
              if($file['file_name'])
              {
                  $data['file'] = $file['file_name'];
                  }
              $filename = $data['file'];

      } else {
          $filename = "";
      }

          $data = array(
            'no_rawat'            => $no_rawat,
            'kode'           => $jenis_berkas,
            'lokasi_file'          => $filename,
          );

          $this->dashboard_mod->insert_berkas($data);

        redirect('dashboard/index2');


      }
    }


    function get_lembar_klaim($no_rawat){
        $no_rawat = str_replace('-','/',$no_rawat);
        $sep= $this->dashboard_mod->get_sep($no_rawat)->row();
        $kode_berkas = $this->dashboard_mod->getKodeBerkas()->row();
        $data['no_rawat'] = $no_rawat;
        // $sep = $this->dashboard_mod->get_sep_batch()->result();
        // foreach ($sep as $dt_sep) {
          if($sep){

            // contoh encryption key, bukan aktual
          $key = "983ff0f8e822f0933bb0957467b4bde3df267be0423f7feb6b1e72baf774cb76";
          // membuat json juga dapat menggunakan json_encode:
          $ws_query["metadata"]["method"] = "claim_print";
          $ws_query["data"]["nomor_sep"] = $sep->no_sep;
          $json_request = json_encode($ws_query);
          // data yang akan dikirimkan dengan method POST adalah encrypted:
          $payload = $this->inacbg_encrypt($json_request,$key);
          // tentukan Content-Type pada http header
          $header = array("Content-Type: application/x-www-form-urlencoded");
          // url server aplikasi E-Klaim,
          // silakan disesuaikan instalasi masing-masing
          $url = "http://192.168.100.45/E-Klaim/ws.php";
          // setup curl
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  
          // request dengan curl
          $response = curl_exec($ch);
          // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
          // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
          $first = strpos($response, "\n")+1;
          $last = strrpos($response, "\n")-1;
          $response = substr($response,
          $first,
          strlen($response) - $first - $last);
          // decrypt dengan fungsi inacbg_decrypt
          $response = $this->inacbg_decrypt($response,$key);
          // hasil decrypt adalah format json, ditranslate kedalam array
          $msg = json_decode($response,true);
          // variable data adalah base64 dari file pdf
          $pdf = base64_decode($msg["data"]);
          //hasilnya adalah berupa binary string $pdf, untuk disimpan:
          $filename = $sep->no_sep."_".$kode_berkas->kode.".pdf";
          // var_dump($msg["metadata"]["code"]);
          if ($msg["metadata"]["code"] == 200) {
              file_put_contents("./file/berkas_klaim/".$filename,$pdf);
              
              if (file_exists("./file/berkas_klaim/".$filename)){
                $data = array(
                  'no_rawat' => $no_rawat,
                  'kode' => $kode_berkas->kode,
                  'lokasi_file' => $filename
                );
                // $cek_data = $this->dashboard_mod->cek_data_berkas($dt_sep->no_rawat)->row();
                // if(!$cek_data){
                  $this->dashboard_mod->insert_berkas($data);
                  $data['status'] = true;
                // } 
              echo json_encode($data);
              }  
          } else {
            $data['status'] = false;
              echo json_encode($data);
          }
          } else {
            $data['status'] = false;
              echo json_encode($data);
          }
        // }
        
        
        
        // file_put_contents("klaim.pdf",$pdf);
        // atau untuk ditampilkan dengan perintah:
        // header("Content-type:application/pdf");
        // header("Content-Disposition:attachment;filename=klaim.pdf");
        // echo $pdf;
        // var_dump($pdf);

    }

    function cetak_resume_keuangan(){
      // $no_rawat = str_replace('-','/',$no_rawat);
      $no_rawat = $this->input->post('no_rawat');
      $aksi = $this->input->post('aksi');
      // $exp = explode('+',$val);
      // $no_rawat = $exp[0];
      // $status = $exp[1];

      // $data['status'] = $status;
      $data['get_pasien']=$this->dashboard_mod->get_pasien($no_rawat)->row_array();
      $get_pasien=$this->dashboard_mod->get_pasien($no_rawat)->row();
      $data['get_resep']=$this->dashboard_mod->get_resep($no_rawat)->result();
      $data['get_lab']=$this->dashboard_mod->get_lab($no_rawat)->result();
      $data['pasien'] = $this->pasien_mod->dataPasien($no_rawat)->result();
      $data['cek_gabung'] = $this->pasien_mod->cekPasienGabung($no_rawat)->result();
      $cek_gabung = $this->pasien_mod->cekPasienGabung($no_rawat)->row();
      @$data['get_sep']=$this->dashboard_mod->get_sep($no_rawat)->result();
      @$get_sep=$this->dashboard_mod->get_sep($no_rawat)->row();
      @$data['get_pasien_gabung']=$this->dashboard_mod->get_pasien($cek_gabung->no_rawat2)->row_array();
      @$data['get_resep_gabung']=$this->dashboard_mod->get_resep($cek_gabung->no_rawat2)->result();
      @$data['get_asmed_ugd']=$this->dashboard_mod->get_asmed_ugd($no_rawat)->result();
      @$data['get_resume']=$this->dashboard_mod->get_resume($no_rawat)->result();
      @$data['get_resume_ibu']=$this->dashboard_mod->get_resume($no_rawat)->row();
      @$data['get_resume_gabung']=$this->dashboard_mod->get_resume_gabung($cek_gabung->no_rawat2)->result();
      @$data['get_pemeriksaan_usg']=$this->dashboard_mod->get_pemeriksaan_usg($no_rawat)->row();
      if (@$get_sep->jnspelayanan == "2" || $get_pasien->status_lanjut == "Ranap") {
        @$data['get_pemeriksaan']=$this->dashboard_mod->get_pemeriksaan_ralan_klaim($get_pasien->no_rkm_medis,$get_pasien->tgl_registrasi)->result();
      } else if (@$get_sep->jnspelayanan == "1" || $get_pasien->status_lanjut=="Ralan") {
        @$data['get_pemeriksaan']=$this->dashboard_mod->get_pemeriksaan_ranap_klaim($get_pasien->no_rkm_medis,$get_pasien->tgl_registrasi)->result();
      }
      @$data['get_laporan_operasi']=$this->dashboard_mod->get_laporan_operasi($no_rawat)->result();
      @$get_asmed_ugd=$this->dashboard_mod->get_asmed_ugd($no_rawat)->row();
      @$get_resume=$this->dashboard_mod->get_resume($no_rawat)->row();
      if ($get_resume) {
        if (strpos(@$get_resume->kd_kamar, 'Anak') !== FALSE) {
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('Anak')->row();
       } else if(strpos($get_resume->kd_kamar, 'Kandungan') !== FALSE){
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('Nifas')->row();
       } else if(strpos($get_resume->kd_kamar, 'BY') !== FALSE){
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('PERINATOLOGI')->row();
       } else if(strpos($get_resume->kd_kamar, 'VK') !== FALSE){
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('VK')->row();
       }
      }
      
      @$data['get_diagnosa_primer']=$this->dashboard_mod->get_diagnosa_primer($no_rawat)->row();
      @$primer=$this->dashboard_mod->get_diagnosa_primer($no_rawat)->row();
      @$data['get_diagnosa_sekunder']=$this->dashboard_mod->get_diagnosa_sekunder($no_rawat,$primer->kd_penyakit)->result();
      @$data['get_prosedur']=$this->dashboard_mod->get_prosedur($no_rawat)->result();
      
      $lab=$this->dashboard_mod->get_lab($no_rawat)->result();
      @$laporan_operasi=$this->dashboard_mod->get_laporan_operasi($no_rawat)->result();
      $resep = $this->dashboard_mod->get_resep($no_rawat)->result();
      @$resep_gabung = $this->dashboard_mod->get_resep($cek_gabung->no_rawat2)->result();
      $kasir = $this->dashboard_mod->getKasir($no_rawat)->row();
      $petugas = $this->dashboard_mod->getAsmenKeu()->row();
      @$sep = $this->dashboard_mod->get_sep($no_rawat)->row();
      @$hasil_usg = $this->dashboard_mod->get_hasil_usg($no_rawat)->row();
      @$data['get_ttd_sep']=$this->dashboard_mod->get_ttd_sep($sep->no_sep)->row();

      @$data['get_surat_kontrol']=$this->dashboard_mod->get_surat_kontrol($sep->no_sep)->row();
      @$data['get_spri']=$this->dashboard_mod->get_spri($sep->no_sep)->row();
      @$data['get_skl']=$this->dashboard_mod->get_skl($sep->nomr)->row();
      
      @$data['nama_dokter']=$this->dashboard_mod->get_ttd_dokter($sep->no_sep)->row();
      @$data['nama_pasien']=$this->dashboard_mod->get_sep($no_rawat)->row();
      @$ttd_dokter=$this->dashboard_mod->get_ttd_dokter($sep->no_sep)->row();
      @$ttd_dokter_asmed_ugd=$this->dashboard_mod->getId($get_asmed_ugd->kd_dokter)->row();
      @$data['ttd_dokter'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_dokter->nama."\n"."ID ".$ttd_dokter->sdk,$ttd_dokter->nama);

      @$data['ttd_dokter_asmed_ugd'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_dokter_asmed_ugd->nama."\n"."ID ".$ttd_dokter_asmed_ugd->sdk,$ttd_dokter_asmed_ugd->nama);

      @$data['nama_koor'] = $ttd_resume->nama;
      @$data['ttd_resume'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_resume->nama."\n"."ID ".$ttd_resume->sdk,$ttd_resume->nama);

      if ($sep) {
        @$data['ttd_pasien'] = $this->create_qr2($sep->no_peserta,$sep->nm_pasien);
      }

      
      $needle = 'OLEH '; 
      @$str = substr($kasir->keterangan, strpos($kasir->keterangan, $needle) + strlen($needle));

      $data['nama'] = $petugas->nama;
      $data['nama_kasir'] = (string)$str;
      
      $petugas_kasir = $this->dashboard_mod->getPetugasKasir((string)$str)->row();

      @$data['nama2'] = $petugas_kasir->nama;

      // if (!empty($dokter)) {
      //   $data['ttd1'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$dokter->nama."\n"."ID ".$dokter->sdk,$l->nm_dokter1);
      //   }
      // if (!empty($petugas)) {
        $data['ttd_kasir'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas->nama."\n"."ID ".$petugas->sdk,$petugas->nama);

        @$data['ttd_kasir2'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas_kasir->nama."\n"."ID ".$petugas_kasir->sdk,$petugas_kasir->nama);
        // }

      $header = $this->load->view('head_cetak',$data,true);
      $header_resep_gabung = $this->load->view('head_cetak_resep_gabung',$data,true);
      $header_sep = $this->load->view('head_cetak_sep',$data,true);
      $header_skl = $this->load->view('head_cetak_skl',$data,true);
      $header_asmed_ugd = $this->load->view('head_cetak_asmed_ugd',$data,true);
      // $header_hasil_usg = $this->load->view('head_cetak_hasil_usg',$data,true);
      $header_resume = $this->load->view('head_cetak_resume',$data,true);
      $header_resume_gabung = $this->load->view('head_cetak_resume_gabung',$data,true);
      $header_cppt = $this->load->view('head_cetak_cppt',$data,true);
      $header_laporan_op = $this->load->view('head_cetak_laporan_op',$data,true);
      $header_kasir = $this->load->view('head_cetak_billing',$data,true);
      $head_table = $this->load->view('head_table','',true);
      $html_sep = $this->load->view('cetak_sep',$data, true);
      @$html_asmed_ugd = $this->load->view('cetak_asmed_ugd',$data, true);
      @$html_resume = $this->load->view('cetak_resume',$data, true);
      @$html_resume_gabung = $this->load->view('cetak_resume_gabung',$data, true);
      @$html_pemeriksaan_usg = $this->load->view('cetak_hasil_pemeriksaan_usg',$data, true);
      @$html_laporan_operasi = $this->load->view('cetak_laporan_op',$data, true);
      @$html_surat_kontrol = $this->load->view('cetak_surat_kontrol',$data, true);
      @$html_spri = $this->load->view('cetak_spri',$data, true);
      @$html_skl = $this->load->view('cetak_skl',$data, true);
      @$html_cppt = $this->load->view('cetak_cppt',$data, true);

      

      $html = $this->load->view('cetak_resep',$data, true);
      @$html_resep_gabung = $this->load->view('cetak_resep_gabung',$data, true);
      
      $status = $this->pasien_mod->getStatus($no_rawat)->row();
        var_dump($status);
        if ($sep) {
          if ($sep->jnspelayanan == "1"){
            $html_billing = $this->load->view('cetak_billing',$data, true);
          } else if($sep->jnspelayanan == "2") {
            // $html_billing = $this->load->view('cetak_billing_ralan', $data, true);
            if ($get_pasien->status_lanjut == "Ranap"){
              $html_billing = $this->load->view('cetak_billing',$data, true);
            } else if($get_pasien->status_lanjut == "Ralan") {
              $html_billing = $this->load->view('cetak_billing_ralan', $data, true);
            }
          }
        } else {
          if ($get_pasien->status_lanjut == "Ranap"){
            $html_billing = $this->load->view('cetak_billing',$data, true);
          } else if($get_pasien->status_lanjut == "Ralan") {
            $html_billing = $this->load->view('cetak_billing_ralan', $data, true);
          }
        }
      
      // $html_lab = $this->load->view('cetak_lab',$data, true);
			$pdfFilePath= $data['get_pasien'];
			// $pdfFilePath= $data['get_sep'];
				// $this->load->library('M_pdf');
				// $this->pdf = new mPDF('utf-8', array(215,330), '','',0,0,0,0,0,0);
        // $this->m_pdf->pdf->AddPage('P');
        // $this->m_pdf->pdf->WriteHTML($header);
        // //$this->m_pdf->pdf->SetDisplayMode('fullpage','twoleft');
        // //$this->m_pdf->pdf->WriteHTML($head_table);
        // $this->m_pdf->pdf->SetColumns('2','J','');
        // $this->m_pdf->pdf->WriteHTML($html);
        // $this->m_pdf->pdf->AddColumn();
        // $this->m_pdf->pdf->Output($pdfFilePath['no_rawat']." ".$pdfFilePath['nm_pasien']." (".$pdfFilePath['no_rkm_medis'].")".".pdf", 'I');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => [215, 330], 
            // 'margin_left' => 10, 
            // 'margin_right' => 10, 
            'margin_top' => 10, 
            // 'margin_bottom' => 0,
            // 'margin_header' => 0, 
            // 'margin_footer' => 0,
        ]);

        // $mpdf->WriteHTML($header_sep);
        // $mpdf->WriteHTML($html_sep);
        // $mpdf->AddPage();

  
        if($data['get_resume']){
          $mpdf->WriteHTML($header_resume);
          $mpdf->WriteHTML($html_resume,\Mpdf\HTMLParserMode::HTML_BODY);
          $mpdf->AddPage();
        }

        if($data['get_resume_gabung']){
          $mpdf->WriteHTML($header_resume_gabung);
          $mpdf->WriteHTML($html_resume_gabung,\Mpdf\HTMLParserMode::HTML_BODY);
          $mpdf->AddPage();
        }

        // $mpdf->SetColumns(0);
        $mpdf->WriteHTML($header_kasir);
        $mpdf->WriteHTML($html_billing);
     

        if ($aksi == "lihat") {
          return $mpdf->Output($pdfFilePath['no_rawat']." ".$pdfFilePath['nm_pasien']." (".$pdfFilePath['no_rkm_medis'].")".".pdf", 'I');
        } else if ($aksi == "kirim") {
          $location =  $_SERVER['DOCUMENT_ROOT'].'/simrsiav2/file/berkas_klaim_pengajuan/';
          $kode_berkas = $this->dashboard_mod->getKodeBerkasKlaim()->row();
          $mpdf->Output($location.$sep->no_sep."_".$kode_berkas->kode.".pdf",  \Mpdf\Output\Destination::FILE);
          if (file_exists($_SERVER['DOCUMENT_ROOT'].'/simrsiav2/file/berkas_klaim_pengajuan/'.$sep->no_sep."_".$kode_berkas->kode.".pdf")){
            $filename = $sep->no_sep."_".$kode_berkas->kode.".pdf";
            $data = array(
                'no_rawat' => $no_rawat,
                'kode' => $kode_berkas->kode,
                'lokasi_file' => $filename
              );
              $this->dashboard_mod->insert_berkas($data);
              $data['status'] = true;
              echo json_encode($data);
          } else {
            $data['status'] = false;
            echo json_encode($data);
          }
    //     // print_r($html_billing);

    }



    }

    
    function cetak_resep(){
      // $no_rawat = str_replace('-','/',$no_rawat);
      $no_rawat = $this->input->post('no_rawat');
      $aksi = $this->input->post('aksi');
      // $exp = explode('+',$val);
      // $no_rawat = $exp[0];
      // $status = $exp[1];
      
      
      // $data['status'] = $status;
      $data['get_pasien']=$this->dashboard_mod->get_pasien($no_rawat)->row_array();
      $get_pasien=$this->dashboard_mod->get_pasien($no_rawat)->row();
      $data['get_resep']=$this->dashboard_mod->get_resep($no_rawat)->result();
      $data['get_lab']=$this->dashboard_mod->get_lab($no_rawat)->result();
      $data['get_radiologi']=$this->dashboard_mod->get_radiologi_rs($no_rawat)->result();
      $data['get_pasien_naik_kelas']=$this->dashboard_mod->get_naik_kelas_where($no_rawat)->row_array();
      $get_pasien_naik_kelas=$this->dashboard_mod->get_naik_kelas_where($no_rawat)->row();
      // $data['get_pasien_naik_kelas2']=$this->dashboard_mod->get_naik_kelas_where2($no_rawat)->row();
      @$cek_jenis_pasien = $this->dashboard_mod->getJenisPasien($no_rawat)->row();
      if(@$cek_jenis_pasien) {
        if($get_pasien->kd_poli == "U0016" || $get_pasien->kd_poli == "OPE") {
          @$cari_no_rawat_lab = $this->dashboard_mod->get_register_lab_doble($get_pasien->no_rawat,$get_pasien->no_rkm_medis)->row();
        }
      }
      $data['pasien'] = $this->pasien_mod->dataPasien($no_rawat)->result();
      $data['cek_gabung'] = $this->pasien_mod->cekPasienGabung($no_rawat)->result();
      $cek_gabung = $this->pasien_mod->cekPasienGabung($no_rawat)->row();
      @$data['get_sep']=$this->dashboard_mod->get_sep($no_rawat)->result();
      @$get_sep=$this->dashboard_mod->get_sep($no_rawat)->row();
      @$data['get_pasien_gabung']=$this->dashboard_mod->get_pasien($cek_gabung->no_rawat2)->row_array();
      @$data['get_resep_gabung']=$this->dashboard_mod->get_resep($cek_gabung->no_rawat2)->result();
      @$data['get_asmed_ugd']=$this->dashboard_mod->get_asmed_ugd($no_rawat)->result();
      @$data['get_resume']=$this->dashboard_mod->get_resume($no_rawat)->result();
      @$data['get_pemeriksaan_usg']=$this->dashboard_mod->get_pemeriksaan_usg($no_rawat)->row();
      if (@$get_sep->jnspelayanan == "2") {
        @$data['get_pemeriksaan']=$this->dashboard_mod->get_pemeriksaan_ralan_klaim($get_pasien->no_rkm_medis,$get_pasien->tgl_registrasi)->result();
        @$get_pemeriksaan_ralan_klaim=$this->dashboard_mod->get_pemeriksaan_ralan_klaim($get_pasien->no_rkm_medis,$get_pasien->tgl_registrasi)->result();
      } else if (@$get_sep->jnspelayanan == "1") {
        @$data['get_pemeriksaan']=$this->dashboard_mod->get_pemeriksaan_ranap_klaim($get_pasien->no_rkm_medis,$get_pasien->tgl_registrasi)->result();
      }
      @$data['get_laporan_operasi']=$this->dashboard_mod->get_laporan_operasi($no_rawat)->result();
      @$get_asmed_ugd=$this->dashboard_mod->get_asmed_ugd($no_rawat)->row();
      @$get_resume=$this->dashboard_mod->get_resume($no_rawat)->row();
      if ($get_resume) {
        if (strpos(@$get_resume->kd_kamar, 'Anak') !== FALSE) {
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('Anak')->row();
       } else if(strpos($get_resume->kd_kamar, 'Kandungan') !== FALSE){
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('Nifas')->row();
       } else if(strpos($get_resume->kd_kamar, 'BY') !== FALSE){
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('PERINATOLOGI')->row();
       } else if(strpos($get_resume->kd_kamar, 'VK') !== FALSE){
          @$ttd_resume = $this->dashboard_mod->cari_ttd_petugas('VK')->row();
       }
      }
      
      @$data['get_diagnosa_primer']=$this->dashboard_mod->get_diagnosa_primer($no_rawat)->row();
      @$primer=$this->dashboard_mod->get_diagnosa_primer($no_rawat)->row();
      @$data['get_diagnosa_sekunder']=$this->dashboard_mod->get_diagnosa_sekunder($no_rawat,$primer->kd_penyakit)->result();
      @$data['get_prosedur']=$this->dashboard_mod->get_prosedur($no_rawat)->result();
      
      $lab=$this->dashboard_mod->get_lab($no_rawat)->result();
      $radiologi_rs=$this->dashboard_mod->get_radiologi_rs($no_rawat)->result();
      @$lab_doble=$this->dashboard_mod->get_lab($cari_no_rawat_lab->no_rawat)->result();
      @$laporan_operasi=$this->dashboard_mod->get_laporan_operasi($no_rawat)->result();
      $resep = $this->dashboard_mod->get_resep($no_rawat)->result();
      @$resep_gabung = $this->dashboard_mod->get_resep($cek_gabung->no_rawat2)->result();
      $kasir = $this->dashboard_mod->getKasir($no_rawat)->row();
      $petugas = $this->dashboard_mod->getAsmenKeu()->row();
      @$sep = $this->dashboard_mod->get_sep($no_rawat)->row();
      @$hasil_usg = $this->dashboard_mod->get_hasil_usg($no_rawat)->row();
      @$data['get_ttd_sep']=$this->dashboard_mod->get_ttd_sep($sep->no_sep)->row();

      @$data['get_surat_kontrol']=$this->dashboard_mod->get_surat_kontrol($sep->no_sep)->row();
      @$data['get_spri']=$this->dashboard_mod->get_spri($sep->no_sep)->row();
      @$data['get_skl']=$this->dashboard_mod->get_skl($sep->nomr)->row();
      
      @$data['nama_dokter']=$this->dashboard_mod->get_ttd_dokter($sep->no_sep)->row();
      @$data['nama_pasien']=$this->dashboard_mod->get_sep($no_rawat)->row();
      @$ttd_dokter=$this->dashboard_mod->get_ttd_dokter($sep->no_sep)->row();
      if ($ttd_dokter) {
        $ttd_dokter = $ttd_dokter;
      } else {
        $ttd_dokter_by_nip=$this->dashboard_mod->get_ttd_dokter_by_nip($sep->no_sep)->row();
        $ttd_dokter = $ttd_dokter_by_nip;
      }
      @$ttd_dokter_asmed_ugd=$this->dashboard_mod->getId($get_asmed_ugd->kd_dokter)->row();
      @$data['ttd_dokter'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_dokter->nama."\n"."ID ".$ttd_dokter->sdk,$ttd_dokter->nama);

      @$data['ttd_dokter_asmed_ugd'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_dokter_asmed_ugd->nama."\n"."ID ".$ttd_dokter_asmed_ugd->sdk,$ttd_dokter_asmed_ugd->nama);

      if ($get_pasien->no_rkm_medis == "025427") {
        @$ttd_resume = $this->dashboard_mod->cari_ttd_plt()->row();
        @$data['nama_koor'] = $ttd_resume->nama;
        @$data['ttd_resume'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_resume->nama."\n"."ID ".$ttd_resume->sdk,$ttd_resume->nama);
      }
      @$data['nama_koor'] = $ttd_resume->nama;
      @$data['ttd_resume'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_resume->nama."\n"."ID ".$ttd_resume->sdk,$ttd_resume->nama);

      if ($sep) {
        @$data['ttd_pasien'] = $this->create_qr2($sep->no_peserta,$sep->nm_pasien);
      }

      
      $needle = 'OLEH '; 
      @$str = substr($kasir->keterangan, strpos($kasir->keterangan, $needle) + strlen($needle));

      $data['nama'] = $petugas->nama;
      $data['nama_kasir'] = (string)$str;
      
      $petugas_kasir = $this->dashboard_mod->getPetugasKasir((string)$str)->row();

      @$data['nama2'] = $petugas_kasir->nama;

      // if (!empty($dokter)) {
      //   $data['ttd1'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$dokter->nama."\n"."ID ".$dokter->sdk,$l->nm_dokter1);
      //   }
      // if (!empty($petugas)) {
        $data['ttd_kasir'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas->nama."\n"."ID ".$petugas->sdk,$petugas->nama);

        @$data['ttd_kasir2'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas_kasir->nama."\n"."ID ".$petugas_kasir->sdk,$petugas_kasir->nama);
        // }

      $header = $this->load->view('head_cetak',$data,true);
      $header_resep_gabung = $this->load->view('head_cetak_resep_gabung',$data,true);
      $header_sep = $this->load->view('head_cetak_sep',$data,true);
      $header_skl = $this->load->view('head_cetak_skl',$data,true);
      $header_asmed_ugd = $this->load->view('head_cetak_asmed_ugd',$data,true);
      // $header_hasil_usg = $this->load->view('head_cetak_hasil_usg',$data,true);
      $header_resume = $this->load->view('head_cetak_resume',$data,true);
      $header_cppt = $this->load->view('head_cetak_cppt',$data,true);
      $header_laporan_op = $this->load->view('head_cetak_laporan_op',$data,true);
      $header_kasir = $this->load->view('head_cetak_billing',$data,true);
      $head_table = $this->load->view('head_table','',true);
      $html_sep = $this->load->view('cetak_sep',$data, true);
      @$html_asmed_ugd = $this->load->view('cetak_asmed_ugd',$data, true);
      @$html_resume = $this->load->view('cetak_resume',$data, true);
      @$html_pemeriksaan_usg = $this->load->view('cetak_hasil_pemeriksaan_usg',$data, true);
      @$html_laporan_operasi = $this->load->view('cetak_laporan_op',$data, true);
      @$html_surat_kontrol = $this->load->view('cetak_surat_kontrol',$data, true);
      @$html_spri = $this->load->view('cetak_spri',$data, true);
      @$html_skl = $this->load->view('cetak_skl',$data, true);
      @$html_cppt = $this->load->view('cetak_cppt',$data, true);
      $header_naik_kelas = $this->load->view('head_cetak_naik_kelas',$data,true);
      @$html_naik_kelas = $this->load->view('cetak_naik_kelas_ttd',$data, true);

      

      $html = $this->load->view('cetak_resep',$data, true);
      @$html_resep_gabung = $this->load->view('cetak_resep_gabung',$data, true);
      
      $status = $this->pasien_mod->getStatus($no_rawat)->row();
        var_dump($status);
        if ($sep) {
          if ($get_pasien->status_lanjut == "Ranap"){
            $html_billing = $this->load->view('cetak_billing',$data, true);
          } else if($get_pasien->status_lanjut == "Ralan") {
            $html_billing = $this->load->view('cetak_billing_ralan', $data, true);
          }
        } else {
          if ($get_pasien->status_lanjut == "Ranap"){
            $html_billing = $this->load->view('cetak_billing',$data, true);
          } else if($get_pasien->status_lanjut == "Ralan") {
            $html_billing = $this->load->view('cetak_billing_ralan', $data, true);
          }
        }
      
      // $html_lab = $this->load->view('cetak_lab',$data, true);
			$pdfFilePath= $data['get_pasien'];
			// $pdfFilePath= $data['get_sep'];
				// $this->load->library('M_pdf');
				// $this->pdf = new mPDF('utf-8', array(215,330), '','',0,0,0,0,0,0);
        // $this->m_pdf->pdf->AddPage('P');
        // $this->m_pdf->pdf->WriteHTML($header);
        // //$this->m_pdf->pdf->SetDisplayMode('fullpage','twoleft');
        // //$this->m_pdf->pdf->WriteHTML($head_table);
        // $this->m_pdf->pdf->SetColumns('2','J','');
        // $this->m_pdf->pdf->WriteHTML($html);
        // $this->m_pdf->pdf->AddColumn();
        // $this->m_pdf->pdf->Output($pdfFilePath['no_rawat']." ".$pdfFilePath['nm_pasien']." (".$pdfFilePath['no_rkm_medis'].")".".pdf", 'I');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => [215, 330], 
            // 'margin_left' => 10, 
            // 'margin_right' => 10, 
            'margin_top' => 10, 
            // 'margin_bottom' => 0,
            // 'margin_header' => 0, 
            // 'margin_footer' => 0,
        ]);

        // $mpdf->WriteHTML($header_sep);
        // $mpdf->WriteHTML($html_sep);
        // $mpdf->AddPage();

        $get_berkas_klaim_inacbg = $this->dashboard_mod->get_berkas_klaim_inacbg($no_rawat)->row();
        @$usg = $this->dashboard_mod->get_usg($no_rawat)->result();
        @$resume_berkas = $this->dashboard_mod->get_resume_berkas($no_rawat)->result();

       

        if($data['get_sep']){
          $mpdf->WriteHTML($header_sep);
          $mpdf->WriteHTML($html_sep);
          $mpdf->AddPage();
        }

       

        if($data['get_asmed_ugd']){
          $mpdf->WriteHTML($header_asmed_ugd);
          $mpdf->WriteHTML($html_asmed_ugd,\Mpdf\HTMLParserMode::HTML_BODY);
          $mpdf->AddPage();
        }

        // print_r($data['get_resume']);
        if($data['get_resume']){
          $mpdf->WriteHTML($header_resume);
          $mpdf->WriteHTML($html_resume,\Mpdf\HTMLParserMode::HTML_BODY);
          $mpdf->AddPage();
        }


        if($resume_berkas){
          // $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$resume_berkas->file, 10, 10, 0, 0, 'jpg', '', true, true);
          // $mpdf->AddPage();
          foreach($resume_berkas as $dt){
            if(strpos($dt->file,",") !== false){
            $data = explode(",",$dt->file);
            foreach($data as $dt){
              $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt, 10, 10, 0, 0, 'jpg', '', true, true);
            // echo $lainnya;
              if(count($data)>=1){
                $mpdf->AddPage();
              }
            }

            } else {
              foreach($resume_berkas as $dt){
                $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt->file, 10, 10, 0, 0, 'jpg', '', true, true);
              // echo $lainnya;
                if(count($data)>=1){
                  $mpdf->AddPage();
                }
              }
            }
            
          }
        }

        if (@$sep->jnspelayanan == "2") {
          if($data['get_pemeriksaan']){
            foreach ($get_pemeriksaan_ralan_klaim as $rs) {
              if (count($get_pemeriksaan_ralan_klaim)>1 && $rs->nm_poli=="UGD") {
                  $data['get_asmed_ugd']=$this->dashboard_mod->get_asmed_ugd($rs->no_rawat)->result();
                // if($data['get_asmed_ugd']){
                  $header_asmed_ugd = $this->load->view('head_cetak_asmed_ugd',$data,true);
                  @$html_asmed_ugd = $this->load->view('cetak_asmed_ugd',$data, true);
                  $mpdf->WriteHTML($header_asmed_ugd);
                  $mpdf->WriteHTML($html_asmed_ugd,\Mpdf\HTMLParserMode::HTML_BODY);
                  $mpdf->AddPage();
                // }
              }
            }
            $mpdf->WriteHTML($header_cppt);
            $mpdf->WriteHTML($html_cppt,\Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->AddPage();
          }
        } else {
          if(@$data['get_pemeriksaan']){
            
            $mpdf->WriteHTML($header_cppt);
            $mpdf->WriteHTML($html_cppt,\Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->AddPage();
          }
        }
        
        
        // if($data['get_laporan_operasi']){
        //   $mpdf->WriteHTML($header_laporan_op);
        //   $mpdf->WriteHTML($html_laporan_operasi);
        //   $mpdf->AddPage();
        // }

        foreach ($laporan_operasi as $dt ) {
          $data['no_rawat'] = $dt->no_rawat;
          $data['nm_pasien'] = $dt->nm_pasien;
          $data['no_rkm_medis'] = $dt->no_rkm_medis;
          $data['umurdaftar'] = $dt->umurdaftar;
          $data['sttsumur'] = $dt->sttsumur;
          $data['jk'] = $dt->jk;
          $data['alamat'] = $dt->alamat;
          $data['no_tlp'] = $dt->no_tlp;
          $data['tgl_operasi'] = $dt->tgl_operasi;
          $data['tgl_selesai'] = $dt->tgl_selesai;
          @$ttd_dokter=$this->dashboard_mod->get_ttd_dokter($sep->no_sep)->row();
          @$data['ttd_dokter'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$ttd_dokter->nama."\n"."ID ".$ttd_dokter->sdk,$ttd_dokter->nama);
          @$header_laporan_op = $this->load->view('head_cetak_laporan_op2',$data,true);
          @$html_laporan_operasi = $this->load->view('cetak_laporan_op2',$data, true);
          $mpdf->WriteHTML($header_laporan_op);
          $mpdf->WriteHTML($html_laporan_operasi);
          $mpdf->AddPage();
        }


        if(@$data['get_surat_kontrol']){
          $mpdf->WriteHTML($html_surat_kontrol);
          $mpdf->AddPage();
 
        }

        $data['get_spri'] = $this->dashboard_mod->get_spri($sep->no_sep)->row();

        if(@$data['get_spri']){
          $mpdf->WriteHTML($html_spri);
          $mpdf->AddPage();
        }

        @$skl = $this->dashboard_mod->get_skl($no_rawat)->row();
        if($skl){
          $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$skl->file, 10, 10, 0, 0, 'jpg', '', true, true);
          // $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$skl->file, 10, 10, 200, 287, 'jpg', '', true, false);
          $mpdf->AddPage();
        }

        @$legalisasi = $this->dashboard_mod->get_legalisasi($no_rawat)->row();
        if($legalisasi){
          $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$legalisasi->file, 10, 10, 0, 0, 'jpg', '', true, true);
          // $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$skl->file, 10, 10, 200, 287, 'jpg', '', true, false);
          $mpdf->AddPage();
        }
        @$km = $this->dashboard_mod->get_km($no_rawat)->row();
        if($km){
          $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$km->file, 10, 10, 0, 0, 'jpg', '', true, true);
          // $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$skl->file, 10, 10, 200, 287, 'jpg', '', true, false);
          $mpdf->AddPage();
        }
        @$form_rujukan = $this->dashboard_mod->get_form_rujukan($no_rawat)->row();
        if($form_rujukan){
          $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$form_rujukan->file, 10, 10, 0, 0, 'jpg', '', true, true);
          // $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$skl->file, 10, 10, 200, 287, 'jpg', '', true, false);
          $mpdf->AddPage();
        }

        @$surat_rujukan = $this->dashboard_mod->get_surat_rujukan($no_rawat)->result();
        
        if($surat_rujukan){
          foreach($surat_rujukan as $dt){
            if(strpos($dt->file,",") !== false){
            $data = explode(",",$dt->file);
            foreach($data as $dt){
              $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt, 10, 10, 0, 0, 'jpg', '', true, true);
            // echo $lainnya;
              if(count($data)>=1){
                $mpdf->AddPage();
              }
            }

            } else {
              foreach($surat_rujukan as $dt){
                $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt->file, 10, 10, 0, 0, 'jpg', '', true, true);
              // echo $lainnya;
                if(count($data)>=1){
                  $mpdf->AddPage();
                }
              }
            }
            
          }
        }
        
        @$cppt = $this->dashboard_mod->get_cppt($no_rawat)->row();

        if($cppt){
          $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$cppt->file, 10, 10, 0, 0, 'jpg', '', true, true);
          $mpdf->AddPage();
        }

        if(@$data['get_pemeriksaan_usg']){
          $mpdf->WriteHTML($html_pemeriksaan_usg);
          $mpdf->AddPage();
        }

        if($usg){ 
          foreach($usg as $dt){
              if(strpos($dt->file,",") !== false){
              $data = explode(",",$dt->file);
              foreach($data as $dt){
                $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt, 10, 10, 0, 0, 'jpg', '', true, true);
              // echo $lainnya;
                if(count($data)>=1){
                  $mpdf->AddPage();
                }
              }

              } else {
                foreach($usg as $dt){
                  $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt->file, 10, 10, 0, 0, 'jpg', '', true, true);
                // echo $lainnya;
                  if(count($data)>=1){
                    $mpdf->AddPage();
                  }
                }
              }
              
            }
        }
        // if($sep->tgl_registrasi == $sep->tgl_lahir){
        //   $mpdf->WriteHTML($header_skl);
        //   $mpdf->AddPage();
        // }
        
        @$laborat = $this->dashboard_mod->get_laborat($no_rawat)->result();
        @$radiologi = $this->dashboard_mod->get_radiologi($no_rawat)->result();

        @$lainnya = $this->dashboard_mod->get_lainnya($no_rawat)->result();

       @$get_covid = $this->dashboard_mod->getCovid($no_rawat)->row();

       if (@$get_covid) {
          @$get_hasil_covid = $this->dashboard_mod->getHasilCovid($get_covid->tgl_periksa,$get_covid->jam,$get_covid->no_rawat)->row();
          @$get_detail_periksa = $this->dashboard_mod->getDetailCovid($get_hasil_covid->tgl_periksa,$get_hasil_covid->jam,$get_hasil_covid->no_rawat)->row();
       }
       
       if (!@$get_detail_periksa) {
        foreach($lab as $l){

          $data['no_rawat'] = $l->no_rawat;
          $data['nm_pasien'] = $l->nm_pasien;
          $data['no_rkm_medis'] = $l->no_rkm_medis;
          $data['umurdaftar'] = $l->umurdaftar;
          $data['sttsumur'] = $l->sttsumur;
          $data['jk'] = $l->jk;
          $data['alamat'] = $l->alamat;
          $data['nm_dokter1'] = $l->nm_dokter1;
          $data['nm_dokter2'] = $l->nm_dokter2;
          $data['tgl_periksa'] = $l->tgl_periksa;
          $data['jam'] = $l->jam;
          $data['nama'] = $l->nama;
          $kamar = $this->dashboard_mod->getKamar($l->no_rawat)->row();
          if (!isset($kamar->kd_kamar)) {
            $data['ruang'] = "Poli";
            $data['nama_ruang'] = $this->dashboard_mod->getNamaPoli($l->no_rawat)->row()->nm_poli;
          } else {
            $data['ruang'] = "Kamar";
            $data['nama_ruang'] = $kamar->kd_kamar;
          }
          $dokter_perujuk = $this->dashboard_mod->getId($l->dokter_perujuk)->row();
          $dokter = $this->dashboard_mod->getId($l->kd_dokter)->row();
          $petugas = $this->dashboard_mod->getId($l->nip)->row();
          if (!empty($dokter)) {
            $data['ttd1'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$l->nm_dokter1."\n"."ID ".$dokter->sdk,$l->nm_dokter1);
            }
          if (!empty($petugas)) {
            $data['ttd2'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas->nama."\n"."ID ".$petugas->sdk,$l->nama);
            }
          $header_lab = $this->load->view('head_cetak_lab',$data,true);      
          $html_lab = $this->load->view('cetak_lab',$data, true);
          $mpdf->WriteHTML($header_lab);
          $mpdf->WriteHTML($html_lab);
          
          if (count($lab) >= 1) {
          $mpdf->AddPage();
          }
                  
        }
       }
        

       if (!@$get_detail_periksa) {
        foreach($lab_doble as $l){

          $data['no_rawat'] = $l->no_rawat;
          $data['nm_pasien'] = $l->nm_pasien;
          $data['no_rkm_medis'] = $l->no_rkm_medis;
          $data['umurdaftar'] = $l->umurdaftar;
          $data['sttsumur'] = $l->sttsumur;
          $data['jk'] = $l->jk;
          $data['alamat'] = $l->alamat;
          $data['nm_dokter1'] = $l->nm_dokter1;
          $data['nm_dokter2'] = $l->nm_dokter2;
          $data['tgl_periksa'] = $l->tgl_periksa;
          $data['jam'] = $l->jam;
          $data['nama'] = $l->nama;
          $kamar = $this->dashboard_mod->getKamar($l->no_rawat)->row();
          if (!isset($kamar->kd_kamar)) {
            $data['ruang'] = "Poli";
            $data['nama_ruang'] = $this->dashboard_mod->getNamaPoli($l->no_rawat)->row()->nm_poli;
          } else {
            $data['ruang'] = "Kamar";
            $data['nama_ruang'] = $kamar->kd_kamar;
          }
          $dokter_perujuk = $this->dashboard_mod->getId($l->dokter_perujuk)->row();
          $dokter = $this->dashboard_mod->getId($l->kd_dokter)->row();
          $petugas = $this->dashboard_mod->getId($l->nip)->row();
          if (!empty($dokter)) {
            $data['ttd1'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$l->nm_dokter1."\n"."ID ".$dokter->sdk,$l->nm_dokter1);
            }
          if (!empty($petugas)) {
            $data['ttd2'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas->nama."\n"."ID ".$petugas->sdk,$l->nama);
            }
          $header_lab = $this->load->view('head_cetak_lab',$data,true);      
          $html_lab = $this->load->view('cetak_lab',$data, true);
          $mpdf->WriteHTML($header_lab);
          $mpdf->WriteHTML($html_lab);
          
          if (count($lab_doble) >= 1) {
          $mpdf->AddPage();
          }
                  
        }
      }
      

      if($laborat){
        foreach($laborat as $dt){
          if(strpos($dt->file,",") !== false){
          $data = explode(",",$dt->file);
          foreach($data as $dt){
            $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt, 10, 10, 0, 0, 'jpg', '', true, true);
          // echo $lainnya;
            if(count($data)>=1){
              $mpdf->AddPage();
            }
          }

          } else {
            foreach($laborat as $dt){
              $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt->file, 10, 10, 0, 0, 'jpg', '', true, true);
            // echo $lainnya;
              if(count($data)>=1){
                $mpdf->AddPage();
              }
            }
          }
          
        }
      }


      if (@$radiologi_rs) {
        foreach($radiologi_rs as $l){

          $data['no_rawat'] = $l->no_rawat;
          $data['nm_pasien'] = $l->nm_pasien;
          $data['no_rkm_medis'] = $l->no_rkm_medis;
          $data['umurdaftar'] = $l->umurdaftar;
          $data['sttsumur'] = $l->sttsumur;
          $data['jk'] = $l->jk;
          $data['alamat'] = $l->alamat;
          $data['nm_dokter1'] = $l->nm_dokter1;
          $data['nm_dokter2'] = $l->nm_dokter2;
          $data['tgl_periksa'] = $l->tgl_periksa;
          $data['jam'] = $l->jam;
          $data['nama'] = $l->nama;
          $data['nama_perawatan'] = $l->nm_perawatan;
          $data['kd_dokter'] = $l->kd_dokter;
          $kamar = $this->dashboard_mod->getKamar($l->no_rawat)->row();
          if (!isset($kamar->kd_kamar)) {
            $data['ruang'] = "Poli";
            $data['nama_ruang'] = $this->dashboard_mod->getNamaPoli($l->no_rawat)->row()->nm_poli;
          } else {
            $data['ruang'] = "Kamar";
            $data['nama_ruang'] = $kamar->kd_kamar;
          }
          $dokter_perujuk = $this->dashboard_mod->getId($l->dokter_perujuk)->row();
          $dokter = $this->dashboard_mod->getId($l->kd_dokter)->row();
          $petugas = $this->dashboard_mod->getId($l->nip)->row();
          if (!empty($dokter)) {
            $data['ttd_rad1'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$l->nm_dokter1."\n"."ID ".$dokter->sdk,$l->nm_dokter1);
            } else {
              $data['ttd_rad1'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$l->nm_dokter1."\n"."ID ".$l->kd_dokter,$l->nm_dokter1);
            }
          if (!empty($petugas)) {
            $data['ttd_rad2'] = $this->create_qr("Dikeluarkan di RSIA AISYIYAH PEKAJANGAN\n"."Ditandatangani secara elektronik oleh ".$petugas->nama."\n"."ID ".$petugas->sdk,$l->nama);
            }
          $header_rad = $this->load->view('head_cetak_radiologi',$data,true);      
          $html_rad = $this->load->view('cetak_radiologi',$data, true);
          $mpdf->WriteHTML($header_rad);
          $mpdf->WriteHTML($html_rad);
          
          if (count($radiologi_rs) >= 1) {
          $mpdf->AddPage();
          }
                  
        }
       }


      if($radiologi){
        foreach($radiologi as $dt){
          if(strpos($dt->file,",") !== false){
          $data = explode(",",$dt->file);
          foreach($data as $dt){
            $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt, 10, 10, 0, 0, 'jpg', '', true, true);
          // echo $lainnya;
            if(count($data)>=1){
              $mpdf->AddPage();
            }
          }

          } else {
            foreach($radiologi as $dt){
              $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt->file, 10, 10, 0, 0, 'jpg', '', true, true);
            // echo $lainnya;
              if(count($data)>=1){
                $mpdf->AddPage();
              }
            }
          }
          
        }
      }
      if($lainnya){
        foreach($lainnya as $dt){
          if(strpos($dt->file,",") !== false){
          $data = explode(",",$dt->file);
          foreach($data as $dt){
            $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt, 10, 10, 0, 0, 'jpg', '', true, true);
          // echo $lainnya;
            if(count($data)>=1){
              $mpdf->AddPage();
            }
          }

          } else {
            foreach($lainnya as $dt){
              $mpdf->Image('http://192.168.100.33/erm/public/erm/'.$dt->file, 10, 10, 0, 0, 'jpg', '', true, true);
            // echo $lainnya;
              if(count($data)>=1){
                $mpdf->AddPage();
              }
            }
          }
          
        }
      }



        if (count($resep) >= 1) {
          $mpdf->WriteHTML($header);
          $mpdf->SetColumns(2);
          $mpdf->WriteHTML($html);
          $mpdf->AddColumn();
          $mpdf->AddPage('P');
        }

        if (count($resep_gabung) >= 1) {
          $mpdf->SetColumns(0);
          $mpdf->WriteHTML($header_resep_gabung);
          $mpdf->SetColumns(2);
          $mpdf->WriteHTML($html_resep_gabung);
          $mpdf->AddColumn();
          $mpdf->AddPage('P');
        }

        $mpdf->SetColumns(0);
        $mpdf->WriteHTML($header_kasir);
        $mpdf->WriteHTML($html_billing);

        if(@$get_pasien_naik_kelas){
          $mpdf->AddColumn();
          $mpdf->WriteHTML($header_naik_kelas);
          $mpdf->WriteHTML($html_naik_kelas);
        }
        if($get_berkas_klaim_inacbg){
          $pagecount = $mpdf->setSourceFile("./file/berkas_klaim/".$get_berkas_klaim_inacbg->lokasi_file);
          $tplId = $mpdf->importPage($pagecount);
          $mpdf->AddPage('P');
          $mpdf->useTemplate($tplId);
        }

        // $cek_data = $this->dashboard_mod->get_naik_kelas_where2($no_rawat)->row_array();
        // $mpdf->WriteHTML($pdf);
        // $mpdf->AddPage('P');
        // $mpdf->WriteHTML($nilai);

        if ($aksi == "lihat") {
          return $mpdf->Output($pdfFilePath['no_rawat']." ".$pdfFilePath['nm_pasien']." (".$pdfFilePath['no_rkm_medis'].")".".pdf", 'I');
          
          // var_dump($data['get_spri']->no_surat);

        } else if ($aksi == "kirim") {
          $location =  $_SERVER['DOCUMENT_ROOT'].'/simrsiav2/file/berkas_klaim_pengajuan/';
          $kode_berkas = $this->dashboard_mod->getKodeBerkasKlaim()->row();
          $mpdf->Output($location.$sep->no_sep."_".$kode_berkas->kode.".pdf",  \Mpdf\Output\Destination::FILE);
          if (file_exists($_SERVER['DOCUMENT_ROOT'].'/simrsiav2/file/berkas_klaim_pengajuan/'.$sep->no_sep."_".$kode_berkas->kode.".pdf")){
            $filename = $sep->no_sep."_".$kode_berkas->kode.".pdf";
            $data = array(
                'no_rawat' => $no_rawat,
                'kode' => $kode_berkas->kode,
                'lokasi_file' => $filename
              );
              $this->dashboard_mod->insert_berkas($data);
              $data['status'] = true;
              echo json_encode($data);
          } else {
            $data['status'] = false;
            echo json_encode($data);
          }
        // print_r($html_billing);

    }
  }

  function berkas_klaim(){
    $no_rawat = $this->input->post('no_rawat');
    $aksi = $this->input->post('aksi');
    $data['get_pasien']=$this->dashboard_mod->get_pasien($no_rawat)->row_array();

    
      $get_berkas_klaim = $this->dashboard_mod->get_berkas_klaim($no_rawat)->row();
      
  
      // if($get_berkas_klaim){
      //   $pagecount = $mpdf->setSourceFile($_SERVER["DOCUMENT_ROOT"]."/simrsiav2/file/berkas_klaim_pengajuan/".$get_berkas_klaim->lokasi_file);
      //   $tplId = $mpdf->importPage($pagecount);
      //   $mpdf->AddPage('P');
      //   $mpdf->useTemplate($tplId);
      // }
      $filename = $_SERVER["DOCUMENT_ROOT"]."/simrsiav2/file/berkas_klaim_pengajuan/".$get_berkas_klaim->lokasi_file;
      // file_put_contents($_SERVER["DOCUMENT_ROOT"]."/simrsiav2/file/berkas_klaim_pengajuan/".$get_berkas_klaim->lokasi_file);
      header("Content-type:application/pdf");
      header("Content-Length: " . filesize($filename));
      // echo $_SERVER["DOCUMENT_ROOT"]."/simrsiav2/file/berkas_klaim_pengajuan/".$get_berkas_klaim->lokasi_file;
      readfile($filename);

      // return $mpdf->Output($pdfFilePath['no_rawat']." ".$pdfFilePath['nm_pasien']." (".$pdfFilePath['no_rkm_medis'].")".".pdf", 'I');
      // print_r($html_billing);

  }

    function create_qr($datanya,$nama){
      // Create a basic QR code
  $data = $datanya;
  $qrCode = new QrCode($data);
  $qrCode->setSize(100);
  
  // Set advanced options
  $qrCode->setWriterByName('png');
  $qrCode->setMargin(10);
  $qrCode->setEncoding('UTF-8');
  $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
  $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
  $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
  $qrCode->setLogoPath('assets/rsiap.png');
  $qrCode->setLogoWidth(40);
  $qrCode->setValidateResult(false);
  
  // Directly output the QR code
  //header('Content-Type: '.$qrCode->getContentType());
  //echo $qrCode->writeString();
  
  // Save it to a file
  //$filename = time().'.png';
  $filename = $nama.".png";
  $qrCode->writeFile('assets/'.$filename);
  return $filename;
  
  //echo $file_name;
  //$qrCode->writeFile('assets/qrcode_'.time().'.png');
  
  // Create a response object
  //$response = new QrCodeResponse($qrCode);
  
  }
    function create_qr2($datanya,$nama){
      // Create a basic QR code
  $data = $datanya;
  $qrCode = new QrCode($data);
  $qrCode->setSize(100);
  
  // Set advanced options
  $qrCode->setWriterByName('png');
  $qrCode->setMargin(10);
  $qrCode->setEncoding('UTF-8');
  $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
  $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
  $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
  // $qrCode->setLogoPath('assets/rsiap.png');
  $qrCode->setLogoWidth(40);
  $qrCode->setValidateResult(false);
  
  // Directly output the QR code
  //header('Content-Type: '.$qrCode->getContentType());
  //echo $qrCode->writeString();
  
  // Save it to a file
  //$filename = time().'.png';
  $filename = str_replace(" ","_",$nama).".png";
  $qrCode->writeFile('assets/'.$filename);
  return $filename;
  
  //echo $file_name;
  //$qrCode->writeFile('assets/qrcode_'.time().'.png');
  
  // Create a response object
  //$response = new QrCodeResponse($qrCode);
  
  }

    function lihat_resep(){
      $no_rawat = $this->input->post('no_rawat');
      $data['get_pasien']=$this->dashboard_mod->get_pasien($no_rawat)->row_array();
      $data['get_resep']=$this->dashboard_mod->get_resep($no_rawat)->result();
      $data['get_lab']=$this->dashboard_mod->get_lab($no_rawat)->result();
      $this->load->view('lihat_resep',$data);
    }

    function getrawat(){
    $tanggal = $this->uri->segment(3);
     // $data = $this->db->get_where('reg_periksa',array('tgl_registrasi' => $tanggal))->get_where('reg_periksa',array('kd_pj'=>"A01"))->result_array();
    $data = $this->db->query('SELECT*FROM reg_periksa
    JOIN pasien ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis
    JOIN penjab ON penjab.kd_pj = reg_periksa.kd_pj
    WHERE tgl_registrasi="'.$tanggal.'"
    AND reg_periksa.kd_pj IN("A01", "A05","A03","A07")
    GROUP BY reg_periksa.no_rawat
    HAVING COUNT(reg_periksa.status_lanjut) >= 1')->result_array();
      foreach ($data as $d) {?>
        <option value='<? print $d['no_rawat']."+".$d['status_lanjut']?>'>
            <? print $d['no_rawat'] ." ". $d['nm_pasien']." (".$d['no_rkm_medis'].")"." [".$d['status_lanjut']."] [".$d['png_jawab']."]"?>
        </option>
      <?}
    }


        // Encryption Function
public function inacbg_encrypt($data, $key) {

  /// make binary representasion of $key
  $key = hex2bin($key);
  /// check key length, must be 256 bit or 32 bytes
  if (mb_strlen($key, "8bit") !== 32) {
  throw new Exception("Needs a 256-bit key!");
  }
  /// create initialization vector
  $iv_size = openssl_cipher_iv_length("aes-256-cbc");
  $iv = openssl_random_pseudo_bytes($iv_size); // dengan catatan dibawah
  /// encrypt
  $encrypted = openssl_encrypt($data,"aes-256-cbc",
  $key,
  OPENSSL_RAW_DATA,
  $iv );
  /// create signature, against padding oracle attacks
  $signature = mb_substr(hash_hmac("sha256",
  $encrypted,
  $key,
  true),0,10,"8bit");
  /// combine all, encode, and format
  $encoded = chunk_split(base64_encode($signature.$iv.$encrypted));
  return $encoded;
  }
 
  // Decryption Function
  public function inacbg_decrypt($str, $strkey){
  /// make binary representation of $key
  $key = hex2bin($strkey);
  /// check key length, must be 256 bit or 32 bytes
  if (mb_strlen($key, "8bit") !== 32) {
  throw new Exception("Needs a 256-bit key!");
  }
  /// calculate iv size
  $iv_size = openssl_cipher_iv_length("aes-256-cbc");
  /// breakdown parts
  $decoded = base64_decode($str);
  $signature = mb_substr($decoded,0,10,"8bit");
  $iv = mb_substr($decoded,10,$iv_size,"8bit");
  $encrypted = mb_substr($decoded,$iv_size+10,NULL,"8bit");
  /// check signature, against padding oracle attack
  $calc_signature = mb_substr(hash_hmac("sha256",
  $encrypted,
  $key,
  true),0,10,"8bit");
  if(!$this->inacbg_compare($signature,$calc_signature)) {
  return "SIGNATURE_NOT_MATCH"; /// signature doesn't match
  }
  $decrypted = openssl_decrypt($encrypted,
  "aes-256-cbc",
  $key,
  OPENSSL_RAW_DATA,
  $iv);
  return $decrypted;
  }

  public function inacbg_compare($a, $b) {
      /// compare individually to prevent timing attacks
     
      /// compare length
      if (strlen($a) !== strlen($b)) return false;
     
      /// compare individual
      $result = 0;
      for($i = 0; $i < strlen($a); $i ++) {
      $result |= ord($a[$i]) ^ ord($b[$i]);
      }
     
      return $result == 0;
      }



}
