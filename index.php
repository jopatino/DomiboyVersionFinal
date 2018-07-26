<?php
  session_start();
  if(isset($_SESSION["usuario"])){
    header("Location:Admin");
  }else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/styles.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
      <div class="container">
         <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center domiboy"><h1>DomiBoy</h1></span>
                <p class="center">La mejor aplicación para pedir tus domicilios en Boyacá</p>
              </div>
              <div class="card-action center">
                <a class="waves-effect waves-light btn marginbutton green darken-2" href="Admin/Sesion/"><i class="material-icons left">exit_to_app</i>Iniciar Sesión</a>
                <a href="Admin/Usuarios/" class="waves-effect waves-light btn marginbutton light-blue accent-4"><i class="material-icons left">account_box</i>Soy Nuevo</a>
              </div>
            </div>
          </div>
        </div>
      </div>
       
        
  

	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
<?php 
}
?>