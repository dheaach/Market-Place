<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_model extends CI_Model
{
	private $_table = "pembelian";

	public function getAll()
	{
		$toko = $this->session->userdata("toko_id");
		$this->db->select('*');
		$this->db->from('detil_beli');
		$this->db->where('detil_beli.id_toko',$toko);
		$this->db->join('pembelian','pembelian.id_beli = detil_beli.id_beli');
		$this->db->join('user','user.nik = pembelian.nik');
		
		$query = $this->db->get();
        return $query->result();
	}

	public function update($tablename,$data,$where)
	{
		$update = $this->db->update($tablename,$data,$where);
		return $update;
	}
	public function view()
	{
		$toko = $this->session->userdata("toko_id");
		$hasil=$this->db->query("SELECT * FROM kurir WHERE id_toko='$toko'");
		return $hasil->result();
	}

	function save($id_kurir,$id_user,$nama,$id_toko,$kendaraan,$nopol){
		$toko = $this->session->userdata("toko_id");
		$hasil=$this->db->query("INSERT INTO kurir (id_kurir,id_user,id_toko,nama,kendaraan,nopol) VALUES ('$id_kurir','$id_user','$toko','$nama','$kendaraan','$nopol')");
		return $hasil;
	}

	function update1($id_kurir,$nama,$kendaraan,$nopol){
		$hasil=$this->db->query("UPDATE kurir SET nama='$nama',kendaraan='$kendaraan',nopol='$nopol' WHERE id_kurir='$id_kurir'");
		return $hasil;
	}

	function delete($id_kurir){
		$hasil=$this->db->query("DELETE FROM kurir WHERE id_kurir='$id_kurir'");
		return $hasil;
	}
	function kode(){
		$this->db->select("MAX(id_kurir)+1 AS kode");
		$this->db->from("kurir");
		$query = $this->db->get();

		return $query->row()->kode;
	}	
}
