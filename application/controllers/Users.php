<?php
	class Users extends CI_controller
	{
		//register
			public function register()
			{
				$data ['title'] = 'Sign Up';

				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('password2', 'Comfirmed_password', 'matches[password]');

				if($this->form_validation->run() === FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('templates/body');
					$this->load->view('users/register', $data);
					$this->load->view('templates/footer');
				}
				else
				{
					// for encryption
					$enc_pw = md5($this->input->post('password'));

					$this->user_model->register($enc_pw);

					$this->session->set_flashdata('user_registered', 'You have successfully registered!!');
					
					redirect('users/login');


				}
			}

			//login user
			public function login()
			{
				$data ['title'] = 'Login';

				
				$this->form_validation->set_rules('username', 'Username', 'required');
				
				$this->form_validation->set_rules('password', 'Password', 'required');
				
				if($this->form_validation->run() === FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('templates/body');
					$this->load->view('users/login', $data);
					$this->load->view('templates/footer');
				}
				else
				{
					//get username 
					$username = $this->input->post('username');
					//get pw encrypted
					$password = md5($this->input->post('password'));
					//login user
					$user_id = $this->user_model->login($username, $password);

					if($user_id)
					{
						//get seession create
						$user_data = array
						(
							'userid' => $user_id,
							'username' => $username,
							'logged_in' => true
						);

						$this->session->set_userdata($user_data);
						//set msg
						$this->session->set_flashdata('user_loggedin', 'Successfully login!');
					
						redirect('/');

					}
					else
					{
						$this->session->set_flashdata('login_failed', 'Invalid username or password');
					
						redirect('users/login');
					}
					//get msg after login
					


				}
			}
			public function logout()
			{
				$this->session->unset_userdata('logged_in');
				$this->session->unset_userdata('userid');
				$this->session->unset_userdata('username');

				redirect('users/login');
			}

			// chk username
			public function check_username_exists($username)
			{
				$this->form_validation->set_message('check_username_exists', 'Username has been used. Try another one');
				if($this->user_model->check_username_exists($username))
				{
					return true;
				}
				else
				{
					return false;
				}
			}

			//chk email
			public function check_email_exists($email)
			{
				$this->form_validation->set_message('check_email_exists', 'Email has been used. Try another one');
				if($this->user_model->check_email_exists($email))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
	}