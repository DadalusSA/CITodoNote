<?php
	class Todolist extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}
		public function index()
		{
			$this->load->view('templates/header');
			$this->load->view('todolist/index');
			$this->load->view('templates/footer');
		}

		public function get_todolist()
		{
			$data = $this->todolist_model->get_todolist();
			echo json_encode($data);
		}

		public function add_todolist()
		{
			$result = $this->todolist_model->add_todolist();
			$msg['Sucessfully'] = FALSE;
			if($result)
			{
				$msg['Successfully'] = TRUE;
			}
			echo json_encode($msg);
		}

		public function delete_todolist()
		{
			$result = $this->todolist_model->delete_todolist();
			$msg['Sucessfully'] = FALSE;
			if($result)
			{
				$msg['Successfully'] = TRUE;
			}
			echo json_encode($msg);
		}

		public function update_checklist()
		{
			//Check login
			 if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$this->todolist_model->update_checklist();
		}

		public function update_checklistcancel()
		{
			//Check login
			 if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$this->todolist_model->update_checklistcancel();
		}
	}
?>