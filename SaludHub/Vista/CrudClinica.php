<?php
require_once('../Datos/DAOClinica.php');
$clinicaDAO = new DAOClinica();
$clinicas = $clinicaDAO->obtenerClinicas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SALUDHUB IA</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/crud.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-pink">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/saludHUb3.svg" height="40px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="inicioAdmin.html">Home</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <main>
        <div class="container mt-5">
            <h2>CRUD Clinicas</h2>
            <button class="btn btn-success btn-agregar">Agregar</button>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Cédula</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($clinicas as $clinica): ?>
                            <tr>
                                <td><?= $clinica->idclinica ?></td>
                                <td><?= $clinica->cedula ?></td>
                                <td><?= $clinica->nombre ?></td>
                                <td>
                                  <button class="btn btn-primary btn-sm">Editar</button>
                                  <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
</main>
      <script src="js/conexiongpt.js"></script>

</body>
</html>