function validar() {
    var nombre, apellido, NumIdentificacion, Email, nombreU, codigo, contraseña, verificar, comprobar; 
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    NumIdentificacion = document.getElementById("NumIdentificacion").value;
    Email = document.getElementById("Email").value;
    nombreU = document.getElementById("nombreU").value;
    codigo = document.getElementById("codigo").value;
    contraseña = document.getElementById("contraseña").value;
    verificar = document.getElementById("verificar").value;
    comprobar = document.getElementById("comprobar").value;

    if(nombre ==="" || apellido ==="" || NumIdentificacion ==="" || Email ==="" || nombreU ==="" || codigo ==="" || contraseña ==="" || verificar ==="" || comprobar ==="") {
        alert("Este campo es obligatorio ")
        return false;
    }
    else{}
}