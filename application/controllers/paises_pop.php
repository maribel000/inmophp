<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paises_pop extends CI_Controller {

	 
	/*public function index()
	{
	$this->load->helper('url');
	$datos["msj"] = "agregar";
	$this->load->view('agregar', $datos);

	}*/

	public function index()
	{
		$this->load->helper('url');

		$this->load->model('paises_pop_model');

		$data['result'] = $this->paises_pop_model->get_paises();
    	$data['page_title'] = "RedInmo - Paises";

		$this->load->view('paises_pop_view'/*,$data*/);
	}
	
	
/*	public function agregar()
	{


		$this->load->library('form_validation');	
		$this->load->helper('url');
		$datos["msj"] = "agregar";
		//$this->load->view('agregar', $datos);
		
		
		$this->form_validation->set_rules('tipoop', 'Tipo de operacion', 'required');
		$this->form_validation->set_rules('tipoinm', 'Tipo de inmueble', 'required');
		$this->form_validation->set_rules('detalles', 'Detalles del inmueble', 'required');		
	
		if ($this->form_validation->run() == FALSE){
			$this->load->view('agregar');
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
			$this->load->view('addaviso-ok', $data);			
		
		}			
	
	}*/

/*	public function editar($id)
	{
		$this->load->library('form_validation');		
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
			$this->load->view('editaviso-ok', $data);			
		}		
		
	}	*/
	
	/*function do_upload()
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
	}*/

/*	public function ver($id)
	{
	    $this->load->helper(array('form', 'url'));
		$this->load->model('Avisos_model', '', TRUE); 
		$todo = $this->Avisos_model->get_aviso($id); 	
		$todo = $todo[0];
		$datos = array('tipo_op' => $todo->tipo_op, 'tipo_inm' => $todo->tipo_inm, 'detalles' => $todo->detalles); 			
		$this->load->view('veraviso', $datos);
	}*/
	
}

/* End of file avisos.php */
/* Location: ./application/controllers/avisos.php */