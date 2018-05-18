<?php
    require_once 'conexion.php';
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    echo $id .$nombre .$descripcion;
    $consulta="UPDATE pais SET nombre =:nombre, Descripcion =:descripcion  WHERE id =:id";
    $actualizar=$conexion->prepare($consulta);
    $r=$actualizar->execute(array(
    ":id"=>$id,
    ":nombre"=>$nombre,
    ":descripcion"=>$descripcion
     ));
     if ($r){
        header('location:../plantillas/pais.php');
        echo "Actualizado";
    }else{
        header('location:../plantillas/pais.php');
        echo "error";
    }
?>