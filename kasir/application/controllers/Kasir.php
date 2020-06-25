<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends My_Controller {


	public function __construct()
	{
		parent ::__construct();
		$this->cek_login();

		$this->isKasir();



	}
	public function index()
	{
		$dataLogin= $this->session->userdata('user_username');
		

		$dataUser = $this->login_model->dataUser($dataLogin);
		$databarang =[
			'transaksi' => $this->admin_model->countTransaksi(),
			'terjual' => $this->admin_model->countBrgTerjual(),
			'laba' => $this->admin_model->labaRugiBulan(),
		];
		//content 
		$data = [
			'content'   => $this->load->view('kasir/dashboard', $databarang, TRUE),
			'username'  => $dataUser->user_username,
			'nama'      => $dataUser->user_nama
		];
		//load view kerangka
		$this->load->view('element/kerangka', $data);
	}

	//transaksi
	public function transaksi(){
		$dataLogin= $this->session->userdata('user_username');
		// print_r($dataLogin);die;

		$dataUser = $this->login_model->dataUser($dataLogin);

		date_default_timezone_set('Asia/Jakarta');
		$data = null;
		//kondisi jika melakukan transaksi
        if(isset($_POST['beli'])){
            $data = $this->input->post();
            $idp = 'TRS-'.date('dmyHis', time());
            $param = array(
                'id_pembelian' => $idp,
                'id_user' => $this->session->userdata('id_user'),
                'tanggal_beli' => date('Y-m-d H:i:s', time())
            );

            unset($data['beli']);
            unset($data['nama']);

            $arr = array();
            foreach ($data as $key => $val)
            {
                foreach ($val as $k => $v)
                {
                    $arr[$k][$key] = $val[$k];
                    $arr[$k]['id_pembelian'] = $idp;
                }
            }
        
            $addPembelian = $this->kasir_model->addPembelian($param);
            if ($addPembelian)
            {
                $addDetail = $this->kasir_model->addDetailPembelian($arr);
                if ($addDetail)
                {
                   
                    redirect('kasir/transaksi');
                }
                else
                {
                   
                    redirect('kasir/transaksi');
                }
			}
		}
	
		
		$data = [
			'content'   => $this->load->view('kasir/transaksi', $dataUser, TRUE),
			'username'  => $dataUser->user_username,
			'nama'      => $dataUser->user_nama
		];
		$this->load->view('element/kerangka', $data);
	}

	public function namadankode_barang()
    {
		// $data = $this->kasir_model->getNamaDanKode('a')->result();
		// print_r($data);die;
		$input = $this->input->post('data');
        if (isset($input))
        {
            $nm = $this->input->post('data');
			$data = $this->kasir_model->getNamaDanKode($nm)->result();
			
            echo json_encode($data);
        }
	}
	
	
//get barang untuk ajax
	public function get_barang()
    {
		$input = $this->input->post('data');
        if (isset($input))
        {
            $nm = $this->input->post('data');
            $data = $this->kasir_model->getDataBarang($nm)->result();
            echo json_encode($data);
        }
	}
	
	

	public function ajaxTransaksi()
    {
        $list = $this->kasir_model->get_datatables();
        $data = array();
        $no = isset($_POST['start']) ? $_POST['start'] : null;
        foreach ($list as $beli) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $beli->id_pembelian;
            $row[] = indo_date($beli->tanggal_beli);
            $row[] = 'Rp. '.number_format($beli->total);
            $row[] = $beli->id_pembelian;

    
            $data[] = $row;
        }
    
        $draw = isset($_POST['draw']) ? $_POST['draw'] : null;
        $output = array(
                        "draw" => $draw,
                        "recordsTotal" => $this->kasir_model->count_all(),
                        "recordsFiltered" => $this->kasir_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }



}

/* End of file Kasir.php */
