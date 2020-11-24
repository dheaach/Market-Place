<?php defined('BASEPATH') OR exit('No direct access allowed');
class Model_toko extends CI_Model
{

	private $_table = "toko";

	public $id_toko;
	public $nama_toko;
	public $alamat_toko;
	public $kota;
	public $kode_pos;
	public $kontak;

	public function rules()
	{
		return
		[
			['field' => 'id_toko',
			 'label' => 'Id_toko',
			 'rules' => 'required'],

			 ['field' => 'nama_toko',
			 'label' => 'Nama_toko',
			 'rules' => 'required'],

			 ['field' => 'alamat_toko',
			 'label' => 'Alamat_toko',
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
		
		];
	}

	public function getByNik($id_toko)
	{
		return $this->db->get_where($this->_table,["id_toko" => $id_toko])->row();
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_toko = $post["id_toko"];
		$this->nama_toko = $post["nama_toko"];
		$this->alamat_toko = $post["alamat_toko"];
		$this->kota = $post["kota"];
		$this->kode_pos = $post["kode_pos"];
		$this->kontak = $post["kontak"];

		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_toko = $post["id_toko"];
		$this->nama_toko = $post["nama_toko"];
		$this->alamat_toko = $post["alamat_toko"];
		$this->kota = $post["kota"];
		$this->kode_pos = $post["kode_pos"];
		$this->kontak = $post["kontak"];

		$this->db->update($this->_table, $this, array('id_toko' => $post['id_toko']));
	}

	public function delete()
	{
		return $this->db->delete($this->_table, array("id_toko" => $id_toko));
	}
}
?>