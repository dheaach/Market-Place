<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("shop_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["shop"] = $this->shop_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header', $data);
        $this->load->view("toko/profil/shop");
        $this->load->view('template/footer');
    }
    public function profil($id = null)
    {

        if (!isset($id)) redirect('toko/shop/');
        $data['kategori'] = $this->kategori_model->view();
        $shop = $this->shop_model;
        $validation = $this->form_validation;
        $validation->set_rules($shop->rules());
        $id=$this->session->userdata("toko_id");
        $data["shop"] = $shop->tampil($id);
        if (!$data["shop"]) show_404();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header', $data);
        $this->load->view("toko/profil/shop");
        $this->load->view('template/footer');
    }
	public function update(){
		$nama=$this->input->post('nama_toko');
		$alamat=$this->input->post('alamat');
		$kota=$this->input->post('kota');
		$kode_pos=$this->input->post('kode_pos');
		$kontak=$this->input->post('kontak');
		$keterangan=$this->input->post('keterangan');
        /*$logo     = $_FILES['logo']['name'];
        if($logo = ''){}else{
           $config ['upload_path']  = './assets/img/produk';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('logo')){
                echo "logo Gagal diupload!";
           }
           else{
                $logo = $this->upload->data('file_name');
           }
        }*/
		$this->shop_model->update($nama,$alamat,$kota,$kode_pos,$kontak,$keterangan);
		$data['kategori'] = $this->kategori_model->view();
		$data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $shop = $this->shop_model;
        $validation = $this->form_validation;
        $validation->set_rules($shop->rules());
        $id=$this->session->userdata("toko_id");
        $data["shop"] = $shop->tampil($id);
		$this->load->view('template/header', $data);
        $this->load->view("toko/profil/shop",$data);
        $this->load->view('template/footer');
	}

}