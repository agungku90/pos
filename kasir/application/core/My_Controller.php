<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	public function cek_login(){
		if(!$this->session->userdata('user_username')){
			redirect('Welcome');
		}
	}
	public function getUserData(){
		$userData = $this->session->userdata();
		return $userData;
	}

	public function isPimpinan(){
		$userData = $this->getUserData();
		if($userData['user_level'] !==  'Pimpinan') show_404();
	}

	public function isAdmin(){
		$userData = $this->getUserData();
		if($userData['user_level'] !==  'Admin') show_404();
	}
	
	public function isKasir(){
		$userData = $this->getUserData();
		if($userData['user_level'] !==  'Kasir') show_404();
	}

}

/* End of file Core.php */
