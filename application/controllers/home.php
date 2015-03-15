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
	 

	 
	public function index()	{

		$this->load->helper('url');
		$this->load->library('ion_auth');
		
		$datos["ultimos_avisos"] = $this->traer_ultimos_avisos();
        $datos["ultimas_inmobi"] = $this->traer_ultimas_inmobi();
        $datos["localidades_rank"] = $this->traer_localidades_rank();
		
		$datos["combo_tipoop"]   = $this->getTipoOperData();
		$datos["combo_tipopro"]  = $this->getTipoPropsData();
		
		if ($this->ion_auth->logged_in()) {
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		} else {
			$datos["menu"] = $this->load->view('menu_nu');
		}
	
		$this->load->view('home', $datos);
	
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

	function traer_ultimos_avisos() {

		$this->load->model('avisos_model', '', TRUE);

		$ultimosavisos = $this->avisos_model->get_ult_avisos();
		$html = '';
		foreach ($ultimosavisos as $aviso) {
			$html = $html.'
				<div class="media">
                  <a class="media-left" href="'.base_url().'avisos/ver/'.$aviso['id'].'">
                    <img src="'.$aviso['foto'].'" height="125" width="125" class="img-rounded" alt="Rounded Image" />
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">'.$aviso['titulo'].'</h4>
                    '.$aviso['texto'].'
                  </div>
				</div>';
		}

		return $html;
	}

    function traer_ultimas_inmobi() {
        $this->load->model('avisos_model', '', TRUE);

        return $this->avisos_model->get_ult_inmobi();
    }

    function traer_localidades_rank() {
        $this->load->model('avisos_model', '', TRUE);

        return $this->avisos_model->get_localidades_rank();
    }
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */