<?php
  $url = 'https://api.domain.com/users.php';
  $data = array('matricule' => '125585', 'nom' => 'Art', 'prenom' => 'Henry', 'sexe' => 'Masculin', 'date_naissance' => '2023-09-27', 'telephone' => '59663214' );
  // utilisez 'http' même si vous envoyez la requête sur https:// ...
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { /* Handle error */ }
  var_dump($result);
?>