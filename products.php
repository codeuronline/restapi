<?php 
//ici je définie ma constante j'utilise str_replace pour remplacer index.php par 
//du vide dans l'url et ensuite je récompose ce qu'il me reste dans le chemin
define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once "controllers/ProductsController.php";


$productController = new ProductsController;


        if (isset($_GET['id'])) {
            $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
        }
        
        require "views/accueil.view.php";

        if (empty($url[0])) {
            echo "----tous s'affiche----";
            $productController->afficherProduct();
            echo "---------";
            //URL 0 = ID
        } else if ($url[0]) {
            //ici j'affiche 1seul livre
            $productController->afficherProduct($url[0]);
        } else if ($url[0] === "a") {
            $productController->ajoutProduct();
        // } else if ($url[0] === "m") {
        //     $productController->modificationProduct($url[1]);
        // } else if ($url[1] === "s") {
        //     $productController->suppressionProduct($url[2]);
        // } else if ($url[2] === "av") {
        //     $productController->ajoutProductValidation();
        // } else if ($url[2] === "mv") {
        // $productController->modificationProductValidation();
        // } else {
        //     //ici j'utilise le throw qui permet de gérée une exception 
        //     //du coup si la page n'existe pas.
        //     throw new Exception("La page n'existe sur product pas");
        }

?>