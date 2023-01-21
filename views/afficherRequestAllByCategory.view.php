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
        <th>
            <form method="">
                <select onchange="request_category(this.value)">
                    <option value="">Categorie</option>
                    <option value="1">Boulangerie/Pâtisserie</option>
                    <option value="2">Epicerie Salée</option>
                    <option value="3">Epicerie sucrée</option>
                    <option value="4">Boissons</option>
                    <option value="5">Fromagerie</option>
                    <option value="6">Poissonnerie</option>
                    <option value="7">Boucherie</option>
                    <option value="8">Libre-service</option>
                    <option value="9">Vente à l'étalage</option>
                    <option value="10">Tête de gondole</option>
                </select>
            </form>
        </th>
        <th>Statut</th>
        <th>Supplier</th>
        <th>Purchase</th>
        <th>Expire</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php
        error_log("fichier afficherRequestallByCategory nombre de produits injecté : ".count($products));
        foreach ($products as $product) : ?>

        <tr>
            <td>
                <?= $product->getId_product() ?>
            </td>
            <td>
                <img class="card"
                    src="<?= URL ?><?= (($product->getPrimary_visual() == null) || (empty($product->getPrimary_visual()))) ? "assets/empty.png" : $product->getPrimary_visual() ?>"
                    alt="visuel">
            </td>
            <td>
                <?= $product->getCode() ?>
            </td>
            <td>
                <?= $product->getDescription() ?>
            </td>
            <td>
                <?= $product->getPrice() ?>
            </td>
            <td>
                <?= $product->getCategory_name() ?>
            </td>
            <td>
                <?= $product->getStatut_name() ?>
            </td>
            <td>
                <?= $product->getSupplier_id() ?>
            </td>
            <td>
                <?= $product->getPurchase_date() ?>
            </td>
            <td>
                <?= $product->getExpiration_date() ?>
            </td>
            <td>
                <a href="<?= URL ?>update/<?= $product->getId_product() ?>"><button class="btn btn-primary"><i
                            class="bi bi-upload"></i></button></a>
                <a href="<?= URL ?>del/<?= $product->getId_product() ?>"><button class="btn btn-danger"
                        onclick="return confirm('Voulez-vous vraiement supprimer le produit : <?= $product->getDescription() ?> ?')"><i
                            class="bi bi-x-lg"></i></button></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<a href="<?= URL ?>products/" class="btn btn-success d-block">accueil</a>
<script src="http://localhost/restapi/public/request.js"></script> -->
<!-- <script>
function request_category(id_category) {
    let httpRequest = new XMLHttpRequest();
    console.log(id_category);
    httpRequest.open('GET', 'http://localhost/restapi/products/request/' + id_category, true);
    httpRequest.setRequestHeader('Content-type',
        'application/x-www-form-urlencoded'); //encapsule la requête dans une entête que l'on définit dans une URL
    httpRequest.onreadystatechange = function() {
        console.log('id_category->' + id_category);
        //Si la requête a été reçu (statut 200 : réseau) et 4 : traité
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            // Response
            var response = httpRequest.responseText;
            window.alert('nouveau classement par catégorie : ' + id_category)
            console.log(response);
        }
    };
    httpRequest.send();
}
</script> -->
<?php
$content = ob_get_clean();
$titre = "Liste des produits(All)"; // $videos->getTitre();
require "template.php"; ?>