<?php
require_once 'conexion.php';
    $id=$_GET['id'];
    echo ($id);
    $consulta="DELETE FROM pais WHERE id =:id";
    $actualizar=$conexion->prepare($consulta);
    $r=$actualizar->execute(array(":id"=> $id));
    if ($r){
        echo "Eliminado";
        header('location:../plantillas/pais.php');
    }else{
       
        header('location:../plantillas/pais.html');
        echo "error";
        $validacion="No Se puede eliminar por que hay un producto usando este pais";
    }

    	
?>