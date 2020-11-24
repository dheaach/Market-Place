<?php
class Report_model extends CI_Model{

  public function view()
  { 
    $this->db->select('*');
    $this->db->from('pembelian');
    $this->db->where("status_pembayaran ='selesai'");
    $query = $this->db->get();
    return $query->result();
  }

    public function keyword($keyword){

    if($keyword != ""){
      
    $this->db->like('nama_penerima', $keyword);
    
    $this->db->select('*');
    $this->db->from('pembelian');
    $this->db->where("status_pembayaran ='selesai'");
    $query = $this->db->get();
    return $query->result();
    }

    $query = $this->db->get("pembelian");
    return $query->result();
  }
}
?>