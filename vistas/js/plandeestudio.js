/*=============================================
EDITAR PLAN DE ESTUDIO
=============================================*/
$(document).on('click', '.btnEditarplandeestudios',function (e) {


// $(".btnEditarplandeestudios").click(function(){
    
	var idplanestudio = $(this).attr("idplanestudio");
	console.log("idplanestudio:",idplanestudio);
	var datos = new FormData();
	datos.append("idplanestudio", idplanestudio);
	$.ajax({

		url:"ajax/planestudio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuestas ",respuesta);
            $("#editarnombreplan").val(respuesta["nombrepl"]);
			$("#editarfechainiciopl").val(respuesta["fech_ini"]);
			$("#editarfechafinalpl").val(respuesta["fech_fin"]);
            $("#editarnmencion").val(respuesta["mencion"]);
            $("#codplane").val(idplanestudio);
		}
	});
})

/*=============================================
ELIMINAR PLAN DE ESTUDIO
=============================================*/

$(document).on('click', '.btnEliminarplanestudio',function (e) {


// $(".btnEliminarplanestudio").click(function(){
	
    var idplane = $(this).attr("idplane");
    
    swal({
      title: '¿Está seguro de borrar el Plan de Estudio?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar estudiante!'
    }).then((result)=>{
  
      if(result.value){
                                                                    
        window.location = "index.php?ruta=plandeestudios&idplane="+idplane;
  
      }
  
    })
  
  })
  /*=============================================
AGREGAR A MATERIA A PLAN DE ESTUDIO
=============================================*/

$(document).on('click', '.btnagrmateriaplane',function (e) {

// $(".btnagrmateriaplane").click(function(){
	var  codplan = $(this).attr("codplan");
	console.log("codplan:",codplan);
            $("#idmateriaplan").val(codplan);
})

/*=============================================
LISTA DE MATERIAS DEL PLAN DE ESTUDIOS
=============================================*/
$(document).on('click', '.btnlistamaterias',function (e) {

// $(".btnlistamaterias").click(function(){

  var codigoplane = $(this).attr("codigoplane");
  swal({
    title: '¿Desea ver la Lista de Materias?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Ver Materias!'
  }).then((result)=>{
    if(result.value){                                      
      window.location = "index.php?ruta=listadeplandeestudio&codigoplane="+codigoplane;

    }

  })

})




/*=============================================
ELIMINAR MATERIA DE PLAN DE ESTUDIO
=============================================*/
$(document).on('click', '.btnEliminarmateriaplan',function (e) {

// $(".btnEliminarmateriaplan").click(function(){
	
    var codplanest = $(this).attr("codplanest");
    var idmateria = $(this).attr("idmateria");
    
    
    swal({
      title: '¿Está seguro de borrar la Materia del Plan?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Deseo Borrar!'
    }).then((result)=>{
  
      if(result.value){
                                                                    
        window.location = "index.php?ruta=listadeplandeestudio&codplanest="+codplanest+"&idmateria="+idmateria;
  
      }
  
    })
  
  })

 /*=============================================
GENERAR PDF DE LISTA DE MATERIAS DEL PLAN DE ESTUDIO
=============================================*/

$(document).on('click', '.btnlistadeplan',function (e) {

// $(".btnlistadeplan").click(function(){

    var codigoplans = $(this).attr("codigoplans");
    console.log("este es el codigo de la carta ",codigoplans);
      if(codigoplans != null){   
		  generarpdfesplane(codigoplans);                                      
		//window.open("extensiones/pdfs/cartapdf.php?codigoplans="+codigoplans);
	}
  })

function generarpdfesplane(codigoplans){
 var ancho = 1000;
 var alto = 800;
 //calcular posicion x, y para centrar la ventana
 var x = parseInt((window.screen.width/2)-(ancho/2));
 var y = parseInt((window.screen.height/2)-(alto/2));
 window.open("extensiones/pdfs/listaplan.php?codigoplans="+codigoplans,"MATERIAS DE PLAN DE ESTUDIOS","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}





// /*=============================================
// validar fecha
// =============================================*/
// $("#nmencion").change(function(){
	
// 	$(".alert").remove();
	
//       var fechinicial =(document.getElementById("fechainiciopl").value);
//       var fechfinal =(document.getElementById("fechafinalpl").value);
//       console.log("idusuario1:",fechinicial);
//       console.log("idusuario2:",fechfinal);

//       if( (new Date(fechfinal).getTime() >= new Date(fechinicial).getTime()))
//       {
        
//       }else{
//         $("#fechainiciopl").parent().after('<div class="alert alert-warning">LA FECHA INICIAL DEBE SER MENOR A LA FECHA FINAL<br> <p class="alert alert-success">Ingrese primero la fecha y luego la mencion  </p> </div>');
//          $("#fechafinalpl").val("");
//          $("#nmencion").val("");
//       }
// })