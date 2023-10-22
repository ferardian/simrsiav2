<?php
class menu_mod extends CI_Model{
	
	function __construct(){
		parent::__construct();
		}
	
	function select_menu(){
		$this->db->from('menu');
		$this->db->order_by('id_menu','ASC');
		$query = $this->db->get();
		return $query;
	}

		function getMenu($kode){
		$this->db->from('menu');
		$this->db->where('id_menu',$kode);
		//$this->db->order_by('id_menu','ASC');
		$query = $this->db->get();
		return $query;
	}

	function getParentMenu(){
		$this->db->from('menu');
		$this->db->where('parent_id',0);
		$this->db->where('status',1);
		$this->db->order_by('id_menu');
		$query = $this->db->get();
		return $query;
	}

	function insertdata($data){
		return $this->db->insert('menu',$data);
	}

	function updatedata($tabel,$data,$where){
		return $this->db->update($tabel,$data,$where);
	}

	function deldata($tabel,$where){
		return $this->db->delete($tabel,$where);
	}
	
	}

?>