<?php
//parse_str(file_get_contents('php://input'), $url);
error_log("---------------------------------");
error_log("fichier request category");
$urlrequest=explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
error_log("urlrequest 0: ".print_r($urlrequest[0]),1);
error_log(print_r($urlrequest[1]),1);
//error_log(print_r($urlrequest[2]),1);

//error_log($url);
$productController->loadProductRequest($url[1]);
 $answerPHP= true;
     
// requete d'update 
echo json_encode($answerPHP);