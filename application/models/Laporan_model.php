<?php
class Laporan_model extends CI_Model{

  public function view()
  { 
    $this->db->select('*');
    $this->db->from('pembelian');
    $query = $this->db->get();
    return $query->result();
  }
  public function cek()
  { 
    $this->db->select('*');
    $this->db->from('pembelian');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }
    public function keyword($keyword){

    if($keyword != ""){
      
    $this->db->like('nama_beli', $keyword);
    
    $result = $this->db->get('pembelian')->result(); // Tampilkan data siswa berdasarkan keyword
    
    return $result; 
    }

    $query = $this->db->get("pembelian");
    return $query->result();
  }
}
?>