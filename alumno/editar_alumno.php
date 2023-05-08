<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $alumno_id = $_POST['alumno_id'];
    $nombres = $_POST['nombres'];
    $ape_paterno = $_POST['ape_paterno'];
    $ape_materno = $_POST['ape_materno'];

    $conexion = conectar();

    $sql = "UPDATE alumno SET nombres = '$nombres', ape_paterno = '$ape_paterno', ape_materno = '$ape_materno' WHERE alumno_id = $alumno_id";

    if (mysqli_query($conexion, $sql)) {  
        desconectar($conexion); 
        header('Location: alumnos.php');
        exit;
    } else {
        $error = 'Error al actualizar al alumno: ' . mysqli_error($conexion);
    }
} else {
    
    $alumno_id = $_GET['alumno_id'];
    
    $conexion = conectar();

    $sql = "SELECT nombres, ape_paterno, ape_materno FROM alumno WHERE alumno_id = $alumno_id";
    
    $resultado = mysqli_query($conexion, $sql);
    
    $alumno = mysqli_fetch_array($resultado);
    
    desconectar($conexion);
    
    $nombres = $alumno['nombres'];
    $ape_paterno = $alumno['ape_paterno'];
    $ape_materno = $alumno['ape_materno'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <h1>Editar Alumno</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombres">Nombre del alumno:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="form-group">
                <label for="ape_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ape_paterno" name="ape_paterno" value="<?php echo $ape_paterno; ?>">
            </div>
            <div class="form-group">
                <label for="ape_materno">Apellido Materno:</label>
                <input type="text" class="form-control" id="ape_materno" name="ape_materno" value="<?php echo $ape_materno; ?>">
            </div>
            <input type="hidden" name="alumno_id" value="<?php echo $alumno_id; ?>">
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</body>
</html>