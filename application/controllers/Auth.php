<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login');
		} else{
			$this->_login();
		}
	}

	private function _login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('admin',['email'=> $email])->row_array();

		if ($user) {
			if ($password == $user['password']) {
				
				$data = [
					'email' => $user['email'],
					'id_admin' => $user['id_admin']
				];

				$this->session->set_userdata('login',$data);
				redirect('admin/dashboard');

			} else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password !</div>');

				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!!!</div>');

			redirect('auth');
		}
	}

	public function logout(){

		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logged out !</div>');

		redirect('auth');
	}

}