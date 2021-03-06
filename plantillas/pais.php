<!DOCTYPE html>
<html lang="en" ng-app="inicio1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery/jquery-2.1.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../angular/angular.min.js"></script>
    <script src="../angular/app1.js"></script>
    <title>Registrar Pais</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body ng-controller="pais">
    <div class="container mt-3">
        <div class="row">
            <main class="col-md-5 col-sm-12 mt-5">
                <form action="../backend/registroPais.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre Del Pais</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion Del Pais</label>
                        <textarea required name="descripcion" id="descripcion" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn1"  id="btn1" value="Registrar" class="btn btn-primary">
                        <a href="../index.html"><input type="button" value="regresar" class="btn btn-danger"></a>
                    </div>
                </form>
            </main>
            <div class="col-md-7">
                <form action="" class="form-inline align-self-end"> 
                <label for="nombre" class="mr-2">Buscar Por Nombre</label>
                <input type="text" id="nombre" name="nombre" ng-model="buscar" class="mr-3 form-control col-4" >
                <input type="botton" name="buscar"  id="buscar" value="Buscar" class="btn btn-primary mr-2">
                </form>
                <table class="table table-striped table-hover mt-3">
                    <thead>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                    </thead>
                    <tbody>
                        
                        <tr ng-repeat="pais in paises | filter : buscar">
                            <td>{{pais.nombre}}</td>
                            <td>{{pais.Descripcion}}</td>
                            <td><a href="actualizarPais.php?id={{pais.id}}"><input type="button" name="btn2"  id="btn2" value="Editar" class="btn btn-success"></a></td>
                            <td><a href="../backend/eliminar.php?id={{pais.id}}"><input type="button" value="Eliminar" class="btn btn-danger"></a></td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

