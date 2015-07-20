<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avisos_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function add_aviso(
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
    )
    {
        $data = array(
						   'id_tipo_op' => $tipoop,
						   'id_tipo_inmueble' => $tipoinm,
						   'id_localidad' => $idLocalidad,
                           'id_barrio' => $idBarrio,
						   'id_usuario' => 8, //falta tomar el id real del usuario
                           'nombre_barrio' => $barrio,
						   'direccion' => $direccion,
						   'cant_ambientes' => $ambientes,
						   'cant_dormitorios' => $dormitorios,
						   'cant_banios' => $banios,
						   'metros_cuadrados' => $metros2,
						   'estado_inmueble' => $estado,
						   'anio' => $anio,
						   'precio' => $precio,
						   'detalles' => utf8_decode($detalles),
                           'estado_aviso' => $estado_aviso,
                           'fecha' => $fecha,
						   'id_usuario' => $userid
						);

			$this->db->insert('avisos', $data);

			return $this->db->insert_id();
    }

    function edit_aviso($id, $tipoop, $tipoinm, $provincia, $idlocalidad, $barrio, $direccion, $ambientes, $dormitorios, $banios, $metros2, $estado, $anio, $precio, $detalles)
    {
			$data = array(
						   'id_tipo_op' => $tipoop,
						   'id_tipo_inmueble' => $tipoinm,
						   'id_localidad' => $idlocalidad,
						   'id_barrio' => $barrio,
						   'direccion' => $direccion,
						   'cant_ambientes' => $ambientes,
						   'cant_dormitorios' => $dormitorios,
						   'cant_banios' => $banios,
						   'metros_cuadrados' => $metros2,
						   'estado_inmueble' => $estado,
						   'anio' => $anio,
						   'precio' => $precio,
						   'detalles' => utf8_decode($detalles),
						);

			$this->db->where('id', $id);
			$this->db->limit(1);
			$this->db->update('avisos', $data); 
			
			return true; //si llega aca, esta todo ok
    }

    function registrar_visita($id, $ip, $date)
	{	

		$data = array(
		   'id_aviso' => $id,
		   'ip_address' => $ip,
		   'fecha_hora' => $date,
		);

		$cadena_query = $this->db->insert_string('visualizaciones', $data);
		$cadena_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $cadena_query);
		$this->db->query($cadena_query);			
		return;			

	}
	
    function enviado_mail ($id, $ip, $nombre, $email, $date)
	{	

		$data = array(
		   'id_aviso' => $id,
		   'ip_address' => $ip,
		   'nombre' => $nombre,
		   'email' => $email,		   
		   'fecha_hora' => $date,
		);

		$cadena_query = $this->db->insert_string('enviado_mail', $data);
		$cadena_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $cadena_query);
		return $this->db->query($cadena_query);			

	}	
	
	function new_alert($userid, $tipoinm, $tipoop, $idlocal, $pmin, $pmax) {
		$data = array(
		   'id_user' => $userid,
		   'id_tipo_inmueble' => $tipoinm,
		   'id_tipo_op' => $tipoop,		   
		   'id_ciudad' => $idlocal,
		   'precio_min' => $pmin,	
		   'precio_max' => $pmax,	
		   'activo' => 1,			   
		);

		$cadena_query = $this->db->insert_string('user_pedidos', $data);
		$cadena_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $cadena_query);
		$this->db->query($cadena_query);			
		return;			
	}
	
    function is_fav($idaviso, $iduser) {
        $this->db->select('id');
        $this->db->where('id_aviso', $idaviso);
        $this->db->where('id_user', $iduser);		
        $query = $this->db->get('user_favoritos');
		$count =  $query->num_rows();
		if ($count) return 1; else return 0;	
	}

	
    function make_fav($idaviso, $iduser, $fecha)
	{				
        $this->db->select('id');
        $this->db->where('id_aviso', $idaviso);
        $this->db->where('id_user', $iduser);		
        $query = $this->db->get('user_favoritos');
		$count =  $query->num_rows();
		if ($count) {
			//hay un registro, por lo que la accion es de eliminar
			$this->db->delete('user_favoritos', array('id' => $query->row()->id)); 
			return 0;
		}else{
			//no hay registro, por lo que la accion es de insertar	
			$data = array(
			   'id_user' => $iduser ,
			   'id_aviso' => $idaviso ,
			   'fecha' => $fecha
			);

			$this->db->insert('user_favoritos', $data);
			return 1;
		}
		
	}	
	
    function delete_ale($idale)
	{				
		$this->db->delete('user_pedidos', array('id' => $idale)); 
		return;
	}		
	
    function registrar_verdatos($id, $ip, $date)
	{	

		$data = array(
		   'id_aviso' => $id,
		   'ip_address' => $ip,
		   'fecha_hora' => $date,
		);

		$cadena_query = $this->db->insert_string('ver_datos', $data);
		$cadena_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $cadena_query);
		$this->db->query($cadena_query);			
		return;			

	}	
	
    function get_aviso($id)
    {
//    	$this->output->enable_profiler(TRUE);

        $aviso = array();

        $this->db->select('avisos.id');
        $this->db->select('avisos.id_tipo_inmueble');
        $this->db->select('avisos.id_tipo_op');			
        $this->db->select('avisos.direccion');
        $this->db->select('avisos.metros_cuadrados as m2');
        $this->db->select('avisos.cant_ambientes as ambientes');
        $this->db->select('avisos.cant_dormitorios as dormitorios');
        $this->db->select('avisos.cant_banios as banios');
        $this->db->select('avisos.estado_inmueble');
        $this->db->select('avisos.anio');
        $this->db->select('avisos.detalles');
        $this->db->select('avisos.precio as precio');
        $this->db->select('avisos.fecha');
        $this->db->select('avisos.estado_aviso');
        $this->db->select('avisos.nombre_barrio');

        $this->db->select('tipos_inmuebles.descripcion as tipo_inmueble');
        $this->db->select('tipos_op.nombre as tipo_op');
        $this->db->select('localidades.nombre as nombre_localidad');
		$this->db->select('localidades.id as id_localidad');
        $this->db->select('provincias.nombre as provincia');
        $this->db->select('aviso_fotos.url as foto_url');
        $this->db->select('aviso_fotos.descripcion as foto_desc');
		
		$this->db->select('users.first_name as first_name');
		$this->db->select('users.last_name as last_name');
		$this->db->select('users.phone as phone');
		$this->db->select('users.email as email');

        $this->db->from('avisos');

        $this->db->join('tipos_inmuebles', 'avisos.id_tipo_inmueble = tipos_inmuebles.id','left');
        $this->db->join('tipos_op', 'avisos.id_tipo_op = tipos_op.id','left');
        $this->db->join('localidades', 'avisos.id_localidad = localidades.id','left');
        $this->db->join('provincias', 'localidades.id_provincia = provincias.id','left');
        $this->db->join('aviso_fotos', 'avisos.id = aviso_fotos.id_aviso','left');
		
		//revisar
		$this->db->join('users', 'avisos.id_usuario = users.id','left');
		//

        $this->db->where('avisos.id', $id);

        $query = $this->db->get();

        $aviso = $query->result_array()[0];
        $aviso['foto_url'] = $aviso['foto_desc'] = "";

        $index = 0;
        foreach($query->result_array() as $row) {
            $aviso['foto_url'][$index] = $row['foto_url'];
            $aviso['foto_desc'][$index] = $row['foto_desc'];

            $index++;
        }

        return $aviso;
    }

    function get_tipos_op()
    {
        $sql_in = "SELECT * FROM `tipos_op`";
        $query = $this->db->query($sql_in);
        return $query->result();
    }

    function get_tipos_inmuebles()
    {
        $sql_in = "SELECT * FROM `tipos_inmuebles`";
        $query = $this->db->query($sql_in);
        return $query->result();
    }

    function get_provincias()
    {
        $sql_in = "SELECT * FROM `provincias`";
        $query = $this->db->query($sql_in);
        return $query->result();
    }

    function get_provincia($id)
    {
//        TODO: no trae la provincia que tiene acento, ejemplo: C&oacute;rdoba
        $this->db->select('nombre');
        $this->db->where('id', $id);
        $query = $this->db->get('provincias');

        return $query->row()->nombre;
    }

	
	function acentos($cadena) {  
	   //$cadena = strtr($cadena,'à&aacute;âãäçè&eacute;êëì&iacute;îï&ntilde;ò&oacute;ôõöùúûüýÿÀ&aacute;ÂÃÄÇÈ&eacute;ÊËÌ&iacute;ÎÏ&ntilde;Ò&oacute;ÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
	   return $cadena;
	}	
	
    function get_localidades($q)
    {        
		$this->db->select('*');
        $this->db->like('nombre', $q);
        $query = $this->db->get('localidades');

        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $new_row['idLocalidad']=stripslashes($row['id']);
                $new_row['localidad']=stripslashes($row['nombre']);
                $new_row['value']=stripslashes($row['nombre']);
                $new_row['idProvincia']=stripslashes($row['id_provincia']);
                $new_row['provincia']=stripslashes($this->get_provincia($row['id_provincia']));
                $row_set[] = $new_row;
            }
            echo json_encode($row_set);
        }
    }
	/*
    function get_localidades($q)
    {
        $this->db->select('*');
        $this->db->like('nombre', $q);
        $query = $this->db->get('localidades');

        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $new_row['idLocalidad']=htmlentities(stripslashes($row['id']));
                $new_row['localidad']=htmlentities(stripslashes($row['nombre']));
                $new_row['value']=htmlentities(stripslashes($row['nombre']));
                $new_row['idProvincia']=htmlentities(stripslashes($row['id_provincia']));
                $new_row['provincia']=htmlentities(stripslashes($this->get_provincia($row['id_provincia'])));
                $row_set[] = $new_row;
            }
            echo json_encode($row_set);
        }
    }*/

    function get_ult_avisos() { // esta funcion trae los ultimos 5 avisos que tienen fotos y en estado Publicado

    	$aviso = array();
    	
//    	$this->output->enable_profiler(TRUE);
    	
    	$this->db->select('avisos.id');
		$this->db->select('avisos.direccion');
		$this->db->select('avisos.metros_cuadrados as m2');
		$this->db->select('avisos.cant_ambientes as ambientes');
		$this->db->select('avisos.cant_dormitorios');
		$this->db->select('avisos.cant_banios as banios');
		$this->db->select('avisos.estado_inmueble');
		$this->db->select('avisos.anio');
		$this->db->select('avisos.detalles');
		$this->db->select('avisos.precio as precio');
		$this->db->select('avisos.fecha');
		$this->db->select('avisos.estado_aviso');
		$this->db->select('avisos.nombre_barrio');
		
		$this->db->select('tipos_inmuebles.descripcion as tipo_inmueble');
		$this->db->select('tipos_op.nombre as tipo_op');
		$this->db->select('localidades.nombre as nombre_localidad');
		$this->db->select('provincias.nombre as provincia');
		$this->db->select('aviso_fotos.url as foto');
		
		$this->db->from('avisos');
		
		$this->db->join('tipos_inmuebles', 'avisos.id_tipo_inmueble = tipos_inmuebles.id','left');
		$this->db->join('tipos_op', 'avisos.id_tipo_op = tipos_op.id','left');
		$this->db->join('localidades', 'avisos.id_localidad = localidades.id','left');
		$this->db->join('provincias', 'localidades.id_provincia = provincias.id','left');
        $this->db->join('aviso_fotos', 'avisos.id = aviso_fotos.id_aviso','left');
    	
		$this->db->where('aviso_fotos.default',1);
		$this->db->where('avisos.estado_aviso',0);
		
		$this->db->order_by("avisos.id", "desc");
		
		//esta funcion trae los ultimos 5 avisos publicados
		$this->db->limit(5,0);
		
		$query = $this->db->get();
		
		$index = 0;
		
		foreach($query->result_array() as $row) {
			$aviso[$index]['titulo'] = $row['tipo_inmueble'].' en '.$row['tipo_op'].' en '.$row['nombre_localidad'].'.';
			$aviso[$index]['texto']  = 'Ubicado en '.$row['provincia'].', '.$row['m2'].' mt2, '.$row['ambientes'].' ambientes, '.$row['banios'].' banios. '.$row['precio'].'<br /><br /><em>Agregado el: '.$row['fecha'].'</em>';
            $aviso[$index]['foto']   = $row['foto'];
            $aviso[$index]['id']   = $row['id'];
			
			$index++;
		}
				
		return $aviso;
	}
	
	function get_ult_inmobi() {
		//esta funcion trae las ultimas 5 inmobiliarias registradas
//    	$this->output->enable_profiler(TRUE);

        $this->db->select('users.id');
        $this->db->select('users.company');
        $this->db->select('users.created_on');

        $this->db->select('users_groups.group_id as group_id');

        $this->db->from('users');

        $this->db->join('users_groups', 'users_groups.user_id = users.id','left');

        $this->db->where('group_id',3);

        $this->db->order_by('users.created_on', 'desc');

        $this->db->limit(6,0);

        $query = $this->db->get();

        return $query;
	}

    function get_localidades_rank() {
        //esta funcion trae las ultimas 5 localidades con m&aacute;s avisos cargados

//    	$this->output->enable_profiler(TRUE);

        $this->db->select('avisos.id');
        $this->db->select('avisos.id_localidad');

        $this->db->select('localidades.nombre as nombre_localidad');
        $this->db->select('count(id_localidad) as cant_avisos');

        $this->db->from('avisos');
		$this->db->where('estado_aviso',0);
        $this->db->join('localidades', 'localidades.id = avisos.id_localidad','left');

        $this->db->group_by('id_localidad');
        $this->db->order_by('count(id_localidad)', 'desc');

        $this->db->limit(10,0);

        $query = $this->db->get();

        return $query;
    }



    function add_aviso_foto(
        $idAviso,
        $url,
        $desc,
        $default
    )
    {
        $data = array(
            'id_aviso' => $idAviso,
            'url' => $url,
            'descripcion' => $desc,
            'default' => $default
        );

        $this->db->insert('aviso_fotos', $data);

        return $this->db->insert_id();
    }
	
    function edit_aviso_foto(
        $idAviso,
        $url,
        $desc,
        $default
    )
    {
	
        $this->db->select('aviso_fotos.id_aviso');
        $this->db->from('aviso_fotos');
        $this->db->where('url',$url);
        $this->db->limit(1);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		
	
		
		if ($rowcount) { //ya existe el registro, por lo que lo actualizo
			$data = array(
				'descripcion' => $desc,
			);			
			$this->db->where('url', $url);
			$this->db->limit(1);
			$this->db->update('aviso_fotos', $data); 
			
			return true; //si llega aca, esta todo ok
		}else{ // no existe el registro, lo agrego
			$data = array(
				'id_aviso' => $idAviso,
				'url' => $url,
				'descripcion' => $desc,
				'default' => 1
			);			
			$this->db->insert('aviso_fotos', $data);
			return $this->db->insert_id();	
		}
		
    }	

    function listar_avisos_total() {
		$this->db->where('estado_aviso', 0);
        $query = $this->db->get('avisos');

        return $query->num_rows();
    }
	
    function listar_avisos_pendientes_total() {
		$this->db->where('estado_aviso', 1);		
        $query = $this->db->get('avisos');

        return $query->num_rows();
    }	

    function listar_avisos($porpagina,$segmento) {
		$this->db->where('estado_aviso', 0);
        $query = $this->db->get('avisos',$porpagina,$segmento);

        return $query;
    }
	
    function listar_avisos_pendientes($porpagina,$segmento) {
		$this->db->where('estado_aviso', 1);
        $query = $this->db->get('avisos',$porpagina,$segmento);

        return $query;
    }	
	
	function chequear_prop($idaviso, $iduser) {
        $this->db->select('id');
        $this->db->where('id', $idaviso);
        $this->db->where('id_usuario', $iduser);		
        $query = $this->db->get('avisos');
		$count =  $query->num_rows();
		if ($count) return 1; else return 0;	
	}
	
	function borrar_aviso($idaviso) {
		
        $this->db->select('url');
        $this->db->where('id_aviso', $idaviso);	
        $query = $this->db->get('aviso_fotos');
		
        foreach($query->result_array() as $row) { //elimamos todas las fotos de este aviso
			@unlink($row['url']);
        }		
		
		$this->db->delete('aviso_fotos', array('id_aviso' => $idaviso)); 	
		$this->db->delete('enviado_mail', array('id_aviso' => $idaviso)); 
		$this->db->delete('inmuebles_caracteristicas', array('id_aviso' => $idaviso)); 		
		$this->db->delete('mensajes', array('id_aviso' => $idaviso)); 	
		$this->db->delete('user_favoritos', array('id_aviso' => $idaviso)); 	
		$this->db->delete('ver_datos', array('id_aviso' => $idaviso)); 		
		$this->db->delete('visualizaciones', array('id_aviso' => $idaviso)); 	
		
		$this->db->delete('avisos', array('id' => $idaviso)); 
	}
	
	function publicar_aviso($idaviso) {
		$data = array('estado_aviso' => 0);
		$this->db->where('id', $idaviso);
		$this->db->limit(1);
		$this->db->update('avisos', $data); 	
	}
	
	function enviar_alertas($id) {
		//selecciono los datos del aviso nuevo
		
        $this->db->select('id_tipo_inmueble');
        $this->db->select('id_tipo_op');		
        $this->db->select('id_localidad');		
        $this->db->select('precio');	

		
        $this->db->where('id', $id);
        $query1 = $this->db->get('avisos');	
		
		$query1 = $query1->result_array()[0];
		//print_r($query1);
		//die("a");
		//con estos datos, me fijo si hay correspondencia en la tabla de alertas
		/*
		$query1['id_tipo_op'] = 1;
		$query1['id_tipo_inmueble'] = 1;
		$query1['precio'] = 1000;
		*/
		
    //    $this->db->select('user_pedidos.id_user');		

		$this->db->select('users.email as email');	
		$this->db->select('users.first_name as nombre');			
		$this->db->select('users.last_name as apellido');					
		
		$this->db->where('id_tipo_op', $query1['id_tipo_op']);
		$this->db->where('id_tipo_inmueble', $query1['id_tipo_inmueble']);
		$this->db->where('precio_min <=', $query1['precio']);
		$this->db->where('precio_max >=', $query1['precio']);
		$this->db->where('activo', 1);
		
		$this->db->join('users', 'user_pedidos.id_user = users.id','left');		
		return $this->db->get('user_pedidos');	
		/*
			retorno la cantidad de emails o ids de usuarios
			en el control, mando emails a cada uno de ellos, con un enlace al nuevo aviso ingresado
		*/
		
	}
}
?>
