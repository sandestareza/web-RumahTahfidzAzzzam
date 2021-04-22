<?php

class Jabatan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('jabatan_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['jabatan']	= $this->jabatan_m->tampil_data()->result();
		$data['title'] 		= 'Data Jabatan';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/jabatan', $data);
		$this->load->view('temp_admin/footer');
	}

	public function tambah_aksi()
	{
		$data = array(
			
			'jabatan'	=> $this->input->post('jabatan'),

			);

			$this->jabatan_m->tambah_data($data,'tb_jabatan');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/jabatan');
	}

	public function edit($id_jabatan)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$where = array('id_jabatan'	=>$id_jabatan);
		$data['jabatan'] = $this->jabatan_m->edit($where, 'tb_jabatan')->result();
		$data['title'] = 'Data Jabatan';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/jabatan_edit', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{
		$id_jabatan	= $this->input->post('id_jabatan');
		$jabatan	 	= $this->input->post('jabatan');

		$data =array(
				'id_jabatan'	=>$id_jabatan,
				'jabatan'		=>$jabatan
		);

		$where = array('id_jabatan'	=>$id_jabatan);

		$this->jabatan_m->update_data($where, $data, 'tb_jabatan');
		$this->session->set_flashdata('pesan', 'diubah!');
		redirect('admin/jabatan');

	}

	public function hapus($id_jabatan)
	{
		$this->jabatan_m->hapus_data($id_jabatan);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/jabatan');
	}
}