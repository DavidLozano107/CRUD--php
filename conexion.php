<?php
try {
    $conexion = new PDO("mysql:host=localhost; dbname=pruebas", "david", "1234");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
} catch (Exception $e) {
    die("Error : " . $e->getMessage() . " <br> En la linea: " . $e->getLine());
}
