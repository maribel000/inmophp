<?php echo $encabezado; ?>
  <tr>
    <td id="celda">
	
      <h1>Buscar</h1>
	  <?php
	  if ($artista != "not-found") {
	      echo'<h2>Artistas encontrados:</h2>';
		  echo '<div id="listado">';
		  foreach ($artista as $row){
				if ($row->hay_inter == 1) $msj = " opinion"; else $msj = " opiniones";
				echo '<span><a href="'.base_url().'artista/'.$row->nombanpath.'">Letras de '.$row->nomban.'</a> ('.$row->cantidad.' Letras | '.$row->cant_inter.$msj.')</span><br>';
		  }
		  echo '</div>';
	  }

	  if ($canciones != "not-found") {  
	      echo '<h2>Letras encontradas:</h2>';
		  echo '<div id="listado">';	  
		  foreach ($canciones as $row){
					if ($row->cant_inter == 1) $msj = " opinion"; else $msj = " opiniones";
					echo '<span><a href="'.base_url().'significado/'.$row->nombancanpath.'">'.$row->nomcan.'</a> de '.$row->nomban.' ('.$row->cant_inter.$msj.')</span><br>';
		  }
		  echo '</div>';
	  }
	  
	  if ($artista == "not-found" && $canciones == "not-found") {
		  echo "La pucha! no encontramos nada asi...<br>";	 
	  }
	  ?>

<?php echo $footer; ?>