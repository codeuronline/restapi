<?php 

define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/ProductsController.php";
$productController = new ProductsController;

//require "views/accueil.view.php";
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if (!(empty($_GET['id']))){

            $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);


            if (empty($url[1])) {
                $productController->afficherProducts();
                var_dump('if');
            } else {
                //ici j'affiche 1seul produit
                $productController->afficherProduct($url[1]);
                var_dump('else');
            }
            
        }else{
            $productController->afficherProducts();
        }
        break;
    case 'POST':
        $POST = array(); //tableau qui va contenir les données reçues
        parse_str(file_get_contents('php://input'), $POST);
        var_dump($POST);
        break;
    case "PUT": 
        $_PUT = array(); //tableau qui va contenir les données reçues
        parse_str(file_get_contents('php://input'), $_PUT);
        break;
    case "DELETE": break;
    }   