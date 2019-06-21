<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $username;

	public function __construct(){

		parent::__construct();

		$this->load->model("admin_model");

		$user = $this->session->userdata('login');
		
		$this->username= $this->admin_model->getById($user['id_admin'])[0]->username;
	}


	public function dashboard(){

		$data["admin"] = $this->username;

		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/templates/topbar',$data);
		$this->load->view("admin/dashboard/index",$data);	
		$this->load->view('admin/templates/footer');
	}

	public function user(){

		$data["admin"]=$this->username;
		$data['user']=$this->admin_model->getAll();

		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/templates/topbar',$data);
		$this->load->view("admin/user/index",$data);	
		$this->load->view('admin/templates/footer');

	}


	public function userAdd(){

		$user = $this->admin_model;

		$this->form_validation->set_rules('nip','NIP', 'required|trim');
		$this->form_validation->set_rules('username','Username', 'required|trim');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('name','Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');

		if ($this->form_validation->run()==FALSE) {

			$data["admin"]=$this->username;

			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/sidebar',$data);
			$this->load->view('admin/templates/topbar',$data);
			$this->load->view("admin/user/index",$data);	
			$this->load->view('admin/templates/footer');

		}else{

			$data['user']=$this->admin_model->add();

			$this->session->set_flashdata('message','
				<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
					<strong>New User Added !!!</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>');
			redirect('admin/user');
		}

	}

	public function userDetail($id){

		$data["user"] = $this->admin_model->getByIdUser($id);
		$data["admin"]=$this->username;

		
			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar',$data);
			$this->load->view("admin/user/detail",$data);	
			$this->load->view('admin/templates/footer');		
		
	}

	public function userEdit($id){
		
		$user = $this->admin_model;
		$data['jabatan'] = ['Super Admin', 'Admin MOU','Admin PKS'];
		$data["user"] = $user->getByIdUser($id);

		$this->form_validation->set_rules('id_tipe','ID Tipe','required|trim');
		$this->form_validation->set_rules('nip','NIP', 'required|trim');
		$this->form_validation->set_rules('username','Username', 'required|trim');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('name','Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');



		if ($this->form_validation->run()==FALSE) {

			$data["admin"]=$this->username;
		
			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/sidebar',$data);
			$this->load->view('admin/templates/topbar',$data);
			$this->load->view("admin/user/edit",$data);	
			$this->load->view('admin/templates/footer');

		}else{

			$data['user']=$this->admin_model->edit();

			$this->session->set_flashdata('message','
				<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
					<strong>User Success Edit !!!</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>');
			redirect('admin/user');
		}


	}

	
	public function userDelete($id=null){

		$data['user']=$this->admin_model->delete($id);

		$this->session->set_flashdata('message','
			<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
				<strong>User Delete Success !!!</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>');
		redirect('admin/user');
	}


}