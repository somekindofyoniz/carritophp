function toggleCarrito() {
    console.log("Carrito");
    var obj = document.getElementById('carritoCont');
    console.log(obj.style.display);
    if (obj.style.display === "none"){
        obj.style.display = "flex";
    }
    else{
        obj.style.display = "none";
    }
    console.log(obj.style.display);
}

window.onload = function hola (){
    console.log("HOLAAAA")
}

