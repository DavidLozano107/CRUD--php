<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Documento sin título</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>
  <?php

  $id = $_GET["id"];
  $nom = $_GET["nom"];
  $ape = $_GET["ape"];
  $dir = $_GET["dir"];

  ?>


  <h1>ACTUALIZAR</h1>

  <p>

  </p>
  <p>&nbsp;</p>
  <form name="form1" action="actualizar.php" method="post">
    <table width="25%" border="0" align="center">
      <tr>
        <td> Id</td>
        <td><label for="id"></label>
          <input type="hidden" name="id" id="id"> <?php echo $id ?></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
      </tr>
      <tr>
        <td>Apellido</td>
        <td><label for="ape"></label>
          <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
      </tr>
      <tr>
        <td>Dirección</td>
        <td><label for="dir"></label>
          <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="act" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</body>

</html>