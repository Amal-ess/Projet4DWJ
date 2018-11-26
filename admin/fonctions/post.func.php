<?php

function get_posts()

{

global $bdd;

// On récupère les billets
$req = $bdd->query("

    SELECT * FROM posts
    WHERE posts.id='{$_GET['id']}'
    

");

    $result = $req ->fetchObject();
    return $result;
}


function edit($title,$content,$auteur,$id){

    global $bdd;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'auteur'    => $auteur,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, auteur=:auteur WHERE id=:id";
    $req = $bdd->prepare($sql);
    $req->execute($e);

}
 
