<?php
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}


		public function register($enc_password){
			//User data array
			$data = array(
				'name' => $this->input->post('name'), 
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password
			);

			return $this->db->insert('users', $data);

		}

		//Log user in
		public function login($username, $password){
			//Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			}else{
				return false;
			}
		}





	}