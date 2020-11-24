<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("profile_model");
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["user"] = $this->profile_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header', $data);
        $this->load->view("toko/profil/user");
        $this->load->view('template/footer');
    }
    public function tampil($idu = null)
    {

        if (!isset($idu)) redirect('toko/profile/');
        $data['kategori'] = $this->kategori_model->view();
        $user = $this->profile_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());
        $idu=$this->session->userdata("user_id");
        $data["user"] = $user->tampil($idu);
        if (!$data["user"]) show_404();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('template/header', $data);
        $this->load->view("toko/profil/user");
        $this->load->view('templates/footer');
    }
	public function update(){
		$nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $alamat=$this->input->post('alamat');
        $kota=$this->input->post('kota');
        $kode_pos=$this->input->post('kode_pos');
        $jenis_k=$this->input->post('jenis_k');
        $tempat=$this->input->post('tempat');
        $tanggal=$this->input->post('tanggal');
        $kontak=$this->input->post('kontak');
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
		$this->profile_model->update($nama,$username,$password,$alamat,$kota,$kode_pos,$jenis_k,$tempat,$tanggal,$kontak);
		$data['kategori'] = $this->kategori_model->view();
		$data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
		$this->load->view('template/header', $data);
        $id=$this->session->userdata("user_id");
        redirect('toko/profile/tampil/'.$id);
        $this->load->view('template/footer');
	}

    public function change($idu=null)
    {
        $data['kategori'] = $this->kategori_model->view();
        $user = $this->profile_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());
        $idu=$this->session->userdata("user_id");
        $data["change"] = $user->lihat($idu);
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $id=$this->session->userdata("user_id");
        $this->load->view('template/header', $data);
        $this->load->view("toko/profil/change");
        $this->load->view('template/footer');
    }
    public function cek()
    {

        $this->form_validation->set_rules('newpass','Password', 'matches[conpass]');
        $this->form_validation->set_rules('conpass','Password', 'matches[newpass]',[
            'matches' => 'Password Tidak Sama !'
        ]);

        $old=$this->input->post('oldpass');
        $new=$this->input->post('newpass');
        $con=$this->input->post('conpass');
        $cek=$this->profile_model->cek($old,$new,$con);
        $id=$this->session->userdata("user_id");
        
        $data['kategori'] = $this->kategori_model->view();
        $data['foto'] = $this->kategori_model->foto();
        $data["change"] = $this->profile_model->lihat($id);
        $data['total'] = $this->kategori_model->hitung();
        if($cek != FALSE){
            $this->session->set_flashdata('success', 'Password Berhasil Diubah. Mohon login kembali !');
            $this->load->view('template/header', $data);
            redirect('user/logout');
            $this->load->view('template/footer');
        }else{
            $this->session->set_flashdata('gagal', 'Password Gagal Diubah. Mohon coba lagi !');
            $this->load->view('template/header', $data);
            $this->load->view('toko/profil/change');
            $this->load->view('template/footer');
        }
    }  
    public function ubahusername()
    {       
        $username=$this->input->post('username');
        $nik=$this->session->userdata("user_id");
        
        $d = array('username' => $username);
        $where = array('nik' => $nik);

        $this->profile_->updateku('user',$d,$where);
        $this->session->set_flashdata('success' , 'Username Anda Berhasil Di Ubah');
        
        redirect('toko/profile/tampil'.$nik);
    }

    public function ubahpassword()
    {
        $password=$this->input->post('password');
        $nik=$this->session->userdata("user_id");
        
        $d = array('password' => $password);
        $where = array('nik' => $nik);

        $this->profile_model->updateku('user',$d,$where);
        $this->session->set_flashdata('success' , 'Password Anda Berhasil Di Ubah');
        
        redirect('toko/profile/tampil'.$nik);
    }

     public function updateprof(){
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $kota=$this->input->post('kota');
        $jenis_k=$this->input->post('jk');
        $tempat=$this->input->post('tempat');
        $tanggal=$this->input->post('tl');
        $kontak=$this->input->post('kontak');

        $this->profile_model->updateprofile($nama,$alamat,$kota,$jenis_k,$tempat,$tanggal,$kontak);

        $this->session->set_flashdata('success' , 'Data Anda Berhasil Di Ubah');
        $nik=$this->session->userdata("user_id");
        redirect('toko/profile/tampil'.$nik);
    }

}