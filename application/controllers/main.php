<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	public $table = 'data';

	function __construct(){
		parent::__construct();	
		//$this->load->library('session', 'pagination');
		$this->load->model('m_data');		
		if($this->session->userdata('session_login') == false)
			redirect(base_url('login'));	
	}

    public function index()
	{
		//pengaturan dan inisialisasi pagination
		$config['base_url'] = base_url()."index.php/main/index";
		$config['total_rows'] = $this->m_data->showData($this->table)->num_rows();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = '5';
		$this->pagination->initialize($config);
		
		//setting data yg dibutuhkan
		$temp['per_page'] = $config['per_page'];
		$temp['page'] = $this->uri->segment(3)?$this->uri->segment(3):0;
		$temp['offset'] = $temp['page']<>0?($temp['page']-1)*$config['per_page']:$temp['page']*$config['per_page'];
		$temp['paging'] = $this->pagination->create_links();
		$temp['data'] = $this->m_data->showDataPaging($config['per_page'], $temp['offset'], $this->table)->result_array();

        $this->load->view('v_main');
		$this->load->view('v_tabeldata', $temp);
	}

	public function tambah(){
		$this->load->view('v_tambahdata');
	}

	public function tambah_act(){
		$data = array(
			'nrp' => $this->input->post('nrp'),
			'nama' => $this->input->post('nama'),
			'tanggal' => $this->input->post('tanggal')
			);
		$cekdata = $this->m_data->checkData($data, $this->table)->num_rows();	
		
		if($data['nrp'] == "" or $data['nama'] == ""){
			$this->session->set_flashdata('notif', " Nama or NRP can't be empty");
			redirect(base_url('main/tambah'));
		}
		else if($cekdata > 0){
			$this->session->set_flashdata('notif', ' NRP sudah ada');
			redirect(base_url('main/tambah'));
		}
		else{
			$this->m_data->tambahData($data, $this->table);
			$this->session->set_flashdata('notif', ' add data success');
			redirect(base_url('main'));
		}
	}

	public function edit($nrp){
		$data = array(
			'nrp' =>$nrp,
			);
		$selectedData['data'] = $this->m_data->checkData($data, $this->table)->result();
		$this->load->view('v_editdata', $selectedData);
	}

	public function edit_act(){
		$data = array(
			'nrp' => $this->input->post('nrp'),
			'nama' => $this->input->post('nama'),
			'tanggal' => $this->input->post('tanggal')
			);
		$parameter = array(
				'nrp' => $this->input->post('nrp')
				);
		
		if ($data['nama'] == ""){
			$this->session->set_flashdata('notif', " Nama can't be empty");
			redirect(base_url('main/edit/'.$data['nrp']));
		}
		else{
			$this->m_data->editData($data, $this->table, $parameter);
			$this->session->set_flashdata('notif', ' Edit data success');
			redirect(base_url('main'));
		}
	}

	public function hapus($nrp){
		$parameter = array(
			'nrp' =>$nrp,
			);
		$this->m_data->hapusData($parameter, $this->table);
		$this->session->set_flashdata('notif', ' Hapus data success');
		redirect(base_url('main'));
	}

}

?>