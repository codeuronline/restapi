<?php
$urlrequest=explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
error_log(print_r($urlrequest),1);
error_log(print_r($urlrequest[1]),1);
//error_log(print_r($urlrequest[2]),1);
$productController->loadProductRequest($urlrequest[1]);
 $answerPHP= true;
     
// requete d'update 
echo json_encode($answerPHP);