
<?php
require_once "conexion.php";

class Modelocorespexterna{
	/*=============================================
	MOSTRAR  CARTAS EXTERNAS
    =============================================*/
	static public function MdlMostrarcorespexterna($tabla,$tabla1,$tabla2,$item, $valor){
		   
		// if($item != null) {
		// 	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		// 	$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		// 	$stmt->execute();
		// 	return $stmt -> fetch();
		// 	}else{
	
				$stmt = Conexion::conectar()->prepare("SELECT *
                FROM $tabla c, $tabla1 u, $tabla2 r 
                WHERE r.cod_carta=c.cod_carta and r.dnia= u.dni and c.tipocarta = 1");
				$stmt->execute();
				return $stmt -> fetchAll();
	
			// }
			$stmt->close();
			$stmt = null;
	}
	

	/*=============================================
	MOSTRAR  CARTA CREADA EXTERNA 
    =============================================*/
	static public function MdlMostrarcrearcartaex($tabla,$tabla1,$tabla2,$item, $valor){
	
		if($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt -> fetch();
			}else{
	
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla c,$tabla2 cc,$tabla1 u 
				WHERE cc.cod_cartacreaada = c.cod_crearcarta and cc.dni_user = u.dni and c.tipocc=1 ");
				$stmt->execute();
				return $stmt -> fetchAll();
			}
			$stmt->close();
			$stmt = null;
	}

/*=============================================
	MOSTRAR  HISTORIAL DE CARTA
    =============================================*/
	static public function MdlMostrarhistorial($item, $valor,$id,$tabla,$tabla1){
	
		if($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt -> fetch();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT a.fech_proc,u.nombre, u.ap_paterno, u.ap_materno,a.estado,a.rutahistorial,a.observacion FROM $tabla a, $tabla1 u 
				WHERE a.cod_carta = $id and a.codhistorialusu=u.cod_user ORDER by a.fech_proc ");
				$stmt->execute();
				return $stmt -> fetchAll();
			}
			$stmt->close();
			$stmt = null;
	}


/*=============================================
	INGRESAR REGISTRO DE CARTA EXTERNA
=============================================*/
	static public function mdlIngresarcartaexterna($tabla,$tabla1,$datos,$clave2,$tabla2)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta,remitente,entidad,referencia,fechaplazo,fechacarta,fotocarta,prioridad,observacion,estadoproceso,tipocarta) VALUES ( :ruta,:remitente,:entidad,:referencia,:fechaplazo,:fechacarta,:fotocarta,:prioridad,:observacion,:estadoproceso,:tipocarta)");
        
        $tipo=1;
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":remitente", $datos["remitente"], PDO::PARAM_STR);
		$stmt->bindParam(":entidad", $datos["entidad"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaplazo", $datos["fechaplazo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechacarta", $datos["fechacarta"], PDO::PARAM_STR);
		$stmt->bindParam(":fotocarta", $datos["fotocarta"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estadoproceso", $datos["estadoproceso"], PDO::PARAM_STR);
        $stmt->bindParam(":tipocarta", $tipo, PDO::PARAM_STR);

        
        if ($stmt->execute()) {$v= "ok";} else {$v="error";}
		 
		$id="cod_carta";
		$clave =controladorids::traerid($tabla,$id);
		$id="fechentre";
		$tempo =controladorids::traerid($tabla,$id);

       
		$elemento =controladorids::traerelementos($clave2);

		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(codhistorialusu,cod_carta,estado,observacion,rutahistorial) VALUES (:codhistorialusu,:cod_carta,:estado,:observacion,:rutahistorial)");
			$stmt2->bindParam(":codhistorialusu", $elemento, PDO::PARAM_STR);
			$stmt2->bindParam(":cod_carta", $clave, PDO::PARAM_STR);
			$stmt2->bindParam(":estado", $datos["estadoproceso"], PDO::PARAM_STR);
			$stmt2->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
			$stmt2->bindParam(":rutahistorial", $datos["ruta"], PDO::PARAM_STR);

			if ($stmt2->execute()) {$u= "ok";} else {$u="error";}
		
        $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1(dnia,cod_carta,fecharecib) VALUES (:dnia,:cod_carta,:fecharecib)");
        
        $stmt1->bindParam(":dnia",$clave2,PDO::PARAM_STR);                                      
        $stmt1->bindParam(":cod_carta",$clave,PDO::PARAM_STR);
        $stmt1->bindParam(":fecharecib",$tempo,PDO::PARAM_STR);
		
		if ($stmt1->execute()) {return "ok";} else {return "error";}
		
              $stmt = null;
			$stmt1 = null;
            $stmt2 = null;
			
            $stmt->close();
			$stmt1->close();
            $stmt2->close();
	}
	

	/*=============================================
	EDITAR  CARTA EXTERNA
=============================================*/
	static public function mdleditarcartaext($tabla,$tabla1,$datos,$clave2,$idcarta){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ruta = :ruta ,remitente = :remitente , entidad = :entidad ,referencia = :referencia ,fechaplazo = :fechaplazo, fechacarta = :fechacarta , prioridad = :prioridad ,observacion = :observacion,fotocarta = :fotocarta , estadoproceso = :estadoproceso WHERE  cod_carta= $idcarta");
		                                       
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":remitente", $datos["remitente"], PDO::PARAM_STR);
		$stmt->bindParam(":entidad", $datos["entidad"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaplazo", $datos["fechaplazo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechacarta", $datos["fechacarta"], PDO::PARAM_STR);
        $stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fotocarta", $datos["fotocarta"], PDO::PARAM_STR);
		$stmt->bindParam(":estadoproceso", $datos["estadoproceso"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {$v= "ok";} else {$v="error";}

            $clave =$idcarta;
        $stmt1 = Conexion::conectar()->prepare(" UPDATE $tabla1 SET  dnia = :dnia WHERE cod_carta =$clave" );
        $stmt1->bindParam(":dnia",$clave2,PDO::PARAM_STR);                                      
       
            if ($stmt1->execute()) {
             
                return "ok";} else {return "error";}
              $stmt = null;
            $stmt1 = null;
            $stmt->close();
            $stmt1->close();    
	}

/*=============================================
	BORRAR CARTA EXTERNA
=============================================*/
static public function mdlBorrarcartaext($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_carta = :cod_carta");

	$stmt -> bindParam(":cod_carta", $datos, PDO::PARAM_INT);

	if($stmt -> execute()){
		return "ok";
	}else{
		return "error";	
	   }
       $stmt = null;
       $stmt->close();
   }

/*=============================================
	CREAR CREARCARTA EXTERNA
=============================================*/
   static public function mdlcrearcex($tabla,$tabla1,$datos,$clave2){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(lugar,fechaemicion,dirijida,cargodir,referencia,saludo,asunto,despedida,emisor,cargoemisor,ciemisor,otro,rutacreada,tipocc)
	 VALUES (:lugar,:fechaemicion,:dirijida,:cargodir,:referencia,:saludo,:asunto,:despedida,:emisor,:cargoemisor,:ciemisor,:otro,:rutacreada,:tipocc)");
                       
         $tipocc=1;              
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaemicion", $datos["fechaemicion"], PDO::PARAM_STR);
		$stmt->bindParam(":dirijida", $datos["dirijida"], PDO::PARAM_STR);
		$stmt->bindParam(":cargodir", $datos["cargodir"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":saludo", $datos["saludo"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":despedida", $datos["despedida"], PDO::PARAM_STR);
		$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
		$stmt->bindParam(":cargoemisor", $datos["cargoemisor"], PDO::PARAM_STR);
		$stmt->bindParam(":ciemisor", $datos["ciemisor"], PDO::PARAM_STR);
		$stmt->bindParam(":otro", $datos["otro"], PDO::PARAM_STR);
        $stmt->bindParam(":rutacreada", $datos["rutacreada"], PDO::PARAM_STR);
		$stmt->bindParam(":tipocc", $tipocc, PDO::PARAM_STR);
        
		
		
        if ($stmt->execute()) {$v= "ok";} else {$v="error";}
		
            $id="cod_crearcarta";
			$clave =controladorids::traerids($tabla,$id);
			
			$tabla2="usuarios";
			$item="cod_user";
			$valor=$clave2;
			$elemento="dni";
			$clave3=controladorids::traerelemento($tabla2,$elemento,$item,$valor);

        $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1(dni_user,cod_cartacreaada) VALUES (:dni_user,:cod_cartacreaada)");
        $stmt1->bindParam(":dni_user",$clave3,PDO::PARAM_STR);                                      
        $stmt1->bindParam(":cod_cartacreaada",$clave,PDO::PARAM_STR);
        

            if ($stmt1->execute()) {return "ok";} else {return "error";}
              $stmt = null;
            $stmt1 = null;
            $stmt->close();
            $stmt1->close();
   }

   /*=============================================
	EDITAR CREAR CARTA EXTERNA
=============================================*/
   static public function mdleditarcrearcex($tabla,$tabla1,$datos,$codigocartac,$dnis){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  lugar = :lugar , fechaemicion = :fechaemicion ,dirijida = :dirijida ,cargodir = :cargodir, referencia = :referencia ,saludo = :saludo, asunto = :asunto ,despedida = :despedida,emisor = :emisor , cargoemisor = :cargoemisor,ciemisor = :ciemisor,otro = :otro,rutacreada = :rutacreada WHERE  cod_crearcarta= $codigocartac");

	$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
	$stmt->bindParam(":fechaemicion", $datos["fechaemicion"], PDO::PARAM_STR);
	$stmt->bindParam(":dirijida", $datos["dirijida"], PDO::PARAM_STR);
	$stmt->bindParam(":cargodir", $datos["cargodir"], PDO::PARAM_STR);
	$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
	$stmt->bindParam(":saludo", $datos["saludo"], PDO::PARAM_STR);
	$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
	$stmt->bindParam(":despedida", $datos["despedida"], PDO::PARAM_STR);
	$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
	$stmt->bindParam(":cargoemisor", $datos["cargoemisor"], PDO::PARAM_STR);
	$stmt->bindParam(":ciemisor", $datos["ciemisor"], PDO::PARAM_STR);
	$stmt->bindParam(":otro", $datos["otro"], PDO::PARAM_STR);
	$stmt->bindParam(":rutacreada", $datos["rutacreada"], PDO::PARAM_STR);
	
	if ($stmt->execute()) {$v= "ok";} else {$v="error";}

		$clave =$codigocartac;
  
	$stmt1 = Conexion::conectar()->prepare(" UPDATE $tabla1 SET  dni_user = :dni_user WHERE cod_cartacreaada =$clave" );
	$stmt1->bindParam(":dni_user",$dnis,PDO::PARAM_STR);                                      
   
		if ($stmt1->execute()) {
			return "ok";} else {return "error";}
		  $stmt = null;
		$stmt1 = null;
		$stmt->close();
		$stmt1->close();
		

	}
    /*=============================================
	BORRAR CARTA CREADA EXTERNA
=============================================*/

    static public function mdlBorrarcartacreadaex($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_crearcarta = :cod_crearcarta");

	$stmt -> bindParam(":cod_crearcarta", $datos, PDO::PARAM_INT);

	if($stmt -> execute()){
		return "ok";
	}else{

		return "error";	
	   }
       $stmt = null;
       $stmt->close();
   }

	/*=============================================
	ASIGNAR CARTA EXTERNA
=============================================*/
    static public function mdlasignarcartaext($tabla,$tabla1,$tabla2,$datos,$idcartas,$datos1,$codausuario){

		
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codhistorialusu,cod_carta,estado,observacion,rutahistorial) VALUES (:codhistorialusu,:cod_carta,:estado,:observacion,:rutahistorial)");

	$stmt->bindParam(":codhistorialusu", $datos["codhistorialusu"], PDO::PARAM_STR);
	$stmt->bindParam(":cod_carta", $datos["cod_carta"], PDO::PARAM_STR);
	$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
	$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
	$stmt->bindParam(":rutahistorial", $datos["rutahistorial"], PDO::PARAM_STR);
	
	if ($stmt->execute()) {$v= "ok";} else {$v="error";}

	$stmt1 = Conexion::conectar()->prepare("UPDATE $tabla1 SET ruta = :ruta , fotocarta = :fotocarta , estadoproceso = :estadoproceso, observacion = :observacion WHERE  cod_carta = $idcartas");
	           
	$stmt1->bindParam(":ruta", $datos1["ruta"], PDO::PARAM_STR);
	$stmt1->bindParam(":fotocarta", $datos1["fotocarta"], PDO::PARAM_STR);
	$stmt1->bindParam(":estadoproceso", $datos1["estadoproceso"], PDO::PARAM_STR);
	$stmt1->bindParam(":observacion",$datos1["observacion"], PDO::PARAM_STR);
	if ($stmt1->execute()) { $u= "ok";} else { $u= "error";}
	
    $codusu=$codausuario;
    $clave3= controladorids::traercodigousuario($codusu);
     $clave =$idcartas;
                  
        $stmt2 = Conexion::conectar()->prepare(" UPDATE $tabla2 SET  dnia = :dnia WHERE cod_carta = $clave" );
		$stmt2->bindParam(":dnia",$clave3,PDO::PARAM_STR);       
		                               
		if ($stmt2->execute()) {return "ok";} else {return "error";}

		  $stmt = null;
		$stmt1 = null;
		$stmt2 = null;
		$stmt->close();
		$stmt1->close(); 
		$stmt2->close(); 

	}   
}

