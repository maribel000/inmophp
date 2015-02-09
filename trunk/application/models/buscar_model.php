<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }



    function buscar($tipoop, $tipopro, $ciudad)
    {
        //aca hacemos la consulta a la base de datos

        $query = $this->db->get('avisos');
//        $query = $this->db->get_where('avisos', array('tipo_op' => $tipoop, 'id_tipo_inmueble' => ));

//		return "resultados de la busqueda";
        return $query;
    }


    function tipoop_nombre($id)
    {
        $this->db->select('nombre');
        $this->db->from('tipos_op');
        $this->db->where('id', $id);

        $query = $this->db->get();

        $rval = $query->row();
        return $rval->nombre;
    }

    function tipopro_descripcion($id)
    {
        $this->db->select('descripcion');
        $this->db->from('tipos_inmuebles');
        $this->db->where('id', $id);

        $query = $this->db->get();

        $rval = $query->row();
        return $rval->descripcion;
    }

}
?>
