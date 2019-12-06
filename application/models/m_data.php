<?php 

class M_data extends CI_Model{
	
	function showData($table){
		return $this->db->query("SELECT * FROM $table");
	}

	function showDataPaging($number, $offset, $table){
		return $this->db->get($table, $number, $offset);
	}

	function checkData($data, $table){	
		$nrp = $data['nrp'];
		return $this->db->query("SELECT * FROM $table WHERE nrp = '$nrp'");
	}
	
	function tambahData($data, $table){
		$this->db->insert($table, $data);
	}

	function editData($data, $table, $param){
		$this->db->where($param);
		$this->db->update($table, $data);
	}

	function hapusData($parameter, $table){
	$this->db->where($parameter);
	$this->db->delete($table);
	}

}

?>