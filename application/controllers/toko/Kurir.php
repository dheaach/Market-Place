<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("kurir_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['anu'] = $this->kurir_model->getAll();
        $data["kurir"] = $this->kurir_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['kode'] = $this->kurir_model->kode();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header',$data);
        $this->load->view("toko/kurir/tampil",$data);
        $this->load->view('template/footer');
    }


	public function save(){
		$id_kurir=$this->input->post('id_kurir');
		$id_toko=$this->input->post('id_toko');
        $id_user='0';
		$nama=$this->input->post('nama');
        $kendaraan=$this->input->post('kendaraan');
		$nopol=$this->input->post('nopol');
		
		$this->kurir_model->save($id_kurir,$id_user,$nama,$id_toko,$kendaraan,$nopol);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
		$data["kurir"] = $this->kurir_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $data['stok'] = $this->kategori_model->cek();
        $data['kode'] = $this->kurir_model->kode();
		$this->load->view('template/header',$data);
        redirect('toko/kurir/',$data);
        $this->load->view('template/footer');
	}

	public function update(){
		$id_kurir=$this->input->post('id');
        $nama=$this->input->post('nama');
		$kendaraan=$this->input->post('kendaraan');
		$nopol=$this->input->post('nopol');
		
        $this->kurir_model->update1($id_kurir,$nama,$kendaraan,$nopol);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
		$data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data["kurir"] = $this->kurir_model->view(); 
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['kode'] = $this->kurir_model->kode();
		$this->load->view('template/header',$data);
        redirect('toko/kurir/',$data);
        $this->load->view('template/footer');
	}

	public function delete(){
		$id_kurir=$this->input->post('id_kurir');
		$data['kategori'] = $this->kategori_model->view();
        $data['total'] = $this->kategori_model->hitung();
        $this->kurir_model->delete($id_kurir);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
        $data['foto'] = $this->kategori_model->foto();
        $data["kurir"] = $this->kurir_model->view(); 
        $data['kode'] = $this->kurir_model->kode();
        $data['stok'] = $this->kategori_model->cek();
		$this->load->view('template/header',$data);
        redirect('toko/kurir/',$data);
        $this->load->view('template/footer');
	}
    public function list()
    {
        $data['anu'] = $this->kurir_model->getAll();
        $data["kurir"] = $this->kurir_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['stok'] = $this->kategori_model->cek();
        $data['kode'] = $this->kurir_model->kode();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header',$data);
        $this->load->view("toko/kurir/list",$data);
        $this->load->view('template/footer');
    }
    public function selesai($id)
    {
        $data = array('status_pengiriman' => 'Selesai');

        $where = array('id_beli' => $id);
        $update = $this->kurir_model->update('pembelian' , $data , $where);
        redirect('toko/kurir/list');
    }
}