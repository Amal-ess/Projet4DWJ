<?php

function get_posts()

global $bdd;
// On récupère les billets
$req = $bdd->query("

	SELECT * FROM posts
	WHERE posts.id='{$_GET['id']}'
	
");
	$result = $req ->fetchObject();
	return $result;

}


function comments($pseudo,$comment){

    global $bdd;
	$c=array(
		'pseudo' =>$pseudo,
		'comment' => $comment,
		'post_id' => $_GET['id']
	);

$sql= "INSERT INTO comments(pseudo,comment,post_id,date_com) VALUE(:pseudo, :comment, :post_id, NOW())";
$req = $bdd->prepare($sql);
$req ->execute($c);
}

function get_comments(){

    global $bdd;
    $req = $bdd->query("SELECT * FROM comments 
    	WHERE post_id = '{$_GET['id']}' 
    	AND comments.signalement = '0'
    	ORDER BY date_com DESC");
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;


}




















