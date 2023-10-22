<?php /**
*
*/
class Import extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Laptekmodel');
		if (!is_login()) {
			redirect('login_controller');
		}
	}
	function index()
	{
		$data['no']=1;
		$this->load->view('v_import',$data);
	}

	function jurnal(){
		$data['no']=2;
		$this->load->view('v_import',$data);
	}

	function proses()
	{
		$config['upload_path']          = './public/data/';
		$config['allowed_types']        = 'txt|csv|TXT|CSV';
		$config['max_size']             = 100000;
		$config['file_name']             = date('Y-m-d');
		$this->load->library('upload', $config);


		if ( ! $this->upload->do_upload('file'))
		{
		    $error = array('error' => $this->upload->display_errors());
		    echo json_encode($error);

		} else {

			$file = fopen('./public/data/'.$this->upload->data('file_name') ,"r");
			$str = '';
			while(!feof($file)) {
			  $x = fgetc($file);
			  $str .= $x;
			};
			$var = explode('\n', $str);
			var_dump($var);
			fclose($file);
		    $data = array('upload_data' => $this->upload->data());
		    echo json_encode(['berhasil diupload']);
		}
	}

	function proses1()
	{
		$data = $this->input->post('data');
		$no = 1;
		$arr = explode("\n", $data);
		foreach ($arr as $line) {

			$x = explode("!", $line);
			$string = $x[0];
			$tanggal = date("Y-m-d", strtotime(substr($string, -4) . "-" . substr($string,3,2) . "-" . substr($string,0,2)));
				$r = explode(' ', $x[4]);
				if ($r[0]=='RI') {
					$rawat=2;
				} else if ($r[0]=='RJ') {
					$rawat=1;
				} else {
					$rawat=3;
				}
				//$rawat = $r[0] == 'RI' ? 2 : 1 ;
				$data = [
					'tanggal' => $tanggal,
					'no_rm' => rtrim($x[1]),
					'no_rawat' => rtrim($x[2]),
					'no_reff' => rtrim($x[3]),
					'rawat' => $rawat,
					'kd_acc2' => rtrim($x[5]),
					'kd_acc3' => rtrim($x[7]),
					'kd_acc4' => rtrim($x[9]),
					'kd_acc5' => rtrim($x[11]),
					'tarif' => $x[13],

				];

					$this->Laptekmodel->simpan($data,$no);


		} // end perulangan

		$data['no']=1;
		$data['sukses']=true;
	$this->load->view('v_import',$data);
	//redirect('import',['sukses' => true]);
	}



	function clean_data(){

			$this->load->view('v_clean');
	}

	function proses_clean(){
			$no = $this->input->post('no');
			$data = $this->Laptekmodel->clean($no);
			$this->load->view('v_clean',['sukses' => true]);
	}

	function proses2()
	{
		$data = $this->input->post('data');
		$no = 2;
		$arr = explode("\n", $data);
		foreach ($arr as $line) {

			$x = explode("!", $line);
			$string = $x[0];
			$tanggal = date("Y-m-d", strtotime(substr($string, -4) . "-" . substr($string,3,2) . "-" . substr($string,0,2)));
				$r = explode(' ', $x[2]);
				if ($r[0]=='RI') {
					$rawat=2;
				} else if ($r[0]=='RJ') {
					$rawat=1;
				} else {
					$rawat=3;
				}
				//$rawat = $r[0] == 'RI' ? 2 : 1 ;
				$data = [
					'tanggal' => $tanggal,
					'no_reff' => rtrim($x[1]),
					'rawat' => $rawat,
					'kd_acc1' => rtrim($x[3]),
					'kd_acc2' => rtrim($x[5]),
					'kd_acc3' => rtrim($x[7]),
					'debet' => $x[9],
					'kredit' => $x[10],
					'keterangan' => rtrim($x[11]),

				];

					$this->Laptekmodel->simpan($data,$no);


		} // end perulangan

	$data['no']=2;
	$data['sukses']=true;
	$this->load->view('v_import',$data);
	//redirect('import',['sukses' => true]);
	}

	function delete_data()
	{
		$data['jurnal'] = $this->Laptekmodel->jurnal()->result();
		$data['penjualan'] = $this->Laptekmodel->penjualan()->result();
		$data['jurnal_tanggal'] = $this->Laptekmodel->jurnal_tanggal()->result();
		$data['penjualan_tanggal'] = $this->Laptekmodel->penjualan_tanggal()->result();
		$this->load->view('v_delete',$data);
	}

	function delete_action_jurnal(){
		$tanggal = $this->uri->segment(3);
		$bulan = date('m',strtotime($tanggal));
		$tahun = date('Y',strtotime($tanggal));
		$this->Laptekmodel->delete_action($bulan,$tahun);
		redirect('import/delete_data');
	}

	function delete_action_penjualan(){
		$tanggal = $this->uri->segment(3);
		$bulan = date('m',strtotime($tanggal));
		$tahun = date('Y',strtotime($tanggal));
		$this->Laptekmodel->delete_action($bulan,$tahun);
		redirect('import/delete_data');
	}

	function delete_tanggal_jurnal(){
		$tanggal = $this->uri->segment(3);
		$this->Laptekmodel->delete_tanggal_jurnal($tanggal);
		redirect('import/delete_data');
	}

	function delete_tanggal_penjualan(){
		$tanggal = $this->uri->segment(3);
		$this->Laptekmodel->delete_tanggal_penjualan($tanggal);
		redirect('import/delete_data');
	}
} ?>
