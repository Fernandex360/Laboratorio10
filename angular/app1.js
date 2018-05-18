var appAngular=angular.module("inicio1",[])
    .controller("pais",function( $scope,$http){
        $scope.posts=[];
         $http.get("http://localhost/sistema/backend/listap.php")
           .then(function(respuesta){
                console.log(respuesta);
                 $scope.paises=respuesta.data;
                 cosole.log(paises)
             })
});
