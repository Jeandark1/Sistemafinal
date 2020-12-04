<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu">

			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<?php

           if ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador") {

             echo '
			<li>
	           	<a href="usuarios">
	            <i class="fa fa-user"></i>
	            <span>Usuarios</span>

               </a>
			  </li>

			';
          } 
			?>
			
			<?php

             if ($_SESSION["esta_estudiante"] == 1 || ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador") ) {

				echo '
			<li>

			<a href="estudiantes">

					<i class="fa fa-mortar-board"></i>
					<span>Estudiantes</span>

				</a>

			</li>';
	     	} 
	      ?>

          <?php

            if ($_SESSION["esta_materias"] == 1 || ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador") ) {

          echo '
			<li>
	            	<a href="materia">
					<i class="fa fa-folder-open-o"></i>
					<span>Materias</span>

				</a>
			</li>
			';
			   } 
			  ?>
			  
			  <?php

            if ($_SESSION["esta_plan_estudio"] == 1 || ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador")) {

             echo '
			<li>
				<a href="plandeestudios">
					<i class="fa fa-object-group"></i>
					<span>Plan de Estudio</span>
				</a>
			</li>';
	     	} 
	        ?>


            <?php

            if ($_SESSION["esta_correspondencia"] == 1 || ($_SESSION["esta_superu"] == 1 && $_SESSION["perfil"] == "Administrador")) {

             echo '


			<li class="treeview">

				<a href="Correspondencia">

					<i class="fa fa-envelope-o"></i>

					<span>Correspondencia</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="corespinterna">

							<i class="fa fa-circle-o"></i>
							<span>Interna</span>

						</a>

					</li>

					<li>

						<a href="corespexterna">

							<i class="fa fa-circle-o"></i>
							<span>Externa</span>

						</a>

					</li>

				</ul>

			</li>';
	     	} 
	       ?>
		</ul>

	</section>

</aside>