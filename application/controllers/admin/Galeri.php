<?php

class Galeri extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('galeri_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['galeri']	= $this->galeri_m->tampil_data()->result();
		$data['title'] 		= 'Data Galeri Web';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/galeri', $data);
		$this->load->view('temp_admin/footer');
	}

	public function tambah_aksi()
	{
		$galeri	= $_FILES['galeri'];
		if($galeri=''){}else{
			$config['upload_path'] = './assets/img/galeri';
			$config['allowed_types'] = 'jpg|png';//format galeri yg diupload
			$config['max_size'] = 2048;// ukuran galeri yg diupload

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('galeri')){
				echo $this->upload->display_errors(); die();
			}else {
				$galeri=$this->upload->data('file_name');
			}
		}

		$data = array(
			
			'ket'		=> $this->input->post('ket'),
			'galeri'	=> $galeri

			);

			$this->galeri_m->tambah_data($data,'galeri');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/galeri');
	}

	public function edit($id_galeri)
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$where = array('id_galeri'	=>$id_galeri);
		$data['galeri'] = $this->galeri_m->edit($where, 'galeri')->result();
		$data['title'] = 'Data Galeri Web';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/galeri_edit', $data);
		$this->load->view('temp_admin/footer');	
	}

	public function edit_aksi()
	{
		$id_galeri	= $this->input->post('id_galeri');
		$ket	 	= $this->input->post('ket');
		$galeri 	= $_FILES['galeri']['name'];

			if($galeri) {
				$config['upload_path'] = './assets/img/galeri/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('galeri')) {
					$old_foto = $data['galeri']['galeri'];
					if($old_foto != '') {
						unlink(FCPATH .'assets/img/galeri/' . $old_foto);
					}
					$galeri_b = $this->upload->data('file_name');
					$this->db->set('galeri', $galeri_b);
				} else {
					echo $this->upload->display_errors();
				}
			}

		$data =array(
				'id_galeri'		=>$id_galeri,
				'ket'			=>$ket,
		);

		$where = array('id_galeri'	=>$id_galeri);

		$this->galeri_m->update_data($where, $data, 'galeri');
		$this->session->set_flashdata('pesan', 'diubah!');
		redirect('admin/galeri');

	}

	public function hapus($id_galeri)
	{
		$this->galeri_m->hapus_data($id_galeri);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/galeri');
	}
}