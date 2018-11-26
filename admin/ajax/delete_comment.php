<?php
require "../../fonctions/main-functions.php";
$bdd->exec("DELETE FROM comments WHERE id = {$_POST['id']}");