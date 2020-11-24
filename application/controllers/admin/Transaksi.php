<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model("model");
        $this->load->library("session");
        
        if($this->session->userdata('user_role') != '1') {
        			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Login Dulu Dong!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('user/login');
        }
    }

    public function index()
    {   
        $data["beli"] = $this->db->query("SELECT * FROM pembelian WHERE total > 0 ORDER BY tanggal DESC")->result();
    	$this->load->view('templateku/header');
		$this->load->view('templateku/sidebar');
		$this->load->view('admin/master/transaksi/checkout', $data);
		$this->load->view('templateku/footer');
    }

    public function selesai($id)
    {
    	$data = array(
            'status_pembayaran' => 'Selesai',
            'status_pengiriman' => 'Terkirim',
            'status_transaksi'  => 'Selesai'
        );

    	$where = array('id_beli' => $id);
    	$update = $this->model->update('pembelian',$data,$where);
    	redirect('admin/transaksi'); 
    }

    
    public function batal($id)
    {
    	$data = array(
            'status_pembayaran' => 'Dibatalkan',
            'status_pengiriman' => 'Dibatalkan',
    		'status_transaksi'  => 'Batal'
    	);

    	$where = array('id_beli' => $id);
    	$update = $this->model->update('pembelian',$data,$where);
    	
    	$lihat = $this->db->query("SELECT * FROM detil_beli WHERE id_beli = '$id'");
    	foreach ($lihat->result() as $a) {
    		$id_toko 	= $a->id_toko;
    		$id_produk	= $a->id_produk;
    		$jumlah	 	= $a->jumlah;

    		$this->session->set_userdata('jum',$jumlah);

    		$cek = $this->db->query("SELECT * FROM barang WHERE id = '$id_produk'");
    		foreach ($cek->result() as $b) {
    			$stok = $b->stok+$this->session->userdata('jum');

	    		$d = array(
	    			'stok'	=> $stok
	    		);

	    		$dimana = $id_produk;
	    		$this->model->update('barang',$d,$dimana);
    		}

    		$were = array('id_beli' => $id);
    		$this->model->delete('detil_beli',$were);
    	}

    	redirect('admin/transaksi');
    }

    public function detail($id)
    {
        $data["detail"] = $this->db->query("SELECT * FROM pembelian WHERE id_beli = '$id'")->result();
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view('admin/master/transaksi/det_checkout',$data);
        $this->load->view('templateku/foot');
        $this->load->view('templateku/footer');
    }

    public function rampung($id)
    {
        $data = array(
            'status_pembayaran' => 'Selesai'
        );

        $where = array('id_beli' => $id);
        $update = $this->model->update('pembelian',$data,$where);
        $update1 = $this->model->update('detil_beli',$data,$where);
        redirect('admin/transaksi');
    }

}