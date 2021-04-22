<?php

class Tahun_ajaran extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('tahun_ajaran_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();	
		$data['thn_ajrn']	= $this->tahun_ajaran_m->tampil_data()->result();
		$data['title'] = 'Data Tahun ajaran';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/tahun_ajaran', $data);
		$this->load->view('temp_admin/footer');
	}

		public function tambah_aksi()
	{
		$data = array(
			
			'thn_ajrn'	=> $this->input->post('thn_ajrn'),

			);

			$this->tahun_ajaran_m->tambah_data($data,'tb_thajrn');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/tahun_ajaran');
	}

	public function edit($id_thn_ajrn)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();		
		$where = array('id_thn_ajrn'	=>$id_thn_ajrn);
		$data['thn_ajrn'] = $this->tahun_ajaran_m->edit($where, 'tb_thajrn')->result();
		$data['title'] = 'Data Tahun Ajaran';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/tahun_ajaran_edit', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{
		$id_thn_ajrn	= $this->input->post('id_thn_ajrn');
		$thn_ajrn	= $this->input->post('thn_ajrn');

		$data =array(
				'id_thn_ajrn'	=>$id_thn_ajrn,
				'thn_ajrn'	=>$thn_ajrn
		);

		$where = array('id_thn_ajrn'	=>$id_thn_ajrn);

		$this->tahun_ajaran_m->update_data($where, $data, 'tb_thajrn');
		$this->session->set_flashdata('pesan', 'diubah!');
		redirect('admin/tahun_ajaran');

	}

	public function hapus($id_thn_ajrn)
	{
		$this->tahun_ajaran_m->hapus_data($id_thn_ajrn);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/tahun_ajaran');
	}
}