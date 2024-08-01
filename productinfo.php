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
        <p class="hsub">Información de producto</p>

        </div>
    </div>
    
    <div class="container">
        <?php
        include './src/controllers/connection.php';
        $list = mysqli_query($con, "select * from productos where id='$_GET[producto]'") or die("No se pudo concretar");
        while ($r = mysqli_fetch_array($list)) {
        ?>
            <div class="infocard">
                <div class="icol1">
                    <a href="index.php">Volver</a>
                    <img class="infoimg" src="data:image/png;base64,<?php echo base64_encode($r['imagen']); ?>" alt="" />
                </div>
                <div class="icol2">
                    <h4 class="textcat"><?php echo $r['categoria']; ?></h4>
                    <h3 class="textprod"><?php echo $r['nombre']; ?></h3>
                    <p class="itextprice"><?php echo '$'.$r['precio']; ?></p>
                    <p class="textinf"><?php echo $r['descripcion']; ?></p>
                    <br>
                    <p class="textsubinf">Marca</p>
                    <p class="textinf"><?php echo $r['marca']; ?></p>
                    <br>
                    <p class="textsubinf">Existencias disponibles</p>
                    <p class="textinf"><?php echo $r['stock']; ?></p>
                </div>
                <div class="icol3">
                    <form method="post"  action="./src/controllers/carritoAdd.php?producto=<?php echo $_GET['producto']; ?>">
                        <p class="textsubinf">Cantidad a comprar:</p>
                        <input type="number" name="cantidad">
                        <input type="hidden" name="producto" value='<?php echo $_GET['producto']?>'>
                        <br>
                        <button type="submit">Añadir</button>
                    </form>
                </div>
            </div>

        <?php
        }

        ?>

    </div>

</body>

</html>