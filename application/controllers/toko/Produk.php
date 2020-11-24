<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("produk_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["products"] = $this->produk_model->getAll(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->produk_model->kode();
        if (!$data["products"]) redirect('produk/empty');
        $this->load->view('template/header', $data);
        $this->load->view("toko/produk/tampil",$data);
        $this->load->view('template/footer');
    }


	public function save(){
        $id_barang=$this->input->post('kode_barang');
		$nama_barang=$this->input->post('nama_barang');
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
		$this->produk_model->save($id_barang,$nama_barang,$kategori,$gambar,$stok,$harga,$kondisi,$satuan);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
		$data['kategori'] = $this->kategori_model->view();
		$data['foto'] = $this->kategori_model->foto();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->produk_model->kode();
		$this->load->view('template/header', $data);
        redirect('toko/kategori/barang/'.$kategori);
        $this->load->view('template/footer');
	}

	public function update(){
		$kode_barang=$this->input->post('kode_barang');
		$nama_barang=$this->input->post('nama_barang');
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
		$this->produk_model->update($kode_barang,$nama_barang,$kategori,$stok,$harga,$kondisi,$satuan,$gambar);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
		$data['kategori'] = $this->kategori_model->view();
		$data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->produk_model->kode();
		$this->load->view('template/header', $data);
        redirect('toko/kategori/barang/'.$kategori);
        $this->load->view('template/footer');
	}

	public function delete(){
		$kode_barang=$this->input->post('kode_barang');
        $kategori=$this->input->post('kategori');
		$this->produk_model->delete($kode_barang);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
		$data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->produk_model->kode();
		$this->load->view('template/header', $data);
        redirect('toko/kategori/barang/'.$kategori);
        $this->load->view('template/footer');
	}
    public function empty()
    {

        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $product = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $this->load->view('template/header', $data);
        $this->load->view("toko/produk/empty");
        $this->load->view('template/footer');
    } 
}