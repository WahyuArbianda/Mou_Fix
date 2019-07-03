<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $_table ="admin";
	
	public $id_admin;
	public $id_tipe;
	public $nip;
	public $username;
	public $password;
	public $email;
	public $nama;
	public $jabatan;

	public function getAll(){

		return $this->db->get($this->_table)->result();
	}

	public function getById($id){
		
		return $this->db->get_where($this->_table, ["id_admin"=>$id])->result();
	}

	public function getByIdUser($id){
		
		return $this->db->get_where($this->_table, ["id_admin"=>$id])->row_array();
	}

	public function add(){
		$data = [

			"id_admin" 	=> rand(1,100).substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3),
			// "id_tipe" 	=> rand(10,100),
			"nip" 		=> $this->input->post('nip'),
			"username" 	=> $this->input->post('username', true),
			"password" 	=> $this->input->post('password', true),
			"email" 	=> $this->input->post('email', true),
			"nama"		=> $this->input->post('name', true),
			
			"id_tipe"	=> $this->input->post('id_tipe'),
			"jabatan"	=> $this->input->post('jabatan',true)
		];

			$this->db->insert('admin', $data);
	}

	public function edit(){

		$data = [
			"id_tipe" 	=> $this->input->post('id_tipe'),
			"nip" 		=> $this->input->post('nip'),
			"username" 	=> $this->input->post('username', true),
			"password" 	=> $this->input->post('password', true),
			"email" 	=> $this->input->post('email', true),
			"nama"		=> $this->input->post('name', true),
			"jabatan"	=> $this->input->post('jabatan',true)
			];

			$this->db-> where('id_admin', $this->input->post('id'));
			$this->db-> update('admin', $data);
	} 

	public function delete($id){
		return $this->db->delete('admin',['id_admin' => $id]);
	}

}