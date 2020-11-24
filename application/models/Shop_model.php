<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model
{
	private $_table = "toko";
	public $id;
	public $nama;
	public $alamat;
	public $kota;
	public $kode_pos;
	public $kontak;
	public $keterangan;
	public $logo;

	public function rules()
	{
		return [
			['field' => 'id',
			'label' => 'Id',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required'],

			['field' => 'kota',
			'label' => 'Kota',
			'rules' => 'required'],

			['field' => 'kode_pos',
			'label' => 'Kode_pos',
			'rules' => 'required'],

			['field' => 'kontak',
			'label' => 'Kontak',
			'rules' => 'required'],

			['field' => 'keterangan',
			'label' => 'Keterangan',
			'rules' => 'required']
		];
	}

	public function view()
	{
		return $this->db->get('toko')->result();
	}
	public function tampil($id)
	{
		$id=$this->session->userdata("toko_id");
		$query=$this->db->query("SELECT * FROM toko WHERE id_toko = '$id'");
        return $query->result();
	}
	public function update($nama,$alamat,$kota,$kode_pos,$kontak,$keterangan){
		$id=$this->session->userdata("toko_id");
		$hasil=$this->db->query("UPDATE toko SET nama_toko='$nama',alamat_toko='$alamat',kota='$kota',kode_pos='$kode_pos',kontak='$kontak',keterangan='$keterangan' WHERE id_toko='$id'");
		return $hasil;
	}


}
