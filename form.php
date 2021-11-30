<?php
    // print_r($alumnos);

    include 'conexion.php';

    $sentencia = $bd->query("SELECT * FROM alumno;");
    $alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/formstyle.css">
    <title>Registro</title>
</head>
<body>
    
<div class="container">
  <div class="row">
    
    <!-- Formulario -->
  
    <div class="columnaForm col-md-4 shadow-lg p-5 mt-4">
    <h1 class="titulo1">Formulario</h1>

    <form class="needs-validation" novalidate method="POST" action="insertar.php">
      
      <div class="mb-2">
        <label class="form-label fs-4">Matricula</label>
        <input type="text" name="txtMatricula" class="form-control" placeholder="Matricula..." required>
        <div class="valid-feedback">¡Campo válido!</div>
        <div class="invalid-feedback">Debe completar los datos.</div>
      </div>
      <div class="mb-2">
        <label class="form-label fs-4">Nombre</label>
        <input type="text" name="txtNombre" class="form-control" placeholder="Nombre..." required>
        <div class="valid-feedback">¡Campo válido!</div>
        <div class="invalid-feedback">Debe completar los datos.</div>
      </div>
      <div class="mb-2">
        <label class="form-label fs-4">Grupo</label>
        <input type="text" name="txtGrupo" class="form-control" placeholder="Grupo..." required>
        <div class="valid-feedback">¡Campo válido!</div>
        <div class="invalid-feedback">Debe completar los datos.</div>
      </div>
      <div class="mb-2">
        <label class="form-label fs-4">Correo Electronico</label>
        <input type="email" name="txtCorreo" class="form-control" placeholder="Correo Electronico..." required>
        <div class="valid-feedback">¡Campo válido!</div>
        <div class="invalid-feedback">Debe completar los datos.</div>
      </div>
      <div class="mb-2">
        <label class="form-label fs-4">Comentario (Opcional)</label>
        <input type="text" name="txtComentario" class="form-control" placeholder="Pon un comentario o((>ω< ))o...">
      </div>
      <div class="mb-2">
        <label  class="form-label fs-4">Contraseña</label>
        <input type="password" name="txtContraseña" class="form-control" placeholder="Contraseña..." required>
        <div class="valid-feedback">¡Campo válido!</div>
        <div class="invalid-feedback">Debe completar los datos.</div>
        <div class="form-text">Nosotros nunca compartiremos tu contraseña con nadie.</div>
        <input type="hidden" name="oculto" value="1">
      </div>
      <div class="d-grid gap-2">
      <button type="submit" class="btn btn-outline-success btn-block">Registrarse</button>
      </div>
    </form>
  </div>

                        <!-- Buscador php Intento Fallido

                        <div class="XD col-md-8 offset-md-4">
                          <h1 class="titulo2">Buscar</h1>
                            <div class="row justify-content-start">
                            <div class="col-auto offset-md-3">
                              <form action="form.php" method="POST">
                                <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
                            </div>
                            <div class="col-auto">
                              <span class="form-text">
                                <input type="submit" class="btn btn-outline-secondary btn-block">
                              </span>
                              </form>
                            </div>
                            </div>
                        </div> -->

      <!-- Tabla de contenido -->
      <div class="TablaContenido col-md-8 shadow-lg p-3 mt-4">
      <h1>Tabla de Contenido</h1>
      <table class="table table-hover text-center align-middle table-borderless">
        <thead>
          <tr>
            <th class="fs-5" scope="col">Matricula</th>
            <th class="fs-5" scope="col">Nombre</th>
            <th class="fs-5" scope="col">Grupo</th>
            <th class="fs-5" scope="col">Correo Electronico</th>
            <th class="fs-5" scope="col">Comentario</th>
            <th class="fs-5" scope="col">Contraseña</th>
          </tr>
        </thead>

      <?php
        foreach ($alumnos as $dato) {
      ?>

        <tbody>
          <tr>
            <th><?php echo $dato->id_matricula; ?></th>
            <td><?php echo $dato->nombre; ?></td>
            <td><?php echo $dato->grupo; ?></td>
            <td><?php echo $dato->correo_electronico; ?></td>
            <td><?php echo $dato->comentario; ?></td>
            <td><?php echo $dato->contraseña; ?></td>
            <td><a href="editar.php?id=<?php echo $dato->id_matricula;?>" type="button" 
            class="btn  btn-outline-warning">Editar</a></td>
            <td><a href="eliminar.php?id=<?php echo $dato->id_matricula;?>" type="button" class="btn btn-outline-danger">Eliminar</a></td>
          </tr>
        </tbody>

      <?php
      }
      ?>

      </table>
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