 <?php echo $encabezado; ?>
 <script type="text/javascript" src='<?php echo base_url(); ?>theme/jquery.innerfade.js'></script> 
  
  <script type="text/javascript">
    $(document).ready(function() {
			  
			  $('#msjhome').innerfade({ animationtype: 'fade', speed: 'slow', timeout: 5000, type: 'sequence', containerheight: '4em', runningclass: 'msjhomeclass'});			  
			  $('#msjhome2').innerfade({ animationtype: 'fade', speed: 'slow', timeout: 5000, type: 'sequence', containerheight: '1.5em', runningclass: 'msjhomeclass2'});			  
			  
	
	});                                  
 </script>   
  
  <tr>
    <td style="background-color: #FDEDD0; opacity: 0.6; padding:1em;">
	
	
	<?php //echo $this->tank_auth->get_username();?>
	
<br>	
	  
	  
<?php
			foreach ($ult as $row)
			{ 
			  $listado = @$listado . '<span><a href="'.base_url().'opi/'.$row->id.'/'.$row->nombancanpath.'"><b>'.$row->nomcan.'</b>, '.$row->nomban.'</a></span><br>';
			}
?>
	  
	

<br><br><br>
		<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
		  <tr>
			<td width="66"></td>
			<td><p style="font-family: Time New Roman; font-size: 14px;">¿Y vos que pensas de:...?</p></td>
			<td width="66"></td>
		  </tr>
		  <tr>
			<td><img src="<?php echo base_url(); ?>theme/h1.png"></img></td>
			<td style="margin-right:-10"><ul id="msjhome"> <li> <a href="significado/silvio-rodriguez-la-maza">¿Que cosa fuera, que cosa fuera la maza sin cantera?</a> </li> <li> <a href="significado/los-redondos-el-pibe-de-los-astilleros">Ciertos reyes no viajan en camello... ellos andan el tranco del amor</a> </li> <li> <a href="significado/gustavo-cerati-amor-amarillo">Cuerpos de luz, corriendo en pleno cielo, cristales de amor amarillo…</a> </li> <li> <a href="significado/enrique-santos-discepolo-yira-yira">Aunque te quiebre la vida, aunque te muerda un dolor... no esperes nunca una ayuda, ni una mano, ni un favor.</a> </li> <li> <a href="significado/radiohead-true-love-waits">And true love waits in haunted attics, and true love lives on lollipops and crisps...</a> </li> </ul></td>
			<td><img src="<?php echo base_url(); ?>theme/h2.png"></td>
		  </tr>
		  <tr>
			<td></td>
			<td><ul id="msjhome2"> <li>La Maza - Silvio Rodriguez</li> <li>El Pibe De Los Astilleros - Los Redondos</li> <li>Amor Amarillo - Gustavo Cerati</li> <li>Yira, yira - Enrique Santos Discépolo</li> <li>True Love Waits - Radiohead</li></ul></td>
			<td></td>
		  </tr>			  
		  <tr>		  
			<td></td>
			<td align="center"><img src="<?php echo base_url(); ?>theme/h3.png"></td>
			<td></td>
		  </tr>
		</table>
		
		<br><br><br><br>
<p align="center" style="font-size:18px"><b style="color: red">OpinaLetras.com</b> es una comunidad de usuarios para pensar, descubrir, descifrar, dudar, aclarar... responder, <b>opinar</b>! que nos estan diciendo los artistas con su letra de canción. Pretendemos que esta pagina sea una herramienta para agrupar a aquellos que se interesan tambien en el mensaje o el contenido de las canciones y en compartir que es lo que se entiende por ellas.</p>		
		
		<br><br>
	  <div id="listadohome" class="grane">
		<h2>Grandes Enigmas:</h2>
		<span><a href="significado/silvio-rodriguez-unicornio">Unicornio, Silvio Rodriguez</a></span><br><span><a href="significado/juanes-la-camisa-negra">La Camisa Negra, Juanes</a></span><br><span><a href="significado/los-redondos-jijiji">Ji Ji Ji, Los Redondos</a></span><br><span><a href="significado/las-pelotas-capitan-america">Capitán América, Las Pelotas</a></span><br><span><a href="significado/la-renga-oscuro-diamante">Oscuro Diamante, La Renga</a></span><br><span><a href="significado/las-ketchup-asereje">Aserejé, Las Ketchup</a></span><br>
	  </div>
	  
	  <div id="listadohome" class="artmv">
		<h2>Artistas mas vistos:</h2>
		<span><a href="artista/los-redondos">Los Redondos</a></span><br><span><a href="artista/luis-alberto-spinetta">Luis Alberto Spinetta</a></span><br><span><a href="artista/radiohead">Radiohead</a></span><br><span><a href="artista/divididos">Divididos</a></span><br><span><a href="artista/silvio-rodriguez">Silvio Rodriguez</a></span><br><span><a href="artista/soda-stereo">Soda Stereo</a></span><br>
	  </div>	  
	  
	  <div id="listadohome" class="ultoa">
		<h2>Ultimas Opiniones Agregadas:</h2>
		<?php echo $listado;?>
	  </div>

	  
	  <div id="listadohome" class="canmv">
		<h2>Canciones mas vistas:</h2>
		<span><a href="significado/adele-someone-like-you">Someone Like You, Adele</a></span><br><span><a href="significado/ricardo-arjona-fuiste-tu">Fuiste Tú, Ricardo Arjona</a></span><br><span><a href="significado/reik-creo-en-ti">Creo en ti, Reik</a></span><br><span><a href="significado/camila-contigo-quiero-estar">Contigo quiero estar, Camila</a></span><br><span><a href="significado/mana-amor-clandestino">Amor Clandestino, Maná</a></span><br><span><a href="significado/las-pastillas-del-abuelo-algo-de-vos">Algo de Vos, Las Pastillas del Abuelo</a></span><br>
	  </div>


<?php echo $footer; ?>