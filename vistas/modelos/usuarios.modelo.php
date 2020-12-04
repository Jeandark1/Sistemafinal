<!-- <?php

// require_once "conexion.php";

// class ModeloUsuarios{

	
// 	/*=============================================
// 	MOSTRAR USUARIOS
// 	=============================================*/
// 	static public function mdlMostrarUsuarios($tabla, $item, $valor){
		
// 		if($item != null) {
// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
// 		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
// 		$stmt -> execute();
// 		return $stmt -> fetch();
// 	}else{

// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
// 		$stmt->execute();
// 		return $stmt -> fetchAll();
// 	}	$stmt->close();
// 	$stmt = null;
//    }


  
//    public static function mdlIngresarUsuario($tabla, $datos)
//    {
// 	 $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,password,perfil,foto,email) VALUES ( :usuario,:password, :perfil,:foto, :email )");
                                                 
// 	   $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
// 	   $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
// 	   $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
// 	   $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
// 	   $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
// 	   if ($stmt->execute()) {return "ok";} else {return "error";}
// 	   $stmt->close();
// 	   $stmt = null;
//    } 

   

// } -->