<?php 

/**
* 
*/
class User_M extends MY_Model
{
	
	protected $_table_name = 'users';
	protected $_order_by = 'name';
	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	public $rules_admin = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email'
		), 
		'name' => array(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'trim|required'
		),
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
		)
	);



		function login(){
			$user = $this->get_by(array('email' => $this->input->post('email'),
					'password' => $this->hash($this->input->post('password')),




			 	), TRUE);




			if (count($user)) {

				$data = array(
					'name' => $user->name,
					'email' => $user->email,
					'id' => $user->id,
					'loggedin' => TRUE,

					);

				$this->session->set_userdata($data);
			}
	}
		function logout(){
			$this->session->sess_destroy();
	}
		function loggedin(){
			return (bool) $this->session->userdata('loggedin');
	}


		function get_new(){
			$user = new stdClass();
			$user->name = '';
			$user->email = '';
			$user->password = '';
			return $user;

		}
		function hash($string){
			return hash('sha512',$string . config_item('encryption_key'));

	}
	

}