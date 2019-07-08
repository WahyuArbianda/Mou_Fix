<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $username;

	public function __construct(){

		parent::__construct();

		$this->load->model("admin_model");
		$this->load->model("dinas_model");
		$this->load->model("tipe_model");

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


	// =================================================================
	// 							USER
	// =================================================================


	public function user(){

		$data["admin"]=$this->username;
		$data['user']=$this->admin_model->getAll();
		// $data['tipe']=$this->tipe_model->getTipeAdmin();
		$data['tipe']=$this->tipe_model->getAll();

		
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

	public function userEdit($id){
		
		$user = $this->admin_model;
		$data["user"] = $user->getByIdUser($id);
		$data["tipe"] = $this->tipe_model->getAll();
		// $data['jabatan'] = ['Super Admin', 'Admin MOU','Admin PKS'];

		// $this->form_validation->set_rules('id_tipe','ID Tipe','required|trim');
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



	// ========================================================================
	// 								TIPE ADMIN
	// ========================================================================



	public function tipeAdd(){

		$user = $this->admin_model;

		$this->form_validation->set_rules('keterangan','Tipe Admin', 'required|trim');

		if ($this->form_validation->run()==FALSE) {

			$data["admin"]=$this->username;

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar',$data);
			$this->load->view("admin/user/index",$data);	
			$this->load->view('admin/templates/footer');

		}else{

			$data['tipe']=$this->tipe_model->add();

			$this->session->set_flashdata('message','
				<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
					<strong>New Tipe Admin Added !!!</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>');
			redirect('admin/user');
		}
	}

	public function tipeEdit($id=null){

		$data['tipe']=$this->tipe_model->delete($id);

		$this->session->set_flashdata('message','
			<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
				<strong>User Delete Success !!!</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>');
		redirect('admin/user');

	}
	// =================================================================
	// 									DINAS
	// =================================================================


	public function dinas(){

		$data["admin"]=$this->username;

		$data['dinas']=$this->dinas_model->getAll();
		$data['email']=$this->dinas_model->getEmailAdmin();

		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/templates/topbar',$data);
		$this->load->view("admin/dinas/index",$data);	
		$this->load->view('admin/templates/footer');
	}

	public function dinasAdd(){

		$dinas = $this->dinas_model;
		
		// $data["email"] = $email->getEmailAdmin();

		$this->form_validation->set_rules('namadinas','Nama Dinas', 'required|trim');
		$this->form_validation->set_rules('alamat','Alamat', 'required|trim');
		$this->form_validation->set_rules('is_delete','Aktivasi','required|trim');
		$this->form_validation->set_rules('id_admin', 'Email', 'required|trim');

		if ($this->form_validation->run()==FALSE) {

			$data["admin"]=$this->username;

			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/sidebar',$data);
			$this->load->view('admin/templates/topbar',$data);
			$this->load->view("admin/dinas/index",$data);	
			$this->load->view('admin/templates/footer');

		}else{

			$data['dinas']=$this->dinas_model->add();

			$this->session->set_flashdata('message','
				<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
					<strong>New Dinas Added !!!</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>');
			redirect('admin/dinas');
		}
	}

	public function dinasDelete($id=null){

		$data['user']=$this->dinas_model->delete($id);

		$this->session->set_flashdata('message','
			<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
				<strong>Dinas Delete Success !!!</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>');
		redirect('admin/dinas');
	}
}