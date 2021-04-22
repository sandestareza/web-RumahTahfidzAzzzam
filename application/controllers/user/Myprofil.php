<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofil extends CI_Controller 
{		
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['title'] = 'Myprofil';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('user/myprofil', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['title'] = 'Edit Profil';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('user/sidebar_user', $data);
		$this->load->view('user/editmyprofil', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{

			$nip   = $this->input->post('nip');
			$nama   = $this->input->post('nama');
			$j_kelamin   = $this->input->post('j_kelamin');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$no_hp = $this->input->post('no_hp');

			// cek gambar
			$foto = $_FILES['foto']['name'];

			if($foto) {
				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					$old_foto = $data['user']['foto'];
					if($old_foto != 'default.png') {
						unlink(FCPATH . 'assets/img/' . $old_foto);
					}
					$foto_baru = $this->upload->data('file_name');
					$this->db->set('foto', $foto_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->set('j_kelamin', $j_kelamin);
			$this->db->set('tgl_lahir', $tgl_lahir);
			$this->db->set('no_hp', $no_hp);
			$this->db->where('nip', $nip);
			$this->db->update('tb_pengurus');

			$this->session->set_flashdata('pesan', 'diedit!');
			redirect('user/myprofil');
	}
}