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
    <div class="header">
        <div class="headercol1">
            <h1 class="htitle">Krid's Music store</h1>
            <p class="hsub">carrito</p>

        </div>
    </div>

    <a href="./index.php">Volver</a>
    <div class="container2">
        <?php
        session_start();
        include './src/controllers/connection.php';
        if (isset($_SESSION['carrito'])) {
        ?>
            <div class="cart1">
                <?php
                foreach ($_SESSION['carrito'] as $producto => $cantidad) {
                    $pres = mysqli_query($con, "select * FROM productos WHERE id='$producto'");
                    $pdata = mysqli_fetch_array($pres);
                ?>
                    <div class="cartitem">
                        <div class="icol1">
                            <img class="cartimg" src="data:image/png;base64,<?php echo base64_encode($pdata['imagen']); ?>" alt="" />
                        </div>
                        <div class="icol2">
                            <h3 class="textinf"><?php echo $pdata['nombre']; ?></h3>
                            <p class="carttextprice"><?php echo "$" . $pdata['precio']; ?></p>

                        </div>
                        <div class="icol3">
                            <p>Cantidad</p>
                            <p><?php echo $cantidad . " unidades"; ?></p>
                            <button>quitar</button>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "No hay elementos en el carrito";
            }

            ?>
            </div>
            <?php
                if(isset($_SESSION['carrito'])){
            ?>
                    <div class="cart2">
                        <div style="background-color: white;">
                            <h3>pagar</h3>
                            <form action="./src/controllers/carritoPay.php">
                                <button type="submit">Pagar</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
            ?>
    </div>

</body>

</html>