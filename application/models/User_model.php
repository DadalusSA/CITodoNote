<?php
	class User_model extends CI_Model
	{
		public function register($enc_pw)
		{
			$data = array
			(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_pw,
				'zipcode' => $this->input->post('zipcode')
			);

			return $this->db->insert('users' , $data);
		}

		//check username existed or not
		public function check_username_exists($username)
		{
			$query = $this->db->get_where('users' , array('username' => $username));
			if(empty($query->row_array()))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		//login user
		public function login($username, $password)
		{
			//validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$results = $this->db->get('users');

			if($results->num_rows() == 1)
			{
				return $results->row(0)->id;

			}
			else
			{
				return false;
			}
		}

		//email chk
		public function check_email_exists($email)
		{
			$query = $this->db->get_where('users' , array('email' => $email));
			if(empty($query->row_array()))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}