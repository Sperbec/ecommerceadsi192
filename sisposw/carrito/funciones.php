<?php 
require "inicio.php";

class Funciones{

	public function getProductos(){  
		global $pdo;

		$query=$pdo->prepare('SELECT * FROM articulo');
		$query->execute();
		return $query->fetchAll();//retorna todo
	}
	public function agregar($cantidad,$producto_id,$session){
			global $pdo;

			$queryy=$pdo->prepare('SELECT * FROM carrito  WHERE producto_id = :producto_id AND sesion_id = :sesion_id  AND estado = 0');
			$queryy->execute([
				'sesion_id'=>$session,
				'producto_id'=>$producto_id
			]);

			$n = $queryy->rowCount();
			$fila = $queryy->fetchAll();

				foreach ($fila as $key ) {
					$cant = $cantidad + $key['cantidad'];
				}

			if ($n > 0) {

				
				
			$query=$pdo->prepare('UPDATE carrito SET cantidad = :cantidad WHERE producto_id = :producto_id AND sesion_id = :sesion_id  AND estado = 0');
			$query->execute([
				'sesion_id'=>$session,
				'producto_id'=>$producto_id,
				'cantidad'=>$cant
			]);
			}else{

			$query=$pdo->prepare('INSERT INTO carrito (sesion_id,producto_id,cantidad)VALUES (:sesion_id, :producto_id, :cantidad)');
			$query->execute([
				'sesion_id'=>$session,
				'producto_id'=>$producto_id,
				'cantidad'=>$cantidad
			]);
			}

			return "<div class='mensaje'><img src='src/nuevo.png' width='30px'> Agregado al carrito</div>";//retorna todo
	}
	public function actualizarCarrito($cantidad,$producto_id,$session_id){
		global $pdo;

		$query=$pdo->prepare('UPDATE carrito SET cantidad=:cantidad
			WHERE producto_id=:producto_id AND sesion_id=:sesion_id');
			$query->execute([
				'cantidad'=>$cantidad,
				'producto_id'=>$producto_id,
				'sesion_id'=>$session_id
			]);
			return "<div class='mensaje'><img src='../src/nuevo.png' width='30px'> Carrito actualizado</div>";
	}


	public function obtenerCarrito($sesion_id){
		global $pdo;
		$query=$pdo->prepare("
			SELECT
			carrito.*,
			articulo.*
			FROM carrito
			INNER JOIN articulo
			ON carrito.producto_id=articulo.ArtCod
			WHERE sesion_id= :sesion_id
			");
		$query->execute([
			"sesion_id"=>$sesion_id
		]);

		$cadena = array($query->fetchAll(), $query->rowCount());

		return $cadena;
	}

	public function eliminarProducto($producto_id,$cantidad,$sesion_id){
		global $pdo;

		

		$queryy=$pdo->prepare('SELECT * FROM articulo  WHERE ArtCod = :producto_id');
			$queryy->execute([
				'producto_id'=>$producto_id
			]);

			$fila = $queryy->fetchAll();

			foreach ($fila as $key ) {
					$vieja_c= $cantidad + $key['ArtCant'];
				}
			

		$querey=$pdo->prepare('UPDATE articulo SET ArtCant= :cantidad WHERE ArtCod = :producto_id');
			$querey->execute([
				'producto_id'=>$producto_id,
				'cantidad'=>$vieja_c
			]);

			$query=$pdo->prepare("
			DELETE FROM carrito 
			WHERE producto_id=:producto_id AND sesion_id=:sesion_id
			");

		$query->execute([
			"producto_id"=>$producto_id,
			"sesion_id"=>$sesion_id
		]); 
		return "<div class='mensaje'><img src='../src/error.png' width='30px'> Producto eliminado </div>";
	}

}


?>
