/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/

$(".nuevafoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevafoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevafoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;
  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on('click', '.btnEditarUsuario',function (e) {

	
	var idusuario = $(this).attr("idusuario");
	console.log("idusuario:",idusuario);
	var datos = new FormData();
	datos.append("idusuario", idusuario);
	
	$.ajax({

		url:"ajax/usuarios.ajax.php",
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
			$("#editarCi").val(respuesta["dni"]);
			$("#editarnrocel").val(respuesta["celular"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarcargo").val(respuesta["cargo"]);
			$("#editaremail").val(respuesta["email"]);
			$("#passwordActual").val(respuesta["password"]);
			$("#fotoActual").val(respuesta["foto"]);
			
			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

            }
		}

	});



})



/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).on('click', '.btnActivar',function (e) {

	var idusuario = $(this).attr("idusuario");
	var estadousuario = $(this).attr("estadousuario");

	var datos = new FormData();
		datos.append("activarId", idusuario);
		 datos.append("activarUsuario", estadousuario);
   
		 $.ajax({
   
		 url:"ajax/usuarios.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 success: function(respuesta){
   
		 }
   
		 })
   
		 if(estadousuario == 0){
   
			 $(this).removeClass('btn-success');
			 $(this).addClass('btn-danger');
			 $(this).html('Desactivado');
			 $(this).attr('estadousuario',1);
   
		 }else{
   
			 $(this).addClass('btn-success');
			 $(this).removeClass('btn-danger');
			 $(this).html('Activado');
			 $(this).attr('estadousuario',0);
		 }
})


/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/


$("#nuevousuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevousuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevousuario").val("");

	    	}

	    }

	})
})


/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on('click', '.btnEliminarUsuario',function (e) {
	
  var idusuario = $(this).attr("idusuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=usuarios&idusuario="+idusuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})




/*=============================================
ACCESOS U
=============================================*/
$(document).on('click', '.btnsusecreto',function (e) {

	var registro = $(this).attr("idusuariosecret");
	
	swal({
	  title: '¿Deseas entrar a Accesos?',
	  text: "¡Si no esta seguro puede Cancelar la Accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, entrar al acceso!'
	}).then((result)=>{
  
	  if(result.value){
  
		window.location = "index.php?ruta=admacces&registro="+registro;
  
	  }
  
	})
  
  })
  


  /*=============================================
ACTIVAR USUARIO MOD1
=============================================*/


$(document).on('click', '.btnActivarmod1',function (e) {

	var idusuariomod1 = $(this).attr("idusuariomod1");
	var estadousuariomod1 = $(this).attr("estadousuariomod1");

	var datos = new FormData();
		datos.append("activarIdmod1", idusuariomod1);
		 datos.append("activarUsuariomod1", estadousuariomod1);
   
		 $.ajax({
   
		 url:"ajax/usuarios.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 success: function(respuesta){
   
		 }
   
		 })
   
		 if(estadousuariomod1 == 0){
   
			 $(this).removeClass('btn-success');
			 $(this).addClass('btn-danger');
			 $(this).html('Desactivado');
			 $(this).attr('estadousuariomod1',1);
   
		 }else{
   
			 $(this).addClass('btn-success');
			 $(this).removeClass('btn-danger');
			 $(this).html('Activado');
			 $(this).attr('estadousuariomod1',0);
		 }
})


/*=============================================
ACTIVAR USUARIO MOD2
=============================================*/
$(document).on('click', '.btnActivarmod2',function (e) {

	var idusuariomod2 = $(this).attr("idusuariomod2");
	var estadousuariomod2 = $(this).attr("estadousuariomod2");

	var datos = new FormData();
		datos.append("activarIdmod2", idusuariomod2);
		 datos.append("activarUsuariomod2", estadousuariomod2);
   
		 $.ajax({
   
		 url:"ajax/usuarios.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 success: function(respuesta){
   
		 }
   
		 })
   
		 if(estadousuariomod2 == 0){
   
			 $(this).removeClass('btn-success');
			 $(this).addClass('btn-danger');
			 $(this).html('Desactivado');
			 $(this).attr('estadousuariomod2',1);
   
		 }else{
   
			 $(this).addClass('btn-success');
			 $(this).removeClass('btn-danger');
			 $(this).html('Activado');
			 $(this).attr('estadousuariomod2',0);
   
		 }

})




/*=============================================
ACTIVAR USUARIO MOD3
=============================================*/
$(document).on('click', '.btnActivarmod3',function (e) {
	
	var idusuariomod3 = $(this).attr("idusuariomod3");
	var estadousuariomod3 = $(this).attr("estadousuariomod3");

	var datos = new FormData();
		datos.append("activarIdmod3", idusuariomod3);
		 datos.append("activarUsuariomod3", estadousuariomod3);
   
		 $.ajax({
   
		 url:"ajax/usuarios.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 success: function(respuesta){
   
		 }
   
		 })
   
		 if(estadousuariomod3 == 0){
   
			 $(this).removeClass('btn-success');
			 $(this).addClass('btn-danger');
			 $(this).html('Desactivado');
			 $(this).attr('estadousuariomod3',1);
   
		 }else{
   
			 $(this).addClass('btn-success');
			 $(this).removeClass('btn-danger');
			 $(this).html('Activado');
			 $(this).attr('estadousuariomod3',0);
   
		 }

})



/*=============================================
ACTIVAR USUARIO MOD4
=============================================*/
$(document).on('click', '.btnActivarmod4',function (e) {

	var idusuariomod4 = $(this).attr("idusuariomod4");
	var estadousuariomod4 = $(this).attr("estadousuariomod4");

	var datos = new FormData();
		datos.append("activarIdmod4", idusuariomod4);
		 datos.append("activarUsuariomod4", estadousuariomod4);
   
		 $.ajax({
   
		 url:"ajax/usuarios.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 success: function(respuesta){
   
		 }
   
		 })
   
		 if(estadousuariomod4 == 0){
   
			 $(this).removeClass('btn-success');
			 $(this).addClass('btn-danger');
			 $(this).html('Desactivado');
			 $(this).attr('estadousuariomod4',1);
   
		 }else{
   
			 $(this).addClass('btn-success');
			 $(this).removeClass('btn-danger');
			 $(this).html('Activado');
			 $(this).attr('estadousuariomod4',0);
   
		 }

})

/*=============================================
VALIDAR CONTRASEÑA
=============================================*/

$("#controlps").change(function(){
	
	$(".alert").remove();
	
	var pas = $(this).val();
	var espacios = false;
	var cont = 0;
	
	while (!espacios && (cont < pas.length)) {
	  if (pas.charAt(cont) == " ")
		espacios = true;
	  cont++;
	}

	if (espacios) {
		$("#controlps").parent().after('<div class="alert alert-warning">El passwoord no debe contener espacio</div>');
	    $("#controlps").val("");
	  }
 if (pas.length >= 7) {
		
	  }else{
		$("#controlps").parent().after('<div class="alert alert-warning">El passwoord debe tener minimo 7 digitos de tamaño</div>');
	    $("#controlps").val("");
	  }
})


// /*=============================================
// validar fecha
// =============================================*/
// $("#fechancu").change(function(){
	
// 	$(".alert").remove();
	
// 		  var fec = $(this).val();
		 
//       var hoy  = new Date();
//       var fechaFormulario = new Date(fec);

//            // Compara solo las fechas => no las horas!!
//           hoy.setHours(0,0,0,0);

//            if (hoy >= fechaFormulario) {
  
//               }
//                 else {
// 					$("#fechancu").parent().after('<div class="alert alert-warning">la fecha de nac. no puede superar a la fecha actual</div>');
// 					$("#fechancu").val("");
// 				}
// })

/*=============================================
 ACTIVAR Y DESACTIVADOR OBSEERVADOR DE CONTRASEÑA
=============================================*/

$(".btnActivarvista").change(function(){
	var estadousuario = $(this).attr("activarver");
	if(estadousuario == 1){

		$(this).addClass('blanco');
		$(this).removeClass('bg-black-active');
		$(this).attr('activarver',0);
		$("#pass").attr("type","password");

		
	}else{
		$(this).removeClass('blanco');
		$(this).addClass('bg-black-active');
		$(this).attr('activarver',1);
		$("#pass").removeAttr("type");
	}

	
	});


