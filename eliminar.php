<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $eliminar = "UPDATE datos SET estado = 0  WHERE ID='$id'";
    include("con_db.php");
    $resultadoEliminar = mysqli_query($conex, $eliminar);


    if ($resultadoEliminar) {


        echo "Tus datos ".$id. " se han eliminado correctamente";
    } else {

        echo "Ups ha ocurrido un error";
    }
} else {
    echo "No se ha recibido el ID";
};
