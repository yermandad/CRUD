<?php ?> <head>
    <title>Editar todos los usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
        if (isset($_POST['btnConsultaG']) && isset($_POST['email_G']) >= 1) {

            consulta();
        } else {
        ?>
        <h3 class="bad">Ups no hay usuarios registrados con ese e-mail</h3>
        <?php
        }


        function consulta()
        {
            include("con_db.php");
            $emailG = $_POST['email_G'];
            $consultar = "SELECT * FROM datos WHERE estado = 1 ";
            $resultado = mysqli_query($conex, $consultar);
            if ($resultado) {
    ?>
        <div>
            <form id='conrultaResult'> 
                <table width=auto border="1">
                    <thead>
                        <td><b>Nombre</b></td>
                        <td><b>Nota 1</b></td>
                        <td><b>Nota 2</b></td>
                        <td><b>Nota 3</b></td>
                        <td><b>Nota 4</b></td>
                        <td><b>Promedio</b></td>
                        <td><b>Acción</b></td>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($resultado)) {
                        $id = $row['ID'];
                        $nombre = $row['nombre'];
                        $apePaterno = $row['apePaterno'];
                        $email = $row['email'];
                        $nota1 = $row['nota_1'];
                        $nota2 = $row['nota_2'];
                        $nota3 = $row['nota_3'];
                        $nota4 = $row['nota_4'];
                        $promedio = ($nota1 + $nota2 + $nota3 + $nota4) / 4; //$row['promedio'];
                        $fechareg = $row['fecha_creacion'];
                    ?>
                        <tr>
                            <td><?php echo $nombre . ' ' . $apePaterno; ?></td>
                            <td><?php echo $nota1; ?></td>
                            <td><?php echo $nota2; ?></td>
                            <td><?php echo $nota3; ?></td>
                            <td><?php echo $nota4; ?></td>
                            <td><?php echo $promedio; ?></td>
                            <td><button id="btnEdit" class="edit" value="<?php echo $row['ID']; ?>">Editar</button>|
                                
                                <button id="btnDelete" class="delete" value="<?php echo $row['ID']; ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
              
            <!--..prueba pr-->
        </div>
        
        </form>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="ajax.js"></script>
        
<?php
// prueba de pr

            }
        }
?>

<!---->