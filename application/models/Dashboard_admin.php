<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Model
{
	private $_table = "toko";

	public function getAll()
	{
		$query=$this->db->query("SELECT * FROM toko");
        return $query->result();
	}	
}
