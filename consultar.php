<head>
                    <title>Editar datos estudiante</title>
                    <meta charset="utf-8">
                    <link rel="stylesheet" type="text/css" href="estilo.css">
                </head>
<?php



if (isset($_POST['btnConsultar']) && isset($_POST['email_C']) >= 1) {
    include("con_db.php");
    $emailC = $_POST['email_C'];
    $consultar = "SELECT * FROM datos WHERE  email='{$emailC}' ";
    $resultado = mysqli_query($conex, $consultar);
    if ($resultado) {
        while ($row = mysqli_fetch_array($resultado)) {
            $nombre = $row['nombre'];
            $apePaterno = $row['apePaterno'];
            $email = $row['email'];
            $nota1 = $row['nota_1'];
            $nota2 = $row['nota_2'];
            $nota3 = $row['nota_3'];
            $nota4 = $row['nota_4'];
            $promedio = ($nota1 + $nota2 + $nota3 + $nota4) / 4; //$row['promedio'];
            $estado = $row['estado'];
            $fechareg = $row['fecha_creacion'];
            if ($estado == 1) {
?>

                <head>
                    <title>Editar datos estudiante</title>
                    <meta charset="utf-8">
                    <link rel="stylesheet" type="text/css" href="estilo.css">
                </head>
                <div>
                    <h2><?php echo $nombre . " " . $apePaterno; ?></h2>
                    <div>
                        <form name="editar" action="editar.php" method="POST">
                            <table width=auto border="1">
                                <tr>
                                    <td><b>Nota 1</b></td>
                                    <td><b>Nota 2</b></td>
                                    <td><b>Nota 3</b></td>
                                    <td><b>Nota 4</b></td>
                                    <td><b>Promedio</b></td>
                                    <td><b>Acción</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $nota1; ?></td>
                                    <td><?php echo $nota2; ?></td>
                                    <td><?php echo $nota3; ?></td>
                                    <td><?php echo $nota4; ?></td>
                                    <td><?php echo $promedio; ?></td>
                                    <td><a href="editar.php?id=<?php echo $row['ID']; ?>">Editar</a>|
                                        <a href="eliminar.php?id=<?php echo $row['ID']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                            </table>

                            <input type="hidden" name="emailE" value="<?php echo $emailC; ?>">
                            <input type="submit" name="btnEditar" value="Editar">
                        </form>
                        <br /><br />
                    </div>


                </div><?php
                    } else {
                        ?>
                        <h3 class="bad">No existe el estudiante en nuestra base de datos</h3>
                        <?php
                        

                    }
                }
                /*sleep(3);
                header('Location: index.php');*/
            }
        }
?>