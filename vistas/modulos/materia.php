<div class="content-wrapper">
  <section class="content-header">

        <h1>
         <b> Administrar Materias</b>
      <small>Libro de Actas</small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Materias</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content bg-gray-light">

    <!-- Default box -->
    <div class="box" style="background: skyblue">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarmateria">
          Agregar Materias
        </button>

        <div class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalpdfmateria">
          <i class="fa fa-print"> GENERAR PDF DE LISTA</i>
        </div>
        <br>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas bg-gray" style="width:100%">
          <thead>
            <tr>
              <th style="width: 1px">#</th>
              <th style="width: 10px">Sigla</th>
              <th style="width: 10px">Nombre</th>
              <th style="width: 5px">Folio</th>
              <th style="width: 8px">Libro</th>
              <th style="width: 8px">Gestion</th>
              <th style="width: 5px">Tipo</th>
              <th style="width: 5px">Etapa</th>
              <th style="width: 10px">Docente</th>
              <th style="width: 30px">Acciones</th>

            </tr>
          </thead>
          <tbody>

            <?php

            $item = null;
            $valor = null;

            $materia = Controladormaterias::ctrMostrarmaterias($item, $valor);

            foreach ($materia as $key => $value) {

              echo '<tr>
      <td>' . ($key + 1) . '</td>
      <td>' . $value["sigla"] . '</td>
      <td>' . $value["nombre_m"] . '</td>    
      <td>' . $value["folio"] . '</td>                
      <td>' . $value["libro"] . '</td>
      <td>' . $value["gestion"] . '</td>
      <td>' . $value["tipo"] . '</td>
      <td>' . $value["fecha_curso"] . '</td>
      <td>' . $value["docente"] . '</td>
      <td>
          <div class="btn-group">
        <button class="btn btn-warning btnEditarmateria" idmateria="' . $value["cod_mat"] . '" data-toggle="modal" data-target="#ModalEditarmateria"> <i class="fa fa-pencil"></i></button>
        
        ';

                if ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador") {
        
        echo' <button class="btn btn-danger  btnEliminarmateria" materia="' . $value["nombre_m"] . '"  idmateria="' . $value["cod_mat"] . '" > <i class="fa fa-times"></i></button>';
                }
                echo ' <button class="btn btn-info btnlistademateria" idmaterias="'.$value["cod_mat"].'"  materia="'.$value["nombre_m"].'"> <i class="fa fa-plus-square"><span> Lista</span></i></button>
          
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


<!-- CLASE MODAL GENERAR PDF LISTA DE MATERIAS -->  

<div class="modal fade bd-example-modal-lg  modal-success tabindex="-1" id="modalpdfmateria" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form role="form" method="POST" enctype="multipart/form-data">
    <!-- cabeza del modal-->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">GENERAR PDF DE LISTA</h4>
    </div>
    <!-- cuerpo del modal -->
    <div class="modal-body">
      <div class="box-body">
        
         <iframe src=<?php echo "extensiones/pdfs/listamateria.php?"?> height="1200" width="100%"  ></iframe> 
    </div>
    </div>
    <!-- /.pie del modal-->
    <div class="modal-footer">
      <div type="button" class="btn  btn-outline pull-right" data-dismiss="modal">CANCELAR</div>
    </div>
     </form>
    </div>
  </div>
</div>






<!-- CLASE MODAL AGREGAR MATERIA-->
<div class="modal modal-info fade" id="modalAgregarmateria" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Materia</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">


            <!-- Sigla  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Sigla" name="nuevasigla" id="nuevasigla" required>
              </div>
            </div>

            


            <!-- Nombre de Materia  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Nombre de la Materia" name="nuevonombrem" id="nuevonombrem" required>
              </div>
            </div>


            <!-- Nro de folio  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Folio" name="nuevofolio" id="nuevofolio" required>
              </div>
            </div>

            <!-- Libro  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Libro" name="nuevolibro" id="nuevolibro" required>
              </div>
            </div>

            <!-- gestion del curso -->
            <div class="form-group">
              <h4>Gestion de la materia</h4>
              <div class="input-group">

                <h4 class="modal-title"> </h4>
                <span class="input-group-addon"><i class="fa  fa-calendar-plus-o"> </i></span>
                <input type="year" class=" form-control input-lg" name="nuevagestion" id="nuevagestion" data-datepicker-color="primary" placeholder="Ingrese el año del curso">

              </div>
            </div>

             <!-- TIPO -->
            <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-files-o"> </i></span>
                            <select class="form-control input-lg" name="tipo">
                              <option value=" Seleccionar tipo ">Seleccionar tipo</option>
                              <option value=" Original">Original</option>
                              <option value=" Copia de Original">Copia de Original</option>
                              <option value=" Fotocopia">Fotocopia</option>
                              <option value=" Manuscrito">Manuscrito</option>
                              <option value=" Otros">Otros</option>
                            </select>
                          </div>
                        </div>



            <!-- etapa de la materia -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"> </i></span>
                <select class="form-control input-lg" name="nuevaestapa">
                  <option value="Seleccionar una Temporada ">Seleccionar una temporada</option>
                  <option value="Primera">Primera</option>
                  <option value="Segunda">Segunda</option>
                  <option value="Tercer">Tercer</option>
                  <option value="Cuarta">Cuarta</option>
                  <option value="Curso de Temporada">Curso de Temporada</option>
                </select>
              </div>
            </div>
            <!-- docente  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Docente" name="nuevodocente" id="nuevodocente" required>
              </div>
            </div>
          </div>

        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">

          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Materia</button>

        </div>
        <?php
        $crearmateria = new Controladormaterias();
        $crearmateria->CtrCrearmateria();
        ?>

      </form>

    </div>

  </div>

  <!-- /.modal-dialog -->
</div>





<!-- /.MODAL EDITAR MATERIA -->

<div class="modal modal-info fade" id="ModalEditarmateria" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar Materia</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">


            <!-- Sigla  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black"   value="" name="editarsigla" id="editarsigla" required>
              </div>
            </div>


            <!-- Nombre de Materia  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black"  value="" name="editarnombrem" id="editarnombrem" required>
              </div>
            </div>


            <!-- Nro de folio  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black"  value="" name="editarfolio" id="editarfolio" required>
              </div>
            </div>

            <!-- Libro  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black"  value="" name="editarlibro" id="editarlibro" required>
              </div>
            </div>

            <!-- gestion del curso -->
            <div class="form-group">
              <h4>Gestion de la materia</h4>
              <div class="input-group">

                <h4 class="modal-title"> </h4>
                <span class="input-group-addon"><i class="fa  fa-calendar-plus-o"> </i></span>
                <input type="year" class=" form-control input-lg" value="" name="editargestion" id="editargestion" data-datepicker-color="primary">

              </div>
            </div>

            <!-- etapa de la materia -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-plus-o"> </i></span>
                <select class="form-control input-lg" name="editarestapa">
                  <option value="" id="editarestapa"></option>
                  <option value=" Primera">Primera</option>
                  <option value=" Segunda">Segunda</option>
                  <option value=" Curso de Temporada">Curso de Temporada</option>
                </select>
              </div>
            </div>
            <!-- docente  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa fa-calendar-check-o"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black"  value="" name="editardocente" id="editardocente" required>
              </div>
            </div>
          </div>

        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">

          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Cambios</button>

        </div>
        <?php
        $editarmateria = new Controladormaterias();
        $editarmateria->Ctreditarmateria();
        ?>

      </form>

    </div>

  </div>

  <!-- /.modal-dialog -->
</div>


<!--   BORRAR MATERIA -->
<?php
				$borrarmateria = new Controladormaterias();
				$borrarmateria->ctrBorrarmateria();
				?>
        