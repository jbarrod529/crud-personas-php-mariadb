<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $deporte_favorito = $_POST['deporte_favorito'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE jugadores SET nombre = ?, email = ? WHERE id = ?");
    $stmt->execute([$nombre, $apellido1, $apellido2, $email, $edad, $telefono, $deporte_favorito, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM jugadores WHERE id = $id");
$jugador = $stmt->fetch();

?>

<h2>Editar Jugador</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $jugador['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $jugador['nombre']; ?>"><br>
    Primer Apellido: <input type="text" name="apellido1" value="<?php echo $jugador['apellido1']; ?>"><br>
    Segundo Apellido: <input type="text" name="apellido2" value="<?php echo $jugador['apellido2']; ?>"><br>
    Edad: <input type="number" name="edad" value="<?php echo $jugador['edad']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $jugador['email']; ?>"><br>
    Telefono: <input type="number" name="telefono" value="<?php echo $jugador['telefono']; ?>"><br>
    Deporte Favorito: <input type="text" name="deporte_favorito" value="<?php echo $jugador['deporte_favorito']; ?>"><br>


    <input type="submit" value="Guardar Cambios">
    <input type="reset" value="Resetear Cambios">
</form>