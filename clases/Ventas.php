<?php 

class ventas{
	public function obtenDatosProducto($idproducto){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT art.nombre,
		art.descripcion,
		art.cantidad,
		img.ruta,
		art.precio
		from articulos as art 
		inner join imagenes as img
		on art.id_imagen=img.id_imagen 
		and art.id_producto='$idproducto'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$d=explode('/', $ver[3]);

		$img=$d[1].'/'.$d[2].'/'.$d[3];

		$data=array(
			'nombre' => $ver[0],
			'descripcion' => $ver[1],
			'cantidad' => $ver[2],
			'ruta' => $img,
			'precio' => $ver[4]
		);		
		return $data;
	}

	public function crearVenta(){
		$c= new conectar();
		$conexion=$c->conexion();

		$fecha=date('Y-m-d');
		$idventa=self::creaFolio();
		$datos=$_SESSION['tablaComprasTemp'];
		$idusuario=$_SESSION['iduser'];

		for ($i=0; $i < count($datos) ; $i++) { 
			$d=explode("||", $datos[$i]);

			$sql="INSERT into ventas (
				id_venta,
				id_cliente,
				id_producto,
				id_usuario,
				precio,
				fechaCompra)
			values (
				'$idventa',
				'$d[5]',
				'$d[0]',
				'$idusuario',
				'$d[3]',
				'$fecha'
			)";
			//esto contiene true o false dependiendo si se realizo el insert
			$result=mysqli_query($conexion,$sql);
		}

		//si actualizar se hizo entonces se devuelve true a la venta
		$actualizar_cantidad = self::actualizarCantidad($d[0]);
		if($actualizar_cantidad == True){
			return $result;
		} else {
			return false;
		}

	}

	public function creaFolio(){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT id_venta from ventas group by id_venta desc";

		$resul=mysqli_query($conexion,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}

	public function nombreCliente($idCliente){
		$c= new conectar();
		$conexion=$c->conexion();

		 $sql="SELECT apellido,nombre 
			from clientes 
			where id_cliente='$idCliente'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function obtenerTotal($idventa){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT precio 
				from ventas 
				where id_venta='$idventa'";
		$result=mysqli_query($conexion,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}

	public function actualizarCantidad($idProducto){
		$c = new conectar();
		$conexion = $c->conexion();
		
		//obtenemos la cantidad de articulos
		$sql = "SELECT * FROM articulos WHERE id_producto = ".$idProducto;
		$query = mysqli_query($conexion,$sql);
		$data = mysqli_fetch_row($query);
		$cantidad = $data[6];
		$nueva_cantidad = (int)$cantidad - 1;

		$sql2 = "UPDATE articulos SET cantidad = ".$nueva_cantidad." WHERE id_producto = ".$idProducto;

		$query2 = mysqli_query($conexion,$sql2);		
		return $query2;

	}
}

?>