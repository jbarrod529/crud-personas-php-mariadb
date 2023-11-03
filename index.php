

<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM jugadores');
$jugadores = $stmt->fetchAll();
?>

<h2>Listado de Jugadores</h2>

<!-- Botón para crear un nuevo jabón -->
<a href="create.php">Crear nuevo Jugador</a>
<br><br>


<table> 

    <tr>
        <th style="border: 1px solid";>nombre</th>
        <th style="border: 1px solid";>apellido1</th>
        <th style="border: 1px solid">apellido2</th>
        <th style="border: 1px solid">email</th>
        <th style="border: 1px solid">edad</th>
        <th style="border: 1px solid">telefono</th>
        <th style="border: 1px solid">deporte_favorito</th>
        <th colspan="2 "style="border: 1px solid"> Accion</th>
        


    </tr>

    
    <?php foreach ($jugadores as $jugador): ?>

    <tr>
    
        <td style="border: 1px solid";> <?php echo $jugador['nombre']; ?> </td>
        <td style="border: 1px solid";> <?php echo $jugador['apellido1']; ?> </td>
        <td style="border: 1px solid";> <?php echo $jugador['apellido2']; ?> </td>
        <td style="border: 1px solid";> <?php echo $jugador['email'];?> </td>
        <td style="border: 1px solid";> <?php echo $jugador['edad'];?> </td>
        <td style="border: 1px solid";> <?php echo $jugador['telefono'];?> </td>
        <td style="border: 1px solid";> <?php echo $jugador['deporte_favorito'];?> </td>
        <td style="border: 1px solid";> <a href="edit.php?id=<?php echo $jugador['id']; ?>">Editar</a></td>
        <td style="border: 1px solid";> <a href="delete.php?id=<?php echo $jugador['id']; ?>">Eliminar</a> </td>    
         
       
    
<?php endforeach; ?>

</tr>

    <table> 

