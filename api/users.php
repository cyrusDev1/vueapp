<?php
include "functions.php";
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul user
        $id = intval($_GET["id"]);
        getUsers($id);
      }
      else
      {
        // Récupérer tous les users
        getUsers();
      }
      break;
    case 'POST':
      // Ajouter un user
      AddUser();
      break;
    case 'PUT':
    // Modifier un user
      $id = intval($_GET["id"]);
      updateUser($id);
      break;
    case 'DELETE':
    // Supprimer un user
      $id = intval($_GET["id"]);
      deleteUser($id);
    break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }
?>
