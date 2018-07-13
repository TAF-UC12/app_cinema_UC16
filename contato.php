<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

// atribui a uma variável $paginaLink toda a URL da página
$paginaLink = $_SERVER['SCRIPT_NAME'];

// atribui a variável $paginaLink apenas o nome da página
$paginaLink = basename($_SERVER['SCRIPT_NAME']);

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Fale conosco</title>
<!--METADADOS PARA HABILITAR QUERYS DE FORMATAÇÃO PARA SITE RESPONSIVO-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no>
<meta name="mobile-web-app-capable" content="yes">


<!--LINK DO ÍCONE A SER MOSTRADO NA BARRA DE ENDEREÇOS DO NAVEGADOR-->
<link rel="shortcut icon" href="img/icon48px.png">


<!--LINKS INTERNOS DAS FOLHAS DE ESTILO CSS UTILIZADAS NA PÁGINA-->
<link href="css/estilo_v2.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/contato.css" rel="stylesheet" type="text/css">



<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<script defer src="js/fontawesome/fontawesome-all.js"></script>


<!--SCRIPT JS PARA FUNCIONAMENTO DO SLIDER DA PÁGINA-->
<script src="js/slideshow.js"></script>


</head>

<body>
<main role="main">
	
<header>
	
	<div id="logo_topo">
		<img src="img/logo.png" alt="logo do site">
	</div>	
		
	<div id="barrabusca">
	 
		
	</div>
							
	<?php
	
		include('menu.php');
	
	?>

	</header>



<!--TÍTULO DE IDENTIFICAÇÃO DA PAGINA-->
<div class='categoriaPaginaHome'>
	<p>Contato</p>
</div>
				


<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	

	
<!--CADA SECTION É COMPOSTA POR TITULO, CONTEÚDO E LINK-->


<!--SECTION COM FORMULÁRIO DE CONTATO-->
	<section>

		<h2>Fale conosco</h2>
		
			<p>Preencha abaixo o formulário de contato com sua mensagem e assunto e nossa equipe se possível irá entrar em contato!</p>
			
			
			<form name="contato" action="" method="POST">
				<fieldset>
					<fieldset class="grupo">
					
						<div class="campo">
							<label for="nome">Nome</label>
							<input type="text" id="nome" name="nome" value="" placeholder="Seu nome...">
						</div>
						
						<div class="campo">
							<label for="snome">Sobrenome</label>
							<input type="text" id="snome" name="snome" value="" placeholder="Seu sobrenome...">
						</div>
					
						<div class="campo">
							<label for="email">E-mail</label>
							<input type="text" id="email" name="email" value="" placeholder="Seu email...">
						</div>
						
					</fieldset>
					
					<fieldset class="grupo">
					
						<div class="campo">

							<label for="sinopse">Mensagem</label>

							<textarea id="subject" name="sinopse" placeholder="Digite sua mensagem..." style="height:200px"></textarea>

						</div>
						
					</fieldset>
					
					<fieldset class="grupo">

						<button type="submit" name="id"><a href="index.php?p=confirma">Enviar</a></button>
					
					</fieldset>
					
				</fieldset>
				
			</form>

	</section>	
	
	


<!--ASIDE DA PG CONTATO AINDA SEM CONTEÚDO-->
	<aside>
		
		<section>

			<div class="midias_sociais">
			
				<img src="img/logo.png" alt="logo do site">

				<p>Siga nossas redes sociais e fique por dentro das últimas novidades!</p>

				<div>
					
					<a href="#"><i class="fab fa-facebook-square"></i></a>
					<a href="#"><i class="fab fa-twitter-square"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-snapchat-square"></i></a>

				</div>
			
			</div>

		</section>

		
	</aside>
	
	
	
</div> <!--FIM DO CORPO DO SITE-->	
	



<!--MENU INFERIOR SOMENTE VISÍVEL NAS VERSOES MOBILE-->		
<div id="submenu_inferior">
	
	<?php
		require('submenu.php');
	?>
	
</div>


<!--FOOTER SOMENTE VISIVEL NA VERSÃO DESKTOP
	MOBILE E TELAS MENORES ELE FICA OCULTO PELO MENU INFERIOR-->		
<footer>
	
	<div id="logo_rodape">
		<img src="img/logo.png" alt="logo do site">
	</div>
	
	<div id="rodape_info">
		<p>2018 Todos os diretos reservados</p>
	</div>		
		
</footer>	

		
</main>



<!--SCRIPT JS DO SERVICE WORKER
	Chama script que habilita o service_worker.js-->
	
<script src="js/chama_service-worker.js"></script>

<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
	<script src="js/jquery-3.3.1.js" type="text/javascript"></script>	

</body>

</html>