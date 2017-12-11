<?php
	class Note extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}
		public function index()
		{
			
			$this->load->view('templates/header');
			$this->load->view('note/index');
			$this->load->view('templates/footer');
		}

			public function get_note()
		{
			$data = $this->note_model->get_note();
			echo json_encode($data);
		}

		public function add_note()
		{
			$result = $this->note_model->add_note();
			$msg['Sucessfully'] = FALSE;
			if($result)
			{
				$msg['Successfully'] = TRUE;
			}
			echo json_encode($msg);
		}

		public function delete_note()
		{
			$result = $this->note_model->delete_note();
			$msg['Sucessfully'] = FALSE;
			if($result)
			{
				$msg['Successfully'] = TRUE;
			}
			echo json_encode($msg);
		}

		public function edit_note()
		{
			//Check login
			 if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$result = $this->note_model->edit_note();

			 $msg['Sucessfully'] = FALSE;
			if($result)
			{
				$msg['Successfully'] = TRUE;
			}
			
			echo json_encode($msg);
		}
	
	}
?>