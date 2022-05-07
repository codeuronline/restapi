<?php
require 'models/Database.php';
$connection =new Database;

$directory= scandir("assets");
var_dump($directory); 
for ($i=2; $i <count($directory) ; $i++) { 
    $sql = "INSERT INTO assets (path,file_name) VALUES ('assets/',?)";
    $stmt = $connection->getPDO()->prepare($sql);
    $result=$stmt->execute([$directory[$i]]);
}
?>