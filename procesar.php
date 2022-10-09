<?php
include("con_db.php");
$id = $_POST['id'];
$nombre = $_POST['nombreA'];
$apePaterno = $_POST['apePaternoA'];
$apeMaterno = $_POST['apeMaternoA'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];
$nota4 = $_POST['nota4'];
$promedio = ($nota1+$nota2+$nota3+$nota4)/4;

$actualizar= "UPDATE datos SET nombre='$nombre', apePaterno='$apePaterno', apeMaterno='$apeMaterno', nota_1='$nota1', nota_2='$nota2', nota_3='$nota3', nota_4='$nota4', promedio ='$promedio' WHERE ID='$id'";
$resultado = mysqli_query($conex, $actualizar);

if ($resultado) {
    ?>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <h3 class="ok">Tus datos se han actualizado correctamente</h3>
    <?php
    //sleep(10);
    header('Location: index.php');
    
    } else {
        ?>
        <h3 class="bad">Ups ha ocurrido un error</h3>
        <?php
       // sleep(10);
        header('Location: index.php');
    }
    
    ?>
