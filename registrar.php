<?php
include("con_db.php");

if (isset($_POST['btnRegistrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1) {
        $nombre = $_POST['nombre'];
        $apePaterno = $_POST['apePaterno'];
        $apeMaterno = $_POST['apeMaterno'];
        $email = $_POST['email'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $nota4 = $_POST['nota4'];
        $promedio = ($nota1+$nota2+$nota3+$nota4)/4;
        $fechareg = date("d/m/y");
        $consulta = "INSERT INTO datos(nombre, apePaterno, apeMaterno, email, nota_1, nota_2, nota_3, nota_4, promedio, fecha_creacion) VALUES ('$nombre','$apePaterno','$apeMaterno','$email', '$nota1','$nota2' ,'$nota3' , '$nota4' , '$promedio', '$fechareg')";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Prueba Intercom</title>
                <meta charset="utf-8">
                <link rel="stylesheet" type="text/css" href="estilo.css">
            </head>
            <h3 class="ok">Te has registrado correctamente</h3>
        <?php
        } else {
        ?>
            <h3 class="bad">Ups ha ocurrido un error</h3>
        <?php
        }
    } else {
        ?>
        <h3 class="bad">¡Por favor complete todos los datos!</h3>
<?php
    }
}


?>