<?php defined('BASEPATH') OR exit('No direct access allowed');
class Model_kurir extends CI_Model
{

	private $_table = "kurir";

	public $id_kurir;
	public $kendaraan;
	public $nopol;

	public function rules()
	{
		return
		[
			['field' => 'id_kurir',
			 'label' => 'Id_kurir',
			 'rules' => 'required'],

			 ['field' => 'kendaraan',
			 'label' => 'Kendaraan',
			 'rules' => 'required'],

			 ['field' => 'nopol',
			 'label' => 'Nopol',
			 'rules' => 'required'],
		
		];
	}

	public function getByNik($id_kurir)
	{
		return $this->db->get_where($this->_table,["id_kurir" => $id_kurir])->row();
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_kurir = $post["id_kurir"];
		$this->kendaraan = $post["kendaraan"];
		$this->nopol = $post["nopol"];

		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_kurir = $post["id_kurir"];
		$this->kendaraan = $post["kendaraan"];
		$this->nopol = $post["nopol"];

		$this->db->update($this->_table, $this, array('id_kurir' => $post['id_kurir']));
	}

	public function delete()
	{
		return $this->db->delete($this->_table, array("id_kurir" => $id_kurir));
	}
}
?>