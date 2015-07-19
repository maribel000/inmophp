<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {

	public function Buscar() {
		parent::__construct();
	}

    public function index()
    {
        $this->load->helper('url');
        $this->load->library('ion_auth');

        $datos["msj"] = "buscar";

        $this->load->model('Buscar_model', '', TRUE);

        if ($this->ion_auth->logged_in()) {
            $data['user'] = $this->ion_auth->user()->row();
            $datos["menu"] = $this->load->view('menu_us', $data, true);
        } else {
            $datos["menu"] = $this->load->view('menu_nu');
        }

        $datos["busqueda"] = 0;

        $datos["combo_tipoop"] = $this->getTipoOperData(0);
        $datos["combo_tipopro"] = $this->getTipoPropsData(0);
        $datos["combo_prov"] = $this->getProvinciaData(0);
        $datos["localidad"] = "";
        $datos["idLocalidad"] = "";

        $this->load->view('buscar', $datos);

    }

    public function s()
    {
        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('pagination');

        $datos["msj"] = "buscar";

        $this->load->model('Buscar_model', '', TRUE);

        if ($this->ion_auth->logged_in()) {
            $data['user'] = $this->ion_auth->user()->row();
            $datos["menu"] = $this->load->view('menu_us', $data, true);
        } else {
            $datos["menu"] = $this->load->view('menu_nu');
        }

        $this->form_validation->set_rules('tipoop', 'Tipo de operacion', 'required');
        $this->form_validation->set_rules('tipopro', 'Tipo de propiedad', 'required');

        $datos["busqueda"] = 1;
        $datos["tipoop"] = $this->input->get('tipoop',true);
        $datos["tipopro"] = $this->input->get('tipopro',true);
        $datos["localidad"] = $this->input->get('localidad',true);
        $datos["idLocalidad"] = $this->input->get('idLocalidad',true);

        $datos["combo_tipoop"] = $this->getTipoOperData($datos["tipoop"]);
        $datos["combo_tipopro"] = $this->getTipoPropsData($datos["tipopro"]);

        $datos["tipoops"] = $this->Buscar_model->tipoops();
        $datos["tipoprops"] = $this->Buscar_model->tipoprops();
        $datos["localidades"] = $this->Buscar_model->localidades();


        /* URL a la que se desea agregar la paginación*/
        $config['base_url'] = base_url().'/';
        $config['prefix'] =  'buscar/s/';
        if (count($_GET) > 0) $config['suffix'] =  '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = base_url().'/buscar/s?'.http_build_query($_GET);

        /*Obtiene el total de registros a paginar */
        $config['total_rows'] = $datos['total_rows'] = $this->Buscar_model->buscar_avisos_total($datos["tipoop"], $datos["tipopro"], $datos["idLocalidad"]);

        /*Obtiene el numero de registros a mostrar por pagina */
        $config['per_page'] = 5;

        /*Indica que segmento de la URL tiene la paginación, por default es 3*/
        $config['uri_segment'] = 3;

        /*Se personaliza la paginación para que se adapte a bootstrap*/
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        /* Se inicializa la paginacion*/
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        /* Se obtienen los registros a mostrar*/
        $datos['avisos'] = $this->Buscar_model->buscar_avisos_2($datos["tipoop"], $datos["tipopro"], $datos["idLocalidad"], $config['per_page'], $page);
		
		if ($this->ion_auth->logged_in()) {
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		} else {
			$datos["menu"] = $this->load->view('menu_nu');
		}		

        $this->load->view('buscar', $datos);

    }
	
	public function getProvinciaData($selected) {
		$this->load->model('Buscar_model', '', TRUE);
		$provincia = $this->Buscar_model->provincias();
	
		$html = '<option value="0">Todas</option>';
	
		foreach($provincia->result () as $prov) {			
			if($selected == $prov->id) {
				$html = $html.'<option value="'.$prov->id.'" selected>'.$prov->nombre.'</option>';
			} else {
				$html = $html.'<option value="'.$prov->id.'">'.$prov->nombre.'</option>';
			}
		}
	
		return $html;
	}
	
	function getTipoPropsData($selected) {
		$this->load->model('Buscar_model', '', TRUE);
		$tipoProps = $this->Buscar_model->tipoprops();
	
		$html = '<option value="0">Todas</option>';
	
		foreach($tipoProps->result () as $prop) {
			if($selected == $prop->id) {
				$html = $html.'<option value="'.$prop->id.'" selected>'.$prop->descripcion.'</option>';
			} else {
				$html = $html.'<option value="'.$prop->id.'">'.$prop->descripcion.'</option>';
			}
		}
	
		return $html;
	}
	
	function getTipoOperData($selected) {
		$this->load->model('Buscar_model', '', TRUE);
		$tipoOper = $this->Buscar_model->tipoops();
	
		$html = '<option value="0">Todos</option>';
	
		foreach ($tipoOper->result () as $oper) {
			if($selected == $oper->id) {
				$html = $html.'<option value="'.$oper->id.'" selected>'.$oper->nombre.'</option>';
			} else {
				$html = $html.'<option value="'.$oper->id.'">'.$oper->nombre.'</option>';
			}
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