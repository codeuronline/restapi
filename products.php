<?php 

define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/ProductsController.php";
$productController = new ProductsController;
$url = explode("/", filter_var(@$_GET['id']), FILTER_SANITIZE_URL);
//require "views/accueil.view.php";

var_dump($_SERVER['REQUEST_METHOD']);
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        // requete GET 
        if (!(empty($_GET['id']))){
        $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
            var_dump($url);
        switch ($url[0]) {
            case 'del':
                //var_dump("GET->del");
                if (!empty($url[1])){
                    //var_dump($url[1]);
                    $productController->supprimerProduct($url[1]);

                } else { 
                    //var_dump("GET->del->noid");
                }
                $productController->afficherProducts();        
                break;
            case 'update':
                //var_dump("<GET->update");
                    if (!empty($url[1])){
                    // $productController->modificationProductRequest($url[1]);
                    $productController->modifierProduct($url[1]);
                    if(!empty($url[2])){
                        require "request.php";               }
                    // $productController->afficherProducts();
                } else { 
                    $productController->afficherProducts();
                } 
                break;
            case 'request';
                    // error_log('path request_category');
                if(!empty($url[1])){
                    error_log('path request_category');
                    require 'request_category.php';
        
                }else{
                    $productController->afficherProducts();
                }
            case 'products';
                    if (!empty($url[1])) {
                        if ($url[1] == "request") {
                            if (!empty($url[2])) {
                                error_log($url[2]);
                                // $productController->loadProductRequest($url[2]);
                                require 'request_category.php';
                                $productController->afficherProducts();
                            } else {
                                $productController->afficherProducts();
                            }                            
                        }
                    } else {
                if(!empty($url[1])){
                            $productController->afficherProduct($url[1]);  
                //$productController->loadProductRequest($url[1]);          
                } else{ 
                    $productController->afficherProducts();
                        }
                    }
        break;
        }
    break;
    }
    case 'POST':
        $POST = []; //tableau qui va contenir les données reçues à inserer
        parse_str(file_get_contents('php://input'), $POST);
        $productController->ajoutProduct($POST);
        break;
    case "PUT": 
        $_PUT = []; //tableau qui va contenir les données reçues à modifier
        parse_str(file_get_contents('php://input'), $_PUT);
        //var_dump("mise à jour du produit");
        $productController->modifierProductPut($_PUT,$id);
        header('Location: '.URL.'products');
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
                //ici on supprimer le produit definit dans l'url
                $productController->supprimerProduct($url[1]);
            }
        } else {
            //on fait rien et on affiche la liste de produits
            $productController->afficherProducts();
        }
        //var_dump("suppression du produit");
        header('Location: '.URL.'products');
        break;
    case "DUPLICATE":
        $DUPLICATE = [];
        parse_str(file_get_contents('php://input'), $DUPLICATE);
        //var_dump($DUPLICATE);
        if (!(empty($_GET['id']))) {
            $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
            if (empty($url[1])) {
                //on fait rien
                $productController->afficherProducts();
            } else {
                //ici je duplique 1seul produit
                $productController->dupliquerProduct($DUPLICATE,$url[1]);
            }
        } else {
            //on fait rien et on affiche la liste de produits
            $productController->afficherProducts();
        }
        //var_dump("Produit dupliquer");
        header('Location: '.URL.'products');
        break;
    }   