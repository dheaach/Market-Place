<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
	private $_table = "user";
	public $nik;
	public $nama;
	public $username;
	public $password;
	public $alamat;
	public $kode_pos;
	public $jenis_k;
	public $tempat;
	public $tanggal;
	public $kontak;
	public $foto;

	public function rules()
	{
		return [
			['field' => 'nik',
			'label' => 'Nik',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'username',
			'label' => 'Username',
			'rules' => 'required'],

			['field' => 'password',
			'label' => 'Password',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required'],

			['field' => 'kode_pos',
			'label' => 'Kode_pos',
			'rules' => 'required'],

			['field' => 'jenis_k',
			'label' => 'Jenis_k',
			'rules' => 'required'],

			['field' => 'tempat',
			'label' => 'Tempat',
			'rules' => 'required'],

			['field' => 'tanggal',
			'label' => 'Tanggal',
			'rules' => 'required'],

			['field' => 'kontak',
			'label' => 'Kontak',
			'rules' => 'required'],

			['field' => 'foto',
			'label' => 'Foto',
			'rules' => 'required']
		];
	}

	public function view()
	{
		return $this->db->get('user')->result();
	}
	public function tampil($idu)
	{
		$idu=$this->session->userdata("user_id");
		$query=$this->db->query("SELECT * FROM user WHERE nik = '$idu'");
        return $query->result();
	}
	public function update($nama,$username,$password,$alamat,$kota,$kode_pos,$jenis_k,$tempat,$tanggal,$kontak){
		$idu=$this->session->userdata("user_id");
		$hasil=$this->db->query("UPDATE user SET nama='$nama',username='$username',password='$password',alamat='$alamat',kota='$kota',kode_pos='$kode_pos',jenis_kelamin='$jenis_k',tempat_lahir='$tempat',tanggal_lahir='$tanggal',kontak='$kontak' WHERE nik='$idu'");
		return $hasil;
	}
	public function lihat($idu)
	{
		$idu=$this->session->userdata("user_id");
		$query=$this->db->query("SELECT * FROM user WHERE nik = '$idu'");
        return $query->result();
    }
    public function cek($old,$new,$con){
		$idu=$this->session->userdata("user_id");
		$hasil=$this->db->query("SELECT * FROM user WHERE nik = '$idu' AND password = '$old'");
		if ($hasil->num_rows() == 0) {
            return FALSE;
        } else {
        	if($new == $con){
            	$query=$this->db->query("UPDATE user SET password = '$con' WHERE nik = '$idu'");
            	return $query;
        	}else{
        		return FALSE;
        	}
        }
		
	}
	public function updateku($tablename,$data,$where)
	{
		$update = $this->db->update($tablename,$data,$where);
		return $update;
	}
	public function updateprofile($nama,$alamat,$kota,$jenis_kelamin,$tempat,$tanggal_lahir,$kontak){
		$nik=$this->session->userdata("user_id");
		$hasil=$this->db->query("UPDATE user SET nama='$nama',alamat='$alamat',kota='$kota',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',kontak='$kontak' WHERE nik='$nik'");
		return $hasil;
	}

	public function save($username,$password,$nik,$nama,$alamat,$kota,$kode_pos,$jenis_kelamin,$tanggal_lahir,$kontak){
		$hasil=$this->db->query("INSERT INTO user (username,password,nik,nama,alamat,kota,kode_pos,jenis_kelamin,tanggal_lahir,kontak) VALUES ('$username','$password','$nik','$nama','$alamat','$kota','$kode_pos','$jenis_kelamin','$tanggal_lahir','$kontak')");
		return $hasil;
	}

}
