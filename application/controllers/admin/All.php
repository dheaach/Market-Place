<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("model_all");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["all"] = $this->model_all->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/all" , $data);
        $this->load->view('templateku/footer');
    }

      public function add()
    {
        $id=$this->input->post('id');
        $nama=$this->input->post('nama');
        $id_toko=$this->input->post('id_toko');
        $kategori=$this->input->post('kategori');
        $stok=$this->input->post('stok');
        $harga=$this->input->post('harga');
        $kondisi=$this->input->post('kondisi');
        $satuan1=$this->input->post('satuan1');
        $satuan2=$this->input->post('satuan');
        $satuan ="$satuan1" . "$satuan2";
        $gambar     = $_FILES['gambar']['name'];
        if($gambar = ''){}else{
           $config ['upload_path']  = './assets/img/produk';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal diupload!";
           }
           else{
                $gambar = $this->upload->data('file_name');
           }
        }

        $this->model_all->save($id,$nama,$id_toko,$kategori,$stok,$harga,$kondisi,$satuan,$gambar);

        
        $data["all"] = $this->model_all->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/all" , $data);
        $this->load->view('templateku/footer');
    }

    public function edit(){
        
        $id=$this->input->post('id');
        $nama=$this->input->post('nama');
        $id_toko=$this->input->post('id_toko');
        $kategori=$this->input->post('kategori');
        $stok=$this->input->post('stok');
        $harga=$this->input->post('harga');
        $kondisi=$this->input->post('kondisi');
        $satuan=$this->input->post('satuan');
        $gambar     = $_FILES['gambar']['name'];
        if($gambar = ''){}else{
           $config ['upload_path']  = './assets/img/produk';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal diupload!";
           }
           else{
                $gambar = $this->upload->data('file_name');
           }
        }


        $this->model_all->update($id,$nama,$id_toko,$kategori,$stok,$harga,$kondisi,$satuan,$gambar);
        
        $data["all"] = $this->model_all->getAll(); 
        
  
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/all" , $data);
        $this->load->view('templateku/footer');
    }

    public function delete(){
        $id=$this->input->post('id');
        $this->model_all->delete($id);
        $data['all'] = $this->model_all->getAll();
        
        $this->load->view('templateku/header');
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/all" , $data);
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