<?php

class adjustment_mod extends CI_Model
{

  function select_data(){
    $this->db->from('dt_jurnal');
    $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
    $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
    $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
    $this->db->where('adjust',1);
    $this->db->where('nama_acc3 !=',"");
    return $this->db->get();
  }

  function select_akun(){
    $this->db->from('dt_acc3');
    $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_acc3.kd_acc2');
    $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_acc2.kd_acc1');
    $this->db->where('dt_acc3.nama_acc3 !=',"");
    return $this->db->get();
  }


  function insert_data($data){
    return $this->db->insert('dt_jurnal',$data);

  }

  function update_data($tabel, $data, $where){
    return $this->db->update($tabel, $data, $where);
  }

  function getData($kode){
    $this->db->from('dt_jurnal');
    $this->db->join('dt_acc1', 'dt_acc1.kd_acc1 = dt_jurnal.kd_acc1');
    $this->db->join('dt_acc2', 'dt_acc2.kd_acc2 = dt_jurnal.kd_acc2');
    $this->db->join('dt_acc3', 'dt_acc3.kd_acc3 = dt_jurnal.kd_acc3');
    $this->db->where('id',$kode);
    return $this->db->get();
  }

  function delData($table, $where){
    return $this->db->delete($table, $where);
  }





}
 ?>
