<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

extract($_POST);
//$spreadsheet = new Spreadsheet();
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("put/" . $filename);

$sheet = $spreadsheet->getActiveSheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');
// $sheet->setCellValue('A2', 'Hello World1 !');
// $sheet->setCellValue('B1', 'Hello World3 !');
// $sheet->setCellValue('B2', 'Hello World4 !');
$lastRow = $sheet->getHighestDataRow();

$lastCol = $sheet->getHighestDataColumn();
//anticipe le decalage de la derniere colonne avec le decalage A-> 1 dans le tableau qui commence a 0
$lastCol++;
var_dump($lastRow);
var_dump($lastCol);
if ($lastCol == "K") {
$allProducts=[];
//anticipe le decalage des produits commençant à la ligne 2
for ($j = 2; $j < $lastRow; $j++) {
    $aProduct=[];
    for ($i="A"; $i < $lastCol; $i++) { 
        $aProduct[]=$sheet->getCell($i.$j)->getValue();
        }
        $allProducts[]=$aProduct;
    }

    for ($z=0;$z<count($allProducts);$z++){
    // $allProductsLabel[$z]["id_product"]=$allProducts[$z][0];
    $allProductsLabels[$z]["code"]=$allProducts[$z][1];
    $allProductsLabels[$z]["description"]=$allProducts[$z][2];
    $allProductsLabels[$z]["price"]=$allProducts[$z][3] * 100;
    $allProductsLabels[$z]["category_id"]=$allProducts[$z][4];
    $allProductsLabels[$z]["statut_id"]=$allProducts[$z][5];
    $allProductsLabels[$z]["supplier_name"]=$allProducts[$z][6];
    // tester si le fournisseur existe si non le creer
    $allProductsLabels[$z]["purchase_date"]=gmdate("d-m-Y H:i:s",($allProducts[$z][7] - 25569) * 86400);
    $allProductsLabels[$z]["expiration_date"]=gmdate("d-m-Y H:i:s",($allProducts[$z][8] - 25569) * 86400);
    $allProductsLabels[$z]["visual_primary"]=$allProducts[$z][9];
    $url = "http://localhost/restapi/products.php"; // modifier le produit 1
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($allProductsLabels[$z]));
    $response = curl_exec($ch);
    echo $response;
    if (!$response) {
        return false;
    }   
}
   
var_dump($allProductsLabels);
var_dump("Nombre d'enregistrement importé dans l'objet : ".count($allProductsLabels));
}else{
    
        echo "nombre de colonne erroné";}


// $writer = new Xlsx($spreadsheet);
// $writer->save("put/".date("Y_m_d_h_i")."_treated.xlsx");