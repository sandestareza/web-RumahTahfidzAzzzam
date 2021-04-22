<?php

class Santri extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('santri_m');
		$this->load->model('kelas_m');
		$this->load->model('tahun_ajaran_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();
		$data['kelas']	= $this->kelas_m->tampil_data()->result();
		$data['thn_ajrn']= $this->tahun_ajaran_m->tampil_data()->result();
		$data['santri']	= $this->santri_m->tampil_data()->result();
		$data['title'] = 'Data santri';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('user/sidebar_user',$data);
		$this->load->view('user/santri', $data);
		$this->load->view('temp_admin/footer');
	}

}