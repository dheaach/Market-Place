<?php
class Tracking_model extends CI_Model{

	public function view()
	{
		$toko = $this->session->userdata("toko_id");
		$this->db->select('*');
		$this->db->from('detil_beli');
		$this->db->where('detil_beli.id_toko',$toko);
		$this->db->join('toko','toko.id_toko = detil_beli.id_toko');
		$this->db->join('pembelian','pembelian.id_beli = detil_beli.id_beli');

		$query = $this->db->get();
		return $query->result();
	}
	public function cek()
	{
		$toko = $this->session->userdata("toko_id");
		$this->db->select('*');
		$this->db->from('detil_beli');
		$this->db->where('detil_beli.id_toko',$toko);
		$this->db->join('toko','toko.id_toko = detil_beli.id_toko');
		$this->db->join('pembelian','pembelian.id_beli = detil_beli.id_beli');
		$this->db->limit(5);

		$query = $this->db->get();
		return $query->result();
	}
	public function search($key)
	{
		$toko = $this->session->userdata("toko_id");

		if($key != ''){
			$query =$this->db->query("SELECT * FROM detil_beli JOIN toko ON toko.id_toko = detil_beli.id_toko JOIN pembelian ON pembelian.id_beli = detil_beli.id_beli WHERE detil_beli.id_toko = '$toko' AND detil_beli.id_beli LIKE '$key'");
			return $query->result();
		}else{
			$this->db->select('*');
			$this->db->from('detil_beli');
			$this->db->where('detil_beli.id_toko',$toko);
			$this->db->join('toko','toko.id_toko = detil_beli.id_toko');
			$this->db->join('pembelian','pembelian.id_beli = detil_beli.id_beli');			

			$query = $this->db->get();
			return $query->result();
		}
	}
}