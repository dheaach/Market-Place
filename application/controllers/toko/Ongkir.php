<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
        $this->load->library('form_validation');		

	}


	function _api_ongkir_post($origin,$des,$qty,$cour)
   {
  	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$des."&weight=".$qty."&courier=".$cour,	  
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    /* masukan api key disini*/
	    "key: 36ba3797f7c42438d4ef6c93e1215127"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return $err;
		} else {
		  return $response;
		}
   }





   function _api_ongkir($data)
   {
	   	$curl = curl_init();

		curl_setopt_array($curl, array(
		  //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
		  //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",		  
		  CURLOPT_HTTPHEADER => array(
		  	/* masukan api key disini*/
		    "key: 36ba3797f7c42438d4ef6c93e1215127"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return  $err;
		} else {
		  return $response;
		}
   }


	public function provinsi()
	{

		$provinsi = $this->_api_ongkir('province');
		$data = json_decode($provinsi, true);
		echo json_encode($data['rajaongkir']['results']);
	}


	public function lokasi()
	{
		$data['kategori'] = $this->kategori_model->view();
		$data['foto'] = $this->kategori_model->foto();
		$data['total'] = $this->kategori_model->hitung();
		$this->load->view('template/header', $data);
        $this->load->view("toko/deliver/ongkir");
        $this->load->view('template/footer');
		
	}

	public function kota($provinsi="")
	{
		if(!empty($provinsi))
		{
			if(is_numeric($provinsi))
			{
				$kota = $this->_api_ongkir('city?province='.$provinsi);	
				$data = json_decode($kota, true);
				echo json_encode($data['rajaongkir']['results']);		  					 
			}
			else
			{
				show_404();
			}
		}
	   else
	   {
	   	show_404();
	   }
	}

	public function tarif($origin,$des,$qty,$cour)
	{
		$berat = $qty*1000;
		$tarif = $this->_api_ongkir_post($origin,$des,$berat,$cour);		
		$data = json_decode($tarif, true);
		echo json_encode($data['rajaongkir']['results']);		
	}
}
