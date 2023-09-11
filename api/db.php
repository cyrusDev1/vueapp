<?php
session_start();

try{
	$host = "127.0.0.1:3306";
	$dbname = "domain";
	$user = "domain";
	$pass = "";
	$bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
	$bdd->exec("set names utf8mb4");
 
}catch(PDOException $e){
	echo "Error:".$e->getMessage();
}
//https://euangoddard.github.io/clipboard2markdown/