<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home app</title>

<link rel="shortcut icon" href="img/icon48px.png">

<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">
<script defer src="js/fontawesome/fontawesome-all.js"></script>
	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no>
<meta name="mobile-web-app-capable" content="yes">

<!--LINKS DOS ARQUIVOS JS-->
<link rel="manifest" href="js/manifest.json">
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>



<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-0.7}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
</script>

<script type="text/javascript">
        function searchToggle(obj, evt){
            var container = $(obj).closest('.search-wrapper');

            if(!container.hasClass('active')){
                  container.addClass('active');
                  evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                  container.removeClass('active');
                  // clear input
                  container.find('.search-input').val('');
                  // clear and hide result container when we press close
                  container.find('.result-container').fadeOut(100, function(){$(this).empty();});
            }
        }

        function submitFn(obj, evt){
            value = $(obj).find('.search-input').val().trim();

            _html = "Yup yup! Your search text sounds like this: ";
            if(!value.length){
                _html = "Yup yup! Add some text friend :D";
            }
            else{
                _html += "<b>" + value + "</b>";
            }

            $(obj).find('.result-container').html('<span>' + _html + '</span>');
            $(obj).find('.result-container').fadeIn(100);

            evt.preventDefault();
        }
</script>


</head>

<body>
<main role="main">
	
<header>
	
	<div id="logo_topo">
		<img src="img/logo.png" alt="logo do site" class="logo">
	</div>	
	
	<div id="menu_topo">		
	<?php
	
		include('menu.php');
	
	?>
	</div>	
	

</header>

<div class='categoriaPaginaHome'>

	<h2>Home</h2>

</div>	

<section class="submenu">

	<?php
		require('submenu.php');
	?>
	
</section>
	

<div id="topo_slides_container">

		<!--ESTA SECTION SÓ TEM O SLIDER-->
		<section id='destaques_topo'>



			<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
			<!-- Loading Screen -->
			<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
				<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
			</div>

			<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">

		
	<?php          
			 require_once "config/conectar.php";

			//Agora é realizar a querie de busca no banco de dados

			$sql = "SELECT * FROM noticias WHERE destaque = 'on' ORDER BY 
			idnoticias DESC LIMIT 3";


			$resultado = mysqli_query($strcon, $sql)
			or die ("Não foi possível realizar a consulta ao banco de dados");

			// Agora iremos "pegar" cada campo da notícia
			// e organizar no HTML

			while ($linha=mysqli_fetch_array($resultado)) {

			$id = $linha["idnoticias"];	
			$titulo = $linha["tituloNoticia"];
			$subtitulo = $linha["subtitulo"];
			$imgDestaque = $linha["imgDestaque"];	
		
		
			echo "<div data-p='225.00'>
							<img data-u='image' src='img/slideshow/$imgDestaque' />
							<div class='noticia_titulo_home'>
								<!--<img style='position:absolute;top:0px;left:0px;width:470px;height:160px;' src='img/c-phone-horizontal.png' />-->


								<h1>$titulo</h1>
								<h2>$subtitulo</h2>

								<a href='noticia.php?news=$id&pgtitulo=$titulo'><i class='fas fa-arrow-circle-right'></i> Continuar lendo</a>

							</div>
						</div>";
			        
}
			?>
			
			</div>
				
				
				
			<!-- Bullet Navigator -->
			<div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;left:150px;" data-scale="0.5" data-scale-bottom="0.75">
				<div data-u="prototype" class="i" style="width:16px;height:16px;">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<circle class="b" cx="8000" cy="8000" r="5800"></circle>
					</svg>
				</div>
			</div>

		</div>

		<script type="text/javascript">jssor_1_slider_init();</script>
		<!-- #endregion Jssor Slider End -->

		</section>
		<!--FIM DA SECTION QUE SÓ TEM O SLIDER-->

	</div>

<section id="lancamentos_container_mobile">
	
	<h3>Últimos lançamentos em <?php echo"$tipo";?></h3>
	
	<div id="lancamentos_mobile">
		
		<div class='mobile_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='mobile_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='mobile_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='mobile_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='mobile_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
	</div>
	
	<div class='lancamentos_btn'>

		<a href='ficha_tecnica.php?selecionado=$id&categoria=filmes'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Ver todos</button></a>

	</div>
	
</section>

<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	

<section class="noticias_container">
	
    <article class="lista_noticias">
    	<h3>Últimas notícias</h3>
    	<p><a href="noticias_index.php">Ver todas</a></p>
    	
	    <?php
    include "config/conectar.php";
    $qtde_registros = 8;
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
		
	if ($tipo == 1){$tipo_icon = "<i class='fas fa-film'></i>";}
	if ($tipo == 2){$tipo_icon = "<i class='fas fa-gamepad'></i>";}
	if ($tipo == 3){$tipo_icon = "<i class='fas fa-tv'></i>";}
		
	?>
	
	
	<div class='noticia'>

				<div class='imgNoticia'>
					<img src='img/noticias/<?php echo $img; ?>' alt='<?php echo $img; ?>'>

				</div>

				<div class='infoNoticiaContainer'>
					<div class='infoNoticia'>

						<button type='button' class='<?php echo $tipo_categoria; ?>'><?php echo $tipo_icon; ?></button>

						<p><i class="far fa-calendar-alt"></i> <?php echo $data; ?> &thinsp;&thinsp;&thinsp;&thinsp;<i class="fas fa-user"></i> <?php echo $autor; ?></p>

					</div>

					<div class='chamadaNoticia'>
						<p><a href='noticia.php?news=<?php echo $idnoticia; ?>&categoria=<?php echo $tipo; ?>'><?php echo $titulo; ?></a></p>
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
	
</section>	

<aside class="categorias_lancamento_container">
	
	
	
</aside>																
	
</div> <!--FIM DO CORPO DO SITE-->	
	
	
<div id="submenu_inferior">
	
	<?php
		require('submenu.php');
	?>
	
</div>
	
	
<footer>
	
	<div id="logo_rodape">
		<img src="img/logo.png" alt="logo do site">
	</div>
	
	<div id="rodape_info">
		<p>2018 Todos os diretos reservados</p>
	</div>		
		
</footer>	
	
</main>

<script>

	//service worker

  	if ('serviceWorker' in navigator) {
  		navigator.serviceWorker.register('js/service-worker.js')
    	.then(function () {
        console.log('service worker registered');
      })
      .catch(function () {
        console.log('service worker failed');
      });
  }

</script>
	
</body>
</html>