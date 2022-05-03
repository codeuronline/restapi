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

        $product= $this->productManager->getproductById($id);
        require "views/afficherProduct.view.php";    
    }

    public function ajoutProduct($data){
        $this->productManager->ajoutProductBd($data);
        header('Location: '.URL.'products');
    }    
    public function dupliquerProduct($data,$id){
        $this->productManager->dupliquerProductInBd($data,$id);
        header('Location: '.URL.'products');
    }
    
    public function ajoutProductValidation(){
        $data=$_POST;
        $file = $_FILES['photo'];
        $repertoire= "public/images/";
        //$data['photo']=$this->ajoutImage($file,$repertoire);
        $data['photo']=$this->ajoutImage($file,$repertoire);
        echo "AVV";
        // var_dump($data); 
        $this->videoManager->ajoutProductBd($data);
        header('Location: '.URL.'videos');
    
}

    private function ajoutImage($file,$dir){

        $imageValide=['jpg','jpeg','gif','png','jfif'];
        
        if (!isset($file['name'])||empty($file['name'])) {
            throw new Exception("Vous devez indiquer une photo");   
        }
        if (!file_exists($dir)) mkdir($dir,0777);
        
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $date=date("ymdis");
        $targetfile= $dir.$date."_".$file["name"];
        
        /*if (!getimagesize($file["tmp_name"])) {
            throw new Exception("Le fichier n'est pas une image");
        }*/
        if (!in_array($extension,$imageValide)){
            throw new Exception("L'extension du fichier n'est pas reconnu");
        }
        if (file_exists($targetfile)) {
            throw new Exception("Le fichier existe déjà");
            
        }
        if ($file['size']>500000) {
            throw new Exception("Le fichier est trop gros");
        }
        if (!move_uploaded_file($file['tmp_name'],$targetfile)) {
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        }else return ($date."_".$file['name']);
    }
    public function suppressionProduct($id){
        //unlink("public/images/".$this->videoManager->getVideoById($id)->getPhoto());
        $this->productManager->suppressionProductBd($id);
        header('Location: '. URL . "products");
    }

    public function modificationProductRequest($id_product){
        extract($_GET);
        //$statut_id=$_GET["statut_id"];
        $this->productManager->modificationProductRequestBd($id_product,$statut_id);        
        $product =$this->productManager->getProductById($id_product);
        
    }
    public function modificationProduct($id,$data){
        $product = $this->productManager->getProductById($id);
         require "views/modifierProduct.view.php";
        //header('Location: '.URL."products");
    }

    public function modificationProductValidation(){
        $data= $_GET;
        //$data['id']=$data['identifiant'];
        $imageActuelle = $this->productManager->getProductById($_GET['id_product'])->getPhoto();
        $file = $_FILES['photo'];
        if($file['size'] > 0){
            $repertoire = "assets/";
            if (file_exists($repertoire.$imageActuelle)) unlink($repertoire.$imageActuelle);      
            $data['photo'] = $this->ajoutImage($file,$repertoire);
        } else {
            $data['photo'] = $imageActuelle;
        }
        //extract($data);
        $this->productManager->modificationProductBd($data);
        header('Location: '. URL . "products");
    }
    public function getProductManager(){ return $this->productManager; }
    public function setProductManager($productManager){ $this->productManager = $productManager; return $this;}
}