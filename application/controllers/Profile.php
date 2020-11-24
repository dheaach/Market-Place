<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
  public function __construct()
    {
        parent::__construct();

        $this->load->model("model_user");
        $this->load->model("model");

        if($this->session->userdata('user_role') != '2') {
          $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Login Dulu Dong!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      redirect('user/login');
      }
    }

  public function index($nik)
  {
      $data["profil"] = $this->model_user->getNganu($nik);
      $this->load->view('templates/header');
      $this->load->view('admin/_partials/navbar');
      $this->load->view('dashboard/profile',$data);
      $this->load->view('templates/footer');
  }

  public function simpan_gambar()
  {
    $id         = $this->session->userdata('user_id');
        $foto     = $_FILES['foto']['name'];
        if($foto = ''){}else{
           $config ['upload_path']  = './assets/img/profile';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('foto')){
                echo "foto Gagal diupload!";
           }
           else{
                $foto = $this->upload->data('file_name');
           }
        }

        $data = array(
            'foto'       => $foto,
        );

        $where = array('nik' => $id);
        $update = $this->model->update('user',$data,$where); 
  }

   public function ubah_profil()
    {
        $nik = $this->session->userdata('user_id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $jenis_kelamin = $this->input->post('jenkel');
        $tempat = $this->input->post('tempat');
        $tgl = $this->input->post('tgl');
        $nomer = $this->input->post('nomer');
        $foto = $_FILES['foto']['name'];
          
          if($foto != ''){
             $config ['upload_path']  = './assets/img/profile';
             $config ['allowed_types'] = 'jpg|jpeg|png|gif';

             $this->load->library('upload', $config);
             if(!$this->upload->do_upload('foto')){
                  echo "foto Gagal diupload!";
             }
             else{
                  $foto = $this->upload->data('file_name');
             }
          }else{
             $foto = $this->input->post('gambar');
          }

        $data = array(
              'nama_user'       => $nama,
              'alamat'          => $alamat,
              'kota'            => $kota,
              'jenis_kelamin'   => $jenis_kelamin,
              'tanggal_lahir'   => $tgl,
              'tempat_lahir'    => $tempat,
              'kontak'          => $nomer,
              'foto'            => $foto
        );

        $where = array('nik' => $nik);
        $update = $this->model->update('user',$data,$where); 
        redirect('profile/index/'.$nik);
    }

  public function metu()
  {
    $this->session->sess_destroy();
    redirect(base_url('user/login'));
  }

  public function ubahusername()
  {
    
    $nik = $this->input->post('nik');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $data = array(
      'username' => $username,
      'password' => $password
    );

    $where = array('nik' => $nik);
    $a = $this->model->update('user',$data,$where);

    redirect('profile/metu');
   
    
  }
}
?>