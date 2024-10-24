<?php
$host = ''; // O 'localhost' si prefieres
$port = '33065'; // Cambia a '3306' si este es el puerto correcto
$usuario = 'root';
$password = '';
$dbname = 'test';

$conexion = new mysqli($host, $usuario, $password, $dbname, $port);

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
} else {
    echo "Conexión exitosa a la base de datos '$dbname'";
}

// Cerrar la conexión
$conexion->close();
