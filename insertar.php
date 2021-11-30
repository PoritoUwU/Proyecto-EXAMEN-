<?php

    if (!isset($_POST['oculto'])) {
        exit();
    }

    include 'conexion.php';
    
    $matricula = $_POST['txtMatricula'];
    $nombre = $_POST['txtNombre'];
    $grupo = $_POST['txtGrupo'];
    $correo = $_POST['txtCorreo'];
    $comentario = $_POST['txtComentario'];
    $contraseña = $_POST['txtContraseña'];

    $sentencia = $bd->prepare("INSERT INTO alumno VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$matricula,$nombre,$grupo,$correo,$comentario,$contraseña]);

    if ($resultado === TRUE) {
        // echo "Insertado Existosamente";
        header('Location: form.php');
    }else {
        echo "Algo salio mal, intentalo de nuevo...";
    }

?>