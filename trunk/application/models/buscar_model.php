<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function buscar($tipoop, $tipopro, $localidad)
    {
        $query = $this->db->get('avisos');
//        $query = $this->db->get_where('avisos', array('tipo_op' => $tipoop, 'id_tipo_inmueble' => ));

        return $query;
    }

    function avisos_fotos_default($avisos)
    {
        $this->db->select('id_aviso, url, descripcion');
        $this->db->from('aviso_fotos');

        foreach ($avisos as $aviso) {
            log_message('error', '$aviso');
            /*$where = "(id_aviso = '$aviso->id' AND default = 1)";
            $this->db->or_where($where);*/
        }

        $query = $this->db->get();

        return $query;
    }

    function tipoops()
    {
        $rval= $this->db->get('tipos_op');

        return $rval;
    }

    function tipoprops()
    {
        $rval= $this->db->get('tipos_inmuebles');

        return $rval;
    }

    function localidades()
    {
        $rval= $this->db->get('localidades');

        return $rval;
    }

}
?>
