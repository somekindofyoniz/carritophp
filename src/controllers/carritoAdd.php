<?php
session_start();
if(isset($_GET['producto'])){
    echo $_GET['producto'];
    echo $_REQUEST['cantidad'];     
    $productoID = $_GET['producto'];
    $cantidad = $_REQUEST['cantidad'];
    if(isset($_SESSION['carrito'])){
        if (array_key_exists($productoID, $_SESSION['carrito'])){
            $_SESSION['carrito'][$productoID] += $cantidad;
        }
        else{
            echo "no hay items en el carrito";
            $_SESSION['carrito'][$productoID] = $cantidad;
        }

    }
    else{
        $_SESSION['carrito']=array($productoID => $cantidad);
    } 
    print "<pre>";
    print_r($_SESSION['carrito']);
    print "</pre>";
}

#header('location: ../../productinfo.php?producto='.$productoID);
header('location: ../../index.php');
exit;

?>