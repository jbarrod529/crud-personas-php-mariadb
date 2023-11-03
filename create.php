<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $deporte_favorito = $_POST['deporte_favorito'];

    try {
        $sql = "INSERT INTO jugadores (nombre, apellido1, apellido2, edad, telefono, email, deporte_favorito) VALUES (:nombre, :apellido1, :apellido2, :edad, :telefono, :email, :deporte_favorito)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'edad' => $edad, 'email' =>  $email, 'telefono' => $telefono, 'deporte_favorito' => $deporte_favorito]);

        $message = 'Jugador añadido con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir el Jugador: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Jugador</title>
</head>
<body>
<h2>Añadir un nuevo Jugador</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="apellido1">Primer Apellido:</label>
    <input type="text" name="apellido1" id="apellido1" required>
    <br>
    <label for="apellido2">Segundo Apellido:</label>
    <input type="text" name="apellido2" id="apellido2" >
    <br>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required>
    <br>
    <label for="telefono">Telefono:</label>
    <input type="number" name="telefono" id="telefono" >
    <br>
    <label for="email">Email:</label>
    <input type="text" name="email" id="email">
    <br>
    <label for="deporte_favorito">Deporte Favorito:</label>
    <input type="text" name="deporte_favorito" id="deporte_favorito" >
    <br>
    <input type="submit" value="Añadir Jugador">
</form>

</body>
</html>