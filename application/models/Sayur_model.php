<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sayur_model extends CI_Model
{
	private $_table = "barang";
	public $id;
	public $nama;
	public $id_toko;
	public $gambar;
	public $stok;
	public $harga;
	public $kondisi;
	public $satuan;

	public function rules()
	{
		return [
			['field' => 'id',
			'label' => 'Id',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'id_toko',
			'label' => 'ID Toko',
			'rules' => 'required'],

			['field' => 'gambar',
			'label' => 'Gambar',
			'rules' => 'required'],

			['field' => 'stok',
			'label' => 'Stok',
			'rules' => 'required'],

			['field' => 'harga',
			'label' => 'Harga',
			'rules' => 'required'],

			['field' => 'kondisi',
			'label' => 'Kondisi',
			'rules' => 'required'],

			['field' => 'satuan',
			'label' => 'Satuan',
			'rules' => 'required']
		];
	}

	public function view()
	{
		return $this->db->get('kategori')->result();
	}
	public function tampil($nama)
	{
		
		$query=$this->db->query("SELECT * FROM barang WHERE kategori = '$nama'");
        return $query->result();
	}
	public function foto()
    {
        $id = $this->session->userdata("user_id");
        $query = $this->db->query("SELECT * FROM user WHERE nik='$id'");
        return $query->result();
    }
    public function cek(){
		$toko = $this->session->userdata("toko_id");
		$hasil=$this->db->query("SELECT * FROM barang WHERE id_toko='$toko' AND stok <= '2'");
		return $hasil->result();
	}
	public function hitung()
    {   
        $toko = $this->session->userdata("toko_id");
        $query=$this->db->query("SELECT * FROM barang WHERE id_toko='$toko' AND stok <= '2'");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

}
