<?php
class History_model extends CI_Model{

	public function view1()
	{
		$user = $this->session->userdata("user_id");
		$this->db->select('id_produk')
				 ->distinct()
				 ->from('detil_beli')
				 ->where('id_userr',$user)
				 ->where('status_transaksi','Selesai')
				 ->order_by('id_detil','DESC');

		$query1 = $this->db->get();
		return $query1->result();
	}

	public function hadeh()
	{
		$user = $this->session->userdata("user_id");
		$this->db->select('*')
				 ->from('pembelian')
				 ->where('nik',$user)
				 ->where('pembelian.status_transaksi','Selesai')
				 ->join('detil_beli','detil_beli.id_beli = pembelian.id_beli')
				 ->join('barang','barang.id = detil_beli.id_produk')
				 ->join('toko','toko.id_toko = detil_beli.id_toko')
				 ->order_by('detil_beli.id_detil','DESC');

		$query1 = $this->db->get();
		return $query1->result();
	}
	/*public function view()
	{
		$user = $this->session->userdata("user_id");
		$produk = $this->njupuk();
		$this->db->select('*')
				 ->from('detil_beli')
				 ->where('id_produk',$produk)
				 ->join('barang','barang.id = detil_beli.id_produk')
				 ->join('toko','toko.id_toko = detil_beli.id_toko');

		$query = $this->db->get();
		return $query->result();
	}

	public function view5()
	{
		$user = $this->session->userdata("user_id");
		$produk = $this->njupuk();
		$this->db->select()
				 ->distinct('id_produk')
				 ->from('detil_beli')
				 ->where('id_userr',$user)
				 ->where('status_transaksi','Selesai');

		$query = $this->db->get();
		foreach ($query->result() as $q){
			return $q->id_produk;
		}
	}*/

	public function njupuk()
	{
		$user = $this->session->userdata("user_id");
		$this->db->select('id_produk')
				 ->distinct()
				 ->from('detil_beli')
				 ->where('id_userr',$user)
				 ->where('status_transaksi','Selesai')
				 ->order_by('id_detil','DESC');
		$query = $this->db->get();
		foreach ($query->result() as $q){
			return $anu = $q->id_produk;
			$this->session->set_userdata('id_brg',$anu);
		}
	}
	/*
	public function tampil()
	{
		$user = $this->session->userdata("user_id");
		$query = $this->db->where('nik', $user)
						  ->where('status_transaksi','Selesai')
                          ->get('pembelian');
        foreach ($query->result() as $q) {
        	return $q->id_beli;
        }
	}

	function save($id_detil,$id_user,$id_toko,$id_produk,$rating,$komen){
		$hasil=$this->db->query("INSERT INTO komentar (id_detil,id_user,id_toko,id_produk,rating,komen) VALUES ('$id_detil','$id_user','$id_toko','$id_produk','$rating','$komen')");
		return $hasil;
	}*/
}

?>