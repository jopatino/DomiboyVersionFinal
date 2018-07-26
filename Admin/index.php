

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="../css/styles.css"  media="screen,projection"/>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<?php 

  session_start();
  require("conexion.php");
  if(isset($_SESSION["usuario"])){


  
  $sql = "SELECT * FROM detalle_carrito WHERE Id_Carrito=1";
  $query = $conexion->query($sql);
  $cantidad = mysqli_num_rows($query);

  
      $sqlsession = "SELECT  CONCAT(Nombres,' ' ,Apellidos) AS Nombre_comp, Email FROM usuario WHERE Nombre_Usuario='".$_SESSION["usuario"]."'";
      $querysession = $conexion->query($sqlsession);
      $fetchsession = mysqli_fetch_array($querysession);

?>   

<nav class="green darken-3">
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
      <a href="https://codepen.io/collection/nbBqgY/" class="brand-logo" target="_blank">Domiboy</a>
      <?php 
        if($cantidad>0){
      ?> 
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="btn-floating pulse red" href="pedido/carrito.php"><i class="material-icons">shopping_cart</i></a></li>
        </ul>
        
      <?php 
      }
      ?>  

      <ul class="side-nav" id="mobile-demo">
        <li>
          <div class="user-view">
          <div class="background">
            <img src="../img/flor.jpg">
          </div>
             <a href="#name"><span class="white-text name"><?php echo $fetchsession["Nombre_comp"]; ?></span></a>
            <a href="#email"><span class="white-text email"><?php echo $fetchsession["Email"]; ?></span></a>
          </div>
        </li>
        <li class="white"><a href="index.php" class="waves-effect waves-blue"><i class="material-icons">home</i>Inicio</a></li>
        <li class="white"><a href="Pedido/carrito.php" class="waves-effect waves-blue"><i class="material-icons">shopping_cart</i>Pedido</a></li>
        <li class="white"><a href="Nosotros" class="waves-effect waves-blue"><i class="material-icons">person</i>Nosotros</a></li>
        <li class="white"><a href="Contacto" class="waves-effect waves-blue"><i class="material-icons">call</i>Contacto</a></li>
        <li class="white"><a href="Opiniones" class="waves-effect waves-blue"><i class="material-icons">chat_bubble</i>Opiniones</a></li>
        <li class="white"><div class="divider"></div></li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">build</i>Opciones</a></li>
        <li class="white"><a href="Sesion/logout.php" class="waves-effect waves-blue"><i class="material-icons">power_settings_new</i>Cerrar Sesión</a></li>

      </ul>
      
    </div>
  </nav>
     <!--Cuerpo -->
    <div class="row">
       <h3 class="center-align">Negocios</h3>
    </div>
    <?php 
        if($cantidad>0){
      ?>
      <center> 
        <ul id="nav-mobile" class="hide-on-large-only">
        <li><strong>Tienes un pedido Pendiente</strong></li>
        <li><a class="btn-floating pulse red" href="Pedido/carrito.php"><i class="material-icons">shopping_cart</i></a></li>
        </ul>
       </center>
        
      <?php 
      }
      ?> 
    <div class="row">
       <div class="col s12 m4">
        <h5 class="center">Pizza Nostra</h5>
         <div class="card horizontal">
          <div class="card-image">
            <img src="../img/pizza_nostra.png">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Paipa. Calle 25 # 18-49</p>
            </div>
            <div class="card-action">
              <a href="Pedido">Ver Productos</a>
            </div>
          </div>
        </div>     
       </div>

       <div class="col s12 m4">
         <h5 class="center">La Cascada del Sushi</h5>
         <div class="card horizontal">
          <div class="card-image">
            <img src="../img/cascada.png">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Restaurante Bar, Paipa. Calle 25 # 18-49</p>
            </div>
            <div class="card-action">
              <a href="#">Ver Productos</a>
            </div>
          </div>
        </div>
       </div>

       <div class="col s12 m4">
         <h5 class="center">Wings</h5>
         <div class="card horizontal">
          <div class="card-image">
            <img src="../img/wings.jpg">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Paipa. Calle 25 # 18-49</p>
            </div>
            <div class="card-action">
              <a href="#">Ver Productos</a>
            </div>
          </div>
        </div>
       </div>

    </div> 

    <div class="row">

       <div class="col s12 m4">
         <h5 class="center">El Gran Pollo</h5>
         <div class="card horizontal">
          <div class="card-image">
            <img src="../img/elgranpollo.jpg">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Paipa. Cr19 # 26-01</p>
            </div>
            <div class="card-action">
              <a href="#">Ver Productos</a>
            </div>
          </div>
        </div>
       </div>

       <div class="col s12 m4">
         <h5 class="center">Surtidora de aves la 22</h5>
         <div class="card horizontal">
          <div class="card-image">
            <img src="../img/surtidora.jpg">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Paipa. Cr27 # 16-20</p>
            </div>
            <div class="card-action">
              <a href="#">Ver Productos</a>
            </div>
          </div>
        </div>
       </div>


    </div>

 

    <footer class="page-footer blue darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">DomiBoy</h5>
          </div>
          <div class="col l4 offset-l2 s12">
            <ul>
              <li>© 2018 Copyright Todos los Derechos Reservados</li>
              <li><a class="grey-text text-lighten-3" href="#!">Jose Oliverio Patiño Castaño</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
           
  

	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>

<?php } else{
?>
<center>
  <div class="row">
    <div class="col m3"></div>
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Error</span>
          <p>No has iniciado sesión</p>
        </div>
        <div class="card-action">
          <a href="../index.php">Volver al Inicio</a>
        </div>
      </div>
    </div>
    <div class="col m3"></div>
  </div>
</center>
<?php
}
?>