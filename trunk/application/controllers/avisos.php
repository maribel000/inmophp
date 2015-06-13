<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avisos extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->library('ion_auth');
        $this->load->library('form_validation');

//		$datos["msj"] = "agregar";
	
		if ($this->ion_auth->logged_in()){
			$data['user'] = $this->ion_auth->user()->row();
			$datos["menu"] = $this->load->view('menu_us', $data, true);
		}else{
			$datos["menu"] = $this->load->view('menu_nu');
		}	
		
//		$this->load->view('agregar', $datos);
	}

	public function agregar()
	{
	    $this->load->library('ion_auth');
		if ($this->ion_auth->logged_in()){
			$datos['user'] = $this->ion_auth->user()->row();
			$data["menu"] = $this->load->view('menu_us', $datos, true);
		} else {
			$data["menu"] = $this->load->view('menu_nu');
		}		
		if (!$this->ion_auth->logged_in() || $this->ion_auth->in_group("clientes")) { //si no esta logueado, o si lo esta pero es cliente, no se le permite agregar
			$data["acceso"] = 0;
			$this->load->view('agregar', $data);
			return;
		}
		$data["acceso"] = 1;
        $this->load->helper('url');
        $this->load->library('form_validation');

		$datos["msj"] = "agregar";

        $this->load->model('Avisos_model', '', TRUE);

        $this->form_validation->set_rules('tipoop', 'Tipo de operacion', 'required');
		$this->form_validation->set_rules('tipoinm', 'Tipo de inmueble', 'required');
		$this->form_validation->set_rules('detalles', 'Detalles del inmueble', 'required');

		if ($this->form_validation->run() == FALSE){



            $rval = $this->Avisos_model->get_tipos_op();
            $data["tipos_op"] = $rval;

            $rval = $this->Avisos_model->get_tipos_inmuebles();
            $data["tipos_inmuebles"] = $rval;

			$this->load->view('agregar', $data);

		} else {

		    $tipoop = $this->input->post('tipoop');
			$tipoinm = $this->input->post('tipoinm');
			$idLocalidad = $this->input->post('idLocalidad');
            $idBarrio = null; //TODO: en algun momento habria que tomar el barrio por id
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
            $estado_aviso = 1; // es el estado del aviso pendiente
            $fecha = date('Y-m-d H:i:s', now());
			$userid = $datos['user']->id;

            $fotodesc = array();
//            $foto1 = $this->input->post('foto1');
            $fotodesc[1] = $this->input->post('foto1desc');
//            $foto2 = $this->input->post('foto2');
            $fotodesc[2] = $this->input->post('foto2desc');
//            $foto3 = $this->input->post('foto3');
            $fotodesc[3] = $this->input->post('foto3desc');


            $this->load->model('Avisos_model', '', TRUE);

			$res = $this->Avisos_model->add_aviso(
                $tipoop,
                $tipoinm,
                $idLocalidad,
                $idBarrio,
                $barrio,
                $direccion,
                $ambientes,
                $dormitorios,
                $banios,
                $metros2,
                $estado,
                $anio,
                $precio,
                $detalles,
                $estado_aviso,
                $fecha,
				$userid
            );

            /* inicio manejo de fotos */
            $config['upload_path'] = './uploads/fotos/';
//            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['allowed_types'] = 'jpg';
            $config['max_size']  = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';

            $this->load->library('upload', $config);

            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = '';
            $configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE;

            $configThumb['width'] = 140;
            $configThumb['height'] = 210;

            $this->load->library('image_lib');

            for($i = 1; $i < 4; $i++) {
                /* genero un filename "unico" */
                $config['file_name'] = 'foto_'.$res.'_'.uniqid(rand()).'_'.$i;
                $this->upload->initialize($config);

                $upload = $this->upload->do_upload('foto'.$i);
                /* fallo la carga */
                if($upload === FALSE) continue;
                $this->Avisos_model->add_aviso_foto(
                    $res,
                    $config['upload_path'].$config['file_name'].'.jpg',
                    $fotodesc[$i],
                    floor(1/$i)
                );

                /* obtengo info para hacer los thumbs */
                $data = $this->upload->data();

                $uploadedFiles[$i] = $data;
                /* creo los thumbs */
                if($data['is_image'] == 1) {
                    $configThumb['source_image'] = $data['full_path'];
                    $this->image_lib->initialize($configThumb);
                    $this->image_lib->resize();
                }
            }
            /* fin manejo de fotos */

            $base_url = base_url();

			if ($res) {

                $msj = <<<HTML
                    <div class="alert alert-success" role="alert">
                    <strong>¡Excelente!</strong> Su <a href="{$base_url}index.php/avisos/ver/$res" class="alert-link">aviso</a> ha sido agregado, pero a&uacute;n se encuentra pendiente de aprobación. Le informaremos cuando &eacute;ste haya sido aprobado.
                    </div>
HTML;
            } else {
                $msj = <<<HTML
                    <div class="alert alert-danger" role="alert">
                    <strong>¡Upss..!</strong> Su aviso no pudo ser agregado.
                    </div>
HTML;
            }

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

    function get_localidades(){
        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->model('Avisos_model', '', TRUE);

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Avisos_model->get_localidades($q);
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
		$datos = $this->Avisos_model->get_aviso($id); 	
		//print_r($datos);
		//return;
		//$todo = $todo[0];
		/*
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
			*/
			//$datos['ciudad'] = "ros";
			if ($this->ion_auth->logged_in()){
				$data['user'] = $this->ion_auth->user()->row();
				$datos["menu"] = $this->load->view('menu_us', $data, true);
			}else{
				$datos["menu"] = $this->load->view('menu_nu');
			}				
			$this->load->view('editaviso', $datos);
			
		} else {
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

    public function snd_mail($id, $email, $nombre)
	{
		echo "ok. ".$id.$email.$nombre;
	}	
	
    public function check_fav($idaviso, $iduser)
	{
		$date = date("Y-m-d H:i:s");
		$this->load->library('ion_auth');
        if ($this->ion_auth->logged_in()){
            $idus = $this->ion_auth->user()->row()->id;
			if ($iduser != $idus) { //si los id de usuarios son distintos, es un hack
				echo "error";
				return;
			}
		}else{ // si el usuario no esta logueado, no se puede hacer la operacion
			echo "error";
			return;
		}
		$this->load->model('Avisos_model', '', TRUE);
		$res = $this->Avisos_model->make_fav($idaviso, $iduser, $date);		
		echo $res;
	}		
	
    public function show_data($id)
	{
        $this->load->model('Avisos_model', '', TRUE);	
		$date = date("Y-m-d H:i:s");	
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->Avisos_model->registrar_verdatos($id, $ip, $date);
	}	
	public function new_alert($userid, $tipoinm, $tipoop, $idlocal, $pmin, $pmax)
	{
        $this->load->model('Avisos_model', '', TRUE);	
		echo $this->Avisos_model->new_alert($userid, $tipoinm, $tipoop, $idlocal, $pmin, $pmax);
	}	
    public function ver($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('ion_auth');

        $this->load->model('Avisos_model', '', TRUE);
		$date = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->Avisos_model->registrar_visita($id, $ip, $date);
        $datos['aviso'] = $this->Avisos_model->get_aviso($id);

        if ($this->ion_auth->logged_in()){
            $datos['user'] = $this->ion_auth->user()->row();		
			$datos['user_id'] = $datos['user']->id;
			$datos['is_fav'] = $this->Avisos_model->is_fav($id, $datos['user']->id);
            $datos['menu'] = $this->load->view('menu_us', $datos, true);
        } else {
			$datos['is_fav'] = 0;
			$datos['user_id'] = 0;
            $datos['menu'] = $this->load->view('menu_nu');
        }
			
        $this->load->view('veraviso', $datos);
    }

    public function verimprimir($id)
    {
        $this->load->helper(array('form', 'url'));


        $this->load->model('Avisos_model', '', TRUE);

        $datos['aviso'] = $this->Avisos_model->get_aviso($id);


        $this->load->view('verimprimir', $datos);
    }	
    public function listarpendientes()
    {
        $this->load->helper('url');
        $this->load->library('ion_auth');

		
        if ($this->ion_auth->logged_in()) {
			if ($this->ion_auth->in_group("admin")) {
				$data['is_logged'] = 1;
			}else{
				echo "no tiene permisos para acceder a esta pagina";
				return;
			}			
        }else{
			echo "no tiene permisos para acceder a esta pagina";
			return;
		}		

        $this->load->library('form_validation');
        $this->load->library('pagination');
		
        $datos["msj"] = "listar pendientes";

        $this->load->model('Avisos_model', '', TRUE);
        $this->load->model('Buscar_model', '', TRUE);
		
		$datos["total_avisos"] = $this->Avisos_model->listar_avisos_pendientes_total();

        $datos["tipoops"] = $this->Buscar_model->tipoops();
        $datos["tipoprops"] = $this->Buscar_model->tipoprops();
        $datos["localidades"] = $this->Buscar_model->localidades();
        $datos["usuarios"] = $this->Buscar_model->usuarios();

        /* URL a la que se desea agregar la paginación*/
        $config['base_url'] = base_url().'/';
        $config['prefix'] =  'avisos/listarpendientes/';
        if (count($_GET) > 0) $config['suffix'] =  '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = base_url().'/avisos/listarpendientes?'.http_build_query($_GET);

        /*Obtiene el total de registros a paginar */
        $config['total_rows'] = $datos['total_rows'] = $this->Avisos_model->listar_avisos_pendientes_total();

        /*Obtiene el numero de registros a mostrar por pagina */
        $config['per_page'] = 10;

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
        $datos['avisos'] = $this->Avisos_model->listar_avisos_pendientes($config['per_page'], $page);

        $this->load->view('listado-avisos-pendientes', $datos);
    }
	
 public function listarpublicados()
    {
        $this->load->helper('url');
        $this->load->library('ion_auth');

		
        if ($this->ion_auth->logged_in()) {
			if ($this->ion_auth->in_group("admin")) {
				$data['is_logged'] = 1;
			}else{
				echo "no tiene permisos para acceder a esta pagina";
				return;
			}			
        }else{
			echo "no tiene permisos para acceder a esta pagina";
			return;
		}		

        $this->load->library('form_validation');
        $this->load->library('pagination');
		
        $datos["msj"] = "listar publicados";

        $this->load->model('Avisos_model', '', TRUE);
        $this->load->model('Buscar_model', '', TRUE);
		
		
		$datos["total_avisos"] = $this->Avisos_model->listar_avisos_total();		

        $datos["tipoops"] = $this->Buscar_model->tipoops();
        $datos["tipoprops"] = $this->Buscar_model->tipoprops();
        $datos["localidades"] = $this->Buscar_model->localidades();
        $datos["usuarios"] = $this->Buscar_model->usuarios();

        /* URL a la que se desea agregar la paginación*/
        $config['base_url'] = base_url().'/';
        $config['prefix'] =  'avisos/listarpublicados/';
        if (count($_GET) > 0) $config['suffix'] =  '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = base_url().'/avisos/listarpublicados?'.http_build_query($_GET);

        /*Obtiene el total de registros a paginar */
        $config['total_rows'] = $datos['total_rows'] = $this->Avisos_model->listar_avisos_total();

        /*Obtiene el numero de registros a mostrar por pagina */
        $config['per_page'] = 10;

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
        $datos['avisos'] = $this->Avisos_model->listar_avisos($config['per_page'], $page);

        $this->load->view('listado-avisos-publicados', $datos);
    }	
	
    public function borrar($id)
	{
        $this->load->model('Avisos_model', '', TRUE);	
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in()){
			$user = $this->ion_auth->user()->row();
			if($this->Avisos_model->chequear_prop($id, $user->id) || $this->ion_auth->in_group("admin")){//chequeo que el usuario actual sea el propietario del aviso o el usuario actual es el admin
				//borro el aviso
				$this->Avisos_model->borrar_aviso($id);
			}
		}
	}	

    public function publicar_aviso($id)
	{
        $this->load->model('Avisos_model', '', TRUE);	
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in()){
			$user = $this->ion_auth->user()->row();
			if($this->ion_auth->in_group("admin")){//solo el admin puede hacer esta operacion
				//publico el aviso
				$this->Avisos_model->publicar_aviso($id);
			}
		}
	}	
	
}

/* End of file avisos.php */
/* Location: ./application/controllers/avisos.php */