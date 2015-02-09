<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {

	 
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->model('Buscar_model', '', TRUE); 
		if (!empty(@$_REQUEST["tipoop"])) { //si hay busqueda
			$datos["busqueda"] = 1;
			$datos["tipoop"] = @$_REQUEST["tipoop"];
			$datos["tipopro"] = @$_REQUEST["tipopro"];
			$datos["ciudad"] = @$_REQUEST["ciudad"];

			$res = $this->Buscar_model->buscar($datos["tipoop"], $datos["tipopro"], $datos["ciudad"]);
			$datos["avisos"] = $res;
			$res = $this->Buscar_model->tipoop_nombre($datos["tipoop"]);
			$datos["tipoop_nombre"] = $res;
			$res = $this->Buscar_model->tipopro_descripcion($datos["tipopro"]);
			$datos["tipopro_descripcion"] = $res;
		}else{
			$datos["busqueda"] = 0;
		}
		
		if ($this->ion_auth->logged_in()){
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		}else{
			$datos["menu"] = $this->load->view('menu_nu');
		}		

		$this->load->view('buscar', $datos);
	
	}
		
	
}

/* End of file avisos.php */
/* Location: ./application/controllers/avisos.php */