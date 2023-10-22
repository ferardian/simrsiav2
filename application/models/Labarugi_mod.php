<?php

class labarugi_mod extends CI_Model
{

  private $_nama1;
  private $_nama2;
  private $_nama3;
  private $_date;


  public function setNama1($nama1) {
      $this->_nama1 = $nama1;
  }
  public function setNama2($nama2) {
      $this->_nama2 = $nama2;
  }
  public function setNama3($nama3) {
      $this->_nama3 = $nama3;
  }
  public function setDate($date) {
      $this->_date = $date;
  }
  // public function setEndDate($endDate) {
  //     $this->_endDate = $endDate;
  // }
  // get Orders List
  public function getData($tgl) {
      $this->db->select(array(null,'o.tanggal', 'o.no_reff', 'nama_acc1', 'nama_acc2', 'nama_acc3', 'o.debet','o.kredit','o.keterangan',null));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('o.kd_acc1 in(5,6)');
      if(!empty($this->_date)) {
          $this->db->where('`o`.`tanggal` = \'' . $this->_date . '\' ');
          $this->db->where('o.kd_acc1 in(5,6)');
      }
      if(!empty($this->_nama1)){
          $this->db->where('o.nama_acc1', $this->_nama1);
      }
      if(!empty($this->_nama2)){
          $this->db->where('nama_acc2', $this->_nama2);
      }
      if(!empty($this->_nama3)){
          $this->db->where('nama_acc3', $this->_nama3);
      }
      $this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result_array();
  }


  public function getDataGroupByAkun($tgl,$tahun) {
      $this->db->select(array(null, 'rawat','nama_acc3', 'o.tarif','o.kd_acc3'));
      $this->db->from('dt_penjualan o');
      //$this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      //$this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->select_sum('o.tarif');
      $this->db->where('MONTH(tanggal)',$tgl);
      $this->db->where('YEAR(tanggal)',$tahun);
      //$this->db->where('o.kd_acc1',5);
      $this->db->where('rawat',2);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun2($tgl,$tahun) {
      $this->db->select(array(null, 'rawat','nama_acc3','o.tarif','o.kd_acc3'));
      $this->db->from('dt_penjualan o');
      //$this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
    //  $this->db->select_sum('o.debet');
    //  $this->db->select_sum('o.kredit');
      $this->db->select_sum('o.tarif');
      // $this->db->select_sum('o.debet');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      //$this->db->where('o.kd_acc1',5);
      $this->db->where('rawat in(1,3)');
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }

  public function getDataGroupByAkun3($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit','keterangan'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',64);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }

  public function getDataGroupByAkun4($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',60);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }

  public function getDataGroupByAkun5($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',61);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun6($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',62);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun7($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',63);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun8($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',65);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun9($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',66);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun10($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',67);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }
  public function getDataGroupByAkun11($tgl,$tahun) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('YEAR(tanggal)',$tahun);
      $this->db->where('o.kd_acc1',6);
      $this->db->where('o.kd_acc2',68);
      $this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query->result();
  }

//   var $table = 'dt_jurnal'; //nama tabel dari database
//   var $column_order = array(null,'tanggal','no_reff','nama_acc1','nama_acc2','nama_acc3','debet','kredit',null); //field yang ada di table user
//   var $column_search = array('tanggal','no_reff','nama_acc1','nama_acc2','nama_acc3','debet','kredit'); //field yang diizin untuk pencarian
//   var $order = array('id' => 'asc'); // default order
//
// public function _get_datatables_query()
// 	{
//
// 		$this->db->from($this->table);
//
// 		$i = 0;
//
// 		foreach ($this->column_search as $item) // loop column
// 		{
// 			if($_POST['search']['value']) // if datatable send POST for search
// 			{
//
// 				if($i===0) // first loop
// 				{
// 					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
// 					$this->db->like($item, $_POST['search']['value']);
// 				}
// 				else
// 				{
// 					$this->db->or_like($item, $_POST['search']['value']);
// 				}
//
// 				if(count($this->column_search) - 1 == $i) //last loop
// 					$this->db->group_end(); //close bracket
// 			}
// 			$i++;
// 		}
//
// 		if(isset($_POST['order'])) // here order processing
// 		{
// 			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
// 		}
// 		else if(isset($this->order))
// 		{
// 			$order = $this->order;
// 			$this->db->order_by(key($order), $order[key($order)]);
// 		}
// 	}
//
// 	function get_datatables($tgl)
// 	{
// 		$this->_get_datatables_query();
//     //$saldo=0;
// 		if($_POST['length'] != -1)
// 		$this->db->limit($_POST['length'], $_POST['start']);
//
//     //$this->db->set('saldo','saldo:=saldo+kredit-debet as saldo');
//     //$this->db->select('id,debet, kredit, saldo = saldo + dt_jurnal.debet - dt_jurnal.kredit as saldo');
//     $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
//     $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
//     $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
//     $this->db->where('MONTH(tanggal)',$tgl,FALSE);
//     $this->db->where('dt_jurnal.kd_acc1 in(5,6)');
// 		$query = $this->db->get();
// 		return $query->result();
// 	}
//
//   function get_saldo($tgl){
//       //$this->db->from('dt_jurnal');
//       $q1 = $this->db->query('set @saldo_awal := 0');
//       $q2 = $this->db->query('select tanggal,no_reff,nama_acc1,nama_acc2,nama_acc3,debet,kredit,@saldo_awal := @saldo_awal + debet - kredit AS saldo FROM dt_jurnal');
//       //$this->db->where('MONTH(tanggal)',$tgl,FALSE);
//       return array('q1'=>$q1,'q2'=>$q2);
//   }
//
// 	function count_filtered($tgl)
// 	{
// 		$this->_get_datatables_query();
//
//     $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
//     $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
//     $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
//     $this->db->where('MONTH(tanggal)',$tgl,FALSE);
//     $this->db->where('dt_jurnal.kd_acc1 in(5,6)');
// 		$query = $this->db->get();
// 		return $query->num_rows();
// 	}
//
// 	public function count_all($tgl)
// 	{
// 		$this->db->from($this->table);
//     $this->db->where('MONTH(tanggal)',$tgl,FALSE);
//     $this->db->where('dt_jurnal.kd_acc1 in(5,6)');
// 		return $this->db->count_all_results();
// 	}



  function select_data(){

//return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

return $this->db->query('SELECT
  (SELECT CONCAT(
CASE MONTH(tanggal)
  WHEN 1 THEN "Januari"
  WHEN 2 THEN "Februari"
  WHEN 3 THEN "Maret"
  WHEN 4 THEN "April"
  WHEN 5 THEN "Mei"
  WHEN 6 THEN "Juni"
  WHEN 7 THEN "Juli"
  WHEN 8 THEN "Agustus"
  WHEN 9 THEN "September"
  WHEN 10 THEN "Oktober"
  WHEN 11 THEN "November"
  WHEN 12 THEN "Desember"
END," ",
YEAR(tanggal)
)) AS tanggal,

SUM( case when kd_acc1=5 then kredit END) as db1,
SUM( case when kd_acc1=6 then debet END) as db2

from dt_jurnal
group by year(tanggal) , month(tanggal)');

  }


  function json($tgl) {
//$saldo=0;

      $this->datatables->select('tanggal,no_reff,nama_acc1,nama_acc2,nama_acc3,debet,kredit');
      $this->datatables->select('(@saldo:=0) as total');
      //$this->datatables->select('(@saldo:=@saldo) as total');
      //$this->datatables->select('(100 + total) as total2');
      $this->datatables->from('dt_jurnal ');
      $this->datatables->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
      $this->datatables->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
      $this->datatables->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
      $this->datatables->where('MONTH(tanggal)',$tgl,FALSE);
      $this->datatables->where('t.kd_acc1 in(5,6)');
      $this->datatables->add_column('view','$1' ,'total');
      return $this->datatables->generate();
  }



}
 ?>
