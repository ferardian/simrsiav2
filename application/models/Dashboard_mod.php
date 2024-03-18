<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class dashboard_mod extends CI_Model
{

	function get_pasien($no_rawat){
		$this->db->select('pasien.*, dokter.nm_dokter, dokter.kd_dokter, poliklinik.nm_poli, poliklinik.kd_poli, penjab.png_jawab,reg_periksa.*');
		$this->db->from('pasien');
		$this->db->join('reg_periksa','reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
		// $this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
		$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
		$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->where('reg_periksa.no_rawat',$no_rawat);
		return $this->db->get();

	}

	function getRegister(){
		$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, pasien.nm_pasien, reg_periksa.status_lanjut, pasien.no_rkm_medis, poliklinik.nm_poli, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu');
		$this->db->from('reg_periksa');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
		// $this->db->join('diagnosa_pasien','reg_periksa.no_rawat=diagnosa_pasien.no_rawat','left');
		$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
		$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
		$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat');
		$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
		$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->like('penjab.png_jawab','BPJS','both');
		$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
		$this->db->where('kamar_inap.tgl_keluar','0000-00-00');
		$this->db->or_where('reg_periksa.tgl_registrasi = curdate()');
		$this->db->order_by('reg_periksa.no_rawat','ASC');
		return $this->db->get();
	}

	function getRegisterPengajuan(){
		$this->db->select('reg_periksa.no_rawat, reg_periksa.tgl_registrasi, pasien.nm_pasien, reg_periksa.status_lanjut, pasien.no_rkm_medis, poliklinik.nm_poli, bridging_sep.no_sep, bridging_sep.tglsep, bridging_sep.jnspelayanan, dokter.nm_dokter, bridging_sep.peserta ,bridging_sep.no_kartu');
		$this->db->from('reg_periksa');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('bridging_sep','bridging_sep.no_rawat=reg_periksa.no_rawat','left');
		$this->db->join('mlite_vedika','mlite_vedika.no_rawat=reg_periksa.no_rawat','left');
		// $this->db->join('diagnosa_pasien','reg_periksa.no_rawat=diagnosa_pasien.no_rawat','left');
		$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
		$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
		$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat');
		$this->db->join('kamar', 'kamar.kd_kamar=kamar_inap.kd_kamar');
		$this->db->join('bangsal', 'bangsal.kd_bangsal=kamar.kd_bangsal');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->like('penjab.png_jawab','BPJS','both');
		$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
		$this->db->where('reg_periksa.tgl_registrasi = curdate()');
		$this->db->where('mlite_vedika.status','Pengajuan');
		$this->db->order_by('reg_periksa.no_rawat','ASC');
		return $this->db->get();
	}


	function getDiagnosa($data){
		$this->db->select('diagnosa_pasien.kd_penyakit, penyakit.nm_penyakit');
		$this->db->from('diagnosa_pasien');
		$this->db->join('penyakit','penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit');
		$this->db->where('diagnosa_pasien.no_rawat',$data);
		$this->db->where('diagnosa_pasien.prioritas','1');

		return $this->db->get()->row();
	}

	// function get_resep($no_rawat){
	// 	$query = $this->db->query('SELECT 
	// 	tgl_perawatan, 
	// 	jam  , 
	// 	GROUP_CONCAT(DISTINCT databarang.nama_brng SEPARATOR "\n") AS OBAT
	// 	FROM `detail_pemberian_obat` 
	// 	INNER JOIN databarang ON databarang.kode_brng = detail_pemberian_obat.kode_brng
	// 	INNER JOIN reg_periksa ON reg_periksa.no_rawat = detail_pemberian_obat.no_rawat
	// 	INNER JOIN pasien ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis
	// 	INNER JOIN penjab ON penjab.kd_pj = pasien.kd_pj
	// 	WHERE detail_pemberian_obat.no_rawat = "'.$no_rawat.'" AND detail_pemberian_obat.jml != 0
	// 	GROUP BY tgl_perawatan , jam');

	// 	return $query;
	// }

	function get_resep($no_rawat){
		$this->db->select('tgl_perawatan,jam,detail_pemberian_obat.no_rawat,databarang.kode_brng,databarang.h_beli,biaya_obat,jml,embalase,tuslah,total,detail_pemberian_obat.status,kd_bangsal,no_batch,nama_brng');
		$this->db->from('detail_pemberian_obat');
		$this->db->join('databarang','databarang.kode_brng=detail_pemberian_obat.kode_brng');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=detail_pemberian_obat.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('penjab','penjab.kd_pj=pasien.kd_pj');
		$this->db->where('detail_pemberian_obat.no_rawat',$no_rawat);
		$this->db->where('detail_pemberian_obat.jml != 0');

		return $this->db->get();
	}
	function get_resep_gabung($no_rawat){
		$this->db->select('tgl_perawatan,jam,detail_pemberian_obat.no_rawat,databarang.kode_brng,databarang.h_beli,biaya_obat,jml,embalase,tuslah,total,detail_pemberian_obat.status,kd_bangsal,no_batch,nama_brng');
		$this->db->from('detail_pemberian_obat');
		$this->db->join('databarang','databarang.kode_brng=detail_pemberian_obat.kode_brng');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=detail_pemberian_obat.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('penjab','penjab.kd_pj=pasien.kd_pj');
		$this->db->where('detail_pemberian_obat.no_rawat',$no_rawat);
		$this->db->where('detail_pemberian_obat.jml != 0');

		return $this->db->get();
	}


	function get_lab($data){
		$this->db->select('periksa_lab.no_rawat,periksa_lab.nip,periksa_lab.kd_jenis_prw,reg_periksa.no_rkm_medis,pasien.nm_pasien,pasien.jk,pasien.alamat,reg_periksa.umurdaftar,reg_periksa.sttsumur,petugas.nama,periksa_lab.tgl_periksa,periksa_lab.jam,periksa_lab.dokter_perujuk,periksa_lab.kd_dokter,dokter1.nm_dokter as nm_dokter1,dokter2.nm_dokter as nm_dokter2,penjab.png_jawab');
		$this->db->from('periksa_lab');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=periksa_lab.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('petugas','petugas.nip=periksa_lab.nip');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->join('dokter as dokter1','dokter1.kd_dokter=periksa_lab.kd_dokter');
		$this->db->join('dokter as dokter2','dokter2.kd_dokter=reg_periksa.kd_dokter');
		$this->db->where('periksa_lab.kategori','PK');
		$this->db->where('periksa_lab.no_rawat',$data);
		$this->db->group_by('periksa_lab.no_rawat,periksa_lab.tgl_periksa,periksa_lab.jam');
		$this->db->order_by('periksa_lab.tgl_periksa','asc');
		$this->db->order_by('periksa_lab.jam','asc');
		return $this->db->get();

	}

	function get_radiologi_rs($data){
		$this->db->select('periksa_radiologi.no_rawat,periksa_radiologi.nip,periksa_radiologi.kd_jenis_prw,reg_periksa.no_rkm_medis,pasien.nm_pasien,pasien.jk,pasien.alamat,reg_periksa.umurdaftar,reg_periksa.sttsumur,petugas.nama,periksa_radiologi.tgl_periksa,periksa_radiologi.jam,periksa_radiologi.dokter_perujuk,periksa_radiologi.kd_dokter,dokter1.nm_dokter as nm_dokter1,dokter2.nm_dokter as nm_dokter2,penjab.png_jawab,jns_perawatan_radiologi.nm_perawatan');
		$this->db->from('periksa_radiologi');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=periksa_radiologi.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('petugas','petugas.nip=periksa_radiologi.nip');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->join('dokter as dokter1','dokter1.kd_dokter=periksa_radiologi.kd_dokter');
		$this->db->join('dokter as dokter2','dokter2.kd_dokter=reg_periksa.kd_dokter');
		$this->db->join('jns_perawatan_radiologi','jns_perawatan_radiologi.kd_jenis_prw = periksa_radiologi.kd_jenis_prw');
		$this->db->where('periksa_radiologi.no_rawat',$data);
		$this->db->group_by('periksa_radiologi.no_rawat,periksa_radiologi.tgl_periksa,periksa_radiologi.jam');
		$this->db->order_by('periksa_radiologi.tgl_periksa','asc');
		$this->db->order_by('periksa_radiologi.jam','asc');
		return $this->db->get();

	}

	function getCovid($data){
		$this->db->from('periksa_lab');
		$this->db->where('periksa_lab.no_rawat',$data);
		$this->db->where('periksa_lab.kd_jenis_prw','J000049');
		return $this->db->get();
	}

	function getHasilCovid($tgl_periksa,$jam,$no_rawat){
		$this->db->from('detail_periksa_lab');
		$this->db->where('detail_periksa_lab.tgl_periksa',$tgl_periksa);
		$this->db->where('detail_periksa_lab.jam',$jam);
		$this->db->where('detail_periksa_lab.no_rawat',$no_rawat);
		$this->db->where('detail_periksa_lab.kd_jenis_prw','J000049');
		$this->db->not_like('detail_periksa_lab.nilai','Negatif','both');
		$this->db->not_like('detail_periksa_lab.nilai','','both');
		return $this->db->get();
	}

	function getDetailCovid($tgl_periksa,$jam,$no_rawat){
		$this->db->from('detail_periksa_lab');
		$this->db->where('detail_periksa_lab.tgl_periksa',$tgl_periksa);
		$this->db->where('detail_periksa_lab.jam',$jam);
		$this->db->where('detail_periksa_lab.no_rawat',$no_rawat);
		return $this->db->get();
	}

	

	function get_ttd_dokter($data){
		$this->db->select('sha1(sidikjari) as sdk,sidikjari.id,pegawai.nama');
		$this->db->from('bridging_sep');
		$this->db->join('maping_dokter_dpjpvclaim','maping_dokter_dpjpvclaim.kd_dokter_bpjs=bridging_sep.kddpjp');
		$this->db->join('pegawai','pegawai.nik=maping_dokter_dpjpvclaim.kd_dokter');
		$this->db->join('sidikjari','sidikjari.id=pegawai.id');
		$this->db->where('bridging_sep.no_sep',$data);
		return $this->db->get();
	}

	function get_ttd_dokter_by_nip($data){
		$this->db->select('maping_dokter_dpjpvclaim.kd_dokter as sdk,pegawai.nama');
		$this->db->from('bridging_sep');
		$this->db->join('maping_dokter_dpjpvclaim','maping_dokter_dpjpvclaim.kd_dokter_bpjs=bridging_sep.kddpjp');
		$this->db->join('pegawai','pegawai.nik=maping_dokter_dpjpvclaim.kd_dokter');		
		$this->db->where('bridging_sep.no_sep',$data);
		return $this->db->get();
	}

	function cari_ttd_petugas($data){
		$this->db->select('sha1(sidikjari) as sdk,sidikjari.id,pegawai.nama');
		$this->db->from('pegawai');
		$this->db->join('departemen','departemen.dep_id=pegawai.departemen');
		$this->db->join('sidikjari','sidikjari.id=pegawai.id');
		$this->db->where('pegawai.status_koor','1');
		$this->db->where('departemen.nama',$data);
		return $this->db->get();
	}

	function cari_ttd_plt(){
		$this->db->select('sha1(sidikjari) as sdk,sidikjari.id,pegawai.nama');
		$this->db->from('pegawai');
		$this->db->join('departemen','departemen.dep_id=pegawai.departemen');
		$this->db->join('sidikjari','sidikjari.id=pegawai.id');
		$this->db->where('pegawai.nik','2.317.0915');
		// $this->db->where('departemen.nama',$data);
		return $this->db->get();
	}
	


	function get_sep($no_rawat){
		$this->db->from('bridging_sep');
		$this->db->join('pasien','pasien.no_rkm_medis=bridging_sep.nomr');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=bridging_sep.no_rawat');
		// $this->db->join('rsia_verif_sep','rsia_verif_sep.no_sep=bridging_sep.no_sep');
		$this->db->where('bridging_sep.no_rawat',$no_rawat);
		return $this->db->get();
	}

	function get_sep_batch(){
		$this->db->from('bridging_sep');
		$this->db->where('tglsep >=','2023-04-20');
		$this->db->where('tglsep <=','2023-04-30');
		return $this->db->get();
	}

	function cek_data_berkas($no_rawat){
		$this->db->from('berkas_digital_perawatan');
		$this->db->join('master_berkas_digital','master_berkas_digital.kode=berkas_digital_perawatan.kode');
		$this->db->where('no_rawat',$no_rawat);
		return $this->db->get();
	}

	function getKodeBerkas(){
		return $this->db->get_where('master_berkas_digital',array('nama'=>'BERKAS KLAIM INDIVIDUAL PASIEN'));
	}

	function getKodeBerkasKlaim(){
		return $this->db->get_where('master_berkas_digital',array('nama'=>'BERKAS KLAIM PENGAJUAN'));
	}

	function insert_status($data){
		return $this->db->insert('mlite_vedika',$data);
	}
	function insert_naik_kelas($data){
		return $this->db->insert('rsia_naik_kelas',$data);
	}
	function hapusNaikKelas($data){
		return $this->db->delete('rsia_naik_kelas',array('no_sep'=>$data));
	}

	function edit_naik_kelas($data,$where){
		return $this->db->update('rsia_naik_kelas',$data,array('no_sep'=>$where));
	}

	function cek_status_klaim($data){
		$this->db->from('mlite_vedika');
		$this->db->where('nosep',$data);
		return $this->db->get();
	}

	function insert_catatan($data){
		return $this->db->insert('mlite_vedika_feedback',$data);
	}

	function get_status($data){
		$this->db->select('mlite_vedika.*');
		$this->db->from('mlite_vedika');
		// $this->db->join('mlite_vedika_feedback','mlite_vedika_feedback.nosep=mlite_vedika.nosep');
		$this->db->where('mlite_vedika.nosep',$data);
		$this->db->order_by('mlite_vedika.id','DESC');
		// $this->db->group_by('mlite_vedika_feedback.catatan');
		return $this->db->get();
	}

	function get_status_catatan($data){
		// $this->db->select('mlite_vedika_feedback');
		$this->db->from('mlite_vedika_feedback');
		// $this->db->join('mlite_vedika_feedback','mlite_vedika_feedback.nosep=mlite_vedika.nosep');
		$this->db->where('mlite_vedika_feedback.nosep',$data);
		$this->db->order_by('mlite_vedika_feedback.id','DESC');
		// $this->db->group_by('mlite_vedika_feedback.catatan');
		return $this->db->get();
	}

	function get_resume($data){
		$this->db->select('resume_pasien_ranap.*,pasien.no_rkm_medis,pasien.nm_pasien,pasien.namakeluarga,pasien.tgl_lahir,reg_periksa.umurdaftar,reg_periksa.sttsumur,reg_periksa.tgl_registrasi,reg_periksa.jam_reg,pasien.tgl_lahir,pasien.alamat,pasien.no_tlp,kamar_inap.tgl_masuk,kamar_inap.jam_masuk,kamar_inap.tgl_keluar,kamar_inap.jam_keluar,kamar_inap.lama,bangsal.nm_bangsal,penjab.png_jawab,dokter.nm_dokter, kamar.kd_kamar');
		$this->db->from('resume_pasien_ranap');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=resume_pasien_ranap.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat','left');
		$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar','left');
		$this->db->join('bangsal','bangsal.kd_bangsal=kamar.kd_bangsal','left');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
		$this->db->where('kamar_inap.stts_pulang <>','Pindah Kamar');
		$this->db->where('resume_pasien_ranap.no_rawat',$data);
		$this->db->group_by('resume_pasien_ranap.no_rawat');
		return $this->db->get();
	}

	function get_resume_ralan($data){
		$this->db->from('pemeriksaan_ralan');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=pemeriksaan_ralan.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('diagnosa_pasien','diagnosa_pasien.no_rawat=pemeriksaan_ralan.no_rawat');
		$this->db->join('poliklinik','poliklinik.kd_poli=reg_periksa.kd_poli');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');
		$this->db->join('penyakit','penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit');
		$this->db->where('pemeriksaan_ralan.no_rawat',$data);
		$this->db->group_by('pemeriksaan_ralan.no_rawat');
		return $this->db->get();
	}

	function get_resume_gabung($data){
		$this->db->select('resume_pasien_ranap.*,pasien.no_rkm_medis,pasien.nm_pasien,pasien.namakeluarga,pasien.tgl_lahir,reg_periksa.umurdaftar,reg_periksa.sttsumur,reg_periksa.tgl_registrasi,reg_periksa.jam_reg,pasien.tgl_lahir,pasien.alamat,pasien.no_tlp,dokter.nm_dokter');
		$this->db->from('resume_pasien_ranap');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=resume_pasien_ranap.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('penjab','penjab.kd_pj=reg_periksa.kd_pj');
		$this->db->join('dokter','dokter.kd_dokter=reg_periksa.kd_dokter');	
		$this->db->where('resume_pasien_ranap.no_rawat',$data);
		$this->db->group_by('resume_pasien_ranap.no_rawat');
		return $this->db->get();
	}

	function get_pemeriksaan_ralan($data,$tgl_registrasi){
		return $this->db->query('SELECT pemeriksaan_ralan.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi,bridging_sep.no_sep,bridging_sep.jnspelayanan,poliklinik.nm_poli,pasien.nm_pasien,pemeriksaan_ralan.tgl_perawatan,pemeriksaan_ralan.jam_rawat,pemeriksaan_ralan.suhu_tubuh,pemeriksaan_ralan.tensi,pemeriksaan_ralan.nadi,pemeriksaan_ralan.respirasi,pemeriksaan_ralan.tinggi,pemeriksaan_ralan.berat,pemeriksaan_ralan.spo2,pemeriksaan_ralan.gcs,pemeriksaan_ralan.kesadaran,pemeriksaan_ralan.keluhan,pemeriksaan_ralan.pemeriksaan,pemeriksaan_ralan.alergi,pemeriksaan_ralan.penilaian,pemeriksaan_ralan.rtl,pemeriksaan_ralan.instruksi,pemeriksaan_ralan.evaluasi,pemeriksaan_ralan.nip,pegawai.nama,pegawai.jbtn from pasien inner join reg_periksa on reg_periksa.no_rkm_medis=pasien.no_rkm_medis inner join pemeriksaan_ralan on pemeriksaan_ralan.no_rawat=reg_periksa.no_rawat inner join pegawai on pemeriksaan_ralan.nip=pegawai.nik left join bridging_sep on bridging_sep.no_rawat = reg_periksa.no_rawat inner join poliklinik on poliklinik.kd_poli = reg_periksa.kd_poli where reg_periksa.no_rkm_medis="'.$data.'" and reg_periksa.tgl_registrasi between "'.$tgl_registrasi.'" - INTERVAL 30 DAY AND "'.$tgl_registrasi.'" + INTERVAL 30 DAY order by date(pemeriksaan_ralan.tgl_perawatan) DESC, pemeriksaan_ralan.jam_rawat DESC');
	}

	function get_pemeriksaan_ralan_klaim($data,$tgl_registrasi){
		return $this->db->query('SELECT pemeriksaan_ralan_klaim.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi,bridging_sep.no_sep,bridging_sep.jnspelayanan,poliklinik.nm_poli,pasien.nm_pasien,pemeriksaan_ralan_klaim.tgl_perawatan,pemeriksaan_ralan_klaim.jam_rawat,pemeriksaan_ralan_klaim.suhu_tubuh,pemeriksaan_ralan_klaim.tensi,pemeriksaan_ralan_klaim.nadi,pemeriksaan_ralan_klaim.respirasi,pemeriksaan_ralan_klaim.tinggi,pemeriksaan_ralan_klaim.berat,pemeriksaan_ralan_klaim.spo2,pemeriksaan_ralan_klaim.gcs,pemeriksaan_ralan_klaim.kesadaran,pemeriksaan_ralan_klaim.keluhan,pemeriksaan_ralan_klaim.pemeriksaan,pemeriksaan_ralan_klaim.alergi,pemeriksaan_ralan_klaim.penilaian,pemeriksaan_ralan_klaim.rtl,pemeriksaan_ralan_klaim.instruksi,pemeriksaan_ralan_klaim.evaluasi,pemeriksaan_ralan_klaim.nip,pegawai.nama,pegawai.jbtn from pasien inner join reg_periksa on reg_periksa.no_rkm_medis=pasien.no_rkm_medis inner join pemeriksaan_ralan_klaim on pemeriksaan_ralan_klaim.no_rawat=reg_periksa.no_rawat inner join pegawai on pemeriksaan_ralan_klaim.nip=pegawai.nik left join bridging_sep on bridging_sep.no_rawat = reg_periksa.no_rawat inner join poliklinik on poliklinik.kd_poli = reg_periksa.kd_poli where reg_periksa.no_rkm_medis="'.$data.'" and reg_periksa.tgl_registrasi between "'.$tgl_registrasi.'" - INTERVAL 30 DAY AND "'.$tgl_registrasi.'" + INTERVAL 30 DAY order by date(pemeriksaan_ralan_klaim.tgl_perawatan) ASC, pemeriksaan_ralan_klaim.jam_rawat ASC');
	}

	function get_pemeriksaan_ranap($data,$tgl_registrasi){
		return $this->db->query('SELECT pemeriksaan_ranap.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi,bridging_sep.no_sep,bridging_sep.jnspelayanan,pasien.nm_pasien,pemeriksaan_ranap.tgl_perawatan,pemeriksaan_ranap.jam_rawat,pemeriksaan_ranap.suhu_tubuh,pemeriksaan_ranap.tensi,pemeriksaan_ranap.nadi,pemeriksaan_ranap.respirasi,pemeriksaan_ranap.tinggi,pemeriksaan_ranap.berat,pemeriksaan_ranap.spo2,pemeriksaan_ranap.gcs,pemeriksaan_ranap.kesadaran,pemeriksaan_ranap.keluhan,pemeriksaan_ranap.pemeriksaan,pemeriksaan_ranap.alergi,pemeriksaan_ranap.penilaian,pemeriksaan_ranap.rtl,pemeriksaan_ranap.instruksi,pemeriksaan_ranap.evaluasi,pemeriksaan_ranap.nip,pegawai.nama,pegawai.jbtn from pasien inner join reg_periksa on reg_periksa.no_rkm_medis=pasien.no_rkm_medis inner join pemeriksaan_ranap on pemeriksaan_ranap.no_rawat=reg_periksa.no_rawat inner join pegawai on pemeriksaan_ranap.nip=pegawai.nik left join bridging_sep on bridging_sep.no_rawat = reg_periksa.no_rawat where reg_periksa.no_rkm_medis="'.$data.'" and reg_periksa.tgl_registrasi between "'.$tgl_registrasi.'" - INTERVAL 30 DAY AND "'.$tgl_registrasi.'" + INTERVAL 30 DAY order by date(pemeriksaan_ranap.tgl_perawatan) DESC, pemeriksaan_ranap.jam_rawat DESC');
	}

	function get_pemeriksaan_ranap_klaim($data,$tgl_registrasi){
		return $this->db->query('SELECT pemeriksaan_ranap_klaim.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi,bridging_sep.no_sep,bridging_sep.jnspelayanan,pasien.nm_pasien,pemeriksaan_ranap_klaim.tgl_perawatan,pemeriksaan_ranap_klaim.jam_rawat,pemeriksaan_ranap_klaim.suhu_tubuh,pemeriksaan_ranap_klaim.tensi,pemeriksaan_ranap_klaim.nadi,pemeriksaan_ranap_klaim.respirasi,pemeriksaan_ranap_klaim.tinggi,pemeriksaan_ranap_klaim.berat,pemeriksaan_ranap_klaim.spo2,pemeriksaan_ranap_klaim.gcs,pemeriksaan_ranap_klaim.kesadaran,pemeriksaan_ranap_klaim.keluhan,pemeriksaan_ranap_klaim.pemeriksaan,pemeriksaan_ranap_klaim.alergi,pemeriksaan_ranap_klaim.penilaian,pemeriksaan_ranap_klaim.rtl,pemeriksaan_ranap_klaim.instruksi,pemeriksaan_ranap_klaim.evaluasi,pemeriksaan_ranap_klaim.nip,pegawai.nama,pegawai.jbtn from pasien inner join reg_periksa on reg_periksa.no_rkm_medis=pasien.no_rkm_medis inner join pemeriksaan_ranap_klaim on pemeriksaan_ranap_klaim.no_rawat=reg_periksa.no_rawat inner join pegawai on pemeriksaan_ranap_klaim.nip=pegawai.nik left join bridging_sep on bridging_sep.no_rawat = reg_periksa.no_rawat where reg_periksa.no_rkm_medis="'.$data.'" and reg_periksa.tgl_registrasi between "'.$tgl_registrasi.'" - INTERVAL 30 DAY AND "'.$tgl_registrasi.'" + INTERVAL 30 DAY order by date(pemeriksaan_ranap_klaim.tgl_perawatan) ASC, pemeriksaan_ranap_klaim.jam_rawat ASC');
	}

	function cari_cppt($data1,$data2,$data3){
		$this->db->from('pemeriksaan_ranap_klaim');
		$this->db->where('pemeriksaan_ranap_klaim.no_rawat',$data1);
		$this->db->where('pemeriksaan_ranap_klaim.tgl_perawatan',$data2);
		$this->db->where('pemeriksaan_ranap_klaim.jam_rawat',$data3);
		return $this->db->get();
	}

	function cari_cppt_ralan($data1,$data2,$data3){
		$this->db->from('pemeriksaan_ralan_klaim');
		$this->db->where('pemeriksaan_ralan_klaim.no_rawat',$data1);
		$this->db->where('pemeriksaan_ralan_klaim.tgl_perawatan',$data2);
		$this->db->where('pemeriksaan_ralan_klaim.jam_rawat',$data3);
		return $this->db->get();
	}

	function insertCPPT($table_sumber,$table,$data1,$data2,$data3){
		return $this->db->query('INSERT INTO '.$table.'
		SELECT
		  *
		FROM
		'.$table_sumber.'
		WHERE '.$table_sumber.'.no_rawat = "'.$data1.'"
		  AND '.$table_sumber.'.tgl_perawatan = "'.$data2.'"
		  AND '.$table_sumber.'.jam_rawat = "'.$data3.'"');
	}

	function hapusCPPT($table,$data){
		return $this->db->delete($table,$data);
	}

	function get_asmed_ugd($data){
		return $this->db->query('select reg_periksa.no_rawat,reg_periksa.umurdaftar,reg_periksa.sttsumur,pasien.no_rkm_medis,pasien.alamat,pasien.no_tlp,pasien.nm_pasien,if(pasien.jk="L","Laki-Laki","Perempuan") as jk,pasien.jk as jekel,pasien.tgl_lahir,penilaian_medis_igd.tanggal,penilaian_medis_igd.kd_dokter,penilaian_medis_igd.anamnesis,penilaian_medis_igd.hubungan,penilaian_medis_igd.keluhan_utama,penilaian_medis_igd.rps,penilaian_medis_igd.rpk,penilaian_medis_igd.rpd,penilaian_medis_igd.rpo,penilaian_medis_igd.alergi,penilaian_medis_igd.keadaan,penilaian_medis_igd.gcs,penilaian_medis_igd.kesadaran,penilaian_medis_igd.td,penilaian_medis_igd.nadi,penilaian_medis_igd.rr,penilaian_medis_igd.suhu,penilaian_medis_igd.spo,penilaian_medis_igd.bb,penilaian_medis_igd.tb,penilaian_medis_igd.kepala,penilaian_medis_igd.mata,penilaian_medis_igd.gigi,penilaian_medis_igd.leher,penilaian_medis_igd.thoraks,penilaian_medis_igd.abdomen,penilaian_medis_igd.ekstremitas,penilaian_medis_igd.genital,penilaian_medis_igd.ket_fisik,penilaian_medis_igd.ket_lokalis,penilaian_medis_igd.ekg,penilaian_medis_igd.rad,penilaian_medis_igd.lab,penilaian_medis_igd.diagnosis,penilaian_medis_igd.tata,dokter.nm_dokter from reg_periksa inner join pasien on reg_periksa.no_rkm_medis=pasien.no_rkm_medis inner join penilaian_medis_igd on reg_periksa.no_rawat=penilaian_medis_igd.no_rawat inner join dokter on penilaian_medis_igd.kd_dokter=dokter.kd_dokter where penilaian_medis_igd.no_rawat="'.$data.'" and reg_periksa.status_lanjut="Ralan"');
	}

	function get_asmed_ugd_all($data){
		return $this->db->query('select reg_periksa.no_rawat,reg_periksa.umurdaftar,reg_periksa.sttsumur,pasien.no_rkm_medis,pasien.alamat,pasien.no_tlp,pasien.nm_pasien,if(pasien.jk="L","Laki-Laki","Perempuan") as jk,pasien.jk as jekel,pasien.tgl_lahir,penilaian_medis_igd.tanggal,penilaian_medis_igd.kd_dokter,penilaian_medis_igd.anamnesis,penilaian_medis_igd.hubungan,penilaian_medis_igd.keluhan_utama,penilaian_medis_igd.rps,penilaian_medis_igd.rpk,penilaian_medis_igd.rpd,penilaian_medis_igd.rpo,penilaian_medis_igd.alergi,penilaian_medis_igd.keadaan,penilaian_medis_igd.gcs,penilaian_medis_igd.kesadaran,penilaian_medis_igd.td,penilaian_medis_igd.nadi,penilaian_medis_igd.rr,penilaian_medis_igd.suhu,penilaian_medis_igd.spo,penilaian_medis_igd.bb,penilaian_medis_igd.tb,penilaian_medis_igd.kepala,penilaian_medis_igd.mata,penilaian_medis_igd.gigi,penilaian_medis_igd.leher,penilaian_medis_igd.thoraks,penilaian_medis_igd.abdomen,penilaian_medis_igd.ekstremitas,penilaian_medis_igd.genital,penilaian_medis_igd.ket_fisik,penilaian_medis_igd.ket_lokalis,penilaian_medis_igd.ekg,penilaian_medis_igd.rad,penilaian_medis_igd.lab,penilaian_medis_igd.diagnosis,penilaian_medis_igd.tata,dokter.nm_dokter from reg_periksa inner join pasien on reg_periksa.no_rkm_medis=pasien.no_rkm_medis inner join penilaian_medis_igd on reg_periksa.no_rawat=penilaian_medis_igd.no_rawat inner join dokter on penilaian_medis_igd.kd_dokter=dokter.kd_dokter where penilaian_medis_igd.no_rawat="'.$data.'"');
	}

	function get_pemeriksaan_usg($data){
		$this->db->from('catatan_perawatan');
		$this->db->join('dokter','dokter.kd_dokter=catatan_perawatan.kd_dokter');
		$this->db->where('no_rawat',$data);
		return $this->db->get();
	}

	function get_laporan_operasi($data){
		$this->db->select('pasien.no_rkm_medis,pasien.nm_pasien,pasien.tgl_lahir,reg_periksa.no_rawat,pasien.jk,reg_periksa.umurdaftar,reg_periksa.sttsumur,pasien.tgl_lahir,pasien.alamat,pasien.no_tlp,dokter_operator1.nm_dokter as dokter_operator1,anestesi1.nm_dokter as anestesi1,anak.nm_dokter as anak,asisten_op1.nama as asisten_op1,asisten_op2.nama as asisten_op2,asisten_anestesi.nama as asisten_anestesi,onloop.nama as onloop,rsia_operasi_safe.jenis_anestesi,rsia_operasi_safe.tgl_operasi,rsia_operasi_safe.tgl_selesai,rsia_operasi_safe.diagnosa_preop,rsia_operasi_safe.diagnosa_postop,rsia_operasi_safe.jaringan_insisi,rsia_operasi_safe.pemeriksaan_pa,rsia_operasi_safe.tgl_operasi,rsia_operasi_safe.tgl_selesai,paket_operasi.nm_perawatan,rsia_operasi_safe.laporan_operasi');
		$this->db->from('rsia_operasi_safe');
		// $this->db->join('operasi','operasi.no_rawat=rsia_operasi_safe.no_rawat');
		$this->db->join('paket_operasi','paket_operasi.kode_paket=rsia_operasi_safe.kode_paket');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_operasi_safe.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('dokter as dokter_operator1','dokter_operator1.kd_dokter=rsia_operasi_safe.operator1');
		$this->db->join('dokter as anestesi1','anestesi1.kd_dokter=rsia_operasi_safe.dokter_anestesi');
		$this->db->join('dokter as anak','anak.kd_dokter=rsia_operasi_safe.dokter_anak');
		$this->db->join('petugas as asisten_op1','asisten_op1.nip=rsia_operasi_safe.asisten_operator1');
		$this->db->join('petugas as asisten_op2','asisten_op2.nip=rsia_operasi_safe.asisten_operator2');
		$this->db->join('petugas as asisten_anestesi','asisten_anestesi.nip=rsia_operasi_safe.asisten_anestesi');
		$this->db->join('petugas as onloop','onloop.nip=rsia_operasi_safe.onloop');
		$this->db->where('rsia_operasi_safe.no_rawat',$data);
		return $this->db->get();
	}

	function get_detail_laporan_operasi($data1,$data2,$data3){
		$this->db->select('pasien.no_rkm_medis,pasien.nm_pasien,pasien.tgl_lahir,reg_periksa.no_rawat,pasien.jk,reg_periksa.umurdaftar,reg_periksa.sttsumur,pasien.tgl_lahir,pasien.alamat,pasien.no_tlp,dokter_operator1.nm_dokter as dokter_operator1,anestesi1.nm_dokter as anestesi1,anak.nm_dokter as anak,asisten_op1.nama as asisten_op1,asisten_op2.nama as asisten_op2,asisten_anestesi.nama as asisten_anestesi,onloop.nama as onloop,rsia_operasi_safe.jenis_anestesi,rsia_operasi_safe.tgl_operasi,rsia_operasi_safe.tgl_selesai,rsia_operasi_safe.diagnosa_preop,rsia_operasi_safe.diagnosa_postop,rsia_operasi_safe.jaringan_insisi,rsia_operasi_safe.pemeriksaan_pa,rsia_operasi_safe.tgl_operasi,rsia_operasi_safe.tgl_selesai,paket_operasi.nm_perawatan,rsia_operasi_safe.laporan_operasi,rsia_operasi_safe.darah_masuk,rsia_operasi_safe.darah_hilang,rsia_operasi_safe.komplikasi');
		$this->db->from('rsia_operasi_safe');
		// $this->db->join('operasi','operasi.no_rawat=rsia_operasi_safe.no_rawat');
		$this->db->join('paket_operasi','paket_operasi.kode_paket=rsia_operasi_safe.kode_paket');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=rsia_operasi_safe.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('dokter as dokter_operator1','dokter_operator1.kd_dokter=rsia_operasi_safe.operator1');
		$this->db->join('dokter as anestesi1','anestesi1.kd_dokter=rsia_operasi_safe.dokter_anestesi');
		$this->db->join('dokter as anak','anak.kd_dokter=rsia_operasi_safe.dokter_anak');
		$this->db->join('petugas as asisten_op1','asisten_op1.nip=rsia_operasi_safe.asisten_operator1');
		$this->db->join('petugas as asisten_op2','asisten_op2.nip=rsia_operasi_safe.asisten_operator2');
		$this->db->join('petugas as asisten_anestesi','asisten_anestesi.nip=rsia_operasi_safe.asisten_anestesi');
		$this->db->join('petugas as onloop','onloop.nip=rsia_operasi_safe.onloop');
		$this->db->where('rsia_operasi_safe.no_rawat',$data1);
		$this->db->where('rsia_operasi_safe.tgl_operasi',$data2);
		$this->db->where('rsia_operasi_safe.tgl_selesai',$data3);
		return $this->db->get();
	}

	function get_ttd_sep($no_sep){
		$this->db->from('rsia_verif_sep');
		$this->db->where('no_sep',$no_sep);
		return $this->db->get();
	}

	function get_surat_kontrol($data){
		$this->db->from('bridging_surat_kontrol_bpjs');
		$this->db->join('bridging_sep','bridging_sep.noskdp=bridging_surat_kontrol_bpjs.no_surat');
		$this->db->join('pasien','pasien.no_rkm_medis=bridging_sep.nomr');
		$this->db->where('bridging_sep.no_sep',$data);
		return $this->db->get();
	}

	function get_spri($data){
		$this->db->from('bridging_surat_pri_bpjs');
		$this->db->join('bridging_sep','bridging_sep.noskdp=bridging_surat_pri_bpjs.no_surat');
		$this->db->join('pasien','pasien.no_rkm_medis=bridging_sep.nomr');
		$this->db->where('bridging_sep.no_sep',$data);
		$this->db->where('bridging_sep.jnspelayanan','1');
		$this->db->group_by('bridging_sep.no_sep');
		return $this->db->get();
	}


	function get_diagnosa_primer($data){
		$this->db->from('diagnosa_pasien');
		$this->db->join('penyakit','penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit');
		$this->db->where('no_rawat',$data);
		$this->db->limit('1');
		$this->db->order_by('prioritas','ASC');
		return $this->db->get();
	}

	function get_diagnosa_sekunder($data,$kd_penyakit){
		$this->db->from('diagnosa_pasien');
		$this->db->join('penyakit','penyakit.kd_penyakit=diagnosa_pasien.kd_penyakit');
		$this->db->where('no_rawat',$data);
		$this->db->where('diagnosa_pasien.kd_penyakit <>',$kd_penyakit);
		$this->db->order_by('prioritas','ASC');
		return $this->db->get();
	}

	function get_prosedur($data){
		$this->db->from('prosedur_pasien');
		$this->db->join('icd9','icd9.kode=prosedur_pasien.kode');
		$this->db->where('no_rawat',$data);
		$this->db->order_by('prioritas','ASC');
		return $this->db->get();
	}

	function getJenisBerkas(){
		return $this->db->get('master_berkas_digital');

	}

	function get_berkas($data){
		$this->db->from('berkas_digital_perawatan');
		$this->db->join('master_berkas_digital','master_berkas_digital.kode=berkas_digital_perawatan.kode');
		$this->db->where('no_rawat',$data);
		// $this->db->where('berkas_digital_perawatan.kode','009');
		return $this->db->get();
	}

	function get_berkas2($data){
		$this->db->from('rsia_upload');
		$this->db->where('no_rawat',$data);
		return $this->db->get();
	}


	function get_detail($no_rawat,$tgl_periksa,$jam){
		$this->db->select('jns_perawatan_lab.kd_jenis_prw,jns_perawatan_lab.nm_perawatan,periksa_lab.no_rawat,periksa_lab.tgl_periksa,periksa_lab.jam');
		$this->db->from('periksa_lab');
		$this->db->join('jns_perawatan_lab','jns_perawatan_lab.kd_jenis_prw=periksa_lab.kd_jenis_prw');
		$this->db->where('periksa_lab.no_rawat',$no_rawat);
		$this->db->where('periksa_lab.tgl_periksa',$tgl_periksa);
		$this->db->where('periksa_lab.jam',$jam);
		return $this->db->get();
	}
	function get_detail_radiologi($no_rawat,$tgl_periksa,$jam){
		// $this->db->select('jns_perawatan_lab.kd_jenis_prw,jns_perawatan_lab.nm_perawatan,periksa_lab.no_rawat,periksa_lab.tgl_periksa,periksa_lab.jam');
		$this->db->from('periksa_radiologi');
		$this->db->join('hasil_radiologi','hasil_radiologi.no_rawat=periksa_radiologi.no_rawat');
		$this->db->where('hasil_radiologi.no_rawat',$no_rawat);
		$this->db->where('hasil_radiologi.tgl_periksa',$tgl_periksa);
		$this->db->where('hasil_radiologi.jam',$jam);
		return $this->db->get();
	}

	function get_template($no_rawat,$kd_jenis_prw,$tgl_periksa,$jam){
		$this->db->select('template_laboratorium.Pemeriksaan,detail_periksa_lab.nilai,template_laboratorium.satuan,detail_periksa_lab.nilai_rujukan,detail_periksa_lab.biaya_item,detail_periksa_lab.keterangan,detail_periksa_lab.kd_jenis_prw');
		$this->db->from('detail_periksa_lab');
		$this->db->join('template_laboratorium','template_laboratorium.id_template=detail_periksa_lab.id_template');
		$this->db->where('detail_periksa_lab.no_rawat',$no_rawat);
		$this->db->where('detail_periksa_lab.kd_jenis_prw',$kd_jenis_prw);
		$this->db->where('detail_periksa_lab.tgl_periksa',$tgl_periksa);
		$this->db->where('detail_periksa_lab.jam',$jam);
		$this->db->order_by('template_laboratorium.urut');
		return $this->db->get();
	}

	function getId($data){
		$this->db->select('sha1(sidikjari) as sdk,sidikjari.id,pegawai.nama');
		$this->db->from('sidikjari');
		$this->db->join('pegawai','pegawai.id=sidikjari.id');
		$this->db->where('pegawai.nik',$data);
		return $this->db->get();
	}

	function getKamar($data){
		$this->db->select("kd_kamar");
		$this->db->from('kamar_inap');
		$this->db->where('no_rawat',$data);
		$this->db->order_by('tgl_masuk','desc');
		$this->db->limit(1);
		return $this->db->get();
	}

	function getNamaPoli($data){
		$this->db->select('nm_poli');
		$this->db->from('poliklinik');
		$this->db->join('reg_periksa','reg_periksa.kd_poli=poliklinik.kd_poli');
		$this->db->where('no_rawat',$data);
		return $this->db->get();
	}

	function dataPasien($data){
		$this->db->select("reg_periksa.no_rawat,tgl_registrasi,status_lanjut,jam_reg,pasien.nm_pasien,pasien.no_rkm_medis, CONCAT(pasien.alamat,', ',kelurahan.nm_kel,', ',kecamatan.nm_kec,', ',kabupaten.nm_kab) as alamat");
		$this->db->from('reg_periksa');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		$this->db->join('kelurahan','pasien.kd_kel=kelurahan.kd_kel');
		$this->db->join('kecamatan','pasien.kd_kec=kecamatan.kd_kec');
		$this->db->join('kabupaten','pasien.kd_kab=kabupaten.kd_kab');
		$this->db->where('reg_periksa.no_rawat',$data);
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

	function getDokterBiaya($data){
		$this->db->select('dokter.nm_dokter');
		$this->db->from('rawat_inap_dr');
		$this->db->join('dokter','rawat_inap_dr.kd_dokter=dokter.kd_dokter');
		$this->db->where('no_rawat',$data);
		$this->db->group_by('rawat_inap_dr.kd_dokter');
		return $this->db->get();
	}

	

	function getAsmenKeu(){
        // $this->db->from('pegawai');
        // $this->db->where('jnj_jabatan','RS7');
        // return $this->db->get();
        $this->db->select('sha1(sidikjari) as sdk,sidikjari.id,pegawai.nama');
        $this->db->from('sidikjari');
        $this->db->join('pegawai','pegawai.id=sidikjari.id');
        $this->db->where('jnj_jabatan','RS7');
        return $this->db->get();
    }

	function getKasir($data){
		$this->db->from('jurnal');
		$this->db->where('no_bukti',$data);
		$this->db->like('keterangan','TINDAKAN','both');
		$this->db->order_by('tgl_jurnal','DESC');
		$this->db->order_by('jam_jurnal','DESC');
		$this->db->limit(1);
		// $this->db->group_by('no_bukti');
		return $this->db->get();
	}

	function getPetugasKasir($data){
		$this->db->select('sha1(sidikjari) as sdk,sidikjari.id,pegawai.nama');
        $this->db->from('sidikjari');
        $this->db->join('pegawai','pegawai.id=sidikjari.id');
        $this->db->where('pegawai.nik',$data);
        return $this->db->get();
	}

	function notaJalan($data){
		$this->db->select('no_nota');
		$this->db->from('nota_jalan');
		$this->db->where('no_rawat',$data);
		return $this->db->get();
	}

	function notaInap($data){
		$this->db->select('no_nota');
		$this->db->from('nota_inap');
		$this->db->where('no_rawat',$data);
		return $this->db->get();
	}

	function insert_berkas($data){
		return $this->db->insert('berkas_digital_perawatan',$data);

	}


	function get_berkas_klaim_inacbg($data){
		$this->db->from('berkas_digital_perawatan');
		$this->db->join('master_berkas_digital','master_berkas_digital.kode=berkas_digital_perawatan.kode');
		$this->db->where('berkas_digital_perawatan.no_rawat',$data);
		$this->db->where('master_berkas_digital.nama','BERKAS KLAIM INDIVIDUAL PASIEN');
		return $this->db->get();
	}

	
	function get_berkas_klaim($data){
		$this->db->from('berkas_digital_perawatan');
		$this->db->join('master_berkas_digital','master_berkas_digital.kode=berkas_digital_perawatan.kode');
		$this->db->where('berkas_digital_perawatan.no_rawat',$data);
		$this->db->where('master_berkas_digital.kode','009');
		return $this->db->get();
	}

	function get_laborat($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','laborat');
		return $this->db->get();
	}
	function get_radiologi($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','radiologi');
		return $this->db->get();
	}
	function get_surat_rujukan($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','surat rujukan');
		return $this->db->get();
	}
	function get_lainnya($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','lainnya');
		return $this->db->get();
	}
	function get_skl($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','skl');
		return $this->db->get();
	}
	function get_form_rujukan($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','form-rujukan');
		return $this->db->get();
	}
	function get_km($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','km');
		return $this->db->get();
	}
	function get_legalisasi($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','legalisasi');
		return $this->db->get();
	}

	function get_usg($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','usg');
		return $this->db->get();
	}
	function get_resume_berkas($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','resume');
		return $this->db->get();
	}
	function get_cppt($data){
		$this->db->from('rsia_upload');
		$this->db->where('rsia_upload.no_rawat',$data);
		$this->db->where('rsia_upload.kategori','cppt');
		return $this->db->get();
	}
	function get_hasil_usg($data){
		$this->db->from('catatan_perawatan');
		$this->db->where('catatan_perawatan.no_rawat',$data);		
		$this->db->order_by('catatan_perawatan.tanggal','DESC');
		$this->db->order_by('catatan_perawatan.jam','DESC');
		$this->db->limit(1);
		return $this->db->get();
	}

	// function perbaikan_ralan($bulan,$tahun){
	// 	return $this->db->query('SELECT
	// 	mlite_vedika.*
	//   FROM
	// 	reg_periksa
	// 	JOIN bridging_sep
	// 	  ON bridging_sep.no_rawat = reg_periksa.no_rawat
	// 	JOIN mlite_vedika
	// 	  ON mlite_vedika.no_rawat = reg_periksa.no_rawat
	//   WHERE bridging_sep.jnspelayanan = "2"
	// 	AND MONTH(reg_periksa.tgl_registrasi) = "'.$bulan.'"
	// 	AND YEAR(reg_periksa.tgl_registrasi) = "'.$tahun.'"
	//   GROUP BY mlite_vedika.no_rawat');
	// }

	// function perbaikan_ranap($bulan,$tahun){
	// 	return $this->db->query('SELECT
	// 	mlite_vedika.*
	//   FROM
	// 	reg_periksa
	// 	JOIN kamar_inap
	// 	  ON kamar_inap.no_rawat = reg_periksa.no_rawat
	// 	JOIN bridging_sep
	// 	  ON bridging_sep.no_rawat = reg_periksa.no_rawat
	// 	JOIN mlite_vedika
	// 	  ON mlite_vedika.no_rawat = reg_periksa.no_rawat
	//   WHERE MONTH(kamar_inap.tgl_keluar) = "'.$bulan.'"
	// 	AND YEAR(kamar_inap.tgl_keluar) = "'.$tahun.'"
	// 	AND kamar_inap.stts_pulang <> "Pindah Kamar"
	// 	GROUP BY mlite_vedika.no_rawat');
	// }


	function perbaikan_ralan($bulan,$tahun){
		return $this->db->query('SELECT
		reg_periksa.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi
	  FROM
		reg_periksa
		JOIN bridging_sep
		  ON bridging_sep.no_rawat = reg_periksa.no_rawat
	  WHERE bridging_sep.jnspelayanan = "2"
		AND MONTH(reg_periksa.tgl_registrasi) = "'.$bulan.'"
		AND YEAR(reg_periksa.tgl_registrasi) = "'.$tahun.'"');
	}

	function perbaikan_ranap($bulan,$tahun){
		return $this->db->query('SELECT
		reg_periksa.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi
	  FROM
		reg_periksa
		JOIN kamar_inap
		  ON kamar_inap.no_rawat = reg_periksa.no_rawat
		JOIN bridging_sep
		  ON bridging_sep.no_rawat = reg_periksa.no_rawat
	  WHERE MONTH(kamar_inap.tgl_keluar) = "'.$bulan.'"
		AND YEAR(kamar_inap.tgl_keluar) = "'.$tahun.'"
		AND kamar_inap.stts_pulang <> "Pindah Kamar"
		AND reg_periksa.status_lanjut = "Ranap"
		GROUP BY kamar_inap.no_rawat');
	}


	function cek_pending($data){
		$this->db->from('mlite_vedika');
		$this->db->where('mlite_vedika.no_rawat',$data);
		$this->db->limit(1);
		$this->db->order_by('id','desc');
		return $this->db->get();
	}

	function cari_berkas($data){
		$this->db->from('berkas_digital_perawatan');
		$this->db->where('berkas_digital_perawatan.no_rawat',$data);
		$this->db->where('berkas_digital_perawatan.kode',"009");
		return $this->db->get();
	}

	function berkas_klaim_ralan($bulan,$tahun){
		$this->db->from('berkas_digital_perawatan');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=berkas_digital_perawatan.no_rawat');
		$this->db->join('mlite_vedika','mlite_vedika.no_rawat = reg_periksa.no_rawat');
		$this->db->where('month(reg_periksa.tgl_registrasi)',$bulan);
		$this->db->where('year(reg_periksa.tgl_registrasi)',$tahun);
		$this->db->where('berkas_digital_perawatan.kode','009');
		$this->db->where('mlite_vedika.jenis','2');
		$this->db->group_by('mlite_vedika.no_rawat');
		return $this->db->get();
	}
	function berkas_klaim_ranap($bulan,$tahun){
		$this->db->from('berkas_digital_perawatan');
		$this->db->join('kamar_inap','kamar_inap.no_rawat=berkas_digital_perawatan.no_rawat');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=kamar_inap.no_rawat');
		$this->db->join('mlite_vedika','mlite_vedika.no_rawat = reg_periksa.no_rawat');
		$this->db->where('month(kamar_inap.tgl_keluar)',$bulan);
		$this->db->where('year(kamar_inap.tgl_keluar)',$tahun);
		$this->db->where('berkas_digital_perawatan.kode','009');
		$this->db->where('mlite_vedika.jenis','1');
		$this->db->group_by('kamar_inap.no_rawat');
		return $this->db->get();
	}

	function hitung_status($data){
		$this->db->from('mlite_vedika');
		$this->db->where('mlite_vedika.no_rawat',$data);
		$this->db->order_by('mlite_vedika.id','DESC');
		return $this->db->get();
	}

	function get_bupel(){
		return $this->db->get('rsia_bupel_klaim_rs');
	}

	function get_lama_inap($data){
		return $this->db->query('SELECT SUM(kamar_inap.lama) as lama FROM kamar_inap WHERE kamar_inap.no_rawat = "'.$data.'" and tgl_keluar <> "0000-00-00"');
	}

	function getPhoto($data){
		$this->db->from('pegawai');
		$this->db->where('nik',$data);
		return $this->db->get();
	}
	function getPhotoName($data){
		$this->db->from('pegawai');
		$this->db->where('nama',$data);
		return $this->db->get();
	}

	function pending_ralan(){
		$this->db->from('mlite_vedika');
		$this->db->where('mlite_vedika.status','Pending');
		$this->db->where('mlite_vedika.jenis','2');
		$this->db->order_by('mlite_vedika.id','DESC');
		return $this->db->get();
	}
	function pending_ranap(){
		$this->db->from('mlite_vedika');
		$this->db->where('mlite_vedika.status','Pending');
		$this->db->where('mlite_vedika.jenis','1');
		$this->db->order_by('mlite_vedika.id','DESC');
		return $this->db->get();
	}

	function pasien_pending($no_rawat){
		return $this->db->query('SELECT
		reg_periksa.no_rawat,reg_periksa.no_rkm_medis,reg_periksa.tgl_registrasi
	  FROM
		reg_periksa
	  WHERE reg_periksa.no_rawat = "'.$no_rawat.'"');
	}

	// function get_skl($data){
	// 	return $this->db->query('SELECT
	// 	pasien.no_rkm_medis,
	// 	pasien.nm_pasien,
	// 	pasien.jk,
	// 	pasien.tgl_lahir,
	// 	pasien_bayi.jam_lahir,
	// 	pasien.umur,pasien.tgl_daftar,
	// 	pasien.nm_ibu,
	// 	pasien_bayi.umur_ibu,
	// 	pasien.pekerjaanpj,
	// 	pasien_bayi.nama_ayah,
	// 	pasien_bayi.umur_ayah,
	// 	pasien.no_ktp,
	// 	CONCAT(pasien.alamat,", ",kelurahan.nm_kel,", ",kecamatan.nm_kec,", ",kabupaten.nm_kab) AS alamat,
	// 	pasien_bayi.berat_badan,
	// 	pasien_bayi.panjang_badan,
	// 	pasien_bayi.lingkar_kepala,
	// 	pasien_bayi.proses_lahir,
	// 	pasien_bayi.anakke,
	// 	pasien_bayi.keterangan,
	// 	pasien_bayi.diagnosa,
	// 	pasien_bayi.penyulit_kehamilan,
	// 	pasien_bayi.ketuban,
	// 	pasien_bayi.lingkar_perut,
	// 	pasien_bayi.lingkar_dada,
	// 	pegawai.nama,
	// 	pasien_bayi.no_skl
	//   FROM
	// 	pasien
	// 	INNER JOIN pegawai
	// 	INNER JOIN pasien_bayi
	// 	INNER JOIN kelurahan
	// 	INNER JOIN kecamatan
	// 	INNER JOIN kabupaten 
	// 	  ON pasien.no_rkm_medis = pasien_bayi.no_rkm_medis
	// 	  AND pasien_bayi.penolong = pegawai.nik 
	// 	  AND pasien.kd_kel = kelurahan.kd_kel
	// 	  AND pasien.kd_kec = kecamatan.kd_kec
	// 	  AND pasien.kd_kab = kabupaten.kd_kab 
	//   WHERE pasien_bayi.no_rkm_medis ='.$data.'');
	// }
	function getJenisPasien($data){
		$this->db->select('spesialis.kd_sps');
		$this->db->from('spesialis');
		$this->db->join('dokter','dokter.kd_sps = spesialis.kd_sps');
		$this->db->join('reg_periksa','reg_periksa.kd_dokter = dokter.kd_dokter');
		$this->db->where('reg_periksa.no_rawat',$data);
		$this->db->where('spesialis.kd_sps','S0001');
		return $this->db->get();
	}

	function get_register_lab_doble($no_rawat,$no_rkm_medis){
		$this->db->select('reg_periksa.no_rawat');
		$this->db->from('reg_periksa');
		$this->db->where('no_rkm_medis',$no_rkm_medis);
		$this->db->where('no_rawat <',$no_rawat);
		$this->db->order_by('no_rawat','DESC');
		$this->db->limit(1);
		return $this->db->get();
	}

	function get_naik_kelas(){
		$this->db->from('rsia_naik_kelas');
		$this->db->join('bridging_sep','bridging_sep.no_sep=rsia_naik_kelas.no_sep');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=bridging_sep.no_rawat');
		$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		// $this->db->where('kamar_inap.tgl_keluar <> ','0000-00-00');
		// $this->db->where('kamar_inap.stts_pulang <> ','Pindah Kamar');
		$this->db->group_by('bridging_sep.no_rawat');
		return $this->db->get();
	}
	function get_naik_kelas_where($data){
		$this->db->from('rsia_naik_kelas');
		$this->db->join('bridging_sep','bridging_sep.no_sep=rsia_naik_kelas.no_sep');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=bridging_sep.no_rawat');
		$this->db->join('kamar_inap','kamar_inap.no_rawat=reg_periksa.no_rawat');
		$this->db->join('kamar','kamar.kd_kamar=kamar_inap.kd_kamar');
		$this->db->join('pasien','pasien.no_rkm_medis=reg_periksa.no_rkm_medis');
		// $this->db->where('kamar_inap.tgl_keluar <> ','0000-00-00');
		$this->db->where('kamar_inap.tgl_keluar <> ','0000-00-00');
		$this->db->where('kamar_inap.stts_pulang <> ','Pindah Kamar');
		$this->db->where('bridging_sep.no_rawat',$data);
		$this->db->group_by('bridging_sep.no_rawat');
		return $this->db->get();
	}
	function get_naik_kelas_where2($data){
		$this->db->from('bridging_sep');
		$this->db->join('pasien','pasien.no_rkm_medis=bridging_sep.nomr');
		$this->db->join('reg_periksa','reg_periksa.no_rawat=bridging_sep.no_rawat');
		// $this->db->join('rsia_verif_sep','rsia_verif_sep.no_sep=bridging_sep.no_sep');
		$this->db->where('bridging_sep.no_rawat',$data);
		return $this->db->get();
	}

}