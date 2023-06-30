<?php
require_once "conexion.php";

// Obtener los datos del formulario
$district = intval($_POST["district"]);
$candidate = intval($_POST["candidate"]);
$name = $_POST["name"];
$alias = $_POST["alias"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$web = isset($_POST["web"]) ? 1 : 0;
$tv = isset($_POST["tv"]) ? 1 : 0;
$social_networks = isset($_POST["social-networks"]) ? 1 : 0;
$friend = isset($_POST["friend"]) ? 1 : 0;

// Comprobar si ya existe un registro con el mismo RUT
$checkSql = "SELECT COUNT(*) as count FROM votaciones WHERE rut = '$rut'";
$result = $conn->query($checkSql);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count > 0) {
  echo "Ya existe un registro con el mismo RUT";
} else {
  // Insertar los datos en la base de datos
  $sql = "INSERT INTO votaciones (id_comuna, id_candidato, nombre, alias, rut, email, web, tv, redes_sociales, amigo)
      VALUES ($district, $candidate, '$name', '$alias', '$rut', '$email', $web, $tv, $social_networks, $friend)";

  if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
  } else {
    echo "Error al guardar los datos: " . $conn->error;
  }
}

$conn->close();
?>

