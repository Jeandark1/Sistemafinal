/*=============================================
SUBIENDO LA FOTO DE LA CARTA
=============================================*/
$(".nuevafotocarta").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG O PDF
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "application/pdf" ){

  		$(".nuevafotocarta").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato PDF o JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevafotocarta").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen o Pdf no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){
          
            if(imagen["type"] == "application/pdf"){

                var rutaImagen ="vistas/img/pdfs/pdfs.png";
                $(".previsualizar").attr("src", rutaImagen);
                var rutaImagen = event.target.result;
          }else{
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
          }
  			

  		})

  	}
})


/*=============================================
EDITAR CARTA
=============================================*/
 
$(document).on('click', '.btnEditarcartainterna',function (e) {


// $(".btnEditarcartainterna").click(function(){
    
    var idcarta = $(this).attr("idcarta");
    var idusuario = $(this).attr("idusuario");
    console.log("idcarta:",idcarta);
	console.log("idusuario:",idusuario);
    
	var datos = new FormData();
	datos.append("idcarta",idcarta);
	
	$.ajax({

		url:"ajax/cartainterna.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        dataType: "json",
        success: function(respuesta){

			console.log("elementos: ",respuesta);
			
			$("#idcarta").val(idcarta);
            $("#editarruta").val(respuesta["ruta"]);
			$("#editarfechacarta").val(respuesta["fechacarta"]);
			$("#editarfechaplazo").val(respuesta["fechaplazo"]);
			$("#editarremitente").val(respuesta["remitente"]);
            $("#editarentidad").val(respuesta["entidad"]);
            $("#editarreceptor").val(idusuario);
            $("#editarprioridad").html(respuesta["prioridad"]);
            $("#editarprioridad").val(respuesta["prioridad"]);
            $("#editarestado").html(respuesta["estadoproceso"]);
            $("#editarestado").val(respuesta["estadoproceso"]);
			$("#editarreferencia").val(respuesta["referencia"]);
			$("#editarobservacion").val(respuesta["observacion"]);
			$("#fotoActualcarta").val(respuesta["fotocarta"]);
			
			if(respuesta["fotocarta"] != ""){

				$(".previsualizar").attr("src", respuesta["fotocarta"]);

            }
        }
	});
})


/*=============================================
ELIMINAR CARTA INTERNA
=============================================*/
$(document).on('click', '.btnEliminarcartainterna',function (e) {


// $(".btnEliminarcartainterna").click(function(){
	
    var idcartas = $(this).attr("idcartas");
	var fotocartas = $(this).attr("fotocartas");
	var remitente = $(this).attr("remitente");

    swal({
      title: '¿Está seguro de borrar el registro realmente estas seguro?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar el Registro!'
    }).then((result)=>{
  
      if(result.value){                                         
        window.location = "index.php?ruta=corespinterna&idcartas="+idcartas+"&fotocartas="+fotocartas+"&remitente="+remitente;
      }
  
    })
  
  })

/*=============================================
EDITAR CARTA CREADA
=============================================*/
$(document).on('click', '.btnEditarccarta',function (e) {
 
// $(".btnEditarccarta").click(function(){
	
	var idcartas = $(this).attr("idcartas");
	var ccarta=idcartas;
	var ciusuario = $(this).attr("ciusuario");
	
    
	var datos = new FormData();
	datos.append("idcartas",idcartas);
	
	$.ajax({

		url:"ajax/cartainterna.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        dataType: "json",
        success: function(respuesta){

			console.log("elementos: ",respuesta);
			$("#codcartac").val(ccarta);
			$("#dniuser").val(ciusuario);
			$("#editarrutacreada").val(respuesta["rutacreada"]);
			$("#editarcrearfecha").val(respuesta["fechaemicion"]);
			$("#editarlugar").val(respuesta["lugar"]);
			$("#editardirijida").val(respuesta["dirijida"]);
			$("#editarcargo").val(respuesta["cargodir"]);
			$("#editarcrearreferencia").val(respuesta["referencia"]);
			$("#editarsaludoinicial").val(respuesta["saludo"]);
			$("#editarasunto").val(respuesta["asunto"]);
			$("#editardespedida").val(respuesta["despedida"]);
			$("#editarremitentec").val(respuesta["emisor"]);
			$("#editarcargoremitente").val(respuesta["cargoemisor"]);
			$("#editarcic").val(respuesta["ciemisor"]);
			$("#editarcorreodir").val(respuesta["otro"]);
		
        }
	});
})


/*=============================================
ELIMINAR CARTA CREADA
=============================================*/
$(document).on('click', '.btnEliminarcartac',function (e) {

// $(".btnEliminarcartac").click(function(){
	
    var codcartacreada= $(this).attr("codcartacreada");
	var ciusu = $(this).attr("ciusu");
    swal({
      title: '¿Está seguro de borrar La carta realmente esta seguro?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar la carta!'
    }).then((result)=>{
  
      if(result.value){                                         
        window.location = "index.php?ruta=corespinterna&codcartacreada="+codcartacreada+"&ciusu="+ciusu;
      }
  
    })
  
  })



/*=============================================
REASIGNAR REGISTRO DE CARTA
=============================================*/
$(document).on('click', '.btnreasignar',function (e) {
 
// $(".btnreasignar").click(function(){
	
	var codcartah = $(this).attr("codcartah");
	var cartah=codcartah;
	var codusuarioh = $(this).attr("codusuarioh");
	var remitente = $(this).attr("remitente");
	var receptoract = $(this).attr("receptoract");
	
	console.log("codcartah:",codcartah);
	console.log("codusuarioh:",codusuarioh);
	console.log("remitente:",remitente);


	var datos = new FormData();
	datos.append("codcartah",codcartah);

	$.ajax({
		url:"ajax/cartainterna.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        dataType: "json",
        success: function(respuesta){

			console.log("elementos: ",respuesta);

			$("#codcartaces").val(cartah);
			$("#editarreceptorhistorial").val(codusuarioh);
			$("#editarremitentes").val(remitente);
			$("#recepactual").val(receptoract);
			$("#rutahistorial").val(respuesta["ruta"]);
			$("#editarestadohistorial").html(respuesta["estadoproceso"]);
			$("#editarestadohistorial").val(respuesta["estadoproceso"]);
			$("#editarobservacionhistorial").val(respuesta["observacion"]);
			$("#fotoActualcartahistorial").val(respuesta["fotocarta"]);
			
			if(respuesta["fotocarta"] != ""){

				$(".previsualizar").attr("src", respuesta["fotocarta"]);
            }
		
        }
	});
})


 

/*=============================================
   HISTORIAL DE CARTA INTERNA
=============================================*/

$(document).on('click', '.historialcarta',function (e) {


// $(".historialcarta").click(function(){
	
	var idcartahitorial = $(this).attr("idcartahitorial");
	var codu = $(this).attr("codu");

	swal({
	  title: '¿Desea ver el Historial de la carta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Ver La Historial!'
	}).then((result)=>{
  
	  if(result.value){
																	
		window.location = "index.php?ruta=historialcartainterna&idcartahitorial="+idcartahitorial+"&codu="+codu;
  
	  }
  
	})
  
  })
  

  /*=============================================
   HISTORIAL DE CARTA EXTERNA
=============================================*/
$(document).on('click', '.historialcartas',function (e) {

// $(".historialcartas").click(function(){
	
	var idcartahitorialex = $(this).attr("idcartahitorialex");
	var codu = $(this).attr("codu");

	swal({
	  title: '¿Desea ver el Historial de la carta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Ver La Historial!'
	}).then((result)=>{
  
	  if(result.value){																	
		window.location = "index.php?ruta=historialcartaexterna&idcartahitorialex="+idcartahitorialex+"&codu="+codu;
	  }
	})
  })
/*=============================================
VISOR DE CARTA
=============================================*/
$(document).on('click', '.btnvisor',function (e) {

// $(".btnvisor").click(function(){
    
	var fotocarta = $(this).attr("fotocarta");
			$("#fotoApre").val(fotocarta);
			if(fotocarta!= ""){
				$(".previsualizar").attr("src",fotocarta);
            }
})



/*=============================================
validar fecha de cartas 
=============================================*/
// $("#nuevoremitente").change(function(){
	
// 	$(".alert").remove();
	
//       var fechinicialci =(document.getElementById("nuevofechacarta").value);
//       var fechfinalci =(document.getElementById("nuevofechaplazo").value);
//       console.log("fecha1:",fechinicialci);
//       console.log("fecha2:",fechfinalci);

//       if( (new Date(fechfinalci).getTime() >= new Date(fechinicialci).getTime()))
//       {
        
//       }else{
//         $("#nuevofechacarta").parent().after('<div class="alert alert-warning">LA FECHA DE CARTA DEBE SER MENOR A LA FECHA PLAZO<br> <p class="alert alert-success">Ingrese primero las fecha y luego el remitente </p> </div>');
//          $("#nuevofechaplazo").val("");
//          $("#nuevoremitente").val("");
//       }
// })