<?php

try {
    $conexion = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");

    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $ape = $_POST["ape"];
    $dir = $_POST["dir"];


    $sql = "UPDATE datosusuarios SET nombre=?, apellido=?, direccion=? WHERE id=?";

    $conexion->prepare($sql)->execute([$nom, $ape, $dir, $id]);


    header("Location:index.php");
} catch (Exception $e) {
    die("Error : " . $e->getMessage() . " <br> En la linea: " . $e->getLine());
}
