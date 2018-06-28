// JavaScript Document


//#####################################
	//EVENTO TROCA DE CLASSES
	//Destaca e exibe/oculta dives com conteudos de cada titulo da página


document.getElementById("lista").addEventListener("click", function (){
		
		
	var element = document.getElementById("lista");	
	element.classList.toggle("info_ativa");	
	
	var element = document.getElementById("lista2");	
	element.classList.remove("info_ativa");		
		
	var element = document.getElementById("lista3");	
	element.classList.remove("info_ativa");		

	var element = document.getElementById("info");
	element.classList.toggle("invisivel");
		
	var element = document.getElementById("info2");
	element.classList.add("invisivel");		
			
	var element = document.getElementById("info3");
	element.classList.add("invisivel");
		
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