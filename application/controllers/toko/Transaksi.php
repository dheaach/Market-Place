<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("transaksi_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["transaksi"] = $this->transaksi_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header',$data);
        $this->load->view("toko/transaksi/tampil");
        $this->load->view('template/footer');
    }

    public function detail($id='')
    {
        $data['kategori'] = $this->kategori_model->view();
        $transaksi = $this->transaksi_model;
        $data["detail"] = $transaksi->detail($id);
        if (!$data["detail"]) show_404();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header',$data);
        $this->load->view('toko/transaksi/detail/'.$id);
        $this->load->view('template/footer');
    }
    public function update1()
    {
        $id_beli=$this->input->post('id_beli');
        $bukti     = $_FILES['bukti']['name'];
        if($bukti = ''){}else{
           $config ['upload_path']  = './assets/img/bukti';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('bukti')){
                echo "Bukti Gagal diupload!";
           }
           else{
                $bukti = $this->upload->data('file_name');
           }
        }
        $this->transaksi_model->upload($id_beli,$bukti);
        $data['kategori'] = $this->kategori_model->view();
        $data["transaksi"] = $this->transaksi_model->view(); 
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header', $data);
        $this->load->view('toko/transaksi/tampil');
        $this->load->view('template/footer');
    }
}