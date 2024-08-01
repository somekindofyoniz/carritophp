<?php
session_start();

    if(isset($_SESSION['carrito'])){
        unset($_SESSION['carrito']);

    }
    else{
        echo "no existe carrito";
    } 
    print "<pre>";
    print_r($_SESSION['carrito']);
    print "</pre>";


#header('location: ../../productinfo.php?producto='.$productoID);
header('location: ../../carrito.php');
exit;

?>