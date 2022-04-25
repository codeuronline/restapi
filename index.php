<?php
//ici je définie ma constante j'utilise str_replace pour remplacer index.php par 
//du vide dans l'url et ensuite je récompose ce qu'il me reste dans le chemin
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));



require_once "controllers/LivresController.controller.php";

$livreController = new LivresController;



try {
    //ici je fais la demande d'accès a une page
    if (empty($_GET['page'])) {
        //dans le cas ou la page n'est pas trouver il ce dirige vers accueil
        //je définie dans mes case le nom de la page que j'aurais a cliquer dans le href de ma nav et donc ici c'est accueil
        require "views/accueil.view.php";
    } else {
        //ici j'utilise explode qui me permet d'exploser mon URL ce qui me permet d'avoir plusieur case dans mon url
        //apres j'utilise filter_sanitize c'est une petite sécurité a travers les envoie d'url.
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);


        //je définie dans mes case le nom de la page que j'aurais a cliquer dans le href de ma nav et donc ici c'est livres
        //ici je rappel donc ma variable livre controller et je rappel ma fonction afficher livres.
        //ici j'utilise l'action empty qui indique que si rien est renseigner dans l'url alors tous les livres seront afficher. 
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

//cette méthode de code me permet d'avoir trois solution pour avoir la page accueil 
//1 ----> soit je tape rien dans l'url
//2 ---> soit je tape accueil dans l'url
//3 ---> soit je met index.php?page=accueil

//Par contre : ce type d'inscription dans l'url n'est pas pratique pour le référencement
//je crée donc un fichier htaccess qui me permet de fluidifier tous ça: 
// exemple : http://localhost/biblio/index.php?page=accueil
//devient --> http://localhost/biblio/accueil


?>











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <title>MicroMarket Management</title>
</head>

<body>
    <center>
        <main>
            <div class="row">
                <section class="col-12">
                    <table class="table">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Asset</th>
                                <th>CODE</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Categorie</th>
                                <th>Statut</th>
                                <th>Supplier</th>
                                <th>Purchase</th>
                                <th>Expire</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php foreach( $productsAll as $product) : ?>
                                <tr>
                                    <td>
                                        <?=$product['id_product'] ?>
                                    </td>
                                    <td>
                                        <?=$product['primary_visual'] ?>
                                    </td>
                                    <td>
                                        <?=$product['code'] ?>
                                    </td>
                                    <td>
                                        <?=$product['description'] ?>
                                    </td>
                                    <td>
                                        <?=$product['price'] ?>
                                    </td>
                                    <td>
                                        <?=$product['category_id'] ?>
                                    </td>
                                    <td>
                                        <?=$product['statut_id'] ?>
                                    </td>
                                    <td>
                                        <?=$product['supplier_id']?>
                                    </td>
                                    <td>
                                        <?=$product['purchase_date']?>
                                    </td>
                                    <td>
                                        <?=$product['expiration_date']?>
                                    </td>
                                    <td>
                                        <a href="update.php?id=<?=$product['id_product']?>"><button
                                                class="btn btn-primary">Up</button></a>
                                        <a href="delete.php?id=<?=$product['id_product']?>"><button
                                                class="btn btn-danger"
                                                onclick="return confirm('Voulez-vous supprimer ?')">X</button></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                </section>
            </div>
        </main>
    </center>
</body>

</html>