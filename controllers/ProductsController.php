<?php
//ici tous notre site part d'index.php il est inutile de partir du chemin d'index mais directement a models/ProductManager etc...
require_once "models/ProductManager.php";

class ProductsController{

    public $productManager;
    
    public function __construct() {
        
        $this->productManager= new ProductManager();
        $this->productManager->chargementProducts();
    }
    
    
    public function afficherProducts(){

    $products= $this->getProductManager()->getProducts();
    if (isset($products)){
        echo 'isset';}
        else {
        echo 'pas définie';
        }

    require "views/product.view.php";
    }
    public function afficherProduct($id){

    $products= $this->productManager->getproductById($id);
    require "views/afficherProduct.view.php";    
    }

    public function ajoutProduct(){
    require "views/ajoutProduct.view.php";
    }    
    
    public function ajoutProductValidation(){
        $data=$_POST;
        $file = $_FILES['assets'];
        $repertoire= "assets";
        //$data['photo']=$this->ajoutImage($file,$repertoire);
        $data['assets']=$this->ajoutImage($file,$repertoire);
        $this->productManager->ajoutProductBd($data);
        header('Location: '.URL.'products');
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
        unlink("public/images/".$this->videoManager->getVideoById($id)->getPhoto());
        $this->videoManager->suppressionVideoBd($id);
        header('Location: '. URL . "videos");
    }

    public function modificationProduct($id){
        $video = $this->videoManager->getProductById($id);
        require "views/modifierVideo.view.php";
    }

    public function modificationProductValidation(){
    $data= $_POST;
    //$data['id']=$data['identifiant'];
    $imageActuelle = $this->videoManager->getProductById($_POST['id'])->getPrimary_visual();
    $file = $_FILES['photo'];
    if($file['size'] > 0){
        $repertoire = "public/images/";
        if (file_exists($repertoire.$imageActuelle)) unlink($repertoire.$imageActuelle);      
        $data['photo'] = $this->ajoutImage($file,$repertoire);
    } else {
        $data['photo'] = $imageActuelle;
    }
    //extract($data);
    $this->videoManager->modificationProductBd($data);
    header('Location: '. URL . "products");
    }

    /**
     * Get the value of videoManager
     */ 
    public function getProductManager()
    {
        return $this->ProductManager;
    }

    /**
     * Set the value of videoManager
     *
     * @return  self
     */ 
    public function setProductManager($productManager)
    {
        $this->productManager = $productManager;

        return $this;
    }
}