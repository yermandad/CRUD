<?php


if (isset($_POST['btnConsultar']) && isset($_POST['email_C']) >= 1) {
    include("con_db.php");
    $emailC=$_POST['email_C'];
    $consultar = 'SELECT * FROM datos WHERE email=$emailC';
    $resultado = mysqli_query($conex, 'SELECT * FROM datos ');
    if ($resultado) {
        while ($row = mysqli_fetch_array($resultado)) {
            $nombre = $row['nombre'];
            $apePaterno = $row['apePaterno'];
            $email = $row['email'];
            $nota1 = $row['nota_1'];
            $nota2 = $row['nota_2'];
            $nota3 = $row['nota_3'];
            $nota4 = $row['nota_4'];
            $promedio = ($nota1+$nota2+$nota3+$nota4)/4; //$row['promedio'];
            $fechareg = $row['fecha_creacion'];
?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Prueba Intercom</title>
                <meta charset="utf-8">
                <link rel="stylesheet" type="text/css" href="estilo.css">
            </head>
            <div>
                <h2><?php echo $nombre . " " . $apePaterno; ?></h2>
                <div>
                    <table width=auto border="1">
                        <tr>
                            <td><b>Nota 1</b></td> <td><b>Nota 2</b></td> <td><b>Nota 3</b></td> <td><b>Nota 4</b></td> <td><b>Promedio</b></td>
                        </tr>
                        <tr>
                            <td><?php echo $nota1; ?></td> <td><?php echo $nota2; ?></td> <td><?php echo $nota3; ?></td> <td><?php echo $nota4; ?></td> <td><?php echo $promedio; ?></td>
                        </tr>
                    </table>
                    <!--<p>
                        <b>e-mail: </b><?php //echo $email; ?> <br>
                        <b>Nota 1: </b><?php //echo $nota1; ?> <br>
                        <b>Nota 2:: </b><?php //echo $nota2; ?> <br>
                        <b>Nota 3: </b><?php //echo $nota3; ?> <br>
                        <b>Nota 4: </b><?php //echo $nota4; ?> <br>
                        <b>promedio: </b><?php //echo $promedio; ?> <br>
                        <b>Fecha registro: </b><?php echo $fechareg; ?> <br>
                    </p>--><br/><br/>
                </div>

            </div>

            </html>
<?php
        }
    } else {
        ?>
        <h3 class="bad">Ups no hay usuarios registrados con ese e-mail</h3>
        <?php
    }
}


?>