<?php

ob_start();
?>

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
        <?php foreach( $products as $product) : ?>
        <!-- //$videos = $videoManager->getVideos(); -->
        <tr>
            <td>
                <?=$product->getId_Product() ?>
            </td>
            <td>
                <img class="card" src="<?=URL?><?=$product->getPrimary_visual() ?>" alt="visuel">
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
                <?=$product->getCategory_id() ?>
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
                <a href="<?=URL?>products/<?=$product->getId_product()?>"><button class="btn btn-primary"><i
                            class="bi bi-upload"></i></button></a>


                <a href="<?=URL?>products/<?=$product->getId_product()?>"><button class="btn btn-danger"
                        onclick="return confirm('Voulez-vous supprimer ?')"><i class="bi bi-x-lg"></i></button></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<a href="<?= URL ?>products/add" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();
$titre = "Liste des produits(All)"; // $videos->getTitre();
require "template.php"; ?>