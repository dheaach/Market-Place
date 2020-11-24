<?php
class Transaksi_model extends CI_Model{

	public function view()
	{
		$toko = $this->session->userdata("toko_id");
		$this->db->select('*');
		$this->db->from('detil_beli');
		$this->db->where('detil_beli.id_toko',$toko);
		$this->db->join('pembelian','pembelian.id_beli = detil_beli.id_beli');
		
		$query = $this->db->get();
		return $query->result();

	}

	public function tampil()
	{
		$toko = $this->session->userdata("toko_id");
		$tampil = $this->db->query("SELECT * FROM pembelian JOIN detil_beli ON pembelian.id_beli = detil_beli.id_beli WHERE id_toko = '$toko'");

		return $tampil->result();
	}

	function upload($id_beli,$bukti){
		$hasil=$this->db->query("UPDATE pembelian SET pengiriman='$bukti',status_pengiriman='Terkirim' WHERE id_beli='$id_beli'");
		return $hasil;
	}
	public function detail($id)
	{
		$toko = $this->session->userdata("toko_id");
		$query=$this->db->query("SELECT * FROM pembelian WHERE id_beli = '$id'");
        return $query->result();
	}
}