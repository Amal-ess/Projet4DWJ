<?php 

$posts= get_posts();

foreach ($posts as $article){
?>
	<h5><?= $article->title ?></h5>
	<h6 class="grey-text"> Le <?= date("d/m/Y à H:i", strtotime($article->date_post)) ?> par <?= $article->auteur ?></h6>

	<p><?= htmlspecialchars_decode(substr(nl2br($article->content),0,1000)) ?> </p>
	<p class="article-content"><a class="waves-effect waves-light btn right pink darken-2" href="index.php?page=post&id=<?= $article->id ?>">Lire la suite <i class="material-icons">book</i> </a></p><br/><br/>
<?php }
?>
