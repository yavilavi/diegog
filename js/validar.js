
function validar() {
    
    var nombre, apellido, tipo, documento, correo, telefono, carrera, modalidad;
    nombre=document.getElementById("nomb").value;
    apellido=document.getElementById("apelli").value;
    tipo=document.getElementById("tipo").value;
    documento=document.getElementById("documento").value;
    correo=document.getElementById("correo").value;
    telefono=document.getElementById("celular").value;
    carrera=document.getElementById("carrera").value;
    modalidad=document.getElementById("modalidad").value;
    alert("tipo  "+tipo+ "  carrera:  "+carrera+"   modalida:  "+modalidad);
  
}

