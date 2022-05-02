<?php
$url = "http://localhost/restapi/products/1"; // modifier le produit 1
$data = array(
    'code' => 'TVF',
    'description' => 'Thé vert saveur framboise en sachets',
    'price' => '149',
    'category' => '4',
    'status' => '2',
    'supplier' => '1',
    'purchase' => '2021-04_01 10:40:00',
    'expire' => '2023-04-01 10:40:00'
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
var_dump($response);
if (!$response) {
    return false;
}
?>