<?php
class Pro_model extends CI_Model{
	
	function lihat(){
		$toko = $this->session->userdata("toko_id");
		$hasil=$this->db->query("SELECT * FROM barang WHERE id_toko='$toko'");
		return $hasil->result();
	}

	function view($kategori){
		$toko = $this->session->userdata("toko_id");
		$hasil=$this->db->query("SELECT * FROM barang WHERE kategori='$kategori' AND id_toko='$toko'");
		return $hasil;
	}
	
	function save($id_barang,$nama_barang,$id_toko,$kategori,$gambar,$stok,$harga,$kondisi,$satuan){
		$hasil=$this->db->query("INSERT INTO barang (id,nama,id_toko,kategori,gambar,stok,harga,kondisi,satuan) VALUES ('$id_barang','$nama_barang','$id_toko','$kategori','$gambar','$stok','$harga','$kondisi','$satuan')");
		return $hasil;
	}

	function update($kode_barang,$id_toko,$nama_barang,$kategori,$stok,$harga,$kondisi,$satuan){
		$hasil=$this->db->query("UPDATE barang SET nama='$nama_barang',id_toko='$id_toko',kategori='$kategori',stok='$stok',harga='$harga',kondisi='$kondisi',satuan='$satuan' WHERE id ='$kode_barang'");
		return $hasil;
	}

	function delete($kode_barang){
		$hasil=$this->db->query("DELETE FROM barang WHERE id ='$kode_barang'");
		return $hasil;
	}
	function kode(){
		$this->db->select("MAX(id)+1 AS kode");
		$this->db->from("barang");
		$query = $this->db->get();

		return $query->row()->kode;
	}	
}