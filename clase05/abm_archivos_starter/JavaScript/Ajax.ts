function Listado() {
    let http = new XMLHttpRequest();

    http.open("POST", "administracion.php", true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('queHago=mostrarGrilla');
    http.onreadystatechange = function () {
      if(http.readyState == 4 && http.status == 200)
      {
        document.getElementById("divGrilla").innerHTML = http.responseText;
      }
    }
}

function Verificacion() : string  {
    let http = new XMLHttpRequest();

    http.open("GET", "Verificacion.php", true);
    http.send();

    return http.responseText;
}


window.onload = function() {
    let $verificar : string = Verificacion();
    if($verificar == "ok")
    {
        Listado();
    }
    else
    {
        window.location.href="relogo.php";
    }
}