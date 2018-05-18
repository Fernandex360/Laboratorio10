function paises(){
    var value = formp.origen.value;
    var value1=formp.destino.value;
    if (value == value1){
        document.getElementById("alerta1").style.display="block";
        document.formp.btn5.disabled=true;
 
    }else{
        document.getElementById("alerta1").style.display="none";
        document.formp.btn5.disabled=false;
    }
}
