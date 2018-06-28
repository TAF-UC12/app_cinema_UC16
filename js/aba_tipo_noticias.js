// JavaScript Document


//#####################################
	//EVENTO TROCA DE CLASSES



document.getElementById("abaCinema").addEventListener("click", function (){
		
		
	var element = document.getElementById("abaCinema");	
	element.classList.toggle("noticia_selecionado");	
	
	var element = document.getElementById("abaSerie");	
	element.classList.remove("sem_destaque");		
		
	var element = document.getElementById("abaGame");	
	element.classList.remove("sem_destaque");		

	var element = document.getElementById("abaTudo");	
	element.classList.remove("sem_destaque");	

		
});

	document.getElementById("lista2").addEventListener("click", function (){	

		
	var element = document.getElementById("lista");	
	element.classList.remove("info_ativa");	
	
	var element = document.getElementById("lista2");	
	element.classList.toggle("info_ativa");		
		
	var element = document.getElementById("lista3");	
	element.classList.remove("info_ativa");	
			
	 var element = document.getElementById("info");
	element.classList.add("invisivel");	
		
    var element = document.getElementById("info2");
	element.classList.toggle("invisivel");
		
		
		
	 var element = document.getElementById("info3");
	element.classList.add("invisivel");	
		
});
	
	document.getElementById("lista3").addEventListener("click", function (){
		
	var element = document.getElementById("lista");	
	element.classList.remove("info_ativa");	
	
	var element = document.getElementById("lista2");	
	element.classList.remove("info_ativa");		
		
	var element = document.getElementById("lista3");	
	element.classList.toggle("info_ativa");		
				
	 var element = document.getElementById("info");
	element.classList.add("invisivel");		
					
    var element = document.getElementById("info2");
	element.classList.add("invisivel");	
		
		
	 var element = document.getElementById("info3");
	element.classList.toggle("invisivel");	
		
});