<?PHP 
//    define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
     ?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des produits</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://https//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
    <link rel="stylesheet" href="http://localhost/restapi/public/css/style.css">
</head>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL ?>index.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=URL ?>products/">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL ?>views/XLS_form.php">XLS
                        formulaire</a>
                </li>


        </div>

        <div class=" btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                data-bs-display="static" aria-expanded="false">
                CHOIX du TEST
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li class="nav-item">
                    <a href="nav-link" href="<?= URL?>xlsManager.php"></a>
                </li>
                <li><a href="http://localhost/restapi/products/"><button class="dropdown-item"
                            type="button">SHOW</button></a>
                </li>
                <li><a href="http://localhost/restapi/products/"><button class="dropdown-item"
                            type="button">GET</button></a>
                </li>
                <li><a href="http://localhost/restapi/test_post.php"><button class="dropdown-item"
                            type="button">TEST_POST(Inserer)</button></a></li>
                <li><a href="http://localhost/restapi/test_put.php"><button class="dropdown-item"
                            type="button">TEST_PUT(modifier)</button></a></li>
                <li><a href="http://localhost/restapi/test_delete.php"><button class="dropdown-item"
                            type="button">TEST_DELETE(supprimer)</button></a></li>
                <li><a href="http://localhost/restapi/test_duplicate.php"><button class="dropdown-item"
                            type="button">TEST_DUPLICATE(dupliquer)</button></a></li>
            </ul>
        </div>
    </nav>



    <div class="container">

        <h1 class="rounded dark p-2 m-2 text-center text-white bg-info"><?= $titre ?>
        </h1>

        <?= $content ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="http://localhost/restapi/public/request.js>

    </script>
</body>

</html>