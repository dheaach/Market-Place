<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("model");
        $this->load->library('form_validation');
        $this->load->helper('form','url');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $data["barang"] = $this->model->tampilbrg(); 

        $this->load->view('templates/sidebar');
        $this->load->view("admin/master/barang/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id         = $this->input->post('id');
        $nama       = $this->input->post('nama'); 
        $kategori   = $this->input->post('kategori'); 
        $stok       = $this->input->post('stok'); 
        $harga      = $this->input->post('harga'); 
        $kondisi    = $this->input->post('kondisi');
        $satuan     = $this->input->post('satuan');
        $gambar     = $_FILES['gambar']['name'];
        if($gambar = ''){}else{
           $config ['upload_path']  = './assets/img';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal diupload!";
           }
           else{
                $gambar = $this->upload->data('file_name');
           }
        }

        $data = array(
            'id'        => $id,
            'nama'      => $nama,
            'kategori'  => $kategori,
            'stok'      => $stok,
            'harga'     => $harga,
            'kondisi'   => $kondisi,
            'satuan'    => $satuan,
            'gambar'    => $gambar
        );

        $this->model->tambah($data, 'barang');
        redirect('admin/barang');
    }

    public function list_barang()
    {
        $data['anu'] = $this->kurir_model->getAll();
        
        
        $this->load->view('templates/header');
        $this->load->view('kurir/list', $data);
        $this->load->view('templates/footer');  
    }

    public function selesai($id)
    {
        $data = array('status_pengiriman' => 'Selesai');

        $where = array('id_beli' => $id);
        $update = $this->kurir_model->update('pembelian' , $data , $where);
        redirect('barang/list_barang');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $hapus = $this->model->delete('barang',$where);
        redirect('admin/barang/index');
        
    }

    public function empty()
    {

        $this->load->view('templates/header');
        $product = $this->m_kat;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $this->load->view("admin/master/kat/empty");
        $this->load->view('templates/footer');
    } 
}