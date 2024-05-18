# Creacion y consumo de API con PHP
- Hola, aca crearemos una ***Base de datos*** con ***MySql***, solo tendra una tabla llmada productos.

## Carpeta DB
- Aca almacenamos nuestra ***Base de datos***

## Carpeta data
- Aca tendremos nuestra conexion a la ***Base de datos***, usamos el metodo `try {} catch }` y `PDO`

## productos.php
- aca encontraremos `include 'data/conexion.php';`, nos permite incluir la conexion a la ***BD***.


### Headers
- Nos permiten hacer peticion HTTP y obtener respuesta dependiendo del metodo que usemos `GET`, `POST`, `PUT`, `DElETE`.

### Validamos el metodo usado
- Esta porcion de codigo nos permite validar el metodo usado, en este caso `GET`.

```PHP
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

}
```


- `ISSET()` nos permite validar si la variable `$_GET['id'])` esta definida o no es ***Null***

```PHP
if (isset($_GET['id'])) {

    }
```