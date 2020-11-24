<?php
class Produk_model extends CI_Model{
	
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
	
	function save($id_barang,$nama_barang,$kategori,$gambar,$stok,$harga,$kondisi,$satuan){
		$toko = $this->session->userdata("toko_id");
		$hasil=$this->db->query("INSERT INTO barang (id,id_toko,nama,kategori,gambar,stok,harga,kondisi,satuan) VALUES ('$id_barang','$toko','$nama_barang','$kategori','$gambar','$stok','$harga','$kondisi','$satuan')");
		return $hasil;
	}

	function update($kode_barang,$nama_barang,$kategori,$stok,$harga,$kondisi,$satuan,$gambar){
		$hasil=$this->db->query("UPDATE barang SET nama='$nama_barang',kategori='$kategori',stok='$stok',harga='$harga',kondisi='$kondisi',satuan='$satuan',gambar='$gambar' WHERE id ='$kode_barang'");
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