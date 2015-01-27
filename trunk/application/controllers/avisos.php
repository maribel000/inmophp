<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avisos extends CI_Controller {

	 
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('ion_auth');	
		$datos["msj"] = "agregar";
	
		if ($this->ion_auth->logged_in()){
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		}else{
			$datos["menu"] = $this->load->view('menu_nu');
		}	
		
		$this->load->view('agregar', $datos);
	
	}
	
	
	public function agregar()
	{

		$this->load->library('ion_auth');	
		$this->load->library('form_validation');	
		$this->load->helper('url');
		$datos["msj"] = "agregar";
		//$this->load->view('agregar', $datos);
		
		
		$this->form_validation->set_rules('tipoop', 'Tipo de operacion', 'required');
		$this->form_validation->set_rules('tipoinm', 'Tipo de inmueble', 'required');
		$this->form_validation->set_rules('detalles', 'Detalles del inmueble', 'required');		
	
		if ($this->form_validation->run() == FALSE){
			if ($this->ion_auth->logged_in()){
				$datos['user'] = $this->ion_auth->user()->row();
				$data["menu"] = $this->load->view('menu_us', $datos, true);
			}else{
				$data["menu"] = $this->load->view('menu_nu');
			}			
			$this->load->view('agregar', $data);
		}else{
		
		
		    $tipoop = $this->input->post('tipoop');
			$tipoinm = $this->input->post('tipoinm');
			$provincia = $this->input->post('provincia');
			$ciudad = $this->input->post('ciudad');
			$barrio = $this->input->post('barrio');
			$direccion = $this->input->post('direccion');
			$ambientes = $this->input->post('ambientes');
			$dormitorios = $this->input->post('dormitorios');
			$banios = $this->input->post('banios');
			$metros2 = $this->input->post('metros2');
			$estado = $this->input->post('estado');
			$anio = $this->input->post('anio');
			$precio = $this->input->post('precio');
			$detalles = $this->input->post('detalles');

			$this->load->model('Avisos_model', '', TRUE); 
			$res = $this->Avisos_model->add_aviso($tipoop, $tipoinm, $provincia, $ciudad, $barrio, $direccion, $ambientes, $dormitorios, $banios, $metros2, $estado, $anio, $precio, $detalles); 

			if ($res) { $msj = "Aviso Agregado"; } else { $msj = "El aviso no pudo ser agregado :(";}
			$data = array('msj' => $msj);
			
			if ($this->ion_auth->logged_in()){
				$datos['user'] = $this->ion_auth->user()->row();
				$data["menu"] = $this->load->view('menu_us', $datos, true);
			}else{
				$data["menu"] = $this->load->view('menu_nu');
			}				
			$this->load->view('addaviso-ok', $data);			
		
		}			
	
	}

	public function editar($id)
	{
		$this->load->library('form_validation');		
		$this->load->library('ion_auth');			
	    $this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('tipoop', 'Tipo de operacion', 'required');
		$this->form_validation->set_rules('tipoinm', 'Tipo de inmueble', 'required');
		$this->form_validation->set_rules('detalles', 'Detalles del inmueble', 'required');				
		
		if ($this->form_validation->run() == FALSE){		
		
		$this->load->model('Avisos_model', '', TRUE); 		
		$todo = $this->Avisos_model->get_aviso($id); 	
		$todo = $todo[0];
		$datos = array(
						   'id' => $id,
						   'tipo_op' => $todo->tipo_op,
						   'tipo_inm' => $todo->tipo_inm,
						   'provincia' => $todo->provincia,
						   'ciudad' => $todo->ciudad,
						   'barrio' => $todo->barrio,
						   'direccion' => $todo->direccion,
						   'ambientes' => $todo->ambientes,
						   'dormitorios' => $todo->dormitorios,
						   'banios' => $todo->banios,
						   'metros2' => $todo->metros2,
						   'estado' => $todo->estado,
						   'anio' => $todo->anio,
						   'precio' => $todo->precio,
						   'detalles' => utf8_decode($todo->detalles),
						);
			if ($this->ion_auth->logged_in()){
				$data['user'] = $this->ion_auth->user()->row();
				$datos["menu"] = $this->load->view('menu_us', $data, true);
			}else{
				$datos["menu"] = $this->load->view('menu_nu');
			}				
			$this->load->view('editaviso', $datos);
			
		}else{
			//guardo

		    $tipoop = $this->input->post('tipoop');
			$tipoinm = $this->input->post('tipoinm');
			$provincia = $this->input->post('provincia');
			$ciudad = $this->input->post('ciudad');
			$barrio = $this->input->post('barrio');
			$direccion = $this->input->post('direccion');
			$ambientes = $this->input->post('ambientes');
			$dormitorios = $this->input->post('dormitorios');
			$banios = $this->input->post('banios');
			$metros2 = $this->input->post('metros2');
			$estado = $this->input->post('estado');
			$anio = $this->input->post('anio');
			$precio = $this->input->post('precio');
			$detalles = $this->input->post('detalles');

			$this->load->model('Avisos_model', '', TRUE); 
			$res = $this->Avisos_model->edit_aviso($id, $tipoop, $tipoinm, $provincia, $ciudad, $barrio, $direccion, $ambientes, $dormitorios, $banios, $metros2, $estado, $anio, $precio, $detalles); 

			if ($res) { $msj = "Aviso editado"; } else { $msj = "El aviso no pudo ser editado :(";}
			$data = array('msj' => $msj);
			if ($this->ion_auth->logged_in()){
				$dato['user'] = $this->ion_auth->user()->row();
				$data["menu"] = $this->load->view('menu_us', $dato, true);
			}else{
				$data["menu"] = $this->load->view('menu_nu');
			}				
			$this->load->view('editaviso-ok', $data);			
		}		
		
	}	
	
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('agregar', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('addaviso-ok', $data);
		}
	}		
	public function ver($id)
	{

	    $this->load->helper(array('form', 'url'));
		$this->load->library('ion_auth');	
		$this->load->model('Avisos_model', '', TRUE); 
		$todo = $this->Avisos_model->get_aviso($id); 	
		$todo = $todo[0];
		$datos = array('tipo_op' => $todo->tipo_op, 'tipo_inm' => $todo->tipo_inm, 'detalles' => $todo->detalles); 			
		if ($this->ion_auth->logged_in()){
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		}else{
			$datos["menu"] = $this->load->view('menu_nu');
		}			
		$this->load->view('veraviso', $datos);

		
	
	}	
	
}

/* End of file avisos.php */
/* Location: ./application/controllers/avisos.php */