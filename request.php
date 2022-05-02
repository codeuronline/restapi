<?php 
require_once "controllers/ProductsController.php";
$productController = new ProductsController;
// changement de status
extract($_GET);
$productController->modificationProduct($id_product);
// requete d'update 

?>