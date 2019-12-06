<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_login extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	/* Fungsi query login bentuk pertama */
    function getResult1($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }
	
	/* Fungsi query login bentuk kedua */
	function getResult2($table, $username, $password){	
		$data = array(
				'username' => $username,
				'password' => $password
		);
		return $this->db->get_where($table, $data);
	}
	
	/* Fungsi query login bentuk ketiga */
	function getResult3($username, $password){
		return $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    }
	
}