<?php
require "../../fonctions/main-functions.php";
$bdd->exec("DELETE FROM posts WHERE id = {$_POST['id']}");