<?php 
//ici je définie ma constante j'utilise str_replace pour remplacer index.php par 
//du vide dans l'url et ensuite je récompose ce qu'il me reste dans le chemin
define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once "controllers/ProductsController.php";


$productController = new ProductsController;
var_dump("avant verification");
var_dump($_GET['id']);
if ($_GET['id']) {
    $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
    var_dump("id trouve");
    var_dump($url);
    require "views/accueil.view.php";
    var_dump($url);
    if (empty($url[0])) {
    
        var_dump("affichage de tous les produits")
;        $productController->afficherProducts();
    } else if ($url[0]) {
        var_dump("affichage du produit:".$url[0]);
        $productController->afficherProduct($url[0]);
    // } else if ($url[0] === "a") {
    //     echo "ajout";
    //     $productController->ajoutProduct();
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
}else { var_dump("pas d'id definit->on affiche tous");
    $productController->afficherProducts();
    require "views/accueil.view.php";}

?>