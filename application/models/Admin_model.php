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
			"id_tipe"	=> $this->input->post('id_tipe'),
			"nip" 		=> $this->input->post('nip'),
			"username" 	=> $this->input->post('username', true),
			"password" 	=> $this->input->post('password', true),
			"email" 	=> $this->input->post('email', true),
			"nama"		=> $this->input->post('name', true),
			"jabatan"	=> $this->input->post('jabatan',true)
		];

			$this->db->insert('admin', $data);
	}

	public function edit(){

		$this->db->trans_start();

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

			// 	

		$data2 =[
			"keterangan"	=> $this->input->post('keterangan', true),
			"is_delete"		=> '1'
			];

			$this->db->where('id_tipe', $this->input->post('id_tipe')); 
			$this->db->update('tipe_admin', $data2);


		$this->db->trans_complete();

		if($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}

	} 

	public function delete($id){
		return $this->db->delete('admin',['id_admin' => $id]);
	}

}