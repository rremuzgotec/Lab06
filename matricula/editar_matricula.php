<?php
include('../conexion.php');

$conexion = conectar();

if(isset($_GET['matricula_id'])){
    $matricula_id = $_GET['matricula_id'];

    $sql = 'SELECT matricula.matricula_id, alumno.nombres, curso.nombre_curso, matricula.fecha_matricula
    FROM matricula
    INNER JOIN alumno ON matricula.alumno_id = alumno.alumno_id
    INNER JOIN curso ON matricula.curso_id = curso.curso_id
    WHERE matricula.matricula_id = ' . $matricula_id;

    $resultado = mysqli_query($conexion, $sql);

    $matricula = mysqli_fetch_array($resultado);
    $nombres = $matricula['nombres'];
    $nombre_curso = $matricula['nombre_curso'];
    $fecha_matricula = $matricula['fecha_matricula'];
}

if(isset($_POST['nombres'])){
    $nombres = $_POST['nombres'];
    $nombre_curso = $_POST['nombre_curso'];
    $fecha_matricula = $_POST['fecha_matricula'];

    $sql = "UPDATE matricula SET alumno_id = (SELECT alumno_id FROM alumno WHERE nombres = '$nombres'), curso_id = (SELECT curso_id FROM curso WHERE nombre_curso = '$nombre_curso'), fecha_matricula = '$fecha_matricula' WHERE matricula_id = $matricula_id";

    $resultado = mysqli_query($conexion, $sql);

    header('Location: matriculas.php');
    exit();
}

desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar matricula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Editar matricula</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombres">Alumno:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="form-group">
                <label for="nombre_curso">Curso:</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="<?php echo $nombre_curso; ?>">
            </div>
            <div class="form-group">
                <label for="fecha_matricula">Fecha de matricula:</label>
                <input type="date" class="form-control" id="fecha_matricula" name="fecha_matricula" value="<?php echo $fecha_matricula; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>