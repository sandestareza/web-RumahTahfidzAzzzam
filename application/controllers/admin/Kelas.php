<?php

class Kelas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('kelas_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();
		$data['kelas']	= $this->kelas_m->tampil_data()->result();
		$data['title'] = 'Data kelas';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/kelas', $data);
		$this->load->view('temp_admin/footer');
	}

	public function tambah_aksi()
	{
		$data = array(
			
			'kelas'	=> $this->input->post('kelas'),

			);

			$this->kelas_m->tambah_data($data,'tb_kelas');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/kelas');
	}

	public function edit($id_kelas)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();
		$where = array('id_kelas'	=>$id_kelas);
		$data['kelas'] = $this->kelas_m->edit($where, 'tb_kelas')->result();
		$data['title'] = 'Data kelas';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/kelas_edit', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{
		$id_kelas	= $this->input->post('id_kelas');
		$kelas	 	= $this->input->post('kelas');

		$data =array(
				'id_kelas'	=>$id_kelas,
				'kelas'		=>$kelas
		);

		$where = array('id_kelas'	=>$id_kelas);

		$this->kelas_m->update_data($where, $data, 'tb_kelas');
		$this->session->set_flashdata('pesan', 'diubah!');
		redirect('admin/kelas');

	}

	public function hapus($id_kelas)
	{
		$this->kelas_m->hapus_data($id_kelas);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/kelas');
	}
}