
<?php

function get_posts()

{

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les billets
$req = $bdd->query("

	SELECT * FROM posts
	ORDER BY date_post DESC
	

");

$results = array();

while ($rows = $req->fetchObject()){
	$results[] = $rows;
}
return $results;
}
