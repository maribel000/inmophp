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

	$this->load->helper('url');
	$this->load->library('ion_auth');
	$datos["ultimos_avisos"] = $this->traer_ultimos_avisos();
	$datos["ultimas_inmobi"] = $this->traer_ultimas_inmobi();
	if ($this->ion_auth->logged_in()){
		$data['user'] = $this->ion_auth->user()->row();
		$datos["menu"] = $this->load->view('menu_us', $data, true);
	}else{
		$datos["menu"] = $this->load->view('menu_nu');
	}

	$this->load->view('home', $datos);
	
	}

	function traer_ultimos_avisos() {
		$this->load->model('avisos_model', '', TRUE);
		$ultimosavisos = $this->avisos_model->get_ult_avisos();
		$html = '';
		foreach ($ultimosavisos as $aviso) {
			$html = '
				<div class="media">
				  <a class="media-left" href="#">
					<img src="http://localhost/redinmo/theme/imgavisos/'.$aviso['foto'].'" height="125" width="125" class="img-rounded" alt="Rounded Image">
				  </a>
				  <div class="media-body">
					<h4 class="media-heading">'.$aviso['titulo'].'</h4>
					'.$aviso['texto'].'
				  </div>
				</div>
			'.$html;
		}

		return $html;
	}

	function traer_ultimas_inmobi() {
		$this->load->model('avisos_model', '', TRUE);
		$ultimasinmos = $this->avisos_model->get_ult_inmobi();
		return $ultimasinmos;
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */