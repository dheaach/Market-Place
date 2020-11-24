<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sayur_model'); //kategori
        $this->load->model('pro_model'); //produk
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["products"] = $this->pro_model->getAll(); 
        $data['kategori'] = $this->sayur_model->view();
        $data['foto'] = $this->sayur_model->foto();
        $data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $data['kode'] = $this->pro_model->kode();
        
        $this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/barang/tampil" , $data);
        $this->load->view('templateku/footer');
    }


	public function save(){
        $id_barang=$this->input->post('kode_barang');
        $nama_barang=$this->input->post('nama_barang');
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
		$this->pro_model->save($id_barang,$nama_barang,$id_toko,$kategori,$gambar,$stok,$harga,$kondisi,$satuan);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
		$data['kategori'] = $this->sayur_model->view();
		$data['foto'] = $this->sayur_model->foto();
        $data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $data['kode'] = $this->pro_model->kode();
		$this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        redirect('admin/kategori/barang/'.$kategori);
        $this->load->view('templateku/footer');
	}

	public function update(){
		$kode_barang=$this->input->post('kode_barang');
		$nama_barang=$this->input->post('nama_barang');
        $id_toko=$this->input->post('id_toko');
		$kategori=$this->input->post('kategori');
		$stok=$this->input->post('stok');
		$harga=$this->input->post('harga');
		$kondisi=$this->input->post('kondisi');
		$satuan=$this->input->post('satuan');
		$this->pro_model->update($kode_barang,$id_toko,$nama_barang,$kategori,$stok,$harga,$kondisi,$satuan);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
		$data['kategori'] = $this->sayur_model->view();
		$data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $data['kode'] = $this->pro_model->kode();
		$this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        redirect('admin/kategori/barang/'.$kategori);
        $this->load->view('templateku/footer');
	}

	public function delete(){
		$kode_barang=$this->input->post('kode_barang');
        $kategori=$this->input->post('kategori');
		$this->pro_model->delete($kode_barang);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
		$data['kategori'] = $this->sayur_model->view();
        $data['foto'] = $this->sayur_model->foto();
        $data['stok'] = $this->sayur_model->cek();
        $data['total'] = $this->sayur_model->hitung();
        $data['kode'] = $this->pro_model->kode();
		$this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        redirect('admin/kategori/barang/'.$kategori);
        $this->load->view('templateku/footer');
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