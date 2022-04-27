<?php 

define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/ProductsController.php";
$productController = new ProductsController;
//require "views/accueil.view.php";

if (!(empty($_GET))){
    $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
   if (empty($url[0])) {
            $productController->afficherProducts();
    } else if ($url[0]) {
            //ici j'affiche 1seul produit
            $productController->afficherProduct($url[0]);
        
        }

}else{
    
       $productController->afficherProducts();

    }

        
?>