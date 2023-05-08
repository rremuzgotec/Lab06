<?php
include('../conexion.php');

// Abrimos la conexion a la BD MySql
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT matricula.matricula_id, alumno.nombres, curso.nombre_curso, matricula.fecha_matricula
FROM matricula
INNER JOIN alumno ON matricula.alumno_id = alumno.alumno_id
INNER JOIN curso ON matricula.curso_id = curso.curso_id';

// Ejecutamos el query en la conexion abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexion
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18b9c6a8fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Matriculas</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Nueva matricula</a>
            <table class="table table-info mt-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Fecha de matricula</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($matricula = mysqli_fetch_array($resultado)){
                            $matricula_id = $matricula['matricula_id'];
                            $nombres = $matricula['nombres'];
                            $nombre_curso = $matricula['nombre_curso'];
                            $fecha_matricula = $matricula['fecha_matricula'];

                            echo '<tr>';
                            echo '<td>' . $matricula_id . '</td>';
                            echo '<td>' . $nombres . '</td>';
                            echo '<td>' . $nombre_curso . '</td>';
                            echo '<td>' . $fecha_matricula . '</td>';
                            echo '<td><a href="editar_matricula.php?matricula_id=' . $matricula_id . '" <i class="fa-solid fa-pen-to-square btn btn-primary"></i></a></td>';
                            echo '<td><a href="eliminar_matricula.php?matricula_id=' . $matricula_id . '" <i class="fa-solid fa-trash btn btn-danger"></i></a></td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>