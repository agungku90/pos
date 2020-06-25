<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->cek_login();

		$this->isAdmin();


	}
	
	public function index()
	{
		$dataLogin= $this->session->userdata('user_username');
		// print_r($dataLogin);die;

		$dataUser = $this->login_model->dataUser($dataLogin);
		$databarang =[
			'transaksi' => $this->admin_model->countTransaksi(),
			'terjual' => $this->admin_model->countBrgTerjual(),
			'laba' => $this->admin_model->labaRugiBulan(),
		];
		// print_r($databarang);die;
		$data = [
			'content'   => $this->load->view('kasir/dashboard', $databarang, TRUE),
			'username'  => $dataUser->user_username,
			'nama'      => $dataUser->user_nama
		];
		$this->load->view('element/kerangka', $data);
	}

	public function barang(){
		$dataLogin= $this->session->userdata('user_username');
		// print_r($dataLogin);die;

		$dataUser = $this->login_model->dataUser($dataLogin);

		$dataBarang['datab'] = $this->admin_model->tampilBarang(); 
		

		$data = [
			'content'   => $this->load->view('admin/barang', $dataBarang, TRUE),
			'username'  => $dataUser->user_username,
			'nama'      => $dataUser->user_nama
		];
		$this->load->view('element/kerangka', $data);
	}

	public function simpanBarang(){

		$data =[
			'nama_b' =>$this->input->post('nabar'),
			'harga_awal_b' =>$this->input->post('harpok'),
			'harga_jual_b' =>$this->input->post('harjul_grosir'),
			'stok_min_b' =>$this->input->post('stok'),
			'stok_min_b' =>$this->input->post('min_stok'),
			'unit_b' =>$this->input->post('satuan'),
		];
		$simpan =$this->admin_model->simpanBarang($data);
		if($simpan == true){
			echo "<script>alert('Berhasil Simpan Barang')</script>";
			redirect('admin/barang');
		}else{
			echo "<script>alert('Gagal Simpan Barang')</script>";
			redirect('admin/barang');
		}
	}

	public function ubahBarang(){

		$data =[
			'id_barang' =>$this->input->post('id'),
			'nama_b' =>$this->input->post('nabar'),
			'harga_awal_b' =>$this->input->post('harpok'),
			'harga_jual_b' =>$this->input->post('harjul_grosir'),
			'stok_b' =>$this->input->post('stok'),
			'stok_min_b' =>$this->input->post('min_stok'),
			'unit_b' =>$this->input->post('satuan'),
		];
		// print_r($data);die;
		$simpan =$this->admin_model->ubahBarang($data);
		if($simpan == true){
			echo "<script>alert('Berhasil Ubah Barang')</script>";
			redirect('admin/barang');
		}else{
			echo "<script>alert('Gagal Ubah Barang')</script>";
			redirect('admin/barang');
		}
	}

	function hapusBarang(){
		$id = $this->uri->segment(3);

		$hapus= $this->admin_model->hapusBarang($id);
		if($hapus){
			echo "<script>alert('Berhasil Hapus Barang')</script>";
			redirect('admin/barang');
		}else{
			echo "<script>alert('Gagal Hapus Barang')</script>";
			redirect('admin/barang');
		}
		
	}



}

/* End of file Admin.php */
