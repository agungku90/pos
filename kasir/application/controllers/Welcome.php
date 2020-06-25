<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('element/login');
		//form validasi 
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		
		//kondisi jika form validasi kosong  maka akan kembali ke view
        if ($this->form_validation->run() == TRUE) {
            $data = [
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password'))
			];
			//cek data login di database
			$s = $this->login_model->login($data);
			// print_r($s);die;
            if (!empty($s)) {
				$type = $s->user_level;
				//cek level user
				$level = $this->login_model->cek_status($type);
				$session_data  = array(
									'user_id' => $s->user_id,
									'user_username' =>$s->user_username,
									'user_nama' => $s->user_nama,
									'user_level' => $level->jenis_level
								);
								// print_r($session_data);die;
                $this->session->set_userdata($session_data);
					if($level ->jenis_level  =='Kasir'){
						redirect('kasir');
					}elseif( $level ->jenis_level == 'Admin'){
						redirect('admin');
					}else{
						redirect('pimpinan');
					}

            }else{
                echo "<script>alert('Username dan password yang anda masukkan salah')</script>";
                $this->load->view('element/login');
            }
        } else {
            $this->load->view('element/login');
        }
	}

	// public function cek_login(){
	// 	$data = [
	// 		            'username' => $this->input->post('username'),
	// 		            'password' => md5($this->input->post('password'))
	// 			];

	// 	$cek =$this->load->login_model->login($data);

	// 	if(!empty($cek)){
	// 		$type = $cek->user_level;
	// 		$level = $this->login_model->cek_status($type);
	// 			$session_data  = array(
	// 				'user_id' => $cek->user_id,
	// 				'user_username' =>$cek->user_username,
	// 				'user_nama' => $cek->user_nama,
	// 				'user_level' => $level->jenis_level
	// 			);
	// 			$this->session->set_userdata($session_data);

	// 			echo "Succes";
		
	// 	}else{
	// 		echo "error";
	// 	}

	// }

	function logout(){
		$this->session->sess_destroy();
		$url=base_url();
		redirect($url);
	}
}
