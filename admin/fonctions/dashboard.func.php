<?php

function inTable($table){
    global $bdd;
    $query = $bdd->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}

function get_comments(){
    global $bdd;

    $req = $bdd->query("
        SELECT  comments.id,
                comments.pseudo,
                comments.date_com,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.signalement ='1'
        ORDER BY comments.date_com ASC
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}