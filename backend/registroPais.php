<?php
    require_once 'conexion.php';
    //insert 
    if(isset($_POST['btn1'])){
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];

    $sql="INSERT INTO pais ( nombre, Descripcion) VALUES ( :nombre , :descripcion)";
     $añadir=$conexion->prepare($sql);
     $r=$añadir->execute(array(":nombre"=>$nombre,":descripcion"=>$descripcion));
     
     if($r){
         echo "datos insertados";
         header('location:../plantillas/pais.php');	
     }else{
     echo "fallo";
     }
    }
     ///update
    
    
?>