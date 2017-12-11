<?php
	class Pages extends CI_Controller{
		public function view($page = 'index'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			 if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('templates/body');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
		
	}
?>