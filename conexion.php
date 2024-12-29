<!-- parametros para establecer conexion con base de datos -->
<?php
$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "pinino1994";

// Establecemos la conexion 
$conexion = mysqli_connect($servername, $username, $password, $database);

//Verificando la conexion   
if (!$conexion) {
    die("La Conexion ha fallado, codigo de error : " . mysqli_connect_error());
}
echo "Conexion Establecida con exito.";

//mysqli_close($conexion);
