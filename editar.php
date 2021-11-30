<?php
    // print_r($_GET);
    if (!isset($_GET['id'])) {
        exit();
    } else {
        
        include 'conexion.php';

        $id = $_GET['id'];
        $sentencia = $bd->prepare("SELECT * FROM alumno WHERE id_matricula = ?;");
        $sentencia->execute([$id]);
        $persona = $sentencia->fetch(PDO::FETCH_OBJ);
        // print_r($persona);

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/editarstyle.css">
    <title>Editar Alumno</title>
</head>
<body>

  <div class="container">
  <div class="row align-items-center"> 
  <div class="tableuwu col-md-10 offset-md-1 shadow-lg p-5 mt-4 ">
    <form class="columnaTableEdition needs-validation form-control-lg" novalidate method="POST" action="editarproceso.php">
    <table class="table table-hover text-center align-middle table-borderless">
      <thead>
        <tr>
            <th class="fs-4" scope="col">Matricula</th>
            <th class="fs-4" scope="col">Nombre</th>
            <th class="fs-4" scope="col">Grupo</th>
            <th class="fs-4" scope="col">Correo Electronico</th>
            <th class="fs-4" scope="col">Comentario</th>
            <th class="fs-4" scope="col">Contraseña</th>
        </tr>
      </thead>
      <tbody>

        <!-- espacio entre la tabla formulario -->

        <!-- <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr> -->

          <td><input type="text" name="txt2Matricula" value="<?php echo $persona->id_matricula; ?>" 
          class="form-control" placeholder="Matricula..." required></td>
            <div class="valid-feedback">¡Campo válido!</div>
            <div class="invalid-feedback">Debe completar los datos.</div>
          
          <td><input type="text" name="txt2Nombre" value="<?php echo $persona->nombre; ?>" 
          class="form-control" placeholder="Nombre..." required></td>
            <div class="valid-feedback">¡Campo válido!</div>
            <div class="invalid-feedback">Debe completar los datos.</div>
          
          <td><input type="text" name="txt2Grupo" value="<?php echo $persona->grupo; ?>" 
          class="form-control" placeholder="Grupo..." required></td>
            <div class="valid-feedback">¡Campo válido!</div>
            <div class="invalid-feedback">Debe completar los datos.</div>

          <td><input type="text" name="txt2Correo" value="<?php echo $persona->correo_electronico; ?>" 
          class="form-control" placeholder="Correo..." required></td>
            <div class="valid-feedback">¡Campo válido!</div>
            <div class="invalid-feedback">Debe completar los datos.</div>

          <td><input type="text" name="txt2Comentario" value="<?php echo $persona->comentario; ?>" 
          class="form-control" placeholder="o((>ω< ))o..."></td>

          <td><input type="text" name="txt2Contraseña" value="<?php echo $persona->contraseña; ?>" 
          class="form-control" placeholder="Contraseña..." required></td>
            <div class="valid-feedback">¡Campo válido!</div>
            <div class="invalid-feedback">Debe completar los datos.</div>
      
        </tr>

        <!-- espacio entre la tabla-formulario -->

        <!-- <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr> -->

        <tr>
            <input type="hidden" name="oculto">
            <td colspan="3"><a class="btn btn-outline-success btn-block" href="form.php">Volver</a></td>
            <td colspan="3"><button class="btn btn-outline-warning btn-block">Actualizar</button></td>
        </tr>
      </tbody>
    </table>
    </form>
    </div>
  </div>
</div>

<!-- Script para la validación del formulario -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>