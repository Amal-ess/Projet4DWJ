<?php

require "../../fonctions/main-functions.php";

$bdd->exec("UPDATE comments SET signalement='0' WHERE id='{$_POST['id']}'");