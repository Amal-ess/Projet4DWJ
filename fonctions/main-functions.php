<?php

	session_start();

	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


?>