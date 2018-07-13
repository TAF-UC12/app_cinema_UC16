<?php

$sql = "SELECT * FROM `games`
				INNER JOIN desenvolvedoras
				ON games.desenvolvedora = desenvolvedoras.iddesenvolvedoras
				INNER JOIN publicadoras
				ON games.publicadora = publicadoras.idpublicadora
				INNER JOIN games_has_consoles
				ON games.idgames = games_has_consoles.games_idgames
				INNER JOIN consoles
				ON games_has_consoles.consoles_idconsoles = consoles.idconsoles
				WHERE games.idgames = $idSelecionado";		
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idgames"];	
$titulo = $linha["tituloGame"];
$desenvolvedora = $linha["nomeDesenvolvedora"];
$publicadora = $linha["nomePublicadora"];
$poster = $linha["poster"];	
$estreia = $linha["lancamentoGame"];
$elenco = $linha["elenco"];	
$sinopse = $linha["sinopseGame"];
$diretor = $linha["diretor"];
$pais = $linha["paisOrigem"];
$poster = $linha["imgGame"];
$trailer = $linha["trailer"];

//Data devidamente configurada
$lancamento = substr($estreia,8,2) . "/" .substr($estreia,5,2) . 
"/" . substr($estreia,0,4);	
	
	
			echo "<div id='filme_info'>
		
				<div id='menu_filme'>
				
					<div id='submenu_filme'>";	
				?>
					
				<?php require_once "submenu_filme.php";
						
				echo "</div>
				
				
					<div id='poster_filme'>
						<img src='img/posters/$poster'>
					</div>

				</div>
				
				<div id='info' class='invisivel'>

					<h1>$titulo</h1>
					

					<div>
						<h3>Lançamento </h3>
						<p>$lancamento</p>
					</div>
					
					<div>
						<h3>Direção </h3>
						<p>$diretor</p>
					</div>
					
					<div>
						<h3>Desenvolvedora </h3>
						<p>$desenvolvedora</p>
					</div>

					<div>
						<h3>Sinopse </h3>
						<p class='sinopse'>$sinopse</p>
					</div>";

?>	
	
	
					<ol>
						<li><h4>Gênero</h4></li>

<?php						
$sql2 = "SELECT nomegenero FROM games
		INNER JOIN games_has_generos
		ON games.idgames = games_has_generos.games_idgames
		INNER JOIN generos
		ON games_has_generos.generos_idgeneros = generos.idgeneros
		WHERE games.idgames = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$generos = $linha["nomegenero"];
		
						
						echo "<li>$generos</li>";
						
		}
		?>
	
<?php						
					echo "</ol>
					
					<ol>
						<li><h4>Plataforma</h4></li>";
	?>
					
					
	<?php						
$sql2 = "SELECT nomeConsole FROM games
		INNER JOIN games_has_consoles
		ON games.idgames = games_has_consoles.games_idgames
		INNER JOIN consoles
		ON games_has_consoles.consoles_idconsoles = consoles.idconsoles
		WHERE games.idgames = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$plataforma = $linha["nomeConsole"];
		
						
						echo "<li>$plataforma</li>";
						
		}
		?>
						
<?php						
						
					echo "</ol>
						
					<ol>
						<li><h4>Publicadora</h4></li>
						<li>$publicadora</li>
					</ol>

				</div>
		
		
		
		
				<div id='info2' class='invisivel'>";?>

					<article class="lista_noticias">
					<h3>Notícias sobre <?php echo"$titulo";?></h3>
    
	    <?php
    include "config/conectar.php";
    $qtde_registros = 4;
    @$page = $_GET['pag'];
    if(!$page){
        $pagina = 1;
    }else{
        $pagina = $page;
    }
    
    $inicio = $pagina  - 1;
    $inicio = $inicio * $qtde_registros;
    $sel_parcial = mysqli_query($strcon,"SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			INNER JOIN login
			ON noticias.autorPost = login.idlogin
			WHERE relac_games = $id 
			ORDER BY idnoticias DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			INNER JOIN login
			ON noticias.autorPost = login.idlogin");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;
    
    while($linha  = mysqli_fetch_array($sel_parcial)){
            $idnoticia = $linha["idnoticias"];	
			$titulo = $linha["tituloNoticia"];
			$subtitulo = $linha["subtitulo"];
			$texto = $linha["texto"];	
			$img = $linha["img"];
			$tipo = $linha["tipoPost"];	
			$id_tipo_post = $linha["idtipoPostagem"];
			$data = $linha["dataPost"];
			$autor = $linha["nome"];
		
	if ($id_tipo_post == 1){$tipo_categoria = "Cinema";}
	if ($id_tipo_post == 2){$tipo_categoria = "Games";}
	if ($id_tipo_post == 3){$tipo_categoria = "Series";}	
		
	?>
	
	
	<div class='noticia'>

				<div class='imgNoticia'>
					<img src='img/noticias/<?php echo $img; ?>' alt='<?php echo $img; ?>'>

				</div>

				<div class='infoNoticiaContainer'>
					<div class='infoNoticia'>

						<p>Postado em <?php echo $data; ?> por <?php echo $autor; ?></p>

					</div>

					<div class='chamadaNoticia'>
						<p><a href='noticias.php?news=<?php echo $idnoticia; ?>&categoria=<?php echo $tipo; ?>'><?php echo $titulo; ?></a></p>
					</div>

				</div>

			</div>
   
   <?php
     }	
	
	$anterior = $pagina - 1;
    $proximo = $pagina + 1;
    
    echo "<div class='pg_seletor'>";
    if($pagina > 1){
        echo "<a href=?pag=$anterior> <i class='fas fa-angle-left'></i> </a>";
    }
    
    for($i = 1;$i<$contar_pages+1;$i++){
        echo "<a href=?pag=".$i.">".$i."</a>";
    }
    
    if($pagina < $contar_pages){
        echo "<a href=?pag=$proximo> <i class='fas fa-angle-right'></i> </a>";
    }
	echo "</div>";	
    ?>
		
		</article>

</div>
				
				
				
				<div id='info3' class='invisivel'>

					<h1>Trailer</h1>
					
					<div class="trailer_container">
	
					<iframe class="resp-iframe" width="100%" height="auto" src="<?php echo 'https://www.youtube.com/embed/'.$trailer?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

					</div>

		</div>
		


<?php
}
		


