<?php

// require_once "models/Product.php";
// require_once  "models/ProductManager.php";
// $productManager = new ProductManager;
// $productManager->chargementProducts(); 

// var_dump($products);?>
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
        <!--?php foreach ($products as $product) :?> -->

        <!-- //$videos=$videoManager->getVideos(); -->
        <tr>
            <td>
                <?=$product->getId_product() ?>
            </td>
            <td>
                <?=$product->getPrimary_visual() ?>
            </td>
            <td>
                <?=$product->getCode() ?>
            </td>
            <td>
                <?=$product->getDescription() ?>
            </td>
            <td>
                <?=$product->getPrice() ?>
            </td>
            <td>
                <?=$product->getCategory_id()?>
            </td>
            <td>
                <?=$product->getStatut_id() ?>
            </td>
            <td>
                <?=$product->getSupplier_id()?>
            </td>
            <td>
                <?=$product->getPurchase_date()?>
            </td>
            <td>
                <?=$product->getExpiration_date()?>
            </td>
            <td>
                <a href="update.php?id=<?=$product->getId_product()?>"><button class="btn btn-primary">Up</button></a>
                <a href="delete.php?id=<?=$product->getId_product()?>"><button class="btn btn-danger"
                        onclick="return confirm('Voulez-vous supprimer ?')">X</button></a>
            </td>
        </tr>
        <!--?php endforeach ?> -->
    </tbody>
</table>
<a href="<?= URL ?>videos/a/" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();

$titre = "liste des vidéos"; // $videos->getTitre();
require "template.php"; ?>