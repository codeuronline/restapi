<?php
$url = "http://localhost/restapi/products.php"; // modifier le produit 1
$data = array(
    'code' => 'MOD',
    'description' => 'Moutarde de Dijon',
    'price' => 225,
    'category' => 1,
    'statut' => 2,
    'supplier' => 3,
    'purchase' => '2022-04_01 10:40:00',
    'expire' => '2023-04-01 10:40:00'
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
echo $response;
if (!$response) {
    return false;
}