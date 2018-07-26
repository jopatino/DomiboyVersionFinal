

<!DOCTYPE html>
<html>
<head>
	<title>Producto</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="../../css/styles.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<?php 
  session_start();
  if(isset($_SESSION["usuario"])){

  require("../conexion.php");

  $sql = "SELECT  CONCAT(Nombres,' ' ,Apellidos) AS Nombre_comp, Nombre_Producto, Precio, Cantidad, Total, dc.Id_DetalleCarrito AS iddetalle FROM usuario u, producto p, detalle_carrito dc, carrito c WHERE u.Id_Usuario=c.Id_Usuario AND dc.Id_Producto=p.Id_Producto AND dc.Id_Carrito=c.Id_Carrito";
  $total = 0;
  $query=$conexion->query($sql);

  $sqlsession = "SELECT  CONCAT(Nombres,' ' ,Apellidos) AS Nombre_comp, Email FROM usuario WHERE Nombre_Usuario='".$_SESSION["usuario"]."'";
  $querysession = $conexion->query($sqlsession);
  $fetchsession = mysqli_fetch_array($querysession);
  

  $query2 = $conexion->query($sql); 
  $fetch2 = mysqli_fetch_array($query2);

  $sqlcantidad = "SELECT * FROM detalle_carrito WHERE Id_Carrito=1";
  $querycantidad = $conexion->query($sqlcantidad);
  $cantidad = mysqli_num_rows($querycantidad);


?>
    <nav class="green darken-3">
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
      <a href="https://codepen.io/collection/nbBqgY/" class="brand-logo" target="_blank">Domiboy</a>
      <?php 
        if($cantidad>0){
      ?> 
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="btn-floating pulse red" href="carrito.php"><i class="material-icons">shopping_cart</i></a></li>
        </ul>
        
      <?php 
      }
      ?>  

      <ul class="side-nav" id="mobile-demo">
        <li>
          <div class="user-view">
          <div class="background">
            <img src="../../img/flor.jpg">
          </div>
           <a href="#name"><span class="white-text name"><?php echo $fetchsession["Nombre_comp"]; ?></span></a>
            <a href="#email"><span class="white-text email"><?php echo $fetchsession["Email"]; ?></span></a>
          </div>
        </li>
        <li class="white"><a href="../../index.php" class="waves-effect waves-blue"><i class="material-icons">home</i>Inicio</a></li>
        <li class="white"><a href="carrito.php" class="waves-effect waves-blue"><i class="material-icons">shopping_cart</i>Pedido</a></li>
        <li class="white"><a href="../Nosotros" class="waves-effect waves-blue"><i class="material-icons">person</i>Nosotros</a></li>
        <li class="white"><a href="../Contacto" class="waves-effect waves-blue"><i class="material-icons">call</i>Contacto</a></li>
        <li class="white"><a href="../Opiniones" class="waves-effect waves-blue"><i class="material-icons">chat_bubble</i>Opiniones</a></li>
        <li class="white"><div class="divider"></div></li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">build</i>Opciones</a></li>
        <li class="white"><a href="../Sesion/logout.php" class="waves-effect waves-blue"><i class="material-icons">power_settings_new</i>Cerrar Sesión</a></li>

      </ul>
      
    </div>
  </nav>



<?php
if($cantidad>0){
?>
  <h4 class="center titulo">Detalles del Pedido</h4>
    <br>
    <h6><strong> Comprador: <?php echo $fetchsession["Nombre_comp"]; ?></h6>
    <table class="responsive-table">
      <tr class="">
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th>Opciones</th>
      </tr>
      <?php 
      while($fetch = mysqli_fetch_array($query)){ ?>
      <tr>
        <td><?php echo $fetch['Nombre_Producto']; ?></td>
        <td><?php echo "$".$fetch['Precio']; ?></td>
        <td><?php echo $fetch['Cantidad']; ?></td>
        <td><?php echo ("$".$fetch['Precio']*$fetch['Cantidad']); ?></td>
        <td>
          <form action="carrito.php" method="POST">
            <input type="hidden" name="idDetalle" value="<?php echo $fetch['iddetalle']; ?>">
            <input type="submit" value="Borrar" name="borrar<?php echo $fetch['iddetalle']; ?>" class="btn waves-effect btn red darken-3">
              <?php
                if(isset($_POST['borrar'.$fetch['iddetalle']])){
                  $detalle = $_POST['idDetalle'];
                  $sqlDelete = "DELETE FROM detalle_carrito WHERE Id_DetalleCarrito=".$detalle; 
                  $conexion->query($sqlDelete);
                }
               ?>    
          </form>
        </td>
      </tr>
      <?php
      $total = $total + 3000 + ($fetch['Precio']*$fetch['Cantidad']);
      }
      ?>
      <tr>
        <td colspan="2" class="green-text"><h5><strong>Precio Domicilio:</strong> $3000</h5></td>
        <td colspan="2" class="red-text"><h5><strong>Total: </strong> <?php echo "$".$total; ?></h5></td>
      </tr>
    </table>

    <form action="finished.php" method="POST">
      <div class="row">
        <div class="col s12">
          <div class="card darken-1">
            <div class="card-content ">
              <span class="card-title titulo">Dirección de Domicilio</span>
              <form action="finished.php" method="POST">
          <div class="row">
            <div class="input-field col s12">
                  <input required="required" placeholder="EJM: Calle 24 # 17-44" id="direccion" name="direccion" type="text" class="validate">
                </div>
          </div>
          <input type="hidden" name="total" value="<?php echo $total; ?>">
        </form>
            </div>
            <div class="card-action">
              <input class="btn waves-effect btn waves-green light-blue darken-3" type="submit" name="enviar" value="Finalizar Pedido">
            </div>
          </div>
        </div>
      </div>
    </form>
  
<?php 
}else{
?>
  <h4 class="center titulo">No tienes ningún pedido pendiente</h4>
<?php 
}  
 ?>


		
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
          <a href="../../index.php">Volver al Inicio</a>
        </div>
      </div>
    </div>
    <div class="col m3"></div>
  </div>
</center>
<?php
}
?>
	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>



