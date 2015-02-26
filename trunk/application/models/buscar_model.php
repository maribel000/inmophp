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

 	/*function avisos_fotos_default($avisos)
    {
        $this->db->select('id_aviso, url, descripcion');
        $this->db->from('aviso_fotos');

        foreach ($avisos->result() as $aviso) {
            $where = "(`id_aviso` = '$aviso->id' AND `default` = 1)";
            $this->db->or_where($where);
        }

        $rval = $this->db->get();

        return $rval;
    }*/

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
    
    function provincias()
    {
    	$rval= $this->db->get('provincias');
    
    	return $rval;
    }

    function get_localidad($q){
        $this->db->select('*');
        $this->db->like('nombre', $q);
        $query = $this->db->get('localidades');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $new_row['label']=htmlentities(stripslashes($row['nombre']));
                $new_row['value']=htmlentities(stripslashes($row['nombre']));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }


    // ver que variables necesita buscar.php
    function buscar_avisos($tipoOp,$tipoPro,$idLocalidad) {

        $this->load->helper('url');
        $this->load->library('ion_auth');

        if ($this->ion_auth->logged_in()){
            $data['user'] = $this->ion_auth->user()->row();
            $datos["menu"] = $this->load->view('menu_us', $data, true);
        }else{
            $datos["menu"] = $this->load->view('menu_nu');
        }
        // esta funcion loguea dato del back-end y performance de los modulos
        //$this->output->enable_profiler(TRUE);

        $this->db->select('avisos.id');
        $this->db->select('avisos.direccion');
        $this->db->select('avisos.metros_cuadrados');
        $this->db->select('avisos.cant_ambientes');
        $this->db->select('avisos.cant_dormitorios');
        $this->db->select('avisos.cant_banios');
        $this->db->select('avisos.estado_inmueble');
        $this->db->select('avisos.anio');
        $this->db->select('avisos.detalles');
        $this->db->select('avisos.precio');
        $this->db->select('avisos.fecha');
        $this->db->select('avisos.estado_aviso');
        $this->db->select('avisos.nombre_barrio');

        $this->db->select('tipos_inmuebles.descripcion as tipo_inmueble');
        $this->db->select('tipos_op.nombre as tipo_op');
        $this->db->select('localidades.id as id_localidad');
        $this->db->select('users.first_name as first_name');
        $this->db->select('aviso_fotos.url');

        $this->db->from('avisos');

        $this->db->join('tipos_inmuebles', 'avisos.id_tipo_inmueble = tipos_inmuebles.id','left');
        $this->db->join('tipos_op', 'avisos.id_tipo_op = tipos_op.id','left');
        $this->db->join('localidades', 'avisos.id_localidad = localidades.id','left');
        $this->db->join('users', 'avisos.id_usuario = users.id','left');
        $this->db->join('aviso_fotos', 'avisos.id = aviso_fotos.id_aviso','left');

        // El cero representa todo tipo de operaciones
        if($tipoOp != 0) {
            $this->db->where('avisos.id_tipo_op',$tipoOp);
        }

        // El cero representa que es para todo tipo de propiedad
        if($tipoPro != 0) {
            $this->db->where('avisos.id_tipo_inmueble',$tipoPro);
        }

        // El string vacio para cuando no se ingreso nada en el input de Localidad
        /*		if($ciudad != "") {
                    $this->db->where('localidades.nombre',$ciudad);
                }*/

        if($idLocalidad != "") {
            $this->db->where('localidades.id',$idLocalidad);
        }

        $query = $this->db->get();

        return $query;
    }


    // ver que variables necesita buscar.php
    function buscar_avisos_2($tipoOp,$tipoPro,$idLocalidad,$porpagina,$segmento) {

        $this->load->helper('url');
        $this->load->library('ion_auth');

        if ($this->ion_auth->logged_in()){
            $data['user'] = $this->ion_auth->user()->row();
            $datos["menu"] = $this->load->view('menu_us', $data, true);
        }else{
            $datos["menu"] = $this->load->view('menu_nu');
        }
        // esta funcion loguea dato del back-end y performance de los modulos
        //$this->output->enable_profiler(TRUE);

        $this->db->select('avisos.id');
        $this->db->select('avisos.direccion');
        $this->db->select('avisos.metros_cuadrados');
        $this->db->select('avisos.cant_ambientes');
        $this->db->select('avisos.cant_dormitorios');
        $this->db->select('avisos.cant_banios');
        $this->db->select('avisos.estado_inmueble');
        $this->db->select('avisos.anio');
        $this->db->select('avisos.detalles');
        $this->db->select('avisos.precio');
        $this->db->select('avisos.fecha');
        $this->db->select('avisos.estado_aviso');
        $this->db->select('avisos.nombre_barrio');

        $this->db->select('tipos_inmuebles.descripcion as tipo_inmueble');
        $this->db->select('tipos_op.nombre as tipo_op');
        $this->db->select('localidades.id as id_localidad');
        $this->db->select('users.first_name as first_name');
        $this->db->select('aviso_fotos.url');

//        $this->db->from('avisos');

        $this->db->join('tipos_inmuebles', 'avisos.id_tipo_inmueble = tipos_inmuebles.id','left');
        $this->db->join('tipos_op', 'avisos.id_tipo_op = tipos_op.id','left');
        $this->db->join('localidades', 'avisos.id_localidad = localidades.id','left');
        $this->db->join('users', 'avisos.id_usuario = users.id','left');
        $this->db->join('aviso_fotos', 'avisos.id = aviso_fotos.id_aviso','left');

        // El cero representa todo tipo de operaciones
        if($tipoOp != 0) {
            $this->db->where('avisos.id_tipo_op',$tipoOp);
        }

        // El cero representa que es para todo tipo de propiedad
        if($tipoPro != 0) {
            $this->db->where('avisos.id_tipo_inmueble',$tipoPro);
        }

        // El string vacio para cuando no se ingreso nada en el input de Localidad
        /*		if($ciudad != "") {
                    $this->db->where('localidades.nombre',$ciudad);
                }*/

        if($idLocalidad != "") {
            $this->db->where('localidades.id',$idLocalidad);
        }

        $query = $this->db->get('avisos',$porpagina,$segmento);

        return $query;
    }

    function buscar_avisos_total($tipoOp, $tipoPro, $idLocalidad) {
        // esta funcion loguea dato del back-end y performance de los modulos
        $this->output->enable_profiler(TRUE);

        $this->db->select('avisos.id');
        $this->db->select('avisos.direccion');
        $this->db->select('avisos.metros_cuadrados');
        $this->db->select('avisos.cant_ambientes');
        $this->db->select('avisos.cant_dormitorios');
        $this->db->select('avisos.cant_banios');
        $this->db->select('avisos.estado_inmueble');
        $this->db->select('avisos.anio');
        $this->db->select('avisos.detalles');
        $this->db->select('avisos.precio');
        $this->db->select('avisos.fecha');
        $this->db->select('avisos.estado_aviso');
        $this->db->select('avisos.nombre_barrio');

        $this->db->select('tipos_inmuebles.descripcion as tipo_inmueble');
        $this->db->select('tipos_op.nombre as tipo_op');
        $this->db->select('localidades.id as id_localidad');
        $this->db->select('users.first_name as first_name');
        $this->db->select('aviso_fotos.url');

        $this->db->from('avisos');

        $this->db->join('tipos_inmuebles', 'avisos.id_tipo_inmueble = tipos_inmuebles.id','left');
        $this->db->join('tipos_op', 'avisos.id_tipo_op = tipos_op.id','left');
        $this->db->join('localidades', 'avisos.id_localidad = localidades.id','left');
        $this->db->join('users', 'avisos.id_usuario = users.id','left');
        $this->db->join('aviso_fotos', 'avisos.id = aviso_fotos.id_aviso','left');

        // El cero representa todo tipo de operaciones
        if($tipoOp != 0) {
            $this->db->where('avisos.id_tipo_op',$tipoOp);
        }

        // El cero representa que es para todo tipo de propiedad
        if($tipoPro != 0) {
            $this->db->where('avisos.id_tipo_inmueble',$tipoPro);
        }

        // El string vacio para cuando no se ingreso nada en el input de Localidad
        /*		if($ciudad != "") {
                    $this->db->where('localidades.nombre',$ciudad);
                }*/

        if($idLocalidad != "") {
            $this->db->where('localidades.id',$idLocalidad);
        }

        $query = $this->db->get();

        return $query->num_rows();
    }

}
?>
