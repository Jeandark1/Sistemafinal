


/*=============================================
EDITAR MATERIA
=============================================*/
$(document).on('click', '.btnEditarmateria',function (e) {

// $(".btnEditarmateria").click(function(){
    
	var idmateria = $(this).attr("idmateria");
	console.log("idmateria:",idmateria);
	var datos = new FormData();
	datos.append("idmateria", idmateria);
	
	$.ajax({

		url:"ajax/materia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuestas ",respuesta);


            $("#editarnombrem").val(respuesta["nombre_m"]);
			$("#editarsigla").val(respuesta["sigla"]);
			$("#editarfolio").val(respuesta["folio"]);
			$("#editarlibro").val(respuesta["libro"]);
			$("#editargestion").val(respuesta["gestion"]);
            $("#editarestapa").html(respuesta["fecha_curso"]);
            $("#editarestapa").val(respuesta["fecha_curso"]);
            $("#editardocente").val(respuesta["docente"]);
            
            
		}

	});

})

/*=============================================
ELIMINAR MATERIA
=============================================*/
$(document).on('click', '.btnEliminarmateria',function (e) {

// $(".btnEliminarmateria").click(function(){
	
    var idmateria = $(this).attr("idmateria");
    var materia = $(this).attr("materia");
  
    swal({
      title: '¿Está seguro de borrar el materia?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar materia!'
    }).then((result)=>{
  
      if(result.value){
  
        window.location = "index.php?ruta=materia&idmateria="+idmateria+"&materia="+materia;
  
      }
  
    })
  
  })

/*=============================================
GENERAR PDF LISTA DE MATERIAS
=============================================*/
$(document).on('click', '.btnimplistamateria',function (e) {

// $(".btnimplistamateria").click(function(){
  var si='si';
    if(si != null){   
    generarpdflista(si);                                      
  }
})

function generarpdflista(si){
var ancho = 1000;
var alto = 800;
//calcular posicion x, y para centrar la ventana
var x = parseInt((window.screen.width/2)-(ancho/2));
var y = parseInt((window.screen.height/2)-(alto/2));
window.open("extensiones/pdfs/listamateria.php?si="+si,"LISTA DE LA MATERIA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


   /*=============================================
   LISTA DE LA MATERIA
=============================================*/
$(document).on('click', '.btnlistademateria',function (e) {

// $(".btnlistademateria").click(function(){
	
  var idmaterias = $(this).attr("idmaterias");
  //var materia = $(this).attr("materia");
  
  swal({
    title: '¿Desea ver la Lista de Inscritos?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Ver La Lista!'
  }).then((result)=>{

    if(result.value){
      // +"&materia="+materia                        
      window.location = "index.php?ruta=inscribir&idmaterias="+idmaterias;

    }

  })

})
  
/*=============================================
GENERAR PDF LISTA DE ESTUDIANTES POR MATERIA
=============================================*/
$(document).on('click', '.estudiant',function (e) {


// $(".estudiant").click(function(){
	var codmateria = $(this).attr("codmateria");
	console.log("este es el codigo",codmateria);
      if(codmateria != null){   
		  generarpdflista(codmateria);                                      
		}
  })

function generarpdflista(codmateria){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/estudiantelista.php?codmateria="+codmateria,"LISTA DE LA MATERIA","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


/*=============================================
EDITAR REGISTRO DE NOTAS
=============================================*/
$(document).on('click', '.btneditarnotas',function (e) {

// $(".btneditarnotas").click(function(){
    
  var estudianteidedi = $(this).attr("estudianteidedi");
  var materiaidedi = $(this).attr("materiaidedi");
	var nota1edi = $(this).attr("nota1edi");
	var nota2edi = $(this).attr("nota2edi");
  var nota3edi = $(this).attr("nota3edi");
	var nomedi = $(this).attr("nomedi");
      
  console.log("respuestas ",nota3edi);

      $("#editaridest").val(estudianteidedi);
			$("#namemateria").val(nomedi);
			$("#editaridmateria").val(materiaidedi);
			$("#editarnota1").val(nota1edi);
			$("#editarnota2").val(nota2edi);
      $("#editarnota3").html(nota3edi);
      promedio(); 
            
})


function promedio(){
/*=============================================
  EDITAR PROMEDIO DE NOTAS
=============================================*/
$("#editarnota1"&&"#editarnota2"&&"#editarnota3").change(function(){

  var apr="Aprobado";
  var rep="Reprobado";
  var aba="Abandono";
  var nota1 = parseInt(document.getElementById("editarnota1").value);
  var nota2 = parseInt(document.getElementById("editarnota2").value);
  var nota3 = parseInt(document.getElementById("editarnota3").value);


  notafinal=parseFloat((nota1+nota2+nota3)/3);
  document.getElementById('editarnotaf').innerHTML = ((nota1+nota2+nota3)/3);
  
  
  if(nota1!=0 && nota2!=0 && nota3!=0 ){

    if(notafinal>= 51){
    
     $("#editarobservaciones").val(apr);
     $("#editarobservacion").html(apr);
     $("#editarnotafinal").val(notafinal);
    }else{
  
     $("#editarobservaciones").val(rep);
     $("#editarobservacion").html(rep);
     $("#editarnotafinal").val(notafinal);
    }
  }else{
 
  $("#editarobservaciones").val(aba);
  $("#editarobservacion").html(aba);
  $("#editarnotafinal").val(notafinal);
  }
})

}



/*=============================================
ELIMINAR ESTUDIANTE DE LA MATERIA  
=============================================*/

$(document).on('click', '.btneliminardemateria',function (e) {

// $(".btneliminardemateria").click(function(){
	
  var estudiantelisid = $(this).attr("estudiantelisid");
  var materiaidlista = $(this).attr("materiaidlista");
  
  swal({
    title: '¿Desea eliminar al estudiante de la materia?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si,Deseo Eliminarlo!'
  }).then((result)=>{
    if(result.value){                                  
      window.location = "index.php?ruta=inscribir&estudiantelisid="+estudiantelisid+"&materiaidlista="+materiaidlista;

    }

  })

})


/*=============================================
VALIDAR AUTOCOMPLETADO
=============================================*/

$("#nuevasigla").change(function(){
	
	$(".alert").remove();
      var siglas =(document.getElementById("nuevasigla").value);
      console.log("siglas:",siglas);
      var datos = new FormData();
	datos.append("siglas",siglas);
	
	$.ajax({

		url:"ajax/materia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        dataType: "json",
        success: function(respuesta){

			console.log("elementos: ",respuesta);
      $("#nuevonombrem").val(respuesta["nombre_m"]);
        }
	});
})

