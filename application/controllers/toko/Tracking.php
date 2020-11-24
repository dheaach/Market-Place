<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("tracking_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['stok'] = $this->kategori_model->cek();
        $data["track"] = $this->tracking_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header',$data);
        $this->load->view("toko/deliver/tracking");
        $this->load->view('template/footer');
    }
    public function search(){
        $data['kategori'] = $this->kategori_model->view();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['foto'] = $this->kategori_model->foto();
        $key=$this->input->post('search');
        $this->tracking_model->search($key);
        $data["track"] = $this->tracking_model->search($key); 
        $this->load->view('template/header',$data);
        $this->load->view('toko/deliver/tracking');
        $this->load->view('template/footer');
    }
}