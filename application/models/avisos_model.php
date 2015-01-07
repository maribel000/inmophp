<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avisos_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		
	
    function add_aviso($tipoop, $tipoinm, $provincia, $ciudad, $barrio, $direccion, $ambientes, $dormitorios, $banios, $metros2, $estado, $anio, $precio, $detalles)
    {
			$data = array(
						   'tipo_op' => $tipoop,
						   'tipo_inm' => $tipoinm,
						   'provincia' => $provincia,
						   'ciudad' => $ciudad,
						   'barrio' => $barrio,
						   'direccion' => $direccion,
						   'ambientes' => $ambientes,
						   'dormitorios' => $dormitorios,
						   'banios' => $banios,
						   'metros2' => $metros2,
						   'estado' => $estado,
						   'anio' => $anio,
						   'precio' => $precio,
						   'detalles' => utf8_decode($detalles),
						);

			$this->db->insert('avisos', $data); 
			
			return $this->db->insert_id();
    }	
	
    function edit_aviso($id, $tipoop, $tipoinm, $provincia, $ciudad, $barrio, $direccion, $ambientes, $dormitorios, $banios, $metros2, $estado, $anio, $precio, $detalles)
    {
			$data = array(
						   'tipo_op' => $tipoop,
						   'tipo_inm' => $tipoinm,
						   'provincia' => $provincia,
						   'ciudad' => $ciudad,
						   'barrio' => $barrio,
						   'direccion' => $direccion,
						   'ambientes' => $ambientes,
						   'dormitorios' => $dormitorios,
						   'banios' => $banios,
						   'metros2' => $metros2,
						   'estado' => $estado,
						   'anio' => $anio,
						   'precio' => $precio,
						   'detalles' => utf8_decode($detalles),
						);

			$this->db->where('id', $id);
			$this->db->limit(1);
			$this->db->update('avisos', $data); 
			
			return true; //si llega aca, esta todo ok
    }	
	
    function get_aviso($id)
    {
			$sql_in = "SELECT * FROM `avisos` WHERE `id` = $id LIMIT 1";
			$query = $this->db->query($sql_in);
			return $query->result();	
    }	
	
}
?>
