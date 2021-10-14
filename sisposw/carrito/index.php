<?php 
require "funciones.php";
$obj= new Funciones();
$productos=$obj->getProductos();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Menú</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="font-awesome-4.6.3/css/font-awespme.css">
</head>
<body>

<header>
	<ul>
		<li><a href="#">Inicio</a></li>
		<li><a href="carrito.php">Mi carrito</a></li>
	</ul>
</header>

<?php 
foreach ($productos as $producto):
 ?>

 <div class="prod">
 	<div class="foto">
 		<img src="src/imagen.png" width="80px" alt=""> 		
 	</div>
 	<div class="title"><h3><?php echo $producto['nombre']; ?></h3></div>
 	<div class="precio"><b><?php echo $producto['precio']; ?></b></div>
 	<div class="btn btn-primary btnAgregarInicial" data-toggle="modal" data-target="#Ventana" data-productoID="<?php echo $producto['producto_id'];?>">Agregar a carrito</div>
 <?php endforeach; ?>
 	
 <div class="modal fade" id="Ventana" role="dialog">
 	<div class="modal-dialog">
 		<div class="modal-content">
 		<div class="modal-header">
 			<h4>Agregar al carrito de compras</h4>
 		</div>
 		<div class="modal-body">
 			<p><b>Cantidad</b></p>
 			<input type="number" class="form-control txtCantidad" value="1" placeholder="Cantidad">
 		</div>
 		<div class="modal-footer">
 			<button class="btn btn-dafault" data-dismiss="modal">Cancelar</button>
 			<button class="btn btn-primary btnAgregar">Agregar</button>
 		</div>
 		</div>
 	</div>
 </div>
<script>
	$(document).ready(function(){
		$('.btnAgregarInicial').on('click', function (){
			var producto_id=$(this).attr('data-productoID');

			$('.btnAgregar').attr('data-productoID', producto_id);

		});

		$('.btnAgregar').on('click', function (){

			var cantidad=$('.txtCantidad').val().trim();
			var producto_id=$(this).attr('data-productoID');

			$.ajax({
				type:"POST",
				url: "agregar.php",
				data:{
					cantidad:cantidad,
					producto_id:producto_id
				},	
				success: function(){
					alert("Agregado");
				},
				error: function(){
					alert("Error");
				}

			});
		});

	});
</script>
</body>
</html>