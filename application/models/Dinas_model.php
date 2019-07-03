<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinas_model extends CI_Model {

	private $_table ="dinas";

	public $id_dinas;
	public $namadinas;
	public $alamat;
	public $is_delete;
	public $id_admin;

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function getEmailAdmin(){

		$this->db->select('admin.email, admin.id_admin');
		$this->db->from('admin');
		$this->db->join('dinas', 'admin.id_admin = dinas.id_admin');
		$this->db->distinct();
		$query = $this->db->get();

		return $query->result();
	}

	public function getById(){

		return $this->db->get_where($this->_table, ["id_dinas"=>$id])->result();
	}

	public function getByIdDinas(){

		return $this->db->get_where($this->_table, ["id_dinas"=>$id])->row_array();
	}

	public function add(){

		$data = [
			"nama_dinas" 	=> $this->input->post('namadinas', true),
			"alamat" 		=> $this->input->post('alamat',true),
			"is_delete"		=> $this->input->post('is_delete',true),
			"id_admin"		=> $this->input->post('id_admin',true)
		];

		$this->db->insert('dinas', $data);
	}

	public function delete($id){
		return $this->db->delete('dinas',['id_dinas' => $id]);
	}

}