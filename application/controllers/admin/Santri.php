<?php

class Santri extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('santri_m');
		$this->load->model('kelas_m');
		$this->load->model('tahun_ajaran_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();
		$data['kelas']	= $this->kelas_m->tampil_data()->result();
		$data['thn_ajrn']= $this->tahun_ajaran_m->tampil_data()->result();
		$data['santri']	= $this->santri_m->tampil_data()->result();
		$data['title'] = 'Data santri';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/santri', $data);
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
			
			'nis'			=> $this->input->post('nis'),
			'nama_lengkap'	=> $this->input->post('nama'),
			'j_kelamin'		=> $this->input->post('j_kelamin'),
			'tgl_lahir'		=> $this->input->post('tgl_lahir'),
			'alamat'		=> $this->input->post('alamat'),
			'nm_ortu'		=> $this->input->post('nm_ortu'),
			'id_kelas'		=> $this->input->post('kelas'),
			'id_thn_ajrn'	=> $this->input->post('thn_ajrn'),
			'alumni'		=> $this->input->post('alumni'),
			'foto'			=> 'default.png'

			);

			$this->santri_m->tambah_data($data,'tb_santri');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/santri');
	}

	public function edit($nis)
	{	
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();
		$where = array('nis' => $nis);
		$data['kelas']	= $this->kelas_m->tampil_data()->result();
		$data['thn_ajrn']= $this->tahun_ajaran_m->tampil_data()->result();
		$data['santri'] = $this->santri_m->edit($where, 'tb_santri')->result();
		$data['title'] = 'Edit Santri';
		$this->load->view('temp_admin/header', $data);
		$this->load->view('temp_admin/sidebar',$data);
		$this->load->view('admin/santri_edit', $data);
		$this->load->view('temp_admin/footer');
	}

	public function edit_aksi()
	{
			$nis		= $this->input->post('nis');
			$nama	 	= $this->input->post('nama_lengkap');
			$j_kelamin	= $this->input->post('j_kelamin');
			$tgl_lahir	= $this->input->post('tgl_lahir');
			$alamat		= $this->input->post('alamat');
			$nm_ortu	= $this->input->post('nm_ortu');
			$kelas		= $this->input->post('kelas');
			$thn_ajrn	= $this->input->post('thn_ajrn');
			$alumni		= $this->input->post('alumni');
			$foto 		= $_FILES['foto']['name'];

			if($foto) {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					$old_foto = $data['tb_santri']['foto'];
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
				'nis' => $nis,
				'nama_lengkap' => $nama,
				'j_kelamin' => $j_kelamin,
				'tgl_lahir' => $tgl_lahir,
				'alamat' => $alamat,
				'nm_ortu' => $nm_ortu,
				'id_kelas' => $kelas,
				'id_thn_ajrn' => $thn_ajrn,
				'alumni' => $alumni
				
			);

		$where	=	array('nis' => $nis);

		$this->santri_m->update_data($where,$data, 'tb_santri');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('admin/santri');
		
	}

	public function hapus($nis)
	{			
		$this->santri_m->hapus_data($nis);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/santri');
	}
}