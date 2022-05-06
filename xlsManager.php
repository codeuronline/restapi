<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//$spreadsheet = new Spreadsheet();
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("micromarket.xlsx");

$sheet = $spreadsheet->getActiveSheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');
// $sheet->setCellValue('A2', 'Hello World1 !');
// $sheet->setCellValue('B1', 'Hello World3 !');
// $sheet->setCellValue('B2', 'Hello World4 !');
$lastRow = $sheet->getHighestDataRow();
$lastCol = $sheet->getHighestDataColumn();
var_dump($lastRow);
var_dump($lastCol);
$allProducts=[];
for ($j = 2; $j < $lastRow; $j++) {
    $aProduct=[];
    for ($i="A"; $i < $lastCol; $i++) { 
        $aProduct[]=$sheet->getCell($i.$j)->getValue();
        }
        $allProducts[]=$aProduct;
    }
   

for ($z=0;$z<count($allProducts);$z++){
    $allProducts[$z][3]= 
    $allProducts[$z][7]=
    $allProducts[$z][8]=
    $allProductsLabel[$z]["id_product"]=$allProducts[$z][0];
    $allProductsLabels[$z]["code"]=$allProducts[$z][0];
    $allProductsLabels[$z][""]=$allProducts[$z][3] * 100;
    $allProductsLabels[$z][""]=$allProducts[$z][2];
    $allProductsLabels[$z][""]=$allProducts[$z][3];
    $allProductsLabels[$z][""]=$allProducts[$z][4];
    $allProductsLabels[$z][""]=$allProducts[$z][5];
    $allProductsLabels[$z][""]=$allProducts[$z][6];
    $allProductsLabels[$z][""]=gmdate("d-m-Y H:i:s",($allProducts[$z][7] - 25569) * 86400);
    $allProductsLabels[$z][""]=gmdate("d-m-Y H:i:s",($allProducts[$z][8] - 25569) * 86400);
    //$allProductsLabels[$z]["visual_primary"]=$allProducts[$z][9];
}
   
var_dump($allProducts);
var_dump("Nombre d'enregistrement importé dans l'objet : ".count($allProducts));

$writer = new Xlsx($spreadsheet);
$writer->save(date("Y_m_d_h_i")."_treated.xlsx");