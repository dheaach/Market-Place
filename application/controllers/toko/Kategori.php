<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->model('produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        
        $data['kategori'] = $this->kategori_model->view();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $product = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $data['foto'] = $this->kategori_model->foto();
        $data['kode'] = $this->produk_model->kode();
        $data["product"] = $product->tampil($nama);
        $this->load->view('template/header', $data);
        $this->load->view("toko/produk/tampil");
        $this->load->view('template/footer');
    }

    public function barang($nama = null)
    {

        if (!isset($nama)) redirect('login');
        $data['kategori'] = $this->kategori_model->view();

        $product = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $data['foto'] = $this->kategori_model->foto();
        $data["product"] = $product->tampil($nama);
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->produk_model->kode();
        if (!$data["product"]) redirect('toko/kategori/empty');
        $this->load->view('template/header', $data);
        $this->load->view("toko/produk/tampil");
        $this->load->view('template/footer');
    }
    public function empty()
    {
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data["product"] = $this->produk_model->lihat();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->produk_model->kode();
        $this->load->view('template/header', $data);
        $this->load->view("toko/produk/empty");
        $this->load->view('template/footer');   
    }

}