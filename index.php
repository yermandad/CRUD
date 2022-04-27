<!DOCTYPE html>
<html>
    <head>
        <title>Prueba Intercom</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
        <form name="registro" action="registrar.php" method="POST">
            <h1>Registrate</h1>
            <input type="text" name="nombre" placeholder="Nombres">
            <input type="text" name="apePaterno" placeholder="Primer apellido">
            <input type="text"  name="apeMaterno" placeholder="Segundo apellido">
            <input type="text" name="email" placeholder="e-mail">
            <input type="text" name="nota1" placeholder="Nota asignatura 1">
            <input type="text" name="nota2" placeholder="Nota asignatura 2">
            <input type="text" name="nota3" placeholder="Nota asignatura 3">
            <input type="text" name="nota4" placeholder="Nota asignatura 4">
            <input type="submit" name="btnRegistrar" value="Registrarme">

        </form>
        <?php
        //include("registrar.php");
        ?>
        <form name="consulta" action = "consultar.php" method="POST">
            <h1>Consulta</h1>
            <input type="text" name="email_C" placeholder="e-mail">
            <input type="submit" name="btnConsultar" value="Consultar">

        </form>
        <?php
           // include("consultar.php");
        ?>
    </body>
    <footer>

    </footer>

</html>