<?php
parse_str(file_get_contents('php://input'), $url);
error_log("traitement de la requete categorie avec le parametre ".$url[1]);
error_log(print_r($url[1]),1);
error_log(print_r($url[0]),1);
//error_log(print_r($urlrequest[2]),1);

//error_log($url);
$productController->loadProductRequest($url[1]);
 $answerPHP= true;
     
// requete d'update 
echo json_encode($answerPHP);