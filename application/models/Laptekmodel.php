<?php
class Laptekmodel extends CI_Model
{
	function simpan($data,$no)
	{
		if ($no==1) {
				$this->db->insert('dt_penjualan', $data);
		} else {
				$this->db->insert('dt_jurnal', $data);
		}

	}

  function clean($no){
		if ($no==1) {
			$query = $this->db->query('DELETE n1 FROM dt_penjualan n1, dt_penjualan n2 WHERE n1.id > n2.id AND n1.no_reff = n2.no_reff AND n1.kd_acc2 = n2.kd_acc2 AND n1.kd_acc3 = n2.kd_acc3 AND n1.kd_acc4 = n2.kd_acc4 AND n1.kd_acc5=n2.kd_acc5 AND n1.tarif=n2.tarif' );
	    return $query;
		}else{
			$query = $this->db->query('DELETE n1 FROM dt_jurnal n1, dt_jurnal n2 WHERE n1.id > n2.id AND n1.no_reff=n2.no_reff AND n1.kd_acc1=n2.kd_acc1 AND n1.kd_acc2=n2.kd_acc2 AND n1.kd_acc3=n2.kd_acc3 AND n1.debet=n2.debet AND n1.kredit=n2.kredit AND n1.keterangan=n2.keterangan');
	    return $query;
		}

  }

	function get_tarif()
	{
		return $this->db
			->group_by('no_rm')
			->select('id, no_rm, nama')
			->get('tarif')->result();
	}
	function get_by_rm_tgl($rm='', $tgl = '')
	{
		return $this->db
			->where('no_rm', $rm)
			->where('tanggal_masuk', $tgl)
			->select('id, no_rm')
			->get('tarif')->result_array();
	}
	function get_by_rm($rm='', $tgl = '', $tgl_pulang ='')
	{
		return $this->db
			->where('no_rm', $rm)
			->where('tanggal_masuk', $tgl)
			->where('tanggal_pulang', $tgl_pulang)
			->select(' no_rm, nama, tanggal_masuk, tanggal_pulang,
				sum(prosedur_non_bedah) as prosedur_non_bedah,
				sum(tenaga_ahli) as tenaga_ahli,
				sum(radiologi) as radiologi,
				sum(rehabilitasi) as rehabilitasi,
				sum(obat) as obat,
				sum(sewa_alat) as sewa_alat,
				sum(prosedur_bedah) as prosedur_bedah,
				sum(keperawatan) as keperawatan,
				sum(laboratorium) as laboratorium,
				sum(kamar) as kamar,
				sum(alkes) as alkes,
				sum(konsultasi) as konsultasi,
				sum(penunjang) as penunjang,
				sum(pelayanan_darah) as pelayanan_darah,
				sum(rawat_intensif) as rawat_intensif,
				sum(bmhp) as bmhp,
				sum(total) as total,
				nama_dokter
			 ')
			->group_by('no_rm')
			->get('tarif')->row_array();
	}

	function jurnal() {
		$this->db->from('dt_jurnal');
		$this->db->group_by('MONTH(tanggal), YEAR(tanggal)');
		$this->db->order_by('tanggal','DESC');
		return $this->db->get();
	}
	function jurnal_tanggal() {
		$this->db->from('dt_jurnal');
		$this->db->group_by('tanggal');
		$this->db->order_by('tanggal','DESC');
		return $this->db->get();
	}

	function penjualan() {
		$this->db->from('dt_penjualan');
		$this->db->group_by('MONTH(tanggal), YEAR(tanggal)');
		$this->db->order_by('tanggal','DESC');
		return $this->db->get();
	}
	function penjualan_tanggal() {
		$this->db->from('dt_penjualan');
		$this->db->group_by('tanggal');
		$this->db->order_by('tanggal','DESC');
		return $this->db->get();
	}

	function delete_action_jurnal($bulan,$tahun){
		$this->db->where('MONTH(tanggal)',$bulan,false);
		$this->db->where('YEAR(tanggal)',$tahun,false);
		$this->db->delete('dt_jurnal');

		}

	function delete_action_penjualan($bulan,$tahun){
		$this->db->where('MONTH(tanggal)',$bulan,false);
		$this->db->where('YEAR(tanggal)',$tahun,false);
		$this->db->delete('dt_penjualan');

		}

	function delete_tanggal_jurnal($tanggal){
		$this->db->where('tanggal',$tanggal);
		$this->db->delete('dt_jurnal');

		}
	function delete_tanggal_penjualan($tanggal){
		$this->db->where('tanggal',$tanggal);
		$this->db->delete('dt_penjualan');

		}


	function delete()
	{
		$this->db->query('DELETE FROM tarif');
	}
} ?>
