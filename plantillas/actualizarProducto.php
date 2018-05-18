<?php
    require_once '../backend/conexion.php';    
    $resultado=$conexion->prepare('SELECT producto.id, producto.nombre ,producto.Descripcion ,pais.nombre AS origen, pais1.nombre AS destino FROM producto 
    INNER JOIN pais ON producto.origen=pais.id 
    INNER JOIN pais as pais1 ON producto.destino=pais1.id');
    $resultado->execute();
    $productos=$resultado->fetchAll();

    $resultado=$conexion->prepare('SELECT  * FROM pais' );
    $resultado->execute();
    $paises=$resultado->fetchAll();

    
    $id=$_GET["id"];
    $resul1=$conexion->prepare("SELECT  * FROM  producto WHERE id =:id " );
    $resul1->execute(array(':id'=> $id));
    $res1=$resul1->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery/jquery-2.1.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../jquery/validacion.js"></script>
    <script src="../angular/angular.min.js"></script>
    <script src="../angular/app.js"></script>
    <title>Registrar Producto</title>
</head>
<body >
    <div class="container">    
        <div class="row">
            <main class="col-md-5 col-sm-12 mt-5">
                <form action="../backend/actualizarp.php" method="POST" name="formp">
                <input type="number" name="id" value="<?php echo $id;?>" style=display:none;>
                    <div class="form-group">
                        <label for="nombre">Nombre Del Producto</label>
                        <input type="text" name="nombre" value="<?php echo $res1['nombre'];?>" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion Del Producto</label>
                        <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $res1['Descripcion']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="origen">Origen Del Producto</label>
                        <select name="origen" id="origen" class="form-control" >
                            <?php foreach ($paises as $pais ){?>
                            <option value="<?php echo $pais['id'];?>"><?php echo  $pais['nombre'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destino">Destino Del Producto</label>
                        <select name="destino" id="destino" class="form-control" onclick="paises()">
                        <?php foreach ($paises as $pais ){?>
                            <option value="<?php echo $pais['id'];?>"><?php echo $pais['nombre'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="alert alert-danger ate" id="alerta1" style=display:none;>Un producto no puede ser enviado al mismo pais</div>
                    <div class="form-group">
                        <input type="submit" name"btn5" name="btn5" value="Actualizar" class="btn btn-primary">
                        <a href="producto.php"><input type="button" id="btn6" name="btn6"value="regresar" class="btn btn-danger"></a>
                    </form>
            </main>
            <div class="col-md-6">
                    <table class="table table-striped table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Pais Origen</th>
                        <th>Pais Destino</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $producto){ ?>
                        <tr>
                            <td><?php echo $producto['nombre'];?></td>
                            <td><?php echo $producto['Descripcion'];?></td>
                            <td><?php echo $producto['origen'];?></td>
                            <td><?php echo $producto['destino'];?></td>
                            <td><a href="../backend/eliminarp.php?id=<?php echo $producto["id"]; ?>"><input type="button" name="btn2"  id="btn2" value="Eliminar" class="btn btn-danger"></a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
