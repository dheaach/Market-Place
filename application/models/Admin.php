<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
        return $this->session->userdata('toko_id');
        return $this->session->userdata('user_name');
        return $this->session->userdata('user_pass');
    }

	//fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function foto()
    {
        $id = $this->session->userdata("user_id");
        $query = $this->db->query("SELECT * FROM user WHERE nik='$id'");
        return $query->result();
    }
    function check_toko($table, $field1)
    {
         $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function hitungJumlahAsset()
    {   
        $toko = $this->session->userdata("toko_id");
        $query=$this->db->query("SELECT * FROM barang WHERE id_toko = '$toko'");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
    function hitungKurir()
    {   
        $toko = $this->session->userdata("toko_id");
        $query=$this->db->query("SELECT * FROM kurir WHERE id_toko='$toko'");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
    function hitungTrans()
    {   
        $toko = $this->session->userdata("toko_id");
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('status_pembayaran'=='Dibayar');
        $this->db->where('status_pengiriman' == 'Terkirim');
        $query = $this->db->get();
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