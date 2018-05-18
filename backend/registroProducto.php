<?php
    require_once 'conexion.php';
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $origen=$_POST['origen'];
        $destino=$_POST['destino'];

        $sql="INSERT INTO producto ( nombre, Descripcion,origen,destino) VALUES ( :nombre , :descripcion ,:origen,:destino)";
        $añadir=$conexion->prepare($sql);
        $r=$añadir->execute(array(":nombre"=>$nombre,":descripcion"=>$descripcion ,":origen"=>$origen,":destino"=>$destino));
     
         if($r){
        echo "datos insertados";
         header('location:../plantillas/producto.php');	

        }else{
        echo "fallo";
        }
      
    
    
?>