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
            <h1>Mercasena</h1>
            <p>Bienvenido, explora nuestros productos</p>

        </div>
    </div>
    <div class="container">
        <?php
        include './src/controllers/connection.php';

        $list = mysqli_query($con, "select * from productos") or die("No se pudo concretar");
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