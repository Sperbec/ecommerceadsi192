<?php 
require "funciones.php";
$obj= new Funciones();
$productos=$obj->obtenerCarrito(session_id());
$prod = $productos[0];
$num = $productos[1];
$suma=0;
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
	<style type="text/css">
		.totalpagar{
    padding: 1em;
    background: #f1f1f1;
    text-align: right;
    font-weight: bold;
}

.mensaje{
    position: fixed;
    right: 10px;
    bottom: 10px;
    width: 300px;
    padding: 1em;
    border-radius: 10px;
    background: #434747;
    color: #fff;
    z-index: 10;
    display: flex;
    align-items: center;
    font-size: .9em;
    animation-name: mensaje, irse;
    animation-delay: 0s, 5s;
    animation-duration: .5s, 2s;
    animation-fill-mode: forwards, forwards;
    animation-timing-function: ease-in-out, ease-in-out;
}


@-webkit-keyframes mensaje{
    from{
        bottom: -100px;
    }

    to{
        bottom:35px;
    }
}


@keyframes mensaje{
    from{
        bottom: -100px;
    }

    to{
        bottom:35px;
    }
}

@-webkit-keyframes irse{
    from{
        bottom: 35px;
    }

    to{
        bottom:-100px;
    }
}


@keyframes irse{
    from{
        bottom: 35px;
    }

    to{
        bottom:-100px;
    }
}


	</style>
</head>
<body>

<header>
	<ul>
		<li><a href="../index.php">Inicio</a></li>
		<li class="active"><a href="#">Carrito</a></li>
	</ul>
	<div class="container">
		<h2>Carrito</h2>
		<?php 
		if($num == 0){ ?>
				<h2>No existen productos en el carrito</h2>
		<?php }else{ ?>
		<table class="table table-striped">
			<tr>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio unitario</th>
				<th>Subtotal</th>
				<th>IVA</th>
				<th>Total</th>
			</tr>
			<?php


			foreach ($prod as $producto): ?>
				<tr>
					<td><?php echo $producto['ArtDes']; ?></td>
					<td><input type="number" value="<?php echo $producto['cantidad']; ?>"class="form-control" id="txtCambiarCantidad<?php echo $producto['ArtCod']; ?>" max="<?php echo $producto['ArtCant'];?>" />
						<button class="btn btn-info btnCambiarCantidad" data-ProductoID="<?php echo $producto['ArtCod']; ?>">Actualizar</button>

						<button class="btn btn-danger btnEliminarProducto" data-ProductoID="<?php echo $producto['ArtCod']; ?>">Eliminar</button>

					</td>
					<td><?php echo "$".number_format($producto['ArtPre'],0,',','.'); ?></td>
					<td><?php $sub = $producto['cantidad']* $producto['ArtPre'];
					echo "$".number_format($sub,0,',','.');; ?></td>
					<td><?php $iva = $sub * 0.19; echo "$".number_format($iva,0,',','.');; ?></td>
					<td><?php $total =  $sub + $iva; echo "$".number_format($total,0,',','.'); ?></td>
				</tr>
				<?php $suma+= $total; ?>
			<?php endforeach; ?>
			<tr>
				<td class="totalpagar" colspan="6"><?php echo "$".number_format($suma,0,',','.'); ?></td>
			</tr>
		</table>

		

		<a href="../reportes/comprobar.php" class="btn btn-warning btnPagar" style="float:right;">Finalizar compra</a>

	<?php } ?>
</header>


<div class="resp"></div>

<script>
	$(document).ready(function(){
		$('.btnCambiarCantidad').on('click', function (){

			var ArtCod=$(this).attr('data-ProductoID');
			var ArtCant=$('#txtCambiarCantidad'+ ArtCod).val();
			
			console.log(ArtCod);
			console.log(ArtCant);


			$.ajax({
				type:"POST",
				data:{
					ArtCant:ArtCant,
					ArtCod:ArtCod
				},	
				url:'actualizar_carrito.php',
				success: function(data){
					$(".resp").html(data);
					setTimeout(function(){
window.location.href="carrito.php";
},1500);
					
				},
				error: function(){
					alert("Error");
				}

			});
		});



		$('.btnEliminarProducto').on("click", function(){
			var ArtCod= $(this).attr("data-ProductoID");
			var ArtCant=$('#txtCambiarCantidad'+ ArtCod).val();

			var r = confirm("¿Desea eliminar este produco del carrito de compras?");
				if (r == true) {
				  	$.ajax({

				type:"POST",
				data:{
					ArtCod:ArtCod,
					ArtCant:ArtCant
				},	
				url:'eliminar_producto.php',
				success: function(data){
					$(".resp").html(data);
					setTimeout(function(){
window.location.href="carrito.php";
					},1500);
				},
				error: function(){
					alert("Error");
				}



			});
				} 

		});

	});
</script>

</body>
</html>
