<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("model_toko");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["toko"] = $this->model_toko->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_toko",$data);
        $this->load->view('templateku/footer');
    }


	public function add(){
		$id_toko=$this->input->post('id_toko');
        $id_user=$this->input->post('id_user');
		$nama_toko=$this->input->post('nama_toko');
		$alamat_toko=$this->input->post('alamat_toko');
		$kota=$this->input->post('kota');
		$kode_pos=$this->input->post('kode_pos');
		$kontak=$this->input->post('kontak');
		$keterangan=$this->input->post('keterangan');
        $logo=$this->input->post('logo');
		
		$this->model_toko->save($id_toko,$id_user,$nama_toko,$alamat_toko,$kota,$kode_pos,$kontak,$keterangan,$logo);

		
		$data["toko"] = $this->model_toko->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_toko",$data);
        $this->load->view('templateku/footer');
	}

	public function edit(){
		$id_toko=$this->input->post('id_toko');
        $id_user=$this->input->post('id_user');
        $nama_toko=$this->input->post('nama_toko');
        $alamat_toko=$this->input->post('alamat_toko');
        $kota=$this->input->post('kota');
        $kode_pos=$this->input->post('kode_pos');
        $kontak=$this->input->post('kontak');
        $keterangan=$this->input->post('keterangan');
        $logo=$this->input->post('logo');


		$this->model_toko->update($id_toko,$id_user,$nama_toko,$alamat_toko,$kota,$kode_pos,$kontak,$keterangan,$logo);
		
		$data["toko"] = $this->model_toko->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_toko" , $data);
        $this->load->view('templateku/footer');
	}

	public function delete(){
		$id_toko=$this->input->post('id_toko');
		$this->model_toko->delete($id_toko);
		$data['toko'] = $this->model_toko->getAll();
		
		$this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_toko" , $data);
        $this->load->view('templateku/footer');
	}
    public function empty()
    {

        $data['kategori'] = $this->kategori_model->view();
        $product = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $this->load->view('templateku/header', $data);
        $this->load->view("admin/master/kat/empty");
        $this->load->view('templateku/footer');
    } 
}