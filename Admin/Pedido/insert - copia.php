<?php 
require("../conexion.php");
$sql = "SELECT n.Nombre_Negocio as Nombre_Negocio, Descripcion, Nombre_Producto, Id_Producto, Precio FROM producto p, negocio n WHERE n.Id_Negocio=p.Id_Negocio";
$query = $conexion->query($sql);
$fetch2 = mysqli_fetch_array($query);

?>

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
		
	<h5 class="center"><?php echo $fetch2['Nombre_Negocio']; ?></h5>
	<h6 class="center"><?php echo $fetch2['Descripcion']; ?></h6>
	
	<div class="row">
		<table class="highlight">
			<thead>
				<tr>
					<th>Nombre del producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>
						Opciones
					</th>
				</tr>
			</thead>
			<tbody>
					<?php while($fetch = mysqli_fetch_array($query)){ ?>
						<tr>
						<td><?php echo $fetch['Nombre_Producto']; ?></td>
						<td>$ <?php echo $fetch['Precio']; ?></td>
						<form action="insert.php" method="POST">
						<td><input type="text" name="cantidad"></td>
						<td><input type="submit" 
							       name="enviar<?php echo $fetch['Id_Producto']; ?>" 
							       class="btn light-blue darken-3 waves-green"
							       value="Agregar al pedido"
							       ></td>

							<?php 
								if(isset($_POST['enviar'.$fetch['Id_Producto']])){
									if(!empty($_POST['cantidad'])){

										require("../conexion.php");
										$id_carrito = 1;
										$id_producto = $fetch['Id_Producto'];
										$cantidad = $_POST['cantidad'];

										$sql = "INSERT INTO detalle_carrito(Id_Carrito, Id_Producto, Cantidad) VALUES(".$id_carrito.", ".$id_producto.", ".$cantidad.")";
										$conexion->query($sql);
										header("Location:insert.php");
									}else{
										echo "Por ingrese una cantidad";
									}
								}
							?>
						</form>
						</tr>						
					<?php } ?>
			</tbody>
	</table>




		<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>
