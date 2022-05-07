<?php
$url = "http://localhost/restapi/products/7"; // modifier le produit 8
$data = array(
'code' => 'TVF2',
'description' => 'Thé vert saveur framboise en sachets',
'price' => '149',
'category_id' => '4',
'statut_id' => '2',
'supplier_id' => '1',
'purchase_date' => '2021-04_01 10:40:00',
'expiration_date' => '2023-04-01 10:40:00',
'primary_visual' => '',
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DUPLICATE");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
var_dump($response);
if (!$response) {
return false;
}

?>