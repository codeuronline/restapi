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
        require "views/afficherAllProduct.view.php";
    }
    
    public function afficherProduct($id){

        $product= $this->productManager->getproductById($id);
        //require "views/afficherProduct.view.php";    
    }

    public function ajoutProduct($data){
        $this->productManager->ajoutProductBd($data);
        header('Location: '.URL.'products');
    }    
    public function dupliquerProduct($data,$id){
        $this->productManager->dupliquerProductInBd($data,$id);
        header('Location: '.URL.'products');
    }
    

    public function supprimerProduct($id){
        $this->productManager->suppressionProductBD($id);
        //require "views/afficherAllProduct.view.php";     
    }
    public function modifierProductRequest($id_product,$statut_id){
        $this->productManager->modificationProductRequest($id_product,$statut_id);        
        $product =$this->productManager->getProductById($id_product);
        
    }
    public function modifierProduct($id){
        $product = $this->productManager->getProductById($id);
        require "views/modifierProduct.view.php";
        //header('Location: '.URL."products");
    }
    public function modifierProductPut($data,$id){
     $this->productManager->modificationProductBd($data,$id);
     require "view/afficherAllprouct.view.php";
        
    }
    public function loadProductRequest($value){
        $products=$this->productManager->loadProductRequest($value);
        //var_dump($products);
        require "views/afficherAllproduct.view.php";
    }

    public function getProductManager(){ return $this->productManager; }
    public function setProductManager($productManager){ $this->productManager = $productManager; return $this;}
}