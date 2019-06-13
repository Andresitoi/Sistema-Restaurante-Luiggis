<!DOCTYPE html>
<html lang="en">
<head>
	<title>Restaurante Luiggis | Sistema</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset("images/icons/favicon.ico")}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/css/util.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("assets/css/main.css")}}">
<!--===============================================================================================-->

    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
<!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">


    @section('scripts')
        <script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
    @endsection
    
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
                
			<div class="wrap-login100">
                
                <form action="{{route('login_post')}}" method="POST" class="login100-form validate-form">
                    
                    
                    @csrf
                    <div class="login100-form1 validate-form" style="background-image: url({{asset("assets/images/logo.png")}});"></div>
                    
                    <div class="login100">
                            @if($errors->any())  
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i>Existe un error en el Formulario</h4>  
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div> 
                            @endif
                    </div>

					<span class="login100-form-title p-b-34">Cuenta de usuario</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="usuario" value="{{old('usuario')}}" placeholder="Nombre Usuario">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="contraseña">
						<span class="focus-input100"></span>
					</div>
					<!-- Boton de ingreso-->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ingresar
						</button>
					</div>
					<!-- ==========-->

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Olvidaste :
						</span>

						<a href="#" class="txt2">
							nombre de usuario / contraseña?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							Cerrar Sesion
						</a>
					</div>
				</form>
				<div class="login100-more" style="background-image: url({{asset("assets/images/bg-01.jpg")}});"></div>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>

	<script src="{{asset("assets/js/main.js")}}></script>

</body>
</html>