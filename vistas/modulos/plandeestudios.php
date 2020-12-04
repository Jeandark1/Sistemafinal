<div class="content-wrapper">
  <section class="content-header">

 

    <h1>
         <b> Administrar Planes de Estudio </b>
      <small>Tabla de Registros    </small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Plan de estudios</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content bg-gray-light">


    <div class="box" style="background: skyblue">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarplan">
          Agregar Plan de estudios
        </button>


        <br>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas bg-gray" style="width:100%; background: aliceblue; ">
          <thead>
            <tr>
              <th style="width: 1px">#NRO</th>
              <th style="width: 10px">Nombre</th>
              <th style="width: 7px">Fecha de Creacion</th>
              <th style="width: 5px">Fecha Inicio</th>
              <th style="width: 5px">Fecha Final</th>
              <th style="width: 8px">Mencion</th>
              <th style="width: 8px">Id</th>

              <th style="width: 8px">Agregar Materias</th>
              <th style="width: 8px">Lista de Materias</th>
              <th style="width: 20px">Procesos</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $item = null;
            $valor = null;
            $aux = null;
            $plane = Controladorplandeestudio::ctrmostrarplandeestudios($item, $valor);
            foreach ($plane as $key => $value) {
              echo '<tr>
          <td>' . ($key + 1) . '</td>
          <td>' . $value["nombrepl"] . '</td>
          <td>' . $value["fechacrea"] . '</td>    
          <td>' . $value["fech_ini"] . '</td>                
          <td>' . $value["fech_fin"] . '</td>
          <td>' . $value["mencion"] . '</td>
          <td>' . $value["codpe"] . '</td>

          <td> <button class="btn btn-success btncircle  btnagrmateriaplane" codplan="'. $value["codpe"].'" data-toggle="modal" data-target="#Modalagregarmateria"> <i class="fa fa-plus-circle"></i></button>
          <td> <button class="btn btn-info btnlistamaterias" codigoplane="' . $value["codpe"] . '"> <i class="fa fa-folder-open"></i></button>

          
          </td>
          <td>
                  <div class="btn-group">
                <button class="btn btn-warning btnEditarplandeestudios" idplanestudio="' . $value["codpe"] . '" data-toggle="modal" data-target="#ModalEditarplandeestudio"> <i class="fa fa-pencil"></i></button>
                ';

                if ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador") {
     
                  echo'
                <button class="btn btn-danger  btnEliminarplanestudio"   idplane="' . $value["codpe"] . '"> <i class="fa fa-times"></i></button>';
              }
              echo'
                </div>
          </td>
        </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- CLASE MODAL PLAN DE ESTUDIOS-->
<div class="modal modal-info fade" id="modalAgregarplan">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <div class="pull-left image">
            <img src="vistas/img/usuarios/plane.jpg" class="img-circle" alt="Imagen de usuario">
          </div>
          <h4 class="modal-title centrart">Crear Nuevo Plan de Estudio</h4>
        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">
            <!-- NOMBRE DEL PLAN DE ESTUDIO-->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-commenting">
                    <input type="text" class="input-lg" style="color: black" placeholder="Nombre de Plan de Estudio" name="nombreplan" id="nombreplan" size="50">
                  </i>
                </p>
              </div>
            </div>
            <!-- FECHA DE INICIO Y FIN DE PLAN DE ESTUDIO -->
            <div class="form-group">
              <div class="icono-nosotros">
                <h4>Fecha de Inicio</h4>
                <h4>Fecha de Final</h4>
              </div>
              <p>
                <div class="icono-nosotros">
                  <input type="date" class="input-lg" style="color: black" name="fechainiciopl" id="fechainiciopl" step="7" size="12">
                  <input type="date" class="input-lg" style="color: black" name="fechafinalpl" id="fechafinalpl" step="7"  size="12">
                </div>
              </p>
            </div>
            <!-- MENCION  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" id="nmencion" name="nmencion" placeholder="Ingresar la Mencion">
              </div>
            </div>
          
          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                      btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline">Guardar Plan de Estudio</button>
        </div>
        <?php
        $crearplandeestudio = new Controladorplandeestudio();
        $crearplandeestudio->ctrcrearplandeestudio();
        ?>
      </form>
    </div>
  </div>
</div>


<!-- CLASE MODAL EDITAR PLAN DE ESTUDIOS-->
<div class="modal modal-info fade" id="ModalEditarplandeestudio">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar Plan de Estudio</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">

            <!-- EDITAR NOMBRE DEL PLAN DE ESTUDIO-->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-commenting">
                    <input type="text" class="input-lg" style="color: black" value="" name="editarnombreplan" id="editarnombreplan" size="50">
                  </i>
                </p>
              </div>
            </div>
            <!-- FECHA DE INICIO Y FIN DE PLAN DE ESTUDIO -->
            <div class="form-group">
              <div class="icono-nosotros">
                <h4>Fecha de Inicio</h4>
                <h4>Fecha de Final</h4>
              </div>
              <p>
                <div class="icono-nosotros">
                  <input type="date" class="input-lg" style="color: black" name="editarfechainiciopl" id="editarfechainiciopl" size="12">
                  <input type="date" class="input-lg" style="color: black" name="editarfechafinalpl" id="editarfechafinalpl" size="12">
                </div>
              </p>
            </div>
            <!-- MENCION  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" id="editarnmencion" name="editarnmencion" value="">
              </div>
            </div>
            <input type="hidden"  style="color: black" id="codplane" name="codplane" value="">


            
          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                      btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Cambios</button>

        </div>
        <?php
        $editarplandeestudio = new Controladorplandeestudio();
        $editarplandeestudio->ctreditarplandeestudio();
        ?>

      </form>

    </div>
  </div>

</div>

<!--   BORRAR PLAN DE ESTUDIOS-->
<?php
$borrarplandeestudio = new Controladorplandeestudio();
$borrarplandeestudio->ctrBorrarplandeestudio();
?>



<!-- CLASE MODAL AGREGAR  MATERIA AL PLAN DE ESTUDIOS-->
<div class="modal modal-info fade" id="Modalagregarmateria">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Materia A Plan</h4>
        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <input type="hidden" id="idmateriaplan" name="idmateriaplan" value="">

            <!-- escojer materia-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"> </i></span>
                <select class="form-control input-lg select2-results select2-container--open" id="nuevamateriapl" name="nuevamateriapl" style="color: black; width: 100%; height: 30px;">
                  <?php

                  include("conexionmysqli.php");
                  $query = "SELECT * FROM materia";

                  $resultado = $conexion->query($query);

                  while ($row = $resultado->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row['cod_mat']; ?>"><?php echo $row['nombre_m'] . "   " . $row['gestion']; ?> </option>

                  <?php
                  } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                        btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline ">Agregar A Plan</button>
        </div>
        <?php
        $agregarmateria = new Controladorplandeestudio();
        $agregarmateria->CtrAgregarmpl();
        ?>
      </form>

    </div>
  </div>

</div>