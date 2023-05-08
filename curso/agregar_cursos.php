<?php

include('../conexion.php');

$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];

$conexion = conectar();

$sql = "INSERT INTO curso (nombre_curso, creditos) VALUES ('$nombre_curso', '$creditos')";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Nuevo Curso</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar el curso';
        }
        else{
            echo 'Curso registrado';
        }
    ?>
    </h3>
    <a href="cursos.php" class="btn btn-warning">Regresar</a>
</body>
</html>