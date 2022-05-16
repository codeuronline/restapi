<?php
//parse_str(file_get_contents('php://input'), $url);
error_log("---------------------------------");
error_log("fichier request category");
$urlrequest=explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
error_log("*******[".isset($urlrequest)."]*******");
if (isset($url[1])=='request') {
    $productController->loadProductRequest($url[2]);
} else{
    $productController->loadProductRequest($urlrequest[1]);
}
        
    



 $answerPHP= true;
     
// requete d'update 
echo json_encode($answerPHP);