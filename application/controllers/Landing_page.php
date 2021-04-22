<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class landing_page extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('identitas_m');
		$this->load->model('tentang_m');
		$this->load->model('galeri_m');
	}

	public function index()
	{
		$data['identitas']	= $this->identitas_m->tampil_data()->result();
		$data['tentang']	= $this->tentang_m->tampil_data()->result();
		$data['galeri']		= $this->galeri_m->tampil_data()->result();
		$data['title'] 		= 'Rumah Tahfidz Azzam';
		$this->load->view('landing_page', $data);
	}
}
