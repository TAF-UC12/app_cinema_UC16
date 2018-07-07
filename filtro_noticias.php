

<div id="filtro_container_noticias">		
			
	<li <?php if($categoria == "1") {echo 'class="info_ativa"';}else{echo 'class="info_lista"';} ?> ><a href='noticias_index.php?tipo=1'>Cinema</a></li>	
	<li <?php if($categoria == "3") {echo 'class="info_ativa"';}else{echo 'class="info_lista"';} ?> ><a href='noticias_index.php?tipo=3'>Séries</a></li>
	<li <?php if($categoria == "2") {echo 'class="info_ativa"';}else{echo 'class="info_lista"';} ?> ><a href='noticias_index.php?tipo=2'>Games</a></li>
	<li <?php if($categoria == "") {echo 'class="info_ativa"';}else{echo 'class="info_lista"';} ?> ><a href='noticias_index.php?tipo='>Todas</a></li>

</div>

