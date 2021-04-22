<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantipassword extends CI_Controller 
{		
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_pengurus', array('username' => $this->session->userdata('username')))->row_array();

		$data['title'] = 'Ganti Password';
		
		$this->form_validation->set_rules('old_pass', 'Old_pass','required|trim',
			array(
				'required' => 'Password Lama harus diisi!'));

		$this->form_validation->set_rules('new_pass', 'New_pass','required|trim|min_length[3]|matches[new_pass1]',
				array(
				'required' => 'Password Baru harus diisi!',
				'min_length' => 'Maaf Password terlalu pendek! MIN 3',
				'matches'	=> 'Maaf Password anda tidak sama, Ulangi lagi!'
			));

		$this->form_validation->set_rules('new_pass1', 'New_pass1','required|trim|min_length[3]|matches[new_pass]',
			array(
				'required' => 'Ulangi Password!',
				'min_length' => 'Maaf Password terlalu pendek! MIN 3',
				'matches'	=> 'Maaf Password anda tidak sama, Ulangi lagi!'
			));

		if ($this->form_validation->run() == false){
			$this->load->view('temp_admin/header', $data);
			$this->load->view('temp_admin/sidebar', $data);
			$this->load->view('admin/gantipassword', $data);
			$this->load->view('temp_admin/footer');	
		} else{
			$old_pass = $this->input->post('old_pass');
			$new_pass = $this->input->post('new_pass');

			if(!password_verify($old_pass, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', 'Lama salah!');
				redirect('admin/gantipassword');
			} else{
				if($old_pass==$new_pass){
					$this->session->set_flashdata('pesan', 'Tidak boleh sama dengan yang lama!');
					redirect('admin/gantipassword');
				} else{
					//password ok
					$password_hash = password_hash($new_pass, PASSWORD_DEFAULT);

					$this->db->set('password',$password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('tb_pengurus');

					$this->session->set_flashdata('pesan', 'Berhasil diubah!');
					redirect('admin/gantipassword');
				}
			}
		}
	}
}