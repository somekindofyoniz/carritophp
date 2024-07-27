
# Carrito de Compras PHP

Ejemplo de listado de productos en formato de tarjeta, vista de producto, carrito de compra, confirmación de compra y descuento de inventario.


## Instalación

Se debe empezar copiando el contenido del repositorio.
Este proyecto utiliza una base de datos MariaDB, el codigo está establecido como una base de datos de nombre "carrito", solo contiene una tabla que tiene la siguiente estructura:
```mysql
  CREATE TABLE `productos` (
    `id` int(11) NOT NULL,
    `nombre` varchar(128) NOT NULL,
    `descripcion` varchar(512) NOT NULL,
    `marca` varchar(32) NOT NULL DEFAULT 'Genérico',
    `precio` int(16) NOT NULL,
    `stock` int(16) NOT NULL,
    `categoria` varchar(64) NOT NULL DEFAULT 'Ninguna',
    `imagen` longblob DEFAULT NULL
  )
```

una vez hecho esto, en la carpeta raíz se deberá crear un archivo .env que contendrá el siguiente contenido.

```env
  DBHOST="host de la base de datos"
  DBUSER="usuario de la base de datos"
  DBPASS="contraseña de la base de datos"
  DBNAME="nombre de la base de datos"
```
    