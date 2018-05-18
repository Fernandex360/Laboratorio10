<?php
require_once 'conexion.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$origen=$_POST['origen'];
$destino=$_POST['destino'];

echo $id.$descripcion.$nombre.$origen.$destino;
$consulta="UPDATE producto SET nombre =:nombre, Descripcion =:descripcion,  origen=:origen, destino=:destino WHERE id =:id";
$actualizar=$conexion->prepare($consulta);
$r=$actualizar->execute(array(":nombre"=>$nombre,":descripcion"=>$descripcion ,":origen"=>$origen,":destino"=>$destino ,":id"=>$id ));

if ($r){
    header('location:../plantillas/producto.php');
    echo "Actualizado";
}else{
    header('location:../plantillas/producto.php');
    echo "error";
}

?>