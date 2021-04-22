<?php

class Pengurus extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('pengurus_m');
		$this->load->model('jabatan_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();	
		$data['jabatan']	= $this->jabatan_m->tampil_data()->result();
		$data['role']	= $this->pengurus_m->tampil_data_role()->result();
		$data['pengurus']	= $this->pengurus_m->tampil_data()->result();
		$data['title'] = 'Data Pengurus';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('user/sidebar_user',$data);
		$this->load->view('user/pengurus', $data);
		$this->load->view('temp_admin/footer');
	}
}