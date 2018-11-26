<?php

function post($title,$content,$auteur){
    global $bdd;

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'auteur'    =>  $auteur,

    ];


    $sql = "
      INSERT INTO posts(title,content,auteur,date_post)
      VALUES(:title,:content,:auteur,NOW())
    ";

    $req = $bdd->prepare($sql);
    $req->execute($p);

}