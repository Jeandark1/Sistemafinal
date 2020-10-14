<div id="back"></div>


<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="extensiones/logint/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="extensiones/logint/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="extensiones/logint/css/util.css">
  <link rel="stylesheet" type="text/css" href="extensiones/logint/css/main.css">
  


  <script src="extensiones/logint/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="extensiones/logint/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="extensiones/logint/vendor/bootstrap/js/popper.js"></script>
	<script src="extensiones/logint/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="extensiones/logint/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="extensiones/logint/vendor/daterangepicker/moment.min.js"></script>
	<script src="extensiones/logint/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="extensiones/logint/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="extensiones/logint/js/main.js"></script>



<div class="container-login100" style="background-repeat:no-repeat;  background-image: url('extensiones/logint/images/lamejor.png'); background: no-repeat;  ">

<div class="login-logo">

<img src="vistas/img/plantilla/logo-blanco.png" class="img-responsive" style="padding:30px 100px 0px 100px">

</div>

    
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" >

			<form class="login100-form validate-form" method="post" >

				<span class="login100-form-title p-b-37">
					INICIO DE SECION
				</span>

				<div class="wrap-input100 validate-input m-b-20 " data-validate="ingresa tu usuario">
                   <input class="input100  " type="text" name="ingUsuario" placeholder="Ingresar Usuario" required>
					<span class="focus-input100 -feedback"></span>
				</div>


				<label for="pass"> </label> <button class=" btnpas btonpas glyphicon glyphicon-eye-open btnActivarvista" id="#order"></button>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Ingresar Contraseña" required>
                   <input class="input100" type="password" name="ingPassword" id="pass" placeholder="Contraseña" required> 
					<span class="focus-input100 ">  </span>
				</div>


				

				<br>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						INGRESAR
					</button>
				</div>
				<div class="text-center">
					<a href="#" class="txt2 hov1">
						BIENVENIDO AL SISTEMA QUE TENGA UN BUEN DIA :v
					</a>
        </div>
        
        <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>
			</form>

			
		</div>
	</div>
	<div id="dropDownSelect1"></div>

  </div>

</div>

