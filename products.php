<?php 
//ici je définie ma constante j'utilise str_replace pour remplacer index.php par 
//du vide dans l'url et ensuite je récompose ce qu'il me reste dans le chemin
define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));



require_once "controllers/ProductsController.php";

$productController = new ProductsController;

try {
    //ici je fais la demande d'accès a une page
    if (empty($_GET['id'])) {

        require "views/accueil.view.php";
    } else {

        $url = explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;
            case "products":
                if (empty($url[1])) {
                    $productController->afficherProducts();
                } else if ($url[1] === "l") {
                    //ici j'affiche 1seul livre
                    $productController->afficherProduct($url[2]);
                } else if ($url[1] === "a") {
                    $productController->ajoutProduct();
                } else if ($url[1] === "m") {
                    $productController->modificationProduct($url[2]);
                } else if ($url[1] === "s") {
                    $productController->suppressionProduct($url[2]);
                } else if ($url[1] === "av") {
                    $productController->ajoutProductValidation();
                } else if ($url[1] === "mv") {
                    $productController->modificationProductValidation();
                } else {
                    //ici j'utilise le throw qui permet de gérée une exception 
                    //du coup si la page n'existe pas.
                    throw new Exception("La page n'existe pas");
                }

                break;
                //ici j'utilise le throw qui permet de gérée une exception 
                //du coup si la page n'existe pas.
        default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {

    echo $e->getMessage();
}

?>