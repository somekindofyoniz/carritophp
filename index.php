<?php
session_start();
#if (isset($_SESSION['carrito'])) {
#    print "<pre>";
#    print_r($_SESSION['carrito']);
#    print "</pre>";
#}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Tienda</title>
</head>

<body>
    <script src="./src/script/scripts.js"></script>
    <div class="header">
        <div class="headercol1">
            <h1 class="htitle">Krid's Music store</h1>
            <p class="hsub">Listado de productos</p>

        </div>
        <div class="headercol2">
            <a onclick="toggleCarrito()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
            </a>
            <div id="carritoCont" class="carritoCont" style="display: none;">
                Carrito de compras lolol
                <br>
                <?php
                include './src/controllers/connection.php';
                if (isset($_SESSION['carrito'])) {
                    echo "Carro";
                    echo "<br>";
                    foreach ($_SESSION['carrito'] as $producto => $cantidad) {
                        $pres = mysqli_query($con, "select nombre FROM productos WHERE id='$producto'");
                        $pdata = mysqli_fetch_array($pres);
                        echo ($pdata['nombre'] . " x" . $cantidad);
                        echo "<br>";
                    }
                } else {
                    echo "No hay elementos en el carrito";
                }
                ?>
                <a href="carrito.php">Ver Carrito</a>

            </div>
        </div>
    </div>
    <div class="container">
        <?php
        include './src/controllers/connection.php';

        $list = mysqli_query($con, "select * from productos") or die("No se pudo concretar");
        echo mysqli_error($con);
        
            while ($r = mysqli_fetch_array($list)) {
            ?>
                <div class="productcard">
                    <div class="pcol1">
                        <h3><?php echo "" . $r['nombre']; ?></h3>
                        <h4 class="textcat"><?php echo "" . $r['categoria']; ?></h4>
                        <p class="textprice"><?php echo "" . $r['precio']; ?></p>
                        <a href="productinfo.php?producto=<?php echo $r['id']; ?>">
                            <button>Detalles</button>
                        </a>
                    </div>
                    <div class="pcol2">
                        <img class="productimg" src="data:image/png;base64,<?php echo base64_encode($r['imagen']); ?>" alt="" />
                    </div>
                </div>

            <?php
            }

            ?>


    </div>

</body>

</html>