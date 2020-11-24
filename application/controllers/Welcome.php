<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model("model");
        $this->load->model("admin");
        $this->load->library("cart");
        $this->load->library("session");
    }

	public function index()
	{
		$data["barang"] = $this->model->tampilbrg();
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/user',$data);
		$this->load->view('templates/foot');
		$this->load->view('templates/footer');
	}

	public function cart($id)
	{
		$data["barang"] = $this->model->by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('cart/tampil',$data);
		$this->load->view('templates/footer');
	}

	public function toko($id)
	{
		$this->session->set_userdata('no_id',$id);
		$data["barang"] = $this->model->by_toko($id);
		$data["toko"]   = $this->db->select('*')
								   ->from('toko')
								   ->where('toko.id_toko',$id)
								   ->get()
								   ->result();
		$data["jumlah"] = $this->model->hitung($id);
		$data["akeh"] = $this->model->akeh($id);
		$data["ulasan"] = $this->model->ulasan($id);
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/toko',$data);
		$this->load->view('templates/footer');
	}

	public function sayur()
	{
		$data = $this->session->set_userdata('kat','Sayur');
		$data["barang"] = $this->db->query("SELECT * FROM barang JOIN toko ON toko.id_toko = barang.id_toko WHERE kategori = 'Sayur'")->result();
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/kategori',$data);
		$this->load->view('templates/footer');
	}

	public function buah()
	{
		$data = $this->session->set_userdata('kat','Buah');
		$data["barang"] = $this->db->query("SELECT * FROM barang JOIN toko ON toko.id_toko = barang.id_toko WHERE kategori = 'Buah'")->result();
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/kategori',$data);
		$this->load->view('templates/footer');
	}

	public function search(){
        $key=$this->input->post('search');
        $this->model->search($key);
        $data["barang"] = $this->model->search($key); 
        $this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/user',$data);
		$this->load->view('templates/foot');
		$this->load->view('templates/footer');	
    }

    public function cari(){
    	$id = $this->session->userdata('no_id');
        $cari=$this->input->post('cari');
        $this->model->cari($cari);
        $data["toko"]   = $this->db->select('*')
								   ->from('toko')
								   ->where('toko.id_toko',$id)
								   ->get()
								   ->result();	
        $data["barang"] = $this->model->cari($cari); 
        $data["jumlah"] = $this->model->hitung($id);
		$data["akeh"] = $this->model->akeh($id);
		$data["ulasan"] = $this->model->ulasan($id);
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/toko',$data);
		$this->load->view('templates/footer');
    }
}