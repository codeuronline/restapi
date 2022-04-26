<?php 


require_once 'Database.php';

//je crée une class au nom de product et
//je met des variables avec les nom de mes tables.
class Product extends Database{

    
        private $id_product;
        private $code;
        private $description;
        private $price;
        private $category_id;
        private $statut_id;
        private $supplier_id;
        private $purchase_date;
        private $expiration_date;
        private $primary_visual;
    
        //extract data permet de convertir les données en variable directement
        public function __construct($data){
            extract($data);
            $this->id_product = $id_product;
            $this->$code = $code;
            $this->$description = $description;
            $this->$price = $price;
            $this->$category_id = $category_id;
            $this->$statut_id = $statut_id;
            $this->$supplier_id = $supplier_id;
            $this->$purchase_date = $purchase_date;
            $this->$expiration_date = $expiration_date;
            $this->$primary_visual = $primary_visual;
        }


        public function getAll($id=null) { 
        $data = [];
        $db = new Product($data);
        $pdo = $db->getPDO();
        if (empty($data)) {
            
        if (isset($id)){ 
            $sql= "SELECT * FROM products WHERE id=$id";
        }else{
            $sql="SELECT * FROM products";
        }
        return $pdo->query($sql)->fetchAll();
        }

    }    

    
//ici je met des geter & setter
//avec le pluging il me suffit de cliquer droit sur la variable déclarrer plus haut
//( une a la fois !)
public function getId_product(){return $this->id_product;}
public function setId_product($id_product){$this->id_product = $id_product;return $this;}


public function getCode(){return $this->code;}
public function setCode($code){$this->code = $code;return $this;}


public function getDescription(){return $this->description;}
public function setDescription($description){$this->description = $description;return$this;}

public function getPrice(){return $this->price;}
public function setPrice($price){$this->price = $price;return $this;}


public function getCategory_id(){return $this->category_id;}
public function setCategory_id($category_id){$this->category_id = $category_id;return $this;}


public function getStatut_id(){return $this->statut_id;}
public function setStatut_id($statut_id){$this->statut_id = $statut_id;return $this;}


public function getSupplier_id(){return $this->supplier_id;}
public function setSupplier_id($supplier_id){$this->supplier_id = $supplier_id;return $this;}


public function getPurchase_date(){return $this->purchase_date;}
public function setPurchase_date($purchase_date){$this->purchase_date = $purchase_date;
return $this;}


public function getExpiration_date(){return $this->expiration_date;}
public function setExpiration_date($expiration_date){$this->expiration_date = $expiration_date;return $this;}


public function getPrimary_visual(){return $this->primary_visual;}
public function setPrimary_visual($primary_visual){$this->primary_visual = $primary_visual;return $this;}


}
?>





