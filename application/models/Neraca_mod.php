<?php

class neraca_mod extends CI_Model
{

  public function get_date(){
      // $this->db->from('dt_jurnal');
      // $this->db->group_by('MONTH(tanggal), YEAR(tanggal)');
      // return $this->db->get();
      return $this->db->query('select id, max(tanggal) as tanggal from dt_jurnal group by YEAR(tanggal), MONTH(tanggal)');
  }


  public function aset_lancar($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head','nama_sub_head'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('sub_neraca', 'sub_neraca.kd_sub_neraca = dt_acc3.kd_sub_neraca');
      $this->db->join('head_neraca', 'head_neraca.kd_head_neraca = sub_neraca.kd_head_neraca');
      $this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      //$this->db->where('MONTH(tanggal)',$tanggal);
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);

      $this->db->where('sub_neraca.kd_head_neraca',1);
      //$this->db->where('rawat',2);
      $this->db->group_by('sub_neraca.kd_sub_neraca');
      //$this->db->order_by('o.id', 'asc');
      return $this->db->get();

    }

  public function aset_tetap($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head','nama_sub_head'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('sub_neraca', 'sub_neraca.kd_sub_neraca = dt_acc3.kd_sub_neraca');
      $this->db->join('head_neraca', 'head_neraca.kd_head_neraca = sub_neraca.kd_head_neraca');
      //$this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      //$this->db->where('MONTH(tanggal)',$tanggal);
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);

      $this->db->where('sub_neraca.kd_head_neraca',2);
      //$this->db->where('rawat',2);
      $this->db->group_by('sub_neraca.kd_sub_neraca');
      //$this->db->order_by('o.id', 'asc');
      return $this->db->get();

    }

  public function penyusutan($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head','nama_sub_head'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('sub_neraca', 'sub_neraca.kd_sub_neraca = dt_acc3.kd_sub_neraca');
      $this->db->join('head_neraca', 'head_neraca.kd_head_neraca = sub_neraca.kd_head_neraca');
      //$this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      //$this->db->where('MONTH(tanggal)',$tanggal);
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);

      $this->db->where('sub_neraca.kd_head_neraca',3);
      //$this->db->where('rawat',2);
      $this->db->group_by('sub_neraca.kd_sub_neraca');
      //$this->db->order_by('o.id', 'asc');
      return $this->db->get();

    }

  public function aset_lain($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head','nama_sub_head'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('sub_neraca', 'sub_neraca.kd_sub_neraca = dt_acc3.kd_sub_neraca');
      $this->db->join('head_neraca', 'head_neraca.kd_head_neraca = sub_neraca.kd_head_neraca');
      //$this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      //$this->db->where('MONTH(tanggal)',$tanggal);
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);

      $this->db->where('sub_neraca.kd_head_neraca',4);
      //$this->db->where('rawat',2);
      $this->db->group_by('sub_neraca.kd_sub_neraca');
      //$this->db->order_by('o.id', 'asc');
      return $this->db->get();
  }

  public function hutang($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head','nama_sub_head'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('sub_neraca', 'sub_neraca.kd_sub_neraca = dt_acc3.kd_sub_neraca');
      $this->db->join('head_neraca', 'head_neraca.kd_head_neraca = sub_neraca.kd_head_neraca');
      //$this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      //$this->db->where('MONTH(tanggal)',$tanggal);
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);

      $this->db->where('sub_neraca.kd_head_neraca',5);
      //$this->db->where('rawat',2);
      $this->db->group_by('sub_neraca.kd_sub_neraca');
      //$this->db->order_by('o.id', 'asc');
      return $this->db->get();
  }

  public function ekuitas($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head','nama_sub_head'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('sub_neraca', 'sub_neraca.kd_sub_neraca = dt_acc3.kd_sub_neraca');
      $this->db->join('head_neraca', 'head_neraca.kd_head_neraca = sub_neraca.kd_head_neraca');
      //$this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      //$this->db->where('MONTH(tanggal)',$tanggal);
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);

      $this->db->where('sub_neraca.kd_head_neraca',6);
      //$this->db->where('rawat',2);
      $this->db->group_by('sub_neraca.kd_sub_neraca');
      //$this->db->order_by('o.id', 'asc');
      return $this->db->get();
  }


  public function penerimaan_ri($tanggal) {
    $this->db->select(array(null, 'rawat','nama_acc3', 'o.tarif','o.kd_acc3'));
    $this->db->from('dt_penjualan o');
    //$this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
    $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
    $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
    //$this->db->select_sum('o.debet');
    //$this->db->select_sum('o.kredit');
    $this->db->select_sum('o.tarif');
    $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
    //$this->db->where('o.kd_acc1',5);
    $this->db->where('rawat',2);
    //$this->db->group_by('o.kd_acc3');
    //$this->db->order_by('o.id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function penerimaan_rj($tanggal) {
    $this->db->select(array(null, 'rawat','nama_acc3','o.tarif','o.kd_acc3'));
    $this->db->from('dt_penjualan o');
    //$this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
    $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
    $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
  //  $this->db->select_sum('o.debet');
  //  $this->db->select_sum('o.kredit');
    $this->db->select_sum('o.tarif');
    // $this->db->select_sum('o.debet');
    $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
    //$this->db->where('o.kd_acc1',5);
    $this->db->where('rawat in(1,3)');
    //$this->db->group_by('o.kd_acc3');
    //$this->db->order_by('o.id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function pengeluaran($tanggal) {
      $this->db->select(array(null, 'nama_acc1','nama_acc2','nama_acc3', 'o.debet','o.kredit','keterangan'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      //$this->db->select_sum('o.kredit');
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
      $this->db->where('o.kd_acc1',6);
      //$this->db->where('o.kd_acc2',64);
      //$this->db->group_by('o.kd_acc3');
      //$this->db->order_by('o.id', 'asc');
      $query = $this->db->get();
      return $query;
  }





}
  ?>
