<?php

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		//jika memang sudah login
		if ($this->login_model->is_logged_in())
		{
			//jika sudah login bukan admin
			if ($this->login_model->role()!= "1"){
			redirect('user/dashboard');
		} else {
			
			redirect('admin/dashboard');
		}
		} else {

			$data['title'] = 'Login';
			$this->load->view('temp_admin/header', $data);
			$this->load->view('login');
			$this->load->view('temp_admin/footer');
		}
		
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required', 
			array(
				'required' => 'username harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
			array(
				'required' => 'Password harus diisi!'
			));

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login';
			$this->load->view('temp_admin/header', $data);
			$this->load->view('login');
			$this->load->view('temp_admin/footer');
		} else 
			{
				$username		= $this->input->post('username');
				$password	= $this->input->post('password');

				$user = $this->db->get_where('tb_pengurus', array('username'=>$username))->row_array();

				 if($user){
				 	//cek password
				 	if(password_verify($password, $user['password'])){
				 		$data=array(
				 			'username' =>$user['username'],
				 			'id_role'	=>$user['id_role']
				 		);
				 		$this->session->set_userdata($data);
				 		if($user['id_role']==1){
				 			redirect('admin/dashboard');
				 		}else{
				 			redirect('user/dashboard');
				 		}
				 	}else{
				 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Maaf Password Anda Salah</div>');
					redirect('auth');
				 	}
				 } else{
				 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Maaf Username belum terdaftar</div>');
					redirect('auth');
				 }
					
			} 
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}	

