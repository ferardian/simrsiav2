<?php
class login_mod extends CI_Model{
    public function get_login ($username) {
        // return $this->db->get_where('user', array('username' => $username, 'password' => $password))->num_rows();
        return $this->db->query('SELECT AES_DECRYPT(user.id_user,"nur") as username, AES_DECRYPT(user.password,"windi") as password FROM  user WHERE user.id_user = AES_ENCRYPT("'.$username.'","nur")')->row();
    }
    public function get_user($username) {
        // return $this->db->get_where('user', array('username' => $username))->row_array();
        return $this->db->get_where('pegawai', array('nik' => $username))->row_array();
    }

    public function get_nama($id_user){
    	// return $this->db->get_where('user', array('id_user' => $id_user))->row_array();
    	return $this->db->get_where('pegawai', array('nama' => $id_user))->row_array();
    }

    public function get_id_pegawai($id_user){
    	return $this->db->get_where('pegawai', array('id' => $id_user))->row_array();
    }
    // public function get_user_siswa($nis) {
    //     return $query = $this->db->get_where('siswa', array('nis' => $nis));
    // }
}
