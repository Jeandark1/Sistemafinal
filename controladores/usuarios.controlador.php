<?php




class ControladorUsuarios{
	
	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

	            $encriptar = crypt( $_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$item = "usuario";
				$valor = $_POST["ingUsuario"];
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					if($respuesta["estado"] == 1){
						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["cod_user"] = $respuesta["cod_user"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["ap_paterno"] = $respuesta["ap_paterno"];
						$_SESSION["ap_materno"] = $respuesta["ap_materno"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["dni"] = $respuesta["dni"];
						/*=============================================
						MODULOS DE ACCESO
						=============================================*/
						$_SESSION["esta_estudiante"] = $respuesta["esta_estudiante"];
						$_SESSION["esta_materias"] = $respuesta["esta_materias"];
						$_SESSION["esta_plan_estudio"] = $respuesta["esta_plan_estudio"];
						$_SESSION["esta_correspondencia"] = $respuesta["esta_correspondencia"];
						$_SESSION["esta_superu"] = $respuesta["esta_superu"];
						
						 /*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/La_Paz');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;
                        
						$item1 = "ultimo_login";
						$valor1 = $fechaActual;
						
						$item2 = "cod_user";
						$valor2 = $respuesta["cod_user"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if($ultimoLogin == "ok"){

							echo '<script>
	
							window.location = "inicio";
	
						</script>';

						}
					}else {
					echo '<br><div class="alert alert-danger">Error El usuario esta desactivado</div>';
					# code...
					}

		

				}else{
					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}	
		}

	}
	
	static public function CtrCrearUsuario()
    {
        if (isset($_POST["nuevonombre"])) {

			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonombre"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApPaterno"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApMaterno"]) &&
			preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["Ci"]) &&
			preg_match('/^[0-9 ]+$/', $_POST["nrocel"]) &&
				preg_match('/^[a-zA-Z0-9.@ ]+$/', $_POST["email"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevousuario"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevocargo"]) &&
				preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoPassword"])
					
                ){
                /*validar imagen */
                $ruta ="";
                if (isset($_FILES["nuevafoto"]["tmp_name"])) {
					list($ancho, $alto)=getimagesize($_FILES["nuevafoto"]["tmp_name"]);          
					$nuevoAncho = 500;
                    $nuevoAlto = 500;
                   /* creamos el directorio a guardar la foto del usuario*/
                $directorio ="vistas/img/usuarios/".$_POST["nuevousuario"];
                mkdir($directorio,0755);
                   /* de acuerdo al tipo de imagen aplicamos las funciones por defecto de php*/
                   if($_FILES["nuevafoto"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/usuarios/".$_POST["nuevousuario"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevafoto"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen,0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["nuevafoto"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/usuarios/".$_POST["nuevousuario"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevafoto"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen,0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }
                
                }
	
				$tabla = "usuarios";
				$trot = "1";
	            $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$llave = $_POST["NuevoPerfil"];
				$estados = "1";
				$datos = array("nombre" => $_POST["nuevonombre"],
							   "ap_paterno" => $_POST["ApPaterno"],
							   "ap_materno" => $_POST["ApMaterno"], 
							   "dni" => $_POST["Ci"], 
							   "celular" => $_POST["nrocel"], 
							   "genero" => $_POST["generoc"],  
							   "fech_nac" => $_POST["fecha"], 
							   "perfil" => $_POST["NuevoPerfil"],
							   "usuario" => $_POST["nuevousuario"], 
							   "cargo" => $_POST["nuevocargo"], 
                               "password" =>$encriptar,
                              "email" => $_POST["email"],
							 "foto"=>$ruta);
							 
							                
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos,$trot,$llave,$estados);

             
                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL USUARIO A SIDO GUARDADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "usuarios";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El usuario no ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "usuarios";
            }
        });
        </script>';

                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡El usuario no pude usar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "usuarios";
            }
        });
        </script>';
            }

        }
	}
	static public function ctrMostrarUsuarios($item, $valor){
		
		$tabla = "usuarios";
		
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
    }
	
	
    	/*=============================================
	EDITAR USUARIO
	=============================================*/
	
	static public function ctreditarUsuario(){
		
		if(isset($_POST["editarnombre"])){
			

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre"])  
				
			
			
			){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];
				if(isset($_FILES["editarfoto"]["tmp_name"]) && !empty($_FILES["editarfoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarfoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];
					
					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);
					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    
					if($_FILES["editarfoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarfoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarfoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarfoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuarios";
               
				if($_POST["editarpassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarpassword"])){

						$encriptar = crypt($_POST["editarpassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									  }).then((result) => {
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar=$_POST["passwordActual"];
					
				}
			  
			  $datos = array("nombre" => $_POST["editarnombre"],
							  "ap_paterno" => $_POST["editarApPaterno"],
							  "ap_materno" => $_POST["editarApMaterno"], 
							  "usuario" => $_POST["editarUsuario"], 
							  "password" =>$encriptar,
							  "perfil" => $_POST["editarPerfil"], 
							  "foto"=>$ruta,
							  "email" => $_POST["editaremail"],
							  "celular" => $_POST["editarnrocel"],
							  "dni" => $_POST["editarCi"], 
							  "cargo" => $_POST["editarcargo"], 
							 );
							

							 
                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
                    
				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  text: "¡Debe Salir de Sistema y Reingresar para Actualizar al usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}
	}

	
		/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idusuario"])){
            
			$tabla ="usuarios";
			$datos = $_GET["idusuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);
           

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}

}
	


