<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/home/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 

	 
	public function index()
	{
	/*
        $this->load->config('tank_auth', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		

		$dataenc["titulo"] = "Significados de Letras de Canciones | OpinaLetras.com";
		$dataenc["description"] = "Significados, Opiniones, Interpretaciones y Analisis de Letras de Canciones";
		$dataenc["keywords"] = "significados, letras, analisis, opiniones, interpretaciones, letras de canciones";		
		$datos["encabezado"] = $this->load->view('base-enc', $dataenc, true);
		
		$datafot["footer"] = "<center>-</center>";
		$datos["footer"] = $this->load->view('base-footer', $datafot, true);
		
		$this->load->model('Interpretacion_model', '', TRUE); 
		$ultimas6 = $this->Interpretacion_model->get_ultimas6(); 
		$datos["ult"] = $ultimas6;
		
		$this->load->view('home', $datos);
	*/
	$this->load->helper('url');
	$datos["msj"] = "hola mundo";
	$this->load->view('home', $datos);
	
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */