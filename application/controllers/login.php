<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();	
		$this->load->library('session');						//mengaktifkan session
		$this->load->model('m_login');
	}

	function index(){
		if ($this->session->userdata('session_login') == false)
			$this->load->view('v_login');
		else
			redirect(base_url('main'));
	}

	function login_act(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');		
		$tableDB = 'user';
		
		/* memanggil proses query yang terdapat pada bagian models, pilih salah satu */
		$result = $this->m_login->getResult1($username, $password);						
		//$result = $this->m_login->getResult2($tableDB, $username, $password);			
		//$result = $this->m_login->getResult3($username, $password);						
		
		/* Konversi hasil query ke dalam array */
		$data = $result->result_array();
		
		/* Menghitung jumlah data yang cocok, pilih salah satu */
		$jmldata = count($data);														
		//$jmldata = $result->num_rows();												
		
		/* Algoritma pengecekan proses login */
		if ($username == "" or $password == ""){
			$notif=" Username or password can't be empty";
			$this->session->set_flashdata('notif', $notif);			//one time notif menggunakan fungsi session flashdata
			redirect(base_url('login'));
		}
		else if($jmldata > 0){
			$this->session->set_userdata('session_login', $username);
			redirect(base_url('main'));
		}
		else{
			$notif=" Username or password doesn't match";
			$this->session->set_flashdata('notif', $notif);
			redirect(base_url('login'));
		}
	}
	
	function logout(){
		//$this->session->unset_userdata('session_login');			//menghapus session 'session_login'
		$this->session->sess_destroy();								//menghapus semua session
		redirect(base_url('login'));
	}
	
}

?>