<?php

function is_admin($email,$password)
{

	global $bdd;
	$a=[
		'email' => $email,
		'password' => sha1($password)
	];
	$sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
	$req = $bdd->prepare ($sql);
	$req->execute($a);
	$exist = $req->rowCount($sql);
	return $exist;
}

?>