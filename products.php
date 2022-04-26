<?php 
//ici je définie ma constante j'utilise str_replace pour remplacer index.php par 
//du vide dans l'url et ensuite je récompose ce qu'il me reste dans le chemin
define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));



require_once "controllers/ProductsController.php";

$productController = new productsController;



try {
    //ici je fais la demande d'accès a une page
    if (empty($_GET['id'])) {

        require "views/accueil.view.php";
    } else {

        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;
            case "livres":
                if (empty($url[1])) {
                    $livreController->afficherLivres();
                } else if ($url[1] === "l") {
                    //ici j'affiche 1seul livre
                    $livreController->afficherLivre($url[2]);
                } else if ($url[1] === "a") {
                    $livreController->ajoutLivre();
                } else if ($url[1] === "m") {
                    $livreController->modificationLivre($url[2]);
                } else if ($url[1] === "s") {
                    $livreController->suppressionLivre($url[2]);
                } else if ($url[1] === "av") {
                    $livreController->ajoutLivreValidation();
                } else if ($url[1] === "mv") {
                    $livreController->modificationLivreValidation();
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