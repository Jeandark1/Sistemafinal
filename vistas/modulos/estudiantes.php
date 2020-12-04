<div class="content-wrapper">
  <section class="content-header">

       <h1>
         <b> Administrar Estudiante </b>
      <small>Libro de actas</small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="estudiante"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Estudiante</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content bg-gray-light" >

    
    <div class="box" style="background: skyblue">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarEstudiante">
          Agregar Estudiante
        </button>


        <br>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas bg-gray " style="width:100%">
          <thead>
            <tr>

              <th style="width: 1px">#</th>
              <th style="width: 10px">CI</th>
              <th style="width: 7px">Nombre</th>
              <th style="width: 5px">Ap_Paterno</th>
              <th style="width: 5px">Ap_Materno</th>
              <th style="width: 8px">Genero</th>
              <th style="width: 10px">Email</th>
              <th style="width: 8px">Celular</th>
              <th style="width: 7px">Reg_univ</th>
              <th style="width: 7px">Estado</th>
              <th style="width: 8px">Modo_ing</th>
              <th style="width: 9px">Modo_egre</th>
              <th style="width: 8px">Fecha_nac</th>
             


              <th style="width: 20px">Acciones</th>

            </tr>
          </thead>
          <tbody>

            <?php
            $item = null;
            $valor = null;
            $aux = null;
            $usu = ControladorEstudiantes::ctrMostrarestudiante($item, $valor);
            foreach ($usu as $key => $value) {
              echo '<tr>
          <td>' . ($key + 1) . '</td>
          <td>' . $value["ci"] . '</td>
          <td>' . $value["nombre"] . '</td>    
          <td>' . $value["ap_paterno"] . '</td>                
          <td>' . $value["ap_materno"] . '</td>
          <td>' . $value["genero"] . '</td>
          <td>' . $value["email"] . '</td>
          <td>' . $value["celular"] . '</td>
          <td>' . $value["reg_univ"] . '</td>
          <td>' . $value["estado"] . '</td>
          <td>' . $value["modo_ing"] . '</td>
          <td>' . $value["modo_egre"] . '</td>
          <td>' . $value["fecha_nac"] . '</td>
          
          <td>
                  <div class="btn-group">
                  
                <button class="btn btn-warning btnEditarestudiante" idestudiante="' . $value["codest"] . '" data-toggle="modal" data-target="#ModalEditarestudiante"> <i class="fa fa-pencil"></i></button>
                 ';

                if ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador") {
     
                  echo' <button class="btn btn-danger  btnEliminarestudiante" reg_univ="' . $value["reg_univ"] . '"  idestudiante="' . $value["codest"] . '"> <i class="fa fa-times"></i></button>';
                }
                echo'
                   <button class="btn btn-success btnagregarestudiante" idestudiantes="' . $value["codest"] . '" data-toggle="modal" data-target="#Modalagregarrestudiante"> <i class="fa fa-plus-square"></i></button>
                <button class="btn btn-info btnboletaestudiante"  reg_univ="' . $value["reg_univ"] . '"  idestudiantito="' . $value["codest"] . '"> <i class="fa fa-folder-open"></i></button>
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


<!-- CLASE MODAL -->
<div class="modal modal-info fade" id="modalAgregarEstudiante">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Estudiante</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">

            <!-- NOMBRE-->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-user-plus">

                    <input type="text" class="input-lg" style="color: black" placeholder="Nombre" name="nombre" id="nombre" size="50">
                  </i>
                </p>
              </div>
            </div>
            <!-- APELLIDOS -->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-user-plus">
                    <input type="text" class="input-lg" style="color: black" placeholder="Ap Paterno" name="ApPaterno" id="ApPaterno" size="22">
                    <input type="text" class="input-lg" style="color: black" placeholder="Ap Materno" name="ApMaterno" id="ApMaterno" size="22">
                  </i>
                </p>
              </div>
            </div>
            <!-- CI  -->

            <div class="input-group">
              <P> <i class="fa fa-credit-card">
                  <input type="text" class="input-lg" style="color: black" placeholder=" CI " name="Ci" id="Ci" size="40"> </i> </p>
            </div>

            <!-- GENERO  -->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <h3> Genero: </h3>
                  <h4>
                    <input type="radio" name="genero" value="Masculino"> Hombre
                    <input type="radio" name="genero" value="Femenino"> Mujer
                    <input type="radio" name="genero" value="Otro"> Otro
                  </h4>
                </p>
              </div>
            </div>

            <!-- CELULAR -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" id="nrocel" name="nrocel" placeholder="Ingresar Numero de cel:">
              </div>
            </div>
            <!--  REG UNIV -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-keyboard-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" id="matricula" name="matricula" placeholder="Ingresar Reg. Univ">
              </div>
            </div>


            <!--EMAIL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Email" name="email" id="email">
              </div>
            </div>
            <!-- ESTADO-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hdd-o"> </i></span>
                <select class="form-control input-lg" name="estado">
                  <option value=" Seleccionar Estado ">Seleccionar Estado</option>
                  <option value=" Activo">Activo</option>
                  <option value=" InactIvo">Inactivo</option>
                  <option value=" Titulado">Titulado</option>
                  <option value=" Egreados">Egreados</option>
                  <option value=" Cambio de carrera">Cambio de carrera</option>
                  <option value=" Paralela">Paralela</option>
                </select>
              </div>
            </div>

            <!-- MODO_ INGR-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chevron-circle-down"> </i></span>
                <select class="form-control input-lg" name="ingreso">
                  <option value=" Seleccionar modo de Ingreso ">Seleccionar modo de Ingreso</option>
                  <option value=" Examen De suficiencia A.">Examen De suficiencia A.</option>
                  <option value=" Ingreso libre">Ingreso libre</option>
                  <option value=" Prefacultativos">Prefacultativos</option>
                  <option value=" Admicion Especial">Admicion Especial</option>
                  <option value=" Beca">Beca Municipio</option>
                </select>
              </div>
            </div>

            <!-- MODO EGRE-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chevron-circle-up"> </i></span>
                <select class="form-control input-lg" name="egreso">
                  <option value=" Seleccionar un modo de Egreso ">Seleccionar un modo de Egreso</option>
                  <option value=" Examen de Grado">Examen de Grado</option>
                  <option value=" Trabajo Dirijido">Trabajo Dirijido</option>
                  <option value=" Proyecto de Grado">Proyecto de Grado</option>
                  <option value=" Tesis de Grado">Tesis de Grado</option>
                  <option value=" Exelencia">Exelencia</option>
                  <option value=" P.E.T.A.E.N.G.">P.E.T.A.E.N.G.</option>
                  <option value=" Incompleta">Incompleta</option>
                </select>
              </div>
            </div>

            <!-- FECHA DE NACIMIENTO -->
            <div class="form-group">
              <h4>FECHA DE NACIMIENTO</h4>
              <div class="input-group">

                <h4 class="modal-title"> </h4>
                <span class="input-group-addon"><i class="fa fa-calendar"> </i></span>
                <input type="date" class=" form-control input-lg "  name="nacimiento" id="nacimiento"  step="7"  data-datepicker-color="primary">

              </div>
            </div>
          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                      btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline">Guardar estudiante</button>
        </div>
        <?php
        $crearmateria = new ControladorEstudiantes();
        $crearmateria->CtrCrearestudiante();
        ?>
      </form>

    </div>
  </div>

</div>




<!-- CLASE MODAL EDITAR-->
<div class="modal modal-info fade" id="ModalEditarestudiante">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar Estudiante</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">

            <!-- NOMBRE-->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-commenting">

                    <input type="text" class="input-lg" style="color: black" value="Nombre" name="editarnombre" id="editarnombre" size="50">
                  </i>
                </p>
              </div>
            </div>
            <!-- APELLIDOS -->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-commenting-o">
                    <input type="text" class="input-lg" style="color: black" value="" name="editarApPaterno" id="editarApPaterno" size="22">
                    <input type="text" class="input-lg" style="color: black" value="" name="editarApMaterno" id="editarApMaterno" size="22">
                  </i>
                </p>
              </div>
            </div>
            <!-- CI  -->

            <div class="input-group">
              <P> <i class="fa fa-unlock-alt">
                  <input type="text" class="input-lg" style="color: black" value="" name="editarCi" id="editarCi" size="40"> </i> </p>
            </div>

            <!-- CELULAR -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" id="editarnrocel" name="editarnrocel" value="">
              </div>
            </div>
            <!--  REG UNIV -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" id="editarmatricula" name="editarmatricula" value="">
              </div>
            </div>


            <!--EMAIL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-suitcase"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editaremail" id="editaremail">
              </div>
            </div>
            <!-- ESTADO-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <select class="form-control input-lg" name="editarestado">
                  <option value="" id="editarestado"></option>
                  <option value=" Activo">Activo</option>
                  <option value=" InactIvo">Inactivo</option>
                  <option value=" Titulado">Titulado</option>
                  <option value=" Egreados">Egreados</option>
                  <option value=" Cambio de carrera">Cambio de carrera</option>
                  <option value=" Paralela">Paralela</option>
                </select>
              </div>
            </div>

            <!-- MODO_ INGR-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <select class="form-control input-lg" name="editaringreso">
                  <option value="" id="editaringreso"></option>
                  <option value=" Examen De suficiencia A.">Examen De suficiencia A.</option>
                  <option value=" Ingreso libre">Ingreso libre</option>
                  <option value=" Prefacultativos">Prefacultativos</option>
                  <option value=" Admicion Especial">Admicion Especial</option>
                  <option value=" Beca">Beca Municipio</option>
                </select>
              </div>
            </div>

            <!-- MODO EGRE-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <select class="form-control input-lg" name="editaregreso">
                  <option value="" id="editaregreso"></option>
                  <option value=" Examen de Grado">Examen de Grado</option>
                  <option value=" Trabajo Dirijido">Trabajo Dirijido</option>
                  <option value=" Proyecto de Grado">Proyecto de Grado</option>
                  <option value=" Tesis de Grado">Tesis de Grado</option>
                  <option value=" Exelencia">Exelencia</option>
                  <option value=" P.E.T.A.E.N.G.">P.E.T.A.E.N.G.</option>
                  <option value=" Incompleta">Incompleta</option>
                </select>
              </div>
            </div>

            <!-- FECHA DE NACIMIENTO -->
            <div class="form-group">
              <h4>FECHA DE NACIMIENTO</h4>
              <div class="input-group">

                <h4 class="modal-title"> </h4>
                <span class="input-group-addon"><i class="fa  fa-qq"> </i></span>
                <input type="date" class=" form-control input-lg" name="editarnacimiento" id="editarnacimiento" data-datepicker-color="primary">
              </div>
            </div>


          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                      btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar estudiante</button>

        </div>
        <?php
        $editarmateria = new ControladorEstudiantes();
        $editarmateria->ctreditarestudiante();
        ?>
      </form>

    </div>
  </div>

</div>

<!--   BORRAR MATERIA -->
<?php
$borrarestudiante = new Controladorestudiantes();
$borrarestudiante->ctrBorrarestudiante();
?>



<!-- CLASE MODAL AGREGAR -->
<div class="modal modal-info fade" id="Modalagregarrestudiante">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Estudiante a Materia</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">



          <input type="hidden" id="idest" name ="idest" value="">

            <!-- escojer materia-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"> </i></span>
                <select class="form-control input-lg select2-results select2-container--open" id="nuevamateria" name="nuevamateria" style="color: black; width: 100%; height: 30px;">
                  <?php

                  include("conexionmysqli.php");
                  $query = "SELECT * FROM materia";

                  $resultado = $conexion->query($query);

                  while ($row = $resultado->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row['cod_mat']; ?>"><?php echo $row['cod_mat'] . "   " . $row['nombre_m'] . "   " . $row['gestion'] . "   " . $row['docente']; ?> </option>

                  <?php
                  } ?>
                </select>
              </div>
            </div>
            <br>
            <!-- Notas -->
            <div class="form-group">
              <div class="input-group">
                <p>
                  <i class="fa fa-commenting-o">
                    <input type="text" class="input-lg" style="color: black" placeholder="Nota 1" name="nota1" id="nota1" size="14">
                    <input type="text" class="input-lg" style="color: black" placeholder="Nota 2" name="nota2" id="nota2" size="14">
                    <input type="text" class="input-lg" style="color: black" placeholder="Nota 3" name="nota3" id="nota3" size="14">
                  </i>
                </p>
              </div>
            </div>


                      <!-- Nota final  -->
            <div class="form-group">
              <p>
                <i class="fa fa-commenting">
                  <!-- <input type="text" class="input-lg" style="color: black" placeholder="Nota Final" name="notaf" id="notaf" size="20"> -->
                  <span class="input-lg" style="color: black" name="notaf" id="notaf" size="20">0</span>
                  <input type="hidden" id="notafinal" name ="notafinal">
                </i>  
              </p>

            </div>
           
            <!-- OBSERVACION-->

            <div class="form-group">

              <p>
                <i class="fa fa-commenting">
                  <!-- <input type="text" class="input-lg" style="color: black" placeholder="Nota Final" name="notaf" id="notaf" size="20"> -->
                  <span class="input-lg" style="color: black" name="observacion" id="observacion" size="20"></span>
                  <input type="hidden" id="observaciones" name = "observaciones" value="">
                </i>
              </p>

            </div>


          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                        btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline ">Agregar A la Materia</button>
        </div>
        <?php
        $inscrbir = new ControladorEstudiantes();
        $inscrbir->CtrInscribir();
        ?>
      </form>

    </div>
  </div>

</div>