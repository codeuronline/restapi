<?php 

define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/ProductsController.php";
$productController = new ProductsController;

//require "views/accueil.view.php";
var_dump($_SERVER['REQUEST_METHOD']);
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if (!(empty($_GET['id']))){
            $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
        
            if (empty($url[1])) {
                $productController->afficherProducts();
            } else {
                //ici j'affiche 1seul produit
                $productController->afficherProduct($url[1]);
           }            
        }else{
            $productController->afficherProducts();
        }
        break;
    case 'POST':
        $POST=[];
         //tableau qui va contenir les données reçues
         parse_str(file_get_contents('php://input'), $POST);
        var_dump($POST);
        var_dump("ICI on traite les donnees à inserer");
        $productController->ajoutProduct($POST);
         break;
    case "PUT": 
        $_PUT = array(); //tableau qui va contenir les données reçues
        parse_str(file_get_contents('php://input'), $_PUT);
        var_dump("mise à jour du produit");
        break;
    case "DELETE": break;
    }   