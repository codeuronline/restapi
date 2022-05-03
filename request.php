<?php 
require_once "controllers/ProductsController.php";
$productController = new ProductsController;
// changement de status

switch($_SERVER['REQUEST_METHOD']){
    case "GET": extract($_GET);
                $productController->modificationProductRequest($id_product,$statut_id);
                 $answerPHP= true;
                 break;
    case "POST": extract($POST);
                $productController->modificationProductRequest($id_product,$statut_id);
                $answerPHP=true;
                break;
}
// requete d'update 
echo json_encode($answerPHP);

?>