<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_artistas($cadena)
    {
		if (strlen($cadena)<4) return "not-found";
	  	mysql_query("SET NAMES UTF8");
		mysql_query('SET character_set_results=latin1');
		//Aca busco todos los artistas con $cadena
		$query = $this->db->query("SELECT nombanpath, nomban, cantidad, hay_inter, cant_inter FROM artistas where nomban like '%$cadena%' COLLATE utf8_general_ci ORDER BY cantidad DESC LIMIT 50");
		if (!$query->num_rows()) return "not-found";	
		return $query->result();

	}
    function get_canciones($cadena)
    {		
		if (strlen($cadena)<4) return "not-found";
	  	mysql_query("SET NAMES UTF8");
		mysql_query('SET character_set_results=latin1');
		//Aca busco todos los artistas con $cadena
		$query = $this->db->query("SELECT nomban, nomcan, nombancanpath, cant_inter FROM letra where nomcan like ' $cadena' COLLATE utf8_general_ci ORDER BY cant_inter DESC LIMIT 50");
		if (!$query->num_rows()) {
			//si no encontro asi, busco mas profundamente
			$query2 = $this->db->query("SELECT nomban, nomcan, nombancanpath, cant_inter FROM letra where nomcan like '%$cadena%' COLLATE utf8_general_ci ORDER BY cant_inter DESC LIMIT 50");
			if (!$query2->num_rows()) {
				return "not-found";			
			}else{
				return $query2->result();
			}
		}
		return $query->result();
    }

}

?>