<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($data){
		$this->db->where(['user_username'=>$data['username'],'user_password'=>$data['password']]);
		return $this->db->get('tbl_user')->row();
	}

	function cek_status($id){
		return $this->db->where('id_level',$id)->get('tb_level')->row();
	}

	function dataUser($data){
		return $this->db->where('user_username', $data)->get('tbl_user')->row();
	}


	

}

/* End of file Login_model.php */
