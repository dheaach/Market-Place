<?php
class Komentar_model extends CI_Model{

	public function view()
	{
		$toko = $this->session->userdata("toko_id");
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->where('komentar.id_toko',$toko);
		$this->db->join('barang','barang.id = komentar.id_produk');

		$query = $this->db->get();
		return $query->result();
	}
}