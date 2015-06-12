<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
        $this->load->config('tank_auth', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('tank_auth');
		
		$cadena = $this->input->post('buscar');	
		
		$this->load->model('Buscar_model', '', TRUE); 
		$canciones = $this->Buscar_model->get_canciones($cadena); 
		$artista = $this->Buscar_model->get_artistas($cadena); 
		$datos = array('artista' => $artista, 'canciones' => $canciones); 
		
		$dataenc["titulo"] = "Buscar Opiniones | OpinaLetras.com";		
		$dataenc["description"] = "Buscar Significados, Opiniones, Interpretaciones y Analisis de la Letra de Cancion";
		$dataenc["keywords"] = "significado, opiniones, analisis, interpretaciones, letras";	
		$datos["encabezado"] = $this->load->view('base-enc', $dataenc, true);
		
		$datafot["footer"] = "<center>-</center>";
		$datos["footer"] = $this->load->view('base-footer', $datafot, true);
		
		$this->load->view('buscar', $datos);		
		
	}
	


	

}

