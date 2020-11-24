<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Model extends CI_Model {
	public function tampilbrg()
	{
		return $this->db->select('*')
						->from('barang')
						->join('toko','toko.id_toko = barang.id_toko')
						->get()
						->result();
	}

	public function by_id($id)
	{
		return $this->db->query("SELECT * FROM barang JOIN toko ON toko.id_toko = barang.id_toko WHERE id = '$id'")->result();
	}

	public function by_toko($id)
	{
		$query = $this->db->select('*')
				 ->from('barang')
				 ->where('barang.id_toko',$id)
				 ->join('toko','toko.id_toko = barang.id_toko')
				 ->get()
				 ->result();
		return $query;
	}

	public function find($id)
	{
		$result = $this->db->where('id', $id)
						->limit(1)
						->get('barang');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
 	}

	public function tambah($tablename,$data)
	{
		$tambah = $this->db->insert($data,$tablename);
		return $tambah;
	}

	public function edit($where,$tablename)
	{
		$edit = $this->db->get_where($tablename,$where);
		return $edit;
	}

	public function update_data($where,$data,$tablename)
	{
		$this->db->where($where);
		$this->db->update($tablename,$data);
		
	}

	public function delete($tablename,$where)
	{
		$hapus = $this->db->delete($tablename,$where);
		return $hapus;
	}

	public function update($tablename,$data,$where)
	{
		$update = $this->db->update($tablename,$data,$where);
		return $update;
	}
	public function hitung($id)
	{
		$query = $this->db->select('*')
						  ->from('detil_beli')
						  ->where('id_toko',$id)
						  ->where('rating_produk > 0')
						  ->get();
		if($query->num_rows()>0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	public function ulasan($id)
	{
		$query = $this->db->select('*')
						  ->from('detil_beli')
						  ->where('detil_beli.id_toko',$id)
						  ->where('rating_produk > 0')
						  ->join('barang','barang.id = detil_beli.id_produk')
						  ->join('pembelian','pembelian.id_beli = detil_beli.id_beli')
						  ->join('user','user.nik = pembelian.nik')
						  ->order_by('rating_produk','DESC')
						  ->get();
		return $query->result();
	}

	public function akeh($id)
	{
		$query = $this->db->select_sum('jumlah')
						  ->from('detil_beli')
						  ->where('id_toko',$id)
						  ->get();
		return $query->result();
	}

	public function search($key)
	{
		if($key != ''){
			$query = $this->db->query("SELECT * FROM barang JOIN toko ON toko.id_toko = barang.id_toko WHERE nama LIKE '%$key%' OR nama_toko LIKE '%$key%'");
			return $query->result();
		}else{
			return $this->tampilbrg();
		}
	}
	public function cari($cari)
	{
		$id = $this->session->userdata('no_id');
		if($cari != ''){
			$query = $this->db->query("SELECT * FROM barang JOIN toko ON toko.id_toko = barang.id_toko WHERE nama LIKE '%$cari%' AND toko.id_toko = '$id'");
			return $query->result();
		}else{
			$query = $this->db->query("SELECT * FROM barang JOIN toko ON toko.id_toko = barang.id_toko WHERE barang.id_toko = '$id'");
			return $query->result();
		}
	}

	public function yeah($nik)
	{
        $quer = $this->db->query("SELECT nama_user FROM user WHERE nik = '$nik'");
        $row = $quer->row_array();
        return $a = $row["nama_user"];
	}
}

?>