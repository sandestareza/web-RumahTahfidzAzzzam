<?php

class Tentang extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('tentang_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['tentang']	= $this->tentang_m->tampil_data()->result();
		$data['title'] 		= 'Data Tentang Web';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/tentang', $data);
		$this->load->view('temp_admin/footer');
	}

	public function edit($id_tentang)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$where = array('id_tentang'	=>$id_tentang);
		$data['tentang'] = $this->tentang_m->edit($where, 'tb_tentang')->result();
		$data['title'] = 'Data Tentang Web';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/tentang_edit', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{
		$id_tentang	= $this->input->post('id_tentang');
		$visi	 	= $this->input->post('visi');
		$misi	 	= $this->input->post('misi');

		$data =array(
				'id_tentang'	=>$id_tentang,
				'visi'			=>$visi,
				'misi'			=>$misi
		);

		$where = array('id_tentang'	=>$id_tentang);

		$this->tentang_m->update_data($where, $data, 'tb_tentang');
		$this->session->set_flashdata('pesan', 'diubah!');
		redirect('admin/tentang');

	}
}