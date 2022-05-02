<?php 
require_once "controllers/ProductsController.php";
$productController = new ProductsController;
// changement de status

extract($_GET);
$productController->modificationProductRequest($id_product,$statut_id);
$answerPHP= true;
// requete d'update 
echo json_encode($answerPHP);

?>