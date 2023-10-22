<?php

class bukban_mod extends CI_Model
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
  public function getData1($tgl,$acc) {
      $this->db->select(array(null,'o.tanggal', 'o.no_reff', 'nama_acc1', 'nama_acc2', 'nama_acc3', 'o.debet','o.kredit','o.keterangan',null));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('o.kd_acc3',$acc);
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

  public function getData2($tgl,$acc) {
      $this->db->select(array(null,'o.tanggal', 'o.no_reff', 'nama_acc1', 'nama_acc2', 'nama_acc3', 'o.debet','o.kredit','o.keterangan',null));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('o.kd_acc2',$acc);
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

  public function getData3($tgl,$acc) {
      $this->db->select(array(null,'o.tanggal', 'o.no_reff', 'nama_acc1', 'nama_acc2', 'nama_acc3', 'o.debet','o.kredit','o.keterangan',null));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->where('MONTH(tanggal)',$tgl,FALSE);
      $this->db->where('o.kd_acc1',$acc);
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




  function item_bank(){
    $this->db->from('dt_acc3');
    $this->db->where('kd_acc2',10);
    $this->db->where('nama_acc3 !=',"");
    return $this->db->get();
  }

  function item_kas_bank($id){
    return $this->db->query('SELECT CONCAT(
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
  ) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal  where kd_acc3="'.$id.'"
  group by year(tanggal) , month(tanggal)');
  }

    function select_kas_bank(){

  //return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

  return $this->db->query('SELECT CONCAT(
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
) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal where kd_acc2=10
group by year(tanggal) , month(tanggal)');

    }


    function select_piutang(){

  //return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

  return $this->db->query('SELECT CONCAT(
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
) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal where kd_acc2=11
group by year(tanggal) , month(tanggal)');

    }


    function select_aset(){

  //return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

  return $this->db->query('SELECT CONCAT(
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
) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal where kd_acc2=25
group by year(tanggal) , month(tanggal)');

    }


    function select_persediaan(){

  //return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

  return $this->db->query('SELECT CONCAT(
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
) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal where kd_acc2=12
group by year(tanggal) , month(tanggal)');

    }
    function select_pengeluaran(){

  //return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

  return $this->db->query('SELECT CONCAT(
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
) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal where kd_acc1=6
group by year(tanggal) , month(tanggal)');

    }
    function select_penerimaan(){

  //return $this->db->query('SELECT SUM(debet) as debet , SUM(kredit) as kredit FROM dt_jurnal');

  return $this->db->query('SELECT CONCAT(
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
) AS tanggal, sum(kredit) as kredit , sum(debet) as debet from dt_jurnal where kd_acc1=5
group by year(tanggal) , month(tanggal)');

    }

    function json($acc,$tgl) {
        $this->datatables->select('tanggal,no_reff,nama_acc1,nama_acc2,nama_acc3,debet,kredit');
        $this->datatables->from('dt_jurnal');
        $this->datatables->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
        $this->datatables->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
        $this->datatables->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
        $this->datatables->where('dt_jurnal.kd_acc3',$acc);
        $this->datatables->where('MONTH(tanggal)',$tgl,FALSE);
        $this->datatables->add_column('view','' ,'');
        return $this->datatables->generate();
    }

    function json2($acc,$tgl) {
        $this->datatables->select('tanggal,no_reff,nama_acc1,nama_acc2,nama_acc3,debet,kredit');
        $this->datatables->from('dt_jurnal');
        $this->datatables->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
        $this->datatables->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
        $this->datatables->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
        $this->datatables->where('dt_jurnal.kd_acc2',$acc);
        $this->datatables->where('MONTH(tanggal)',$tgl,FALSE);
        $this->datatables->add_column('view','' ,'');
        return $this->datatables->generate();
    }

    function json3($acc,$tgl) {
        $this->datatables->select('tanggal,no_reff,nama_acc1,nama_acc2,nama_acc3,debet,kredit');
        $this->datatables->from('dt_jurnal');
        $this->datatables->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
        $this->datatables->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
        $this->datatables->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
        $this->datatables->where('dt_jurnal.kd_acc1',$acc);
        $this->datatables->where('MONTH(tanggal)',$tgl,FALSE);
        $this->datatables->add_column('view','' ,'');
        return $this->datatables->generate();
    }


}
 ?>
