<?php

//on demarre la session
session_start();

//si la case des memoires n'existe pas on la créer
if(empty($_SESSION['msg']))
	$_SESSION['msg']=[];


define('SQL_HOST', 'localhost');
define('SQL_USER', 'root');
define('SQL_PASS', 'root');
define('SQL_NAME', 'b3_tinder_chaussette');

//on essaie de se connecter à la base
try{
	$conn = new PDO('mysql:dbname='.SQL_NAME.';charset=utf8;host='.SQL_HOST , SQL_USER, SQL_PASS);
}catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}

include('core.php');