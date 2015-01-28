<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		
	
    function buscar($q)
    {
		//aca hacemos la consulta a la base de datos
		return "resultados de la busqueda";
    }	
	
}
?>
