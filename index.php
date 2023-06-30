<?php
require_once "conexion.php";

// Consulta para obtener las regiones desde la base de datos
$sql_regions = "SELECT * FROM regiones";
$result_regions = $conn->query($sql_regions);

$regions = '<option value="">Seleccione una región</option>';

if ($result_regions->num_rows > 0) {
  while ($row_regions = $result_regions->fetch_assoc()) {
    $regions .= '<option value="' . $row_regions["id"] . '">' . $row_regions["region"] . '</option>';
  }
}

// Consulta para obtener los candidatos desde la base de datos
$sql_candidate = "SELECT * FROM candidatos";
$result_candidate = $conn->query($sql_candidate);

$candidates = '<option value="">Seleccione un candidato</option>';

if ($result_candidate->num_rows > 0) {
  while ($row_candidate = $result_candidate->fetch_assoc()) {
    $candidates .= '<option value="' . $row_candidate["id"] . '">' . $row_candidate["nombre"] . '</option>';
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sistema de votación</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="script.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Formulario de votación</h2>

  <form id="form">
    <label for="name" class="align-label">Nombre y Apellido:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="alias" class="align-label">Alias:</label>
    <input type="text" id="alias" name="alias"><br>

    <label for="rut" class="align-label">RUT:</label>
    <input type="text" id="rut" name="rut"><br>

    <label for="email" class="align-label">Email:</label>
    <input type="email" id="email" name="email"><br>
    
    <label for="region" class="align-label">Región:</label>
    <select name="region" id="region" required>
      <?php echo $regions; ?>
    </select><br>

    <label for="district" class="align-label">Comuna:</label>
    <select id="district" name="district" required>
      <option value="">Seleccione una comuna</option>
      <!-- Las opciones se cargarán dinámicamente según la región seleccionada -->
    </select><br>

    <label for="candidate" class="align-label">Candidato:</label>
    <select id="candidate" name="candidate">
      <?php echo $candidates; ?>
    </select><br>
    
    <label class="align-label">Cómo se enteró de nosotros:</label>
    <input type="checkbox" id="web" name="web" value="true">
    <label for="web">Web</label>
    
    <input type="checkbox" id="tv" name="tv" value="true">
    <label for="tv">TV</label>
    
    <input type="checkbox" id="social-networks" name="social-networks" value="true">
    <label for="social-networks">Redes sociales</label>

    <input type="checkbox" id="friend" name="friend" value="true">
    <label for="friend">Amigo</label><br>

    <input type="submit" value="Votar">
  </form>

  <div id="mensaje"></div>

</body>
</html>

