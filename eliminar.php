<?php
    // print_r($_GET);
    if (!isset($_GET['id'])) {
        exit();
    } 

    include 'conexion.php';

    $codigo = $_GET['id'];
    $sentencia = $bd->prepare("DELETE FROM alumno WHERE id_matricula = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: form.php');
    } else {
        echo "Algo salio mal, intentalo de nuevo...";
    }
?>