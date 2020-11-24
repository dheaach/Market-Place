<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("model_kurir");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["kurir"] = $this->model_kurir->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_kurir" , $data);
        $this->load->view('templateku/footer');
    }

      public function add()
    {
        $id_kurir=$this->input->post('id_kurir');
        $id_toko=$this->input->post('id_toko');
        $id_user=$this->input->post('id_user');
        $nama=$this->input->post('nama');
        $kendaraan=$this->input->post('kendaraan');
        $nopol=$this->input->post('nopol');

        $this->model_kurir->save($id_kurir,$id_toko,$id_user,$nama,$kendaraan,$nopol);

        
        $data["kurir"] = $this->model_kurir->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_kurir" , $data);
        $this->load->view('templateku/footer');
    }

    public function edit(){
        
        $id_kurir=$this->input->post('id_kurir');
        $id_toko=$this->input->post('id_toko');
        $id_user=$this->input->post('id_user');
        $nama=$this->input->post('nama');
        $kendaraan=$this->input->post('kendaraan');
        $nopol=$this->input->post('nopol');


        $this->model_kurir->update($id_kurir,$id_toko,$id_user,$nama,$kendaraan,$nopol);
        
        $data["kurir"] = $this->model_kurir->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_kurir" , $data);
        $this->load->view('templateku/footer');
    }

    public function delete(){
        $id_kurir=$this->input->post('id_kurir');
        $this->model_kurir->delete($id_kurir);
        $data['kurir'] = $this->model_kurir->getAll();
        
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/add/tampil_kurir" , $data);
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