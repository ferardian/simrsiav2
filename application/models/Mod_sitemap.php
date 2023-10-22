<?php
class Mod_sitemap extends CI_Model {
    function __construct() {
        parent::__construct();
    }
  
    public function create() {
       return $this->db->get('jadwal_dokter');
      
         
    }
}
?>