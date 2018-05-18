<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');

	$conexion=mysqli_connect("localhost","root","","pasise");
	// revisa si la conexion es correcta
	if (mysqli_connect_errno($conexion)) {
		echo "error en la conexion a base de datos: " . mysqli_connect_error();
	}
	 
	$conexion->set_charset("utf8") ;

	 $result =$conexion->query("SELECT producto.id, producto.nombre ,producto.Descripcion ,pais.nombre  AS origen, pais1.nombre AS destino FROM producto 
	 INNER JOIN pais ON producto.origen=pais.id 
	 INNER JOIN pais as pais1 ON producto.destino=pais1.id");

 	$resultadoOrdenado = array();

	while($row = mysqli_fetch_array($result)){
     
	   	$objetoPais = array();
	   	$objetoPais["id"]          = $row['id'];
	   	$objetoPais["nombre"]      = $row['nombre'];
        $objetoPais["Descripcion"] = $row['Descripcion'];
		$objetoPais["destino"]     = $row['destino'];
		$objetoPais["origen"]      = $row['origen'];
	   	array_push($resultadoOrdenado, $objetoPais);
	}
		echo json_encode($resultadoOrdenado, JSON_UNESCAPED_UNICODE );
?>