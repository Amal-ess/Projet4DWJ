<?php

require "../fonctions/main-functions.php";

$bdd->exec("UPDATE comments SET signalement='1' WHERE id='{$_POST['id']}'");
