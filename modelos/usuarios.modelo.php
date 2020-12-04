<?php

require_once "conexion.php";

class ModeloUsuarios{
	
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function MdlMostrarUsuarios($tabla, $item, $valor){
		if($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt -> fetch();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
				$stmt->execute();
				return $stmt -> fetchAll();
			}
			$stmt->close();
			$stmt = null;
	}
/*=============================================
	INGRESAR USUARIO
=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos,$trot,$llave,$estados)
    {
		if($llave === "Administrador"){
			
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,ap_paterno,ap_materno,usuario,password,perfil,foto,estado,genero,email,celular,direccion,dni,cargo,fech_nac,esta_superu) VALUES ( :nombre,:ap_paterno,:ap_materno,:usuario,:password,:perfil,:foto,:estado,:genero,:email,:celular,:direccion,:dni,:cargo,:fech_nac,:esta_superu)");
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":ap_paterno", $datos["ap_paterno"], PDO::PARAM_STR);
			$stmt->bindParam(":ap_materno", $datos["ap_materno"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
			$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
			$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
			$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
			$stmt->bindParam(":fech_nac", $datos["fech_nac"], PDO::PARAM_STR);
			$stmt->bindParam(":esta_superu",$trot, PDO::PARAM_STR);
			$stmt->bindParam(":estado",$estados, PDO::PARAM_STR);

			if ($stmt->execute()) {return "ok";} else {return "error";}
			$stmt->close();
            $stmt = null;

		}else
		{
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,ap_paterno,ap_materno,usuario,password,perfil,foto,genero,email,celular,direccion,dni,cargo,fech_nac) VALUES ( :nombre,:ap_paterno,:ap_materno,:usuario,:password,:perfil,:foto,:genero,:email,:celular,:direccion,:dni,:cargo,:fech_nac)");
		
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":ap_paterno", $datos["ap_paterno"], PDO::PARAM_STR);
			$stmt->bindParam(":ap_materno", $datos["ap_materno"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
			$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
			$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
			$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
			$stmt->bindParam(":fech_nac", $datos["fech_nac"], PDO::PARAM_STR);
			


			if ($stmt->execute()) {return "ok";} else {return "error";}
			$stmt->close();
        $stmt = null;
		}

		echo "<script>";
			echo "alert('";
			echo  $trot;
		    echo "')</script>";
	}
	/*=============================================
	EDITAR USUARIO
=============================================*/
	static public function mdlEditarUsuario($tabla, $datos){
		
		if($datos["perfil"] == "Administrador"){
			$cont="1";

			$stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre , ap_paterno = :ap_paterno, ap_materno = :ap_materno ,password = :password , perfil=:perfil, email=:email,celular=:celular,dni=:dni,cargo=:cargo ,foto=:foto ,esta_superu=:esta_superu WHERE usuario =:usuario");
		

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":ap_paterno", $datos["ap_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":ap_materno", $datos["ap_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    	$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":esta_superu",$cont, PDO::PARAM_STR);

		if($stmt -> execute()){ return "ok";  }else{ return "error";}
		$stmt -> close();
		$stmt = null;

		}else
		{
			$cont="0";
			$stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre , ap_paterno = :ap_paterno, ap_materno = :ap_materno ,password = :password , perfil=:perfil, email=:email,celular=:celular,dni=:dni,cargo=:cargo ,foto=:foto,esta_superu=:esta_superu WHERE usuario =:usuario");
		
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":ap_paterno", $datos["ap_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":ap_materno", $datos["ap_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    	$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":esta_superu",$cont, PDO::PARAM_STR);

		if($stmt -> execute()){return "ok";	}else{return "error";	}
		$stmt -> close();
		$stmt = null;
		}


		// $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre , ap_paterno = :ap_paterno, ap_materno = :ap_materno ,password = :password , perfil=:perfil, email=:email,celular=:celular,dni=:dni,cargo=:cargo ,foto=:foto WHERE usuario =:usuario");
		

		// $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		// $stmt->bindParam(":ap_paterno", $datos["ap_paterno"], PDO::PARAM_STR);
		// $stmt->bindParam(":ap_materno", $datos["ap_materno"], PDO::PARAM_STR);
		// $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		// $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		// $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    	// $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		// $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		// $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		// $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		// $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		// if($stmt -> execute()){

		// 	return "ok";
		
		// }else{

		// 	return "error";	

		// }

		// $stmt -> close();

		// $stmt = null;

	}
/*=============================================
	SACTUALIZAR DATOS USUARIO
=============================================*/
	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	
/*=============================================
	BORRAR USUARIO
=============================================*/
static public function mdlBorrarUsuario($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_user = :cod_user");

	$stmt -> bindParam(":cod_user", $datos, PDO::PARAM_INT);

	if($stmt -> execute()){

		return "ok";
	
	}else{

		return "error";	

	}

	$stmt -> close();

	$stmt = null;


}


/*=============================================
	SACTUALIZAR DATOS USUARIO MOD1
=============================================*/
static public function mdlActualizarUsuariomodgeneral($tabla, $item1, $valor1, $item2, $valor2){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

	$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
	$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

	if($stmt -> execute()){

		return "ok";
	
	}else{

		return "error";	

	}

	$stmt -> close();

	$stmt = null;

}

}