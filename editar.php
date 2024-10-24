<?php
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM productos WHERE id = $id";
$resultado = $conexion->query($query);
$producto = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $query = "UPDATE productos SET nombre='$nombre', cantidad='$cantidad', precio='$precio' WHERE id=$id";

    if ($conexion->query($query) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $query . "<br>" . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body style="background-image: url('img/fondo.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="editar.php?id=<?php echo $producto['id']; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
            
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
            
            <input type="submit" value="Guardar">
        </form>
        <a href="index.php" class="back-link">Volver al listado de productos</a>
    </div>
</body>
</html>
