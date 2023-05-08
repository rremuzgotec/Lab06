<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $curso_id = $_POST['curso_id'];
    $nombre_curso = $_POST['nombre_curso'];
    $creditos = $_POST['creditos'];

    
    $conexion = conectar();

    
    $sql = "UPDATE curso SET nombre_curso = '$nombre_curso', creditos = '$creditos' WHERE curso_id = $curso_id";

    
    if (mysqli_query($conexion, $sql)) {
        
        desconectar($conexion);

        
        header('Location: cursos.php');
        exit;
    } else {
        $error = 'Error al actualizar el curso: ' . mysqli_error($conexion);
    }
} else {
    
    $curso_id = $_GET['curso_id'];

    
    $conexion = conectar();

    
    $sql = "SELECT nombre_curso, creditos FROM curso WHERE curso_id = $curso_id";

    
    $resultado = mysqli_query($conexion, $sql);

    
    $curso = mysqli_fetch_array($resultado);

    
    desconectar($conexion);

    
    $nombre_curso = $curso['nombre_curso'];
    $creditos = $curso['creditos'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Editar curso</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombre_curso">Nombre del curso:</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="<?php echo $nombre_curso; ?>">
            </div>
            <div class="form-group">
                <label for="creditos">Creditos:</label>
                <input type="number" class="form-control" id="creditos" name="creditos" value="<?php echo $creditos; ?>">
            </div>
            <input type="hidden" name="curso_id" value="<?php echo $curso_id; ?>">
            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
        </form>
    </div>
</body>
</html>