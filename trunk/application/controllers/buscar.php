<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {

	public function Buscar() {
		parent::__construct();
	}
	 
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->model('Buscar_model', '', TRUE); 
		
		$datos["busqueda"] = 1;
		$datos["tipoop"] = @$_REQUEST["tipoop"];
		$datos["tipopro"] = @$_REQUEST["tipopro"];
		$datos["localidad"] = @$_REQUEST["localidades"];
		$datos["provincia"] = @$_REQUEST["provincia"];
		
		$datos["combo_tipoop"]   = $this->getTipoOperData();
		$datos["combo_tipopro"]  = $this->getTipoPropsData();
		
	 	$res = $this->Buscar_model->buscar_avisos($datos["tipoop"],$datos["tipopro"],$datos["localidad"]);
		$datos["avisos"] = $res;
        $res = $this->Buscar_model->avisos_fotos_default($res);
        $datos["avisos_fotos"] = $res;
		$res = $this->Buscar_model->tipoops();
		$datos["tipoops"] = $res;
		$res = $this->Buscar_model->tipoprops();
		$datos["tipoprops"] = $res;
		$res = $this->Buscar_model->localidades();
		$datos["localidades"] = $res;
		
		if ($this->ion_auth->logged_in()){
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		}else{
			$datos["menu"] = $this->load->view('menu_nu');
		}		
		
		$this->load->view('buscar', $datos);
	
	}
	
	function getTipoPropsData() {
		$this->load->model('Buscar_model', '', TRUE);
		$tipoProps = $this->Buscar_model->tipoprops();
	
		$html = '<option value="0">Todas</option>';
	
		foreach($tipoProps->result () as $prop) {
			$html = $html.'<option value="'.$prop->id.'">'.$prop->descripcion.'</option>';
		}
	
		return $html;
	}
	
	function getTipoOperData() {
		$this->load->model('Buscar_model', '', TRUE);
		$tipoOper = $this->Buscar_model->tipoops();
	
		$html = '<option value="0">Todos</option>';
	
		foreach ($tipoOper->result () as $oper) {
			$html = $html.'<option value="'.$oper->id.'">'.$oper->nombre.'</option>';
		}
	
		return $html;
	}

	function get_localidades(){
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->model('Buscar_model', '', TRUE);
				
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->Buscar_model->get_localidad($q);
		}
	}
		
	
}

/* End of file avisos.php */
/* Location: ./application/controllers/avisos.php */