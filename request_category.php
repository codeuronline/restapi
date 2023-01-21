<?php
//parse_str(file_get_contents('php://input'), $url);
$urlRequest = explode("/", filter_var(@$_GET['id']), FILTER_SANITIZE_URL);
error_log("nb parametre avec urlrquest=".count($urlRequest));
error_log("nb parametre avec url=".count($url));
// error_log("traitement de la requete categorie avec le parametre ".$url[]);

error_log("parametre 1 :".print_r($urlRequest[1]),1);
error_log("parametre 0 : ".print_r($urlRequest[0]),1);
//error_log(print_r($urlrequest[2]),1);
<<<<<<< HEAD
$productController->loadProductRequest($urlrequest[1]);
$answerPHP= true;

=======

//error_log($url);
if (isset($urlRequest[3])) {
        $productController->loadProductRequest($url[3]);
    if (isset($urlRequest[2])){
        $productController->loadProductRequest($url[2]);
    }else{
        $productController->loadProductRequest($url[1]);
    }
}

 $answerPHP= true;
     
>>>>>>> 37e0041308ee98b494ab2653bfde69b7554495b6
// requete d'update 
echo json_encode($answerPHP);