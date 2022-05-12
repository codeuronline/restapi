<?php
error_log("traitement de la requete categorie avec le parametre ".$url[2]);
error_log(print_r($url[1]),1);
error_log(print_r($url[0]),1);
//error_log(print_r($urlrequest[2]),1);
$productController->loadProductRequest($urlrequest[2]);
 $answerPHP= true;
     
// requete d'update 
echo json_encode($answerPHP);