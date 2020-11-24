<?php
class Model_user extends CI_Model{
	
	private $_table = 'user';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getByNik($nik)
	{
		return $this->db->get_where($this->_table,["nik" => $nik])->row();
	}

	public function save($username,$password,$nik,$nama,$alamat,$kota,$kode_pos,$jenis_kelamin,$tanggal_lahir,$kontak){
		$hasil=$this->db->query("INSERT INTO user (username,password,nik,nama,alamat,kota,kode_pos,jenis_kelamin,tanggal_lahir,kontak) VALUES ('$username','$password','$nik','$nama','$alamat','$kota','$kode_pos','$jenis_kelamin','$tanggal_lahir','$kontak')");
		return $hasil;
	}

	public function update($username,$password,$nik,$nama,$alamat,$kota,$kode_pos,$jenis_kelamin,$tanggal_lahir,$kontak){
		$hasil=$this->db->query("UPDATE user SET username='$username',password='$password',nama='$nama',alamat='$alamat',kota='$kota',kode_pos='$kode_pos',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',kontak='$kontak' WHERE nik='nik'");
		return $hasil;
	}

	public function delete($nik){
		$hasil=$this->db->query("DELETE FROM user WHERE nik='$nik'");
		return $hasil;
	}


	public function getNganu($nik)
	{
		$query = $this->db->query("SELECT * FROM user WHERE nik = '$nik'");
		return $query->result();
	}

	public function updateuser($username,$nik)
	{
		$sql = $this->db->query("UPDATE user SET username='$username' WHERE nik='$nik' ");
		return $sql;
	}
	
}