<?php
class Model_all extends CI_Model{
	
	private $_table = "barang";

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getByNik($id)
	{
		return $this->db->get_where($this->_table,["id" => $id])->row();
	}

    public function save($id,$nama,$id_toko,$kategori,$stok,$harga,$kondisi,$satuan,$gambar){
		$hasil=$this->db->query("INSERT INTO barang (id,nama,id_toko,kategori,stok,harga,kondisi,satuan,gambar) VALUES ('$id','$nama','$id_toko','$kategori','$stok','$harga','$kondisi','$satuan','$gambar')");
		return $hasil;
	}
	
	public function update($id,$nama,$id_toko,$kategori,$stok,$harga,$kondisi,$satuan,$gambar){
		$hasil=$this->db->query("UPDATE barang SET nama='$nama',id_toko='$id_toko',kategori='$kategori',stok='$stok',harga='$harga',kondisi='$kondisi',satuan='$satuan',gambar='$gambar' WHERE id='$id'");
		return $hasil;
	}

	public function delete($id){
		$hasil=$this->db->query("DELETE FROM barang WHERE id='$id'");
		return $hasil;
	}
	
}