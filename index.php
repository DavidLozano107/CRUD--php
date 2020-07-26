<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
    <?php
    include("./conexion.php");
    // $consulta = $conexion->query("SELECT * FROM datos_usuarios");
    // $registro = $consulta->fetchAll(PDO::FETCH_OBJ);

    //Paginacion------------------------
    $nudeconsulta = 3;

    if (isset($_GET["pagina"])) {
        if ($_GET["pagina"] == 1) {
            header("Location: index.php");
        } else {
            $pagina = $_GET["pagina"];
        }
    } else {
        $pagina = 1;
    }



    $empezarDesde = ($pagina - 1) * $nudeconsulta;
    $sql = "SELECT  * FROM datosusuarios ";
    $resultado = $conexion->prepare($sql);
    $resultado->execute(array());
    $num_registro = $resultado->rowCount();

    $totalPaginas = ceil($num_registro / $nudeconsulta);


    //-------------------------------------------------------
    $registro = $conexion->query("SELECT * FROM datosusuarios LIMIT $empezarDesde, $nudeconsulta")->fetchAll(PDO::FETCH_OBJ);


    if (isset($_POST["cr"])) {


        $Nom = $_POST["Nom"];
        $Ape = $_POST["Ape"];
        $Dir = $_POST["Dir"];


        $sql = "INSERT INTO datosusuarios(nombre,apellido, direccion) VALUES (:nom, :ape, :dir) ";

        $conexion->prepare($sql)->execute(array(":nom" => $Nom, ":ape" => $Ape, ":dir" => $Dir));
        header("location:index.php");
    }

    ?>



    <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Id</td>
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Apellido</td>
                <td class="primera_fila">Dirección</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>

            <?php
            foreach ($registro as $personas) : ?>
                <tr>
                    <td> <?php echo $personas->id ?> </td>
                    <td> <?php echo $personas->nombre ?> </td>
                    <td> <?php echo $personas->apellido ?> </td>
                    <td> <?php echo $personas->direccion ?> </td>
                    <td class="bot"><a href="borrar.php?id=<?php echo $personas->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
                    <td class='bot'> <a href="editar.php?id=<?php echo $personas->id ?> & nom=<?php echo $personas->nombre ?> & ape=<?php echo $personas->apellido ?> & dir=<?php echo $personas->direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
                </tr>

            <?php
            endforeach;
            ?>

            <tr>
                <td></td>
                <td><input type='text' name='Nom' size='10' class='centrado'></td>
                <td><input type='text' name='Ape' size='10' class='centrado'></td>
                <td><input type='text' name=' Dir' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>

            <tr>
                <td colspan="4">
                    <?php
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        echo "<a href='?pagina=" . $i . "'> " . $i . "</a> ";
                    }

                    ?>
                </td>
            </tr>
        </table>
    </form>
    <p>&nbsp;</p>


</body>

</html>