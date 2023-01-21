<?php 
// changement de status
$urlrequest=explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
error_log(print_r($urlrequest),1);
error_log(print_r($urlrequest[1]),1);
error_log(print_r($urlrequest[2]),1);
$productController->modifierProductRequest($urlrequest[1],$urlrequest[2]);
$answerPHP= true;

// requete d'update 
echo json_encode($answerPHP);

?>