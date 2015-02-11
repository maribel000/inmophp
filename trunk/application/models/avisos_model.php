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
		//esta funcion trae los ultimos 5 avisos publicados
		$aviso[1]['titulo'] = "Departamento en Venta en Capital Federal";
		$aviso[1]['texto'] = utf8_encode("Ubicado en Capital Federal, 45 mt2, 2 ambientes, 1 ba�o. $4500 ");
		$aviso[1]['foto'] = "1.jpg";
		$aviso[2]['titulo'] = "Casa en Venta en Rosario";
		$aviso[2]['texto'] = utf8_encode("Ubicado en Rosario, 105 mt2, 5 ambientes, 2 ba�o. u\$s45.000 ");
		$aviso[2]['foto'] = "2.jpg";		
		$aviso[3]['titulo'] = "Local en Alquiler en Mendoza";
		$aviso[3]['texto'] = utf8_encode("Ubicado en Mendoza, 32 mt2, 1 ambientes, 1 ba�o. $2.000 ");
		$aviso[3]['foto'] = "3.jpg";			
		return $aviso;
	}
	
	function get_ult_inmobi() {
		//falta trabajar contra la DB
		//esta funcion trae las ultimas 5 inmobiliarias registradas

		return "inmobiliaria1<br>inmobiliaria2<br>inmobiliaria3<br>inmobiliaria4<br>inmobiliaria5<br>";
	}	
	
}
?>
