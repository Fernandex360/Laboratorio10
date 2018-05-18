var appAngular=angular.module("inicio",[])
    .controller("productos",function( $scope,$http){
        $scope.posts=[];
         $http.get("http://localhost/sistema/backend/lista.php")
           .then(function(respuesta){
                console.log(respuesta);
                 $scope.empleados=respuesta.data;
                 cosole.log(empleados)
             })
});
