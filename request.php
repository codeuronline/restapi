<?php 
// changement de status
$urlrequest=explode("/", filter_var($_GET['id']), FILTER_SANITIZE_URL);
var_dump($urlrequest);
 $productController->modifierProductRequest($url[1],$url[2]);
 $answerPHP= true;
     
// requete d'update 
echo json_encode($answerPHP);

?>