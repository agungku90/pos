<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends My_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->cek_login();

		$this->isPimpinan();
		$this->load->library('pdf_report');


	}
	
	public function index()
	{
		$dataLogin= $this->session->userdata('user_username');
		// print_r($dataLogin);die;

		$dataUser = $this->login_model->dataUser($dataLogin);
		$x['grafik'] =$this->pimpinan_model->grafik();
		
		// print_r($databarang);die;
		$data = [
			'content'   => $this->load->view('pemimpin/dashboard',$x, TRUE),
			'username'  => $dataUser->user_username,
			'nama'      => $dataUser->user_nama
		];
		$this->load->view('element/kerangka', $data);
	}

	public function laporan(){

		$dataLogin= $this->session->userdata('user_username');
		// print_r($dataLogin);die;

		$dataUser = $this->login_model->dataUser($dataLogin);


		$datalap['data'] = $this->pimpinan_model->lap_bulan()->result();
		$data =[
			'content' => $this->load->view('pemimpin/laporan',$datalap,TRUE),
			'username' =>$dataUser->user_username,
			'nama'		=>$dataUser->user_nama
		];
		$this->load->view('element/kerangka', $data);
	}


	public function lapbulan_pdf($filter = null)
	{
		$this->load->helper('indo_date');
		$param = explode('-', $filter);
		$bulanText = indo_bulan($param[0]);
		$bulan = $param[0];
		$tahun = $param[1];

		$data = array(
			'data' => $this->pimpinan_model->lap_bulanan_detail($bulan, $tahun)->result(),
			'bulan' => $bulanText,
			'tahun' => $tahun	
		);

		$this->load->view('pemimpin/lap_bulan', $data);
	}

	

}

/* End of file Pimpinan.php */
