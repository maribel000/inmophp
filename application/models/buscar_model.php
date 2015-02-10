<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_id_localidad($localidad, $provincia)
    {
        $id_provincia = $this->get_id_provincia($provincia);

        $this->db->select('id');
        $this->db->from('localidades');
        $this->db->like('nombre', $localidad);
        $this->db->like('id_provincia', $id_provincia);

        $query = $this->db->get();

        $rval = $query->first_row()->id;

        return $rval;
    }


    function get_id_provincia($provincia)
    {
        $this->db->select('id');
        $this->db->from('provincias');
        $this->db->like('nombre', $provincia);

        $query = $this->db->get();

        $rval = $query->first_row()->id;

        return $rval;
    }

    function buscar($tipoop, $tipopro, $localidad, $provincia)
    {
        if ($localidad == "*") {
            $rval = $this->db->get('avisos');
        } else {
            $id_localidad = $this->get_id_localidad($localidad, $provincia);

            $rval = $this->db->get_where('avisos', array('id_tipo_op' => $tipoop, 'id_tipo_inmueble' => $tipopro, 'id_localidad' => $id_localidad));
        }

        return $rval;
    }

    function avisos_fotos_default($avisos)
    {
        $this->db->select('id_aviso, url, descripcion');
        $this->db->from('aviso_fotos');

        foreach ($avisos->result() as $aviso) {
            $where = "(`id_aviso` = '$aviso->id' AND `default` = 1)";
            $this->db->or_where($where);
        }

        $rval = $this->db->get();

        return $rval;
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

    function get_localidad($q){
        $this->db->select('*');
        $this->db->like('nombre', $q);
        $query = $this->db->get('localidades');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $new_row['label']=htmlentities(stripslashes($row['nombre']));
                $new_row['value']=htmlentities(stripslashes($row['id']));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

}
?>
