<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_model extends CI_Model {

	private $_table ="tipe_admin";

	public $id_tipe;
	public $keterangan;
	public $is_delete;	


	public function getAll(){
		$this->db->select('*');
		$this->db->from('tipe_admin');
		$this->db->where('is_delete','1');
		$this->db->distinct();

		$query = $this->db->get();
		return $query->result();
	}

	public function getTipeAdmin(){
		
		$this->db->select('admin.id_admin, admin.id_tipe, admin.jabatan, tipe_admin.keterangan, tipe_admin.is_delete');
		$this->db->from('admin');
		$this->db->join('tipe_admin', 'admin.id_tipe = tipe_admin.id_tipe');
		$this->db->distinct();

		$query = $this->db->get();

		return $query->result();
	}

	public function add(){
		$data=[

			"keterangan" 	=> $this->input->post('keterangan', true),
			"is_delete"		=> '1'

		];

		$this->db->insert('tipe_admin', $data);
	}

	public function delete($id){

		$data = [

		];

		$this->db->replace('tipe_admin',$data);
	}

}