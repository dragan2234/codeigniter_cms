<?php 


/**
 * 
 */
 class User extends Admin_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}


 	function index(){
 		// fetch all users
 		$this->data['users'] = $this->user_m->get();
 		//fetch a iser or set a new one
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main',$this->data);
 	}
 	function edit($id = NULL){
 		
 		if ($id) {
 		$this->data['user'] = $this->user_m->get($id);
 		count($this->data['user']) || $this->data['errors'][] = 'User counld not be found';
 	}
 	else {
 		$this->data['user'] = $this->user_m->get_new();
 	}
 		$rules = $this->user_m->rules_admin;
 		$id || $rules['password']['rules'] .= '|required';
 		$this->form_validation->set_rules($rules);
 		if ($this->form_validation->run() == TRUE) {

 			$data = $this->user_m->array_from_post(array('name','email','password'));
 			if(!empty($data['password'])) {
			    $data['password'] = $this->user_m->hash($data['password']);
			} else {
			    // We don't save an empty password
			    unset($data['password']);
			}
 			$this->user_m->save($data,$id);
 			redirect('admin/user');
 			}
 		
 		$this->data['subview'] = 'admin/user/edit';
 		$this->load->view('admin/_layout_main', $this->data);

 	}
 	function delete($id){
 		$this->user_m->delete($id);
 		redirect('admin/user');

 	}



 	function login(){
 		$dashboard = 'admin/dashboard';
 		$this->user_m->loggedin() == FALSE || redirect ($dashboard);
 		$rules = $this->user_m->rules;
 		$this->form_validation->set_rules($rules);
 		if ($this->form_validation->run() == TRUE) {
 			// pravilna forma
 			if ($this->user_m->login() == TRUE ) {

 				redirect($dashboard);
 			}
 			else {
 				$this->session->set_flashdata('error', ' NIJE DOBAR EMAIL PAS KOMB');
 				redirect('admin/user/login','refresh');
 			}
 		}
 		$this->data['subview'] = 'admin/user/login';
 		$this->load->view('admin/_layout_modal',$this->data);
 	}


 	function logout() {
 		$this->user_m->logout();
 		redirect('admin/user/login');
 	}
 	function _unique_email($str){
 		$id = $this->uri->segment(4);
 		$this->db->where('email',$this->input->post('email'));
 		
 		!$id || $this->db->where('id !=', $id);
 		$user = $this->user_m->get();
 		if (count($user)) {
 			$this->form_validation->set_message('_unique_email', '%s should be unique');
 			return FALSE;
 		}

 		return TRUE;
 	}
 }



