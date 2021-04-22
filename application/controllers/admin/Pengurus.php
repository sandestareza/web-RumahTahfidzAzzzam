<?php

class Pengurus extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
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
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/pengurus', $data);
		$this->load->view('temp_admin/footer');
	}

	public function tambah_aksi()
	{
		/*$foto	= $_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path'] = './assets/img';//lokasi file penyimpanan foto
			$config['allowed_types'] = 'jpg|png';//format foto yg diupload
			$config['max_size'] = 2048;// ukuran foto yg diupload

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				echo $this->upload->display_errors(); die();
			}else {
				$foto=$this->upload->data('file_name');
			}
		}*/

		$data = array(
			
			'nip'			=> $this->input->post('nip'),
			'nama'			=> $this->input->post('nama'),
			'j_kelamin'		=> $this->input->post('j_kelamin'),
			'tgl_lahir'		=> $this->input->post('tgl_lahir'),
			'id_jabatan'	=> $this->input->post('jabatan'),
			'no_hp'			=> $this->input->post('no_hp'),
			'username'		=> $this->input->post('username'),
			'password'		=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'id_role'		=> $this->input->post('role'),
			'foto'			=> 'default.png'

			);

			$this->pengurus_m->tambah_data($data,'tb_pengurus');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/pengurus');
	}

	public function edit($nip)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();	
		$where = array('nip' => $nip);
		$data['jabatan']	= $this->jabatan_m->tampil_data()->result();
		$data['role']	= $this->pengurus_m->tampil_data_role()->result();
		$data['pengurus'] = $this->pengurus_m->edit($where, 'tb_pengurus')->result();
		$data['title'] = 'Edit Pengurus';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/pengurus_edit', $data);
		$this->load->view('temp_admin/footer');
	}

	public function edit_aksi()
	{
			$nip		= $this->input->post('nip');
			$nama	 	= $this->input->post('nama');
			$j_kelamin	= $this->input->post('j_kelamin');
			$tgl_lahir	= $this->input->post('tgl_lahir');
			$jabatan	= $this->input->post('jabatan');
			$no_hp		= $this->input->post('no_hp');
			$username	= $this->input->post('username');
			$password	= $this->input->post('password');
			$role		= $this->input->post('role');
			$foto 		= $_FILES['foto']['name'];

			if($foto) {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					$old_foto = $data['user']['foto'];
					if($old_foto != 'default.png') {
						unlink(FCPATH.'assets/img/'. $old_foto);
					}
					$foto = $this->upload->data('file_name');
					$this->db->set('foto', $foto);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nip' 			=> $nip,
				'nama' 			=> $nama,
				'j_kelamin' 	=> $j_kelamin,
				'tgl_lahir' 	=> $tgl_lahir,
				'id_jabatan' 	=> $jabatan,
				'no_hp' 		=> $no_hp,
				'username' 		=> $username,
				'password' 		=> password_hash($password, PASSWORD_DEFAULT),
				'id_role' 		=> $role
				
			);

		$where	=	array('nip' => $nip);

		$this->pengurus_m->update_data($where,$data, 'tb_pengurus');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('admin/pengurus');
		
	}

	public function hapus($nip)
	{			
		$this->pengurus_m->hapus_data($nip);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/pengurus');
	}
}