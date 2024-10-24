<?php 
include 'db.php'; // Incluye la conexión y control de acceso

$query = "SELECT * FROM productos";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-image: url('img/fondo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            color: #2c3e50;
        }
        .btn-agregar, .btn-logout {
            padding: 10px 15px;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-agregar:hover, .btn-logout:hover {
            background-color: #2980b9;
        }
        .tabla-inventario {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .tabla-inventario th, .tabla-inventario td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .tabla-inventario th {
            background-color: #2c3e50;
            color: #fff;
        }
        .tabla-inventario tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .tabla-inventario tr:hover {
            background-color: #d1ecf1;
        }
        .btn-editar, .btn-eliminar {
            padding: 5px 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
            transition: background-color 0.3s;
        }
        .btn-editar {
            background-color: #f39c12;
        }
        .btn-editar:hover {
            background-color: #e67e22;
        }
        .btn-eliminar {
            background-color: #e74c3c;
        }
        .btn-eliminar:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Sistema de Inventario</h1>
            <div>
                <a href="agregar.php" class="btn-agregar">Agregar producto</a>
                <a href="logout.php" class="btn-logout">Cerrar sesión</a>
            </div>
        </header>

        <table class="tabla-inventario">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($producto = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $producto['id']; ?>" class="btn-editar">Editar</a>
                        <a href="eliminar.php?id=<?php echo $producto['id']; ?>" class="btn-eliminar">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>