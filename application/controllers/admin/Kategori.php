<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sayur_model');
        $this->load->model('pro_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        
        $data['kategori'] = $this->sayur_model->view();
        $data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $product = $this->sayur_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $data['foto'] = $this->kategori_model->foto();
        $data['kode'] = $this->pro_model->kode();
        $data["product"] = $product->tampil($nama);
        $this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/tampil" , $data);
        $this->load->view('templateku/footer');
    }

    public function barang($nama = null)
    {

        if (!isset($nama)) redirect('login');
        $data['kategori'] = $this->sayur_model->view();

        $product = $this->sayur_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $data['foto'] = $this->sayur_model->foto();
        $data["product"] = $product->tampil($nama);
        $data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $data['kode'] = $this->pro_model->kode();
        
        $this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/tampil", $data);
        $this->load->view('templateku/footer');
    }
   
   public function empty()
    {
        $data['kategori'] = $this->sayur_model->view();
        $data['foto'] = $this->sayur_model->foto();
        $data["product"] = $this->pro_model->lihat();
        $data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $data['kode'] = $this->pro_model->kode();
        $this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/empty");
        $this->load->view('template/footer');   
    }

}