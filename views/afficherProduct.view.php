<?php
ob_start();
// require_once "models/Product.php";
// require_once "models/ProductManager.php";
// $productManager = new ProductManager;
// $productManager->chargementProducts();

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
        <!--?php foreach ($products as $product) :?> -->
        <?php
    // ici je crée une boucle qui parcourt le tableau et qui me permet d'afficher,
    // ma liste de livre a travers ma variable livres.
    //ma variable livres sera donc utiliser dans mon controleur par 
    //la fonction afficher ce qui permet d'afficher l'ensemble des livres.
    for($i=0; $i < count($products);$i++) : 
    ?>

        <tr>
            <td><?=$products[$i]->getId_product() ?></td>
            <td><?=$products[$i]->getPrimary_visual() ?></td>
            <td><?=$products[$i]->getCode() ?></td>
            <td><?=$products[$i]->getDescription() ?></td>
            <td><?=$products[$i]->getPrice() ?></td>
            <td><?=$products[$i]->getCategory_id()?></td>
            <td><?=$products[$i]->getStatut_id() ?></td>
            <td><?=$products[$i]->getSupplier_id()?></td>
            <td><?=$products[$i]->getPurchase_date()?></td>
            <td><?=$products[$i]->getExpiration_date()?></td>

            <td>
                <?=$products->getId_product() ?>
            </td>
            <td>
                <?=$products->getPrimary_visual() ?>
            </td>
            <td>
                <?=$products->getCode() ?>
            </td>
            <td>
                <?=$products->getDescription() ?>
            </td>
            <td>
                <?=$products->getPrice() ?>
            </td>
            <td>
                <?=$products->getCategory_id()?>
            </td>
            <td>
                <?=$products->getStatut_id() ?>
            </td>
            <td>
                <?=$products->getSupplier_id()?>
            </td>
            <td>
                <?=$products->getPurchase_date()?>
            </td>
            <td>
                <?=$products->getExpiration_date()?>
            </td>
            <td>
                <a href="update.php?id=<?=$products->getId_product()?>"><button class="btn btn-primary">Up</button></a>
                <a href="delete.php?id=<?=$products->getId_product()?>"><button class="btn btn-danger"
                        onclick="return confirm('Voulez-vous supprimer ?')">X</button></a>
            </td>
        </tr>
        <?php endfor ?>
    </tbody>

</table>
<a href="<?= URL ?>products/delete/" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();

$titre = "Liste des produits";
require "template.php"; ?>