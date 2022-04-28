<?php
//ici tous notre site part d'index.php il est inutile de partir du chemin d'index mais directement a models/ProductManager etc...
require_once "models/ProductManager.php";

class ProductsController{

    private $productManager;
    
    public function __construct() {
        
        $this->productManager= new ProductManager();
        $this->productManager->chargementProducts();
    }
    
    
    public function afficherProducts(){

        $products= $this->getProductManager()->getProducts();
        require "views/product.view.php";
    }
    
    public function afficherProduct($id){

        $product[]= $this->productManager->getproductById($id);
        require "views/afficherProduct.view.php";    
    }

    public function ajoutProduct(){
    require "ajoutProduct.view.php";
    }    

    public function getProductManager(){ return $this->productManager; }
    public function setProductManager($productManager){ $this->productManager = $productManager; return $this;}
}