<?php

class Pengajuancuti_m extends CI_Model{


    function list(){
		return $this->db->get('tbl_jumlah_cuti');
	}
}

?>