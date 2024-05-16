<?php
require "php-office/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

setlocale(LC_TIME, "es_CU");
setlocale(LC_TIME, "spanish");
header('Content-Type:text/html; charset=UTF-8');

/* LIMPIANDO DIRECTORIO EXPORTS */
$DIRECTORIO = "exports/";
$HANDLE = opendir($DIRECTORIO);
while ($FILE = readdir($HANDLE)) {
    if ($FILE != "." && $FILE != ".." && $FILE != ".htaccess" && $FILE != ".gitkeep") {
        unlink($DIRECTORIO . $FILE);
    }
}
/** ID DE MATRIZ */
$ID_MATRIZ = rand(1000000000, 9999999999);
$NOMBRE_PARTE = "MATRIZ-". $ID_MATRIZ;
$reader = IOFactory::createReader("Xlsx");
$spreadsheet = $reader->load("template/matriz.xlsx");

try {
    $sheet = $spreadsheet->getActiveSheet();
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

    /** MATRIZ INICIAL */
    $matrix = array(
        1 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        2 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        3 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        4 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        5 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        6 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        7 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        8 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        9 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',),
        10 => array('A' => '000', 'B' => '000', 'C' => '000', 'D' => '000', 'E' => '000', 'F' => '000', 'G' => '000', 'H' => '000', 'I' => '000', 'J' => '000',)
    );

    /* DEFINIENDO ENCABEZADO DEL REPORTE */
    $sheet->setCellValue("J2", $ID_MATRIZ);

    /* GENERANDO VALORES ALEATORIOS DE MATRIZ */
    foreach ($matrix as $key => $value) {
        foreach ($value as $k => $v) {
            $randomNumber = rand(100, 999); // Generar número aleatorio entre 100 y 999
            $newMatrix[$key][$k] = $randomNumber;
        }
    }
    
    /** LLENANDO EL EXCEL CON LOS VALORES DE LA MATRIZ */
    /** LLENANDO LA FILA 1 */
    $sheet->setCellValue("C4", $newMatrix[1]['A']);
    $sheet->setCellValue("D4", $newMatrix[1]['B']);
    $sheet->setCellValue("E4", $newMatrix[1]['C']);
    $sheet->setCellValue("F4", $newMatrix[1]['D']);
    $sheet->setCellValue("G4", $newMatrix[1]['E']);
    $sheet->setCellValue("H4", $newMatrix[1]['F']);
    $sheet->setCellValue("I4", $newMatrix[1]['G']);
    $sheet->setCellValue("J4", $newMatrix[1]['H']);
    $sheet->setCellValue("K4", $newMatrix[1]['I']);
    $sheet->setCellValue("L4", $newMatrix[1]['J']);

    /** LLENANDO LA FILA 2 */
    $sheet->setCellValue("C5", $newMatrix[2]['A']);
    $sheet->setCellValue("D5", $newMatrix[2]['B']);
    $sheet->setCellValue("E5", $newMatrix[2]['C']);
    $sheet->setCellValue("F5", $newMatrix[2]['D']);
    $sheet->setCellValue("G5", $newMatrix[2]['E']);
    $sheet->setCellValue("H5", $newMatrix[2]['F']);
    $sheet->setCellValue("I5", $newMatrix[2]['G']);
    $sheet->setCellValue("J5", $newMatrix[2]['H']);
    $sheet->setCellValue("K5", $newMatrix[2]['I']);
    $sheet->setCellValue("L5", $newMatrix[2]['J']);

    /** LLENANDO LA FILA 3 */
    $sheet->setCellValue("C6", $newMatrix[3]['A']);
    $sheet->setCellValue("D6", $newMatrix[3]['B']);
    $sheet->setCellValue("E6", $newMatrix[3]['C']);
    $sheet->setCellValue("F6", $newMatrix[3]['D']);
    $sheet->setCellValue("G6", $newMatrix[3]['E']);
    $sheet->setCellValue("H6", $newMatrix[3]['F']);
    $sheet->setCellValue("I6", $newMatrix[3]['G']);
    $sheet->setCellValue("J6", $newMatrix[3]['H']);
    $sheet->setCellValue("K6", $newMatrix[3]['I']);
    $sheet->setCellValue("L6", $newMatrix[3]['J']);

    /** LLENANDO LA FILA 4 */
    $sheet->setCellValue("C7", $newMatrix[4]['A']);
    $sheet->setCellValue("D7", $newMatrix[4]['B']);
    $sheet->setCellValue("E7", $newMatrix[4]['C']);
    $sheet->setCellValue("F7", $newMatrix[4]['D']);
    $sheet->setCellValue("G7", $newMatrix[4]['E']);
    $sheet->setCellValue("H7", $newMatrix[4]['F']);
    $sheet->setCellValue("I7", $newMatrix[4]['G']);
    $sheet->setCellValue("J7", $newMatrix[4]['H']);
    $sheet->setCellValue("K7", $newMatrix[4]['I']);
    $sheet->setCellValue("L7", $newMatrix[4]['J']);

    /** LLENANDO LA FILA 5 */
    $sheet->setCellValue("C8", $newMatrix[5]['A']);
    $sheet->setCellValue("D8", $newMatrix[5]['B']);
    $sheet->setCellValue("E8", $newMatrix[5]['C']);
    $sheet->setCellValue("F8", $newMatrix[5]['D']);
    $sheet->setCellValue("G8", $newMatrix[5]['E']);
    $sheet->setCellValue("H8", $newMatrix[5]['F']);
    $sheet->setCellValue("I8", $newMatrix[5]['G']);
    $sheet->setCellValue("J8", $newMatrix[5]['H']);
    $sheet->setCellValue("K8", $newMatrix[5]['I']);
    $sheet->setCellValue("L8", $newMatrix[5]['J']);

    /** LLENANDO LA FILA 6 */
    $sheet->setCellValue("C9", $newMatrix[6]['A']);
    $sheet->setCellValue("D9", $newMatrix[6]['B']);
    $sheet->setCellValue("E9", $newMatrix[6]['C']);
    $sheet->setCellValue("F9", $newMatrix[6]['D']);
    $sheet->setCellValue("G9", $newMatrix[6]['E']);
    $sheet->setCellValue("H9", $newMatrix[6]['F']);
    $sheet->setCellValue("I9", $newMatrix[6]['G']);
    $sheet->setCellValue("J9", $newMatrix[6]['H']);
    $sheet->setCellValue("K9", $newMatrix[6]['I']);
    $sheet->setCellValue("L9", $newMatrix[6]['J']);

    /** LLENANDO LA FILA 7 */
    $sheet->setCellValue("C10", $newMatrix[7]['A']);
    $sheet->setCellValue("D10", $newMatrix[7]['B']);
    $sheet->setCellValue("E10", $newMatrix[7]['C']);
    $sheet->setCellValue("F10", $newMatrix[7]['D']);
    $sheet->setCellValue("G10", $newMatrix[7]['E']);
    $sheet->setCellValue("H10", $newMatrix[7]['F']);
    $sheet->setCellValue("I10", $newMatrix[7]['G']);
    $sheet->setCellValue("J10", $newMatrix[7]['H']);
    $sheet->setCellValue("K10", $newMatrix[7]['I']);
    $sheet->setCellValue("L10", $newMatrix[7]['J']);

    /** LLENANDO LA FILA 8 */
    $sheet->setCellValue("C11", $newMatrix[8]['A']);
    $sheet->setCellValue("D11", $newMatrix[8]['B']);
    $sheet->setCellValue("E11", $newMatrix[8]['C']);
    $sheet->setCellValue("F11", $newMatrix[8]['D']);
    $sheet->setCellValue("G11", $newMatrix[8]['E']);
    $sheet->setCellValue("H11", $newMatrix[8]['F']);
    $sheet->setCellValue("I11", $newMatrix[8]['G']);
    $sheet->setCellValue("J11", $newMatrix[8]['H']);
    $sheet->setCellValue("K11", $newMatrix[8]['I']);
    $sheet->setCellValue("L11", $newMatrix[8]['J']);

    /** LLENANDO LA FILA 9 */
    $sheet->setCellValue("C12", $newMatrix[9]['A']);
    $sheet->setCellValue("D12", $newMatrix[9]['B']);
    $sheet->setCellValue("E12", $newMatrix[9]['C']);
    $sheet->setCellValue("F12", $newMatrix[9]['D']);
    $sheet->setCellValue("G12", $newMatrix[9]['E']);
    $sheet->setCellValue("H12", $newMatrix[9]['F']);
    $sheet->setCellValue("I12", $newMatrix[9]['G']);
    $sheet->setCellValue("J12", $newMatrix[9]['H']);
    $sheet->setCellValue("K12", $newMatrix[9]['I']);
    $sheet->setCellValue("L12", $newMatrix[9]['J']);

    /** LLENANDO LA FILA 10 */
    $sheet->setCellValue("C13", $newMatrix[10]['A']);
    $sheet->setCellValue("D13", $newMatrix[10]['B']);
    $sheet->setCellValue("E13", $newMatrix[10]['C']);
    $sheet->setCellValue("F13", $newMatrix[10]['D']);
    $sheet->setCellValue("G13", $newMatrix[10]['E']);
    $sheet->setCellValue("H13", $newMatrix[10]['F']);
    $sheet->setCellValue("I13", $newMatrix[10]['G']);
    $sheet->setCellValue("J13", $newMatrix[10]['H']);
    $sheet->setCellValue("K13", $newMatrix[10]['I']);
    $sheet->setCellValue("L13", $newMatrix[10]['J']);

    /* VARIABLES CON LOS NUEVOS VALORES POR FILAS DE LA MATRIZ PARA MOSTRAR EN EL EXCEL */
    $variable_matriz_1 = "1 => array( 'A' => '" . $newMatrix[1]['A'] . "', 'B' => '" . $newMatrix[1]['B'] . "', 'C' => '" . $newMatrix[1]['C'] . "', 'D' => '" . $newMatrix[1]['D'] . "', 'E' => '" . $newMatrix[1]['E'] . "', 'F' => '" . $newMatrix[1]['F'] . "', 'G' => '" . $newMatrix[1]['G'] . "', 'H' => '" . $newMatrix[1]['H'] . "', 'I' => '" . $newMatrix[1]['I'] . "', 'J' => '" . $newMatrix[1]['J'] . "',),";
    $variable_matriz_2 = "2 => array( 'A' => '" . $newMatrix[2]['A'] . "', 'B' => '" . $newMatrix[2]['B'] . "', 'C' => '" . $newMatrix[2]['C'] . "', 'D' => '" . $newMatrix[2]['D'] . "', 'E' => '" . $newMatrix[2]['E'] . "', 'F' => '" . $newMatrix[2]['F'] . "', 'G' => '" . $newMatrix[2]['G'] . "', 'H' => '" . $newMatrix[2]['H'] . "', 'I' => '" . $newMatrix[2]['I'] . "', 'J' => '" . $newMatrix[2]['J'] . "',),";
    $variable_matriz_3 = "3 => array( 'A' => '" . $newMatrix[3]['A'] . "', 'B' => '" . $newMatrix[3]['B'] . "', 'C' => '" . $newMatrix[3]['C'] . "', 'D' => '" . $newMatrix[3]['D'] . "', 'E' => '" . $newMatrix[3]['E'] . "', 'F' => '" . $newMatrix[3]['F'] . "', 'G' => '" . $newMatrix[3]['G'] . "', 'H' => '" . $newMatrix[3]['H'] . "', 'I' => '" . $newMatrix[3]['I'] . "', 'J' => '" . $newMatrix[3]['J'] . "',),";
    $variable_matriz_4 = "4 => array( 'A' => '" . $newMatrix[4]['A'] . "', 'B' => '" . $newMatrix[4]['B'] . "', 'C' => '" . $newMatrix[4]['C'] . "', 'D' => '" . $newMatrix[4]['D'] . "', 'E' => '" . $newMatrix[4]['E'] . "', 'F' => '" . $newMatrix[4]['F'] . "', 'G' => '" . $newMatrix[4]['G'] . "', 'H' => '" . $newMatrix[4]['H'] . "', 'I' => '" . $newMatrix[4]['I'] . "', 'J' => '" . $newMatrix[4]['J'] . "',),";
    $variable_matriz_5 = "5 => array( 'A' => '" . $newMatrix[5]['A'] . "', 'B' => '" . $newMatrix[5]['B'] . "', 'C' => '" . $newMatrix[5]['C'] . "', 'D' => '" . $newMatrix[5]['D'] . "', 'E' => '" . $newMatrix[5]['E'] . "', 'F' => '" . $newMatrix[5]['F'] . "', 'G' => '" . $newMatrix[5]['G'] . "', 'H' => '" . $newMatrix[5]['H'] . "', 'I' => '" . $newMatrix[5]['I'] . "', 'J' => '" . $newMatrix[5]['J'] . "',),";
    $variable_matriz_6 = "6 => array( 'A' => '" . $newMatrix[6]['A'] . "', 'B' => '" . $newMatrix[6]['B'] . "', 'C' => '" . $newMatrix[6]['C'] . "', 'D' => '" . $newMatrix[6]['D'] . "', 'E' => '" . $newMatrix[6]['E'] . "', 'F' => '" . $newMatrix[6]['F'] . "', 'G' => '" . $newMatrix[6]['G'] . "', 'H' => '" . $newMatrix[6]['H'] . "', 'I' => '" . $newMatrix[6]['I'] . "', 'J' => '" . $newMatrix[6]['J'] . "',),";
    $variable_matriz_7 = "7 => array( 'A' => '" . $newMatrix[7]['A'] . "', 'B' => '" . $newMatrix[7]['B'] . "', 'C' => '" . $newMatrix[7]['C'] . "', 'D' => '" . $newMatrix[7]['D'] . "', 'E' => '" . $newMatrix[7]['E'] . "', 'F' => '" . $newMatrix[7]['F'] . "', 'G' => '" . $newMatrix[7]['G'] . "', 'H' => '" . $newMatrix[7]['H'] . "', 'I' => '" . $newMatrix[7]['I'] . "', 'J' => '" . $newMatrix[7]['J'] . "',),";
    $variable_matriz_8 = "8 => array( 'A' => '" . $newMatrix[8]['A'] . "', 'B' => '" . $newMatrix[8]['B'] . "', 'C' => '" . $newMatrix[8]['C'] . "', 'D' => '" . $newMatrix[8]['D'] . "', 'E' => '" . $newMatrix[8]['E'] . "', 'F' => '" . $newMatrix[8]['F'] . "', 'G' => '" . $newMatrix[8]['G'] . "', 'H' => '" . $newMatrix[8]['H'] . "', 'I' => '" . $newMatrix[8]['I'] . "', 'J' => '" . $newMatrix[8]['J'] . "',),";
    $variable_matriz_9 = "9 => array( 'A' => '" . $newMatrix[9]['A'] . "', 'B' => '" . $newMatrix[9]['B'] . "', 'C' => '" . $newMatrix[9]['C'] . "', 'D' => '" . $newMatrix[9]['D'] . "', 'E' => '" . $newMatrix[9]['E'] . "', 'F' => '" . $newMatrix[9]['F'] . "', 'G' => '" . $newMatrix[9]['G'] . "', 'H' => '" . $newMatrix[9]['H'] . "', 'I' => '" . $newMatrix[9]['I'] . "', 'J' => '" . $newMatrix[9]['J'] . "',),";
    $variable_matriz_10 = "10 => array( 'A' => '" . $newMatrix[10]['A'] . "', 'B' => '" . $newMatrix[10]['B'] . "', 'C' => '" . $newMatrix[10]['C'] . "', 'D' => '" . $newMatrix[10]['D'] . "', 'E' => '" . $newMatrix[10]['E'] . "', 'F' => '" . $newMatrix[10]['F'] . "', 'G' => '" . $newMatrix[10]['G'] . "', 'H' => '" . $newMatrix[10]['H'] . "', 'I' => '" . $newMatrix[10]['I'] . "', 'J' => '" . $newMatrix[10]['J'] . "',),";

    /** LLENANDO LA MATRIZ DE MANERA VISUAL */
    $sheet->setCellValue("B16", "\$MATRIZ_" . $ID_MATRIZ . " = array(");
    $sheet->setCellValue("C17", $variable_matriz_1);
    $sheet->setCellValue("C18", $variable_matriz_2);
    $sheet->setCellValue("C19", $variable_matriz_3);
    $sheet->setCellValue("C20", $variable_matriz_4);
    $sheet->setCellValue("C21", $variable_matriz_5);
    $sheet->setCellValue("C22", $variable_matriz_6);
    $sheet->setCellValue("C23", $variable_matriz_7);
    $sheet->setCellValue("C24", $variable_matriz_8);
    $sheet->setCellValue("C25", $variable_matriz_9);
    $sheet->setCellValue("C26", $variable_matriz_10);
    $sheet->setCellValue("B27", ");");

    /* MARCANDO A1 SIN NEGRITA PARA QUE EL CURSOR APAREZCA EN LA PRIMERA FILA */
    $sheet->getStyle("B2")->getFont()->setBold(false);

    /* ESCRIBO TODO EN EL EXCEL */
    $writer->save("exports/" . $NOMBRE_PARTE);
} catch (\Exception $e) {
    echo 'Ocurrió un error al intentar abrir el archivo ' . $e;
}

/* EXPORTANDO EL FICHERO CREADO */
if (file_exists("exports/" . $NOMBRE_PARTE)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename=' . basename("exports/" . $NOMBRE_PARTE));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("exports/" . $NOMBRE_PARTE));
    ob_clean();
    flush();
    readfile("exports/" . $NOMBRE_PARTE);
    exit;
} else {
    echo "MESSAGE_ERROR_ARCHIVO_NO_DISPONIBLE";
}
