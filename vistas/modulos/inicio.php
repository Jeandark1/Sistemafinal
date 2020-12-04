<div class="content-wrapper">

  <section class="content-header">

    <h1>
      <b>     Inicio   </b>
      
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar</li>
      <!-- Trigger the modal with a button -->
    </ol>

  </section>
  <!-- Main content -->
  <section class="content bg-gray-light">
    
    
    <b>   <?php

      //  $nombre = $_SESSION["nombre"] . " - " . $_SESSION["ap_paterno"] . ' - ' . $_SESSION["ap_materno"];
            echo' 
            <div class="widget-user-header  inicio ">

            
            <h4 class="widget-user-desc negrilla">  <b>   BIENVENIDO AL SISTEMA USUARIO </b></h4>
            
            <i>  <h4 class="widget-user-desc negrilla">' . $_SESSION["nombre"] . ' ' . $_SESSION["ap_paterno"] . ' ' . $_SESSION["ap_materno"] . '</h4></i>
                   
                   <h4 class="widget-user-username  negrilla"> <small>'.$_SESSION["perfil"].' </small></h4>
            </div>
           ';
     
					// echo   $nombre;
          
					?>
  </b>    
  <div class="bg-navy btnmin"> 
    <p>  <h3> <b> Lista de Tareas de Correspondencia </b>    <small  class="geor"><i> !!Ingresa a la correspondecia interna y externa para terminar las tareas !! </i></small>  </h3> </p>
     
  
  
  </div>
  
    <!-- Default box -->
    <div class="box " style="background: skyblue">
      <div class="box-header with-border">

      <div class="box-body">
     
     <table id="eventos" class="table table-bordered table-striped dt-responsive tablas bg-gray" style="width:100%">
       <thead>
         <tr>
           <th style="width: 2px">#</th>
           <th style="width: 25px">Remitente</th>
           <th style="width: 25px">Entidad</th>
           <th style="width: 25px">Referencia</th>
           <th style="width: 30px">Observacion</th>
          <th style="width: 15px">Fecha Plazo</th>
          <th style="width: 15px">Prioridad</th>
           <th style="width: 25px">Ruta</th>
           <th style="width: 15px">Estado</th>
           <th style="width: 30px">Tipo de correspondencia</th>
         </tr>
       </thead>
       <tbody>
         <?php

         $item = null;
         $valor = null;
         $id = $_SESSION["dni"];

         $cor = Controladorcorespinterna::ctrtareas($item, $valor, $id);
        
        // var_dump($cor);

           foreach ($cor as $key => $values) {
           
           echo '<tr>
                   <td>'.($key+1).'</td>
                   <td>'.$values["remitente"].'</td>
                   <td>'.$values["entidad"].'</td>    
                   <td>'.$values["referencia"].'</td>                
                   <td>'.$values["observacion"].'</td>
                   <td>'.$values["fechaplazo"].'</td>
                   <td>'.$values["prioridad"].'</td>
                   <td>'.$values["ruta"].'</td>';
                                if ($values["estadoproceso"] ==='Inicial'){
                                    echo '<td style="with: 10px"><button class="btn bg-purple-active btn-xs">'.$values["estadoproceso"].'</button></td>';
                                        }else{
                                            if ($values["estadoproceso"] ==='Primario'){
                                             echo '<td style="with: 10px"><button class="btn bg-red-active btn-xs">'.$values["estadoproceso"].'</button></td>';
                                            }else{
                                                if ($values["estadoproceso"] ==='Medio'){
                                                 echo '<td style="with: 10px"><button class="btn bg-orange-active btn-xs">'.$values["estadoproceso"].'</button></td>';
                                                 }else{
                                                    if ($values["estadoproceso"] ==='Final'){
                                                        echo '<td style="with: 10px"><button class="btn btn-success btn-xs">'.$values["estadoproceso"].'</button></td>';
                                                         }else{
                                                            if ($values["estadoproceso"] ==='Terminado'){
                                                                 echo '<td style="with: 10px"><button class="btn bg-gray btn-xs">'.$values["estadoproceso"].'</button></td>';
                                                                 }else{
                                                                    if ($values["estadoproceso"] ==='Desactivado'){
                                                                 echo '<td style="with: 10px"><button class="btn bg-black-active btn-xs">'.$values["estadoproceso"].'</button></td>';
                                                                 }else{
                                                                 echo '<td><button class="btn bg-gray btn-xs">'.$values["estadoproceso"].'</button></td>';
                                                                     }
                                                                
                                                              }
                                                        }
                                                 }
                                            }
                                     
                                      }
                      echo '';
                   if ($values["tipocarta"] != null) {

                     echo '<td> <button class="btn btn-facebook"> Correspondencia Externa</button></td>';
                   }else{
                     
                    echo '<td> <button class="btn btn-instagram"> Correspondencia Interna</button></td>';

                   }       
                   echo '</tr>';
         }
        
        
        ?>
         

       </tbody>
     </table>

   </div>
            



      </div>
    </div>

    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>

