<?php 
	class Todolist_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_todolist()
		{
			$query = $this->db->get_where('todolist', array('user_id' => $this->session->userdata('userid')));
			return $query->result_array();
		}

		public function add_todolist()
		{
			$data = array('todo_list' => $this->input->post('getTodo'),
				'user_id' => $this->session->userdata('userid'));

		
			return $this->db->insert('todolist', $data);
		}

		public function delete_todolist()
		{
			$gid = $this->input->post('gid');
			$this->db->where('id', $gid);
			$this->db->delete('todolist');
			return true;
		}

		public function update_checklist()
		{
			$gid = $this->input->post('gid');
			$this->db->set('checked', '1');
			$this->db->where('id', $gid);
			return $this->db->update('todolist');
		}

		public function update_checklistcancel()
		{
			$gid = $this->input->post('gid');
			$this->db->set('checked', '0');
			$this->db->where('id', $gid);
			return $this->db->update('todolist');
		}
	}