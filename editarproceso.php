<?php
//  print_r($_POST);
    if (!isset($_POST['oculto'])) {
        exit();
    } else {

    }

    include 'conexion.php';
    
    $matricula2 = $_POST['txt2Matricula'];
    $nombre2 = $_POST['txt2Nombre'];
    $grupo2 = $_POST['txt2Grupo'];
    $correo2 = $_POST['txt2Correo'];
    $comentario2 = $_POST['txt2Comentario'];
    $contraseña2 = $_POST['txt2Contraseña'];

    $sentencia = $bd->prepare("UPDATE alumno SET id_matricula = ?, nombre = ?, grupo = ?, 
    correo_electronico = ?, comentario = ?, contraseña = ? WHERE id_matricula = ?;");

    $resultado = $sentencia->execute([$matricula2,$nombre2,$grupo2,$correo2,$comentario2,$contraseña2,$matricula2]);

    if ($resultado === TRUE) {
        header('Location: form.php');
    } else {
        echo "Algo salio mal, intentalo de nuevo...";
    }
?>