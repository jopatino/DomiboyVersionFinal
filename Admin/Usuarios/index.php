<?php 
  require("../conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro en Domiboy</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="../../css/styles.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
      <div class="container">
         <div class="row">
          <div class="col s12">
            <form method="POST">
              <div class="card">
                <div class="card-content">
                  <span class="card-title center domiboy"><h4>Registro en Domiboy</h4></span>
                  

                    <div class="row">
                        <div class="row">

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">chevron_right</i>
                              <input id="nombre" type="text" class="validate" name="nombre" required="required">
                              <label for="nombre">Nombre Completo</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">chevron_right</i>
                              <input id="apellidos" type="text" class="validate" required="required" name="apellidos">
                              <label for="apellidos">Apellidos</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">account_circle</i>
                              <input id="username" type="text" class="validate" required="required" name="username">
                              <label for="username">Nombre de Usuario</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">local_phone</i>
                              <input id="phone" type="text" class="validate" required="required" name="phone">
                              <label for="phone">Número de Teléfono</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">email</i>
                              <input id="email" type="email" class="validate" required="required" name="email">
                              <label for="email">Correo Electrónico</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">home</i>
                              <input id="domicilio" type="text" class="validate" required="required" name="domicilio">
                              <label for="domicilio">Dirección de Domicilio</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">vpn_key</i>
                              <input id="password" type="password" name="password" required="required" class="validate">
                              <label for="password">Contraseña</label>
                            </div>
                          </div> 
                        </div>

                        <?php 
                          if(isset($_POST["insertUser"])){

                            if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['username']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['domicilio']) && !empty($_POST['password'])){
                            
                            $nombre = $_POST["nombre"];
                            $apellidos = $_POST["apellidos"];
                            $username = $_POST["username"];
                            $phone = $_POST["phone"];
                            $email = $_POST["email"];
                            $domicilio = $_POST["domicilio"];
                            $password = $_POST["password"];

                            $consulta = "SELECT Nombre_Usuario, Email, Celular FROM usuario WHERE Nombre_Usuario='".$username."' OR Email='".$email."' OR Celular='".$phone."'";
                            $query=$conexion->query($consulta);
                            $num_rows=mysqli_num_rows($query);

                            if($num_rows==0){
                              $sqlInsert = "INSERT INTO usuario(Nombre_Usuario, Password, Nombres, Apellidos, Celular, Email, Domicilio) VALUES('".$username."','".$password."', '".$nombre."', '".$apellidos."', '".$phone."', '".$email."', '".$domicilio."')";
                              $conexion->query($sqlInsert);
                              header("Location:../../index.php");
                          ?>

                            <script>
                              var txt;
                                alert("Usuario registrado satisfactoriamente.");
                                  location.href ="../../index.php";
                            </script>
                          <?php   
                            
                            }elseif($num_rows==1){
                           ?> 
                           <script>
                              alert("Error: El usuario ya se encuentra registrado, pruebe con otro.");
                            </script> 
                          <?php
                            }
                          }
                        }          
                          ?>
                        <div class="row">
                          <div class="card-action center">
                            <input type="submit" value="Registrarse" class="waves-effect waves-light btn marginbutton light-blue accent-4" name="insertUser">
                          </div>
                        </div>
                    </div>
          
                </div>
                
                
              </div>
            </div>
          </form>
        </div>
      </div>
       
        
  

	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>