<?php
$url = "https://api.domain.com/users.php?id=2"; // modifier le user 1
$data = array('matricule' => '0011', 'nom' => 'Art', 'prenom' => 'Henry', 'sexe' => 'Masculin', 'date_naissance' => '2023-09-27', 'telephone' => '59663214' );
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
$response = curl_exec($ch);
var_dump($response);
if (!$response) 
{
    return false;
}
?>