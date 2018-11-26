<?php

function get_posts(){

    global $bdd;

    $req = $bdd->query("SELECT * FROM posts ORDER BY date_post DESC");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}

function get_delete(){
	
}