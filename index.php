<?php
    require_once './models/Product.php'; 
$products= new Product([]);
$productsAll = $products->getAll();
?>











<!DOCTYPE html>
<html lang="FR">

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