


/*=============================================
EDITAR ESTUDIANTE
=============================================*/

// $(".btnEditarestudiante").click(function(){
    

$(document).on('click', '.btnEditarestudiante',function (e) {
	var idestudiante = $(this).attr("idestudiante");
	console.log("idestudiante:",idestudiante);
	var datos = new FormData();
	datos.append("idestudiante", idestudiante);
	
	$.ajax({

		url:"ajax/estudiante.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuestas ",respuesta);
            $("#editarnombre").val(respuesta["nombre"]);
			$("#editarApPaterno").val(respuesta["ap_paterno"]);
			$("#editarApMaterno").val(respuesta["ap_materno"]);
			$("#editarCi").val(respuesta["ci"]);
			$("#editarnrocel").val(respuesta["celular"]);
            $("#editarmatricula").val(respuesta["reg_univ"]);
            $("#editaremail").val(respuesta["email"]);
            $("#editarestado").html(respuesta["estado"]);
            $("#editarestado").val(respuesta["estado"]);
            $("#editaringreso").html(respuesta["modo_ing"]);
            $("#editaringreso").val(respuesta["modo_ing"]);
            $("#editaregreso").html(respuesta["modo_egre"]);
            $("#editaregreso").val(respuesta["modo_egre"]);
            $("#editarnacimiento").val(respuesta["fecha_nac"]);
		}
	});
})

/*=============================================
ELIMINAR ESTUDIANTE
=============================================*/
$(document).on('click', '.btnEliminarestudiante',function (e) {

// $(".btnEliminarestudiante").click(function(){
	
    var idestudiante = $(this).attr("idestudiante");
    var reg_univ = $(this).attr("reg_univ");
    
    swal({
      title: '¿Está seguro de borrar el estudiante?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar estudiante!'
    }).then((result)=>{
  
      if(result.value){
                                                                    
        window.location = "index.php?ruta=estudiantes&idestudiante="+idestudiante+"&reg_univ="+reg_univ;
  
      }
  
    })
  
  })
  
  /*=============================================
AGREGAR A MATERIA
=============================================*/
$(document).on('click', '.btnagregarestudiante',function (e) {

// $(".btnagregarestudiante").click(function(){
    
	var idestudiantes = $(this).attr("idestudiantes");
	console.log("idestudiantes:",idestudiantes);
	var datos = new FormData();
	datos.append("idestudiantes", idestudiantes);
	
	$.ajax({

		url:"ajax/estudiante.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuestas ",respuesta);
            $("#idest").val(respuesta["codest"]);
		}
	});
})

/*=============================================
BOLETA DEL ESTUDIANTE
=============================================*/
$(document).on('click', '.btnboletaestudiante',function (e) {

// $(".btnboletaestudiante").click(function(){
	
  var idestudiantito = $(this).attr("idestudiantito");
  var reg_univ = $(this).attr("reg_univ");
  
  swal({
    title: '¿Desea ver el Historial Academico?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Ver Hitorial!'
  }).then((result)=>{

    if(result.value){
                                                                  
      window.location = "index.php?ruta=boleta&idestudiantito="+idestudiantito+"&reg_univ="+reg_univ;

    }

  })

})

/*=============================================
REVISAR SI SE REPITE EL ESTUDIANTE REGISTRADO
=============================================*/

$("#Ci").change(function(){
  
   var Ci =$(this).val();
  var datos = new FormData();
  datos.append("ValidarCi",Ci);

  $.ajax({

  url:"ajax/estudiante.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  dataType: "json",
  success: function(respuesta){

        $(".alert").remove();
    if (respuesta) {
      $("#Ci").parent().after('<div class="alert alert-danger">El Estudiante Ya existe</div>');
      $("#Ci").val("");
    } else {
      
    }
    
          
  }

});
})


/*=============================================
 PROMEDIO DE NOTAS 
=============================================*/
$("#nota1"&&"#nota2"&&"#nota3").change(function(){

  var apr="Aprobado";
  var rep="Reprobado";
  var aba="Abandono";
  var nota1 = parseInt(document.getElementById("nota1").value);
  var nota2 = parseInt(document.getElementById("nota2").value);
  var nota3 = parseInt(document.getElementById("nota3").value);

    var notafinal=Math.round((nota1+nota2+nota3)/3);


  document.getElementById('notaf').innerHTML = (notafinal);
  if(nota1!=0 && nota2!=0 && nota3!=0 ){

    if(notafinal>= 51){
    
     $("#observaciones").val(apr);
     $("#observacion").html(apr);
     $("#notafinal").val(notafinal);
    }else{
  
     $("#observaciones").val(rep);
     $("#observacion").html(rep);
     $("#notafinal").val(notafinal);
    }
  }else{
 
  $("#observaciones").val(aba);
  $("#observacion").html(aba);
  $("#notafinal").val(notafinal);
  }
})

/*=============================================
validar nota1
=============================================*/
$("#nota1").change(function(){
  
  var nota1 = parseInt(document.getElementById("nota1").value);
  $(".alert").remove();
  console.log("fecha1:",nota1);
       if (nota1 >= 0 && nota1 < 101) { }
       else {
         $("#nota1").parent().after('<div class="alert alert-warning">la nota debe estar entre el rango de 1 al 100</div>');
        $("#nota1").val("");
      }	
})

/*=============================================
validar nota2
=============================================*/
$("#nota2").change(function(){

  $(".alert").remove();
  var nota2 = parseInt(document.getElementById("nota2").value);
  console.log("fecha2:",nota2);
  if (nota2 >= 0 && nota2 < 101) { }
else {
$("#nota2").parent().after('<div class="alert alert-warning">la nota debe estar entre el rango de 1 al 100</div>');
$("#nota2").val("");
}	
})

/*=============================================
validar nota3
=============================================*/
$("#nota3").change(function(){
  
  $(".alert").remove();
  var nota3 = parseInt(document.getElementById("nota3").value);
  console.log("fecha3:",nota3);
  if (nota3 >= 0 && nota3 < 101) { }
  else {
  $("#nota3").parent().after('<div class="alert alert-warning">la nota debe estar entre el rango de 1 al 100</div>');
  $("#nota3").val("");
  }	
})




/*=============================================
GENERAR PDF DE BOLETA
=============================================*/
$(document).on('click', '.btnboleta',function (e) {

// $(".btnboleta").click(function(){


	var idestudiantito = $(this).attr("idestudiantito");
	console.log("este es el codigo",idestudiantito);
      if(idestudiantito != null){   
		  generarpdfestudiante(idestudiantito);                                      
		//window.open("extensiones/pdfs/cartapdf.php?idestudiantito="+idestudiantito);
	}
  })

function generarpdfestudiante(idestudiantito){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/reporte.php?idestudiantito="+idestudiantito,"CARTA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}




/*=============================================
ELIMINAR REGISTRO DE MATERIA EN LA BOLETA DE ESTUDIANTE
=============================================*/
$(document).on('click', '.btneliminardeboleta',function (e) {

// $(".btneliminardeboleta").click(function(){
	
  var estudianteid = $(this).attr("estudianteid");
  var materiaid = $(this).attr("materiaid");
  
  swal({
    title: '¿Desea eliminar el registro de nota?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si,Deseo Eliminarlo!'
  }).then((result)=>{
    if(result.value){                                  
      window.location = "index.php?ruta=boleta&estudianteid="+estudianteid+"&materiaid="+materiaid;

    }

  })

})


/*=============================================
 GALERIA DE DOCUMENTOS DEL ESTUDIANTE
=============================================*/
$(document).on('click', '.btngaleriaest',function (e) {

// $(".btngaleriaest").click(function(){
	
  var idestgaleria = $(this).attr("idestgaleria");
  
  swal({
    title: '¿Quiere entrar a la galeria de documentos?',
    text: "¡Si no lo quiere entrar puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Ver Abrir Galeria!'
  }).then((result)=>{

    if(result.value){
                                                                  
      window.location = "index.php?ruta=galeria&idestgaleria="+idestgaleria;

    }

  })

})

  /*=============================================
  ID DEL NOMBRE DE LA CARPETA DE GALERIA
=============================================*/
$(document).on('click', '.btngleria',function (e) {

// $(".btngleria").click(function(){
    
  var rgistuniv = $(this).attr("rgistuniv");
  var idestg = $(this).attr("idesgaleria");
            $("#rgisgaleria").val(rgistuniv);
            $("#idesgaleria").val(idestg);

})


$(function () {
  $('[data-toggle="popover"]').popover()
})

$(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})


/*=============================================
VISOR DE LA GALERIA
=============================================*/
$(document).on('click', '.btnvgaleria',function (e) {

// $(".btnvgaleria").click(function(){
    
  var fotogaleria = $(this).attr("imgaleria");
  
  console.log("este es el codigo",fotogaleria);
			$("#fotogaleria").val(fotogaleria);
			if(fotogaleria!= ""){
				$(".previsualizar").attr("src",fotogaleria);
            }
})



/*=============================================
SUBIENDO LA FOTO DE LA CARTA
=============================================*/
$(".nuevacamara").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG O PDF
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "application/pdf" ){

  		$(".nuevacamara").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato PDF o JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevacamara").val("");

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
                $(".previsu").attr("src", rutaImagen);
                var rutaImagen = event.target.result;
          }else{
            var rutaImagen = event.target.result;
            $(".previsu").attr("src", rutaImagen);
          }
  			

  		})

  	}
})


/*=============================================
EDITAR DOCUMENTO DE GALERIA
=============================================*/
$(document).on('click', '.btneditargaleria',function (e) {
// $(".btneditargaleria").click(function(){
    
  var iddocumentos = $(this).attr("ediddocumento");
  var matricula = $(this).attr("regdocumento");
  var estudianteidg = $(this).attr("edidestugaleria");

  console.log("iddoc:",iddocumentos);
console.log("mtricula:",matricula);
console.log("estudiante:",estudianteidg);

var datos = new FormData();
datos.append("iddocumentos",iddocumentos);

$.ajax({

  url:"ajax/estudiante.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
      dataType: "json",
      success: function(respuesta){

    console.log("elementos: ",respuesta);
    
    $("#editarrgisgaleria").val(matricula);
    $("#editaridesgaleria").val(estudianteidg);
    $("#edidocument").val(iddocumentos);
    $("#editarntipo").html(respuesta["tipod"]);
    $("#editarntipo").val(respuesta["tipod"]);
    $("#editarntitulo").val(respuesta["tituloar"]);
    $("#editarndescripcion").val(respuesta["descripar"]);
         
    $("#Documentoactual").val(respuesta["docgaleria"]);
    
    if(respuesta["docgaleria"] != ""){

      $(".previsualizar").attr("src", respuesta["docgaleria"]);

          }
      }
});
})


/*=============================================
ELIMINAR DOCUMENTO DE GALERIA 
=============================================*/
$(document).on('click', '.btnEliminardocumento',function (e) {

// $(".btnEliminardocumento").click(function(){
	
  var elidocumentog = $(this).attr("elidocumentog");
var eliestudianteg = $(this).attr("eliestugaleria");
var elidocg = $(this).attr("elifotodoc");

  swal({
    title: '¿Está seguro de borrar el documento?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar documento!'
  }).then((result)=>{

    if(result.value){                                         
      window.location = "index.php?ruta=galeria&elidocumentog="+elidocumentog+"&eliestudianteg="+eliestudianteg+"&elidocg="+elidocg;
    }

  })

})


/*=============================================
validar fecha
=============================================*/
// $("#nacimiento").change(function(){
	
// 	$(".alert").remove();
	
// 		  var fec = $(this).val();
// 		  console.log("fecha:",fec);

//       var hoy  = new Date();
//       var fechaFormulario = new Date(fec);

//            // Compara solo las fechas => no las horas!!
//           hoy.setHours(0,0,0,0);

//            if (hoy >= fechaFormulario) {
  
//               }
//                 else {
// 					$("#nacimiento").parent().after('<div class="alert alert-warning">la fecha de nac. no puede superar a la fecha actual</div>');
// 					$("#nacimiento").val("");
				
// 				}
// })