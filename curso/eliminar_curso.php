<?php
include('../conexion.php');

if(isset($_GET['curso_id'])) {
    
    $curso_id = $_GET['curso_id'];

    
    $conexion = conectar();

    
    $sql = "DELETE FROM curso WHERE curso_id = $curso_id";

    
    if(mysqli_query($conexion, $sql)) {
        
        header("Location: cursos.php");
    } else {
        
        $error = "Error al eliminar el curso: " . mysqli_error($conexion);
    }

    
    desconectar($conexion);
} else {
    
    $error = "No se ha especificado el curso a eliminar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Eliminar curso</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } else { ?>
            <div class="alert alert-success">El curso ha sido eliminado correctamente</div>
        <?php } ?>
        <a href="cursos.php" class="btn btn-primary">Volver a cursos</a>
    </div>
</body>
</html>