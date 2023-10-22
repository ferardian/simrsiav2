<?php

class cashflow_mod extends CI_Model
{

  public function get_date(){
      //$this->db->from('dt_jurnal');
      //$this->db->where('tanggal in(select max(tanggal) from dt_jurnal group by MONTH(tanggal))');
      //$this->db->group_by('MONTH(tanggal), YEAR(tanggal)');
      return $this->db->query('select id, max(tanggal) as tanggal from dt_jurnal group by YEAR(tanggal), MONTH(tanggal)');
    //  return $this->db->get();
  }


  // public function last_date(){
  //     $this->db->select('max(tanggal)');
  //     $this->db->from('dt_jurnal');
  //     $this->db->group_by('MONTH(tanggal), YEAR(tanggal)');
  //     return $this->db->get();
  // }

  public function kas_bank($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head_cashflow'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('akun_cashflow', 'akun_cashflow.kd_akun_cashflow = dt_acc3.kd_akun_cashflow');
      $this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
      $this->db->where('akun_cashflow.kd_akun_cashflow',1);
      $this->db->group_by('o.kd_acc3');
      return $this->db->get();

    }

  public function kas_tunai($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head_cashflow'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('akun_cashflow', 'akun_cashflow.kd_akun_cashflow = dt_acc3.kd_akun_cashflow');
      $this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
      $this->db->where('akun_cashflow.kd_akun_cashflow',2);
      $this->db->group_by('o.kd_acc3');
      return $this->db->get();

    }
  public function kas_anggaran($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','nama_head_cashflow'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->join('akun_cashflow', 'akun_cashflow.kd_akun_cashflow = dt_acc3.kd_akun_cashflow');
      $this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
      $this->db->where('akun_cashflow.kd_akun_cashflow',3);
      $this->db->group_by('o.kd_acc3');
      return $this->db->get();

    }

  public function pengeluaran($tanggal) {
      $this->db->select(array(null, 'rawat','nama_acc1','nama_acc3', 'o.debet','o.kredit','o.kd_acc2'));
      $this->db->from('dt_jurnal o');
      $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = o.kd_acc1');
      $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = o.kd_acc2');
      $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = o.kd_acc3');
      $this->db->select_sum('o.debet');
      $this->db->select_sum('o.kredit');
      $this->db->where('DATE_FORMAT(tanggal,"%m-%y")',$tanggal);
      $this->db->where('o.kd_acc1 in(2,6)');
      $this->db->group_by('o.kd_acc3');
      return $this->db->get();

    }






}
  ?>
