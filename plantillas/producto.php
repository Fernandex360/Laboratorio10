<?php
require_once '../backend/conexion.php';
$resultado=$conexion->prepare('SELECT  * FROM pais' );
$resultado->execute();
$paises=$resultado->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" ng-app="inicio">
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
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body ng-controller="productos" >
    <div class="container mt-3">    
        <div class="row">
            <main class="col-md-5 col-sm-12 mt-5">
                <form action="../backend/registroProducto.php" method="POST" name="formp">
                    <div class="form-group">
                        <label for="nombre">Nombre Del Producto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion Del Producto</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="origen">Origen Del Producto</label>
                        <select name="origen" id="origen" class="form-control"  onclick="paises()">
                            <?php $pais1; foreach ($paises as $pais1 ){?>
                            <option value="<?php echo $pais1['id'];?>"><?php echo $pais1['nombre'];?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="destino">Destino Del Producto</label>
                        <select name="destino" id="destino" class="form-control" onclick="paises()" >
                        <?php foreach ($paises as $pais ){ ?>
                            <option value="<?php echo $pais['id'];?>"><?php echo $pais['nombre'];?></option> 
                        <?php  } ?>
                        </select>
                    </div>
                    <div class="alert alert-danger ate" id="alerta1" style=display:none;>Un producto no puede ser enviado al mismo pais</div>
                    <div class="form-group  align-self-end">
                        <input type="submit" name"btn5" id="btn5" value="Registrar" class="btn btn-primary" onclick="paises()" >
                        <a href="../index.html"><input type="button" value="regresar" name="btn6" id="btn6" class="btn btn-danger"></a>
                    </div>
                    
                    </form>
            </main>
            <div class="col-md-6">
                <form action="" class="form-inline" method"POST"> 
                    <label for="nombre" class="mr-2">Buscar Por Nombre</label>
                    <input type="text" id="nombre" name="nombre" ng-model="buscar" class="mr-3 form-control col-4" >
                    <input type="submit" name="buscar"  id="buscar" value="Buscar" class="btn btn-primary mr-2">
                </form>
                    <table class="table table-striped table-hover mt-3">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Pais Origen</th>
                        <th>Pais Destino</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        
                    </thead>
                    <tbody>
                    <tr ng-repeat="empleado in empleados | filter : buscar ">
                            <td>{{empleado.nombre}}</td>
                            <td>{{empleado.Descripcion}}</td>
                            <td>{{empleado.origen}}</td>
                            <td>{{empleado.destino}}</td>
                            <td><a href="actualizarProducto.php?id={{empleado.id}}"><input type="button" value="Editar" class="btn btn-success"></a></td>
                            <td><a href="../backend/eliminarp.php?id={{empleado.id}}"><input type="button" value="Eliminar" class="btn btn-danger"></a></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
