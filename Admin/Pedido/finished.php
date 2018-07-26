
<?php 
 	require("../conexion.php"); 
 	$total = $_POST['total'];
	$direccion = $_POST['direccion'];
	if(isset($_POST['enviar'])){
		if(!empty($_POST['direccion'])){
			$sqlupdate = "UPDATE carrito SET Total=".$total."WHERE Id_Carrito=1";
			$conexion->query($sqlupdate);

			$sqldelete = "DELETE FROM detalle_carrito WHERE Id_Carrito=1";
			$conexion->query($sqldelete);

		}
	}


  $sqlcantidad = "SELECT * FROM detalle_carrito WHERE Id_Carrito=1";
  $querycantidad = $conexion->query($sqlcantidad);
  $cantidad = mysqli_num_rows($querycantidad);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Finalizado</title>
	    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="../../css/styles.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0"/>
</head>
<body>



  
  <div class="row">
  	<div class="col m4"></div>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="../../img/moto.jpg" class="moto">
        </div>
        <div class="card-content">
          <h4 class="center">Finalizado</h4>
          <p class="center">Su pedido ha sido realizado y se enviará a la dirección:</p>
          <p class="center"><?php echo $direccion; ?></p>
          <p class="center">Su pedido llegará aproximadamente en: 15 minutos</p>
          <br>
        </div>
        <div class="card-action">
          <center>
            <a href="../index.php" class="btn blue darken-3 center">Volver al Inicio</a>
          </center>
        </div>
      </div>
    </div>
    <div class="col m4">
  </div>
  <div class="alto"></div>

      <script type="text/javascript" src="../../js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>
<br>