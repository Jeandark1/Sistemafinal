<div class="content-wrapper">


    <section class="content-header">

        <h1>

            ACCESOS

            <small>Panel de Control</small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="usuarios"><i class="fa fa-dashboard"></i> VOLVER</a></li>

            <li class="active">Tablero</li>

        </ol>

    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box" style="background: skyblue">


        </div>

        <div class="icono-nosotros">

            <?php
            if (isset($_GET["registro"])) {

                include("conexionmysqli.php");
                $id = $_GET["registro"];

                $query = "SELECT * FROM usuarios where cod_user  = $id";

                $resultado = $conexion->query($query);

                while ($row = $resultado->fetch_assoc()) {

                    $nom = $row['nombre'];
                    $ap = $row["ap_paterno"];
                    $am = $row["ap_materno"];
                    $usu = $row["usuario"];
                    $estado = $row["estado"];
                    $ci = $row["dni"];
                    $cel = $row["celular"];
                    $mod1 = $row["esta_estudiante"];
                    $mod2 = $row["esta_materias"];
                    $mod3 = $row["esta_plan_estudio"];
                    $mod4 = $row["esta_correspondencia"];
                    $mod5 = $row["esta_superu"];
            ?>
                <?php
                }   ?>
            <?php } ?>

            <?php

            echo  '<tr> 
      <fieldset id="sle">
      <legend style="background:#0f4c75; color:white; ">Datos del Usuario</legend>
      <p><label>Usuario :  </label>
      <b>' . $nom . " - " . $ap . ' - ' . $am . '  ' . '</b>  </p> 
      <p> <label> Ci :</label> <b>' . $ci . '</b> </p>       
       </fieldset>
       </tr>';

            echo  '<tr> 
      <fieldset id="sle">
      <legend style="background:#0f4c75; color:white; "> Contaduria Publica - UMSA </legend>
      <p><label>Usuario :  </label>
      <b>' . ' ' . $usu . '</b>  </p>


      <p class="icono-nosotros"> <label> Estado: ';
            if ($estado != 0) {
                echo '<button class="btn btn-success btn-xs">Activado</button>';
            } else {
                echo '<button class="btn btn-danger btn-xs">Desactivado</button>';
            }
            echo ' </label>   
      
      
      
      <label> Celular : ' . $cel . ' </label>    </p>     
          
       </fieldset>
       </tr>';
            ?>
        </div>


        <?php
        echo ' <div class="row   icono-nosotros">


       <div class="col-md-3 col-sm-6 col-xs-12 ">
        ';
        if ($mod1 != 0) {
            echo '  <div class="info-box bg-blue-gradient">
                               <span class="info-box-icon bg-navy-active"><i class="fa fa-group"></i></span>
                     <div class="info-box-content ">
                                <span class="info-box-text">MODULO REGISTRO DE ACTAS</span>
                         <span class="info-box-number">
                            <button class="btn btn-success btn-xs  btnActivarmod1" idusuariomod1="' . $id . '" estadousuariomod1="0">Activado</button>
                         </span>
                      </div>
                  </div>
        <!-- /.col -->';
        } else {
            echo '<div class="info-box">
            <span class="info-box-icon bg-navy-active"><i class="fa fa-group"></i></span>
                    <div class="info-box-content ">
             <span class="info-box-text">MODULO REGISTRO DE ACTAS</span>
                    <span class="info-box-number">
                          <button class="btn btn-danger btn-xs  btnActivarmod1" idusuariomod1="' . $id . '" estadousuariomod1="1">Desactivado</button>
                    </span>
                      </div>
                    </div>
<!-- /.col --> ';
        }
        echo '
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          
          <div class="col-md-3 col-sm-6 col-xs-12 ">
          ';  if ($mod2 != 0) {
            echo '  <div class="info-box bg-blue-gradient disabled">
                                 <span class="info-box-icon bg-light-blue-active"><i class="fa fa-bank"></i></span>
                       <div class="info-box-content ">
                                  <span class="info-box-text">MODULO DE MATERIAS</span>
                           <span class="info-box-number">
                              <button class="btn btn-success btn-xs  btnActivarmod2" idusuariomod2="' . $id . '" estadousuariomod2="0">Activado</button>
                           </span>
                        </div>
                    </div>
          <!-- /.col -->';
          } else {
              echo '<div class="info-box  disabled">
                             <span class="info-box-icon bg-light-blue-active"><i class="fa fa-bank"></i></span>
                        <div class="info-box-content ">
                           <span class="info-box-text">MODULO DE MATERIAS</span>
                               <span class="info-box-number">
                                   <button class="btn btn-danger btn-xs  btnActivarmod2" idusuariomod2="' . $id . '" estadousuariomod2="1">Desactivado</button>
                               </span>
                         </div>
                    </div>
               <!-- /.col --> ';
          }
          echo '
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


            <div class="col-md-3 col-sm-6 col-xs-12 ">
            ';  if ($mod3 != 0) {
              echo '  <div class="info-box bg-blue-gradient disabled">
                                   <span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>
                         <div class="info-box-content ">
                                    <span class="info-box-text">MODULO DE PLAN DE ESTUDIOS</span>
                             <span class="info-box-number">
                                <button class="btn btn-success btn-xs  btnActivarmod3" idusuariomod3="' . $id . '" estadousuariomod3="0">Activado</button>
                             </span>
                          </div>
                      </div>
            <!-- /.col -->';
            } else {
                echo '<div class="info-box  disabled">
                               <span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>
                          <div class="info-box-content ">
                             <span class="info-box-text">MODULO DE PLAN DE ESTUDIOS</span>
                                 <span class="info-box-number">
                                     <button class="btn btn-danger btn-xs  btnActivarmod3" idusuariomod3="' . $id . '" estadousuariomod3="1">Desactivado</button>
                                 </span>
                           </div>
                      </div>
                 <!-- /.col --> ';
            }
            echo '
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->


        <div class="col-md-3 col-sm-6 col-xs-12 ">
        ';  if ($mod4 != 0) {
          echo '  <div class="info-box bg-blue-gradient disabled">
                               <span class="info-box-icon bg-teal"><i class="fa  fa-envelope-square"></i></span>
                     <div class="info-box-content ">
                                <span class="info-box-text">MODULO DE CORRESPONDENCIA</span>
                         <span class="info-box-number">
                            <button class="btn btn-success btn-xs  btnActivarmod4" idusuariomod4="' . $id . '" estadousuariomod4="0">Activado</button>
                         </span>
                      </div>
                  </div>
        <!-- /.col -->';
        } else {
            echo '<div class="info-box  disabled">
                           <span class="info-box-icon bg-teal"><i class="fa  fa-envelope-square"></i></span>
                      <div class="info-box-content ">
                         <span class="info-box-text">MODULO DE CORRESPONDENCIA</span>
                             <span class="info-box-number">
                                 <button class="btn btn-danger btn-xs  btnActivarmod4" idusuariomod4="' . $id . '" estadousuariomod4="1">Desactivado</button>
                             </span>
                       </div>
                  </div>
             <!-- /.col --> ';
        }
        echo '
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

      </div>';
        ?>

        <div class="box-body">


        </div>
        <!-- /.box-footer-->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>