<!DOCTYPE html>
<html>
    <head>
        <title>Prueba Intercom</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
        <form name="registro"  method="POST">
            <h1>Registrate</h1>
            <input type="text" name="nombre" placeholder="Nombres" required>
            <input type="text" name="apePaterno" placeholder="Primer apellido">
            <input type="text"  name="apeMaterno" placeholder="Segundo apellido">
            <input type="email" name="email" placeholder="e-mail">
            <input type="decimal" step=".01" name="nota1" placeholder="Nota asignatura 1" required>
            <input type="decimal" step=".01" name="nota2" placeholder="Nota asignatura 2" required>
            <input type="decimal" step=".01" name="nota3" placeholder="Nota asignatura 3" required>
            <input type="decimal" step=".01" name="nota4" placeholder="Nota asignatura 4" required>
            <input type="submit" name="btnRegistrar" value="Registrarme">

        </form>
        <?php
        include("registrar.php");
        ?>
        <form name="consulta" action = "consultar.php" method="POST">
            <h1>Consulta</h1>
            <input id='emailC' type="email" name="email_C" placeholder="e-mail">
            <input type="submit" name="btnConsultar" value="Consultar">

        </form>
        <?php
           // include("consultar.php");
        ?>

        <form name="consultaGeneral" action = "consultaG.php" method="post" enctype="multipart/form-data">
            <h1>Consulta General</h1>
            <input id='emailG' type="email" name="email_G" placeholder="e-mail">
            <input type="submit" name="btnConsultaG" value="Consulta General">

        </form>

        <form name="cargaMasiva" action = "carga.php" method="post" enctype="multipart/form-data">
            <h1>Cargue Masivo</h1>
            <input type="file" name="archivo">
            <input type="submit" name="btnCarga" value="Cargar Archivo">
            

        </form>
        <form name="descargaMasiva" action = "carga.php" method="get" enctype="multipart/form-data">
            <h1>Descargue Masivo</h1>
            <input type="email" name="emailDescarga" required>
            <input type="submit" name="btnDescarga" value="Descargar Archivo">
            

        </form>

        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script src="ajax.js"></script>
    </body>
    <footer>

    </footer>

</html>