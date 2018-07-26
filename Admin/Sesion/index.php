<?php 
session_start();
require("../conexion.php");
  if(isset($_SESSION["usuario"])){
    header("Location:../index.php");
  }else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión</title>
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
                  <span class="card-title center domiboy"><h4>Inicio de Sesión</h4></span>
                  

                    <div class="row">
                        <div class="row">
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">account_circle</i>
                              <input id="email" type="text" class="validate" name="user">
                              <label for="email">Nombre de Usuario</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix icono">input</i>
                              <input id="password" type="password" name="password" class="validate">
                              <label for="password">Contraseña</label>
                            </div>
                          </div> 
                        </div>

                        <?php 
                          if(isset($_POST["iniciosesion"])){
                            if(isset($_POST["user"]) && isset($_POST["password"])){
                              $user = $_POST["user"];
                              $password = $_POST["password"];
                              $sql = "SELECT * FROM usuario WHERE Nombre_Usuario = '".$user."' AND Password = '".$password."'";
                              $query = mysqli_query($conexion, $sql);
                              $rows = mysqli_num_rows($query);

                              if($rows > 0){
                                $_SESSION["usuario"] = $user;
                                header("Location: ../index.php");
                              }else{ ?>
                                <center>            
                                  <div class="chip" style="color:red;">
                                    Usuario y/o Contraseña incorrectos
                                    <i class="close material-icons">close</i>
                                  </div>
                                </center>
                                <?php } 
                              }else if(empty($_POST["user"] || empty($_POST["password"]))){
                                echo "Digite los datos completos";
                                } 
                            }          
                        ?>
                        <div class="row">
                          <div class="card-action center">
                            <input type="submit" value="Iniciar Sesión" class="waves-effect waves-light btn marginbutton light-blue accent-4" name="iniciosesion">
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

<?php } ?>