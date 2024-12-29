<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cuadro con los Clientes con más de dos compras</title>
</head>

<body>
    <h2>Clientes con más de dos compras registradas</h2>
    <?php
    include 'conexion.php';
    // Realiza la consulta SQL con MySQLi
    $sql = "
        SELECT c.nombre, COUNT(co.id_compra) AS num_compras
        FROM CLIENTE c
        JOIN COMPRA co ON c.id_cliente = co.id_cliente
        GROUP BY c.id_cliente
        HAVING COUNT(co.id_compra) > 2
        ";

    // ejecutando la consulta
    $result = $conexion->query($sql);

    // verificando si la consulta devolvio algun resultado, los devuelve en tipo de rows si es mayor a 0 es que devolvio algo 
    if ($result->num_rows > 0) {
        echo "<table border='1'>
          <tr>
              <th>Nombre del Cliente</th>
              <th>Número de Compras</th>
          </tr>";
        // Mostrar los resultados
        while ($cliente = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($cliente['nombre']) . "</td>
                <td>" . $cliente['num_compras'] . "</td>
              </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay clientes con más de dos compras registradas.</p>";
    }
    ?>
</body>

</html>
