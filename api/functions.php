<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";

function getUsers($id=0){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users");
    if($id != 0){
        $req = $bdd->prepare("SELECT * FROM users WHERE id = '$id' ");
    }
    $req->execute();
    $products = $req->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($products, JSON_PRETTY_PRINT);
}

function addUser(){
    global $bdd;
    $matricule =  $_POST["matricule"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $sexe = $_POST["sexe"];
    $date_naissance = $_POST["date_naissance"];
    $telephone = $_POST["telephone"];

    $req = $bdd->prepare("INSERT INTO users(matricule, nom, prenom, sexe, date_naissance, telephone, created_at) VALUES ('$matricule','$nom', '$prenom', '$sexe','$date_naissance','$telephone',now())");
    if($req->execute())
    {
      $response=array(
        'status' => 201,
        'status_message' =>'User crée avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 403,
        'status_message' =>'ERREUR! User non crée'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function updateUser($id){
    global $bdd;
    $_PUT = array(); //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);
    $matricule =  $_PUT["matricule"];
    $nom = $_PUT["nom"];
    $prenom = $_PUT["prenom"];
    $sexe = $_PUT["sexe"];
    $date_naissance = $_PUT["date_naissance"];
    $telephone = $_PUT["telephone"];

    $req = $bdd->prepare("UPDATE users SET matricule = '$matricule', nom = '$nom', prenom = '$prenom', sexe = '$sexe', date_naissance = '$date_naissance' , telephone = '$telephone' WHERE id = '$id'");
    if($req->execute())
    {
      $response=array(
        'status' => 204,
        'status_message' =>'User modifie avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 403,
        'status_message' =>'ERREUR! User non modifie'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteUser($id){
    global $bdd;
  
    $req = $bdd->prepare("DELETE FROM users WHERE id = '$id'");
    if($req->execute())
    {
      $response=array(
        'status' => 204,
        'status_message' =>'User DELETE avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 403,
        'status_message' =>'ERREUR! User non DELETE'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>