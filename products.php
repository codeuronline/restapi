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
        $POST = []; //tableau qui va contenir les données reçues à inserer
        parse_str(file_get_contents('php://input'), $POST);
        $productController->ajoutProduct($POST);
        var_dump($POST);
        break;
    case "PUT": 
        $_PUT = []; //tableau qui va contenir les données reçues à modifier
        parse_str(file_get_contents('php://input'), $_PUT);
        var_dump("mise à jour du produit");
        $productController->modificationProduct($_PUT);
        break;
    case "DELETE":
        $_DELETE = [];
         parse_str(file_get_contents('php://input'), $_DELETE);
        if (!(empty($_GET['id']))) {
            $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
            if (empty($url[1])) {
                //on fait rien
                $productController->afficherProducts();
            } else {
                //ici j'affiche 1seul produit
                $productController->suppressionProduct($url[1]);
            }
        } else {
            //on  fait rien et on affiche la liste de produits
            $productController->afficherProducts();
        }
        var_dump("suppression du produit");
        break;
    case "DUPLICATE":
        $DUPLICATE = array();
        parse_str(file_get_contents('php://input'), $DUPLICATE);
        var_dump("Porduit dupliquer");
        $productController->dupliquerProduct($DUPLICATE);
        break;
    }   