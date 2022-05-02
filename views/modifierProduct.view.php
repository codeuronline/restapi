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
            <td>
                <?=$product->getCategory_id()?> </td>
            <td>

                <form>
                    <select name="statut_id" id="statut_id">
                        <option value="<?=($product->getStatut_id()==1)? $product->getStatut_id() : 1  ?>"
                            <?=($prodcut->getStatut_id()==1)? "selected":""?>>
                            <?=($product->getStatut_id()==1)? "En cours d'approvisionnement":"En cours d'approvisionnement" ?>
                        </option>
                        <option value="<?=($product->getStatut_id()==2)? $product->getStatut_id() : 2  ?>"
                            <?=($prodcut->getStatut_id()==2)? "selected":""?>>
                            <?=($product->getStatut_id()==2)? "En Stock":"En Stock" ?> </option>
                        <option value="<?=($product->getStatut_id()==3)? $product->getStatut_id() : 3  ?>"
                            <?=($prodcut->getStatut_id()==3)? "selected":""?>>
                            <?=($product->getStatut_id()==3)? "Epuisé":"Epuisé"?> </option>
                        <option value="<?=($product->getStatut_id()==4) ? $product->getStatut_id() : 4?>"
                            <?=($prodcut->getStatut_id()==4)? "selected":""?>>
                            <?=($product->getStatut_id()==4)? "Retiré des rayons":"Retiré des rayon" ?> </option>
                    </select>

                </form>
            </td>
            <td><?=$product->getSupplier_id()?>
            </td>
            <td><?=$product->getPurchase_date()?></td>
            <td><?=$product->getExpiration_date()?></td>
            <td>
                <a href="http://localhost/restapi/products/<?= $product->getId_product()?>"><button
                        class="btn btn-primary"><i class="bi bi-upload"></i></button></a>
                <a href="delete.php?id=<?= $product->getId_product()?>"><button class="btn btn-danger"
                        onclick="return confirm('Voulez-vous supprimer ?')"><i class="bi bi-x-lg"></i></button></a>
            </td>
        </tr>
    </tbody>

</table>
<a href="<?= URL ?>products/delete/" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();

$titre = "Produit : ".$product->getDescription();
require "template.php"; ?>