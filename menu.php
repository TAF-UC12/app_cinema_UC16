

<nav class="mobile-menu">
	<label for="show-menu" class="show-menu"><span></span><div class="lines"></div></label>
		<input type="checkbox" id="show-menu">
			<ul id="menu">
			<li><a <?php if($paginaLink == "index.php") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="index.php">Home</a></li>
			<li><a <?php if($paginaLink == "noticias_index.php" or $paginaLink == "noticias_series.php") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="noticias_index.php?tipo=">Notícias</a></li>
			<li><a <?php if($paginaLink == "categoria.php" and $categoria == 1) {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="categoria.php?tipo=1">Cinema</a></li>
			<li><a <?php if($paginaLink == "categoria.php" and $categoria == 3) {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="categoria.php?tipo=3">Séries</a></li>
			<li><a <?php if($paginaLink == "categoria.php" and $categoria == 2) {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="categoria.php?tipo=2">Games</a></li>
			<li><a <?php if($paginaLink == "lancamentos.php") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="lancamentos.php?filtro_categoria=filmes">Títulos</a></li>
			<li><a <?php if($paginaLink == "contato.php?") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="contato.php">Contato</a></li>
		</ul>
	</nav> 