<?php

/*require 'phpSpreadSheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/

if (isset($_POST['btnCarga'])) {

    $archivo = $_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $archivoGuardado = date('d-m-y') . '_copia_' . $archivo;

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
} elseif (isset($_GET['btnDescarga']) >= 1) {
    include('con_db.php');
    $archivoD = date('m-d-y') . '_descarga_listado.csv';
    /*$spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();*/
    $output = fopen('CSV/' . $archivoD, 'w');
    if ($output) {

        $arreglo = array('ID', 'Nombre', '1er Apellido', '2do apellido', 'e-mail', 'Nota1', 'Nota2', 'Nota3', 'Nota4', 'Promedio', 'estado', 'Fecha Reg');
        /*$sheet->setCellValue('A1', $arreglo[0]);
        $sheet->setCellValue('B1', $arreglo[1]);
        $sheet->setCellValue('C1', $arreglo[2]);
        $sheet->setCellValue('D1', $arreglo[3]);
        $sheet->setCellValue('E1', $arreglo[4]);
        $sheet->setCellValue('F1', $arreglo[5]);
        $sheet->setCellValue('G1', $arreglo[6]);
        $sheet->setCellValue('H1', $arreglo[7]);
        $sheet->setCellValue('I1', $arreglo[8]);
        $sheet->setCellValue('J1', $arreglo[9]);
        $sheet->setCellValue('K1', $arreglo[10]);
        $sheet->setCellValue('L1', $arreglo[11]);
        $contador = 2;*/
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
                $apeMaterno = $row['apeMaterno'];
                $email = $row['email'];
                $nota1 = $row['nota_1'];
                $nota2 = $row['nota_2'];
                $nota3 = $row['nota_3'];
                $nota4 = $row['nota_4'];
                $promedio = $row['promedio'];
                $estado = $row['estado'];
                $fechareg = $row['fecha_creacion'];
                $linea = array($id, $nombre, $apePaterno, $apeMaterno,  $email, $nota1, $nota2, $nota3, $nota4, $promedio, $estado, $fechareg);
                /* $sheet->setCellValue('A'.$contador, $linea[0]);
                $sheet->setCellValue('B'.$contador, $linea[1]);
                $sheet->setCellValue('C'.$contador, $linea[2]);
                $sheet->setCellValue('D'.$contador, $linea[3]);
                $sheet->setCellValue('E'.$contador, $linea[4]);
                $sheet->setCellValue('F'.$contador, $linea[5]);
                $sheet->setCellValue('G'.$contador, $linea[6]);
                $sheet->setCellValue('H'.$contador, $linea[7]);
                $sheet->setCellValue('I'.$contador, $linea[8]);
                $sheet->setCellValue('J'.$contador, $linea[9]);
                $sheet->setCellValue('K'.$contador, $linea[10]);
                $sheet->setCellValue('L'.$contador, $linea[11]);
                $contador = $contador+1;*/
                $output = fopen('CSV/' . $archivoD, 'a+');
                fputcsv($output, $linea, $delimitador, $encapsulador);
                fclose($output);
            }
            /*$writer= \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save($archivoD);
            header('Content-Type: application/x-www-form-urlencoded');
            header('Content-Transfer-Encoding: Binary ');
            header("Content-Dispotition: attachment; filename=\"".$archivoD."\"");
            readfile($archivoD);
            unlink($archivoD);
            exit;*/
            $fichero = 'CSV/' . $archivoD;
            $nomDescarga = 'Listado-' . date('d-m-y');
            if (file_exists($fichero) && is_file($fichero)) {
                header("Content-control: private");
                header("Content-type: text/csv");
                header("Content-disposition: attachment; filename=$archivoD");

                flush();
                $file = fopen($fichero, 'rb');
                print fread($file, filesize($fichero));
                fclose($file);
            }
            echo 'Descarga de archivo exitosa';
        }
    } else {
        echo 'no esta generando nada';
    }
}
