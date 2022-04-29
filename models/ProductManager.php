<?php

require_once "Database.php";
require_once "Product.php";


class ProductManager extends Database{

    private $products;
        
        
    public function ajoutProduct($product){
        $this->products[] = $product;
    }
    
    public function getProducts(){
        return $this->products;
    }
    

    
    public function chargementProducts(){
        $req = $this->getPDO()->prepare("SELECT *,nom,name,supplier_name,path,file_name FROM products 
        INNER JOIN category ON products.category_id=category.id
        INNER JOIN statut ON products.statut_id=statut.id
        INNER JOIN suppliers ON products.supplier_id=suppliers.id
        INNER JOIN assets ON products.primary_visual=assets.id
        ");
        $req->execute();
        $mesProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($mesProducts as $product){
        $this->ajoutProduct(new Product($product));
    }
    }


            public function getProductById($id){
            //on utilise la boucle for et on part un zero car c'est un tableau
            for($i=0; $i < count($this->products);$i++){
            if($this->products[$i]->getId_product() === $id){
            return $this->products[$i];
                }
            }
    }

    public function dupliquerProductInBd($data,$id){
        extract($data);
        isset($status)   ?   $statut_id=$status          :   null;
        isset($statut)   ?   $statut_id=$statut          :   null;
        $req="INSERT INTO products (code,description,price,category_id,statut_id,supplier_id,purchase_date,expiration_date,primary_visual)  VALUES (:code,:description,:price,:category_id,:statut_id,:supplier_id,:purchase_date,:expiration_date,:primary_visual) ON DUPLICATE KEY UPDATE id_product = id_product+1";
        $stmt = $this->getPDO()->prepare($req);
        $stmt->bindValue(":code",$code,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":price",$price,PDO::PARAM_INT);
        $stmt->bindValue(":category_id",$category,PDO::PARAM_INT);
        $stmt->bindValue(":statut_id",$statut_id,PDO::PARAM_INT);
        $stmt->bindValue(":supplier_id",$supplier,PDO::PARAM_INT);
        $stmt->bindValue(":purchase_date",$purchase,PDO::PARAM_STR);
        $stmt->bindValue(":expiration_date",$expire,PDO::PARAM_STR);
        $stmt->bindValue(":primary_visual",$primary_visual,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
        $product = new Product($this->getPDO()->lastInsertId(),$data);
        $this->ajoutProduct($product);
                }
    }
        
    public function ajoutProductBd($data){
          extract($data);
          isset($status)   ?   $statut_id=$status          :   null;
          isset($statut)   ?   $statut_id=$statut          :   null;  
          $req = "INSERT INTO 
          products (code,description,price,category_id,statut_id,supplier_id,purchase_date,expiration_date,primary_visual) 
          values (:code,:description,:price,:category_id,:statut_id,:supplier_id,:purchase_date,:expiration_date,:primary_visual)";
          $stmt = $this->getPDO()->prepare($req);
               //$stmt->bindValue(":id_product",$id_product,PDO::PARAM_INT);
                $stmt->bindValue(":code",$code,PDO::PARAM_STR);
                $stmt->bindValue(":description",$description,PDO::PARAM_STR);
                $stmt->bindValue(":price",$price,PDO::PARAM_INT);
                $stmt->bindValue(":category_id",$category,PDO::PARAM_INT);
                $stmt->bindValue(":statut_id",$statut_id,PDO::PARAM_INT);
                $stmt->bindValue(":supplier_id",$supplier,PDO::PARAM_INT);
                $stmt->bindValue(":purchase_date",$purchase,PDO::PARAM_STR);
                $stmt->bindValue(":expiration_date",$expire,PDO::PARAM_STR);
                $stmt->bindValue(":primary_visual",$primary_visual,PDO::PARAM_INT);
                $resultat = $stmt->execute();
                $stmt->closeCursor();
                if($resultat > 0){
                    $product = new Product($this->getPDO()->lastInsertId(),$data);
                    $this->ajoutProduct($product);
                }        
            }
        
            public function suppressionProductBD($id){
                $req = "DELETE FROM products WHERE id_product = :id_product";  
                $stmt = $this->getPDO()->prepare($req);  
                $stmt->bindValue(":id_product",$id,PDO::PARAM_INT);  
                $resultat = $stmt->execute();   
                $stmt->closeCursor();  
                if($resultat > 0){
                    $product = $this->getProductById($id);
                    unset($product);  
                }    
            }
        
        
        
            public function modificationProductBd($data){
                extract($data);
                $req = "UPDATE products SET 
                products (id_product,code,description,price,category_id,statut_id,supplier_id,purchase_date,expiration_date,primary_visual)
                values (:id_product,:code,:description,:price,category_id,:statut_id,:supplier_id,:purchase_date,:expiration_date,:primary_visual) WHERE id = :id";      
                
                $stmt = $this->getPDO()->prepare($req); 
                
                $stmt->bindValue(":id_product",$id_product,PDO::PARAM_INT);
                $stmt->bindValue(":code",$code,PDO::PARAM_STR);
                $stmt->bindValue(":description",$description,PDO::PARAM_STR);
                $stmt->bindValue(":price",$price,PDO::PARAM_INT);
                $stmt->bindValue(":category_id",$category_id,PDO::PARAM_INT);
                $stmt->bindValue(":statut_id",$statut_id,PDO::PARAM_INT);
                $stmt->bindValue(":supplier_id",$supplier_id,PDO::PARAM_INT);
                $stmt->bindValue(":purchase_date",$purchase_date,PDO::PARAM_STR);
                $stmt->bindValue(":expiration_date",$expiration_date,PDO::PARAM_STR);
                $stmt->bindValue(":primary_visual",$primary_visual,PDO::PARAM_STR);  
                
                $resultat = $stmt->execute();      
                $stmt->closeCursor();
        
                if($resultat > 0){    
                $this->getPDO();
                $stmt->bindValue(":id_product",$id_product,PDO::PARAM_INT);
                $stmt->bindValue(":code",$code,PDO::PARAM_STR);
                $stmt->bindValue(":description",$description,PDO::PARAM_STR);
                $stmt->bindValue(":price",$price,PDO::PARAM_INT);
                $stmt->bindValue(":category_id",$category_id,PDO::PARAM_INT);
                $stmt->bindValue(":statut_id",$statut_id,PDO::PARAM_INT);
                $stmt->bindValue(":supplier_id",$supplier_id,PDO::PARAM_INT);
                $stmt->bindValue(":purchase_date",$purchase_date,PDO::PARAM_STR);
                $stmt->bindValue(":expiration_date",$expiration_date,PDO::PARAM_STR);
                $stmt->bindValue(":primary_visual",$primary_visual,PDO::PARAM_STR);
                
                $this->getProductById($id)->setId_Prodcut($id_product);    
                $this->getProductById($id)->setId_Code($code);    
                $this->getProductById($id)->setDescription($description);
                $this->getProductById($id)->setPrice($price);
                $this->getProductById($id)->setCategory_id($category_id);
                $this->getProductById($id)->setStatut_id($statut_id);
                $this->getProductById($id)->setSupplier_id($supplier_id);
                $this->getProductById($id)->setPurchase_date($purchase_date);
                $this->getProductById($id)->setExpiration_date($expiration_date);
                $this->getProductById($id)->setPrimary_visual($primary_visual);
                }   
            }
        }