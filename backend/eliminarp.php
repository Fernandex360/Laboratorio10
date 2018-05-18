<?php
require_once 'conexion.php';


    $consulta="DELETE FROM producto WHERE id =:id";
    $actualizar=$conexion->prepare($consulta);
    $r=$actualizar->execute(array(":id"=> $_GET['id']));
    if ($r){
        echo "Eliminado";
        header('location:../plantillas/producto.php');	
    }

    
?>