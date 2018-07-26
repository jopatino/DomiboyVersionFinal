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
		$sql = "SELECT n.Nombre_Negocio as Nombre_Negocio, Descripcion, Nombre_Producto, Id_Producto, Precio FROM producto p, negocio n WHERE n.Id_Negocio=p.Id_Negocio";
		$query = $conexion->query($sql);
		$fetch2 = mysqli_fetch_array($query);

		$sqlcantidad = "SELECT * FROM detalle_carrito WHERE Id_Carrito=1";
		  $querycantidad = $conexion->query($sqlcantidad);
		  $cantidad = mysqli_num_rows($querycantidad);

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
		
	<h5 class="center"><?php echo $fetch2['Nombre_Negocio']; ?></h5>
	<h6 class="center"><?php echo $fetch2['Descripcion']; ?></h6>
	
	<div class="row">
		<table class="highlight">
			<thead>
				<tr>
					<th>Nombre del producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
				</tr>
			</thead>
			<tbody>
					<?php while($fetch = mysqli_fetch_array($query)){ ?>
					<tr>
					<td><?php echo $fetch['Nombre_Producto']; ?></td>
					<td>$ <?php echo $fetch['Precio']; ?></td>
					<td><a class="waves-effect waves-green btn modal-trigger light-blue darken-3" href="#modal<?php echo $fetch['Id_Producto']; ?>"><i class="material-icons left">add_shopping_cart</i>Agregar al pedido</a></td>
					</tr>
						

					<div class="row">
						<form action="index.php" method="POST">
						  <!-- Modal Structure -->
						  <div id="modal<?php echo $fetch['Id_Producto']; ?>" class="modal bottom-sheet">
						    <div class="modal-content">
						      <h4><?php echo $fetch['Nombre_Producto']; ?></h4>
						      <h6>Valor: $ <?php echo $fetch['Precio']; ?></h6>

				
						       <div class="row">
							    <div class="input-field col s6">
							      <input type="text" name="cantidad" placeholder="Cantidad">
							    </div>
							  </div>

						    </div>
						    <div class="modal-footer">
								<input type="submit" 
							       name="enviar<?php echo $fetch['Id_Producto']; ?>" 
							       class="btn light-blue darken-3 waves-green left"
							       value="Agregar al pedido"
							       >

							    <?php 
								if(isset($_POST['enviar'.$fetch['Id_Producto']])){
									if(!empty($_POST['cantidad'])){

										require("../conexion.php");
										$id_carrito = 1;
										$id_producto = $fetch['Id_Producto'];
										$cantidad = $_POST['cantidad'];

										$sql = "INSERT INTO detalle_carrito(Id_Carrito, Id_Producto, Cantidad) VALUES(".$id_carrito.", ".$id_producto.", ".$cantidad.")";
										$conexion->query($sql);
										header("Location:index.php");
									}else{
										echo "Por ingrese una cantidad";
									}
								}
								?>
							</div>
						</form>
					</div>
						  </div>
					</div>						
					<?php } ?>
			</tbody>
	</table>
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
