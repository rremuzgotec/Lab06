<?php

include('../conexion.php');

$nombres = $_POST["nombres"];
$nombre_curso = $_POST["nombre_curso"];
$fecha_matricula = $_POST["fecha_matricula"];

$conexion = conectar();

$sql = "SELECT alumno_id FROM alumno WHERE nombres = '$nombres'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $alumno_id = $row["alumno_id"];
} else {
    echo "No se encontro al alumno.";
    mysqli_close($conexion);
    exit();
}

$sql = "SELECT curso_id FROM curso WHERE nombre_curso = '$nombre_curso'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $curso_id = $row["curso_id"];
} else {
    echo "No se encontro el curso.";
    mysqli_close($conexion);
    exit();
}

$sql = "INSERT INTO matricula (alumno_id, curso_id, fecha_matricula)
        VALUES ('$alumno_id', '$curso_id', '$fecha_matricula')";

if (mysqli_query($conexion, $sql)) {
    echo "Matricula agregada correctamente";
} else {
    echo "Error al agregar la matricula: " . mysqli_error($conexion);
}

desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Matricula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Nueva Matricula</h1>
    <h3>
    <?php
        if (mysqli_affected_rows($conexion) > 0){
            echo 'Matricula registrada';
        }
        else{
            echo 'No se ha podido registrar la matricula: ' . mysqli_error($conexion);
        }
    ?>
    </h3>
    <a href="matriculas.php">Regresar</a>
</body>
</html>