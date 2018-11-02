<?php
	class Users extends CI_Controller{

		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');

			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));

			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', array('is_unique' => 'This e-mail adress already exists. Please choose another one.'));

			$this->form_validation->set_rules('password', 'Password', 'required', 'matches[password2]');

			$this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password]');

			if ($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				//set message
				$this->session->set_flashdata('SuccessMsg', 'You are now registered and can log in!');
				redirect('posts');
			}
		}

		public function login(){

			$data['title'] = 'Sign in';

			$this->form_validation->set_rules('username', 'Username', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required');

			
			if ($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
				//Get username
				$username = $this->input->post('username');

				//Get and encrypt the password
				$password = md5($this->input->post('password'));

				//Login
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					//Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					
					$this->session->set_flashdata('SuccessMsg', 'Succes! You are now logged in.');
					redirect('posts');
				}else{
					$this->session->set_flashdata('SuccessMsg', 'Re-check your username and password please.');
					redirect('users/login');
				}

				//set message
				$this->session->set_flashdata('SuccessMsg', 'You are now logged in!');

				redirect('posts');
			}
		}


		public function logout(){
			//unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('SuccessMsg', 'You are now logged out.');
			redirect('users/login');

		}




 



	}