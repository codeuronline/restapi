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
        <tr>
            <td><?= $product->getId_product() ?></td>
            <td>
                <img class="card" src="<?=URL?><?= $product->getPrimary_visual()?>" alt="visuel">
            </td>
            <td><?=$product->getCode() ?></td>
            <td><?=$product->getDescription() ?></td>
            <td><?=$product->getPrice() ?></td>
            <td><?=$product->getCategory_name()?></td>
            <td><?=$product->getStatut_name() ?></td>
            <td><?=$product->getSupplier_id()?></td>
            <td><?=$product->getPurchase_date()?></td>
            <td><?=$product->getExpiration_date()?></td>
            <td>
                <a href="<?=URL?>update/<?= $product->getId_product()?>"><button class="btn btn-primary"><i
                            class="bi bi-upload"></i></button></a>
                <a href="<?=URL?>del/<?= $product->getId_product()?>"><button class="btn btn-danger"
                        onclick="return confirm('Voulez-vous vraiement supprimer le produit : <?=$product->getDescription()?> ?')"><i
                            class="bi bi-x-lg"></i></button></a>
            </td>
        </tr>
    </tbody>

</table>
<a href="<?= URL ?>products/delete/" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();

$titre = "Produit : ".$product->getDescription();
require "template.php"; ?>