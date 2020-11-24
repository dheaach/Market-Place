<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("komentar_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['stok'] = $this->kategori_model->cek();
        $data["komen"] = $this->komentar_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header',$data);
        $this->load->view("toko/review/komentar");
        $this->load->view('template/footer');
    }


}