<?php
class pasien_mod extends CI_Model{
	
	function __construct(){
		parent::__construct();
		}

		function getkamar(){
            $this->db->select('*,kamar.status');
            $this->db->from('kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			// $this->db->join('rsia_indent_kamar','rsia_indent_kamar.kd_kamar=kamar.kd_kamar');
			// $this->db->join('rsia_rencana_plg','rsia_rencana_plg.kd_kamar=kamar.kd_kamar');
			$this->db->where('statusdata','1');
			$this->db->order_by('status_indent','DESC');
			$this->db->order_by('kd_kamar','DESC');
			$this->db->order_by('kelas','DESC');
			$this->db->order_by('status_blpl','DESC');
			$this->db->order_by('status_rencana_plg','DESC');
			return $this->db->get();
		}

		function getkamar_norawat($data){
			$this->db->from('kamar_inap');
			$this->db->where('no_rawat',$data);
			$this->db->where('stts_pulang',"-");
			return $this->db->get()->row();
		}

		function getpasien(){
			$this->db->from('rsia_indent_kamar');
			$this->db->join('kamar','kamar.kd_kamar=rsia_indent_kamar.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			
			return $this->db->get();
		}

		function cek_norawat($data){
			$this->db->from('kamar_inap');
			$this->db->where('no_rawat',$data);
			return $this->db->get()->row();
		}

		function getpasien_anak(){
			$this->db->from('rsia_indent_kamar');
			$this->db->join('kamar','kamar.kd_kamar=rsia_indent_kamar.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('kamar.kd_kamar','anak','both');
			return $this->db->get();
		}

		function getpasien_kandungan(){
			$this->db->from('rsia_indent_kamar');
			$this->db->join('kamar','kamar.kd_kamar=rsia_indent_kamar.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('kamar.kd_kamar','kandungan','both');
			return $this->db->get();
		}

		function getkodebangsal($data){
			$this->db->from('kamar');
			$this->db->like('kd_kamar',$data,'both');
			return $this->db->get()->row();
		}

		function ambil_kamar($data){
			$this->db->from('rsia_indent_kamar');
			$this->db->where('kd_indent',$data);
			return $this->db->get()->row();
		}

		function ambil_kamar_blpl($data){
			$this->db->from('kamar_inap');
			$this->db->where('no_rawat',$data);
			$this->db->where('stts_pulang','-');
			return $this->db->get()->row();
		}

		function ambil_kamar_rencana_plg($data){
			$this->db->from('kamar_inap');
			$this->db->where('no_rawat',$data);
			$this->db->where('stts_pulang','-');
			return $this->db->get()->row();
		}

		function insert_indent($data){
			return $this->db->insert('rsia_indent_kamar',$data);
		}
		
		function insert_rencana_plg($data){
			return $this->db->insert('rsia_rencana_plg',$data);
		}
		
		function insert_blpl($data){
			return $this->db->insert('rsia_blpl',$data);
		}	

		function update_status_indent($data){
			$this->db->update('kamar',array('status_indent'=>'1'),array('kd_kamar'=> $data));
		}

		function update_status_rencana_plg($data){
			$this->db->update('kamar',array('status_rencana_plg'=>'1'),array('kd_kamar'=> $data));
		}

		function hapus_pasien($data){
			$this->db->delete('rsia_indent_kamar',array('kd_indent'=> $data));
			
		}

		function hapus_pasien_rencana_plg($data){
			$this->db->delete('rsia_rencana_plg',array('no_rawat'=> $data));
			
		}

		function hapus_update_indent($data){
			$this->db->update('kamar',array('status_indent'=>'0'),array('kd_kamar'=>$data));
		}
		
		function hapus_update_blpl($data){
			return $this->db->query('UPDATE kamar SET status_blpl="0" WHERE kd_kamar like "%'.$data.'%"');
		}

		function hapus_blpl($data){
			return $this->db->delete('rsia_blpl',array('no_rawat'=> $data));
		}

		function hapus_update_rencana_plg($data){
			$this->db->update('kamar',array('status_rencana_plg'=>'0'),array('kd_kamar'=>$data));
		}

		// function deldata_indent($data){
		// 	$this->db->update('rsia_indent_kamar',array('kd_kamar'=> $data));
			
		// }

		function get_cuti_per_bulan(){
			$this->db->from('rsia_cuti');
			$this->db->where('month(tanggal_cuti)','month(CURRENT_DATE())');
			$this->db->where('year(tanggal_cuti)','year(CURRENT_DATE())');
			return $this->db->get();
		}

		function update_blpl($data){
			return $this->db->query('UPDATE kamar SET status_blpl="1" WHERE kd_kamar like "%'.$data.'%"');
		}

		function data_pasien(){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			// $this->db->like('kamar.kd_kamar','anak','both');
			$this->db->where('stts_pulang','-');
			$this->db->order_by('pasien.nm_pasien','ASC');
			return $this->db->get();
		}

		function data_pasien_anak(){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('kamar.kd_kamar','anak','both');
			$this->db->where('stts_pulang','-');
			$this->db->order_by('pasien.nm_pasien','ASC');
			return $this->db->get();
		}

		function data_pasien_kandungan(){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('kamar.kd_kamar','kandungan','both');
			$this->db->where('stts_pulang','-');
			$this->db->order_by('pasien.nm_pasien','ASC');
			return $this->db->get();
		}

		function rencana_plg(){
			$this->db->from('rsia_rencana_plg');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			// $this->db->join('kamar','kamar.kd_kamar=rsia_rencana_plg.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('status_rencana_plg','1');
			$this->db->where('kamar_inap.stts_pulang','-');
			return $this->db->get();
		}

		function rencana_plg_anak(){
			$this->db->from('rsia_rencana_plg');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			// $this->db->join('kamar','kamar.kd_kamar=rsia_rencana_plg.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('kamar.kd_kamar','anak','both');
			$this->db->where('status_rencana_plg','1');
			return $this->db->get();
		}

		function rencana_plg_kandungan(){
			$this->db->from('rsia_rencana_plg');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			// $this->db->join('kamar','kamar.kd_kamar=rsia_rencana_plg.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('kamar.kd_kamar','kandungan','both');
			$this->db->where('status_rencana_plg','1');
			return $this->db->get();
		}

		// function blpl(){
		// 	$this->db->from('kamar_inap');
		// 	$this->db->join('reg_periksa','reg_periksa.no_rawat=kamar_inap.no_rawat');
		// 	$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		// 	$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
		// 	$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
		// 	$this->db->where('kamar.status_blpl','1');
		// 	$this->db->where('kamar_inap.stts_pulang','-');
		// 	return $this->db->get();
		// }

		function blpl () {
			$this->db->from('rsia_blpl');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->where('kamar.status_blpl','1');
			$this->db->where('rsia_blpl.status','0');
			$this->db->where('kamar_inap.stts_pulang','-');
			return $this->db->get();
		}

		function blpl_anak(){
			$this->db->from('rsia_blpl');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->where('kamar.status_blpl','1');
			$this->db->where('rsia_blpl.status','0');
			$this->db->where('kamar_inap.stts_pulang','-');
			$this->db->like('kamar.kd_kamar','anak','both');
			return $this->db->get();
		}

		function blpl_kandungan(){
			$this->db->from('rsia_blpl');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->where('kamar.status_blpl','1');
			$this->db->where('rsia_blpl.status','0');
			$this->db->where('kamar_inap.stts_pulang','-');
			$this->db->like('kamar.kd_kamar','kandungan','both');
			return $this->db->get();
		}

		function get_rencana_plg($data){
			$this->db->from('rsia_rencana_plg');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_rencana_plg.no_rawat');
			// $this->db->join('kamar','kamar.kd_kamar=rsia_rencana_plg.kd_kamar');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			// $this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_rencana_plg.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->where('kamar_inap.stts_pulang','-');
			$this->db->where('kamar.status_rencana_plg','1');
			$this->db->like('kamar_inap.kd_kamar',$data,'both');
			return $this->db->get();
			
		}

		function get_indent($data){
			$this->db->from('rsia_indent_kamar');
			$this->db->join('kamar','kamar.kd_kamar=rsia_indent_kamar.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('kamar.status_indent','1');
			$this->db->like('rsia_indent_kamar.kd_kamar',$data,'both');
			return $this->db->get();
			
		}

		function get_blpl($data){
			$this->db->from('rsia_blpl');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_blpl.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->where('kamar.status_blpl','1');
			$this->db->where('kamar_inap.stts_pulang','-');
			$this->db->like('kamar_inap.kd_kamar',$data,'both');
			return $this->db->get();
		}

		function ambil_status_plg($id){
			$this->db->from('kamar_inap');
			$this->db->where('no_rawat',$id);
			return $this->db->get()->row();
		}

		function get_kamar_bor(){
			// $this->db->from('kamar_inap');
			// $this->db->like('kd_kamar','anak','both');
			// $this->db->where('lama <>','0');
			// $this->db->where('year(tgl_keluar)','year(CURRENT_DATE())');
			// $this->db->group_by('month(tgl_keluar)');
			// return $this->db->get();
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(t2.tgl_registrasi) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%anak%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select sum(lama) from kamar_inap where kd_kamar like "%kandungan%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2,(select count(kd_kamar) from kamar where kd_kamar like "%anak%" and statusdata="1") as jml3, (select count(kd_kamar) from kamar where kd_kamar like "%kandungan%" and statusdata="1") as jml4 from kamar_inap t1 join reg_periksa t2 on t2.no_rawat=t1.no_rawat where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) and YEAR(t2.tgl_registrasi) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_los(){
			// $this->db->from('kamar_inap');
			// $this->db->like('kd_kamar','anak','both');
			// $this->db->where('lama <>','0');
			// $this->db->where('year(tgl_keluar)','year(CURRENT_DATE())');
			// $this->db->group_by('month(tgl_keluar)');
			// return $this->db->get();
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%anak%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select sum(lama) from kamar_inap where kd_kamar like "%kandungan%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2,(select count(no_rawat) from kamar_inap where kd_kamar like "%anak%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml3,(select count(no_rawat) from kamar_inap where kd_kamar like "%kandungan%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml4 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_toi(){
			// $this->db->from('kamar_inap');
			// $this->db->like('kd_kamar','anak','both');
			// $this->db->where('lama <>','0');
			// $this->db->where('year(tgl_keluar)','year(CURRENT_DATE())');
			// $this->db->group_by('month(tgl_keluar)');
			// return $this->db->get();
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%anak%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select sum(lama) from kamar_inap where kd_kamar like "%kandungan%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2,(select count(no_rawat) from kamar_inap where kd_kamar like "%anak%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml3,(select count(no_rawat) from kamar_inap where kd_kamar like "%kandungan%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml4,(select count(kd_kamar) from kamar where kd_kamar like "%anak%" and statusdata="1") as jml5,(select count(kd_kamar) from kamar where kd_kamar like "%kandungan%" and statusdata="1") as jml6 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function bor_peri(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%bayi%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(kd_kamar) from kamar where kd_kamar like "%bayi%" and statusdata="1") as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function bor_anak_1(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap join rsia_mapping_kamar_anak on rsia_mapping_kamar_anak.kd_kamar=kamar_inap.kd_kamar where kamar_inap.kd_kamar like "%anak%" and lantai=1 and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(kd_kamar) from rsia_mapping_kamar_anak where kd_kamar like "%anak%" and lantai=1) as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function bor_anak_2(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap join rsia_mapping_kamar_anak on rsia_mapping_kamar_anak.kd_kamar=kamar_inap.kd_kamar where kamar_inap.kd_kamar like "%anak%" and lantai=2 and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(kd_kamar) from rsia_mapping_kamar_anak where kd_kamar like "%anak%" and lantai=2) as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_anak_bor(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%anak%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(kd_kamar) from kamar where kd_kamar like "%anak%" and statusdata="1") as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_kandungan_bor(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%kandungan%" and lama != "0" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(kd_kamar) from kamar where kd_kamar like "%kandungan%" and statusdata="1") as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_anak_los(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%anak%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(no_rawat) from kamar_inap where kd_kamar like "%anak%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_kandungan_los(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%kandungan%" and lama != "0" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(no_rawat) from kamar_inap where kd_kamar like "%kandungan%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_anak_toi(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%anak%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(no_rawat) from kamar_inap where kd_kamar like "%anak%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2,(select count(kd_kamar) from kamar where kd_kamar like "%anak%" and statusdata="1") as jml3 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function get_kamar_kandungan_toi(){
			return $this->db->query('select MONTHNAME(tgl_keluar) as tgl, max(tgl_keluar) as jml_hari,(select sum(lama) from kamar_inap where kd_kamar like "%kandungan%" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml1,(select count(no_rawat) from kamar_inap where kd_kamar like "%kandungan%" and stts_pulang != "Pindah Kamar" and month(tgl_keluar) = month(t1.tgl_keluar) and year(tgl_keluar) = year(t1.tgl_keluar)) as jml2,(select count(kd_kamar) from kamar where kd_kamar like "%kandungan%" and statusdata="1") as jml3 from kamar_inap t1 where YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) group by month(t1.tgl_keluar)');
		}

		function getDokterBiaya($data){
			$this->db->select('dokter.nm_dokter');
			$this->db->from('rawat_inap_dr');
			$this->db->join('dokter','rawat_inap_dr.kd_dokter=dokter.kd_dokter');
			$this->db->where('no_rawat',$data);
			$this->db->group_by('rawat_inap_dr.kd_dokter');
			return $this->db->get();
		}

		function cekPasienGabung($data){
			$this->db->select('pasien.no_rkm_medis,pasien.nm_pasien,ranap_gabung.no_rawat2');
			$this->db->from('reg_periksa');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('ranap_gabung','ranap_gabung.no_rawat2=reg_periksa.no_rawat');
			$this->db->where('ranap_gabung.no_rawat',$data);
			return $this->db->get();

		}

		function dataPasien($data){
			$this->db->select("reg_periksa.no_rawat,tgl_registrasi,status_lanjut,jam_reg,pasien.nm_pasien,pasien.no_rkm_medis, CONCAT(pasien.alamat,', ',kelurahan.nm_kel,', ',kecamatan.nm_kec,', ',kabupaten.nm_kab) as alamat, dokter.nm_dokter, poliklinik.nm_poli, penjab.png_jawab");
			$this->db->from('reg_periksa');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
			$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('kelurahan','pasien.kd_kel=kelurahan.kd_kel');
			$this->db->join('kecamatan','pasien.kd_kec=kecamatan.kd_kec');
			$this->db->join('kabupaten','pasien.kd_kab=kabupaten.kd_kab');
			// $this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('reg_periksa.no_rawat',$data);
			return $this->db->get();
		}

		function dataPasienRalan($data){
			$this->db->select("reg_periksa.no_rawat,tgl_registrasi,jam_reg,pasien.nm_pasien,pasien.no_rkm_medis, CONCAT(pasien.alamat,', ',kelurahan.nm_kel,', ',kecamatan.nm_kec,', ',kabupaten.nm_kab) as alamat, nm_dokter, png_jawab");
			$this->db->from('reg_periksa');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kelurahan','pasien.kd_kel=kelurahan.kd_kel');
			$this->db->join('kecamatan','pasien.kd_kec=kecamatan.kd_kec');
			$this->db->join('kabupaten','pasien.kd_kab=kabupaten.kd_kab');
			$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('reg_periksa.no_rawat',$data);
			return $this->db->get();
		}

		function registrasi($data){
			return $this->db->query('SELECT
            reg_periksa.no_rkm_medis,
            CONCAT(
              DATE_FORMAT(
                reg_periksa.tgl_registrasi,
                "%e %M %Y"
              ),
              " ",
              reg_periksa.jam_reg
            ) AS registrasi,
            kamar_inap.kd_kamar,
            CONCAT(
              IF(
                kamar_inap.tgl_keluar = "0000-00-00",
                DATE_FORMAT(CURDATE(), "%e %M %Y"),
                DATE_FORMAT(
                  kamar_inap.tgl_keluar,
                  "%e %M %Y"
                )
              ),
              " ",
              kamar_inap.jam_keluar
            ) AS keluar,
            
            (SELECT
              SUM(kamar_inap.lama)
            FROM
              kamar_inap
            WHERE kamar_inap.no_rawat = reg_periksa.no_rawat) AS lama,
            reg_periksa.biaya_reg,
            reg_periksa.umurdaftar,
            reg_periksa.sttsumur 
          FROM
            reg_periksa
            INNER JOIN kamar_inap
              ON reg_periksa.no_rawat = kamar_inap.no_rawat
          WHERE reg_periksa.no_rawat = "'.$data.'" 
          ORDER BY kamar_inap.tgl_keluar DESC
          LIMIT 1');
		}

		function registrasi_ralan($data){
			return $this->db->query('SELECT
			reg_periksa.no_rkm_medis,
			reg_periksa.tgl_registrasi,
			reg_periksa.no_rkm_medis,
			reg_periksa.kd_poli,
			reg_periksa.no_rawat,
			reg_periksa.biaya_reg,
			CURRENT_TIME() AS jam,
		  reg_periksa.umurdaftar,
			reg_periksa.sttsumur
		  FROM
			reg_periksa
		  WHERE reg_periksa.no_rawat = "'.$data.'"');
		}

		function kamar($data){
			return $this->db->query('SELECT kamar_inap.kd_kamar, bangsal.nm_bangsal, kamar_inap.trf_kamar, kamar_inap.lama, kamar_inap.ttl_biaya as total, kamar_inap.tgl_masuk, kamar_inap.jam_masuk,
			IF(kamar_inap.tgl_keluar="0000-00-00", CURRENT_DATE(), kamar_inap.tgl_keluar) as tgl_keluar,
			IF(kamar_inap.jam_keluar="00:00:00", CURRENT_TIME(), kamar_inap.jam_keluar) as jam_keluar FROM kamar_inap INNER JOIN bangsal INNER JOIN kamar on kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal=bangsal.kd_bangsal WHERE kamar_inap.no_rawat = "'.$data.'" ORDER BY kamar_inap.tgl_masuk, kamar_inap.kd_kamar');
		}

		function kategoriTindakan(){
			$this->db->select('kd_kategori,nm_kategori');
			$this->db->from('kategori_perawatan');
			return $this->db->get();
		}

		function getRalanDokter($no_rawat,$kategori){
			return $this->db->query('SELECT
			jns_perawatan.nm_perawatan, rawat_jl_dr.biaya_rawat AS total_byrdr, COUNT(rawat_jl_dr.kd_jenis_prw) AS jml, SUM(rawat_jl_dr.biaya_rawat) AS biaya, SUM(rawat_jl_dr.bhp) AS totalbhp, (
			  SUM(rawat_jl_dr.material) + SUM(rawat_jl_dr.menejemen) + SUM(rawat_jl_dr.kso)
			) AS totalmaterial, rawat_jl_dr.tarif_tindakandr, SUM(rawat_jl_dr.tarif_tindakandr) AS totaltarif_tindakandr
		  FROM
			rawat_jl_dr
			INNER JOIN jns_perawatan
			INNER JOIN kategori_perawatan
			  ON rawat_jl_dr.kd_jenis_prw = jns_perawatan.kd_jenis_prw
			  AND jns_perawatan.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_jl_dr.no_rawat = "'.$no_rawat.'"
			AND kategori_perawatan.kd_kategori = "'.$kategori.'" GROUP BY rawat_jl_dr.kd_jenis_prw');
		}

		function getRalanDokter2($no_rawat){
			return $this->db->query('SELECT
			jns_perawatan.nm_perawatan, rawat_jl_dr.biaya_rawat AS total_byrdr, COUNT(rawat_jl_dr.kd_jenis_prw) AS jml, SUM(rawat_jl_dr.biaya_rawat) AS biaya, SUM(rawat_jl_dr.bhp) AS totalbhp, (
			  SUM(rawat_jl_dr.material) + SUM(rawat_jl_dr.menejemen) + SUM(rawat_jl_dr.kso)
			) AS totalmaterial, rawat_jl_dr.tarif_tindakandr, SUM(rawat_jl_dr.tarif_tindakandr) AS totaltarif_tindakandr
		  FROM
			rawat_jl_dr
			INNER JOIN jns_perawatan
			INNER JOIN kategori_perawatan
			  ON rawat_jl_dr.kd_jenis_prw = jns_perawatan.kd_jenis_prw
			  AND jns_perawatan.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_jl_dr.no_rawat = "'.$no_rawat.'" GROUP BY rawat_jl_dr.kd_jenis_prw');
		}

		function getRalanDrPr($no_rawat,$kategori){
			return $this->db->query('SELECT
			jns_perawatan.nm_perawatan, rawat_jl_drpr.biaya_rawat AS total_byrdr, COUNT(rawat_jl_drpr.kd_jenis_prw) AS jml, SUM(rawat_jl_drpr.biaya_rawat) AS biaya, SUM(rawat_jl_drpr.bhp) AS totalbhp, (
			  SUM(rawat_jl_drpr.material) + SUM(rawat_jl_drpr.menejemen) + SUM(rawat_jl_drpr.kso)
			) AS totalmaterial, rawat_jl_drpr.tarif_tindakandr, SUM(rawat_jl_drpr.tarif_tindakanpr) AS totaltarif_tindakanpr, SUM(rawat_jl_drpr.tarif_tindakandr) AS totaltarif_tindakandr
		  FROM
			rawat_jl_drpr
			INNER JOIN jns_perawatan
			INNER JOIN kategori_perawatan
			  ON rawat_jl_drpr.kd_jenis_prw = jns_perawatan.kd_jenis_prw
			  AND jns_perawatan.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_jl_drpr.no_rawat = "'.$no_rawat.'"
			AND kategori_perawatan.kd_kategori = "'.$kategori.'"
		  GROUP BY rawat_jl_drpr.kd_jenis_prw');
		}


		function getRalanDrPr2($no_rawat){
			return $this->db->query('SELECT
			jns_perawatan.nm_perawatan, rawat_jl_drpr.biaya_rawat AS total_byrdr, COUNT(rawat_jl_drpr.kd_jenis_prw) AS jml, SUM(rawat_jl_drpr.biaya_rawat) AS biaya, SUM(rawat_jl_drpr.bhp) AS totalbhp, (
			  SUM(rawat_jl_drpr.material) + SUM(rawat_jl_drpr.menejemen) + SUM(rawat_jl_drpr.kso)
			) AS totalmaterial, rawat_jl_drpr.tarif_tindakandr, SUM(rawat_jl_drpr.tarif_tindakanpr) AS totaltarif_tindakanpr, SUM(rawat_jl_drpr.tarif_tindakandr) AS totaltarif_tindakandr
		  FROM
			rawat_jl_drpr
			INNER JOIN jns_perawatan
			INNER JOIN kategori_perawatan
			  ON rawat_jl_drpr.kd_jenis_prw = jns_perawatan.kd_jenis_prw
			  AND jns_perawatan.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_jl_drpr.no_rawat = "'.$no_rawat.'" GROUP BY rawat_jl_drpr.kd_jenis_prw');
		}

		function getRalanPerawat($no_rawat,$kategori){
			return $this->db->query('SELECT
			jns_perawatan.nm_perawatan, rawat_jl_pr.biaya_rawat as total_byrpr, COUNT(jns_perawatan.nm_perawatan) AS jml, rawat_jl_pr.biaya_rawat * COUNT(jns_perawatan.nm_perawatan) AS biaya 
		  	FROM
			rawat_jl_pr
			INNER JOIN jns_perawatan
			INNER JOIN kategori_perawatan 
			ON rawat_jl_pr.kd_jenis_prw = jns_perawatan.kd_jenis_prw
			AND jns_perawatan.kd_kategori = kategori_perawatan.kd_kategori
		  	WHERE rawat_jl_pr.no_rawat = "'.$no_rawat.'"
			AND kategori_perawatan.kd_kategori = "'.$kategori.'"
		  	GROUP BY rawat_jl_pr.kd_jenis_prw');
		}

		function getRalanPerawat2($no_rawat){
			return $this->db->query('SELECT
			jns_perawatan.nm_perawatan, jns_perawatan.total_byrpr, COUNT(jns_perawatan.nm_perawatan) AS jml, rawat_jl_pr.biaya_rawat * COUNT(jns_perawatan.nm_perawatan) AS biaya 
		  	FROM
			rawat_jl_pr
			INNER JOIN jns_perawatan
			INNER JOIN kategori_perawatan 
			ON rawat_jl_pr.kd_jenis_prw = jns_perawatan.kd_jenis_prw
			AND jns_perawatan.kd_kategori = kategori_perawatan.kd_kategori
		  	WHERE rawat_jl_pr.no_rawat = "'.$no_rawat.'" GROUP BY rawat_jl_pr.kd_jenis_prw');
		}

		function getRanapDokter($no_rawat,$kategori){
			return $this->db->query('SELECT
			jns_perawatan_inap.nm_perawatan, rawat_inap_dr.biaya_rawat AS total_byrdr, COUNT(rawat_inap_dr.kd_jenis_prw) AS jml, SUM(rawat_inap_dr.biaya_rawat) AS biaya, SUM(rawat_inap_dr.bhp) AS totalbhp, (
			  SUM(rawat_inap_dr.material) + SUM(rawat_inap_dr.menejemen) + SUM(rawat_inap_dr.kso)
			) AS totalmaterial, rawat_inap_dr.tarif_tindakandr, SUM(rawat_inap_dr.tarif_tindakandr) AS totaltarif_tindakandr
		  FROM
			rawat_inap_dr
			INNER JOIN jns_perawatan_inap
			INNER JOIN kategori_perawatan
			  ON rawat_inap_dr.kd_jenis_prw = jns_perawatan_inap.kd_jenis_prw
			  AND jns_perawatan_inap.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_inap_dr.no_rawat = "'.$no_rawat.'"
			AND kategori_perawatan.kd_kategori = "'.$kategori.'"
		  GROUP BY rawat_inap_dr.kd_jenis_prw');
		}

		function getRanapDrPr($no_rawat,$kategori){
			return $this->db->query('SELECT
			jns_perawatan_inap.nm_perawatan, rawat_inap_drpr.biaya_rawat AS total_byrdrpr, COUNT(rawat_inap_drpr.kd_jenis_prw) AS jml, SUM(rawat_inap_drpr.biaya_rawat) AS biaya, SUM(rawat_inap_drpr.bhp) AS totalbhp, (
			  SUM(rawat_inap_drpr.material) + SUM(rawat_inap_drpr.menejemen) + SUM(rawat_inap_drpr.kso)
			) AS totalmaterial, rawat_inap_drpr.tarif_tindakandr, SUM(
			  rawat_inap_drpr.tarif_tindakanpr
			) AS totaltarif_tindakanpr, SUM(
			  rawat_inap_drpr.tarif_tindakandr
			) AS totaltarif_tindakandr
		  FROM
			rawat_inap_drpr
			INNER JOIN jns_perawatan_inap
			INNER JOIN kategori_perawatan
			  ON rawat_inap_drpr.kd_jenis_prw = jns_perawatan_inap.kd_jenis_prw
			  AND jns_perawatan_inap.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_inap_drpr.no_rawat = "'.$no_rawat.'"
			AND kategori_perawatan.kd_kategori = "'.$kategori.'"
		  GROUP BY rawat_inap_drpr.kd_jenis_prw');
		}

		function getRanapPerawat($no_rawat,$kategori){
			return $this->db->query('SELECT
			jns_perawatan_inap.nm_perawatan, rawat_inap_pr.biaya_rawat as total_byrpr, COUNT(
			  jns_perawatan_inap.nm_perawatan
			) AS jml, rawat_inap_pr.biaya_rawat * COUNT(
			  jns_perawatan_inap.nm_perawatan
			) AS biaya 
		  FROM
			rawat_inap_pr
			INNER JOIN jns_perawatan_inap
			INNER JOIN kategori_perawatan 
			  ON rawat_inap_pr.kd_jenis_prw = jns_perawatan_inap.kd_jenis_prw
			  AND jns_perawatan_inap.kd_kategori = kategori_perawatan.kd_kategori
		  WHERE rawat_inap_pr.no_rawat = "'.$no_rawat.'"
			AND kategori_perawatan.kd_kategori = "'.$kategori.'"
		  GROUP BY rawat_inap_pr.kd_jenis_prw');
		}

		function getRanapLab($no_rawat){
		return $this->db->query('SELECT
			jns_perawatan_lab.nm_perawatan, COUNT(periksa_lab.kd_jenis_prw) AS jml, periksa_lab.biaya AS biaya, SUM(periksa_lab.biaya) AS total, jns_perawatan_lab.kd_jenis_prw FROM
			periksa_lab
			INNER JOIN jns_perawatan_lab 
			ON jns_perawatan_lab.kd_jenis_prw = periksa_lab.kd_jenis_prw
		WHERE periksa_lab.no_rawat = "'.$no_rawat.'"
			AND periksa_lab.status like "%%" GROUP BY periksa_lab.kd_jenis_prw');
		}

		function getRanapLabDetail($no_rawat,$kd_jns_prw){
			return $this->db->query('SELECT
			SUM(detail_periksa_lab.biaya_item) AS total
		  FROM
			detail_periksa_lab
		  WHERE detail_periksa_lab.no_rawat = "'.$no_rawat.'"
			AND detail_periksa_lab.kd_jenis_prw = "'.$kd_jns_prw.'" ');
		}

		function getRanapOperasi($no_rawat){
			return $this->db->query('SELECT
				paket_operasi.nm_perawatan, (
				  operasi.biayaoperator1 + operasi.biayaoperator2 + operasi.biayaoperator3 + operasi.biayaasisten_operator1 + operasi.biayaasisten_operator2 + operasi.biayaasisten_operator3 + operasi.biayainstrumen + operasi.biayadokter_anak + operasi.biayaperawaat_resusitas + operasi.biayadokter_anestesi + operasi.biayaasisten_anestesi + operasi.biayaasisten_anestesi2 + operasi.biayabidan + operasi.biayabidan2 + operasi.biayabidan3 + operasi.biayaperawat_luar + operasi.biayaalat + operasi.biayasewaok + operasi.akomodasi + operasi.bagian_rs + operasi.biaya_omloop + operasi.biaya_omloop2 + operasi.biaya_omloop3 + operasi.biaya_omloop4 + operasi.biaya_omloop5 + operasi.biayasarpras + operasi.biaya_dokter_pjanak + operasi.biaya_dokter_umum
				) AS biaya, operasi.biayaoperator1, operasi.biayaoperator2, operasi.biayaoperator3, operasi.biayaasisten_operator1, operasi.biayaasisten_operator2, operasi.biayaasisten_operator3, operasi.biayainstrumen, operasi.biayadokter_anak, operasi.biayaperawaat_resusitas, operasi.biayadokter_anestesi, operasi.biayaasisten_anestesi, operasi.biayaasisten_anestesi2, operasi.biayabidan, operasi.biayabidan2, operasi.biayabidan3, operasi.biayaperawat_luar, operasi.biayaalat, operasi.biayasewaok, operasi.akomodasi, operasi.bagian_rs, operasi.biaya_omloop, operasi.biaya_omloop2, operasi.biaya_omloop3, operasi.biaya_omloop4, operasi.biaya_omloop5, operasi.biayasarpras, operasi.biaya_dokter_pjanak, operasi.biaya_dokter_umum
			  FROM
				operasi
				INNER JOIN paket_operasi
				  ON operasi.kode_paket = paket_operasi.kode_paket
			  WHERE operasi.no_rawat = "'.$no_rawat.'"
				AND operasi.status = "Ranap"');
		}

		function getRanapObat($no_rawat){
			return $this->db->query('SELECT
			  databarang.nama_brng, jenis.nama, detail_pemberian_obat.biaya_obat, SUM(detail_pemberian_obat.jml) AS jml, SUM(
				detail_pemberian_obat.embalase + detail_pemberian_obat.tuslah
			  ) AS tambahan, (
				SUM(detail_pemberian_obat.total)
			  ) AS total
			FROM
			  detail_pemberian_obat
			  INNER JOIN databarang
			INNER JOIN jenis
				ON detail_pemberian_obat.kode_brng = databarang.kode_brng
				AND databarang.kdjns = jenis.kdjns
			WHERE detail_pemberian_obat.no_rawat = "'.$no_rawat.'"
			AND detail_pemberian_obat.status LIKE "%%" 
			GROUP BY databarang.kode_brng, detail_pemberian_obat.biaya_obat
			ORDER BY jenis.nama');
		}

		function getRalanObat($data){
			return $this->db->query('SELECT
			databarang.nama_brng,
			jenis.nama,
			detail_pemberian_obat.biaya_obat,
			SUM(detail_pemberian_obat.jml) AS jml,
			SUM(
			  detail_pemberian_obat.embalase + detail_pemberian_obat.tuslah
			) AS tambahan,
			(
			  SUM(detail_pemberian_obat.total) 
			) AS total,
			 SUM(
			  (
				detail_pemberian_obat.h_beli * detail_pemberian_obat.jml
			  )
			) AS totalbeli
		  FROM
			detail_pemberian_obat
			INNER JOIN databarang
			INNER JOIN jenis 
			  ON detail_pemberian_obat.kode_brng = databarang.kode_brng
			  AND databarang.kdjns = jenis.kdjns
		  WHERE detail_pemberian_obat.no_rawat = "'.$data.'"
		  GROUP BY detail_pemberian_obat.kode_brng
		  ORDER BY jenis.nama');
		}

		function getRanapRetur($no_rawat){
			return $this->db->query('SELECT
			databarang.nama_brng, detreturjual.h_retur, SUM(detreturjual.jml_retur * - 1) AS jml, SUM(detreturjual.subtotal * - 1) AS ttl
		FROM
			detreturjual
			INNER JOIN databarang
			INNER JOIN returjual
			ON detreturjual.kode_brng = databarang.kode_brng
			AND returjual.no_retur_jual = detreturjual.no_retur_jual
		WHERE returjual.no_retur_jual LIKE "%'.$no_rawat.'%"
		GROUP BY databarang.kode_brng');
		}


		function getRanapResepPulang($no_rawat){
			return $this->db->query('SELECT
			databarang.nama_brng, resep_pulang.harga, resep_pulang.jml_barang, resep_pulang.dosis, resep_pulang.total
		  FROM
			resep_pulang
			INNER JOIN databarang
			  ON resep_pulang.kode_brng = databarang.kode_brng
		  WHERE resep_pulang.no_rawat = "'.$no_rawat.'"
		  ORDER BY databarang.nama_brng');
		}

		function getRanapTambahan($no_rawat){
			return $this->db->query('SELECT
			nama_biaya, besar_biaya
		  FROM
			tambahan_biaya
		  WHERE no_rawat = "'.$no_rawat.'"');
		}

		function getRanapPotongan($no_rawat){
			return $this->db->query('SELECT
			nama_pengurangan, besar_pengurangan
		  FROM
			pengurangan_biaya
		  WHERE no_rawat = "'.$no_rawat.'"');
		}

		// function getRanapKamar($no_rawat){
		// 	$this->db->select("concat(kamar.kd_kamar,', ',bangsal.nm_bangsal) as kamar, concat(kamar_inap.tgl_masuk,' ',kamar_inap.jam_masuk) as tgl, concat(reg_periksa.tgl_registrasi,' ',reg_periksa.jam_reg) as tgl_masuk, penjab.png_jawab, kamar_inap.no_rawat, stts_pulang");
		// 	$this->db->from('kamar_inap');
		// 	$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
		// 	$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
		// 	$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
		// 	$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
		// 	$this->db->where('stts_pulang', '-');
		// 	$this->db->where('kamar_inap.no_rawat',$no_rawat);
		// 	return $this->db->get()->row();
		// }

		function getRalan($no_rawat){
			$this->db->select("poliklinik.nm_poli, reg_periksa.tgl_registrasi, reg_periksa.no_rawat, pasien.nm_pasien, pasien.alamat, jam_reg");
			$this->db->from('reg_periksa');
			$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
			$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->where('reg_periksa.no_rawat',$no_rawat);
			return $this->db->get()->row();
		}

		function getRanapKamarBelum($no_rawat){
			$this->db->select("concat(kamar.kd_kamar,', ',bangsal.nm_bangsal) as kamar, concat(kamar_inap.tgl_masuk,' ',kamar_inap.jam_masuk) as tgl, concat(reg_periksa.tgl_registrasi,' ',reg_periksa.jam_reg) as tgl_masuk, penjab.png_jawab, kamar_inap.no_rawat, stts_pulang, tgl_keluar, tgl_registrasi, jam_reg, jam_keluar, lama");
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('stts_pulang', '-');
			$this->db->where('kamar_inap.no_rawat',$no_rawat);
			return $this->db->get()->row();
		}

		function getRanapKamarSudah($no_rawat){
			$this->db->select("concat(kamar.kd_kamar,', ',bangsal.nm_bangsal) as kamar, concat(kamar_inap.tgl_masuk,' ',kamar_inap.jam_masuk) as tgl, concat(reg_periksa.tgl_registrasi,' ',reg_periksa.jam_reg) as tgl_masuk, penjab.png_jawab, kamar_inap.no_rawat, stts_pulang, tgl_keluar, tgl_registrasi, jam_reg, jam_keluar, lama");
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('stts_pulang <>', 'Pindah Kamar');
			$this->db->where('tgl_keluar <>', '0000-00-00');
			$this->db->where('kamar_inap.no_rawat',$no_rawat);
			return $this->db->get()->row();
		}

		function getRanapSep($no_rawat){
			$this->db->select('klsrawat');
			$this->db->from('bridging_sep');
			$this->db->where('no_rawat',$no_rawat);
			return $this->db->get()->row();
		}

		function tindakanDokter($id){
			return $this->db->query('SELECT
			rawat_inap_dr.no_rawat,
			reg_periksa.no_rkm_medis,
			pasien.nm_pasien,
			CONCAT(rawat_inap_dr.kd_jenis_prw," ", jns_perawatan_inap.nm_perawatan) as tindakan_dr,
			rawat_inap_dr.kd_dokter,
			dokter.nm_dokter,
			rawat_inap_dr.tgl_perawatan,
			rawat_inap_dr.jam_rawat,
			rawat_inap_dr.biaya_rawat,
			rawat_inap_dr.kd_jenis_prw,
			rawat_inap_dr.tarif_tindakandr,
			rawat_inap_dr.kso
		  FROM
			pasien
			INNER JOIN reg_periksa
			INNER JOIN jns_perawatan_inap
			INNER JOIN dokter
			INNER JOIN rawat_inap_dr 
			  ON rawat_inap_dr.no_rawat = reg_periksa.no_rawat 
			  AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis 
			  AND rawat_inap_dr.kd_jenis_prw = jns_perawatan_inap.kd_jenis_prw 
			  AND rawat_inap_dr.kd_dokter = dokter.kd_dokter 
		  WHERE rawat_inap_dr.no_rawat="'.$id.'" ORDER BY rawat_inap_dr.tgl_perawatan DESC');
		}

		function tindakanDokterPerawat($id){
			return $this->db->query('SELECT
			rawat_inap_drpr.no_rawat,
			reg_periksa.no_rkm_medis,
			pasien.nm_pasien,
			CONCAT(
			  rawat_inap_drpr.kd_jenis_prw,
			  " ",
			  jns_perawatan_inap.nm_perawatan
			) as tindakan_drpr,
			rawat_inap_drpr.kd_dokter,
			dokter.nm_dokter,
			rawat_inap_drpr.nip,
			petugas.nama,
			rawat_inap_drpr.tgl_perawatan,
			rawat_inap_drpr.jam_rawat,
			rawat_inap_drpr.biaya_rawat,
			rawat_inap_drpr.kd_jenis_prw,
			rawat_inap_drpr.tarif_tindakandr,
			rawat_inap_drpr.tarif_tindakanpr,
			rawat_inap_drpr.kso
		  FROM
			pasien
			INNER JOIN reg_periksa
			INNER JOIN jns_perawatan_inap
			INNER JOIN dokter
			INNER JOIN rawat_inap_drpr
			INNER JOIN petugas
			  ON rawat_inap_drpr.no_rawat = reg_periksa.no_rawat
			  AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis
			  AND rawat_inap_drpr.kd_jenis_prw = jns_perawatan_inap.kd_jenis_prw
			  AND rawat_inap_drpr.kd_dokter = dokter.kd_dokter
			  AND rawat_inap_drpr.nip = petugas.nip
		  WHERE rawat_inap_drpr.`no_rawat` = "'.$id.'" ORDER BY rawat_inap_drpr.tgl_perawatan DESC');
		}

		function tindakanPerawat($id){
			return $this->db->query('SELECT
			rawat_inap_pr.no_rawat,
			reg_periksa.no_rkm_medis,
			pasien.nm_pasien,
			CONCAT(
			  rawat_inap_pr.kd_jenis_prw,
			  " ",
			  jns_perawatan_inap.nm_perawatan
			) as tindakan_pr,
			rawat_inap_pr.nip,
			petugas.nama,
			rawat_inap_pr.tgl_perawatan,
			rawat_inap_pr.jam_rawat,
			rawat_inap_pr.biaya_rawat,
			rawat_inap_pr.kd_jenis_prw,
			rawat_inap_pr.tarif_tindakanpr,
			rawat_inap_pr.kso
		  FROM
			pasien
			INNER JOIN reg_periksa
			INNER JOIN jns_perawatan_inap
			INNER JOIN petugas
			INNER JOIN rawat_inap_pr
			  ON rawat_inap_pr.no_rawat = reg_periksa.no_rawat
			  AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis
			  AND rawat_inap_pr.kd_jenis_prw = jns_perawatan_inap.kd_jenis_prw
			  AND rawat_inap_pr.nip = petugas.nip
		  WHERE rawat_inap_pr.`no_rawat` = "'.$id.'" ORDER BY rawat_inap_pr.tgl_perawatan DESC ');
		}

		function pasienRanap($tgl1,$tgl2){
			$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.status_lanjut, pasien.nm_pasien, pasien.namakeluarga, pasien.no_rkm_medis, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu,bangsal.nm_bangsal,nm_poli');
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
			$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('stts_pulang <>', 'Pindah Kamar');
			// $this->db->where('tgl_keluar <>', '0000-00-00');
			$this->db->where('kamar_inap.tgl_keluar >= ',$tgl1);
			$this->db->where('kamar_inap.tgl_keluar <= ',$tgl2);
			$this->db->order_by('reg_periksa.no_rawat','ASC');
			return $this->db->get();
		}
		function pasienRanapResume($tgl1,$tgl2){
			$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.status_lanjut, pasien.nm_pasien, pasien.namakeluarga, pasien.no_rkm_medis, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu,bangsal.nm_bangsal');
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			// $this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('stts_pulang <>', 'Pindah Kamar');
			// $this->db->where('tgl_keluar <>', '0000-00-00');
			$this->db->where('kamar_inap.tgl_keluar >= ',$tgl1);
			$this->db->where('kamar_inap.tgl_keluar <= ',$tgl2);
			$this->db->order_by('reg_periksa.no_rawat','ASC');
			return $this->db->get();
		}

		function pasienRanapPengajuan($tgl1,$tgl2){
			$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.status_lanjut, pasien.nm_pasien, pasien.no_rkm_medis, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu,bangsal.nm_bangsal');
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('mlite_vedika','mlite_vedika.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('stts_pulang <>', 'Pindah Kamar');
			// $this->db->where('tgl_keluar <>', '0000-00-00');
			$this->db->where('kamar_inap.tgl_keluar >= ',$tgl1);
			$this->db->where('kamar_inap.tgl_keluar <= ',$tgl2);
			$this->db->where('mlite_vedika.status','Pengajuan');
			$this->db->order_by('reg_periksa.no_rawat','ASC');
			return $this->db->get();
		}
		
		function pasienRalan($tgl1,$tgl2){
			$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.status_lanjut, pasien.nm_pasien, pasien.no_rkm_medis, poliklinik.nm_poli, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu');
			$this->db->from('reg_periksa');
			// $this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
			$this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('reg_periksa.status_lanjut','Ralan');
			$this->db->where('reg_periksa.tgl_registrasi >= ',$tgl1);
			$this->db->where('reg_periksa.tgl_registrasi <= ',$tgl2);
			$this->db->order_by('reg_periksa.no_rawat','ASC');
			return $this->db->get();
		}
		function pasienRalanResume($tgl1,$tgl2){
			$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.status_lanjut, pasien.nm_pasien, pasien.no_rkm_medis, poliklinik.nm_poli, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu');
			$this->db->from('reg_periksa');
			// $this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
			// $this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('reg_periksa.status_lanjut','Ralan');
			$this->db->where('reg_periksa.tgl_registrasi >= ',$tgl1);
			$this->db->where('reg_periksa.tgl_registrasi <= ',$tgl2);
			$this->db->order_by('reg_periksa.no_rawat','ASC');
			return $this->db->get();
		}
		function pasienAll($tgl1,$tgl2){
			$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, reg_periksa.status_lanjut, pasien.nm_pasien, pasien.no_rkm_medis, poliklinik.nm_poli, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu,bangsal.nm_bangsal');
			$this->db->from('reg_periksa');
			$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar','left');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal','left');
			$this->db->like('penjab.png_jawab','BPJS','both');
			$this->db->where('reg_periksa.tgl_registrasi >= ',$tgl1);
			$this->db->where('reg_periksa.tgl_registrasi <= ',$tgl2);
			$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
			$this->db->order_by('reg_periksa.no_rawat','ASC');
			return $this->db->get();
		}

		function pasienPulangH7(){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('kamar_inap.tgl_keluar >= curdate() - INTERVAL 7 DAY');
			$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
			$this->db->order_by('kamar_inap.tgl_keluar','desc');
			$this->db->order_by('kamar_inap.no_rawat','desc');
			return $this->db->get();
		}

		function pasienPulangHariIni(){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('kamar_inap.tgl_keluar = curdate()');
			$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
			return $this->db->get();
		}

		function pasienPulang($tgl1,$tgl2){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa', 'reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('penjab', 'penjab.kd_pj=reg_periksa.kd_pj');
			$this->db->join('pasien', 'pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('dokter', 'dokter.kd_dokter=reg_periksa.kd_dokter');
			$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('kamar_inap.tgl_keluar >=',$tgl1);
			$this->db->where('kamar_inap.tgl_keluar <=',$tgl2);
			$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
			return $this->db->get();
		}

		function pasienRalanCari($tgl1,$tgl2){
			return $this->db->query('SELECT
			reg_periksa.no_reg,
			reg_periksa.no_rawat,
			reg_periksa.tgl_registrasi,
			reg_periksa.jam_reg,
		   reg_periksa.kd_dokter,
			dokter.nm_dokter,
			reg_periksa.no_rkm_medis,
			pasien.nm_pasien,
			poliklinik.nm_poli,
		  reg_periksa.p_jawab,
			reg_periksa.almt_pj,
			reg_periksa.hubunganpj,
			reg_periksa.biaya_reg,
			reg_periksa.stts,
			penjab.png_jawab,
			CONCAT(
			  reg_periksa.umurdaftar,
			  " ",
			  reg_periksa.sttsumur
			) AS umur,
		  reg_periksa.status_bayar,
			reg_periksa.status_poli,
			reg_periksa.kd_pj,
			reg_periksa.kd_poli
		  FROM
			reg_periksa
			INNER JOIN dokter
			  ON reg_periksa.kd_dokter = dokter.kd_dokter
			INNER JOIN pasien
			  ON reg_periksa.no_rkm_medis = pasien.no_rkm_medis
			INNER JOIN poliklinik
			  ON reg_periksa.kd_poli = poliklinik.kd_poli
			INNER JOIN penjab
			  ON reg_periksa.kd_pj = penjab.kd_pj
		  WHERE reg_periksa.tgl_registrasi BETWEEN "'.$tgl1.'" AND "'.$tgl2.'"
			AND reg_periksa.status_lanjut = "Ralan" 
		  ');
		}

		function pasien_ralan(){
			return $this->db->query('SELECT
			reg_periksa.no_reg,
			reg_periksa.no_rawat,
			reg_periksa.tgl_registrasi,
			reg_periksa.jam_reg,
		   reg_periksa.kd_dokter,
			dokter.nm_dokter,
			reg_periksa.no_rkm_medis,
			pasien.nm_pasien,
			poliklinik.nm_poli,
		  reg_periksa.p_jawab,
			reg_periksa.almt_pj,
			reg_periksa.hubunganpj,
			reg_periksa.biaya_reg,
			reg_periksa.stts,
			penjab.png_jawab,
			CONCAT(
			  reg_periksa.umurdaftar,
			  " ",
			  reg_periksa.sttsumur
			) AS umur,
		  reg_periksa.status_bayar,
			reg_periksa.status_poli,
			reg_periksa.kd_pj,
			reg_periksa.kd_poli
		  FROM
			reg_periksa
			INNER JOIN dokter
			  ON reg_periksa.kd_dokter = dokter.kd_dokter
			INNER JOIN pasien
			  ON reg_periksa.no_rkm_medis = pasien.no_rkm_medis
			INNER JOIN poliklinik
			  ON reg_periksa.kd_poli = poliklinik.kd_poli
			INNER JOIN penjab
			  ON reg_periksa.kd_pj = penjab.kd_pj
		  WHERE reg_periksa.tgl_registrasi = CURDATE()
			AND reg_periksa.status_lanjut = "Ralan" 
		  ');
		}

		function hapus_ralan($table,$where){
			return $this->db->delete($table,$where);
		}

		function getPenunggu(){
			$this->db->from('rsia_penunggu_pasien');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_penunggu_pasien.no_rawat');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->where('stts_pulang','-');
			$this->db->order_by('pasien.nm_pasien','ASC');
			return $this->db->get();
		}

		function getDataRanap(){
			$this->db->from('kamar_inap');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=kamar_inap.no_rawat');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			// $this->db->like('kamar.kd_kamar','anak','both');
			$this->db->where('stts_pulang','-');
			$this->db->order_by('pasien.nm_pasien','ASC');
			return $this->db->get();
		}

		function insert_penunggu($data){
			return $this->db->insert('rsia_penunggu_pasien',$data);
		}

		function getPenungguEdit($data){
			$this->db->from('rsia_penunggu_pasien');
			$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_penunggu_pasien.no_rawat');
			$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat');
			$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
			$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal');
			$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
			$this->db->where('stts_pulang','-');
			$this->db->where('rsia_penunggu_pasien.id',$data);
			return $this->db->get();
		}

		function update_penunggu($table,$data,$where){
			return $this->db->update($table,$data,$where);
		}

		function hapusPenunggu($id){
			return $this->db->delete('rsia_penunggu_pasien',array('id'=>$id));
		}

		function hitungPenunggu($data){
			$this->db->where('rsia_penunggu_pasien.no_rawat',$data);
			$this->db->from('rsia_penunggu_pasien');
			return $this->db->count_all_results();


		}

		function getStatus($data){
			$this->db->from('reg_periksa');
			$this->db->where('reg_periksa.no_rawat',$data);
			return $this->db->get();
		}

		

		// function get_rencana_plg($data){
		// 	$this->db->from('rsia_rencana_plg');
		// 	$this->db->where('id',$data);
		// 	return $this->db->get();
		// }	
	}
?>