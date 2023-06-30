<?php
require_once "conexion.php";

$region = $_POST['region'];

// Consulta para obtener las comunas de la región seleccionada
$sql = "SELECT c.id, c.comuna FROM regiones a, provincias b, comunas c WHERE a.id = '$region' 
    AND b.region_id = a.id
    AND b.id = c.provincia_id
    ORDER BY c.comuna";

$result = $conn->query($sql);

$options = '<option value="">Seleccione una comuna</option>';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row["id"] . '">' . $row["comuna"] . '</option>';
  }
}

echo $options;

$conn->close();
?>
