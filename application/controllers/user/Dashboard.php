<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('santri_m');
		$this->load->model('pengurus_m');
		
	}
	
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['tot_santri']	= $this->santri_m->banyak_data();
		$data['alumni']		= $this->santri_m->banyak_alumni();
		$data['aktif']		= $this->santri_m->santri_aktif();
		$data['guru']		= $this->pengurus_m->banyak_guru();
		$data['santri']		= $this->santri_m->santri_chart();
		$data['santrikls']	= $this->santri_m->santri_donat();

		$data['title'] 		= 'Dashboard';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('temp_admin/footer');
		$this->load->view('temp_admin/chart');
		$this->load->view('temp_admin/donat');
	}
}
