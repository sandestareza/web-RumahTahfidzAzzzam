<?php

class Identitas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('identitas_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['identitas']	= $this->identitas_m->tampil_data()->result();
		$data['title'] 		= 'Data Identitas Web';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/identitas', $data);
		$this->load->view('temp_admin/footer');
	}

	public function edit($id_identitas)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$where = array('id_identitas'	=>$id_identitas);
		$data['identitas'] = $this->identitas_m->edit($where, 'tb_identitas')->result();
		$data['title'] = 'Data Identitas Web';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/identitas_edit', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{
		$id_identitas	= $this->input->post('id_identitas');
		$judul	 	= $this->input->post('judul');
		$alamat	 	= $this->input->post('alamat');
		$kontak	 	= $this->input->post('kontak');
		$email	 	= $this->input->post('email');

		$data =array(
				'id_identitas'	=>$id_identitas,
				'judul'			=>$judul,
				'alamat'		=>$alamat,
				'kontak'		=>$kontak,
				'email'			=>$email
		);

		$where = array('id_identitas'	=>$id_identitas);

		$this->identitas_m->update_data($where, $data, 'tb_identitas');
		$this->session->set_flashdata('pesan', 'diubah!');
		redirect('admin/identitas');

	}
}