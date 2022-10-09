<?php


if (isset($_GET['id']) >= 1) {
    $id = $_GET['id'];
    //$emailE=$_GET['email_G'];
    include("con_db.php");
    $consultar = "SELECT * FROM datos WHERE ID='{$id}'";
    $resultado = mysqli_query($conex, $consultar);
    while ($row = mysqli_fetch_array($resultado)) {
        $id = $row['ID'];
        $nombre = $row['nombre'];
        $apePaterno = $row['apePaterno'];
        $apeMaterno = $row['apeMaterno'];
        $email = $row['email'];
        $nota1 = $row['nota_1'];
        $nota2 = $row['nota_2'];
        $nota3 = $row['nota_3'];
        $nota4 = $row['nota_4'];
        $promedio = ($nota1 + $nota2 + $nota3 + $nota4) / 4; //$row['promedio'];
        $fechareg = $row['fecha_creacion'];
    }
} else {
?>
    <h3 class="bad">Ups ha ocurrido un error</h3>
<?php

}
?>

<head>
    <title>Prueba Intercom</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<form action="procesar.php" method="POST">

    <h1>Actualizar Datos</h1>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="text" name="nombreA" value="<?php echo $nombre ?>" required>
    <input type="text" name="apePaternoA" value="<?php echo $apePaterno ?>">
    <input type="text" name="apeMaternoA" value="<?php echo $apeMaterno ?>">
    <input type="decimal" step=".01A" name="nota1" value="<?php echo $nota1 ?>" required>
    <input type="decimal" step=".01" name="nota2" value="<?php echo $nota2 ?>" required>
    <input type="decimal" step=".01" name="nota3" value="<?php echo $nota3 ?>" required>
    <input type="decimal" step=".01" name="nota4" value="<?php echo $nota4 ?>" required>
    <input type="submit" name="btnActualizar" value="Actualizar">


</form>