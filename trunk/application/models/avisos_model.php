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

    function get_localidades()
    {
        $sql_in = "SELECT * FROM `localidades`";
        $query = $this->db->query($sql_in);
        return $query->result();
    }

    function get_localidades_2($q){
        $this->db->select('nombre');
        $this->db->like('nombre', $q);
        $query = $this->db->get('localidades');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = htmlentities(stripslashes($row['nombre'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function get_ult_avisos() {
		//falta trabajar contra la DB
		
    	$aviso = array();
    	
    	$this->output->enable_profiler(TRUE);
    	
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
		$this->db->join('aviso_fotos', 'avisos.id = aviso_fotos.id_aviso','left');
		$this->db->join('provincias', 'localidades.id_provincia = provincias.id','left');
    	
		$this->db->where('aviso_fotos.default',1);
		
		$this->db->order_by("avisos.fecha", "desc");
		
		//esta funcion trae los ultimos 5 avisos publicados
		$this->db->limit(5,0);
		
		$query = $this->db->get();
		
		$index = 0;
		
		foreach($query->result_array() as $row) {
			$aviso[$index]['titulo'] = $row['tipo_inmueble'].' en '.$row['tipo_op'].' en '.$row['nombre_localidad'].'.';
			$aviso[$index]['texto']  = 'Ubicado en '.$row['provincia'].', '.$row['m2'].' mt2, '.$row['ambientes'].' ambientes, '.$row['banios'].' banios. '.$row['precio'];
			$aviso[$index]['foto']   = $row['foto'];
			
			$index++;
		}
				
		return $aviso;
	}
	
	function get_ult_inmobi() {
		//falta trabajar contra la DB
		//esta funcion trae las ultimas 5 inmobiliarias registradas

		return "inmobiliaria1<br>inmobiliaria2<br>inmobiliaria3<br>inmobiliaria4<br>inmobiliaria5<br>";
	}	
	
}
?>
