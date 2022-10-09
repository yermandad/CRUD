<?php
require 'phpSpreadSheet/vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Csv($spreadsheet);

$writer->save('hello world.csv');
/*if (isset($_POST['btnCarga'])) {

    $archivo = $_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $archivoGuardado = 'copia_' . $archivo;

    if (copy($ruta, 'CSV/' . $archivoGuardado)) {
        $fp = fopen('CSV/' . $archivoGuardado, 'r'); //para abrir el archivo
        while ($datos = fgetcsv($fp, 1000, ',')) {
            include('con_db.php');
            $fechareg = date("d/m/y");
            $promedio = ((float)$datos[5] + (float)$datos[6] + (float)$datos[7] + (float)$datos[8]) / 4;
            $carga = "INSERT INTO datos(nombre, apePaterno, apeMaterno, email, nota_1, nota_2, nota_3, nota_4, promedio, fecha_creacion) VALUES ('$datos[1]','$datos[2]','$datos[3]','$datos[4]', '$datos[5]','$datos[6]' ,'$datos[7]' , '$datos[8]' , '$promedio', '$fechareg')";
            $resultado = mysqli_query($conex, $carga);
        }

        echo 'El cargue ha sido exitoso';;
    }
    
} elseif (isset($_GET['btnDescarga'])>=1) {
    include('con_db.php');
    $archivoD = date('d/m/y').'_descarga_listado.CSV';
    $output = fopen('CSV/'.$archivoD, 'w');
    if ($output){
        $arreglo = array('ID', 'Nombre', '1er Apellido', '2do apellido', 'e-mail', 'Nota1', 'Nota2', 'Nota3', 'Nota4', 'Promedio', 'estado' , 'Fecha Reg');
        $delimitador = ',';
        $encapsulador = '"';
        fputcsv($output, $arreglo, $delimitador, $encapsulador);
        $consultar = "SELECT * FROM datos";
        $resultado = mysqli_query($conex, $consultar);
        if ($resultado) {
            while ($row = mysqli_fetch_array($resultado)) {
                $id = $row['ID'];
                $nombre = $row['nombre'];
                $apePaterno = $row['apePaterno'];
                $email = $row['email'];
                $nota1 = $row['nota_1'];
                $nota2 = $row['nota_2'];
                $nota3 = $row['nota_3'];
                $nota4 = $row['nota_4'];
                $promedio = $row['promedio'];
                $estado= $row['estado'];
                $fechareg = $row['fecha_creacion'];
                $linea =array($id , $nombre , $apePaterno ,  $email, $nota1, $nota2, $nota3, $nota4, $promedio , $estado , $fechareg);
                $output = fopen('CSV/'.$archivoD, 'a+');
                fputcsv($output, $linea , $delimitador, $encapsulador);
                fclose($output);
            }
            echo 'Descarga de archivo exitosa';
        }
    } else {
        echo 'no esta generando nada';
    }   
}*/

