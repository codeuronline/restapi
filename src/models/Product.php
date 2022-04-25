<?php 
require_once 'Database.php';
class Product extends Database{

    public function getAll($id=null) { 
        $db = new Product;
        $pdo = $db->getPDO();
        if (isset($id)){ 
            $sql= "SELECT * FROM products WHERE id=$id";
        }else{
            $sql="SELECT * FROM products";
        }
        return $pdo->query($sql)->fetchAll();          
    }    

    
}
?>