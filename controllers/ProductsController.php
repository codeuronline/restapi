<?php
//ici tous notre site part d'index.php il est inutile de partir du chemin d'index mais directement a models/ProductManager etc...
require_once "models/ProductManager.class.php";


//ici il s'agit d'une class qui permet a l'utilisateur d'acceder aux information sur la 
//commande de routage pour une demande spécifique via l'url
class ProductsController{

    private $productManager;


    //ici j'instancie le ProductManager que j'ai déclarrer plus haut en private
    public function __construct(){
        $this->productManager = new ProductManager;
        $this->productManager->chargementProducts();
    }
}

?>