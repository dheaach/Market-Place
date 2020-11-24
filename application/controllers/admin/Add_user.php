<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("model_user");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["user"] = $this->model_user->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_user" , $data);
        $this->load->view('templateku/footer');
    }


	public function add(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama_user');
		$alamat=$this->input->post('alamat');
		$kota=$this->input->post('kota');
		$kode_pos=$this->input->post('kode_pos');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$tanggal_lahir=$this->input->post('tanggal_lahir');
		$kontak=$this->input->post('kontak');

		$this->model_user->save($username,$password,$nik,$nama,$alamat,$kota,$kode_pos,$jenis_kelamin,$tanggal_lahir,$kontak);

		
		$data["user"] = $this->model_user->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_user" , $data);
        $this->load->view('templateku/footer');
	}

	public function edit(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$nik=$this->input->post('nik');
		$nama_user=$this->input->post('nama_user');
		$alamat=$this->input->post('alamat');
		$kota=$this->input->post('kota');
		$kode_pos=$this->input->post('kode_pos');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$tanggal_lahir=$this->input->post('tanggal_lahir');
		$kontak=$this->input->post('kontak');

		$this->model_user->update($username,$password,$nik,$nama_user,$alamat,$kota,$kode_pos,$jenis_kelamin,$tanggal_lahir,$kontak);
		
		$data["user"] = $this->model_user->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_user" , $data);
        $this->load->view('templateku/footer');
	}

	public function delete(){
		$nik=$this->input->post('nik');
		$this->model_user->delete($nik);
		$data['user'] = $this->model_user->getAll();
		
		$this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_user" , $data);
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