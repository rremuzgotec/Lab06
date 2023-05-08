<?php
include('../conexion.php');

if(isset($_GET['matricula_id'])) {
    $matricula_id = $_GET['matricula_id'];

    $conexion = conectar();

    $sql = "DELETE FROM matricula WHERE matricula_id = $matricula_id";

    $resultado = mysqli_query($conexion, $sql);

    desconectar($conexion);

    header('Location: matriculas.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar matricula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18b9c6a8fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Eliminar matricula</h1>
        <p>¿Esta seguro de que desea eliminar esta matricula?</p>
        <div>
            <a href="matriculas.php" class="btn btn-default">Cancelar</a>
            <a href="eliminar_matricula.php?matricula_id=<?php echo $matricula_id; ?>" class="btn btn-danger">Eliminar</a>
        </div>
    </div>
</body>
</html> 