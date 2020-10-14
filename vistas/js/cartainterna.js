


/*=============================================
GENERAR PDF DE HISTORIAL DE CARTA INTERNA
=============================================*/
$(document).on('click', '.btnhistorialinterna',function (e) {

// $(".btnhistorialinterna").click(function(){


    var codcartainterna = $(this).attr("codcartainterna");
    
    
      if(codcartainterna != null){   
		  generarpdf(codcartainterna);                                      
		//window.open("extensiones/pdfs/cartapdf.php?codcartainterna="+codcartainterna);
	}
  })

function generarpdf(codcartainterna){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/historialci.php?codcartainterna="+codcartainterna,"HISTORIAL DE CARTA INTERNA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


/*=============================================
GENERAR PDF DE HISTORIAL DE CARTA EXTERNA
=============================================*/
$(document).on('click', '.btnhistorialexterna',function (e) {

// $(".btnhistorialexterna").click(function(){


    var codcartahistorialexterna = $(this).attr("codcartahistorialexterna");
    var idusuinternas = $(this).attr("idusuinternas");
   
      if(codcartahistorialexterna != null){   
		  generarpdfes(codcartahistorialexterna);                                      
		//window.open("extensiones/pdfs/cartapdf.php?codcartahistorialexterna="+codcartahistorialexterna);
	}
  })

function generarpdfes(codcartahistorialexterna){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/historialce.php?codcartahistorialexterna="+codcartahistorialexterna,"HISTORIAL DE CARTA INTERNA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}



 /*=============================================
GENERAR PDF DE LA CARTA CREADA
=============================================*/

$(document).on('click', '.btnimprimirecartac',function (e) {

// $(".btnimprimirecartac").click(function(){
	var codcartac = $(this).attr("codcartac");
	console.log("este es el codigo",codcartac);
      if(codcartac != null){   
		  generarpdfc(codcartac);                                      
		//window.open("extensiones/pdfs/cartapdf.php?codcartac="+codcartac);
	}
  })

function generarpdfc(codcartac){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/cartapdf.php?codcartac="+codcartac,"CARTA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


