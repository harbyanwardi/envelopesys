<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mteam extends CI_Model {
	public function select_all_pegawai() {
		$sql = "SELECT * FROM pegawai";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all($table) {
		
		$this->db->select("*");
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}

	public function select_by_id($table,$where) {
		

		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($tabelName,$data,$where) {

		$res = $this->db->update($tabelName,$data,$where);

		return $res;
	}

	public function delete($tabelName,$where) {
		
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}

	public function insert($table,$data) {
		
		$this->db->insert($table, $data);
		$query = $this->db->insert_id();
		return $query;

	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_surat($ket,$start,$end) {
		if($start !='' && $end != ''){
			$where = "and tanggal_surat >='{$start}' and tanggal_surat <='{$end}'";
		}
		elseif ($start !='' && $end == '') {
			$where = "and tanggal_surat >='{$start}'";
		}
		elseif ($start =='' && $end != '') {
			$where = "and tanggal_surat <='{$end}'";
		}
		else{
			$where = '';
		}
		$sql = "SELECT * FROM surat WHERE ket_diterima = '{$ket}' {$where}";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */