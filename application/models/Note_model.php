<?php 
	class Note_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_note()
		{
			$query = $this->db->get_where('note', array('user_id' => $this->session->userdata('userid')));
			return $query->result_array();
		}

		public function add_note()
		{
			$data = array('title' => $this->input->post('getTitle'),
				'description' => $this->input->post('getDescription'),
				'user_id' => $this->session->userdata('userid'));

		
			return $this->db->insert('note', $data);
		}

		public function delete_note()
		{
			$gid = $this->input->post('gid');
			$this->db->where('id', $gid);
			$this->db->delete('note');
			return true;
		}

		public function edit_note()
		{
			$data =array(
				'title' => $this->input->post('getTitle'),
				'description' => $this->input->post('getDescription'),
				'id' => $this->input->post('getId')
			);
			$this->db->set($data);
			$this->db->where('id', $this->input->post('getId'));
			return $this->db->update('note');
		}
	}