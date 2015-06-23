<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	
	public function Email() {
		parent::__construct();
	}
	
	public function index()	{
		$this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->model('Create_user_model', '', TRUE);
	}
		
	public function send() {
		$id_created = 0;
		
		$new_user = array(
			'username'			=> $this->input->post('first_name'),
			'password' 			=> $this->input->post('password'),
			//'tipo' 				=> ($this->input->post('tipo')==3)?"Inmobiliaria":($this->input->post('tipo')==4)?"Particular":"Cliente",
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'company' 			=> $this->input->post('company'),
			'email' 			=> $this->input->post('email'),
			'phone' 			=> $this->input->post('phone'),
			//'password_confirm' 	=> $this->input->post('password_confirm'),
			'active'			=> 0
		);
		
		if($this->Create_user_model->userExist($new_user) == 0) {
			$id_created = $this->Create_user_model->add_user($new_user);
		}	
		
		if($id_created != 0) {
			// envia el mail y carga pagina
			$this->load->view('menu_nu');
		}
		// carga pagina de error
		$this->load->view('menu_nu');
	}	
}
	